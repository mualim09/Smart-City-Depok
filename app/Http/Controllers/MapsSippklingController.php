<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MapsSippklingController extends Controller
{
    public function maps()
    {
    	$rss = DB::table('rumah_sehat')->join('petugas_sikelings', 'rumah_sehat.id_petugas', '=', 'petugas_sikelings.id_petugas')
    		->where('status', '=', 'Rumah Sehat')
    		->get();
    	$trss = DB::table('rumah_sehat')->join('petugas_sikelings', 'rumah_sehat.id_petugas', '=', 'petugas_sikelings.id_petugas')
    		->where('status', '=', 'Rumah Tidak Sehat')
    		->get();   		

    	return view('/sipp-kling-pages/data-tempat/index', ['rss' => $rss, 'trss' => $trss]);
    }
}
  //             $krukutsehat = DB::table('rumah_sehat')
      // ->join('petugas_sikelings', 'rumah_sehat.id_petugas', '=', 'petugas_sikelings.id_petugas')
      // ->select('rumah_sehat.status', 'petugas_sikelings.kelurahan')
      // ->where('status', '=', 'Rumah Sehat')
      // ->where('kelurahan', '=', 'krukut')
      // ->count();