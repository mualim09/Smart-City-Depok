<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;
use App\Repositories\DataCountRepository;
use Illuminate\Support\Facades\Input;


class SippKlingController extends Controller
{
  protected $repo;

  public function __construct(DataCountRepository $repository){
    $this->middleware('auth:admin');
    $this->repo = $repository;
  }

  public function index(){
    return view('sipp-kling-pages/dashboard');
  }

//punya db tabel
  public function getDataKelurahan(Request $request){
    $data = DB::table('petugas_sikelings')->select('kelurahan')->where('kecamatan', $request->kecamatan)->groupBy('kelurahan')->get();
    return $data;
  }

//for charts
  public function grafik(){
    $dataKelurahan = $this->repo->getDataKelurahan();

    $rumah_sehat = [
      'rts' => $this->repo->getSpesificCount('rumah_sehat', ['status', 'Rumah Tidak Sehat']),
      'rs' => $this->repo->getSpesificCount('rumah_sehat', ['status', 'Rumah Sehat']),
      'pjby' => $this->repo->getSpesificCount('rumah_sehat', ['pjb', 'YA']),
      'pjbt' => $this->repo->getSpesificCount('rumah_sehat', ['pjb', 'TIDAK']),
      'spaltb' => $this->repo->getSpesificCount('rumah_sehat', ['spal', 'Terbuka']),
      'spaltt' => $this->repo->getSpesificCount('rumah_sehat', ['spal', 'Tertutup']),
      'tpsor' => $this->repo->getSpesificCount('rumah_sehat', ['sampah', 'Dipilah / Organik']),
      'tpsdib' => $this->repo->getSpesificCount('rumah_sehat', ['sampah', 'Tidak Dipilah / Dibuang']),
      'jambankali' => $this->repo->getSpesificCount('rumah_sehat', ['jamban', 'Kali']),
      'jambankoya' => $this->repo->getSpesificCount('rumah_sehat', ['jamban', 'Koya / Empang']),
      'jambanheli' => $this->repo->getSpesificCount('rumah_sehat', ['jamban', 'Helikopter']),
      'jambanseptik' => $this->repo->getSpesificCount('rumah_sehat', ['jamban', 'Septik Tank']),   
    ];
    $pelayanan_keslings = [
      'pklluar' => $this->repo->getSpesificCount('pelayanan_keslings', ['jenis', 'Luar Gedung']),
      'pkldalam' => $this->repo->getSpesificCount('pelayanan_keslings', ['jenis', 'Dalam Gedung'])       
    ];
    $dam_sip_klings = [
      'depotlayak' => $this->repo->getSpesificCount('dam_sip_klings', ['status', 'Memenuhi Persyaratan']),
      'depottlayak' => $this->repo->getSpesificCount('dam_sip_klings', ['status', 'Tidak Memenuhi Persyaratan'])       
    ];

    $kuliners = [
      'rmlayak' => $this->repo->getSpesificCount('kuliners', ['status', 'Laik Hygiene Sanitasi']),
      'rmtlayak' => $this->repo->getSpesificCount('kuliners', ['status', 'Tidak Laik Hygiene Sanitasi'])       
    ];

    $jasa_bogas = [
      'jblayak' => $this->repo->getSpesificCount('jasa_bogas', ['status', 'Sehat']),
      'jbtlayak' => $this->repo->getSpesificCount('jasa_bogas', ['status', 'Tidak Sehat'])       
    ];



    $tempat_ibadahs = [
      'masjidlayak' => $this->repo->getSpesificCount('tempat_ibadahs', ['status', 'Laik Hygiene Sanitasi']),
      'masjidtlayak' => $this->repo->getSpesificCount('tempat_ibadahs', ['status', 'Tidak Laik Hygiene Sanitasi'])       
    ];

    $sekolahs = [
      'sklayak' => $this->repo->getSpesificCount('sekolahs', ['status', 'Sehat']),
      'sktlayak' => $this->repo->getSpesificCount('sekolahs', ['status', 'Tidak Sehat'])       
    ];

    $pasars = [
      'psrlayak' => $this->repo->getSpesificCount('pasars', ['status', 'Sehat']),
      'psrtlayak' => $this->repo->getSpesificCount('pasars', ['status', 'Tidak Sehat'])       
    ];


    $pesantrens = [
      'pstlayak' => $this->repo->getSpesificCount('pesantrens', ['status', 'Sehat']),
      'psttlayak' => $this->repo->getSpesificCount('pesantrens', ['status', 'Tidak Sehat'])       
    ];

    $hotels = [
      'hlayak' => $this->repo->getSpesificCount('hotels', ['status', 'Sehat']),
      'htlayak' => $this->repo->getSpesificCount('hotels', ['status', 'Tidak Sehat'])       
    ];

    $hotel_melatis = [
      'hmlayak' => $this->repo->getSpesificCount('hotel_melatis', ['status', 'Sehat']),
      'hmtlayak' => $this->repo->getSpesificCount('hotel_melatis', ['status', 'Tidak Sehat'])       
    ];

    return view('sipp-kling-pages/dashboard-grafik', compact('dataKelurahan', 'rumah_sehat', 
      'pelayanan_keslings', 'dam_sip_klings', 'kuliners',
      'jasa_bogas', 'tempat_ibadahs', 'sekolahs', 'pasars', 'pesantrens', 'hotels', 'hotel_melatis'));
  }

//punya db tabel
  public function rehat(){
    $rehats = DB::table('rumah_sehat')->orderBy('id_rumah_sehat','dsc')->limit(10)->get();
    return view('sipp-kling-pages/dashboard-tabel', ['rehats' => $rehats]);
  }

//public function getDataKelurahan1(Request $request){
  public function getDataKelurahanByKec(Request $request){
    $data = DB::table('petugas_sikelings')->select('kelurahan')->where('kecamatan', $request->kecamatan)->groupBy('kelurahan')->get();
    return $data;
  }

  public function total_jumlah(){
    return $this->repo->getDataCountDashboard();
  }

  public function totalJumlahByParameter(){
    if(Input::get('kecamatan') == 0 && Input::get('kelurahan') == 0){

      return redirect('sipp-kling');
      // return 1;

    } else {
    
      return $this->repo->getDataCountDashboardByParameter(Input::get('kecamatan'), Input::get('kelurahan'));
    
    }
  }

  public function history(){
    $getHistoryData = DB::table('historys')
                        ->leftJoin('petugas_sikelings as p', 'p.id_petugas', '=', 'historys.id_petugas')
                        ->limit(10)
                        ->get();

    return view('sipp-kling-pages/history/index', ['history' => $getHistoryData]);
  }

  public function getDashboardMap(){
    return view('sipp-kling-pages/dashboard-map');
  }

  public function getJadwalPage(){
    return view('sipp-kling-pages/jadwal/tambah-jadwal');
  }

  public function getPesanPage(){
    return view('sipp-kling-pages/pesan/tambah-pesan');
  }

  public function dashboardGrafik(){
    return view('sipp-kling-pages/grafik/grafik-periode');
  }

  public function trash(){
    return view('sipp-kling-pages/trash/index');
  }

  public function dashboardDetail(){
    return view('sipp-kling-pages/dashboard-detail');
  }
}
