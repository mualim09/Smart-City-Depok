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

for ($i=0; $i<count( $this->sentiment->getList('ignore')); $i++)
{ 
    $keyignore[] = $this->sentiment->getList('ignore')[$i];
}

for ($i=0; $i<count( $this->sentiment->getList('prefix')); $i++)
{ 
    $keyprefix[] = $this->sentiment->getList('prefix')[$i];
}

// $dicti = $keypos+$keynet+$keyneg;

// // 
// $sentence = '@Dishub_Dpk @manto_dpk @pemkotdepok @IdrisAShomad Jangan lupa untuk membenahi Traffic Light perempatan RTM yang sudah 2 tahun lewat mati. Kalo memang tidak terpakai tolong dicabut saja. Tidak berfungsi buat apa dipajang2. akan';

// foreach ($keyneg as $negPrefix) {

//             //Search if that prefix is in the document
//             if (strpos($sentence, $negPrefix) !== false) {
//                 //Reove the white space after the negative prefix
//                 $sentence = str_replace($negPrefix . ' ', $negPrefix, $sentence);
//             }
//         }

// $tokens = $this->sentiment->_getTokens($sentence);
//         // calculate the score in each category

//         $total_score = 0;

//         //Empty array for the scores for each of the possible categories
//         $scores = array();

//         //Loop through all of the different classes set in the $classes variable
//         foreach ($this->classes as $class) {

//             //In the scores array add another dimention for the class and set it's value to 1. EG $scores->neg->1
//             $scores[$class] = 1;

//             //For each of the individual words used loop through to see if they match anything in the $dictionary
//             foreach ($tokens as $token) {

//                 //If statement so to ignore tokens which are either too long or too short or in the $ignoreList
//                 if (strlen($token) > $this->minTokenLength && strlen($token) < $this->maxTokenLength && !in_array($token, $keyignore)) {
//                     //If dictionary[token][class] is set
//                     if (isset($this->dictionary[$token][$class])) {
//                         //Set count equal to it
//                         $count = $this->dictionary[$token][$class];
//                     } else {
//                         $count = 0;
//                     }

//                     //Score[class] is calcumeted by $scores[class] x $count +1 divided by the $classTokCounts[class] + $tokCount
//                     $scores[$class] *= ($count + 1);
//                 }
//             }

//             //Score for this class is the prior probability multiplyied by the score for this class
//             $scores[$class] = $this->prior[$class] * $scores[$class];
//         }


// $tes[] = [

// 'dec1' => $this->SentimentAnalysis->decision('@IdrisAShomad @manto_dpk @dkpdepok1 @pemkotdepok @ipandut arus air kali krukut yang terhambat karena proyek JORR, selain sampah kiriman dr arah wilayah lain DAN tak tuntas untuk pembersihan kali dr kerak lumpur, SUKSES membuat air masuk > TEMBOK perumahan Grand Matoa JEBOL !!😡 https://t.co/WajrXwmwRv'),

// 'dec12' => $this->sentiment->categorise('@IdrisAShomad @manto_dpk @dkpdepok1 @pemkotdepok @ipandut arus air kali krukut yang terhambat karena proyek JORR, selain sampah kiriman dr arah wilayah lain DAN tak tuntas untuk pembersihan kali dr kerak lumpur, SUKSES membuat air masuk > TEMBOK perumahan Grand Matoa JEBOL !!😡 https://t.co/WajrXwmwRv'),


$sc2 = $this->sentiment->score('perbuatan mahasiswa itu sangat tidak pantas');
// 

$sentence = '@bemPNJ perbuataN Mahasiswa itu sangat tidak pantas dilakukan ‡';

foreach ($keyprefix as $negPrefix) {
// if (strpos($sentence, $negPrefix) !== false) {
                //Reove the white space after the negative prefix
                $sentence = str_replace($negPrefix . ' ', $negPrefix, $sentence);
            // }
        }

      $sentence = str_replace("\r\n", " ", $sentence);

      $diac =
                /* A */ chr(192) . chr(193) . chr(194) . chr(195) . chr(196) . chr(197) .
                /* a */ chr(224) . chr(225) . chr(226) . chr(227) . chr(228) . chr(229) .
                /* O */ chr(210) . chr(211) . chr(212) . chr(213) . chr(214) . chr(216) .
                /* o */ chr(242) . chr(243) . chr(244) . chr(245) . chr(246) . chr(248) .
                /* E */ chr(200) . chr(201) . chr(202) . chr(203) .
                /* e */ chr(232) . chr(233) . chr(234) . chr(235) .
                /* Cc */ chr(199) . chr(231) .
                /* I */ chr(204) . chr(205) . chr(206) . chr(207) .
                /* i */ chr(236) . chr(237) . chr(238) . chr(239) .
                /* U */ chr(217) . chr(218) . chr(219) . chr(220) .
                /* u */ chr(249) . chr(250) . chr(251) . chr(252) .
                /* yNn */ chr(255) . chr(209) . chr(241);

        $sentence = strtolower(strtr($sentence, $diac, 'AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn'));
        // $sentence = strtolower($sentence);

        
        $sentence = explode(" ", '@bemPNJ perbuataN Mahasiswa itu sangat tidakpantas dilakukan');

        // for ($i=0; $i<count($sentence) ; $i++) { 
        //     $sentence = strtolower($sentence[$i]);
        // }

 
return $sc2;

	}

}
 




         