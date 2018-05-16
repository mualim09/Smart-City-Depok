<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $user = DB::select('SELECT * from user_android where id_ = ?', [$id_user])
        // ->first();
         
         $user     = DB::table('user_android')
         ->orderBY('id_user', 'dsc')
         ->limit(8)
         ->get();
         $jumlahuser = DB::table('user_android')->count();
         $complaint = DB::table('complaints')->count();
         $visitor = DB::table('visitors')->count(); //untuk menghitung jumlah visitor
         $wilayah = DB::table('visitors')->select('*')->get();
         $angka = 90;
         $persen = "width: ".$angka."%;";

         return view('dashboard', compact('user', 'visitor', 'angka', 'persen', 'jumlahuser', 'complaint'));
    }
} 
