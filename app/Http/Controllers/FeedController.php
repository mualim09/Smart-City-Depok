<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Feeds;
use Location;
use DB;
use App\ModelVisitor;

class FeedController extends Controller
{
    public function berita()
    {
    	$ip= \Request::ip();
	    $data = Location::get('182.23.86.44');


		ModelVisitor::create([
            'ip'     		 => $ip,
            'country_name'   => $data->countryName,
            'country_code'   => $data->countryCode,
            'region_name' 	 => $data->regionName,
            'region_code'	 => $data->regionCode,
            'city_name'		 => $data->cityName,
            'zip_code'		 => $data->zipCode,
            'iso_code'		 => $data->isoCode,
            'postal_code'	 => $data->postalCode,
            'latitude'		 => $data->latitude,
            'longitude'		 => $data->longitude,
            'metro_code'	 => $data->metroCode,
            'area_code'		 => $data->areaCode,
            'driver'		 => $data->driver
        ]);

    	$feed = \Feeds::make(['http://www.depoknews.id/feed/', 'http://www.depokpos.com/feed/', 
                        'http://www.depoktik.co.id/feed/', 'http://feeds.feedburner.com/depokgoid'], 1);

        $beritas = $feed->get_items(); //grab all items inside the rss
        $articles = array();
        foreach($beritas as $beritass)
        {
        	$deskripsi = (explode(";", $beritass->data['child']['']['description']['0']['data']));
        	$artikel = array();
        		array_push($artikel, $beritass->data['child']['']['title']['0']['data']);
        		array_push($artikel, $beritass->data['child']['']['link']['0']['data']);
        		array_push($artikel, substr($deskripsi[1],0,35));
        	array_push($articles, $artikel);
        }

        include(app_path('\Notification.php'));
      return view('/welcome', compact('beritas','articles'));
    }
}