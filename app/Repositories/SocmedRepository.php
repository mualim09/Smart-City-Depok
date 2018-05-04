<?php


namespace App\Repositories;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;
use Antoineaugusti\LaravelSentimentAnalysis\SentimentAnalysis;
use PHPInsight\Sentiment;
use Twitter;
use File;


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

    return $data1;


	}

}