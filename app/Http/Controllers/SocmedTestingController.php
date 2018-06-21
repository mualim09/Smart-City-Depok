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
    protected $sentiment;
    protected $SentimentAnalysis;
    protected $GetList;

public function __construct(Sentiment $sentiment, SentimentAnalysis $SentimentAnalysis)
    {
        $this->sentiment = $sentiment;
        $this->SentimentAnalysis = $SentimentAnalysis;
        // $this->GetList = $GetList;
    }



function highlights($text, $words, $case = false) { 
 
 $words = trim($words);
 $words_array = explode(',', $words);
 
 $regex = ($case !== false) ? '/\b(' . implode('|', array_map('preg_quote', $words_array)) . ')\b/i' : '/\b(' . implode('|', array_map('preg_quote', $words_array)) . ')\b/';
 foreach($words_array as $word) { 
  if(strlen(trim($word)) != 0) 
   $text = preg_replace($regex, '<font style="background: yellow";>$1</font>', $text);
  } 
 
 return $text;
}



function highlightkeyword($strs, $searchs, $color) {
    $newstring = $strs;
    
    foreach ($searchs as $search) {
    $str = $newstring ;
    $highlightcolor = $color;
    $occurrences = substr_count(strtolower($str), strtolower($search));
    $match = array();
 
    for ($i=0;$i<$occurrences;$i++) {
        $match[$i] = stripos($str, $search, $i);
        $match[$i] = substr($str, $match[$i], strlen($search));
        $newstring = str_replace($match[$i], '[#]'.$match[$i].'[@]', strip_tags($newstring));
    }
 }
    $newstring = str_replace('[#]', '<span style="color: '.$highlightcolor.';">', $newstring);
    $newstring = str_replace('[@]', '</span>', $newstring);

    
    
    return $newstring;
}




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

public function test()
	{
// define('STR_HIGHLIGHT_SIMPLE', 1);

// /**
//  * Only match whole words in the string
//  * (off by default)
//  */
// define('STR_HIGHLIGHT_WHOLEWD', 2);

// /**
//  * Case sensitive matching
//  * (off by default)
//  */
// define('STR_HIGHLIGHT_CASESENS', 4);

// /**
//  * Overwrite links if matched
//  * This should be used when the replacement string is a link
//  * (off by default)
//  */
// define('STR_HIGHLIGHT_STRIPLINKS', 8);
// $datatweets = DB::table('socmed_analysis')->orderBy('created_at','dsc')->get();

//     foreach ($datatweets as $key => $dt) {

//     if ($dt->sentiment == 'negatif') {
//             $tweet =   $this->highlightkeyword($dt->tweet, $keyneg, "#fd79a8"); 
//     }

//     elseif ($dt->sentiment == 'positif') {
//             $tweet =   $this->highlightkeyword($dt->tweet, $keypos, "#00b894"); 
//     }

//     else
//             $tweet =   $this->highlightkeyword($dt->tweet, $keynet, "#6c5ce7"); 

    
//     $dbtweets [] = [ 'id_twitter' => $dt->id_twitter,
//                     'nama_akun' => $dt->nama_akun,
//                     'tweet' => $tweet,
//                     'sentiment' => $dt->sentiment,
//                     'score_positif' => $dt->score_positif,
//                     'score_netral' => $dt->score_netral,
//                     'score_negatif' => $dt->score_negatif,
//                     'score_negatif' => $dt->score_negatif
//                     ];

//     }
// =================================================================================================================
// for ($m=1; $m<=12; $m++) {
//      $month[] = date('F', mktime(0,0,0,$m, 1, date('Y')));
//      }

// 	$year = Carbon::now()->year;

// for ($m=1; $m<=12; $m++) {
// 	$dt[]  = Carbon::create($year, $m, 1, 0, 0, 0)->startofMonth()->toDateTimeString();
// 	$dt2[]  = Carbon::create($year, $m, 1, 0, 0, 0)->endofMonth()->toDateTimeString();

// }

// $jml_tgl = Carbon::now()->endofMonth()->day;   //total tgl pd bulan
//      for ($t=1; $t<=$jml_tgl; $t++) {
//      $alltgl[] = $t;
//      }

//     $month = Carbon::now(); //bulan sekaang
//     $month1 = $month->format('F Y');

//===============================================================================================================
// $string = 'I like match1 and a match3, and here is match2';
// $newstring = $string;


// $highlightcolor = "#fd79a8";
// $newstring = str_replace('[#]', '<span style="color: '.$highlightcolor.';">', $newstring);
// $newstring = str_replace('[@]', '</span>', $newstring);

// $find = array('/match1/', '/match2/');
// $replace = array($newstring);

// $data = preg_replace($find, $replace, $string);
// ==================================================================================================================





for ($i=37; $i<count( $this->sentiment->getList('positif')); $i++)
{ 
    $keypos[] = $this->sentiment->getList('positif')[$i];
}

for ($i=9; $i<count( $this->sentiment->getList('netral')); $i++)
{ 
    $keynet[] = $this->sentiment->getList('netral')[$i];
}

for ($i=39; $i<count( $this->sentiment->getList('negatif')); $i++)
{ 
    $keyneg[] = $this->sentiment->getList('negatif')[$i];
}


// $string = 'Lampu penerangan jalan sepanjang jl. Juanda Depok mati semua. Rawan dan membahayakan pengguna jalan. @RadioElshinta @pemkotdepok';
// $search = $keyneg;
// $highlight = 'green';
// $dbtweets = $this->str_highlight($string, $search, STR_HIGHLIGHT_SIMPLE|STR_HIGHLIGHT_WHOLEWD, '<span style="color: '.$highlight.'">\1</span>');

return $keynet; 
// return $data;

	}


}
