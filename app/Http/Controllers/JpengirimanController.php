<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\models\Jpengiriman;
use Excel;
use Response;

class JpengirimanController extends Controller
{

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengirimans = DB::table('jasa_pengirimans')->orderBy('id_pengiriman','dsc')->get();
        return view('pages/instansi/jpengiriman', compact('pengirimans'));
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
            'nama_tempat'           => 'required',
            'gambaran_umum'         => 'required',
            'alamat'                => 'required',
            'no_telp'               => 'required',
            'jam_operasional'       => 'required',
            'koordinat'             => 'required',
            'kecamatan'             => 'required',
            'website'               => 'required',
            'foto'                  => 'image|nullable|max:1999'
        ]);
// // =======================================================
// 
       
// 
// ===========================================================
        $idkirim = '23';

        if($request->hasFile('foto')){
          //get filename and extension_loaded
          $filenameWithExt = $request->file('foto')->getClientOriginalName();
          //get just filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //get just extends
          $extension = $request->file('foto')->getClientOriginalExtension();
          //file name to Store(membuat yg aploud gambar mempunyai nama unik tersendiri)
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
          //upload the ImagickPixel
          $path = $request->file('foto')->storeAs('public/img_jpengiriman', $fileNameToStore);
        } else {
          $fileNameToStore = 'no image.jpg';
        }

// =======================================================
        DB::table('jasa_pengirimans')->insert([
            'nama_tempat'           => $request->nama_tempat,
            'gambaran_umum'         => $request->gambaran_umum,
            'alamat'                => $request->alamat,
            'no_telp'               => $request->no_telp,
            'jam_operasional'       => $request->jam_operasional,
            'koordinat'             => $request->koordinat,
            'kecamatan'             => $request->kecamatan,
            'website'               => $request->website,
            'id_data'               => $idkirim,
            'sumber'          => $request->sumber,
            'foto'                  => $fileNameToStore      

        ]);
          

          return redirect('/jpengiriman');

    }


    public function update(Request $request, $id_pengiriman)
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
            'foto' => 'image|nullable|max:1999'
        ]);
// // =======================================================



        if($request->hasFile('foto')){
          //get filename and extension_loaded
          $filenameWithExt = $request->file('foto')->getClientOriginalName();
          //get just filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //get just extends
          $extension = $request->file('foto')->getClientOriginalExtension();
          //file name to Store(membuat yg aploud gambar mempunyai nama unik tersendiri)
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
          //upload the ImagickPixel
          $path = $request->file('foto')->storeAs('public/img_jpengiriman', $fileNameToStore);
        } 
// =======================================================
       // $pengiriman = Jpengiriman::where('id_pengiriman', $id_pengiriman)->first();
       $pengiriman = DB::table('jasa_pengirimanss')->where('id_pengiriman', $id_pengiriman)->first();
       if($request->hasFile('foto')){

            if($pengiriman->foto != 'no image.jpg'){
            Storage::delete('public/img_jpengiriman/'.$pengiriman->foto);
            $pengiriman->foto = $fileNameToStore;
            }
        DB::table('jasa_pengirimans')
            ->where('id_pengiriman', $id_pengiriman)
            ->update([  
                    'nama_tempat'       => $request->nama_tempat,
                    'gambaran_umum'     => $request->gambaran_umum,
                    'alamat'            => $request->alamat,
                    'no_telp'           => $request->no_telp,
                    'jam_operasional'   => $request->jam_operasional,
                    'koordinat'         => $request->koordinat,
                    'kecamatan'         => $request->kecamatan,
                    'website'           => $request->website,
                    'sumber'          => $request->sumber,
                    'foto' => $fileNameToStore 
                    ]);

        }

        else{

            DB::table('jasa_pengirimans')
            ->where('id_pengiriman', $id_pengiriman)
            ->update([  
                    'nama_tempat'       => $request->nama_tempat,
                    'gambaran_umum'     => $request->gambaran_umum,
                    'alamat'            => $request->alamat,
                    'no_telp'           => $request->no_telp,
                    'jam_operasional'   => $request->jam_operasional,
                    'koordinat'         => $request->koordinat,
                    'kecamatan'         => $request->kecamatan,
                    'sumber'          => $request->sumber,
                    'website'           => $request->website,
                    ]);
            }
        return redirect('/jpengiriman')->with('success', 'Data Jasa Pengiriman berhasil diubah');
    }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
    public function destroy($id_pengiriman)
    {
    $pengirimans = DB::table('jasa_pengirimanss')->where('id_pengiriman', $id_pengiriman)->first();
    // $pengirimans = Jpengiriman::where('id_pengiriman', $id_pengiriman)->get()->first();
    if($pengirimans->foto != 'no image.jpg'){
    Storage::delete('public/img_jpengiriman/'.$pengirimans->foto);
    }
    $pengirimans =    DB::delete('DELETE FROM jasa_pengirimans WHERE id_pengiriman = ?' , [$id_pengiriman]);
// ==================================================================================
    return redirect('/jpengiriman')->with('delete', 'Data Jasa Pengiriman telah berhasil dihapus');
    }


    public function import_jpengiriman()
    {
        
        Excel::load(Input::file('csv_file'), function($pengirimans){
            $pengirimans->each(function ($sheet){
            Jpengiriman::firstOrCreate($sheet->toArray());
            return $sheet;
            });
        });

        return redirect('/jpengiriman');
    }
}
