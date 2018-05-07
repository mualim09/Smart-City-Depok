<?php

namespace App\Repositories;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use Illuminate\Support\Facades\Input;

class DataCountRepository
{

    protected $repository;

    public function __construct(Repository $repository){
        $this->repository = $repository;
    }

    public function getSpesificCount($table, $where){
        $subQuery = DB::table('petugas_sikelings')
        ->selectRaw('petugas_sikelings.kecamatan, petugas_sikelings.id_petugas')
        ->join($table, 'petugas_sikelings.id_petugas', '=', $table.'.id_petugas')
        ->where($where[0], $where[1]);

        return DB::table('petugas_sikelings')
        ->selectRaw('COUNT(a.kecamatan) as total, petugas_sikelings.kecamatan')
        ->leftJoin(DB::raw('('.$subQuery->toSql().') as a'), 'petugas_sikelings.id_petugas', '=', 'a.id_petugas')
        ->groupBy('petugas_sikelings.kecamatan')
        ->orderBy('petugas_sikelings.kecamatan', 'asc')
        ->mergeBindings($subQuery)
        ->get();
    }

    public function getSpesificCountPeriode($table, $where){
        $subQuery = DB::table('petugas_sikelings')
        ->selectRaw('petugas_sikelings.kecamatan, petugas_sikelings.id_petugas')
        ->join($table, 'petugas_sikelings.id_petugas', '=', $table.'.id_petugas')
        ->where($where[0], $where[1]);

        return DB::table('petugas_sikelings')
        ->selectRaw('COUNT(a.kecamatan) as total, petugas_sikelings.kecamatan')
        ->leftJoin(DB::raw('('.$subQuery->toSql().') as a'), 'petugas_sikelings.id_petugas', '=', 'a.id_petugas')
        ->groupBy('petugas_sikelings.kecamatan')
        ->orderBy('petugas_sikelings.kecamatan', 'asc')
        ->mergeBindings($subQuery)
        ->get();
    }

    public function getSpesificCountWithKecamatanParam($table, $where, $param_kecamatan){
        $subQuery = DB::table('petugas_sikelings')
        ->selectRaw('petugas_sikelings.kelurahan, petugas_sikelings.id_petugas')
        ->join($table, 'petugas_sikelings.id_petugas', '=', $table.'.id_petugas')
        ->where($where[0], $where[1]);

        return DB::table('petugas_sikelings')
        ->selectRaw('COUNT(a.kelurahan) as total, petugas_sikelings.kelurahan')
        ->leftJoin(DB::raw('('.$subQuery->toSql().') as a'), 'petugas_sikelings.id_petugas', '=', 'a.id_petugas')
        ->groupBy('petugas_sikelings.kelurahan')
        ->orderBy('petugas_sikelings.kelurahan', 'asc')
        ->mergeBindings($subQuery)
        ->where('petugas_sikelings.kecamatan',$param_kecamatan)
        ->get();
    }

