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


    public function __construct(Sentiment $sentiment, SentimentAnalysis $SentimentAnalysis, SocmedRepository $charttotal,
                        SocmedRepository $getprofile, SocmedRepository $chartperbulan)
    {
        $this->middleware('auth');
        $this->GetProfile = $getprofile;
        $this->sentiment = $sentiment;
        $this->SentimentAnalysis = $SentimentAnalysis;

        $this->ChartTotal = $charttotal;
        $this->ChartPerBulan = $chartperbulan;
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
                    'user_id' => '171893613', 
                    'screen_name' => 'Tegar09',
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

// =======================================================================================================
// FUNGSI CHART
            
    $total_positif      = $this->ChartTotal->charttotal('positif');
    $total_netral       = $this->ChartTotal->charttotal('netral');
    $total_negatif      = $this->ChartTotal->charttotal('negatif');


    $janfeb_positif     = $this->ChartPerBulan->chartperbulan('positif', '2018-01-01', '2018-02-28');
    $janfeb_netral      = $this->ChartPerBulan->chartperbulan('netral', '2018-01-01', '2018-02-28');
    $janfeb_negatif     = $this->ChartPerBulan->chartperbulan('negatif', '2018-01-01', '2018-02-28');

    $marap_positif     = $this->ChartPerBulan->chartperbulan('positif', '2018-03-01', '2018-04-30');
    $marap_netral      = $this->ChartPerBulan->chartperbulan('netral', '2018-03-01', '2018-04-30');
    $marap_negatif     = $this->ChartPerBulan->chartperbulan('negatif', '2018-03-01', '2018-04-30');

    $meijun_positif     = $this->ChartPerBulan->chartperbulan('positif', '2018-05-01', '2018-06-30');
    $meijun_netral      = $this->ChartPerBulan->chartperbulan('netral', '2018-05-01', '2018-06-30');
    $meijun_negatif     = $this->ChartPerBulan->chartperbulan('negatif', '2018-05-01', '2018-06-30');

    $julag_positif     = $this->ChartPerBulan->chartperbulan('positif', '2018-07-01', '2018-08-31');
    $julag_netral      = $this->ChartPerBulan->chartperbulan('netral', '2018-07-01', '2018-08-31');
    $julag_negatif     = $this->ChartPerBulan->chartperbulan('negatif', '2018-07-01', '2018-08-31');

    $sepok_positif     = $this->ChartPerBulan->chartperbulan('positif', '2018-09-01', '2018-10-31');
    $sepok_netral      = $this->ChartPerBulan->chartperbulan('netral', '2018-09-01', '2018-10-31');
    $sepok_negatif     = $this->ChartPerBulan->chartperbulan('negatif', '2018-09-01', '2018-10-31');

    $novdes_positif     = $this->ChartPerBulan->chartperbulan('positif', '2018-11-01', '2018-12-31');
    $novdes_netral      = $this->ChartPerBulan->chartperbulan('netral', '2018-11-01', '2018-12-31');
    $novdes_negatif     = $this->ChartPerBulan->chartperbulan('negatif', '2018-11-01', '2018-12-31');

    return view('socmed/socmedanalysis',compact('get_profile', 'tweet_mention', 'get_data', 'dbtweets',

            'total_positif', 'total_netral', 'total_negatif',

            'janfeb_positif', 'janfeb_netral', 'janfeb_negatif', 'marap_positif', 'marap_netral', 'marap_negatif',
            'meijun_positif', 'meijun_netral', 'meijun_negatif', 'julag_positif', 'julag_netral', 'julag_negatif',
            'sepok_positif', 'sepok_netral', 'sepok_negatif', 'novdes_positif', 'novdes_netral', 'novdes_negatif'

        ));
    } 


}
