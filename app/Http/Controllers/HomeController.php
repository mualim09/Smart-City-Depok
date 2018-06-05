<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\ModelVisitor;

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

         $jumlahuser = DB::table('user_android')->count(); //untuk menghitung jumlah user

         $complaint = DB::table('complaints')->count(); //untuk menghitung complain
         $i = 1;

         //statistik pembaca artikel
         $artikel = ModelVisitor::select('halaman')
         ->distinct()
         ->get();
         $arrayart = array();
         foreach ($artikel as $artikel2) {
            array_push($arrayart, $artikel2->halaman);
        }
        $jmlartikel = ModelVisitor::selectRaw('halaman, count(halaman) as total_halaman')
        ->groupBy('halaman')
        ->get();
        $arrayartjml = array();
        foreach ($jmlartikel as $jmlartikel2) {
            array_push($arrayartjml, $jmlartikel2->total_halaman);
        }

        //statistik event
        $stat_event = ModelVisitor::select('event')
         ->distinct()
         ->get();
         $arrayevent = array();
         foreach ($stat_event as $stat_event2) {
            array_push($arrayevent, $stat_event2->event);
        }
        $jmlevent = ModelVisitor::selectRaw('event, count(event) as total_event')
        ->groupBy('event')
        ->get();
        $arrayjmlevent = array();
        foreach ($jmlevent as $jmlevent2) {
            array_push($arrayjmlevent, $jmlevent2->total_event);
        }
        
        //statistik pengajuan
        // $pengajuan = array();
        // for($j=1;$j<=3;$j++)
        // {
        //     $pengajuans = DB::table('penghargaans')->selectRaw("count(id_penghargaan) as pengajuan_karya")
        //     ->where('status', $j)
        //     ->get();
        //     foreach($pengajuans as $pengajuan2)
        //     {
        //         array_push($pengajuan, $pengajuan2->pengajuan_karya);
        //     }
        // }
        // dd($pengajuan);

        // $pengajuan = DB::table('penghargaans')
        // ->distinct()
        // ->selectRaw("count(status) as total_pengajuan")


        //visitor
        $visitor = array();
        for($i=1;$i<=12;$i++)
        {
            $visitorz = DB::table('visitors')->selectRaw("count(id_visitor) as pengunjung")
            ->whereMonth('created_at', $i)
            ->get();
            foreach($visitorz as $visitors)
            {
                array_push($visitor, $visitors->pengunjung);
            }
        }

        return view('dashboard', compact('user', 'visitor', 'jumlahuser', 'complaint', 'arrayart', 'arrayartjml', 'arrayevent', 'arrayjmlevent'));
    }
} 
