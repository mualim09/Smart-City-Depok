<?php

namespace App\Repositories;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Repositories\Repository;

class DataCountRepository
{

    protected $repository;

    public function __construct(Repository $repository){
        $this->repository = $repository;
    }

    public function getSpesificCount($table, $where){
        $subQuery = DB::table('petugas_sikelings')
        ->selectRaw('petugas_sikelings.kelurahan, petugas_sikelings.id_petugas')
        ->join($table, 'petugas_sikelings.id_petugas', '=', $table.'.id_petugas')
        ->where($where[0], $where[1]);

        return DB::table('petugas_sikelings')
        ->selectRaw('COUNT(a.kelurahan) as total')
        ->leftJoin(DB::raw('('.$subQuery->toSql().') as a'), 'petugas_sikelings.id_petugas', '=', 'a.id_petugas')
        ->groupBy('petugas_sikelings.kelurahan')
        ->orderBy('petugas_sikelings.kelurahan', 'asc')
        ->mergeBindings($subQuery)
        ->get();
    }

    public function getDataCountDashboard(){
    $jumlah_rs  = DB::table('rumah_sehat')
    ->where('total_nilai', '!=', null)
    ->count();
    $jumlah_rs  = DB::table('rumah_sehat')->count();


    $jumlah_rssehat = DB::table('rumah_sehat')
    ->where('status', '=', 'Rumah Sehat')
    ->count();

    $jumlah_rstidaksehat = DB::table('rumah_sehat')
    ->where('status', '=', 'Rumah Tidak Sehat')
    ->count();
//pjb
    $jumlah_pjb = DB::table('rumah_sehat')
    ->where('total_nilai', '!=', null)
    ->pluck('pjb')
    ->count();

    $jumlah_adapjb = DB::table('rumah_sehat')
    ->where('pjb', '=', 'YA')
    ->count();

    $jumlah_tidakpjb = DB::table('rumah_sehat')
    ->where('pjb', '=', 'TIDAK')
    ->count();

//spal
    $jumlah_spal = DB::table('rumah_sehat')
    ->where('total_nilai', '!=', null)
    ->pluck('spal')
    ->count();

    $jumlah_spalterbuka = DB::table('rumah_sehat')
    ->where('spal', '=', 'Terbuka')
    ->count();


    $jumlah_spaltertutup = DB::table('rumah_sehat')
    ->where('spal', '=', 'Tertutup')
    ->count();

//TPS
    $jumlah_tps = DB::table('rumah_sehat')
    ->where('total_nilai', '!=', null)
    ->pluck('sampah')
    ->count();

    $jumlah_tpsorganik = DB::table('rumah_sehat')
    ->where('sampah', '=', 'Dipilah / Organik')
    ->count();


    $jumlah_tpsdibuang = DB::table('rumah_sehat')
    ->where('sampah', '=', 'Tidak Dipilah / Dibuang')
    ->count();

//TPS
    $jumlah_jamban = DB::table('rumah_sehat')
    ->where('total_nilai', '!=', null)
    ->pluck('jamban')
    ->count();

    $jumlah_koya = DB::table('rumah_sehat')
    ->where('jamban', '=', 'Koya / Empang')
    ->where('total_nilai', '!=', null)
    ->count();


    $jumlah_kali = DB::table('rumah_sehat')
    ->where('jamban', '=', 'Kali')
    ->where('total_nilai', '!=', null)
    ->count();

    $jumlah_helikopter = DB::table('rumah_sehat')
    ->where('jamban', '=', 'Helikopter')
    ->where('total_nilai', '!=', null)
    ->count();


    $jumlah_septik = DB::table('rumah_sehat')
    ->where('jamban', '=', 'Septik Tank')
    ->where('total_nilai', '!=', null)
    ->count();

//PKL
    $jumlah_pkl = DB::table('pelayanan_keslings')
//->where('total_nilai', '!=', null)
    ->count();

    $jumlah_pkldalam = DB::table('pelayanan_keslings')
    ->where('jenis', '=', 'Dalam Gedung')
    ->count();


    $jumlah_pklluar = DB::table('pelayanan_keslings')
    ->where('jenis', '=', 'Luar Gedung')
    ->count();


//KULINER/TMR
    $jumlah_kuliner = DB::table('kuliners')
    ->where('total_nilai', '!=', null)
    ->count();

    $jumlah_kullayak = DB::table('kuliners')
    ->where('status', '=', 'Laik Hygiene Sanitasi')
    ->count();


    $jumlah_kultlayak = DB::table('kuliners')
    ->where('status', '=', 'Tidak Laik Hygiene Sanitasi')
    ->count();


//DAM
    $jumlah_dam = DB::table('dam_sip_klings')
    ->where('total_nilai', '!=', null)
    ->count();

    $jumlah_damlayak = DB::table('dam_sip_klings')
    ->where('status', '=', 'Memenuhi Persyaratan')
    ->count();


    $jumlah_damtlayak = DB::table('dam_sip_klings')
    ->where('status', '=', 'Tidak Memenuhi Persyaratan')
    ->count();


//JASA BOGA
    $jumlah_jb = DB::table('jasa_bogas')
    ->where('total_nilai', '!=', null)
    ->count();

    $jumlah_jblayak = DB::table('jasa_bogas')
    ->where('status', '=', 'Sehat')
    ->count();


    $jumlah_jbtlayak = DB::table('jasa_bogas')
    ->where('status', '=', 'Tidak Sehat')
    ->count();



//MASJID
    $jumlah_masjid = DB::table('tempat_ibadahs')
    ->where('total_nilai', '!=', null)
    ->count();

    $jumlah_masjidlayak = DB::table('tempat_ibadahs')
    ->where('status', '=', 'Laik Hygiene Sanitasi')
    ->count();

    $jumlah_masjidtlayak = DB::table('tempat_ibadahs')
    ->where('status', '=', 'Tidak Laik Hygiene Sanitasi')
    ->count();


//SEKOLAH
    $jumlah_sekolah = DB::table('sekolahs')
    ->where('total_nilai', '!=', null)
    ->count();

    $jumlah_sekolahlayak = DB::table('sekolahs')
    ->where('status', '=', 'Sehat')
    ->count();

    $jumlah_sekolahtlayak = DB::table('sekolahs')
    ->where('status', '=', 'Tidak Sehat')
    ->count();

//PESANTREN
    $jumlah_pesantren = DB::table('pesantrens')
    ->where('total_nilai', '!=', null)
    ->count();

    $jumlah_pesantrenlayak = DB::table('pesantrens')
    ->where('status', '=', 'Sehat')
    ->count();

    $jumlah_pesantrentlayak = DB::table('pesantrens')
    ->where('status', '=', 'Tidak Sehat')
    ->count();



//PUSKESMAS
    $jumlah_pusk = DB::table('puskesmass')
    ->where('total_nilai', '!=', null)
    ->count();

    $jumlah_pusklayak = DB::table('puskesmass')
    ->where('status', '=', 'Sehat')
    ->count();

    $jumlah_pusktlayak = DB::table('puskesmass')
    ->where('status', '=', 'Tidak Sehat')
    ->count();

//HOTEL
    $jumlah_hotel = DB::table('hotels')
    ->where('total_nilai', '!=', null)
    ->count();

    $jumlah_hotellayak = DB::table('hotels')
    ->where('status', '=', 'Sehat')
    ->count();

    $jumlah_hoteltlayak = DB::table('hotels')
    ->where('status', '=', 'Tidak Sehat')
    ->count();

//HOTEL MELATI
    $jumlah_hotelm = DB::table('hotel_melatis')
    ->where('total_nilai', '!=', null)
    ->count();

    $jumlah_hotelmlayak = DB::table('hotel_melatis')
    ->where('status', '=', 'Sehat')
    ->count();

    $jumlah_hotelmtlayak = DB::table('hotel_melatis')
    ->where('status', '=', 'Tidak Sehat')
    ->count();

//PASAR
    $jumlah_pasar = DB::table('pasars')
    ->where('total_nilai', '!=', null)
    ->count();

    $jumlah_pasarlayak = DB::table('pasars')
    ->where('status', '=', 'Sehat')
    ->count();

    $jumlah_pasartlayak = DB::table('pasars')
    ->where('status', '=', 'Tidak Sehat')
    ->count();


//KOLAM
    $jumlah_kolam = DB::table('kolam_renangs')
    ->where('total_nilai', '!=', null)
    ->count();

    $jumlah_kolamlayak = DB::table('kolam_renangs')
    ->where('status', '=', 'Sehat')
    ->count();

    $jumlah_kolamtlayak = DB::table('kolam_renangs')
    ->where('status', '=', 'Tidak Sehat')
    ->count();


//THE REAL RS
    $jumlah_rss = DB::table('rss')
    ->where('total_nilai', '!=', null)
    ->count();

    $jumlah_rslayak = DB::table('rss')
    ->where('status', '=', 'Sehat')
    ->count();

    $jumlah_rstlayak = DB::table('rss')
    ->where('status', '=', 'Tidak Sehat')
    ->count();

    $getHistoryData = DB::table('historys')
                        ->leftJoin('petugas_sikelings as p', 'p.id_petugas', '=', 'historys.id_petugas')
                        ->limit(10)
                        ->get();

    return view('sipp-kling-pages/dashboard', compact ('jumlah_rs', 'jumlah_rssehat', 'jumlah_rstidaksehat', 
      'jumlah_pjb','jumlah_adapjb','jumlah_tidakpjb',
      'jumlah_spal', 'jumlah_spalterbuka','jumlah_spaltertutup',
      'jumlah_tps', 'jumlah_tpsorganik','jumlah_tpsdibuang',
      'jumlah_jamban', 'jumlah_koya','jumlah_kali', 'jumlah_helikopter', 'jumlah_septik',
      'jumlah_pkl', 'jumlah_pkldalam','jumlah_pklluar',
      'jumlah_kuliner', 'jumlah_kullayak','jumlah_kultlayak',
      'jumlah_dam', 'jumlah_damlayak','jumlah_damtlayak',
      'jumlah_masjid', 'jumlah_masjidlayak','jumlah_masjidtlayak',
      'jumlah_sekolah', 'jumlah_sekolahlayak','jumlah_sekolahtlayak',
      'jumlah_pesantren', 'jumlah_pesantrenlayak','jumlah_pesantrentlayak',
      'jumlah_pusk', 'jumlah_pusklayak','jumlah_pusktlayak',
      'jumlah_hotel', 'jumlah_hotellayak','jumlah_hoteltlayak',
      'jumlah_hotelm', 'jumlah_hotelmlayak','jumlah_hotelmtlayak',
      'jumlah_pasar', 'jumlah_pasarlayak','jumlah_pasartlayak',
      'jumlah_kolam', 'jumlah_kolamlayak','jumlah_kolamtlayak',
      'jumlah_rss', 'jumlah_rslayak','jumlah_rstlayak',
      'jumlah_jb', 'jumlah_jblayak','jumlah_jbtlayak',
      'jumlah_pkl', 'jumlah_pkldalam','jumlah_pklluar', 'getHistoryData'));

    return 1;
    }

