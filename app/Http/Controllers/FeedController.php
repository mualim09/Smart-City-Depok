<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Feeds;

class FeedController extends Controller
{
    public function berita()
    {
    	$feed = \Feeds::make(['http://www.depoknews.id/feed/', 'http://www.depokpos.com/feed/', 
                        'http://www.depoktik.co.id/feed/', 'http://feeds.feedburner.com/depokgoid'], 1);

        $beritas = $feed->get_items(); //grab all items inside the rss
      return view('/welcome', ['beritas' => $beritas]);
    }
}
