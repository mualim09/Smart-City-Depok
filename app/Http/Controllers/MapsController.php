<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class MapsController extends Controller
{
    	public function maps()
	{
	    $pdams = DB::table('pdams')->get();
	    $pasars = DB::table('pasars')->get();
	    $kuliners = DB::table('kuliners')->get();
	    $kelurahans = DB::table('kelurahans')->get();
	    $apoteks = DB::table('apoteks')->get();
	    $kliniks = DB::table('kliniks')->get();
	    $rss = DB::table('rss')->get();
	    $puskesmass = DB::table('puskesmass')->get();
	    $bidans = DB::table('bidans')->get();
	    $supermarkets = DB::table('supermarkets')->get();
	    	$indomarets = DB::table('supermarkets')->where('kategori', 'indomaret')->get();
	    	$alfamarts = DB::table('supermarkets')->where('kategori', 'alfamart')->get();
	    	$alfamidis = DB::table('supermarkets')->where('kategori', 'alfamidi')->get();
	    	$markets = DB::table('supermarkets')->where('kategori', 'supermarket')->get();
	    $ukms = DB::table('ukms')->get();
	    $tamans = DB::table('tamans')->get();
	    $tempat_wisatas = DB::table('tempat_wisatas')->get();
	    $tempat_ibadahs = DB::table('tempat_ibadahs')->get();
	    $spbus = DB::table('spbus')->get();
	    $tpus = DB::table('tpus')->get();
	    $olahragas = DB::table('olahragas')->get();
	    $malls = DB::table('malls')->get();
	    $jasa_pengirimans = DB::table('jasa_pengirimans')->get();
	    $kecamatans = DB::table('kecamatans')->get();
	    $plns = DB::table('plns')->get();
	    $damkars = DB::table('damkars')->get();
	    $sds = DB::table('pendidikan_dasars')->get();
	    $smps = DB::table('smps')->get();
	    $smas = DB::table('smas')->get();
	    $perpustakaans = DB::table('perpustakaans')->get();
	    $slbs = DB::table('pendidikan_khususs')->get();
	    $polisis = DB::table('pos_polisis')->get();
	    $universitass = DB::table('universitass')->get();
	    $tentaras = DB::table('tnis')->get();
	    $industris = DB::table('industris')->get();
	    $banks = DB::table('banks')->get();
	    $kantors = DB::table('perkantorans')->get();

	    return view('/maps', ['pdams' => $pdams, 'pasars' => $pasars, 'kuliners' => $kuliners, 'kelurahans' => $kelurahans, 'apoteks' => $apoteks, 'kliniks' => $kliniks, 'rss' => $rss, 'puskesmass' => $puskesmass, 'bidans' => $bidans, 'supermarkets' => $supermarkets, 'ukms' => $ukms, 'tamans' => $tamans, 'tempat_wisatas' => $tempat_wisatas, 'tempat_ibadahs' => $tempat_ibadahs, 'spbus' => $spbus, 'tpus' => $tpus, 'olahragas' => $olahragas, 'malls' => $malls, 'jasa_pengirimans' => $jasa_pengirimans, 'kecamatans' => $kecamatans, 'plns' => $plns, 'damkars' => $damkars, 'sds' => $sds, 'smps' => $smps, 'smas' => $smas, 'perpustakaans' => $perpustakaans, 'slbs' => $slbs, 'polisis' => $polisis, 'universitass' => $universitass, 'tentaras' => $tentaras, 'industris' => $industris, 'banks' => $banks, 'alfamarts' => $alfamarts, 'indomarets' => $indomarets, 'alfamidis' => $alfamidis, 'markets' => $markets, 'kantors' => $kantors]);
	}
}
