<?php

namespace App\Http\Controllers;
use Twitter;
use File;
use Illuminate\Http\Request;

class SocmedController extends Controller
{
        public function twitterUserTimeLine()
    {
    // $data = Twitter::getHomeTimeline(['count' => 10, 'format' => 'array']);
    // return $data;
    return view('socmed/dashboard3',compact('data'));
    }

    public function profile()
    {
    // $data = Twitter::getHomeTimeline(['count' => 2, 'format' => 'array']);
    // return $data;
    return view('socmed/socmedprofile',compact('data'));
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