    public function getDataCountDashboardByParameter($param_kecamatan, $param_kelurahan){
    $data_kecamatan = DB::table('petugas_sikelings')->select('kecamatan')->groupBy('kecamatan')->get();
    $data_kelurahan = DB::table('petugas_sikelings')->select('kelurahan')->where('kecamatan', $param_kecamatan)->groupBy('kelurahan')->get();

// rumah sehat
    $jumlah_rs  = DB::table('rumah_sehat')
    ->where('total_nilai', '!=', null)
    ->count();
    $jumlah_rs  = DB::table('rumah_sehat')->count();


    $jumlah_rssehat = DB::table('rumah_sehat')
    ->where('status', '=', 'Rumah Sehat')
    ->count();

    $jumlah_rstidaksehat = DB::table('rumah_sehat')
    ->where('status', '=', 'Rumah Tidak Sehat')
    ->count();
//pjb
    $jumlah_pjb = DB::table('rumah_sehat')
    ->where('total_nilai', '!=', null)
    ->pluck('pjb')
    ->count();

    $jumlah_adapjb = DB::table('rumah_sehat')
    ->where('pjb', '=', 'YA')
    ->count();

    $jumlah_tidakpjb = DB::table('rumah_sehat')
    ->where('pjb', '=', 'TIDAK')
    ->count();
//spal
    $jumlah_spal = DB::table('rumah_sehat')
    ->where('total_nilai', '!=', null)
    ->pluck('spal')
    ->count();

    $jumlah_spalterbuka = DB::table('rumah_sehat')
    ->where('spal', '=', 'Terbuka')
    ->count();


    $jumlah_spaltertutup = DB::table('rumah_sehat')
    ->where('spal', '=', 'Tertutup')
    ->count();
//TPS
    $jumlah_tps = DB::table('rumah_sehat')
    ->where('total_nilai', '!=', null)
    ->pluck('sampah')
    ->count();

    $jumlah_tpsorganik = DB::table('rumah_sehat')
    ->where('sampah', '=', 'Dipilah / Organik')
    ->count();


    $jumlah_tpsdibuang = DB::table('rumah_sehat')
    ->where('sampah', '=', 'Tidak Dipilah / Dibuang')
    ->count();
//TPS
    $jumlah_jamban = DB::table('rumah_sehat')
    ->where('total_nilai', '!=', null)
    ->pluck('jamban')
    ->count();

    $jumlah_koya = DB::table('rumah_sehat')
    ->where('jamban', '=', 'Koya / Empang')
    ->where('total_nilai', '!=', null)
    ->count();


    $jumlah_kali = DB::table('rumah_sehat')
    ->where('jamban', '=', 'Kali')
    ->where('total_nilai', '!=', null)
    ->count();

    $jumlah_helikopter = DB::table('rumah_sehat')
    ->where('jamban', '=', 'Helikopter')
    ->where('total_nilai', '!=', null)
    ->count();


    $jumlah_septik = DB::table('rumah_sehat')
    ->where('jamban', '=', 'Septik Tank')
    ->where('total_nilai', '!=', null)
    ->count();
//PKL
    $jumlah_pkl = DB::table('pelayanan_keslings')
    //->where('total_nilai', '!=', null)
    ->count();

    $jumlah_pkldalam = DB::table('pelayanan_keslings')
    ->where('jenis', '=', 'Dalam Gedung')
    ->count();


    $jumlah_pklluar = DB::table('pelayanan_keslings')
    ->where('jenis', '=', 'Luar Gedung')
    ->count();
//KULINER/TMR
    $jumlah_kuliner = DB::table('kuliners')
    ->where('total_nilai', '!=', null)
    ->count();

    $jumlah_kullayak = DB::table('kuliners')
    ->where('status', '=', 'Laik Hygiene Sanitasi')
    ->count();


    $jumlah_kultlayak = DB::table('kuliners')
    ->where('status', '=', 'Tidak Laik Hygiene Sanitasi')
    ->count();
//DAM
    $jumlah_dam = DB::table('dam_sip_klings')
    ->where('total_nilai', '!=', null)
    ->count();

    $jumlah_damlayak = DB::table('dam_sip_klings')
    ->where('status', '=', 'Memenuhi Persyaratan')
    ->count();


    $jumlah_damtlayak = DB::table('dam_sip_klings')
    ->where('status', '=', 'Tidak Memenuhi Persyaratan')
    ->count();
//JASA BOGA
    $jumlah_jb = DB::table('jasa_bogas')
    ->where('total_nilai', '!=', null)
    ->count();

    $jumlah_jblayak = DB::table('jasa_bogas')
    ->where('status', '=', 'Sehat')
    ->count();


    $jumlah_jbtlayak = DB::table('jasa_bogas')
    ->where('status', '=', 'Tidak Sehat')
    ->count();
//MASJID
    $jumlah_masjid = DB::table('tempat_ibadahs')
    ->where('total_nilai', '!=', null)
    ->count();

    $jumlah_masjidlayak = DB::table('tempat_ibadahs')
    ->where('status', '=', 'Laik Hygiene Sanitasi')
    ->count();

    $jumlah_masjidtlayak = DB::table('tempat_ibadahs')
    ->where('status', '=', 'Tidak Laik Hygiene Sanitasi')
    ->count();
//SEKOLAH
    $jumlah_sekolah = DB::table('sekolahs')
    ->where('total_nilai', '!=', null)
    ->count();

    $jumlah_sekolahlayak = DB::table('sekolahs')
    ->where('status', '=', 'Sehat')
    ->count();

    $jumlah_sekolahtlayak = DB::table('sekolahs')
    ->where('status', '=', 'Tidak Sehat')
    ->count();
//PESANTREN
    $jumlah_pesantren = DB::table('pesantrens')
    ->where('total_nilai', '!=', null)
    ->count();

    $jumlah_pesantrenlayak = DB::table('pesantrens')
    ->where('status', '=', 'Sehat')
    ->count();

    $jumlah_pesantrentlayak = DB::table('pesantrens')
    ->where('status', '=', 'Tidak Sehat')
    ->count();
//PUSKESMAS
    $jumlah_pusk = DB::table('puskesmass')
    ->where('total_nilai', '!=', null)
    ->count();

    $jumlah_pusklayak = DB::table('puskesmass')
    ->where('status', '=', 'Sehat')
    ->count();

    $jumlah_pusktlayak = DB::table('puskesmass')
    ->where('status', '=', 'Tidak Sehat')
    ->count();
//HOTEL
    $jumlah_hotel = DB::table('hotels')
    ->where('total_nilai', '!=', null)
    ->count();

    $jumlah_hotellayak = DB::table('hotels')
    ->where('status', '=', 'Sehat')
    ->count();

    $jumlah_hoteltlayak = DB::table('hotels')
    ->where('status', '=', 'Tidak Sehat')
    ->count();
//HOTEL MELATI
    $jumlah_hotelm = DB::table('hotel_melatis')
    ->where('total_nilai', '!=', null)
    ->count();

    $jumlah_hotelmlayak = DB::table('hotel_melatis')
    ->where('status', '=', 'Sehat')
    ->count();

    $jumlah_hotelmtlayak = DB::table('hotel_melatis')
    ->where('status', '=', 'Tidak Sehat')
    ->count();
//PASAR
    $jumlah_pasar = DB::table('pasars')
    ->where('total_nilai', '!=', null)
    ->count();

    $jumlah_pasarlayak = DB::table('pasars')
    ->where('status', '=', 'Sehat')
    ->count();

    $jumlah_pasartlayak = DB::table('pasars')
    ->where('status', '=', 'Tidak Sehat')
    ->count();
//KOLAM
    $jumlah_kolam = DB::table('kolam_renangs')
    ->where('total_nilai', '!=', null)
    ->count();

    $jumlah_kolamlayak = DB::table('kolam_renangs')
    ->where('status', '=', 'Sehat')
    ->count();

    $jumlah_kolamtlayak = DB::table('kolam_renangs')
    ->where('status', '=', 'Tidak Sehat')
    ->count();
//THE REAL RS
    $jumlah_rss = DB::table('rss')
    ->where('total_nilai', '!=', null)
    ->count();

    $jumlah_rslayak = DB::table('rss')
    ->where('status', '=', 'Sehat')
    ->count();

    $jumlah_rstlayak = DB::table('rss')
    ->where('status', '=', 'Tidak Sehat')
    ->count();

    $getHistoryData = DB::table('historys')
                        ->leftJoin('petugas_sikelings as p', 'p.id_petugas', '=', 'historys.id_petugas')
                        ->limit(10)
                        ->get();
// return
    return view('sipp-kling-pages/filter-pages/dashboard', compact ('jumlah_rs', 'jumlah_rssehat', 'jumlah_rstidaksehat', 
      'jumlah_pjb','jumlah_adapjb','jumlah_tidakpjb',
      'jumlah_spal', 'jumlah_spalterbuka','jumlah_spaltertutup',
      'jumlah_tps', 'jumlah_tpsorganik','jumlah_tpsdibuang',
      'jumlah_jamban', 'jumlah_koya','jumlah_kali', 'jumlah_helikopter', 'jumlah_septik',
      'jumlah_pkl', 'jumlah_pkldalam','jumlah_pklluar',
      'jumlah_kuliner', 'jumlah_kullayak','jumlah_kultlayak',
      'jumlah_dam', 'jumlah_damlayak','jumlah_damtlayak',
      'jumlah_masjid', 'jumlah_masjidlayak','jumlah_masjidtlayak',
      'jumlah_sekolah', 'jumlah_sekolahlayak','jumlah_sekolahtlayak',
      'jumlah_pesantren', 'jumlah_pesantrenlayak','jumlah_pesantrentlayak',
      'jumlah_pusk', 'jumlah_pusklayak','jumlah_pusktlayak',
      'jumlah_hotel', 'jumlah_hotellayak','jumlah_hoteltlayak',
      'jumlah_hotelm', 'jumlah_hotelmlayak','jumlah_hotelmtlayak',
      'jumlah_pasar', 'jumlah_pasarlayak','jumlah_pasartlayak',
      'jumlah_kolam', 'jumlah_kolamlayak','jumlah_kolamtlayak',
      'jumlah_rss', 'jumlah_rslayak','jumlah_rstlayak',
      'jumlah_jb', 'jumlah_jblayak','jumlah_jbtlayak',
      'jumlah_pkl', 'jumlah_pkldalam','jumlah_pklluar', 'data_kelurahan', 'param_kecamatan', 'param_kelurahan', 'getHistoryData'));
    }


    public function getDataKelurahan(){
        return DB::table('petugas_sikelings')
        ->select('kelurahan')
        ->groupBy('kelurahan')
        ->orderBy('kelurahan', 'asc')
        ->get();
    }

} 

