<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ModelVisitor;
use Location;

class InformasiController extends Controller
{
    public function index()
    {
      $ip= \Request::ip();
      $data = Location::get('182.23.86.44');
      ModelVisitor::create([
            'ip'             => $ip,
            'country_name'   => $data->countryName,
            'country_code'   => $data->countryCode,
            'region_name'    => $data->regionName,
            'region_code'    => $data->regionCode,
            'city_name'      => $data->cityName,
            'zip_code'       => $data->zipCode,
            'iso_code'       => $data->isoCode,
            'postal_code'    => $data->postalCode,
            'latitude'       => $data->latitude,
            'longitude'      => $data->longitude,
            'metro_code'     => $data->metroCode,
            'area_code'      => $data->areaCode,
            'driver'         => $data->driver,
            'bounce_rate'    => 'Informasi'
        ]);
    }
}