    public function getDataCountDashboard(){

        $reward = DB::table('rumah_sehat')
                    ->selectRaw('COUNT(*) as total, ps.nama, ps.kecamatan, ps.kelurahan')
                    ->leftJoin('petugas_sikelings as ps', 'ps.id_petugas','=','rumah_sehat.id_petugas')
                    ->groupBy('ps.id_petugas')
                    ->orderBy('total','desc')
                    ->limit(5)
                    ->get();

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

        //RW SPAL TERBUKA 1-20
        $spaltbrw1 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 01')
        ->where('spal', '=', 'Terbuka')
        ->count();

                $spaltbrw2 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 02')
        ->where('spal', '=', 'Terbuka')
        ->count();

                $spaltbrw3 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 03')
        ->where('spal', '=', 'Terbuka')
        ->count();

                $spaltbrw4 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 04')
        ->where('spal', '=', 'Terbuka')
        ->count();

                $spaltbrw5 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 05')
        ->where('spal', '=', 'Terbuka')
        ->count();

                $spaltbrw6 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 06')
        ->where('spal', '=', 'Terbuka')
        ->count();

                $spaltbrw7 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 07')
        ->where('spal', '=', 'Terbuka')
        ->count();

                $spaltbrw8 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 08')
        ->where('spal', '=', 'Terbuka')
        ->count();

                $spaltbrw9 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 09')
        ->where('spal', '=', 'Terbuka')
        ->count();

                $spaltbrw10 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 10')
        ->where('spal', '=', 'Terbuka')
        ->count();

        $spaltbrw11 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 11')
        ->where('spal', '=', 'Terbuka')
        ->count();

                $spaltbrw12 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 12')
        ->where('spal', '=', 'Terbuka')
        ->count();

                $spaltbrw13 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 13')
        ->where('spal', '=', 'Terbuka')
        ->count();

                $spaltbrw14 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 14')
        ->where('spal', '=', 'Terbuka')
        ->count();

                $spaltbrw15 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 15')
        ->where('spal', '=', 'Terbuka')
        ->count();

                $spaltbrw16 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 16')
        ->where('spal', '=', 'Terbuka')
        ->count();

                $spaltbrw17 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 17')
        ->where('spal', '=', 'Terbuka')
        ->count();

                $spaltbrw18 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 18')
        ->where('spal', '=', 'Terbuka')
        ->count();

                $spaltbrw19 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 19')
        ->where('spal', '=', 'Terbuka')
        ->count();

                $spaltbrw20 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 20')
        ->where('spal', '=', 'Terbuka')
        ->count();

$spaltb = $spaltbrw1 + $spaltbrw2 + $spaltbrw3 + $spaltbrw4 + $spaltbrw5 +
$spaltbrw6 + $spaltbrw7 + $spaltbrw8 + $spaltbrw9 + $spaltbrw10+
$spaltbrw11 + $spaltbrw12 + $spaltbrw13 + $spaltbrw14 + $spaltbrw15+
$spaltbrw16 + $spaltbrw17 + $spaltbrw18 + $spaltbrw19 + $spaltbrw20;


//RW SPAL TERTTUTUP 1-20
        $spaltprw1 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 01')
        ->where('spal', '=', 'Tertutup')
        ->count();

                $spaltprw2 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 02')
        ->where('spal', '=', 'Tertutup')
        ->count();

                $spaltprw3 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 03')
        ->where('spal', '=', 'Tertutup')
        ->count();

                $spaltprw4 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 04')
        ->where('spal', '=', 'Tertutup')
        ->count();

                $spaltprw5 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 05')
        ->where('spal', '=', 'Tertutup')
        ->count();

                $spaltprw6 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 06')
        ->where('spal', '=', 'Tertutup')
        ->count();

                $spaltprw7 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 07')
        ->where('spal', '=', 'Tertutup')
        ->count();

                $spaltprw8 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 08')
        ->where('spal', '=', 'Tertutup')
        ->count();

                $spaltprw9 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 09')
        ->where('spal', '=', 'Tertutup')
        ->count();

                $spaltprw10 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 10')
        ->where('spal', '=', 'Tertutup')
        ->count();

        $spaltprw11 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 11')
        ->where('spal', '=', 'Tertutup')
        ->count();

                $spaltprw12 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 12')
        ->where('spal', '=', 'Tertutup')
        ->count();

                $spaltprw13 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 13')
        ->where('spal', '=', 'Tertutup')
        ->count();

                $spaltprw14 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 14')
        ->where('spal', '=', 'Tertutup')
        ->count();

                $spaltprw15 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 15')
        ->where('spal', '=', 'Tertutup')
        ->count();

                $spaltprw16 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 16')
        ->where('spal', '=', 'Tertutup')
        ->count();

                $spaltprw17 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 17')
        ->where('spal', '=', 'Tertutup')
        ->count();

                $spaltprw18 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 18')
        ->where('spal', '=', 'Tertutup')
        ->count();

                $spaltprw19 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 19')
        ->where('spal', '=', 'Tertutup')
        ->count();

                $spaltprw20 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 20')
        ->where('spal', '=', 'Tertutup')
        ->count();

$spaltp = $spaltprw1 + $spaltprw2 + $spaltprw3 + $spaltprw4 + $spaltprw5 +
$spaltprw6 + $spaltprw7 + $spaltprw8 + $spaltprw9 + $spaltprw10+
$spaltprw11 + $spaltprw12 + $spaltprw13 + $spaltprw14 + $spaltprw15+
$spaltprw16 + $spaltprw17 + $spaltprw18 + $spaltprw19 + $spaltprw20;




//RW sampah DIPILAH 1-20
        $sampahpilihrw1 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 01')
        ->where('sampah', '=', 'Dipilah / Organik')
        ->count();

                $sampahpilihrw2 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 02')
        ->where('sampah', '=', 'Dipilah / Organik')
        ->count();

                $sampahpilihrw3 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 03')
        ->where('sampah', '=', 'Dipilah / Organik')
        ->count();

                $sampahpilihrw4 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 04')
        ->where('sampah', '=', 'Dipilah / Organik')
        ->count();

                $sampahpilihrw5 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 05')
        ->where('sampah', '=', 'Dipilah / Organik')
        ->count();

                $sampahpilihrw6 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 06')
        ->where('sampah', '=', 'Dipilah / Organik')
        ->count();

                $sampahpilihrw7 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 07')
        ->where('sampah', '=', 'Dipilah / Organik')
        ->count();

                $sampahpilihrw8 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 08')
        ->where('sampah', '=', 'Dipilah / Organik')
        ->count();

                $sampahpilihrw9 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 09')
        ->where('sampah', '=', 'Dipilah / Organik')
        ->count();

                $sampahpilihrw10 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 10')
        ->where('sampah', '=', 'Dipilah / Organik')
        ->count();

        $sampahpilihrw11 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 11')
        ->where('sampah', '=', 'Dipilah / Organik')
        ->count();

                $sampahpilihrw12 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 12')
        ->where('sampah', '=', 'Dipilah / Organik')
        ->count();

                $sampahpilihrw13 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 13')
        ->where('sampah', '=', 'Dipilah / Organik')
        ->count();

                $sampahpilihrw14 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 14')
        ->where('sampah', '=', 'Dipilah / Organik')
        ->count();

                $sampahpilihrw15 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 15')
        ->where('sampah', '=', 'Dipilah / Organik')
        ->count();

                $sampahpilihrw16 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 16')
        ->where('sampah', '=', 'Dipilah / Organik')
        ->count();

                $sampahpilihrw17 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 17')
        ->where('sampah', '=', 'Dipilah / Organik')
        ->count();

                $sampahpilihrw18 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 18')
        ->where('sampah', '=', 'Dipilah / Organik')
        ->count();

                $sampahpilihrw19 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 19')
        ->where('sampah', '=', 'Dipilah / Organik')
        ->count();

                $sampahpilihrw20 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 20')
        ->where('sampah', '=', 'Dipilah / Organik')
        ->count();

$sampahpilih = $sampahpilihrw1 + $sampahpilihrw2 + $sampahpilihrw3 + $sampahpilihrw4 + $sampahpilihrw5 +
$sampahpilihrw6 + $sampahpilihrw7 + $sampahpilihrw8 + $sampahpilihrw9 + $sampahpilihrw10+
$sampahpilihrw11 + $sampahpilihrw12 + $sampahpilihrw13 + $sampahpilihrw14 + $sampahpilihrw15+
$sampahpilihrw16 + $sampahpilihrw17 + $sampahpilihrw18 + $sampahpilihrw19 + $sampahpilihrw20;





//RW sampah DIBUANG 1-20
        $sampahtpilihrw1 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 01')
        ->where('sampah', '=', 'Tidak Dipilah / Dibuang')
        ->count();

                $sampahtpilihrw2 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 02')
        ->where('sampah', '=', 'Tidak Dipilah / Dibuang')
        ->count();

                $sampahtpilihrw3 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 03')
        ->where('sampah', '=', 'Tidak Dipilah / Dibuang')
        ->count();

                $sampahtpilihrw4 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 04')
        ->where('sampah', '=', 'Tidak Dipilah / Dibuang')
        ->count();

                $sampahtpilihrw5 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 05')
        ->where('sampah', '=', 'Tidak Dipilah / Dibuang')
        ->count();

                $sampahtpilihrw6 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 06')
        ->where('sampah', '=', 'Tidak Dipilah / Dibuang')
        ->count();

                $sampahtpilihrw7 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 07')
        ->where('sampah', '=', 'Tidak Dipilah / Dibuang')
        ->count();

                $sampahtpilihrw8 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 08')
        ->where('sampah', '=', 'Tidak Dipilah / Dibuang')
        ->count();

                $sampahtpilihrw9 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 09')
        ->where('sampah', '=', 'Tidak Dipilah / Dibuang')
        ->count();

                $sampahtpilihrw10 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 10')
        ->where('sampah', '=', 'Tidak Dipilah / Dibuang')
        ->count();

        $sampahtpilihrw11 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 11')
        ->where('sampah', '=', 'Tidak Dipilah / Dibuang')
        ->count();

                $sampahtpilihrw12 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 12')
        ->where('sampah', '=', 'Tidak Dipilah / Dibuang')
        ->count();

                $sampahtpilihrw13 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 13')
        ->where('sampah', '=', 'Tidak Dipilah / Dibuang')
        ->count();

                $sampahtpilihrw14 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 14')
        ->where('sampah', '=', 'Tidak Dipilah / Dibuang')
        ->count();

                $sampahtpilihrw15 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 15')
        ->where('sampah', '=', 'Tidak Dipilah / Dibuang')
        ->count();

                $sampahtpilihrw16 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 16')
        ->where('sampah', '=', 'Tidak Dipilah / Dibuang')
        ->count();

                $sampahtpilihrw17 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 17')
        ->where('sampah', '=', 'Tidak Dipilah / Dibuang')
        ->count();

                $sampahtpilihrw18 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 18')
        ->where('sampah', '=', 'Tidak Dipilah / Dibuang')
        ->count();

                $sampahtpilihrw19 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 19')
        ->where('sampah', '=', 'Tidak Dipilah / Dibuang')
        ->count();

                $sampahtpilihrw20 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 20')
        ->where('sampah', '=', 'Tidak Dipilah / Dibuang')
        ->count();

$sampahtpilih = $sampahtpilihrw1 + $sampahtpilihrw2 + $sampahtpilihrw3 + $sampahtpilihrw4 + $sampahtpilihrw5 +
$sampahtpilihrw6 + $sampahtpilihrw7 + $sampahtpilihrw8 + $sampahtpilihrw9 + $sampahtpilihrw10+
$sampahtpilihrw11 + $sampahtpilihrw12 + $sampahtpilihrw13 + $sampahtpilihrw14 + $sampahtpilihrw15+
$sampahtpilihrw16 + $sampahtpilihrw17 + $sampahtpilihrw18 + $sampahtpilihrw19 + $sampahtpilihrw20;





///RW Rumah sehat 1-20
        $sehattpilihrw1 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 01')
        ->where('status', '=', 'Rumah Sehat')
        ->count();

                $sehattpilihrw2 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 02')
        ->where('status', '=', 'Rumah Sehat')
        ->count();

                $sehattpilihrw3 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 03')
        ->where('status', '=', 'Rumah Sehat')
        ->count();

                $sehattpilihrw4 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 04')
        ->where('status', '=', 'Rumah Sehat')
        ->count();

                $sehattpilihrw5 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 05')
        ->where('status', '=', 'Rumah Sehat')
        ->count();

                $sehattpilihrw6 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 06')
        ->where('status', '=', 'Rumah Sehat')
        ->count();

                $sehattpilihrw7 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 07')
        ->where('status', '=', 'Rumah Sehat')
        ->count();

                $sehattpilihrw8 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 08')
        ->where('status', '=', 'Rumah Sehat')
        ->count();

                $sehattpilihrw9 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 09')
        ->where('status', '=', 'Rumah Sehat')
        ->count();

                $sehattpilihrw10 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 10')
        ->where('status', '=', 'Rumah Sehat')
        ->count();

        $sehattpilihrw11 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 11')
        ->where('status', '=', 'Rumah Sehat')
        ->count();

                $sehattpilihrw12 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 12')
        ->where('status', '=', 'Rumah Sehat')
        ->count();

                $sehattpilihrw13 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 13')
        ->where('status', '=', 'Rumah Sehat')
        ->count();

                $sehattpilihrw14 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 14')
        ->where('status', '=', 'Rumah Sehat')
        ->count();

                $sehattpilihrw15 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 15')
        ->where('status', '=', 'Rumah Sehat')
        ->count();

                $sehattpilihrw16 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 16')
        ->where('status', '=', 'Rumah Sehat')
        ->count();

                $sehattpilihrw17 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 17')
        ->where('status', '=', 'Rumah Sehat')
        ->count();

                $sehattpilihrw18 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 18')
        ->where('status', '=', 'Rumah Sehat')
        ->count();

                $sehattpilihrw19 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 19')
        ->where('status', '=', 'Rumah Sehat')
        ->count();

                $sehattpilihrw20 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 20')
        ->where('status', '=', 'Rumah Sehat')
        ->count();

$sehattpilih = $sehattpilihrw1 + $sehattpilihrw2 + $sehattpilihrw3 + $sehattpilihrw4 + $sehattpilihrw5 +
$sehattpilihrw6 + $sehattpilihrw7 + $sehattpilihrw8 + $sehattpilihrw9 + $sehattpilihrw10+
$sehattpilihrw11 + $sehattpilihrw12 + $sehattpilihrw13 + $sehattpilihrw14 + $sehattpilihrw15+
$sehattpilihrw16 + $sehattpilihrw17 + $sehattpilihrw18 + $sehattpilihrw19 + $sehattpilihrw20;



//RW Rumah Tidak Sehat 1-20
        $rumahtsehatrw1 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 01')
        ->where('status', '=', 'Rumah Tidak Sehat')
        ->count();

                $rumahtsehatrw2 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 02')
        ->where('status', '=', 'Rumah Tidak Sehat')
        ->count();

                $rumahtsehatrw3 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 03')
        ->where('status', '=', 'Rumah Tidak Sehat')
        ->count();

                $rumahtsehatrw4 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 04')
        ->where('status', '=', 'Rumah Tidak Sehat')
        ->count();

                $rumahtsehatrw5 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 05')
        ->where('status', '=', 'Rumah Tidak Sehat')
        ->count();

                $rumahtsehatrw6 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 06')
        ->where('status', '=', 'Rumah Tidak Sehat')
        ->count();

                $rumahtsehatrw7 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 07')
        ->where('status', '=', 'Rumah Tidak Sehat')
        ->count();

                $rumahtsehatrw8 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 08')
        ->where('status', '=', 'Rumah Tidak Sehat')
        ->count();

                $rumahtsehatrw9 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 09')
        ->where('status', '=', 'Rumah Tidak Sehat')
        ->count();

                $rumahtsehatrw10 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 10')
        ->where('status', '=', 'Rumah Tidak Sehat')
        ->count();

        $rumahtsehatrw11 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 11')
        ->where('status', '=', 'Rumah Tidak Sehat')
        ->count();

                $rumahtsehatrw12 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 12')
        ->where('status', '=', 'Rumah Tidak Sehat')
        ->count();

                $rumahtsehatrw13 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 13')
        ->where('status', '=', 'Rumah Tidak Sehat')
        ->count();

                $rumahtsehatrw14 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 14')
        ->where('status', '=', 'Rumah Tidak Sehat')
        ->count();

                $rumahtsehatrw15 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 15')
        ->where('status', '=', 'Rumah Tidak Sehat')
        ->count();

                $rumahtsehatrw16 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 16')
        ->where('status', '=', 'Rumah Tidak Sehat')
        ->count();

                $rumahtsehatrw17 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 17')
        ->where('status', '=', 'Rumah Tidak Sehat')
        ->count();

                $rumahtsehatrw18 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 18')
        ->where('status', '=', 'Rumah Tidak Sehat')
        ->count();

                $rumahtsehatrw19 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 19')
        ->where('status', '=', 'Rumah Tidak Sehat')
        ->count();

                $rumahtsehatrw20 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 20')
        ->where('status', '=', 'Rumah Tidak Sehat')
        ->count();

$rumahtsehat = $rumahtsehatrw1 + $rumahtsehatrw2 + $rumahtsehatrw3 + $rumahtsehatrw4 + $rumahtsehatrw5 +
$rumahtsehatrw6 + $rumahtsehatrw7 + $rumahtsehatrw8 + $rumahtsehatrw9 + $rumahtsehatrw10+
$rumahtsehatrw11 + $rumahtsehatrw12 + $rumahtsehatrw13 + $rumahtsehatrw14 + $rumahtsehatrw15+
$rumahtsehatrw16 + $rumahtsehatrw17 + $rumahtsehatrw18 + $rumahtsehatrw19 + $rumahtsehatrw20;




//PJB RW YA 1-20
        $pjbyarw1 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 01')
        ->where('pjb', '=', 'YA')
        ->count();

                $pjbyarw2 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 02')
        ->where('pjb', '=', 'YA')
        ->count();

                $pjbyarw3 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 03')
        ->where('pjb', '=', 'YA')
        ->count();

                $pjbyarw4 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 04')
        ->where('pjb', '=', 'YA')
        ->count();

                $pjbyarw5 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 05')
        ->where('pjb', '=', 'YA')
        ->count();

                $pjbyarw6 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 06')
        ->where('pjb', '=', 'YA')
        ->count();

                $pjbyarw7 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 07')
        ->where('pjb', '=', 'YA')
        ->count();

                $pjbyarw8 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 08')
        ->where('pjb', '=', 'YA')
        ->count();

                $pjbyarw9 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 09')
        ->where('pjb', '=', 'YA')
        ->count();

                $pjbyarw10 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 10')
        ->where('pjb', '=', 'YA')
        ->count();

        $pjbyarw11 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 11')
        ->where('pjb', '=', 'YA')
        ->count();

                $pjbyarw12 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 12')
        ->where('pjb', '=', 'YA')
        ->count();

                $pjbyarw13 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 13')
        ->where('pjb', '=', 'YA')
        ->count();

                $pjbyarw14 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 14')
        ->where('pjb', '=', 'YA')
        ->count();

                $pjbyarw15 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 15')
        ->where('pjb', '=', 'YA')
        ->count();

                $pjbyarw16 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 16')
        ->where('pjb', '=', 'YA')
        ->count();

                $pjbyarw17 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 17')
        ->where('pjb', '=', 'YA')
        ->count();

                $pjbyarw18 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 18')
        ->where('pjb', '=', 'YA')
        ->count();

                $pjbyarw19 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 19')
        ->where('pjb', '=', 'YA')
        ->count();

                $pjbyarw20 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 20')
        ->where('pjb', '=', 'YA')
        ->count();

$pjbya = $pjbyarw1 + $pjbyarw2 + $pjbyarw3 + $pjbyarw4 + $pjbyarw5 +
$pjbyarw6 + $pjbyarw7 + $pjbyarw8 + $pjbyarw9 + $pjbyarw10+
$pjbyarw11 + $pjbyarw12 + $pjbyarw13 + $pjbyarw14 + $pjbyarw15+
$pjbyarw16 + $pjbyarw17 + $pjbyarw18 + $pjbyarw19 + $pjbyarw20;





//PJB RW YA 1-20
        $pjbtarw1 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 01')
        ->where('pjb', '=', 'TIDAK')
        ->count();

                $pjbtarw2 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 02')
        ->where('pjb', '=', 'TIDAK')
        ->count();

                $pjbtarw3 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 03')
        ->where('pjb', '=', 'TIDAK')
        ->count();

                $pjbtarw4 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 04')
        ->where('pjb', '=', 'TIDAK')
        ->count();

                $pjbtarw5 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 05')
        ->where('pjb', '=', 'TIDAK')
        ->count();

                $pjbtarw6 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 06')
        ->where('pjb', '=', 'TIDAK')
        ->count();

                $pjbtarw7 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 07')
        ->where('pjb', '=', 'TIDAK')
        ->count();

                $pjbtarw8 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 08')
        ->where('pjb', '=', 'TIDAK')
        ->count();

                $pjbtarw9 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 09')
        ->where('pjb', '=', 'TIDAK')
        ->count();

                $pjbtarw10 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 10')
        ->where('pjb', '=', 'TIDAK')
        ->count();

        $pjbtarw11 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 11')
        ->where('pjb', '=', 'TIDAK')
        ->count();

                $pjbtarw12 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 12')
        ->where('pjb', '=', 'TIDAK')
        ->count();

                $pjbtarw13 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 13')
        ->where('pjb', '=', 'TIDAK')
        ->count();

                $pjbtarw14 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 14')
        ->where('pjb', '=', 'TIDAK')
        ->count();

                $pjbtarw15 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 15')
        ->where('pjb', '=', 'TIDAK')
        ->count();

                $pjbtarw16 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 16')
        ->where('pjb', '=', 'TIDAK')
        ->count();

                $pjbtarw17 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 17')
        ->where('pjb', '=', 'TIDAK')
        ->count();

                $pjbtarw18 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 18')
        ->where('pjb', '=', 'TIDAK')
        ->count();

                $pjbtarw19 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 19')
        ->where('pjb', '=', 'TIDAK')
        ->count();

                $pjbtarw20 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 20')
        ->where('pjb', '=', 'TIDAK')
        ->count();

$pjbta = $pjbtarw1 + $pjbtarw2 + $pjbtarw3 + $pjbtarw4 + $pjbtarw5 +
$pjbtarw6 + $pjbtarw7 + $pjbtarw8 + $pjbtarw9 + $pjbtarw10+
$pjbtarw11 + $pjbtarw12 + $pjbtarw13 + $pjbtarw14 + $pjbtarw15+
$pjbtarw16 + $pjbtarw17 + $pjbtarw18 + $pjbtarw19 + $pjbtarw20;





//PJB RW YA 1-20
        $kalirw1 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 01')
        ->where('jamban', '=', 'Kali')
        ->count();

                $kalirw2 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 02')
        ->where('jamban', '=', 'Kali')
        ->count();

                $kalirw3 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 03')
        ->where('jamban', '=', 'Kali')
        ->count();

                $kalirw4 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 04')
        ->where('jamban', '=', 'Kali')
        ->count();

                $kalirw5 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 05')
        ->where('jamban', '=', 'Kali')
        ->count();

                $kalirw6 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 06')
        ->where('jamban', '=', 'Kali')
        ->count();

                $kalirw7 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 07')
        ->where('jamban', '=', 'Kali')
        ->count();

                $kalirw8 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 08')
        ->where('jamban', '=', 'Kali')
        ->count();

                $kalirw9 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 09')
        ->where('jamban', '=', 'Kali')
        ->count();

                $kalirw10 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 10')
        ->where('jamban', '=', 'Kali')
        ->count();

        $kalirw11 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 11')
        ->where('jamban', '=', 'Kali')
        ->count();

                $kalirw12 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 12')
        ->where('jamban', '=', 'Kali')
        ->count();

                $kalirw13 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 13')
        ->where('jamban', '=', 'Kali')
        ->count();

                $kalirw14 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 14')
        ->where('jamban', '=', 'Kali')
        ->count();

                $kalirw15 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 15')
        ->where('jamban', '=', 'Kali')
        ->count();

                $kalirw16 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 16')
        ->where('jamban', '=', 'Kali')
        ->count();

                $kalirw17 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 17')
        ->where('jamban', '=', 'Kali')
        ->count();

                $kalirw18 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 18')
        ->where('jamban', '=', 'Kali')
        ->count();

                $kalirw19 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 19')
        ->where('jamban', '=', 'Kali')
        ->count();

                $kalirw20 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 20')
        ->where('jamban', '=', 'Kali')
        ->count();

$kali = $kalirw1 + $kalirw2 + $kalirw3 + $kalirw4 + $kalirw5 +
$kalirw6 + $kalirw7 + $kalirw8 + $kalirw9 + $kalirw10+
$kalirw11 + $kalirw12 + $kalirw13 + $kalirw14 + $kalirw15+
$kalirw16 + $kalirw17 + $kalirw18 + $kalirw19 + $kalirw20;




//PJB RW YA 1-20
        $koyarw1 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 01')
        ->where('jamban', '=', 'Koya / Empang')
        ->count();

                $koyarw2 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 02')
        ->where('jamban', '=', 'Koya / Empang')
        ->count();

                $koyarw3 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 03')
        ->where('jamban', '=', 'Koya / Empang')
        ->count();

                $koyarw4 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 04')
        ->where('jamban', '=', 'Koya / Empang')
        ->count();

                $koyarw5 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 05')
        ->where('jamban', '=', 'Koya / Empang')
        ->count();

                $koyarw6 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 06')
        ->where('jamban', '=', 'Koya / Empang')
        ->count();

                $koyarw7 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 07')
        ->where('jamban', '=', 'Koya / Empang')
        ->count();

                $koyarw8 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 08')
        ->where('jamban', '=', 'Koya / Empang')
        ->count();

                $koyarw9 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 09')
        ->where('jamban', '=', 'Koya / Empang')
        ->count();

                $koyarw10 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 10')
        ->where('jamban', '=', 'Koya / Empang')
        ->count();

        $koyarw11 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 11')
        ->where('jamban', '=', 'Koya / Empang')
        ->count();

                $koyarw12 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 12')
        ->where('jamban', '=', 'Koya / Empang')
        ->count();

                $koyarw13 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 13')
        ->where('jamban', '=', 'Koya / Empang')
        ->count();

                $koyarw14 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 14')
        ->where('jamban', '=', 'Koya / Empang')
        ->count();

                $koyarw15 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 15')
        ->where('jamban', '=', 'Koya / Empang')
        ->count();

                $koyarw16 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 16')
        ->where('jamban', '=', 'Koya / Empang')
        ->count();

                $koyarw17 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 17')
        ->where('jamban', '=', 'Koya / Empang')
        ->count();

                $koyarw18 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 18')
        ->where('jamban', '=', 'Koya / Empang')
        ->count();

                $koyarw19 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 19')
        ->where('jamban', '=', 'Koya / Empang')
        ->count();

                $koyarw20 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 20')
        ->where('jamban', '=', 'Koya / Empang')
        ->count();

$koya = $koyarw1 + $koyarw2 + $koyarw3 + $koyarw4 + $koyarw5 +
$koyarw6 + $koyarw7 + $koyarw8 + $koyarw9 + $koyarw10+
$koyarw11 + $koyarw12 + $koyarw13 + $koyarw14 + $koyarw15+
$koyarw16 + $koyarw17 + $koyarw18 + $koyarw19 + $koyarw20;




//PJB RW YA 1-20
        $helikopterrw1 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 01')
        ->where('jamban', '=', 'Helikopter')
        ->count();

                $helikopterrw2 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 02')
        ->where('jamban', '=', 'Helikopter')
        ->count();

                $helikopterrw3 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 03')
        ->where('jamban', '=', 'Helikopter')
        ->count();

                $helikopterrw4 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 04')
        ->where('jamban', '=', 'Helikopter')
        ->count();

                $helikopterrw5 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 05')
        ->where('jamban', '=', 'Helikopter')
        ->count();

                $helikopterrw6 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 06')
        ->where('jamban', '=', 'Helikopter')
        ->count();

                $helikopterrw7 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 07')
        ->where('jamban', '=', 'Helikopter')
        ->count();

                $helikopterrw8 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 08')
        ->where('jamban', '=', 'Helikopter')
        ->count();

                $helikopterrw9 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 09')
        ->where('jamban', '=', 'Helikopter')
        ->count();

                $helikopterrw10 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 10')
        ->where('jamban', '=', 'Helikopter')
        ->count();

        $helikopterrw11 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 11')
        ->where('jamban', '=', 'Helikopter')
        ->count();

                $helikopterrw12 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 12')
        ->where('jamban', '=', 'Helikopter')
        ->count();

                $helikopterrw13 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 13')
        ->where('jamban', '=', 'Helikopter')
        ->count();

                $helikopterrw14 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 14')
        ->where('jamban', '=', 'Helikopter')
        ->count();

                $helikopterrw15 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 15')
        ->where('jamban', '=', 'Helikopter')
        ->count();

                $helikopterrw16 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 16')
        ->where('jamban', '=', 'Helikopter')
        ->count();

                $helikopterrw17 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 17')
        ->where('jamban', '=', 'Helikopter')
        ->count();

                $helikopterrw18 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 18')
        ->where('jamban', '=', 'Helikopter')
        ->count();

                $helikopterrw19 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 19')
        ->where('jamban', '=', 'Helikopter')
        ->count();

                $helikopterrw20 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 20')
        ->where('jamban', '=', 'Helikopter')
        ->count();

$helikopter = $helikopterrw1 + $helikopterrw2 + $helikopterrw3 + $helikopterrw4 + $helikopterrw5 +
$helikopterrw6 + $helikopterrw7 + $helikopterrw8 + $helikopterrw9 + $helikopterrw10+
$helikopterrw11 + $helikopterrw12 + $helikopterrw13 + $helikopterrw14 + $helikopterrw15+
$helikopterrw16 + $helikopterrw17 + $helikopterrw18 + $helikopterrw19 + $helikopterrw20;





//PJB RW YA 1-20
        $septikrw1 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 01')
        ->where('jamban', '=', 'Septik Tank')
        ->count();

                $septikrw2 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 02')
        ->where('jamban', '=', 'Septik Tank')
        ->count();

                $septikrw3 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 03')
        ->where('jamban', '=', 'Septik Tank')
        ->count();

                $septikrw4 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 04')
        ->where('jamban', '=', 'Septik Tank')
        ->count();

                $septikrw5 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 05')
        ->where('jamban', '=', 'Septik Tank')
        ->count();

                $septikrw6 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 06')
        ->where('jamban', '=', 'Septik Tank')
        ->count();

                $septikrw7 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 07')
        ->where('jamban', '=', 'Septik Tank')
        ->count();

                $septikrw8 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 08')
        ->where('jamban', '=', 'Septik Tank')
        ->count();

                $septikrw9 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 09')
        ->where('jamban', '=', 'Septik Tank')
        ->count();

                $septikrw10 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 10')
        ->where('jamban', '=', 'Septik Tank')
        ->count();

        $septikrw11 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 11')
        ->where('jamban', '=', 'Septik Tank')
        ->count();

                $septikrw12 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 12')
        ->where('jamban', '=', 'Septik Tank')
        ->count();

                $septikrw13 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 13')
        ->where('jamban', '=', 'Septik Tank')
        ->count();

                $septikrw14 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 14')
        ->where('jamban', '=', 'Septik Tank')
        ->count();

                $septikrw15 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 15')
        ->where('jamban', '=', 'Septik Tank')
        ->count();

                $septikrw16 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 16')
        ->where('jamban', '=', 'Septik Tank')
        ->count();

                $septikrw17 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 17')
        ->where('jamban', '=', 'Septik Tank')
        ->count();

                $septikrw18 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 18')
        ->where('jamban', '=', 'Septik Tank')
        ->count();

                $septikrw19 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 19')
        ->where('jamban', '=', 'Septik Tank')
        ->count();

                $septikrw20 = DB::table('rumah_sehat')
        ->where('rw', '=', 'RW 20')
        ->where('jamban', '=', 'Septik Tank')
        ->count();

$septik = $septikrw1 + $septikrw2 + $septikrw3 + $septikrw4 + $septikrw5 +
$septikrw6 + $septikrw7 + $septikrw8 + $septikrw9 + $septikrw10+
$septikrw11 + $septikrw12 + $septikrw13 + $septikrw14 + $septikrw15+
$septikrw16 + $septikrw17 + $septikrw18 + $septikrw19 + $septikrw20;








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
      'jumlah_pkl', 'jumlah_pkldalam','jumlah_pklluar',

'sehattpilihrw1', 'sehattpilihrw2', 'sehattpilihrw3', 'sehattpilihrw4', 'sehattpilihrw5',
'sehattpilihrw6', 'sehattpilihrw7','sehattpilihrw8','sehattpilihrw9','sehattpilihrw10',
'sehattpilihrw11', 'sehattpilihrw12','sehattpilihrw13', 'sehattpilihrw14','sehattpilihrw15',
'sehattpilihrw16', 'sehattpilihrw17', 'sehattpilihrw18', 'sehattpilihrw19','sehattpilihrw20', 'sehattpilih',


'rumahtsehatrw1', 'rumahtsehatrw2', 'rumahtsehatrw3', 'rumahtsehatrw4', 'rumahtsehatrw5',
'rumahtsehatrw6', 'rumahtsehatrw7','rumahtsehatrw8','rumahtsehatrw9','rumahtsehatrw10',
'rumahtsehatrw11', 'rumahtsehatrw12','rumahtsehatrw13', 'rumahtsehatrw14','rumahtsehatrw15',
'rumahtsehatrw16', 'rumahtsehatrw17', 'rumahtsehatrw18', 'rumahtsehatrw19','rumahtsehatrw20', 'rumahtsehat',



'spaltbrw1', 'spaltbrw2', 'spaltbrw3', 'spaltbrw4', 'spaltbrw5',
'spaltbrw6', 'spaltbrw7','spaltbrw8','spaltbrw9','spaltbrw10',
'spaltbrw11', 'spaltbrw12','spaltbrw13', 'spaltbrw14','spaltbrw15',
'spaltbrw16', 'spaltbrw17', 'spaltbrw18', 'spaltbrw19','spaltbrw20', 'spaltb',

'spaltprw1', 'spaltprw2', 'spaltprw3', 'spaltprw4', 'spaltprw5',
'spaltprw6', 'spaltprw7','spaltprw8','spaltprw9','spaltprw10',
'spaltprw11', 'spaltprw12','spaltprw13', 'spaltprw14','spaltprw15',
'spaltprw16', 'spaltprw17', 'spaltprw18', 'spaltprw19','spaltprw20', 'spaltp',

'sampahpilihrw1', 'sampahpilihrw2', 'sampahpilihrw3', 'sampahpilihrw4', 'sampahpilihrw5',
'sampahpilihrw6', 'sampahpilihrw7','sampahpilihrw8','sampahpilihrw9','sampahpilihrw10',
'sampahpilihrw11', 'sampahpilihrw12','sampahpilihrw13', 'sampahpilihrw14','sampahpilihrw15',
'sampahpilihrw16', 'sampahpilihrw17', 'sampahpilihrw18', 'sampahpilihrw19','sampahpilihrw20', 'sampahpilih',

'sampahtpilihrw1', 'sampahtpilihrw2', 'sampahtpilihrw3', 'sampahtpilihrw4', 'sampahtpilihrw5',
'sampahtpilihrw6', 'sampahtpilihrw7','sampahtpilihrw8','sampahtpilihrw9','sampahtpilihrw10',
'sampahtpilihrw11', 'sampahtpilihrw12','sampahtpilihrw13', 'sampahtpilihrw14','sampahtpilihrw15',
'sampahtpilihrw16', 'sampahtpilihrw17', 'sampahtpilihrw18', 'sampahtpilihrw19','sampahtpilihrw20', 'sampahtpilih',

'pjbyarw1', 'pjbyarw2', 'pjbyarw3', 'pjbyarw4', 'pjbyarw5',
'pjbyarw6', 'pjbyarw7','pjbyarw8','pjbyarw9','pjbyarw10',
'pjbyarw11', 'pjbyarw12','pjbyarw13', 'pjbyarw14','pjbyarw15',
'pjbyarw16', 'pjbyarw17', 'pjbyarw18', 'pjbyarw19','pjbyarw20', 'pjbya',

'pjbtarw1', 'pjbtarw2', 'pjbtarw3', 'pjbtarw4', 'pjbtarw5',
'pjbtarw6', 'pjbtarw7','pjbtarw8','pjbtarw9','pjbtarw10',
'pjbtarw11', 'pjbtarw12','pjbtarw13', 'pjbtarw14','pjbtarw15',
'pjbtarw16', 'pjbtarw17', 'pjbtarw18', 'pjbtarw19','pjbtarw20', 'pjbta',



'kalirw1', 'kalirw2', 'kalirw3', 'kalirw4', 'kalirw5',
'kalirw6', 'kalirw7','kalirw8','kalirw9','kalirw10',
'kalirw11', 'kalirw12','kalirw13', 'kalirw14','kalirw15',
'kalirw16', 'kalirw17', 'kalirw18', 'kalirw19','kalirw20', 'kali',

'koyarw1', 'koyarw2', 'koyarw3', 'koyarw4', 'koyarw5',
'koyarw6', 'koyarw7','koyarw8','koyarw9','koyarw10',
'koyarw11', 'koyarw12','koyarw13', 'koyarw14','koyarw15',
'koyarw16', 'koyarw17', 'koyarw18', 'koyarw19','koyarw20', 'koya',


'helikopterrw1', 'helikopterrw2', 'helikopterrw3', 'helikopterrw4', 'helikopterrw5',
'helikopterrw6', 'helikopterrw7','helikopterrw8','helikopterrw9','helikopterrw10',
'helikopterrw11', 'helikopterrw12','helikopterrw13', 'helikopterrw14','helikopterrw15',
'helikopterrw16', 'helikopterrw17', 'helikopterrw18', 'helikopterrw19','helikopterrw20', 'helikopter',



'septikrw1', 'septikrw2', 'septikrw3', 'septikrw4', 'septikrw5',
'septikrw6', 'septikrw7','septikrw8','septikrw9','septikrw10',
'septikrw11', 'septikrw12','septikrw13', 'septikrw14','septikrw15',
'septikrw16', 'septikrw17', 'septikrw18', 'septikrw19','septikrw20', 'septik','getHistoryData','reward'




));
// return $reward;
    }

    private function viewcountparamsampah ($table, $kecamatan, $kelurahan, $sampah){

    if ($kelurahan == "0") 
          {     
            return DB::table($table)
    ->leftJoin('petugas_sikelings', $table.'.id_petugas', '=', 'petugas_sikelings.id_petugas')
    ->where('total_nilai', '!=', null) 
    ->where('kecamatan', '=', $kecamatan)
    ->where('sampah', '=', $sampah) 
    ->count();   
          }

    else {
            return DB::table($table)
    ->leftJoin('petugas_sikelings', $table.'.id_petugas', '=', 'petugas_sikelings.id_petugas')
    ->where('total_nilai', '!=', null) 
    ->where('kecamatan', '=', $kecamatan) 
    ->where('kelurahan', '=', $kelurahan)
    ->where('sampah', '=', $sampah)   
    ->count();  
          }
    }

    private function viewcountparamspal ($table, $kecamatan, $kelurahan, $spal){

    if ($kelurahan == "0") 
          {     
            return DB::table($table)
    ->leftJoin('petugas_sikelings', $table.'.id_petugas', '=', 'petugas_sikelings.id_petugas')
    ->where('total_nilai', '!=', null) 
    ->where('kecamatan', '=', $kecamatan)
    ->where('spal', '=', $spal) 
    ->count();   
          }

    else {
            return DB::table($table)
    ->leftJoin('petugas_sikelings', $table.'.id_petugas', '=', 'petugas_sikelings.id_petugas')
    ->where('total_nilai', '!=', null) 
    ->where('kecamatan', '=', $kecamatan) 
    ->where('kelurahan', '=', $kelurahan)
    ->where('spal', '=', $spal)   
    ->count();  
          }
    }

    private function viewcountparampjb ($table, $kecamatan, $kelurahan, $pjb){

    if ($kelurahan == "0") 
          {     
            return DB::table($table)
    ->leftJoin('petugas_sikelings', $table.'.id_petugas', '=', 'petugas_sikelings.id_petugas')
    ->where('total_nilai', '!=', null) 
    ->where('kecamatan', '=', $kecamatan)
    ->where('pjb', '=', $pjb) 
    ->count();   
          }

    else {
            return DB::table($table)
    ->leftJoin('petugas_sikelings', $table.'.id_petugas', '=', 'petugas_sikelings.id_petugas')
    ->where('total_nilai', '!=', null) 
    ->where('kecamatan', '=', $kecamatan) 
    ->where('kelurahan', '=', $kelurahan)
    ->where('pjb', '=', $pjb)   
    ->count();  
          }
    }

    private function viewcountparam ($table, $kecamatan, $kelurahan, $status){

    if ($kelurahan == "0") 
          {     
            return DB::table($table)
    ->leftJoin('petugas_sikelings', $table.'.id_petugas', '=', 'petugas_sikelings.id_petugas')
    ->where('total_nilai', '!=', null) 
    ->where('kecamatan', '=', $kecamatan)
    ->where('status', '=', $status) 
    ->count();   
          }

    else {
            return DB::table($table)
    ->leftJoin('petugas_sikelings', $table.'.id_petugas', '=', 'petugas_sikelings.id_petugas')
    ->where('total_nilai', '!=', null) 
    ->where('kecamatan', '=', $kecamatan) 
    ->where('kelurahan', '=', $kelurahan)
    ->where('status', '=', $status)   
    ->count();  
          }
    }

    private function viewcountparamrw($table, $kecamatan, $kelurahan, $status, $rw){

    if ($kelurahan == "0") 
          {     
    return DB::table($table)
    ->leftJoin('petugas_sikelings', $table.'.id_petugas', '=', 'petugas_sikelings.id_petugas')
    ->where('total_nilai', '!=', null) 
    ->where('kecamatan', '=', $kecamatan)
    ->where('rw', '=', $rw)
    ->where('status', '=', $status) 
    ->count();   
          }

    else {
    return DB::table($table)
    ->leftJoin('petugas_sikelings', $table.'.id_petugas', '=', 'petugas_sikelings.id_petugas')
    ->where('total_nilai', '!=', null) 
    ->where('kecamatan', '=', $kecamatan) 
    ->where('kelurahan', '=', $kelurahan)
    ->where('rw', '=', $rw)
    ->where('status', '=', $status)   
    ->count();  
          }
    }

    private function viewcountparampjbrw($table, $kecamatan, $kelurahan, $pjb, $rw){

    if ($kelurahan == "0") 
          {     
            return DB::table($table)
    ->leftJoin('petugas_sikelings', $table.'.id_petugas', '=', 'petugas_sikelings.id_petugas')
    ->where('total_nilai', '!=', null) 
    ->where('kecamatan', '=', $kecamatan)
    ->where('rw', '=', $rw)
    ->where('pjb', '=', $pjb) 
    ->count();   
          }

    else {
            return DB::table($table)
    ->leftJoin('petugas_sikelings', $table.'.id_petugas', '=', 'petugas_sikelings.id_petugas')
    ->where('total_nilai', '!=', null) 
    ->where('kecamatan', '=', $kecamatan) 
    ->where('kelurahan', '=', $kelurahan)
    ->where('rw', '=', $rw)
    ->where('pjb', '=', $pjb)   
    ->count();  
          }
    }

    private function viewcountparamspalrw ($table, $kecamatan, $kelurahan, $spal, $rw){

    if ($kelurahan == "0") 
          {     
            return DB::table($table)
    ->leftJoin('petugas_sikelings', $table.'.id_petugas', '=', 'petugas_sikelings.id_petugas')
    ->where('total_nilai', '!=', null) 
    ->where('kecamatan', '=', $kecamatan)
    ->where('rw', '=', $rw)
    ->where('spal', '=', $spal) 
    ->count();   
          }

    else {
            return DB::table($table)
    ->leftJoin('petugas_sikelings', $table.'.id_petugas', '=', 'petugas_sikelings.id_petugas')
    ->where('total_nilai', '!=', null) 
    ->where('kecamatan', '=', $kecamatan) 
    ->where('kelurahan', '=', $kelurahan)
    ->where('rw', '=', $rw)
    ->where('spal', '=', $spal)   
    ->count();  
          }
    }

    private function viewcountparampkl ($table, $kecamatan, $kelurahan, $jenis){

    if ($kelurahan == "0") 
          {     
            return DB::table($table)
    ->leftJoin('petugas_sikelings', $table.'.id_petugas', '=', 'petugas_sikelings.id_petugas')
    //->where('total_nilai', '!=', null) 
    ->where('kecamatan', '=', $kecamatan)
    ->where('jenis', '=', $jenis) 
    ->count();   
          }

    else {
            return DB::table($table)
    ->leftJoin('petugas_sikelings', $table.'.id_petugas', '=', 'petugas_sikelings.id_petugas')
    //->where('total_nilai', '!=', null) 
    ->where('kecamatan', '=', $kecamatan) 
    ->where('kelurahan', '=', $kelurahan)
    ->where('jenis', '=', $jenis)   
    ->count();  
          }
    }

    private function viewcountparamjamban ($table, $kecamatan, $kelurahan, $jamban){

    if ($kelurahan == "0") 
          {     
            return DB::table($table)
    ->leftJoin('petugas_sikelings', $table.'.id_petugas', '=', 'petugas_sikelings.id_petugas')
    ->where('total_nilai', '!=', null) 
    ->where('kecamatan', '=', $kecamatan)
    ->where('jamban', '=', $jamban) 
    ->count();   
          }

    else {
            return DB::table($table)
    ->leftJoin('petugas_sikelings', $table.'.id_petugas', '=', 'petugas_sikelings.id_petugas')
    ->where('total_nilai', '!=', null) 
    ->where('kecamatan', '=', $kecamatan) 
    ->where('kelurahan', '=', $kelurahan)
    ->where('jamban', '=', $jamban)   
    ->count();  
          }
    }

