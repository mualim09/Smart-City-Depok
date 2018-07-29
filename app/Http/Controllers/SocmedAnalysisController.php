<?php

namespace App\Http\Controllers;

use Antoineaugusti\LaravelSentimentAnalysis\SentimentAnalysis;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PHPInsight\Sentiment;
use Twitter; 
use App\Repositories\SocmedRepository;
use Carbon\Carbon;

class SocmedAnalysisController extends Controller
{
// Inisialisasi awal
    protected $GetProfile; 
    protected $sentiment;
    protected $SentimentAnalysis;

    protected $ChartTotal;
    protected $ChartPerBulan;
    protected $ChartPerHari;

    protected $Str_Hightlight;



    public function __construct(Sentiment $sentiment, SentimentAnalysis $SentimentAnalysis, SocmedRepository $charttotal,
                        SocmedRepository $getprofile, SocmedRepository $chartperbulan, SocmedRepository $chartperhari,
                    SocmedRepository $str_highlight)
    {
        $this->middleware('auth');
        $this->GetProfile       = $getprofile;
        $this->sentiment        = $sentiment;
        $this->SentimentAnalysis = $SentimentAnalysis;

        $this->ChartTotal       = $charttotal;
        $this->ChartPerBulan    = $chartperbulan;
        $this->ChartPerHari     = $chartperhari;

        $this->Str_Hightlight = $str_highlight;


    }

// =====================================================================================================================================
// =======================================================Fungsi Highlight==============================================================
// =====================================================================================================================================
public function highlightkeyword($string, $search, $color)
{

        $tweetclr = $this->Str_Hightlight->str_highlight($string, $search, STR_HIGHLIGHT_SIMPLE|STR_HIGHLIGHT_WHOLEWD, '<span style="color: '.$color.'">\1</span>');

return $tweetclr;
}
// =====================================================================================================================================
 
    
      public function getanalysisdata($data)
    {
for ($i=0; $i <count($data) ; $i++) { 
    $ds = $data['statuses'];

    
    $nilai = [];
    for ($i=0; $i < count($ds); $i++) { 
        $nilai[$i] = [

            'score' => $this->sentiment->score($ds[$i]['full_text'])
        ];
    }
$data1 = [];
for ($i=0; $i < count($ds); $i++) { 
    
    $data1[$i] = [
    'id_twitter' => $ds[$i]['id'],
    'nama_akun' => $ds[$i]['user']['name'],
    'tweet' => $ds[$i]['full_text'],
    'sentiment' => $this->SentimentAnalysis->decision($ds[$i]['full_text']),
    'score_positif' => $nilai[$i]['score']['positif'],
    'score_netral' => $nilai[$i]['score']['netral'],
    'score_negatif' => $nilai[$i]['score']['negatif'],
    'created_at' =>Carbon::parse($ds[$i]['created_at'])->toDateTimeString(),
    ];
    $checkdata = DB::table('socmed_analysis')->where('tweet', $ds[$i]['full_text'])->get()->count();

        if($checkdata != 1){
          DB::table('socmed_analysis')->insert($data1[$i]);
        }
    }
}

return $data1;
}
// ================================================================================================


