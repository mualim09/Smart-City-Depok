<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Antoineaugusti\LaravelSentimentAnalysis\SentimentAnalysis;
use Illuminate\Support\Facades\DB;
use PHPInsight\Sentiment;
use Twitter;
use File;
use App\Repositories\SocmedRepository;

class SocmedController extends Controller
{
// Inisialisasi awal
    protected $sentiment;
    protected $SentimentAnalysis;
    protected $GetTweet;

        
    public function __construct(Sentiment $sentiment, SentimentAnalysis $SentimentAnalysis, SocmedRepository $gettweet)
    {
        $this->middleware('auth');
        $this->sentiment = $sentiment;
        $this->SentimentAnalysis = $SentimentAnalysis;
        $this->GetTweet = $gettweet;

     // global $gambar;
     // global $data1;
    }

    // ===============================================================================================================================



        public function twitterUserTimeLine()
    {
    $get_home       = Twitter::getHomeTimeline([
                        'widget_type' => 'video', 
                        'count' => 25, 
                        'since_id' => 5, 
                        'tweet_mode' => 'extended', 
                        'format' => 'array']);

    $get_mention    =  Twitter::getMentionsTimeline([
                        'widget_type' => 'video', 
                        'count' => 10,
                        'tweet_mode' => 'extended',
                        'format' => 'array']);

    $data1          = $this->GetTweet->gettweet($get_home);
    $data1_mention  =$this->GetTweet->gettweet($get_mention);
// ============================================================================================


        // return $data1;
    return view('socmed/dashboard3', compact('data1_mention', 'data1'));
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
