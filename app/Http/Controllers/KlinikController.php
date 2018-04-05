<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\models\Klinik;
use Excel;
use Response;

class KlinikController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // $kliniks = Klinik::orderBy('id_klinik','dsc')->paginate(5);
       $kliniks = DB::table('kliniks')->orderBy('id_klinik','dsc')->get();
        return view('pages/instansi/klinik', compact('kliniks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/inputdata');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//=======================================================

        $this->validate($request, [
            'nama_tempat'       => 'required',
            'gambaran_umum'     => 'required',
            'alamat'            => 'required',
            'no_telp'           => 'required',
            'jam_operasional'   => 'required',
            'koordinat'         => 'required',
            'kecamatan'         => 'required',
            'website'           => 'required',
            'foto_klinik'       => 'image|nullable|max:1999'
        ]);
// // =======================================================
// 
        
// 
// ===========================================================
        $idklinik = '3';

         if($request->hasFile('foto_klinik')){
          //get filename and extension_loaded
          $filenameWithExt = $request->file('foto_klinik')->getClientOriginalName();
          //get just filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //get just extends
          $extension = $request->file('foto_klinik')->getClientOriginalExtension();
          //file name to Store(membuat yg aploud gambar mempunyai nama unik tersendiri)
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
          //upload the ImagickPixel
          $path = $request->file('foto_klinik')->storeAs('public/img_klinik', $fileNameToStore);
        } else {
          $fileNameToStore = 'no image.jpg';
        }

// =======================================================
        DB::table('kliniks')->insert([
            'nama_tempat'          => $request->nama_tempat,
            'gambaran_umum'        => $request->gambaran_umum,
            'alamat'               => $request->alamat,
            'no_telp'              => $request->no_telp,
            'jam_operasional'      => $request->jam_operasional,
            'koordinat'            => $request->koordinat,
            'kecamatan'            => $request->kecamatan,
            'website'              => $request->website,
            'sumber'               => $request->sumber,
            'id_data'              => $idklinik,
            'foto_klinik'          => $fileNameToStore      

        ]);
          

          return redirect('/klinik');

    }


    public function update(Request $request, $id_klinik)
    {
         $this->validate($request, [
            'nama_tempat'       => 'required',
            'gambaran_umum'     => 'required',
            'alamat'            => 'required',
            'no_telp'           => 'required',
            'jam_operasional'   => 'required',
            'koordinat'         => 'required',
            'kecamatan'         => 'required',
            'website'           => 'required',
            'foto_klinik'       => 'image|nullable|max:1999'
        ]);
// // =======================================================



        if($request->hasFile('foto_klinik')){
          //get filename and extension_loaded
          $filenameWithExt = $request->file('foto_klinik')->getClientOriginalName();
          //get just filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //get just extends
          $extension = $request->file('foto_klinik')->getClientOriginalExtension();
          //file name to Store(membuat yg aploud gambar mempunyai nama unik tersendiri)
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
          //upload the ImagickPixel
          $path = $request->file('foto_klinik')->storeAs('public/img_klinik', $fileNameToStore);
        } 
// =======================================================
       $klinik = DB::table('kliniks')->where('id_klinik', $id_klinik)->first();
       
       if($request->hasFile('foto_klinik')){

            if($klinik->foto_klinik != 'no image.jpg'){
            Storage::delete('public/img_klinik/'.$klinik->foto_klinik);
            $klinik->foto_klinik = $fileNameToStore;
            }
        DB::table('kliniks')
            ->where('id_klinik', $id_klinik)
            ->update([  
                    'nama_tempat'       => $request->nama_tempat,
                    'gambaran_umum'     => $request->gambaran_umum,
                    'alamat'            => $request->alamat,
                    'no_telp'           => $request->no_telp,
                    'jam_operasional'   => $request->jam_operasional,
                    'koordinat'         => $request->koordinat,
                    'kecamatan'         => $request->kecamatan,
                    'website'           => $request->website,
                    'sumber'            => $request->sumber,
                    'foto_klinik'       => $fileNameToStore 
                    ]);

        }

        else{

            DB::table('kliniks')
            ->where('id_klinik', $id_klinik)
            ->update([  
                    'nama_tempat'       => $request->nama_tempat,
                    'gambaran_umum'     => $request->gambaran_umum,
                    'alamat'            => $request->alamat,
                    'no_telp'           => $request->no_telp,
                    'jam_operasional'   => $request->jam_operasional,
                    'koordinat'         => $request->koordinat,
                    'kecamatan'         => $request->kecamatan,
                    'sumber'            => $request->sumber,
                    'website'           => $request->website
                    ]);
            }

        return redirect('/klinik')->with('success', 'Data Klinik berhasil diubah');
    }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
    public function destroy($id_klinik)
    {
    $kliniks = DB::table('kliniks')->where('id_klinik', $id_klinik)->first();

    if($kliniks->foto_klinik != 'no image.jpg'){
    Storage::delete('public/img_klinik/'.$kliniks->foto_klinik);
    }
    $kliniks =    DB::delete('DELETE FROM kliniks WHERE id_klinik = ?' , [$id_klinik]);
// ==================================================================================
        // Storage::delete('$image');
        return redirect('/klinik')->with('delete', 'Data Klinik telah berhasil dihapus');
    }


    public function import_klinik()
    {
        
        Excel::load(Input::file('csv_file'), function($kliniks){
            $kliniks->each(function ($sheet){
            Klinik::firstOrCreate($sheet->toArray());
            return $sheet;
            });
        });

        return redirect('/klinik');
    }
}