// Filter JAMBAN
        private function viewcountparamjambanrw ($table, $kecamatan, $kelurahan, $jamban, $rw){

    if ($kelurahan == "0") 
          {     
            return DB::table($table)
    ->leftJoin('petugas_sikelings', $table.'.id_petugas', '=', 'petugas_sikelings.id_petugas')
    ->where('total_nilai', '!=', null) 
    ->where('kecamatan', '=', $kecamatan)
    ->where('rw', '=', $rw)
    ->where('jamban', '=', $jamban) 
    ->count();   
          }

    else {
            return DB::table($table)
    ->leftJoin('petugas_sikelings', $table.'.id_petugas', '=', 'petugas_sikelings.id_petugas')
    ->where('total_nilai', '!=', null) 
    ->where('kecamatan', '=', $kecamatan) 
    ->where('kelurahan', '=', $kelurahan)
    ->where('rw', '=', $rw)
    ->where('jamban', '=', $jamban)   
    ->count();  
          }
    }
// Filter SAMPAH
        private function viewcountparamsampahrw ($table, $kecamatan, $kelurahan, $sampah, $rw){

    if ($kelurahan == "0") 
          {     
            return DB::table($table)
    ->leftJoin('petugas_sikelings', $table.'.id_petugas', '=', 'petugas_sikelings.id_petugas')
    ->where('total_nilai', '!=', null) 
    ->where('kecamatan', '=', $kecamatan)
    ->where('rw', '=', $rw)
    ->where('sampah', '=', $sampah) 
    ->count();   
          }

    else {
            return DB::table($table)
    ->leftJoin('petugas_sikelings', $table.'.id_petugas', '=', 'petugas_sikelings.id_petugas')
    ->where('total_nilai', '!=', null) 
    ->where('kecamatan', '=', $kecamatan) 
    ->where('kelurahan', '=', $kelurahan)
    ->where('rw', '=', $rw)
    ->where('sampah', '=', $sampah)   
    ->count();  
          }
    }

    public function getDataCountDashboardByParameter($param_kecamatan, $param_kelurahan){
        $reward = DB::table('rumah_sehat')
                    ->selectRaw('COUNT(*) as total, ps.nama, ps.kecamatan, ps.kelurahan')
                    ->leftJoin('petugas_sikelings as ps', 'ps.id_petugas','=','rumah_sehat.id_petugas')
                    ->groupBy('ps.id_petugas')
                    ->orderBy('total','desc')
                    ->limit(5)
                    ->get();

    $getTotal_rs  = DB::table('rumah_sehat')
        ->where('total_nilai', '!=', null)
        ->count();

    $getTotal_pjb = DB::table('rumah_sehat')
        ->where('total_nilai', '!=', null)
        ->pluck('pjb')
        ->count();

    $getTotal_spal = DB::table('rumah_sehat')
        ->where('total_nilai', '!=', null)
        ->pluck('spal')
        ->count();

    $getTotal_tps = DB::table('rumah_sehat')
        ->where('total_nilai', '!=', null)
        ->pluck('sampah')
        ->count();

    $getTotal_jamban = DB::table('rumah_sehat')
        ->where('total_nilai', '!=', null)
        ->pluck('jamban')
        ->count();

    $getTotal_pkl = DB::table('pelayanan_keslings')
    //->where('total_nilai', '!=', null)
        ->count();


    $getTotal_kuliner = DB::table('kuliners')
        ->where('total_nilai', '!=', null)
        ->count();

    $getTotal_dam = DB::table('dam_sip_klings')
        ->where('total_nilai', '!=', null)
        ->count();

    $getTotal_jb = DB::table('jasa_bogas')
        ->where('total_nilai', '!=', null)
        ->count();

    $getTotal_masjid = DB::table('tempat_ibadahs')
        ->where('total_nilai', '!=', null)
        ->count();

    $getTotal_sekolah = DB::table('sekolahs')
        ->where('total_nilai', '!=', null)
        ->count();

    $getTotal_pesantren = DB::table('pesantrens')
        ->where('total_nilai', '!=', null)
        ->count();

    $getTotal_pusk = DB::table('puskesmass')
        ->where('total_nilai', '!=', null)
        ->count();

    $getTotal_hotel = DB::table('hotels')
        ->where('total_nilai', '!=', null)
        ->count();

    $getTotal_hotelm = DB::table('hotel_melatis')
        ->where('total_nilai', '!=', null)
        ->count();

    $getTotal_pasar = DB::table('pasars')
        ->where('total_nilai', '!=', null)
        ->count();

    $getTotal_kolam = DB::table('kolam_renangs')
        ->where('total_nilai', '!=', null)
        ->count();

    $getTotal_rss = DB::table('rss')
        ->where('total_nilai', '!=', null)
        ->count();

    $data_kecamatan = DB::table('petugas_sikelings')->select('kecamatan')->groupBy('kecamatan')->get();
    $data_kelurahan = DB::table('petugas_sikelings')->select('kelurahan')->where('kecamatan', $param_kecamatan)->groupBy('kelurahan')->get();
    // $param_kecamatan  = Input::get('kecamatan');
    // $param_kelurahan  = Input::get('kelurahan');

//RS RW ================================================================================================================================
    $sehattpilihrw1 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Sehat', 'RW 01');;
    $sehattpilihrw2 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Sehat', 'RW 02');;
    $sehattpilihrw3 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Sehat', 'RW 03');;
    $sehattpilihrw4 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Sehat', 'RW 04');;
    $sehattpilihrw5 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Sehat', 'RW 05');;
    $sehattpilihrw6 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Sehat', 'RW 06');; 
    $sehattpilihrw7 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Sehat', 'RW 07');;
    $sehattpilihrw8 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Sehat', 'RW 08');;
    $sehattpilihrw9 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Sehat', 'RW 09');;
    $sehattpilihrw10 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Sehat', 'RW 10');;
    $sehattpilihrw11 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Sehat', 'RW 11');;
    $sehattpilihrw12 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Sehat', 'RW 12');;
    $sehattpilihrw13 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Sehat', 'RW 13');;
    $sehattpilihrw14 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Sehat', 'RW 14');;
    $sehattpilihrw15 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Sehat', 'RW 15');;
    $sehattpilihrw16 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Sehat', 'RW 16');;
    $sehattpilihrw17 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Sehat', 'RW 17');;
    $sehattpilihrw18 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Sehat', 'RW 18');;  
    $sehattpilihrw19 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Sehat', 'RW 19');;
    $sehattpilihrw20 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Sehat', 'RW 20');;
    
$sehattpilih = $sehattpilihrw1 + $sehattpilihrw2 + $sehattpilihrw3 + $sehattpilihrw4 + $sehattpilihrw5 +
$sehattpilihrw6 + $sehattpilihrw7 + $sehattpilihrw8 + $sehattpilihrw9 + $sehattpilihrw10+
$sehattpilihrw11 + $sehattpilihrw12 + $sehattpilihrw13 + $sehattpilihrw14 + $sehattpilihrw15+
$sehattpilihrw16 + $sehattpilihrw17 + $sehattpilihrw18 + $sehattpilihrw19 + $sehattpilihrw20;




//RS RW ================================================================================================================================
    
    $rumahtsehatrw1 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Tidak Sehat', 'RW 01');;
    $rumahtsehatrw2 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Tidak Sehat', 'RW 02');;
    $rumahtsehatrw3 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Tidak Sehat', 'RW 03');;
    $rumahtsehatrw4 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Tidak Sehat', 'RW 04');;
    $rumahtsehatrw5 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Tidak Sehat', 'RW 05');;
    $rumahtsehatrw6 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Tidak Sehat', 'RW 06');; 
    $rumahtsehatrw7 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Tidak Sehat', 'RW 07');;
    $rumahtsehatrw8 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Tidak Sehat', 'RW 08');;
    $rumahtsehatrw9 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Tidak Sehat', 'RW 09');;
    $rumahtsehatrw10 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Tidak Sehat', 'RW 10');;
    $rumahtsehatrw11 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Tidak Sehat', 'RW 11');;
    $rumahtsehatrw12 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Tidak Sehat', 'RW 12');;
    $rumahtsehatrw13 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Tidak Sehat', 'RW 13');;
    $rumahtsehatrw14 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Tidak Sehat', 'RW 14');;
    $rumahtsehatrw15 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Tidak Sehat', 'RW 15');;
    $rumahtsehatrw16 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Tidak Sehat', 'RW 16');;
    $rumahtsehatrw17 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Tidak Sehat', 'RW 17');;
    $rumahtsehatrw18 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Tidak Sehat', 'RW 18');;  
    $rumahtsehatrw19 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Tidak Sehat', 'RW 19');;
    $rumahtsehatrw20 = $this->viewcountparamrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Tidak Sehat', 'RW 20');;
    
$rumahtsehat = $rumahtsehatrw1 + $rumahtsehatrw2 + $rumahtsehatrw3 + $rumahtsehatrw4 + $rumahtsehatrw5 +
$rumahtsehatrw6 + $rumahtsehatrw7 + $rumahtsehatrw8 + $rumahtsehatrw9 + $rumahtsehatrw10+
$rumahtsehatrw11 + $rumahtsehatrw12 + $rumahtsehatrw13 + $rumahtsehatrw14 + $rumahtsehatrw15+
$rumahtsehatrw16 + $rumahtsehatrw17 + $rumahtsehatrw18 + $rumahtsehatrw19 + $rumahtsehatrw20;



//RS RW ================================================================================================================================
    
    $spaltbrw1 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Terbuka', 'RW 01');;
    $spaltbrw2 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Terbuka', 'RW 02');;
    $spaltbrw3 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Terbuka', 'RW 03');;
    $spaltbrw4 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Terbuka', 'RW 04');;
    $spaltbrw5 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Terbuka', 'RW 05');;
    $spaltbrw6 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Terbuka', 'RW 06');; 
    $spaltbrw7 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Terbuka', 'RW 07');;
    $spaltbrw8 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Terbuka', 'RW 08');;
    $spaltbrw9 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Terbuka', 'RW 09');;
    $spaltbrw10 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Terbuka', 'RW 10');;
    $spaltbrw11 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Terbuka', 'RW 11');;
    $spaltbrw12 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Terbuka', 'RW 12');;
    $spaltbrw13 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Terbuka', 'RW 13');;
    $spaltbrw14 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Terbuka', 'RW 14');;
    $spaltbrw15 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Terbuka', 'RW 15');;
    $spaltbrw16 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Terbuka', 'RW 16');;
    $spaltbrw17 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Terbuka', 'RW 17');;
    $spaltbrw18 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Terbuka', 'RW 18');;  
    $spaltbrw19 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Terbuka', 'RW 19');;
    $spaltbrw20 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Terbuka', 'RW 20');;
    
$spaltb = $spaltbrw1 + $spaltbrw2 + $spaltbrw3 + $spaltbrw4 + $spaltbrw5 +
$spaltbrw6 + $spaltbrw7 + $spaltbrw8 + $spaltbrw9 + $spaltbrw10+
$spaltbrw11 + $spaltbrw12 + $spaltbrw13 + $spaltbrw14 + $spaltbrw15+
$spaltbrw16 + $spaltbrw17 + $spaltbrw18 + $spaltbrw19 + $spaltbrw20;




//RS RW ================================================================================================================================
    
    $spaltprw1 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tertutup', 'RW 01');;
    $spaltprw2 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tertutup', 'RW 02');;
    $spaltprw3 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tertutup', 'RW 03');;
    $spaltprw4 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tertutup', 'RW 04');;
    $spaltprw5 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tertutup', 'RW 05');;
    $spaltprw6 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tertutup', 'RW 06');; 
    $spaltprw7 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tertutup', 'RW 07');;
    $spaltprw8 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tertutup', 'RW 08');;
    $spaltprw9 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tertutup', 'RW 09');;
    $spaltprw10 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tertutup', 'RW 10');;
    $spaltprw11 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tertutup', 'RW 11');;
    $spaltprw12 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tertutup', 'RW 12');;
    $spaltprw13 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tertutup', 'RW 13');;
    $spaltprw14 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tertutup', 'RW 14');;
    $spaltprw15 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tertutup', 'RW 15');;
    $spaltprw16 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tertutup', 'RW 16');;
    $spaltprw17 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tertutup', 'RW 17');;
    $spaltprw18 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tertutup', 'RW 18');;  
    $spaltprw19 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tertutup', 'RW 19');;
    $spaltprw20 = $this->viewcountparamspalrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tertutup', 'RW 20');;
    
$spaltp = $spaltprw1 + $spaltprw2 + $spaltprw3 + $spaltprw4 + $spaltprw5 +
$spaltprw6 + $spaltprw7 + $spaltprw8 + $spaltprw9 + $spaltprw10+
$spaltprw11 + $spaltprw12 + $spaltprw13 + $spaltprw14 + $spaltprw15+
$spaltprw16 + $spaltprw17 + $spaltprw18 + $spaltprw19 + $spaltprw20;




//RS RW ================================================================================================================================
    
    $sampahpilihrw1 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Dipilah / Organik', 'RW 01');;
    $sampahpilihrw2 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Dipilah / Organik', 'RW 02');;
    $sampahpilihrw3 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Dipilah / Organik', 'RW 03');;
    $sampahpilihrw4 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Dipilah / Organik', 'RW 04');;
    $sampahpilihrw5 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Dipilah / Organik', 'RW 05');;
    $sampahpilihrw6 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Dipilah / Organik', 'RW 06');; 
    $sampahpilihrw7 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Dipilah / Organik', 'RW 07');;
    $sampahpilihrw8 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Dipilah / Organik', 'RW 08');;
    $sampahpilihrw9 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Dipilah / Organik', 'RW 09');;
    $sampahpilihrw10 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Dipilah / Organik', 'RW 10');;
    $sampahpilihrw11 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Dipilah / Organik', 'RW 11');;
    $sampahpilihrw12 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Dipilah / Organik', 'RW 12');;
    $sampahpilihrw13 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Dipilah / Organik', 'RW 13');;
    $sampahpilihrw14 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Dipilah / Organik', 'RW 14');;
    $sampahpilihrw15 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Dipilah / Organik', 'RW 15');;
    $sampahpilihrw16 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Dipilah / Organik', 'RW 16');;
    $sampahpilihrw17 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Dipilah / Organik', 'RW 17');;
    $sampahpilihrw18 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Dipilah / Organik', 'RW 18');;  
    $sampahpilihrw19 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Dipilah / Organik', 'RW 19');;
    $sampahpilihrw20 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Dipilah / Organik', 'RW 20');;
    
$sampahpilih = $sampahpilihrw1 + $sampahpilihrw2 + $sampahpilihrw3 + $sampahpilihrw4 + $sampahpilihrw5 +
$sampahpilihrw6 + $sampahpilihrw7 + $sampahpilihrw8 + $sampahpilihrw9 + $sampahpilihrw10+
$sampahpilihrw11 + $sampahpilihrw12 + $sampahpilihrw13 + $sampahpilihrw14 + $sampahpilihrw15+
$sampahpilihrw16 + $sampahpilihrw17 + $sampahpilihrw18 + $sampahpilihrw19 + $sampahpilihrw20;




//RS RW ================================================================================================================================
    
    $sampahtpilihrw1 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tidak Dipilah / Dibuang', 'RW 01');;
    $sampahtpilihrw2 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tidak Dipilah / Dibuang', 'RW 02');;
    $sampahtpilihrw3 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tidak Dipilah / Dibuang', 'RW 03');;
    $sampahtpilihrw4 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tidak Dipilah / Dibuang', 'RW 04');;
    $sampahtpilihrw5 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tidak Dipilah / Dibuang', 'RW 05');;
    $sampahtpilihrw6 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tidak Dipilah / Dibuang', 'RW 06');; 
    $sampahtpilihrw7 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tidak Dipilah / Dibuang', 'RW 07');;
    $sampahtpilihrw8 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tidak Dipilah / Dibuang', 'RW 08');;
    $sampahtpilihrw9 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tidak Dipilah / Dibuang', 'RW 09');;
    $sampahtpilihrw10 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tidak Dipilah / Dibuang', 'RW 10');;
    $sampahtpilihrw11 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tidak Dipilah / Dibuang', 'RW 11');;
    $sampahtpilihrw12 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tidak Dipilah / Dibuang', 'RW 12');;
    $sampahtpilihrw13 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tidak Dipilah / Dibuang', 'RW 13');;
    $sampahtpilihrw14 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tidak Dipilah / Dibuang', 'RW 14');;
    $sampahtpilihrw15 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tidak Dipilah / Dibuang', 'RW 15');;
    $sampahtpilihrw16 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tidak Dipilah / Dibuang', 'RW 16');;
    $sampahtpilihrw17 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tidak Dipilah / Dibuang', 'RW 17');;
    $sampahtpilihrw18 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tidak Dipilah / Dibuang', 'RW 18');;  
    $sampahtpilihrw19 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tidak Dipilah / Dibuang', 'RW 19');;
    $sampahtpilihrw20 = $this->viewcountparamsampahrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tidak Dipilah / Dibuang', 'RW 20');;
    
$sampahtpilih = $sampahtpilihrw1 + $sampahtpilihrw2 + $sampahtpilihrw3 + $sampahtpilihrw4 + $sampahtpilihrw5 +
$sampahtpilihrw6 + $sampahtpilihrw7 + $sampahtpilihrw8 + $sampahtpilihrw9 + $sampahtpilihrw10+
$sampahtpilihrw11 + $sampahtpilihrw12 + $sampahtpilihrw13 + $sampahtpilihrw14 + $sampahtpilihrw15+
$sampahtpilihrw16 + $sampahtpilihrw17 + $sampahtpilihrw18 + $sampahtpilihrw19 + $sampahtpilihrw20;





//RS RW ================================================================================================================================
    
    $pjbyarw1 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'YA', 'RW 01');;
    $pjbyarw2 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'YA', 'RW 02');;
    $pjbyarw3 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'YA', 'RW 03');;
    $pjbyarw4 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'YA', 'RW 04');;
    $pjbyarw5 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'YA', 'RW 05');;
    $pjbyarw6 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'YA', 'RW 06');; 
    $pjbyarw7 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'YA', 'RW 07');;
    $pjbyarw8 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'YA', 'RW 08');;
    $pjbyarw9 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'YA', 'RW 09');;
    $pjbyarw10 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'YA', 'RW 10');;
    $pjbyarw11 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'YA', 'RW 11');;
    $pjbyarw12 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'YA', 'RW 12');;
    $pjbyarw13 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'YA', 'RW 13');;
    $pjbyarw14 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'YA', 'RW 14');;
    $pjbyarw15 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'YA', 'RW 15');;
    $pjbyarw16 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'YA', 'RW 16');;
    $pjbyarw17 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'YA', 'RW 17');;
    $pjbyarw18 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'YA', 'RW 18');;  
    $pjbyarw19 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'YA', 'RW 19');;
    $pjbyarw20 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'YA', 'RW 20');;
    