        public function analysis()
    {
define('STR_HIGHLIGHT_SIMPLE', 1);

/**
 * Only match whole words in the string
 * (off by default)
 */
define('STR_HIGHLIGHT_WHOLEWD', 2);

/**
 * Case sensitive matching
 * (off by default)
 */
define('STR_HIGHLIGHT_CASESENS', 4);

/**
 * Overwrite links if matched
 * This should be used when the replacement string is a link
 * (off by default)
 */
define('STR_HIGHLIGHT_STRIPLINKS', 8);

    $profile       = Twitter::getUsers([
                        'user_id' => '1000962488739885056', 
                        'screen_name' => 'HiDepok',
                        'format' => 'array' 
                        ]);

    $data_search = Twitter::getSearch([
    	'q'				=> 'pemkotdepok',
        'tweet_mode' => 'extended',
    	'result_type'	=> 'recent',
    	'format' 		=> 'array',
    	'count' 		=> 100,
    	]);


    $get_data                   = $this->getanalysisdata($data_search);
    $get_profile                = $this->GetProfile->getprofile($profile);
    
// // ======================================================================================================
    $data_mention = Twitter::getMentionsTimeline(['count' => 50, 'format' => 'array']);	
    $nilai_mention = [];
    for ($i=0; $i < count($data_mention); $i++) { 
        $nilai_mention[$i] = [

            'score' => $this->sentiment->score($data_mention[$i]['text'])
        ];
    }

    $tweet_mention = [];
    for ($i=0; $i < count($data_mention); $i++) { 
        $tweet_mention[$i] = [
            'id_twitter' => $data_mention[$i]['id'],
            'nama_akun' => $data_mention[$i]['user']['name'],
            'tweet' => $data_mention[$i]['text'],
            'sentiment' => $this->SentimentAnalysis->decision($data_mention[$i]['text']),
            'score_positif' => $nilai_mention[$i]['score']['positif'],
            'score_netral' => $nilai_mention[$i]['score']['netral'],
            'score_negatif' => $nilai_mention[$i]['score']['negatif'],
            'created_at' => $data_mention[$i]['created_at'],
        ];

        $checkdata = DB::table('socmed_analysis')->where('tweet', $data_mention[$i]['text'])->get()->count();
        if($checkdata == 0){
          DB::table('socmed_analysis')->insert($tweet_mention[$i]);
        }
    }
// =========================================================================================================
// ======================================= DATA BAG OF WORD ================================================
// =========================================================================================================


for ($i=37; $i<count( $this->sentiment->getList('positif')); $i++)
{ 
    $keypos[] = $this->sentiment->getList('positif')[$i];
}

for ($i=9; $i<count( $this->sentiment->getList('netral')); $i++)
{ 
    $keynet[] = $this->sentiment->getList('netral')[$i];
}

for ($i=39; $i<count( $this->sentiment->getList('negatif')); $i++)
{ 
    $keyneg[] = $this->sentiment->getList('negatif')[$i];
}
// ------------------------------------------------------------------------------------------
// ---------------------------------- TABEL VIEW --------------------------------------------
// ------------------------------------------------------------------------------------------

$datatweets = DB::table('socmed_analysis')->orderBy('created_at','dsc')->get();

    foreach ($datatweets as $key => $datatweet) {

    if ($datatweet->sentiment == 'negatif') {
            $tweet =   $this->highlightkeyword($datatweet->tweet, $keyneg, "#fd79a8"); 
    }

    elseif ($datatweet->sentiment == 'positif') {
            $tweet =   $this->highlightkeyword($datatweet->tweet, $keypos, "#00b894"); 
    }

    else
            $tweet =   $this->highlightkeyword($datatweet->tweet, $keynet, "#6c5ce7"); 

    
    $dbtweets [] = [ 'id_twitter' => $datatweet->id_twitter,
                    'nama_akun' => $datatweet->nama_akun,
                    'tweet' => $tweet,
                    'sentiment' => $datatweet->sentiment,
                    'score_positif' => $datatweet->score_positif,
                    'score_netral' => $datatweet->score_netral,
                    'score_negatif' => $datatweet->score_negatif,
                    'created_at' => $datatweet->created_at
                    ];

    }

// ###########################################################################################################
// ###################################### GET DATA CHART #####################################################
// ###########################################################################################################
    $year = Carbon::now()->year; //tahun sekarang
    $month = Carbon::now()->month; //bulan sekarang
    $month1 = Carbon::now()->format('F Y'); //bulan tahun
    $tgl  = Carbon::now()->format('l j F Y');
    $tgl1 = Carbon::now()->day; //tanggal sekarang

    $awal_bulan =   Carbon::now()->startOfMonth()->toDateTimeString();
    $akhir_bulan =  Carbon::now()->EndOfMonth()->toDateTimeString();

    for ($m1=1; $m1<=12; $m1++) {       //loop all name month
     $allmonth[] = date('F', mktime(0,0,0,$m1, 1, date('Y')));
     }

    $jml_tgl = Carbon::now()->endofMonth()->day;   //total tgl pd bulan
     for ($t=1; $t<=$jml_tgl; $t++) {
     $alltgl[] = $t;
     }


     for ($m=1; $m<=12; $m++) {
    $dt[]  = Carbon::create($year, $m, 1, 0, 0, 0)->startofMonth()->toDateTimeString();
    $dt2[]  = Carbon::create($year, $m, 1, 0, 0, 0)->endofMonth()->toDateTimeString();

    }

    // FUNGSI CHART TOTAL  
    $total_positif      = $this->ChartTotal->charttotal('positif');
    $total_netral       = $this->ChartTotal->charttotal('netral');
    $total_negatif      = $this->ChartTotal->charttotal('negatif');


    // FUNGSI CHART PERBULAN
    for ($b=0; $b<=11; $b++) {
    $bulan_positif[]     = $this->ChartPerBulan->chartperbulan('positif', $dt[$b], $dt2[$b]);
    $bulan_netral[]     = $this->ChartPerBulan->chartperbulan('netral', $dt[$b], $dt2[$b]);
    $bulan_negatif[]     = $this->ChartPerBulan->chartperbulan('negatif', $dt[$b], $dt2[$b]);
    }
    $bulan_positif2     = $this->ChartPerBulan->chartperbulan('positif', $awal_bulan, $akhir_bulan);
    $bulan_netral2     = $this->ChartPerBulan->chartperbulan('netral', $awal_bulan, $akhir_bulan);
    $bulan_negatif2     = $this->ChartPerBulan->chartperbulan('negatif', $awal_bulan, $akhir_bulan);


    // FUNGSI CHART PERHARI
    for ($d=0; $d<$jml_tgl; $d++) {
    $tgl_positif[]     = $this->ChartPerHari->chartperhari('positif', $month, $alltgl[$d]);
    $tgl_netral[]     = $this->ChartPerHari->chartperhari('netral', $month, $alltgl[$d]);
    $tgl_negatif[]     = $this->ChartPerHari->chartperhari('negatif', $month, $alltgl[$d]);
    }
    $tgl_positif2     = $this->ChartPerHari->chartperhari('positif', $month, $tgl1);
    $tgl_netral2     = $this->ChartPerHari->chartperhari('netral', $month, $tgl1);
    $tgl_negatif2     = $this->ChartPerHari->chartperhari('negatif', $month, $tgl1);
// =======================================================================================================
// =======================================================================================================


    return view('socmed/socmedanalysis',compact('keypos', 'keynet', 'keyneg',
                'year', 'month', 'month1', 'allmonth', 'alltgl', 'tgl', 
                'bulan_positif', 'bulan_netral', 'bulan_negatif',
                'bulan_positif2', 'bulan_netral2', 'bulan_negatif2',
                'tgl_positif', 'tgl_netral', 'tgl_negatif',
                'tgl_positif2', 'tgl_netral2', 'tgl_negatif2',
                'get_profile', 'tweet_mention', 'get_data', 'dbtweets',
                'total_positif', 'total_netral', 'total_negatif'

        ));
    }



// =======================================================================================================
// ===================================== HAPUS TWEET======================================================
// =======================================================================================================
public function delete_tweet($id_twitter)
    {
    $tweetdelete = DB::table('socmed_analysis')->where('id_twitter', $id_twitter)->delete();
    return redirect('dashboard-socmed/analysis')->with('delete', 'Data Tweet telah dihapus'); 
    }
// =======================================================================================================
// ======================================================================================================= 


}
