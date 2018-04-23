<?php


namespace App\Http\Controllers;
use Antoineaugusti\LaravelSentimentAnalysis\SentimentAnalysis;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PHPInsight\Sentiment;
use Twitter;
use File;

class SocmedController extends Controller
{
// Inisialisasi awal
    protected $sentiment;
    protected $SentimentAnalysis;



    public function __construct(Sentiment $sentiment, SentimentAnalysis $SentimentAnalysis)
    {
        $this->middleware('auth');
        $this->sentiment = $sentiment;
        $this->SentimentAnalysis = $SentimentAnalysis;
    }





















        public function twitterUserTimeLine()
    {

    // $data = Twitter::getMentionsTimeline(['count' => 3, 'format' => 'array']);

    // $nilai = [];
    // for ($i=0; $i < count($data); $i++) { 
    //     $nilai[$i] = [

    //         'score' => $this->sentiment->score($data[$i]['text'])
    //     ];
    // }

    // $tweet =[];
    // for ($i=0; $i < count($data); $i++) { 
    //     $tweet[$i] = [

    //         'id_twitter' => $data[$i]['id'],
    //         'nama_akun' => $data[$i]['user']['name'],
    //         'tweet' => $data[$i]['text'],
    //         'sentiment' => $this->SentimentAnalysis->decision($data[$i]['text']),
    //         'score_positif' => $nilai[$i]['score']['positif'],
    //         'score_netral' => $nilai[$i]['score']['netral'],
    //         'score_negatif' => $nilai[$i]['score']['negatif'],
    //         'created_at' => $data[$i]['created_at'],
    //     ];
    // }



    // DB::table('twitter_analysis')->insert($tweet);


    // return $data;
    return view('socmed/dashboard3',compact('data'));
    // return $tweet;
    }

    public function profile()
    {
    // $data = Twitter::getDmsOut(['count' => 20, 'format' => 'array']);
    // return $data;
    return view('socmed/socmedprofile',compact('data'));
    } 


    public function analysis()
    {
    // $data = Twitter::getDmsOut(['count' => 20, 'format' => 'array']);
    // return $data;
    return view('socmed/socmedanalysis',compact('data'));
    } 


 
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function tweet(Request $request)
    {
    $this->validate($request, [
        'tweet' => 'required'
        ]);


    $newTwitte = ['status' => $request->tweet];

    
    if(!empty($request->images)){
    foreach ($request->images as $key => $value) {
    $uploaded_media = Twitter::uploadMedia(['media' => File::get($value->getRealPath())]);
    if(!empty($uploaded_media)){
                    $newTwitte['media_ids'][$uploaded_media->media_id_string] = $uploaded_media->media_id_string;
                }
    }
    }


    $twitter = Twitter::postTweet($newTwitte);

    
    return back();
    }
}
