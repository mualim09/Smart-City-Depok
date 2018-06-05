<?php

namespace App\Http\Controllers;

use Antoineaugusti\LaravelSentimentAnalysis\SentimentAnalysis;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PHPInsight\Sentiment;
use Twitter;
use File;
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


    public function __construct(Sentiment $sentiment, SentimentAnalysis $SentimentAnalysis, SocmedRepository $charttotal,
                        SocmedRepository $getprofile, SocmedRepository $chartperbulan, SocmedRepository $chartperhari)
    {
        $this->middleware('auth');
        $this->GetProfile       = $getprofile;
        $this->sentiment        = $sentiment;
        $this->SentimentAnalysis = $SentimentAnalysis;

        $this->ChartTotal       = $charttotal;
        $this->ChartPerBulan    = $chartperbulan;
        $this->ChartPerHari     = $chartperhari;
    }

    
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

    $checkdata = DB::table('socmed_analysis')->where('id_twitter', $ds[$i]['id'])->get()->count();

        if($checkdata == 0){
          DB::table('socmed_analysis')->insert($data1[$i]);
        }
    }

}
return $data1;
}
// ================================================================================================


        public function analysis()
    {

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

    // $d_search = Twitter::getSearch([
    //     'q'             => "pemkotdepok macet",
    //     'tweet_mode'    => 'extended',
    //     'result_type'   => 'recent',
    //     'format'        => 'array',
    //     'count'         => 100,
    //     ]);

    $get_data                   = $this->getanalysisdata($data_search);
    $get_profile                = $this->GetProfile->getprofile($profile);
    
// // ======================================================================================================
//     $data_mention = Twitter::getMentionsTimeline(['count' => 10, 'format' => 'array']);	
//     $nilai_mention = [];
//     for ($i=0; $i < count($data_mention); $i++) { 
//         $nilai_mention[$i] = [

//             'score' => $this->sentiment->score($data_mention[$i]['text'])
//         ];
//     }

//     $tweet_mention = [];
//     for ($i=0; $i < count($data_mention); $i++) { 
//         $tweet_mention[$i] = [
//             'id_twitter' => $data_mention[$i]['id'],
//             'nama_akun' => $data_mention[$i]['user']['name'],
//             'tweet' => $data_mention[$i]['text'],
//             'sentiment' => $this->SentimentAnalysis->decision($data_mention[$i]['text']),
//             'score_positif' => $nilai_mention[$i]['score']['positif'],
//             'score_netral' => $nilai_mention[$i]['score']['netral'],
//             'score_negatif' => $nilai_mention[$i]['score']['negatif'],
//             'created_at' => $data_mention[$i]['created_at'],
//         ];

//         $checkdata = DB::table('socmed_analysis')->where('id_twitter', $data_mention[$i]['id'])->get()->count();
//         if($checkdata == 0){
//           DB::table('socmed_analysis')->insert($tweet_mention[$i]);
//         }
//     }
// =======================================================================================================

    $dbtweets = DB::table('socmed_analysis')->orderBy('created_at','dsc')->get();

    $year = Carbon::now()->year; //tahun sekarang
    $month = Carbon::now()->month; //bulan sekarang
    $month1 = Carbon::now()->format('F Y'); //bulan tahun
    $tgl  = Carbon::now()->format('l j F Y');

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


// =======================================================================================================
// FUNGSI CHART
            
    $total_positif      = $this->ChartTotal->charttotal('positif');
    $total_netral       = $this->ChartTotal->charttotal('netral');
    $total_negatif      = $this->ChartTotal->charttotal('negatif');

    for ($b=0; $b<=11; $b++) {
    $bulan_positif[]     = $this->ChartPerBulan->chartperbulan('positif', $dt[$b], $dt2[$b]);
    $bulan_netral[]     = $this->ChartPerBulan->chartperbulan('netral', $dt[$b], $dt2[$b]);
    $bulan_negatif[]     = $this->ChartPerBulan->chartperbulan('negatif', $dt[$b], $dt2[$b]);
    }


    for ($d=0; $d<$jml_tgl; $d++) {
    $tgl_positif[]     = $this->ChartPerHari->chartperhari('positif', $month, $alltgl[$d]);
    $tgl_netral[]     = $this->ChartPerHari->chartperhari('netral', $month, $alltgl[$d]);
    $tgl_negatif[]     = $this->ChartPerHari->chartperhari('negatif', $month, $alltgl[$d]);
    }


    // return $tgl;
    return view('socmed/socmedanalysis',compact('year', 'month', 'month1', 'allmonth', 'alltgl', 'tgl', 
                'bulan_positif', 'bulan_netral', 'bulan_negatif',
                'tgl_positif', 'tgl_netral', 'tgl_negatif',
                'get_profile', 'tweet_mention', 'get_data', 'dbtweets',
                'total_positif', 'total_netral', 'total_negatif'

        ));
    } 


}
