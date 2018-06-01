<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;	
use Location;
use DB;


class VisitorController extends Controller
{
    public function visitor() 
	{
		$ip= \Request::ip();
	    $data = Location::get('103.47.132.55');

		DB::table('visitors')->insert([
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

        return view('/welcome');
	
	}
}
