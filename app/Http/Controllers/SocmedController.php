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
    protected $GetProfile;

        
    public function __construct(Sentiment $sentiment, SentimentAnalysis $SentimentAnalysis, SocmedRepository $gettweet,
            SocmedRepository $getprofile)
    {
        $this->middleware('auth');
        $this->sentiment = $sentiment;
        $this->SentimentAnalysis = $SentimentAnalysis;
        $this->GetTweet = $gettweet;
        $this->GetProfile = $getprofile;

     // global $gambar;
     // global $data1;
    }

    // ===============================================================================================================================



        public function twitterUserTimeLine()
    {
    $profile       = Twitter::getUsers([
                        'user_id' => '1000962488739885056', 
                        'screen_name' => 'HiDepok',
                        'format' => 'array' 
                        ]);

    $get_home       = Twitter::getHomeTimeline([
                        'widget_type' => 'video', 
                        'count' => '50', 
                        'since_id' => 5, 
                        'tweet_mode' => 'extended', 
                        'format' => 'array']);

    $get_mention    =  Twitter::getMentionsTimeline([
                        'widget_type' => 'video', 
                        'count' => '50',
                        'tweet_mode' => 'extended',
                        'format' => 'array']);

    $get_like       =  Twitter::getFavorites([
                        'include_entities' => 'true',
                        'count' => '50',
                        'format' => 'array']);

    $mytweet        = Twitter::getUserTimeline([
                        'count' => '200', 
                        'tweet_mode' => 'extended', 
                        'format' => 'array']);





    $data1          = $this->GetTweet->gettweet($get_home);
    $data1_mention  =$this->GetTweet->gettweet($get_mention);

    $data1_like     =$this->GetTweet->gettweet($get_like);
    $get_profile    = $this->GetProfile->getprofile($profile);

    $data1_retweet     =$this->GetTweet->gettweet($mytweet);


// ============================================================================================


    // return $data1;
    // return $data1_like;
    return view('socmed/dashboard3', compact('get_profile', 'data1_mention', 'data1', 'data1_like', 'data1_retweet'));
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

        public function destroytweet(Request $request)
    {
    $destroytweet = Twitter::destroyTweet($request->id_twitter, ['trim_user' => '1']);
    return back();  
    }




        public function reply(Request $request)
    {
    $this->validate($request, [
        'tweet' => 'required',
        ]);
    $newTwitte =    [
                    'status' => $request->tweet,
                     'in_reply_to_status_id' => $request->id_twitter
                    ];

    
    if(!empty($request->images)){
    foreach ($request->images as $key => $value) {
    $uploaded_media = Twitter::uploadMedia(['media' => File::get($value->getRealPath())]);
    if(!empty($uploaded_media)){
                    $newTwitte['media_ids'][$uploaded_media->media_id_string] = $uploaded_media->media_id_string;
                }
    }
    }
    $reply = Twitter::postTweet($newTwitte);
    return back();
    }


            public function retweet(Request $request)
    {
    $retweet = Twitter::postRt($request->id_twitter, ['trim_user' => '1']);
    return back();
    }

            public function unretweet(Request $request)
    {
    $unretweet = Twitter::undoRt($request->id_twitter, ['trim_user' => '1']);
    return back();
    }


            public function like(Request $request)
    {
    $like = Twitter::postFavorite(['id'=>($request->id_twitter)], ['include_entities' => '1']);
    return back();  
    }

    public function unlike(Request $request)
    {
    $unlike = Twitter::destroyFavorite(['id'=>($request->id_twitter)], ['include_entities' => '1']);
    return back();  
    }



        public function reply(Request $request)
    {
    $this->validate($request, [
        'tweet' => 'required',
        ]);
    $newTwitte =    [
                    'status' => $request->tweet,
                     'in_reply_to_status_id' => $request->id_twitter
                    ];

    
    if(!empty($request->images)){
    foreach ($request->images as $key => $value) {
    $uploaded_media = Twitter::uploadMedia(['media' => File::get($value->getRealPath())]);
    if(!empty($uploaded_media)){
                    $newTwitte['media_ids'][$uploaded_media->media_id_string] = $uploaded_media->media_id_string;
                }
    }
    }
    $reply = Twitter::postTweet($newTwitte);
    return back();
    }


            public function retweet(Request $request)
    {
    // $this->validate($request, [
    //     'tweet' => 'required',
    //     ]);
    $newTwitte =    [
                    'trim_user' => 'true',
                    'id' => $request->id_twitter
                    // 'status' => $request->tweet
                    ];

    // json_encode($newTwitte);
    // if(!empty($request->images)){
    // foreach ($request->images as $key => $value) {
    // $uploaded_media = Twitter::uploadMedia(['media' => File::get($value->getRealPath())]);
    // if(!empty($uploaded_media)){
    //                 $newTwitte['media_ids'][$uploaded_media->media_id_string] = $uploaded_media->media_id_string;
    //             }
    // }
    // }
    $retweet = Twitter::postRt($newTwitte);
    return back();
    }











}
