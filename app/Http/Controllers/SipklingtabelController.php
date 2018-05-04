<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Rumah_sehat; 
use DateTime;
use Illuminate\Support\Facades\Input;


class SipklingtabelController extends Controller
{

    public function __construct(){
        $this->middleware('auth:admin');
    }

// ===============================================================================================================================
    private function viewdatatabel ($tabel){
    return   DB::table($tabel)
            ->leftjoin('petugas_sikelings', $tabel.'.id_petugas', '=', 'petugas_sikelings.id_petugas')                      
            ->select($tabel.'.*', 'petugas_sikelings.nama', 'petugas_sikelings.kelurahan')
            ->orderBy('waktu','desc')
            ->limit(5000)
            ->get();  

    }

// ###############################################################################################################################
// Filter step 1
    private function viewdatatabelbyparam ($tabel, $kecamatan, $kelurahan){
    if ($kelurahan == "0") 
          {     
            return  DB::table($tabel)
            ->leftjoin('petugas_sikelings', $tabel.'.id_petugas', '=', 'petugas_sikelings.id_petugas')                      
            ->select($tabel.'.*', 'petugas_sikelings.nama', 'petugas_sikelings.kelurahan')
            ->where('kecamatan', '=', $kecamatan)
            ->orderBy('waktu','desc')
            ->limit(20)
            ->get();     
          }

    else  {
            return  DB::table($tabel)
            ->leftjoin('petugas_sikelings', $tabel.'.id_petugas', '=', 'petugas_sikelings.id_petugas')                      
            ->select($tabel.'.*', 'petugas_sikelings.nama', 'petugas_sikelings.kelurahan')
            ->where('kecamatan', '=', $kecamatan)
            ->where('kelurahan', '=', $kelurahan)
            ->orderBy('waktu','desc')
            ->limit(20)
            ->get();  
          }
    }

// ##################################################################################
// Random ID
       private function getString(){
    // Available alpha caracters
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            // generate a pin based on 2 * 7 digits + a random character
            $pin = mt_rand(1000000, 9999999)
            . mt_rand(10000000, 99999999)
            . $characters[rand(0, strlen($characters) - 1)];
            // shuffle the result
            $string = str_shuffle($pin);
            return $string;
   }
//################################################################################### 


// Filter step 2
public function view_tabel_param(){
    if(Input::get('kecamatan') == 0 && Input::get('kelurahan') == 0){
        return redirect('sipp-kling/dashboard-tabel');
    }

    $data_kecamatan   = DB::table('petugas_sikelings')->select('kecamatan')->groupBy('kecamatan')->get();
    $data_kelurahan   = DB::table('petugas_sikelings')->select('kelurahan')->where('kecamatan', Input::get('kecamatan'))->groupBy('kelurahan')->get();
    $param_kecamatan  = Input::get('kecamatan');
    $param_kelurahan  = Input::get('kelurahan');

    $rehats = $this->viewdatatabelbyparam('rumah_sehat', Input::get('kecamatan'), Input::get('kelurahan'));;
    $sabs = $this->viewdatatabelbyparam('sabs', Input::get('kecamatan'), Input::get('kelurahan'));;
    $jabos = $this->viewdatatabelbyparam('jasa_bogas', Input::get('kecamatan'), Input::get('kelurahan'));;
    $kuliners = $this->viewdatatabelbyparam('kuliners', Input::get('kecamatan'), Input::get('kelurahan'));;
    $dams = $this->viewdatatabelbyparam('dam_sip_klings', Input::get('kecamatan'), Input::get('kelurahan'));;
    $ibadahs = $this->viewdatatabelbyparam('tempat_ibadahs', Input::get('kecamatan'), Input::get('kelurahan'));;
    $pasars = $this->viewdatatabelbyparam('pasars', Input::get('kecamatan'), Input::get('kelurahan'));;
    $sekolahs = $this->viewdatatabelbyparam('sekolahs', Input::get('kecamatan'), Input::get('kelurahan'));;
    $puskess = $this->viewdatatabelbyparam('puskesmass', Input::get('kecamatan'), Input::get('kelurahan'));;
    $pesantrens = $this->viewdatatabelbyparam('pesantrens', Input::get('kecamatan'), Input::get('kelurahan'));;
    $hotels = $this->viewdatatabelbyparam('hotels', Input::get('kecamatan'), Input::get('kelurahan'));;
    $hotel_melatis = $this->viewdatatabelbyparam('hotel_melatis', Input::get('kecamatan'), Input::get('kelurahan'));;
    $pkls = $this->viewdatatabelbyparam('pelayanan_keslings', Input::get('kecamatan'), Input::get('kelurahan'));;


return view('sipp-kling-pages/filter-pages/dashboard-tabel', compact( 'jabos', 'kuliners', 'dams', 'ibadahs', 'pasars', 'sekolahs', 'puskess', 'pesantrens', 'hotels', 'hotel_melatis', "hotels", "hotel_melatis", "pasars", 'pkls',
  'data_kecamatan', 'data_kelurahan', 'param_kecamatan', 'param_kelurahan','rehats', 'sabs'  ));
}





// ###################################################################################
public function view_tabel(){

              
$rehats  = $this->viewdatatabel("rumah_sehat");
//RUMAH SEHAT       

//SABS
$sabs  = $this->viewdatatabel("sabs");

//JASA BOGA
$jabos  = $this->viewdatatabel("jasa_bogas"); 

//KULINER            
  $kuliners  = $this->viewdatatabel("kuliners");

//KULINER            
  $dams  = $this->viewdatatabel("dam_sip_klings");

//KULINER            
  $ibadahs  = $this->viewdatatabel("tempat_ibadahs");

// Pasar
  $pasars = $this->viewdatatabel("pasars");

// Sekolah
  $sekolahs = $this->viewdatatabel("sekolahs");

// Puskesmas
  $puskess = $this->viewdatatabel("puskesmass");

// Pesantren
  $pesantrens = $this->viewdatatabel("pesantrens");

// Hotel
  $hotels = $this->viewdatatabel("hotels");

// Hotel Melati
  $hotel_melatis = $this->viewdatatabel("hotel_melatis");

// Pelayanan Kesling
  $pkls = $this->viewdatatabel("pelayanan_keslings");


   return view('sipp-kling-pages/dashboard-tabel', compact('rehats', 'sabs', 'jabos', 'kuliners', 'dams', 'ibadahs', 'pasars', 'sekolahs', 'puskess', 'pesantrens', 'hotels', 'hotel_melatis', "hotels", "hotel_melatis", "pasars", 'pkls' ));
   }

// =========================================================================================================================
// =========================================================================================================================



// Rumah Sehat
   public function input_rh(Request $request){
    $this->validate($request, [
            'nama_kk'         	=> 'required',
            'alamat'         	=> 'required',
            'no_rumah'          => 'required',
            'rt'        		=> 'required',
            'rw'              	=> 'required' 
        ]);
			

        DB::table('rumah_sehat')->insert([
            'id_rumah_sehat'    => $this->getString(),
            'nama_kk'           => $request->nama_kk,
            'alamat'           	=> $request->alamat,
            'no_rumah'          => $request->no_rumah,
            'rt'                => $request->rt,
            'rw'                => $request->rw,
            'id_data'           => 36,
            'waktu'             => new DateTime()

        ]); 
   return redirect('sipp-kling/dashboard-tabel')->with('success', 'Data Rumah Sehat telah ditambahkan');
   }

