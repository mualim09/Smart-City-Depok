<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Antoineaugusti\LaravelSentimentAnalysis\SentimentAnalysis;
use Illuminate\Support\Facades\DB;
use PHPInsight\Sentiment;
use Twitter;
use File;

// use App\Http\Controllers\SocmedController\viewtweet;

class SocmedTestingController extends Controller
{


public function trend()
	{

	$trends = Twitter::getTrendsPlace([
						'id' => '1032539', 
                        ]);




	return $trends;

	}





}
