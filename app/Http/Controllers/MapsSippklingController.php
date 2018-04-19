<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Repository;
use App\Repositories\DataCountRepository;

class MapsSippklingController extends Controller
{
  protected $repo;

  public function __construct(DataCountRepository $repository){
    $this->repo = $repository;
  }
    public function maps()
    {
      $rss = DB::table('rumah_sehat')->join('petugas_sikelings', 'rumah_sehat.id_petugas', '=', 'petugas_sikelings.id_petugas')
        ->where('status', '=', 'Rumah Sehat')
        ->where('kelurahan', '=', 'limo')
        ->get();
      $trss = DB::table('rumah_sehat')->join('petugas_sikelings', 'rumah_sehat.id_petugas', '=', 'petugas_sikelings.id_petugas')
        ->where('status', '=', 'Rumah Tidak Sehat')
        ->where('kelurahan', '=', 'limo')
        ->get();
      $krukuts = DB::table('rumah_sehat')->join('petugas_sikelings', 'rumah_sehat.id_petugas', '=', 'petugas_sikelings.id_petugas')
        ->where('status', '=', 'Rumah Sehat')
        ->where('kelurahan', '=', 'krukut')
        ->get();
      $kruts = DB::table('rumah_sehat')->join('petugas_sikelings', 'rumah_sehat.id_petugas', '=', 'petugas_sikelings.id_petugas')
        ->where('status', '=', 'Rumah Tidak Sehat')
        ->where('kelurahan', '=', 'krukut')
        ->get();
      $meruyungs = DB::table('rumah_sehat')->join('petugas_sikelings', 'rumah_sehat.id_petugas', '=', 'petugas_sikelings.id_petugas')
        ->where('status', '=', 'Rumah Sehat')
        ->where('kelurahan', '=', 'meruyung')
        ->get();
      $merts = DB::table('rumah_sehat')->join('petugas_sikelings', 'rumah_sehat.id_petugas', '=', 'petugas_sikelings.id_petugas')
        ->where('status', '=', 'Rumah Tidak Sehat')
        ->where('kelurahan', '=', 'meruyung')
        ->get();
      $grogols = DB::table('rumah_sehat')->join('petugas_sikelings', 'rumah_sehat.id_petugas', '=', 'petugas_sikelings.id_petugas')
        ->where('status', '=', 'Rumah Sehat')
        ->where('kelurahan', '=', 'grogol')
        ->get();
      $grots = DB::table('rumah_sehat')->join('petugas_sikelings', 'rumah_sehat.id_petugas', '=', 'petugas_sikelings.id_petugas')
        ->where('status', '=', 'Rumah Tidak Sehat')
        ->where('kelurahan', '=', 'grogol')
        ->get(); 
      $kecamatans = DB::table('kecamatans')->get();	
      $kelurahans = DB::table('kelurahans')->get();

    	// return view('/sipp-kling-pages/data-tempat/index', ['rss' => $rss, 'trss' => $trss]);
      return view('/sipp-kling-pages/data-tempat/index', ['rss' => $rss, 'trss' => $trss, 'krukuts' => $krukuts, 'kruts' => $kruts, 'meruyungs' => $meruyungs, 'merts' => $merts, 'grogols' => $grogols, 'grots' => $grots, 'kecamatans' => $kecamatans, 'kelurahans' => $kelurahans]); 
    }
}
  //             $krukutsehat = DB::table('rumah_sehat')
      // ->join('petugas_sikelings', 'rumah_sehat.id_petugas', '=', 'petugas_sikelings.id_petugas')
      // ->select('rumah_sehat.status', 'petugas_sikelings.kelurahan')
      // ->where('status', '=', 'Rumah Sehat')
      // ->where('kelurahan', '=', 'krukut')
      // ->count();