	public function delete_rh($id_rumah_sehat)
    {
    $rehats = DB::table('rumah_sehat')->where('id_rumah_sehat', $id_rumah_sehat)->delete();
    
    // $rehats = DB::table('rumah_sehat')
    //                 ->join('sabs', 'rumah_sehat.id_rumah_sehat', 'sabs.id_rumah_sehat')
    //                 ->where('rumah_sehat.id_rumah_sehat', $id_rumah_sehat)
    //                 ->delete();

    return redirect('sipp-kling/dashboard-tabel')->with('delete', 'Data Rumah Sehat telah dihapus');
    }
// =================================================================================================================================
// SAB
    public function delete_sab($id_rumah_sehat)
    {
        
        $sabs = DB::table('sabs')->where('id_rumah_sehat', $id_rumah_sehat)->delete();

       
        return redirect('sipp-kling/dashboard-tabel')->with('delete', 'Data Sab telah dihapus');
    }



// =================================================================================================================================
// JASA BOGA
   public function input_jb(Request $request){
    $this->validate($request, [
            'nama_tempat'       => 'required',
            'alamat'            => 'required', 
        ]);
            
        DB::table('jasa_bogas')->insert([
            'id_jasaboga'       => $this->getString(),
            'nama_tempat'       => $request->nama_tempat,
            'alamat'            => $request->alamat,
            'id_data'           => 40,
            'waktu'             => new DateTime()

        ]);  
   return redirect('sipp-kling/dashboard-tabel')->with('success', 'Data Jasa Boga telah ditambahkan');
   }

