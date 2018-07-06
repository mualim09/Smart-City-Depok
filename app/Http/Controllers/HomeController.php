<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Raulr\GooglePlayScraper\Scraper;
use App\User;
use App\ModelVisitor;
use App\Pengajuan;

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

        //download
        $scraper = new Scraper();
        $app = $scraper->getApp('tiregdev.sipepikeling');
        $downloadapp = $app['downloads'];

        //member
        $jumlahuser = DB::table('user_android')->count();
        $user     = DB::table('user_android')
        ->orderBY('id_user', 'dsc')
        ->limit(8)
        ->get();

        //kritik dan saran
         $complaint = DB::table('complaints')->count();

         $i = 1;

         //statistik pembaca artikel
         $artikel = ModelVisitor::select('blogs')
         ->distinct()
         ->get();
         $arrayart = array();
         foreach ($artikel as $artikel2) {
            array_push($arrayart, $artikel2->blogs);
        }
        $jmlartikel = ModelVisitor::selectRaw('blogs, count(blogs) as total_halaman')
        ->groupBy('blogs')
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
        $pengajuan = Pengajuan::selectRaw(" DISTINCT (SELECT COALESCE(COUNT(status), 0) FROM penghargaans WHERE status = 'diterima') as status_diterima, (SELECT COALESCE(COUNT(status), 0) FROM penghargaans WHERE status = 'diproses') as status_diproses, (SELECT COALESCE(COUNT(status), 0) FROM penghargaans WHERE status = 'ditolak') as status_ditolak")
        ->first();
        $pengajuanjml = array();
        array_push($pengajuanjml, $pengajuan->status_diterima, $pengajuan->status_diproses, $pengajuan->status_ditolak);
        

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

        //bounce rate
        // $semuapengunjung = ModelVisitor::selectRaw("count(distinct ip) ip")->first();
        // $pengunjungs = ModelVisitor::selectRaw("distinct ip")->get();
        // $pengunjung1 = 0;
        // foreach($pengunjungs as $pengunjungss)
        // {
        //     $pengunjung1halaman = ModelVisitor::selectRaw("count(distinct bounce_rate) bounce_rate")
        //     ->where('ip', $pengunjungss->ip)
        //     ->first();
        //     if($pengunjung1halaman->bounce_rate==1)
        //     {
        //         $pengunjung1++;
        //     }
        // }
        // $bouncerate = ($pengunjung1/$semuapengunjung->ip)*100;
        // var_dump($pengunjung1);
        // var_dump($semuapengunjung->ip);
        // var_dump($bouncerate);

        return view('dashboard', compact('user', 'visitor', 'jumlahuser', 'complaint', 'arrayart', 'arrayartjml', 'arrayevent', 'arrayjmlevent', 'pengajuan', 'pengajuanjml', 'downloadapp', 'bouncerate'));
    }
} 
