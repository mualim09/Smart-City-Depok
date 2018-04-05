<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Repository {

	public function getString(){
		// Available alpha caracters
		$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		// generate a pin based on 2 * 7 digits + a random character
		$pin = mt_rand(1000000, 9999999)
		. mt_rand(10000000, 99999999)
		. $characters[rand(0, strlen($characters) - 1)];
		// shuffle the result
		$string = str_shuffle($pin);
		
		return $string;
	}

	public function getDataKelurahanByKec(Request $request){
	    $data = DB::table('petugas_sikelings')->select('kelurahan')->where('kecamatan', $request->kecamatan)->groupBy('kelurahan')->get();
	    return $data;
	  }

}