$pjbya = $pjbyarw1 + $pjbyarw2 + $pjbyarw3 + $pjbyarw4 + $pjbyarw5 +
$pjbyarw6 + $pjbyarw7 + $pjbyarw8 + $pjbyarw9 + $pjbyarw10+
$pjbyarw11 + $pjbyarw12 + $pjbyarw13 + $pjbyarw14 + $pjbyarw15+
$pjbyarw16 + $pjbyarw17 + $pjbyarw18 + $pjbyarw19 + $pjbyarw20;





//RS RW ================================================================================================================================
    
    $pjbtarw1 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'TIDAK', 'RW 01');;
    $pjbtarw2 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'TIDAK', 'RW 02');;
    $pjbtarw3 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'TIDAK', 'RW 03');;
    $pjbtarw4 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'TIDAK', 'RW 04');;
    $pjbtarw5 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'TIDAK', 'RW 05');;
    $pjbtarw6 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'TIDAK', 'RW 06');; 
    $pjbtarw7 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'TIDAK', 'RW 07');;
    $pjbtarw8 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'TIDAK', 'RW 08');;
    $pjbtarw9 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'TIDAK', 'RW 09');;
    $pjbtarw10 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'TIDAK', 'RW 10');;
    $pjbtarw11 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'TIDAK', 'RW 11');;
    $pjbtarw12 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'TIDAK', 'RW 12');;
    $pjbtarw13 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'TIDAK', 'RW 13');;
    $pjbtarw14 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'TIDAK', 'RW 14');;
    $pjbtarw15 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'TIDAK', 'RW 15');;
    $pjbtarw16 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'TIDAK', 'RW 16');;
    $pjbtarw17 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'TIDAK', 'RW 17');;
    $pjbtarw18 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'TIDAK', 'RW 18');;  
    $pjbtarw19 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'TIDAK', 'RW 19');;
    $pjbtarw20 = $this->viewcountparampjbrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'TIDAK', 'RW 20');;
    
