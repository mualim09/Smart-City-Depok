<?php


namespace App\Repositories;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;
use Antoineaugusti\LaravelSentimentAnalysis\SentimentAnalysis;
use PHPInsight\Sentiment;
use Twitter;
use File;
use Request;

class SocmedRepository
{

    public function __construct(Sentiment $sentiment, SentimentAnalysis $SentimentAnalysis)
    {
        $this->sentiment = $sentiment;
        $this->SentimentAnalysis = $SentimentAnalysis;
    }





	public function gettweet($data){
	
	    $statusid = []; $reply_userid=[]; $reply_userakun=[];

    $type = []; $pictvid = []; $video = [];
    
    $urls = []; $get_url = [];
    
    $text_full = [];
    $data1 = []; 
// ============================================================
    for ($i=0; $i < count($data); $i++) { 
   

    if (!empty($data[$i]['in_reply_to_status_id'])) {
        $statusid = $data[$i]['in_reply_to_status_id'];
        $reply_userid = $data[$i]['in_reply_to_user_id_str'];
        $reply_userakun = $data[$i]['in_reply_to_screen_name'];      
    } 
//=============================================================

    if (!empty($data[$i]['full_text'])) {
        $text_full = $data[$i]['full_text'];
    }
//=============================================================
    if (!empty($data[$i]['entities']['urls'])) {
        $urls = $data[$i]['entities']['urls'];

        for ($u=0; $u < count($urls); $u++) { 
            $get_url = $urls[$u]['expanded_url'];
        }
    }

    elseif ($data[$i]['entities']['urls'] == []){
        $get_url = [];
    }

    else {
        $get_url = [];
    }


// ===========================================================
    
    if (!empty($data[$i]['extended_entities']['media'])) {
        $media = $data[$i]['extended_entities']['media'];
        $type = $data[$i]['extended_entities']['media'][0]['type'];
      
        
        
        // if ($media != []) {
        $gambar = $media[0]['media_url_https'];
        // }
        if (!empty($media[0]['video_info'])) {
            $video = $media[0]['video_info']['variants'][0]['url'];
        }
        else{
            $video = '';
        }

    }

    else
    {
        $media = '';
    }
// ========================================================
    if ($media == '') {
        $pictvid = '';
    }

    elseif ($video == '') {
        $pictvid = $gambar;
    }

    elseif ($video != '') {
        $pictvid = $video;
    }
//==========================================================
    $data1[$i] = [

            'id_twitter' => $data[$i]['id'],
            'gambar_akun' => $data[$i]['user']['profile_image_url_https'],
            'nama'      => $data[$i]['user']['name'],
            'nama_akun' => $data[$i]['user']['screen_name'],
            'nama_akun_url'=> Twitter::linkUser($data[$i]['user']['screen_name']),
            'tweet'     => Twitter::linkify($text_full),
            'pictvid'    => $pictvid,
            'url'       => $get_url,
            'video'     => $video,
            'type'     => $type,
            'retweet_count' => $data[$i]['retweet_count'],
            'favorite_count' => $data[$i]['favorite_count'],
            'created_at' => Twitter::ago($data[$i]['created_at']),
            'in_reply_to_status_id'     => $statusid,
            'in_reply_to_user_id_str'    => $reply_userid,
            'in_reply_to_screen_name'     => $reply_userakun,
        ];    
    } 


        // Get current page form url e.x. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
 
        // Create a new Laravel collection from the array data
        $itemCollection = collect($data1);
 
        // Define how many items we want to be visible in each page
        $perPage = 5;
 
        // Slice the collection to get the items to display in current page
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
 
        // Create our paginator and pass it to the view
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
 
        // set url path for generted links
        $paginatedItems->setPath(Request::url());

    return $paginatedItems; 
	}





    public function charttotal($sentiment){


    return  DB::table('socmed_analysis')
            ->where('sentiment', $sentiment)
            ->count();

    }

}