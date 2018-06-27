<?php

 
namespace App\Repositories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;
use Twitter;
use File;
use Request;

class SocmedRepository
{


    public function getprofile($data){

    $profile = [];

    $gambarprofile = str_replace("_normal", "", $data['profile_image_url_https']);

        $profile =
        [
            'id_akun'           => $data['id_str'],
            'nama'              => $data['name'],
            'nama_akun'         => $data['screen_name'],
            'deskripsi'         => $data['description'],
            'gambar_akun'       => $gambarprofile,
            'gambar_banner'     => $data['profile_banner_url'],
            'location'          => $data['location'],
            'url'               => $data['url'],
            'followers_count'   => $data['followers_count'],
            'friends_count'     => $data['friends_count'],
            'tweets'            => $data['statuses_count'],
            'created_at'        => $data['created_at'],
        ];    
    
    
    return $profile;

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
    else{
        $text_full = $data[$i]['text'];
    }
//=============================================================
//
   if (!empty($data[$i]['retweeted_status'])) {
        $retweet_status = $data[$i]['retweeted_status'];
    }
    else{
        $retweet_status = '';
    }

//=============================================================
   
    if ($data[$i]['favorited'] == 'true' ) {
        $like_status = 'true';
    }
    else{
        $like_status = '';
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
            'retweet_status'     => $retweet_status,
            'like_status'       => $like_status
        ];    
    } 


        // Get current page form url e.x. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
 
        // Create a new Laravel collection from the array data
        $itemCollection = collect($data1);
 
        // Define how many items we want to be visible in each page
        $perPage = 15;
 
        // Slice the collection to get the items to display in current page
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
 
        // Create our paginator and pass it to the view
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
 
        // set url path for generted links
        $paginatedItems->setPath(Request::url());

    return $paginatedItems; 
	}
// #########################################################################################################################
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


        $koneksi = Twitter::getFriendships(['source_id'           => '1000962488739885056',
                                                  'source_screen_name'  => 'HiDepok',
                                                  'target_id'           => $data[$i]['id_str'],
                                                  'target_screen_name'  => $data[$i]['screen_name']
                                                 ]);


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
            'status_following'  => $koneksi->relationship->source->following,
            'status_follower'   => $koneksi->relationship->source,
            'created_at'        => $data[$i]['created_at'],
        ];    
    }

    // Get current page form url e.x. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
 
        // Create a new Laravel collection from the array data
        $itemCollection = collect($follow);
 
        // Define how many items we want to be visible in each page
        $perPage = 8;
 
        // Slice the collection to get the items to display in current page
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
 
        // Create our paginator and pass it to the view
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
 
        // set url path for generted links
        $paginatedItems->setPath(Request::url());

    return $paginatedItems;
    }

// ########################################################################################################################


    public function charttotal($sentiment){
    return  DB::table('socmed_analysis')
            ->where('sentiment', $sentiment)
            ->count();

    }

    public function chartperbulan($sentiment, $tglawal, $tglakhir ){
    return  DB::table('socmed_analysis')
            ->where('sentiment', $sentiment)
            ->whereBetween('created_at', [$tglawal, $tglakhir])
            ->count();

    }

    public function chartperhari($sentiment, $month, $alltgl ){
    return  DB::table('socmed_analysis')
            ->where('sentiment', $sentiment)
            ->whereMonth('created_at', $month)
            ->whereDay('created_at', $alltgl)
            ->count();

    }



// ########################################################################################################################
// ############################################ HIGHLIGH TEXT #############################################################
// ########################################################################################################################

function str_highlight($text, $needle, $options = null, $highlight = null)
{
    // Default highlighting
    if ($highlight === null) {
        $highlight = '<strong>\1</strong>';
    }

    // Select pattern to use
    if ($options & STR_HIGHLIGHT_SIMPLE) {
        $pattern = '#(%s)#';
        $sl_pattern = '#(%s)#';
    } else {
        $pattern = '#(?!<.*?)(%s)(?![^<>]*?>)#';
        $sl_pattern = '#<a\s(?:.*?)>(%s)</a>#';
    }

    // Case sensitivity
    if (!($options & STR_HIGHLIGHT_CASESENS)) {
        $pattern .= 'i';
        $sl_pattern .= 'i';
    }

$needle = (array) $needle;
foreach ($needle as $needle_s) {
        $needle_s = preg_quote($needle_s);

        // Escape needle with optional whole word check
        if ($options & STR_HIGHLIGHT_WHOLEWD) {
            $needle_s = '\b' . $needle_s . '\b';
        }

        // Strip links
        if ($options & STR_HIGHLIGHT_STRIPLINKS) {
            $sl_regex = sprintf($sl_pattern, $needle_s);
            $text = preg_replace($sl_regex, '\1', $text);
        }

        $regex = sprintf($pattern, $needle_s);
$text = preg_replace($regex, $highlight, $text);
}

    return $text;
}




}