   public function delete_jb($id_jasaboga)
    {
        


        $jabos = DB::table('jasa_bogas')->where('id_jasaboga', $id_jasaboga)->delete();
       
        return redirect('sipp-kling/dashboard-tabel')->with('delete', 'Data Jasa Boga telah dihapus');
    }
// =================================================================================================================================

// =================================================================================================================================

// KULINER
   public function input_kuliner(Request $request){
    $this->validate($request, [
            'nama_tempat'       => 'required',
            'alamat'            => 'required', 
        ]);

        DB::table('kuliners')->insert([
            'id_kuliner'       => $this->getString(),
            'nama_tempat'       => $request->nama_tempat,
            'alamat'            => $request->alamat,
            'id_data'           => 19,
            'waktu'             => new DateTime()

        ]);  
   return redirect('sipp-kling/dashboard-tabel')->with('success', 'Data tempat Kuliner telah ditambahkan');
   }

   public function delete_kuliner($id_kuliner)
    {
        $kuliners = DB::table('kuliners')->where('id_kuliner', $id_kuliner)->delete();
       
        return redirect('sipp-kling/dashboard-tabel')->with('delete', 'Data tempat Kuliner telah dihapus');
    }
// =================================================================================================================================

// =================================================================================================================================

// Dam
// 
   public function input_dam(Request $request){
    $this->validate($request, [
            'nama_depot'       => 'required',
            'alamat'            => 'required', 
        ]);
        DB::table('dam_sip_klings')->insert([
            'id_dam'            => $this->getString(),
            'nama_depot'        => $request->nama_depot,
            'alamat'            => $request->alamat,
            'id_data'           => 42,
            'waktu'             => new DateTime()


        ]);  
   return redirect('sipp-kling/dashboard-tabel#tpm3')->with('success', 'Data tempat Dam telah ditambahkan');
   }

   public function delete_dam($id_dam)
    {
        $dams = DB::table('dam_sip_klings')->where('id_dam', $id_dam)->delete();
       
        return redirect('sipp-kling/dashboard-tabel')->with('delete', 'Data tempat Dam telah dihapus');
    }

// =================================================================================================================================

// =================================================================================================================================
// Tempat Ibadah
public function input_ibadah(Request $request){
    $this->validate($request, [
            'nama_tempat'       => 'required',
            'alamat'            => 'required', 
        ]);
        DB::table('tempat_ibadahs')->insert([
            'id_ibadah'         => $this->getString(),
            'nama_tempat'        => $request->nama_tempat,
            'alamat'            => $request->alamat,
            'id_data'           => 24,
            'waktu'             => new DateTime()


        ]);  
   return redirect('sipp-kling/dashboard-tabel')->with('success', 'Data Tempat Ibadah telah ditambahkan');
   }

   public function delete_ibadah($id_ibadah)
    {
        $ibadahs = DB::table('tempat_ibadahs')->where('id_ibadah', $id_ibadah)->delete();
       
        return redirect('sipp-kling/dashboard-tabel')->with('delete', 'Data Tempat Ibadah telah dihapus');
    }
// =================================================================================================================================

// =================================================================================================================================

// PASAR
// 
   public function input_pasar(Request $request){
    $this->validate($request, [
            'nama_tempat'       => 'required',
            'alamat'            => 'required', 
        ]);
        DB::table('pasars')->insert([
            'id_pasar'          => $this->getString(),
            'nama_tempat'       => $request->nama_tempat,
            'alamat'            => $request->alamat,
            'id_data'           => 15,
            'waktu'             => new DateTime()


        ]);  
   return redirect('sipp-kling/dashboard-tabel')->with('success', 'Data Pasar telah ditambahkan');
   }

   public function delete_pasar($id_pasar)
    {
        $dams = DB::table('pasars')->where('id_pasar', $id_pasar)->delete();
       
        return redirect('sipp-kling/dashboard-tabel')->with('delete', 'Data Pasar telah dihapus');
    }


// =================================================================================================================================

// =================================================================================================================================

// Sekolah
// 
   public function input_sekolah(Request $request){
    $this->validate($request, [
            'nama_tempat'       => 'required',
            'alamat'            => 'required', 
        ]);
        DB::table('sekolahs')->insert([
            'id_sekolah'        => $this->getString(),
            'nama_tempat'        => $request->nama_tempat,
            'alamat'            => $request->alamat,
            'id_data'           => 6,
            'waktu'             => new DateTime()


        ]);  
   return redirect('sipp-kling/dashboard-tabel')->with('success', 'Data Sekolah telah ditambahkan');
   }

