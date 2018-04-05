<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class Dashboard2Controller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    

    // public function dataumum()
    // {
    //     return view('pages.inputdata');
    // }

    // public function datamaster()
    // {
    //     return view('pages.inputdata2');
    // }


    public function total()
    {

    $Angkot 	= DB::table('angkots')->count();		// 
    $Apotek 	= DB::table('apoteks')->count();        //
    $Bidan      = DB::table('bidans')->count();         //
    $Jkirim     = DB::table('jasa_pengirimans')->count();//
    $Klinik     = DB::table('kliniks')->count();        //
    $Kuliner    = DB::table('kuliners')->count(); 		//
    $Mall 		= DB::table('malls')->count();   		//
    $Olahraga 	= DB::table('olahragas')->count(); 		//
    $Pasuhan 	= DB::table('panti_asuhans')->count(); 	//
    $Pasar 		= DB::table('pasars')->count(); 		//
    $Pdam 		= DB::table('pdams')->count();  		//
    $Polisi 	= DB::table('pos_polisis')->count();	//
    $Puskesmas 	= DB::table('puskesmass')->count(); 	//
    $Rss 		= DB::table('rss')->count();			//
    $Spbu		= DB::table('spbus')->count();			//
    $Supermarket = DB::table('supermarkets')->count();	//
    $Taman 		= DB::table('tamans')->count();			//
    $Tibadah 	= DB::table('tempat_ibadahs')->count(); //
    $Twisata 	= DB::table('tempat_wisatas')->count(); //
    $Tpu 		= DB::table('tpus')->count();			//
    $Ukm 		= DB::table('ukms')->count();			//
    $Komunitas 	= DB::table('komunitass')->count();		//
    $Damkar     = DB::table('damkars')->count();		//
    $Perpus     = DB::table('perpustakaans')->count();	//
    $Pln        = DB::table('plns')->count(); 			//


    $Univ        = DB::table('universitass')->count();


    $totalM = DB::table('penghargaans')->count();

    $prosesM = DB::table('penghargaans')
    ->where('status', '=', 'diproses')
    ->count();

    $tolakM = DB::table('penghargaans')
    ->where('status', '=', 'ditolak')
    ->count();

    $terimaM = DB::table('penghargaans')
    ->where('status', '=', 'diterima')
    ->count();

    $pendidikanM = DB::table('penghargaans')
    ->where('kategori', '=', 'Pendidikan')
    ->count();

    $kesehatanM = DB::table('penghargaans')
    ->where('kategori', '=', 'Kesehatan')
    ->count();

    $olahragaM = DB::table('penghargaans')
    ->where('kategori', '=', 'Olahraga')
    ->count();

    $teknologiM = DB::table('penghargaans')
    ->where('kategori', '=', 'Teknologi')
    ->count();

    $lingkunganM = DB::table('penghargaans')
    ->where('kategori', '=', 'Lingkungan')
    ->count();

    $umumM = DB::table('penghargaans')
    ->where('kategori', '=', 'Umum')
    ->count();









    return view('pages/dashboard2', compact('Rss', 'Apotek', 'Puskesmas', 'Bidan', 'Klinik', 'Kuliner',
                                             'Mall', 'Pasar', 'Supermarket', 'Taman', 'Tibadah', 'Polisi',
                                             'Pdam', 'Angkot', 'Jkirim', 'Olahraga', 'Pasuhan', 'Spbu',
                                             'Twisata', 'Tpu', 'Ukm', 'Komunitas', 'Damkar',
                                             'Perpus', 'Pln',  'Univ',
                                             'totalM', 'tolakM', 'terimaM', 'pendidikanM', 'kesehatanM', 'prosesM',
                                             'olahragaM', 'teknologiM', 'lingkunganM', 'umumM'));
    }
}
