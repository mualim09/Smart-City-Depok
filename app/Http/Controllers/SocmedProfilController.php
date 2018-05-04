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


    public function __construct(Sentiment $sentiment, SentimentAnalysis $SentimentAnalysis, SocmedRepository $gettweet)
    {
        $this->middleware('auth');
        $this->sentiment = $sentiment;
        $this->SentimentAnalysis = $SentimentAnalysis;
        $this->GetTweet = $gettweet;
    }


    public function getfollow($flw){

    $data = []; $profile_banner_url = [];

    $data = $flw['users'];

        for ($i=0; $i < count($data); $i++) { 

        if (!empty($data[$i]['profile_banner_url'])) {
            $profile_banner_url = $data[$i]['profile_banner_url'];
        }

        else{
            $profile_banner_url = '';
        }


        $follow[$i] =
        [
            'id_akun'           => $data[$i]['id_str'],
            'following'         => $data[$i]['following'],
            'nama'              => $data[$i]['name'],
            'nama_akun'         => $data[$i]['screen_name'],
            'deskripsi'         => $data[$i]['description'],
            'gambar_akun'       => $data[$i]['profile_image_url_https'],
            'gambar_banner'     => $profile_banner_url,
            'location'          => $data[$i]['location'],
            'url'               => $data[$i]['url'],
            'followers_count'   => $data[$i]['followers_count'],
            'friends_count'     => $data[$i]['friends_count'],
            'created_at'        => $data[$i]['created_at'],
        ];    
    }

    return $follow; 
    }



    public function profile()
    {
    $following       = Twitter::getFriends([
                        'count' => 8, 
                        'format' => 'array']);

    $followers       = Twitter::getFollowers([
                        'count' => 8, 
                        'format' => 'array']);

    $mytweet        = Twitter::getUserTimeline([
                        'count' => 8, 
                        'tweet_mode' => 'extended', 
                        'format' => 'array']);

    $get_following          = $this->getfollow($following);
    $get_followers          = $this->getfollow($followers);
    $get_tweets             = $this->GetTweet->gettweet($mytweet);

    // return $get_tweets;
    return view('socmed/socmedprofile',compact('get_following', 'get_followers', 'get_tweets'));
    } 



      
}
