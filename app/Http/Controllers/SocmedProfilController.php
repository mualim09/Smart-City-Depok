<?php

namespace App\Http\Controllers;

use Antoineaugusti\LaravelSentimentAnalysis\SentimentAnalysis;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PHPInsight\Sentiment;
use Twitter;
use File;
use App\Repositories\SocmedRepository;

class SocmedProfilController extends Controller
{
  // Inisialisasi awal
    protected $sentiment;
    protected $SentimentAnalysis;
    protected $GetTweet;
    protected $GetFollow;
    protected $GetProfile;


    public function __construct(Sentiment $sentiment, SentimentAnalysis $SentimentAnalysis,
        SocmedRepository $gettweet, SocmedRepository $getfollow, SocmedRepository $getprofile)
    {
        $this->middleware('auth');
        $this->sentiment = $sentiment;
        $this->SentimentAnalysis = $SentimentAnalysis;
        $this->GetTweet = $gettweet;
        $this->GetFollow = $getfollow;
        $this->GetProfile = $getprofile;
    }





    public function profile()
    {


    $following       = Twitter::getFriends([
                        'count' => '200', 
                        'format' => 'array']);

    $followers       = Twitter::getFollowers([
                        'count' => '200', 
                        'format' => 'array']);

    $mytweet        = Twitter::getUserTimeline([
                        'count' => '200', 
                        'tweet_mode' => 'extended', 
                        'format' => 'array']);

    $profile       = Twitter::getUsers([
                        'user_id' => '1000962488739885056', 
                        'screen_name' => 'HiDepok',
                        'format' => 'array'  
                        ]);

    $get_following          = $this->GetFollow->getfollow($following);
    $get_followers          = $this->GetFollow->getfollow($followers);
    $get_tweets             = $this->GetTweet->gettweet($mytweet);
    $get_profile             = $this->GetProfile->getprofile($profile);





    // return $get_following;
    return view('socmed/socmedprofile',compact('get_profile', 'get_following', 'get_followers', 'get_tweets'));
    } 




            public function postfollow(Request $request)
    {
    $postfollow = Twitter::postFollow([
                                        'user_id' => $request->id_akun,
                                        'screen_name' => $request->nama_akun,
                                        'follow'    => '1'
                                      ]);
    return redirect('dashboard-socmed/profile#following');  
    }


            public function postunfollow(Request $request)
    {
    $postunfollow = Twitter::postUnfollow([
                                        'user_id' => $request->id_akun,
                                        'screen_name' => $request->nama_akun
                                      ]);
    return redirect('dashboard-socmed/profile#followers');  
    }


      
}
