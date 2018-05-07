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
    protected $sentiment;
    protected $SentimentAnalysis;
    protected $ChartTotal;


    public function __construct(Sentiment $sentiment, SentimentAnalysis $SentimentAnalysis, SocmedRepository $charttotal)
    {
        $this->middleware('auth');
        $this->sentiment = $sentiment;
        $this->SentimentAnalysis = $SentimentAnalysis;
        $this->ChartTotal = $charttotal;
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

    $data_search = Twitter::getSearch([
    	'q'				=> 'pemkotdepok',
        'tweet_mode' => 'extended',
    	'result_type'	=> 'recent',
    	'format' 		=> 'array',
    	'count' 		=> 100,
    	]);

    $get_data          = $this->getanalysisdata($data_search);
    
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
            
    $total_positif         = $this->ChartTotal->charttotal('positif');
    $total_netral          = $this->ChartTotal->charttotal('netral');
    $total_negatif         = $this->ChartTotal->charttotal('negatif');
    





    return view('socmed/socmedanalysis',compact('tweet_mention', 'get_data', 'dbtweets',

            'total_positif', 'total_netral', 'total_negatif'

        ));
    } 


}
