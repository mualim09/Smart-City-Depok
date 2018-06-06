<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Antoineaugusti\LaravelSentimentAnalysis\SentimentAnalysis;
use Illuminate\Support\Facades\DB;
use PHPInsight\Sentiment;
use Twitter;
use File;
use Carbon\Carbon;


// use App\Http\Controllers\SocmedController\viewtweet;

class SocmedTestingController extends Controller
{


public function test()
	{


// for ($m=1; $m<=12; $m++) {
//      $month[] = date('F', mktime(0,0,0,$m, 1, date('Y')));
//      }

	$year = Carbon::now()->year;

for ($m=1; $m<=12; $m++) {
	$dt[]  = Carbon::create($year, $m, 1, 0, 0, 0)->startofMonth()->toDateTimeString();
	$dt2[]  = Carbon::create($year, $m, 1, 0, 0, 0)->endofMonth()->toDateTimeString();

}

$jml_tgl = Carbon::now()->endofMonth()->day;   //total tgl pd bulan
     for ($t=1; $t<=$jml_tgl; $t++) {
     $alltgl[] = $t;
     }

    $month = Carbon::now(); //bulan sekaang
    $month1 = $month->format('F Y');

	return $month1;

	}





}
