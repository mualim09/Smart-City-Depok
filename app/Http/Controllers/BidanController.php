<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\models\Bidan;
use Excel;
use Response;

class BidanController extends Controller
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
        
        $bidans = DB::table('bidans')->orderBy('id_bidan','dsc')->get();
        return view('pages/instansi/bidan', compact('bidans'));
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
            'foto'       => 'image|nullable|max:1999'
        ]);
// // =======================================================
// 
        
// 
// ===========================================================
        $idbidan = '5';

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
          $path = $request->file('foto')->storeAs('public/img_bidan', $fileNameToStore);
        } else {
          $fileNameToStore = 'no image.jpg';
        }

// =======================================================
        DB::table('bidans')->insert([
            'nama_tempat'          => $request->nama_tempat,
            'gambaran_umum'        => $request->gambaran_umum,
            'alamat'               => $request->alamat,
            'no_telp'              => $request->no_telp,
            'jam_operasional'      => $request->jam_operasional,
            'koordinat'            => $request->koordinat,
            'kecamatan'            => $request->kecamatan,
            'website'              => $request->website,
            'sumber'            => $request->sumber,
            'id_data'              => $idbidan,
            'foto'          => $fileNameToStore      

        ]);
          

          return redirect('/bidan');

    }


    public function update(Request $request, $id_bidan)
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
            'foto'              => 'image|nullable|max:1999'
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
          $path = $request->file('foto')->storeAs('public/img_bidan', $fileNameToStore);
        } 
// =======================================================
       $bidan = DB::table('bidans')->where('id_bidan', $id_bidan)->first();
       // $bidan = Bidan::where('id_bidan', $id_bidan)->first(); 
       if($request->hasFile('foto')){

            if($bidan->foto != 'no image.jpg'){
            Storage::delete('public/img_bidan/'.$bidan->foto);
            $bidan->foto = $fileNameToStore;
            }
        DB::table('bidans')
            ->where('id_bidan', $id_bidan)
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
                    'foto'       => $fileNameToStore 
                    ]);

        }

        else{

            DB::table('bidans')
            ->where('id_bidan', $id_bidan)
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

        return redirect('/bidan')->with('success', 'Data Bidan berhasil diubah');
    }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
    public function destroy($id_bidan)
    {
    $bidans = DB::table('bidans')->where('id_bidan', $id_bidan)->first();
    // $bidans = bidan::where('id_bidan', $id_bidan)->get()->first();

    if($bidans->foto != 'no image.jpg'){
    Storage::delete('public/img_bidan/'.$bidans->foto);
    }
    $bidans =    DB::delete('DELETE FROM bidans WHERE id_bidan = ?' , [$id_bidan]);
// ==================================================================================
        // Storage::delete('$image');
        return redirect('/bidan')->with('delete', 'Data Bidan telah berhasil dihapus');
    }


    public function import_bidan()
    {
        
        Excel::load(Input::file('csv_file'), function($bidans){
            $bidans->each(function ($sheet){
            Bidan::firstOrCreate($sheet->toArray());
            return $sheet;
            });
        });

        return redirect('/bidan');
    }
}