$pjbta = $pjbtarw1 + $pjbtarw2 + $pjbtarw3 + $pjbtarw4 + $pjbtarw5 +
$pjbtarw6 + $pjbtarw7 + $pjbtarw8 + $pjbtarw9 + $pjbtarw10+
$pjbtarw11 + $pjbtarw12 + $pjbtarw13 + $pjbtarw14 + $pjbtarw15+
$pjbtarw16 + $pjbtarw17 + $pjbtarw18 + $pjbtarw19 + $pjbtarw20;





//RS RW ================================================================================================================================
    
    $koyarw1 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Koya / Empang', 'RW 01');;
    $koyarw2 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Koya / Empang', 'RW 02');;
    $koyarw3 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Koya / Empang', 'RW 03');;
    $koyarw4 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Koya / Empang', 'RW 04');;
    $koyarw5 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Koya / Empang', 'RW 05');;
    $koyarw6 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Koya / Empang', 'RW 06');; 
    $koyarw7 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Koya / Empang', 'RW 07');;
    $koyarw8 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Koya / Empang', 'RW 08');;
    $koyarw9 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Koya / Empang', 'RW 09');;
    $koyarw10 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Koya / Empang', 'RW 10');;
    $koyarw11 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Koya / Empang', 'RW 11');;
    $koyarw12 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Koya / Empang', 'RW 12');;
    $koyarw13 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Koya / Empang', 'RW 13');;
    $koyarw14 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Koya / Empang', 'RW 14');;
    $koyarw15 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Koya / Empang', 'RW 15');;
    $koyarw16 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Koya / Empang', 'RW 16');;
    $koyarw17 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Koya / Empang', 'RW 17');;
    $koyarw18 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Koya / Empang', 'RW 18');;  
    $koyarw19 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Koya / Empang', 'RW 19');;
    $koyarw20 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Koya / Empang', 'RW 20');;
    
