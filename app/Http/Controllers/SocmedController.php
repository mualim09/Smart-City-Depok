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



        public function twitterUserTimeLine(Request $request)
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
        $paginatedItems->setPath($request->url());



  



        // return $data1;
    return view('socmed/dashboard3', compact('data1_mention'), ['data1' => $paginatedItems]);
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