   public function delete_sekolah($id_sekolah)
    {
        $sekolahs = DB::table('sekolahs')->where('id_sekolah', $id_sekolah)->delete();
       
        return redirect('sipp-kling/dashboard-tabel')->with('delete', 'Data Sekolah telah dihapus');
    }

// =================================================================================================================================

// =================================================================================================================================
// Puskesmas
// 
   public function input_puskes(Request $request){
    $this->validate($request, [
            'nama_tempat'       => 'required',
            'alamat'            => 'required', 
        ]);
        DB::table('puskesmass')->insert([
            'id_puskesmas'      => $this->getString(),
            'nama_tempat'       => $request->nama_tempat,
            'alamat'            => $request->alamat,
            'id_data'           => 4,
            'waktu'             => new DateTime()


        ]);  
   return redirect('sipp-kling/dashboard-tabel')->with('success', 'Data Puskesmas telah ditambahkan');
   }

   public function delete_puskes($id_puskesmas)
    {
        $puskess = DB::table('puskesmass')->where('id_puskesmas', $id_puskesmas)->delete();
       
        return redirect('sipp-kling/dashboard-tabel')->with('delete', 'Data Puskesmas telah dihapus');
    }

// =================================================================================================================================

// =================================================================================================================================
// Pesantren
// 
   public function input_pesantren(Request $request){
    $this->validate($request, [
            'nama_tempat'       => 'required',
            'alamat'            => 'required', 
        ]);
        DB::table('pesantrens')->insert([
            'id_pesantren'      => $this->getString(),
            'nama_tempat'       => $request->nama_tempat,
            'alamat'            => $request->alamat,
            'id_data'           => 7,
            'waktu'             => new DateTime()


        ]);  
   return redirect('sipp-kling/dashboard-tabel')->with('success', 'Data Pesantren telah ditambahkan');
   }

   public function delete_pesantren($id_pesantren)
    {
        $pesantrens = DB::table('pesantrens')->where('id_pesantren', $id_pesantren)->delete();
       
        return redirect('sipp-kling/dashboard-tabel')->with('delete', 'Data Pesantren telah dihapus');
    }

// =================================================================================================================================

// =================================================================================================================================
// Hotel
// 
   public function input_hotel(Request $request){
    $this->validate($request, [
            'nama_tempat'       => 'required',
            'alamat'            => 'required', 
        ]);
        DB::table('hotels')->insert([
            'id_hotel'      => $this->getString(),
            'nama_tempat'       => $request->nama_tempat,
            'alamat'            => $request->alamat,
            'id_data'           => 8,
            'waktu'             => new DateTime()


        ]);  
   return redirect('sipp-kling/dashboard-tabel')->with('success', 'Data Hotel telah ditambahkan');
   }

   public function delete_hotel($id_hotel)
    {
        $hotels = DB::table('hotels')->where('id_hotel', $id_hotel)->delete();
       
        return redirect('sipp-kling/dashboard-tabel')->with('delete', 'Data Hotel telah dihapus');
    }

// =================================================================================================================================

// =================================================================================================================================

// Hotel Melati
// 
   public function input_melati(Request $request){
    $this->validate($request, [
            'nama_tempat'       => 'required',
            'alamat'            => 'required', 
        ]);
        DB::table('hotel_melatis')->insert([
            'id_hotel_melati'   => $this->getString(),
            'nama_tempat'       => $request->nama_tempat,
            'alamat'            => $request->alamat,
            'id_data'           => 9,
            'waktu'             => new DateTime()


        ]);  
   return redirect('sipp-kling/dashboard-tabel')->with('success', 'Data Hotel Melati telah ditambahkan');
   }

   public function delete_melati($id_hotel_melati)
    {
        $melatis = DB::table('hotel_melatis')->where('id_hotel_melati', $id_hotel_melati)->delete();
       
        return redirect('sipp-kling/dashboard-tabel')->with('delete', 'Data Hotel Melati telah dihapus');
    }

// =================================================================================================================================

// =================================================================================================================================

// Pelayanan Kesling
// 
   public function input_pkl(Request $request){
    $this->validate($request, [
            'nama_tempat'       => 'required',
            'alamat'            => 'required', 
        ]);
        DB::table('pelayanan_keslings')->insert([
            'id_pelayanan_kesling'      => $this->getString(),
            'nama_tempat'       => $request->nama_tempat,
            'alamat'            => $request->alamat,
            'id_data'           => 10,
            'waktu'             => new DateTime()


        ]);  
   return redirect('sipp-kling/dashboard-tabel')->with('success', 'Data Pelayanan Kesling telah ditambahkan');
   }

   public function delete_pkl($id_pelayanan_kesling)
    {
        $pkls = DB::table('pelayanan_keslings')->where('id_pelayanan_kesling', $id_pelayanan_kesling)->delete();
       
        return redirect('sipp-kling/dashboard-tabel')->with('delete', 'Data pelayanan Kesling telah dihapus');
    }

// =================================================================================================================================

// =================================================================================================================================

}
