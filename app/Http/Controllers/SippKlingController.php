<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;
use App\Repositories\DataCountRepository;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;


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

    $data = [
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

      'pklluar' => $this->repo->getSpesificCount('pelayanan_keslings', ['jenis', 'Luar Gedung']),
      'pkldalam' => $this->repo->getSpesificCount('pelayanan_keslings', ['jenis', 'Dalam Gedung']),

      'depotlayak' => $this->repo->getSpesificCount('dam_sip_klings', ['status', 'Memenuhi Persyaratan']),
      'depottlayak' => $this->repo->getSpesificCount('dam_sip_klings', ['status', 'Tidak Memenuhi Persyaratan']),

      'rmlayak' => $this->repo->getSpesificCount('kuliners', ['status', 'Laik Hygiene Sanitasi']),
      'rmtlayak' => $this->repo->getSpesificCount('kuliners', ['status', 'Tidak Laik Hygiene Sanitasi']),

      'jblayak' => $this->repo->getSpesificCount('jasa_bogas', ['status', 'Sehat']),
      'jbtlayak' => $this->repo->getSpesificCount('jasa_bogas', ['status', 'Tidak Sehat']),

      'masjidlayak' => $this->repo->getSpesificCount('tempat_ibadahs', ['status', 'Laik Hygiene Sanitasi']),
      'masjidtlayak' => $this->repo->getSpesificCount('tempat_ibadahs', ['status', 'Tidak Laik Hygiene Sanitasi']),

      'sklayak' => $this->repo->getSpesificCount('sekolahs', ['status', 'Sehat']),
      'sktlayak' => $this->repo->getSpesificCount('sekolahs', ['status', 'Tidak Sehat']),

      'psrlayak' => $this->repo->getSpesificCount('pasars', ['status', 'Sehat']),
      'psrtlayak' => $this->repo->getSpesificCount('pasars', ['status', 'Tidak Sehat']),

      'pstlayak' => $this->repo->getSpesificCount('pesantrens', ['status', 'Sehat']),
      'psttlayak' => $this->repo->getSpesificCount('pesantrens', ['status', 'Tidak Sehat']),

      'hlayak' => $this->repo->getSpesificCount('hotels', ['status', 'Sehat']),
      'htlayak' => $this->repo->getSpesificCount('hotels', ['status', 'Tidak Sehat']),

      'hmlayak' => $this->repo->getSpesificCount('hotel_melatis', ['status', 'Sehat']),
      'hmtlayak' => $this->repo->getSpesificCount('hotel_melatis', ['status', 'Tidak Sehat'])
    ];

    return view('sipp-kling-pages/dashboard-grafik', compact('data'));
    // return $data['rts'];
  }

  public function grafikWithParam(){
    if(Input::get('kecamatan') == ''){
      return redirect('sipp-kling/dashboard-grafik');
    } else {
      $data = [
      'rts' => $this->repo->getSpesificCountWithKecamatanParam('rumah_sehat', ['status', 'Rumah Tidak Sehat'],Input::get('kecamatan')),
      'rs' => $this->repo->getSpesificCountWithKecamatanParam('rumah_sehat', ['status', 'Rumah Sehat'],Input::get('kecamatan')),
      'pjby' => $this->repo->getSpesificCountWithKecamatanParam('rumah_sehat', ['pjb', 'YA'],Input::get('kecamatan')),
      'pjbt' => $this->repo->getSpesificCountWithKecamatanParam('rumah_sehat', ['pjb', 'TIDAK'],Input::get('kecamatan')),
      'spaltb' => $this->repo->getSpesificCountWithKecamatanParam('rumah_sehat', ['spal', 'Terbuka'],Input::get('kecamatan')),
      'spaltt' => $this->repo->getSpesificCountWithKecamatanParam('rumah_sehat', ['spal', 'Tertutup'],Input::get('kecamatan')),
      'tpsor' => $this->repo->getSpesificCountWithKecamatanParam('rumah_sehat', ['sampah', 'Dipilah / Organik'],Input::get('kecamatan')),
      'tpsdib' => $this->repo->getSpesificCountWithKecamatanParam('rumah_sehat', ['sampah', 'Tidak Dipilah / Dibuang'],Input::get('kecamatan')),
      'jambankali' => $this->repo->getSpesificCountWithKecamatanParam('rumah_sehat', ['jamban', 'Kali'],Input::get('kecamatan')),
      'jambankoya' => $this->repo->getSpesificCountWithKecamatanParam('rumah_sehat', ['jamban', 'Koya / Empang'],Input::get('kecamatan')),
      'jambanheli' => $this->repo->getSpesificCountWithKecamatanParam('rumah_sehat', ['jamban', 'Helikopter'],Input::get('kecamatan')),
      'jambanseptik' => $this->repo->getSpesificCountWithKecamatanParam('rumah_sehat', ['jamban', 'Septik Tank'],Input::get('kecamatan')),

      'pklluar' => $this->repo->getSpesificCountWithKecamatanParam('pelayanan_keslings', ['jenis', 'Luar Gedung'],Input::get('kecamatan')),
      'pkldalam' => $this->repo->getSpesificCountWithKecamatanParam('pelayanan_keslings', ['jenis', 'Dalam Gedung'],Input::get('kecamatan')),

      'depotlayak' => $this->repo->getSpesificCountWithKecamatanParam('dam_sip_klings', ['status', 'Memenuhi Persyaratan'],Input::get('kecamatan')),
      'depottlayak' => $this->repo->getSpesificCountWithKecamatanParam('dam_sip_klings', ['status', 'Tidak Memenuhi Persyaratan'],Input::get('kecamatan')),

      'rmlayak' => $this->repo->getSpesificCountWithKecamatanParam('kuliners', ['status', 'Laik Hygiene Sanitasi'],Input::get('kecamatan')),
      'rmtlayak' => $this->repo->getSpesificCountWithKecamatanParam('kuliners', ['status', 'Tidak Laik Hygiene Sanitasi'],Input::get('kecamatan')),

      'jblayak' => $this->repo->getSpesificCountWithKecamatanParam('jasa_bogas', ['status', 'Sehat'],Input::get('kecamatan')),
      'jbtlayak' => $this->repo->getSpesificCountWithKecamatanParam('jasa_bogas', ['status', 'Tidak Sehat'],Input::get('kecamatan')),

      'masjidlayak' => $this->repo->getSpesificCountWithKecamatanParam('tempat_ibadahs', ['status', 'Laik Hygiene Sanitasi'],Input::get('kecamatan')),
      'masjidtlayak' => $this->repo->getSpesificCountWithKecamatanParam('tempat_ibadahs', ['status', 'Tidak Laik Hygiene Sanitasi'],Input::get('kecamatan')),

      'sklayak' => $this->repo->getSpesificCountWithKecamatanParam('sekolahs', ['status', 'Sehat'],Input::get('kecamatan')),
      'sktlayak' => $this->repo->getSpesificCountWithKecamatanParam('sekolahs', ['status', 'Tidak Sehat'],Input::get('kecamatan')),

      'psrlayak' => $this->repo->getSpesificCountWithKecamatanParam('pasars', ['status', 'Sehat'],Input::get('kecamatan')),
      'psrtlayak' => $this->repo->getSpesificCountWithKecamatanParam('pasars', ['status', 'Tidak Sehat'],Input::get('kecamatan')),

      'pstlayak' => $this->repo->getSpesificCountWithKecamatanParam('pesantrens', ['status', 'Sehat'],Input::get('kecamatan')),
      'psttlayak' => $this->repo->getSpesificCountWithKecamatanParam('pesantrens', ['status', 'Tidak Sehat'],Input::get('kecamatan')),

      'hlayak' => $this->repo->getSpesificCountWithKecamatanParam('hotels', ['status', 'Sehat'],Input::get('kecamatan')),
      'htlayak' => $this->repo->getSpesificCountWithKecamatanParam('hotels', ['status', 'Tidak Sehat'],Input::get('kecamatan')),

      'hmlayak' => $this->repo->getSpesificCountWithKecamatanParam('hotel_melatis', ['status', 'Sehat'],Input::get('kecamatan')),
      'hmtlayak' => $this->repo->getSpesificCountWithKecamatanParam('hotel_melatis', ['status', 'Tidak Sehat'],Input::get('kecamatan'))
    ];

    $param_kecamatan = Input::get('kecamatan');

    return view('sipp-kling-pages/filter-pages/grafik-total-filter', compact('data','param_kecamatan'));
    }
    
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
    // return Input::get('kecamatan').'.'.Input::get('kelurahan');
    if(Input::get('kecamatan') == '0' && Input::get('kelurahan') == '0'){
      return redirect('sipp-kling');
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
    // $jumlah_rssehat = DB::table('rumah_sehat')
    //     ->where('status', '=', 'Rumah Sehat')
    //     ->whereBetween('waktu', array('1/1/2017 0:00:00 AM', '1/12/2017 1:09:04 PM'))
    //     ->count();
    // // return Carbon::now();
    //     return $jumlah_rssehat;
    return view('sipp-kling-pages/grafik/grafik-periode');
  }

  public function trash(){
    return view('sipp-kling-pages/trash/index');
  }

  public function dashboardDetail(){
    return view('sipp-kling-pages/dashboard-detail');
  }

  public function initestdoang(){
    $rumah_sehat = DB::table('rumah_sehat')
                  ->select('id_rumah_sehat', 'waktu')
                  ->orderBy('id_rumah_sehat','asc')
                  ->count();

    $dataJoin = DB::table('rumah_sehat as r')
                  ->select('r.id_rumah_sehat', 'k.id_rumah_sehat', 'r.waktu')
                  ->join('kks as k', 'k.id_rumah_sehat', '=', 'r.id_rumah_sehat')
                  ->count();

    // $no = 1;
    // foreach ($rumah_sehat as $key => $data) {
    //   //$data->id_rumah_sehat = $no++;
    //   $chkData = DB::table('rumah_sehat')->where('id_rumah_sehat', $no)->count();
      
    //   if($chkData >= 1){
    //     $no++;
    //     // $data->id_rumah_sehat = 'valid';
    //   } else {
    //     // $data->id_rumah_sehat = 'ada zznya';
    //     $dataValid = [
    //       'id_rumah_sehat' => $no++
    //     ];

    //     DB::table('rumah_sehat')->where('id_rumah_sehat', $data->id_rumah_sehat)->update($dataValid);
    //   }
    // }
    // foreach ($rumah_sehat as $key => $data) {
    //   $dataValid = [
    //     'waktu' => date('Y-m-d H:m:s', strtotime(str_replace('/', '-', $data->waktu)))
    //   ];

    //   DB::table('rumah_sehat')->where('id_rumah_sehat', $data->id_rumah_sehat)->update($dataValid);
    // }

    // $dataNotValid = DB::table('rumah_sehat')
    //                 ->select('waktu','id_petugas','id_rumah_sehat')
    //                 ->orderBy('waktu', 'asc')
    //                 ->get();

    // foreach ($dataNotValid as $key => $data) {
    //   $dataValid = [
    //     'waktu' => date('Y-m-d H:m:s', strtotime(str_replace('pagi','AM', str_replace('malam', 'PM', str_replace('/', '-', $data->waktu)))))
    //   ];

    //   DB::table('rumah_sehat')->where('id_rumah_sehat', $data->id_rumah_sehat)->update($dataValid);
    // }
    // zz11, zz12, zz13, zz14, zz15, zz2, zz3, zz4, zz5, zz6, zz8, zz9
    // DB::table('rumah_sehat')->where('id_rumah_sehat','like','%zz%')->delete();
    return $dataJoin;
  }
}