$koya = $koyarw1 + $koyarw2 + $koyarw3 + $koyarw4 + $koyarw5 +
$koyarw6 + $koyarw7 + $koyarw8 + $koyarw9 + $koyarw10+
$koyarw11 + $koyarw12 + $koyarw13 + $koyarw14 + $koyarw15+
$koyarw16 + $koyarw17 + $koyarw18 + $koyarw19 + $koyarw20;





//RS RW ================================================================================================================================
    
    $kalirw1 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Kali', 'RW 01');;
    $kalirw2 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Kali', 'RW 02');;
    $kalirw3 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Kali', 'RW 03');;
    $kalirw4 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Kali', 'RW 04');;
    $kalirw5 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Kali', 'RW 05');;
    $kalirw6 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Kali', 'RW 06');; 
    $kalirw7 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Kali', 'RW 07');;
    $kalirw8 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Kali', 'RW 08');;
    $kalirw9 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Kali', 'RW 09');;
    $kalirw10 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Kali', 'RW 10');;
    $kalirw11 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Kali', 'RW 11');;
    $kalirw12 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Kali', 'RW 12');;
    $kalirw13 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Kali', 'RW 13');;
    $kalirw14 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Kali', 'RW 14');;
    $kalirw15 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Kali', 'RW 15');;
    $kalirw16 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Kali', 'RW 16');;
    $kalirw17 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Kali', 'RW 17');;
    $kalirw18 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Kali', 'RW 18');;  
    $kalirw19 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Kali', 'RW 19');;
    $kalirw20 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Kali', 'RW 20');;
    
$kali = $kalirw1 + $kalirw2 + $kalirw3 + $kalirw4 + $kalirw5 +
$kalirw6 + $kalirw7 + $kalirw8 + $kalirw9 + $kalirw10+
$kalirw11 + $kalirw12 + $kalirw13 + $kalirw14 + $kalirw15+
$kalirw16 + $kalirw17 + $kalirw18 + $kalirw19 + $kalirw20;





//RS RW ================================================================================================================================
    
    $helikopterrw1 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Helikopter', 'RW 01');;
    $helikopterrw2 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Helikopter', 'RW 02');;
    $helikopterrw3 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Helikopter', 'RW 03');;
    $helikopterrw4 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Helikopter', 'RW 04');;
    $helikopterrw5 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Helikopter', 'RW 05');;
    $helikopterrw6 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Helikopter', 'RW 06');; 
    $helikopterrw7 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Helikopter', 'RW 07');;
    $helikopterrw8 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Helikopter', 'RW 08');;
    $helikopterrw9 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Helikopter', 'RW 09');;
    $helikopterrw10 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Helikopter', 'RW 10');;
    $helikopterrw11 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Helikopter', 'RW 11');;
    $helikopterrw12 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Helikopter', 'RW 12');;
    $helikopterrw13 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Helikopter', 'RW 13');;
    $helikopterrw14 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Helikopter', 'RW 14');;
    $helikopterrw15 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Helikopter', 'RW 15');;
    $helikopterrw16 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Helikopter', 'RW 16');;
    $helikopterrw17 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Helikopter', 'RW 17');;
    $helikopterrw18 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Helikopter', 'RW 18');;  
    $helikopterrw19 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Helikopter', 'RW 19');;
    $helikopterrw20 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Helikopter', 'RW 20');;
    
$helikopter = $helikopterrw1 + $helikopterrw2 + $helikopterrw3 + $helikopterrw4 + $helikopterrw5 +
$helikopterrw6 + $helikopterrw7 + $helikopterrw8 + $helikopterrw9 + $helikopterrw10+
$helikopterrw11 + $helikopterrw12 + $helikopterrw13 + $helikopterrw14 + $helikopterrw15+
$helikopterrw16 + $helikopterrw17 + $helikopterrw18 + $helikopterrw19 + $helikopterrw20;





//RS RW ================================================================================================================================
    
    $septikrw1 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Septik Tank', 'RW 01');;
    $septikrw2 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Septik Tank', 'RW 02');;
    $septikrw3 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Septik Tank', 'RW 03');;
    $septikrw4 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Septik Tank', 'RW 04');;
    $septikrw5 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Septik Tank', 'RW 05');;
    $septikrw6 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Septik Tank', 'RW 06');; 
    $septikrw7 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Septik Tank', 'RW 07');;
    $septikrw8 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Septik Tank', 'RW 08');;
    $septikrw9 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Septik Tank', 'RW 09');;
    $septikrw10 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Septik Tank', 'RW 10');;
    $septikrw11 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Septik Tank', 'RW 11');;
    $septikrw12 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Septik Tank', 'RW 12');;
    $septikrw13 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Septik Tank', 'RW 13');;
    $septikrw14 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Septik Tank', 'RW 14');;
    $septikrw15 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Septik Tank', 'RW 15');;
    $septikrw16 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Septik Tank', 'RW 16');;
    $septikrw17 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Septik Tank', 'RW 17');;
    $septikrw18 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Septik Tank', 'RW 18');;  
    $septikrw19 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Septik Tank', 'RW 19');;
    $septikrw20 = $this->viewcountparamjambanrw('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Septik Tank', 'RW 20');;
    
$septik = $septikrw1 + $septikrw2 + $septikrw3 + $septikrw4 + $septikrw5 +
$septikrw6 + $septikrw7 + $septikrw8 + $septikrw9 + $septikrw10+
$septikrw11 + $septikrw12 + $septikrw13 + $septikrw14 + $septikrw15+
$septikrw16 + $septikrw17 + $septikrw18 + $septikrw19 + $septikrw20;









// rumah sehat
    $jumlah_rssehat = $this->viewcountparam('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Sehat');;
    $jumlah_rstidaksehat = $this->viewcountparam('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Rumah Tidak Sehat');;
    $jumlah_rs = $jumlah_rssehat + $jumlah_rstidaksehat;

    // asd
    $jumlah_rssehat_kec = $this->viewcountparam('rumah_sehat', Input::get('kecamatan'), 0, 'Rumah Sehat');;
    $jumlah_rstidaksehat_kec = $this->viewcountparam('rumah_sehat', Input::get('kecamatan'), 0, 'Rumah Tidak Sehat');;
    $jumlah_rs_kec = $jumlah_rssehat_kec + $jumlah_rstidaksehat_kec;



// PJB
    $jumlah_adapjb = $this->viewcountparampjb('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'YA');;
    $jumlah_tidakpjb = $this->viewcountparampjb('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'TIDAK');;
    $jumlah_pjb = $jumlah_adapjb + $jumlah_tidakpjb;

    // kec
    $jumlah_adapjb_kec = $this->viewcountparampjb('rumah_sehat', Input::get('kecamatan'), 0, 'YA');;
    $jumlah_tidakpjb_kec = $this->viewcountparampjb('rumah_sehat', Input::get('kecamatan'), 0, 'TIDAK');;
    $jumlah_pjb_kec = $jumlah_adapjb_kec + $jumlah_tidakpjb_kec;



//spal
    $jumlah_spalterbuka = $this->viewcountparamspal('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Terbuka');;
    $jumlah_spaltertutup = $this->viewcountparamspal('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'), 'Tertutup');;
    $jumlah_spal = $jumlah_spalterbuka + $jumlah_spaltertutup;

    // kec
    $jumlah_spalterbuka_kec = $this->viewcountparamspal('rumah_sehat', Input::get('kecamatan'), 0, 'Terbuka');;
    $jumlah_spaltertutup_kec = $this->viewcountparamspal('rumah_sehat', Input::get('kecamatan'), 0, 'Tertutup');;
    $jumlah_spal_kec = $jumlah_spalterbuka_kec + $jumlah_spaltertutup_kec;


//TPS
    $jumlah_tpsorganik = $this->viewcountparamsampah('rumah_sehat', 
        Input::get('kecamatan'), Input::get('kelurahan'), 'Dipilah / Organik');;

    $jumlah_tpsdibuang = $this->viewcountparamsampah('rumah_sehat', 
        Input::get('kecamatan'), Input::get('kelurahan'), 'Tidak Dipilah / Dibuang');;
    $jumlah_tps = $jumlah_tpsorganik + $jumlah_tpsdibuang;

    // kec
    $jumlah_tpsorganik_kec = $this->viewcountparamsampah('rumah_sehat', 
        Input::get('kecamatan'), 0, 'Dipilah / Organik');;

    $jumlah_tpsdibuang_kec = $this->viewcountparamsampah('rumah_sehat', 
        Input::get('kecamatan'), 0, 'Tidak Dipilah / Dibuang');;
    $jumlah_tps_kec = $jumlah_tpsorganik_kec + $jumlah_tpsdibuang_kec;



//TPS
    $jumlah_koya = $this->viewcountparamjamban('rumah_sehat', 
        Input::get('kecamatan'), Input::get('kelurahan'), 'Koya / Empang');;

    $jumlah_kali = $this->viewcountparamjamban('rumah_sehat', 
        Input::get('kecamatan'), Input::get('kelurahan'), 'Kali');;

    $jumlah_helikopter = $this->viewcountparamjamban('rumah_sehat', 
        Input::get('kecamatan'), Input::get('kelurahan'), 'Helikopter');;

    $jumlah_septik = $this->viewcountparamjamban('rumah_sehat', 
        Input::get('kecamatan'), Input::get('kelurahan'), 'Septik Tank');;

    $jumlah_jamban = $jumlah_koya + $jumlah_kali + $jumlah_helikopter + $jumlah_septik;

    // kec
    $jumlah_koya_kec = $this->viewcountparamjamban('rumah_sehat', 
        Input::get('kecamatan'), 0, 'Koya / Empang');;

    $jumlah_kali_kec = $this->viewcountparamjamban('rumah_sehat', 
        Input::get('kecamatan'), 0, 'Kali');;

    $jumlah_helikopter_kec = $this->viewcountparamjamban('rumah_sehat', 
        Input::get('kecamatan'), 0, 'Helikopter');;

    $jumlah_septik_kec = $this->viewcountparamjamban('rumah_sehat', 
        Input::get('kecamatan'), 0, 'Septik Tank');;

    $jumlah_jamban_kec = $jumlah_koya_kec + $jumlah_kali_kec + $jumlah_helikopter_kec + $jumlah_septik_kec;

//PKL

    $jumlah_pkldalam = $this->viewcountparampkl('pelayanan_keslings', 
        Input::get('kecamatan'), Input::get('kelurahan'), 'Dalam Gedung');;

    $jumlah_pklluar = $this->viewcountparampkl('pelayanan_keslings', 
        Input::get('kecamatan'), Input::get('kelurahan'), 'Luar Gedung');;

    $jumlah_pkl = $jumlah_pkldalam + $jumlah_pklluar;

    //kec
    $jumlah_pkldalam_kec = $this->viewcountparampkl('pelayanan_keslings', 
        Input::get('kecamatan'), 0, 'Dalam Gedung');;

    $jumlah_pklluar_kec = $this->viewcountparampkl('pelayanan_keslings', 
        Input::get('kecamatan'), 0, 'Luar Gedung');;

    $jumlah_pkl_kec = $jumlah_pkldalam_kec + $jumlah_pklluar_kec;
   

//KULINER/TMR
    $jumlah_kullayak = $this->viewcountparam('kuliners', 
        Input::get('kecamatan'), Input::get('kelurahan'), 'Laik Hygiene Sanitasi');;
    $jumlah_kultlayak = $this->viewcountparam('kuliners', Input::get('kecamatan'), Input::get('kelurahan'), 'Tidak Laik Hygiene Sanitasi');;
    $jumlah_kuliner = $jumlah_kullayak + $jumlah_kultlayak;

    // kec
    $jumlah_kullayak_kec = $this->viewcountparam('kuliners', 
        Input::get('kecamatan'), 0, 'Laik Hygiene Sanitasi');;
    $jumlah_kultlayak_kec = $this->viewcountparam('kuliners', Input::get('kecamatan'), 0, 'Tidak Laik Hygiene Sanitasi');;
    $jumlah_kuliner_kec = $jumlah_kullayak_kec + $jumlah_kultlayak_kec;


//DAM
    $jumlah_damlayak = $this->viewcountparam('dam_sip_klings', Input::get('kecamatan'), Input::get('kelurahan'), 'Memenuhi Persyaratan');;
    $jumlah_damtlayak = $this->viewcountparam('dam_sip_klings', Input::get('kecamatan'), Input::get('kelurahan'), 'Tidak Memenuhi Persyaratan');;
    $jumlah_dam = $jumlah_damlayak + $jumlah_damtlayak;

    // kec
    $jumlah_damlayak_kec = $this->viewcountparam('dam_sip_klings', Input::get('kecamatan'), 0, 'Memenuhi Persyaratan');;
    $jumlah_damtlayak_kec = $this->viewcountparam('dam_sip_klings', Input::get('kecamatan'), 0, 'Tidak Memenuhi Persyaratan');;
    $jumlah_dam_kec = $jumlah_damlayak_kec + $jumlah_damtlayak_kec;


//JASA BOGA
    $jumlah_jblayak = $this->viewcountparam('jasa_bogas', 
        Input::get('kecamatan'), Input::get('kelurahan'), 'Sehat');;
    $jumlah_jbtlayak = $this->viewcountparam('jasa_bogas', 
        Input::get('kecamatan'), Input::get('kelurahan'), 'Tidak Sehat');;
    $jumlah_jb = $jumlah_jblayak + $jumlah_jbtlayak;

    // kec
    $jumlah_jblayak_kec = $this->viewcountparam('jasa_bogas', 
        Input::get('kecamatan'), 0, 'Sehat');;
    $jumlah_jbtlayak_kec = $this->viewcountparam('jasa_bogas', 
        Input::get('kecamatan'), 0, 'Tidak Sehat');;
    $jumlah_jb_kec = $jumlah_jblayak_kec + $jumlah_jbtlayak_kec;


//MASJID 
    $jumlah_masjidlayak = $this->viewcountparam('tempat_ibadahs', 
        Input::get('kecamatan'), Input::get('kelurahan'), 'Laik Hygiene Sanitasi');;

    $jumlah_masjidtlayak = $this->viewcountparam('tempat_ibadahs', 
        Input::get('kecamatan'), Input::get('kelurahan'), 'Tidak Laik Hygiene Sanitasi');;
   $jumlah_masjid = $jumlah_masjidlayak + $jumlah_masjidtlayak;

   // kec
   $jumlah_masjidlayak_kec = $this->viewcountparam('tempat_ibadahs', 
        Input::get('kecamatan'), 0, 'Laik Hygiene Sanitasi');;

    $jumlah_masjidtlayak_kec = $this->viewcountparam('tempat_ibadahs', 
        Input::get('kecamatan'), 0, 'Tidak Laik Hygiene Sanitasi');;
   $jumlah_masjid_kec = $jumlah_masjidlayak_kec + $jumlah_masjidtlayak_kec;


//SEKOLAH
    $jumlah_sekolahlayak = $this->viewcountparam('sekolahs', 
        Input::get('kecamatan'), Input::get('kelurahan'), 'Sehat');;
    $jumlah_sekolahtlayak = $this->viewcountparam('sekolahs', 
        Input::get('kecamatan'), Input::get('kelurahan'), 'Tidak Sehat');;
    $jumlah_sekolah = $jumlah_sekolahlayak + $jumlah_sekolahtlayak;

    //kec
    $jumlah_sekolahlayak_kec = $this->viewcountparam('sekolahs', 
        Input::get('kecamatan'), 0, 'Sehat');;
    $jumlah_sekolahtlayak_kec = $this->viewcountparam('sekolahs', 
        Input::get('kecamatan'), 0, 'Tidak Sehat');;
    $jumlah_sekolah_kec = $jumlah_sekolahlayak_kec + $jumlah_sekolahtlayak_kec;

//PESANTREN
    $jumlah_pesantrenlayak = $this->viewcountparam('pesantrens', 
        Input::get('kecamatan'), Input::get('kelurahan'), 'Sehat');;
    $jumlah_pesantrentlayak = $this->viewcountparam('pesantrens', 
        Input::get('kecamatan'), Input::get('kelurahan'), 'Tidak Sehat');;
    $jumlah_pesantren = $jumlah_pesantrenlayak + $jumlah_pesantrentlayak;

    //kec
    $jumlah_pesantrenlayak_kec = $this->viewcountparam('pesantrens', 
        Input::get('kecamatan'), 0, 'Sehat');;
    $jumlah_pesantrentlayak_kec = $this->viewcountparam('pesantrens', 
        Input::get('kecamatan'), 0, 'Tidak Sehat');;
    $jumlah_pesantren_kec = $jumlah_pesantrenlayak + $jumlah_pesantrentlayak;


//PUSKESMAS  
    $jumlah_pusklayak = $this->viewcountparam('puskesmass', 
        Input::get('kecamatan'), Input::get('kelurahan'), 'Sehat');;
    $jumlah_pusktlayak = $this->viewcountparam('puskesmass', 
        Input::get('kecamatan'), Input::get('kelurahan'), 'Tidak Sehat');;
    $jumlah_pusk = $jumlah_pusklayak + $jumlah_pusktlayak;

    //kec
    $jumlah_pusklayak_kec = $this->viewcountparam('puskesmass', 
        Input::get('kecamatan'), 0, 'Sehat');;
    $jumlah_pusktlayak_kec = $this->viewcountparam('puskesmass', 
        Input::get('kecamatan'), 0, 'Tidak Sehat');;
    $jumlah_pusk_kec = $jumlah_pusklayak_kec + $jumlah_pusktlayak_kec;

//HOTEL
    $jumlah_hotellayak = $this->viewcountparam('hotels', 
        Input::get('kecamatan'), Input::get('kelurahan'), 'Sehat');;
    $jumlah_hoteltlayak = $this->viewcountparam('hotels', 
        Input::get('kecamatan'), Input::get('kelurahan'), 'Tidak Sehat');;
    $jumlah_hotel = $jumlah_hotellayak + $jumlah_hoteltlayak;

    // kec
    $jumlah_hotellayak_kec = $this->viewcountparam('hotels', 
        Input::get('kecamatan'), 0, 'Sehat');;
    $jumlah_hoteltlayak_kec = $this->viewcountparam('hotels', 
        Input::get('kecamatan'), 0, 'Tidak Sehat');;
    $jumlah_hotel_kec = $jumlah_hotellayak_kec + $jumlah_hoteltlayak_kec;


//HOTEL MELATI
    $jumlah_hotelmlayak = $this->viewcountparam('hotel_melatis', 
        Input::get('kecamatan'), Input::get('kelurahan'), 'Sehat');;
    $jumlah_hotelmtlayak = $this->viewcountparam('hotel_melatis', 
        Input::get('kecamatan'), Input::get('kelurahan'), 'Tidak Sehat');;
    $jumlah_hotelm = $jumlah_hotellayak + $jumlah_hoteltlayak;

    //kec
    $jumlah_hotelmlayak_kec = $this->viewcountparam('hotel_melatis', 
        Input::get('kecamatan'), 0, 'Sehat');;
    $jumlah_hotelmtlayak_kec = $this->viewcountparam('hotel_melatis', 
        Input::get('kecamatan'), 0, 'Tidak Sehat');;
    $jumlah_hotelm_kec = $jumlah_hotellayak_kec + $jumlah_hoteltlayak_kec;

    //PASAR
    $jumlah_pasarlayak = $this->viewcountparam('pasars', 
        Input::get('kecamatan'), Input::get('kelurahan'), 'Sehat');;
    $jumlah_pasartlayak = $this->viewcountparam('pasars', 
        Input::get('kecamatan'), Input::get('kelurahan'), 'Tidak Sehat');;
    $jumlah_pasar = $jumlah_pasarlayak + $jumlah_pasartlayak;

    // kec
    $jumlah_pasarlayak_kec = $this->viewcountparam('pasars', 
        Input::get('kecamatan'), 0, 'Sehat');;
    $jumlah_pasartlayak_kec = $this->viewcountparam('pasars', 
        Input::get('kecamatan'), 0, 'Tidak Sehat');;
    $jumlah_pasar_kec = $jumlah_pasarlayak_kec + $jumlah_pasartlayak_kec;

    //KOLAM
    $jumlah_kolamlayak = $this->viewcountparam('kolam_renangs', 
        Input::get('kecamatan'), Input::get('kelurahan'), 'Sehat');;
    $jumlah_kolamtlayak = $this->viewcountparam('kolam_renangs', 
        Input::get('kecamatan'), Input::get('kelurahan'), 'Tidak Sehat');;
    $jumlah_kolam = $jumlah_kolamlayak + $jumlah_kolamtlayak;

    // kec
    $jumlah_kolamlayak_kec = $this->viewcountparam('kolam_renangs', 
        Input::get('kecamatan'), 0, 'Sehat');;
    $jumlah_kolamtlayak_kec = $this->viewcountparam('kolam_renangs', 
        Input::get('kecamatan'), 0, 'Tidak Sehat');;
    $jumlah_kolam_kec = $jumlah_kolamlayak_kec + $jumlah_kolamtlayak_kec;


    //THE REAL RS
    $jumlah_rslayak = $this->viewcountparam('rss', 
        Input::get('kecamatan'), Input::get('kelurahan'), 'Sehat');;
    $jumlah_rstlayak = $this->viewcountparam('rss', 
        Input::get('kecamatan'), Input::get('kelurahan'), 'Tidak Sehat');;
    $jumlah_rss = $jumlah_rslayak + $jumlah_rstlayak;

    // kec
    $jumlah_rslayak_kec = $this->viewcountparam('rss', 
        Input::get('kecamatan'), 0, 'Sehat');;
    $jumlah_rstlayak_kec = $this->viewcountparam('rss', 
        Input::get('kecamatan'), 0, 'Tidak Sehat');;
    $jumlah_rss_kec = $jumlah_rslayak_kec + $jumlah_rstlayak_kec;

    $getHistoryData = DB::table('historys')
                       ->leftJoin('petugas_sikelings as p', 'p.id_petugas', '=', 'historys.id_petugas')
                       ->limit(10)
                       ->get();

// return
 return view('sipp-kling-pages/filter-pages/dashboard', compact(
    'jumlah_rs', 'jumlah_rssehat', 'jumlah_rstidaksehat',
    'jumlah_rs_kec', 'jumlah_rssehat_kec', 'jumlah_rstidaksehat_kec',

      'jumlah_pjb','jumlah_adapjb','jumlah_tidakpjb',
      'jumlah_pjb_kec','jumlah_adapjb_kec','jumlah_tidakpjb_kec',

      'jumlah_spal', 'jumlah_spalterbuka','jumlah_spaltertutup',
      'jumlah_spal_kec', 'jumlah_spalterbuka_kec','jumlah_spaltertutup_kec',

      'jumlah_tps', 'jumlah_tpsorganik','jumlah_tpsdibuang',
      'jumlah_tps_kec', 'jumlah_tpsorganik_kec','jumlah_tpsdibuang_kec',


      'jumlah_jamban', 'jumlah_koya','jumlah_kali', 'jumlah_helikopter', 'jumlah_septik',
      'jumlah_jamban_kec', 'jumlah_koya_kec','jumlah_kali_kec', 'jumlah_helikopter_kec', 'jumlah_septik_kec',

      'jumlah_pkl', 'jumlah_pkldalam','jumlah_pklluar',
      'jumlah_pkl_kec', 'jumlah_pkldalam_kec','jumlah_pklluar_kec',

      'jumlah_kuliner', 'jumlah_kullayak','jumlah_kultlayak',
      'jumlah_kuliner_kec', 'jumlah_kullayak_kec','jumlah_kultlayak_kec',

      'jumlah_dam', 'jumlah_damlayak','jumlah_damtlayak',
      'jumlah_dam_kec', 'jumlah_damlayak_kec','jumlah_damtlayak_kec',

      'jumlah_masjid', 'jumlah_masjidlayak','jumlah_masjidtlayak',
      'jumlah_masjid_kec', 'jumlah_masjidlayak_kec','jumlah_masjidtlayak_kec',

      'jumlah_sekolah', 'jumlah_sekolahlayak','jumlah_sekolahtlayak',
      'jumlah_sekolah_kec', 'jumlah_sekolahlayak_kec','jumlah_sekolahtlayak_kec',

      'jumlah_pesantren', 'jumlah_pesantrenlayak','jumlah_pesantrentlayak',
      'jumlah_pesantren_kec', 'jumlah_pesantrenlayak_kec','jumlah_pesantrentlayak_kec',

      'jumlah_pusk', 'jumlah_pusklayak','jumlah_pusktlayak',
      'jumlah_pusk_kec', 'jumlah_pusklayak_kec','jumlah_pusktlayak_kec',

      'jumlah_hotel', 'jumlah_hotellayak','jumlah_hoteltlayak',
      'jumlah_hotel_kec', 'jumlah_hotellayak_kec','jumlah_hoteltlayak_kec',

      'jumlah_hotelm', 'jumlah_hotelmlayak','jumlah_hotelmtlayak',
      'jumlah_hotelm_kec', 'jumlah_hotelmlayak_kec','jumlah_hotelmtlayak_kec',

      'jumlah_pasar', 'jumlah_pasarlayak','jumlah_pasartlayak',
      'jumlah_pasar_kec', 'jumlah_pasarlayak_kec','jumlah_pasartlayak_kec',

      'jumlah_kolam', 'jumlah_kolamlayak','jumlah_kolamtlayak',
      'jumlah_kolam_kec', 'jumlah_kolamlayak_kec','jumlah_kolamtlayak_kec',

      'jumlah_rss', 'jumlah_rslayak','jumlah_rstlayak',
      'jumlah_rss_kec', 'jumlah_rslayak_kec','jumlah_rstlayak_kec',

      'jumlah_jb', 'jumlah_jblayak','jumlah_jbtlayak',
      'jumlah_jb_kec', 'jumlah_jblayak_kec','jumlah_jbtlayak_kec',

      'jumlah_pkl', 'jumlah_pkldalam','jumlah_pklluar',
      'jumlah_pkl_kec', 'jumlah_pkldalam_kec','jumlah_pklluar_kec',

       'data_kelurahan', 'param_kecamatan', 'param_kelurahan', 'getHistoryData',

'sehattpilihrw1', 'sehattpilihrw2', 'sehattpilihrw3', 'sehattpilihrw4', 'sehattpilihrw5',
'sehattpilihrw6', 'sehattpilihrw7','sehattpilihrw8','sehattpilihrw9','sehattpilihrw10',
'sehattpilihrw11', 'sehattpilihrw12','sehattpilihrw13', 'sehattpilihrw14','sehattpilihrw15',
'sehattpilihrw16', 'sehattpilihrw17', 'sehattpilihrw18', 'sehattpilihrw19','sehattpilihrw20', 'sehattpilih',

'rumahtsehatrw1', 'rumahtsehatrw2', 'rumahtsehatrw3', 'rumahtsehatrw4', 'rumahtsehatrw5',
'rumahtsehatrw6', 'rumahtsehatrw7','rumahtsehatrw8','rumahtsehatrw9','rumahtsehatrw10',
'rumahtsehatrw11', 'rumahtsehatrw12','rumahtsehatrw13', 'rumahtsehatrw14','rumahtsehatrw15',
'rumahtsehatrw16', 'rumahtsehatrw17', 'rumahtsehatrw18', 'rumahtsehatrw19','rumahtsehatrw20', 'rumahtsehat',

'spaltbrw1', 'spaltbrw2', 'spaltbrw3', 'spaltbrw4', 'spaltbrw5',
'spaltbrw6', 'spaltbrw7','spaltbrw8','spaltbrw9','spaltbrw10',
'spaltbrw11', 'spaltbrw12','spaltbrw13', 'spaltbrw14','spaltbrw15',
'spaltbrw16', 'spaltbrw17', 'spaltbrw18', 'spaltbrw19','spaltbrw20', 'spaltb',

'spaltprw1', 'spaltprw2', 'spaltprw3', 'spaltprw4', 'spaltprw5',
'spaltprw6', 'spaltprw7','spaltprw8','spaltprw9','spaltprw10',
'spaltprw11', 'spaltprw12','spaltprw13', 'spaltprw14','spaltprw15',
'spaltprw16', 'spaltprw17', 'spaltprw18', 'spaltprw19','spaltprw20', 'spaltp',

'sampahpilihrw1', 'sampahpilihrw2', 'sampahpilihrw3', 'sampahpilihrw4', 'sampahpilihrw5',
'sampahpilihrw6', 'sampahpilihrw7','sampahpilihrw8','sampahpilihrw9','sampahpilihrw10',
'sampahpilihrw11', 'sampahpilihrw12','sampahpilihrw13', 'sampahpilihrw14','sampahpilihrw15',
'sampahpilihrw16', 'sampahpilihrw17', 'sampahpilihrw18', 'sampahpilihrw19','sampahpilihrw20', 'sampahpilih',

'sampahtpilihrw1', 'sampahtpilihrw2', 'sampahtpilihrw3', 'sampahtpilihrw4', 'sampahtpilihrw5',
'sampahtpilihrw6', 'sampahtpilihrw7','sampahtpilihrw8','sampahtpilihrw9','sampahtpilihrw10',
'sampahtpilihrw11', 'sampahtpilihrw12','sampahtpilihrw13', 'sampahtpilihrw14','sampahtpilihrw15',
'sampahtpilihrw16', 'sampahtpilihrw17', 'sampahtpilihrw18', 'sampahtpilihrw19','sampahtpilihrw20', 'sampahtpilih',

'pjbyarw1', 'pjbyarw2', 'pjbyarw3', 'pjbyarw4', 'pjbyarw5',
'pjbyarw6', 'pjbyarw7','pjbyarw8','pjbyarw9','pjbyarw10',
'pjbyarw11', 'pjbyarw12','pjbyarw13', 'pjbyarw14','pjbyarw15',
'pjbyarw16', 'pjbyarw17', 'pjbyarw18', 'pjbyarw19','pjbyarw20', 'pjbya',

'pjbtarw1', 'pjbtarw2', 'pjbtarw3', 'pjbtarw4', 'pjbtarw5',
'pjbtarw6', 'pjbtarw7','pjbtarw8','pjbtarw9','pjbtarw10',
'pjbtarw11', 'pjbtarw12','pjbtarw13', 'pjbtarw14','pjbtarw15',
'pjbtarw16', 'pjbtarw17', 'pjbtarw18', 'pjbtarw19','pjbtarw20', 'pjbta',



'kalirw1', 'kalirw2', 'kalirw3', 'kalirw4', 'kalirw5',
'kalirw6', 'kalirw7','kalirw8','kalirw9','kalirw10',
'kalirw11', 'kalirw12','kalirw13', 'kalirw14','kalirw15',
'kalirw16', 'kalirw17', 'kalirw18', 'kalirw19','kalirw20', 'kali',

'koyarw1', 'koyarw2', 'koyarw3', 'koyarw4', 'koyarw5',
'koyarw6', 'koyarw7','koyarw8','koyarw9','koyarw10',
'koyarw11', 'koyarw12','koyarw13', 'koyarw14','koyarw15',
'koyarw16', 'koyarw17', 'koyarw18', 'koyarw19','koyarw20', 'koya',


'helikopterrw1', 'helikopterrw2', 'helikopterrw3', 'helikopterrw4', 'helikopterrw5',
'helikopterrw6', 'helikopterrw7','helikopterrw8','helikopterrw9','helikopterrw10',
'helikopterrw11', 'helikopterrw12','helikopterrw13', 'helikopterrw14','helikopterrw15',
'helikopterrw16', 'helikopterrw17', 'helikopterrw18', 'helikopterrw19','helikopterrw20', 'helikopter',



'septikrw1', 'septikrw2', 'septikrw3', 'septikrw4', 'septikrw5',
'septikrw6', 'septikrw7','septikrw8','septikrw9','septikrw10',
'septikrw11', 'septikrw12','septikrw13', 'septikrw14','septikrw15',
'septikrw16', 'septikrw17', 'septikrw18', 'septikrw19','septikrw20', 'septik',


'getTotal_rs','getTotal_pjb', 'getTotal_spal', 'getTotal_tps', 'getTotal_jamban','getTotal_pkl','getTotal_kuliner','getTotal_dam','getTotal_jb','getTotal_masjid','getTotal_sekolah','getTotal_pesantren','getTotal_pusk','getTotal_hotel','getTotal_hotelm','getTotal_pasar','getTotal_kolam','getTotal_rss','reward'
));
    }

    public function getDataKelurahan(){
        return DB::table('petugas_sikelings')
        ->select('kelurahan')
        ->groupBy('kelurahan')
        ->orderBy('kelurahan', 'asc')
        ->get();
    }
}

