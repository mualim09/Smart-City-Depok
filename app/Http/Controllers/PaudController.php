<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\models\Paud;
use Excel;
use Response;

class PaudController extends Controller
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
         // $pauds = Paud::orderBy('id_paud','dsc')->paginate(5);
         $pauds = DB::table('pauds')->orderBy('id_paud','dsc')->get();
        return view('pages/instansi/paud', compact('pauds'));
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
            'nama_tempat'         => 'required',
            'gambaran_umum'       => 'required',
            'alamat'              => 'required',
            'no_telp'             => 'required',
            'jam_operasional'     => 'required',
            'koordinat'           => 'required',
            'kecamatan'           => 'required',
            'website'             => 'required',
            'foto_paud'           => 'image|nullable|max:1999'
        ]);
// // =======================================================
// 
        
// 
// ===========================================================
        $idpaud = '6';

        if($request->hasFile('foto_paud')){
          //get filename and extension_loaded
          $filenameWithExt = $request->file('foto_paud')->getClientOriginalName();
          //get just filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //get just extends
          $extension = $request->file('foto_paud')->getClientOriginalExtension();
          //file name to Store(membuat yg aploud gambar mempunyai nama unik tersendiri)
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
          //upload the ImagickPixel
          $path = $request->file('foto_paud')->storeAs('public/img_paud', $fileNameToStore);
        } else {
          $fileNameToStore = 'no image.jpg';
        }

// =======================================================
        DB::table('pauds')->insert([
            'nama_tempat'          => $request->nama_tempat,
            'gambaran_umum'   => $request->gambaran_umum,
            'alamat'            => $request->alamat,
            'no_telp'               => $request->no_telp,
            'jam_operasional' => $request->jam_operasional,
            'koordinat'           => $request->koordinat,
            'kecamatan'       => $request->kecamatan,
            'website'           => $request->website,
            'id_data'               => $idpaud,
            'sumber'            => $request->sumber,
            'foto_paud'                => $fileNameToStore      

        ]);
          

          return redirect('/paud');

    }


    public function update(Request $request, $id_paud)
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
            'foto_paud'              => 'image|nullable|max:1999'
        ]);
// // =======================================================



        if($request->hasFile('foto_paud')){
          //get filename and extension_loaded
          $filenameWithExt = $request->file('foto_paud')->getClientOriginalName();
          //get just filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //get just extends
          $extension = $request->file('foto_paud')->getClientOriginalExtension();
          //file name to Store(membuat yg aploud gambar mempunyai nama unik tersendiri)
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
          //upload the ImagickPixel
          $path = $request->file('foto_paud')->storeAs('public/img_paud', $fileNameToStore);
        } 
// =======================================================
$paud = DB::table('pauds')->where('id_paud', $id_paud)->first();
       if($request->hasFile('foto_paud')){

            if($paud->foto_paud != 'no image.jpg'){
            Storage::delete('public/img_paud/'.$paud->foto_paud);
            $paud->foto_paud = $fileNameToStore;
            }
        DB::table('pauds')
            ->where('id_paud', $id_paud)
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
                    'foto_paud'              => $fileNameToStore 
                    ]);

        }

        else{

            DB::table('pauds')
            ->where('id_paud', $id_paud)
            ->update([  
                    'nama_tempat'       => $request->nama_tempat,
                    'gambaran_umum'     => $request->gambaran_umum,
                    'alamat'            => $request->alamat,
                    'no_telp'           => $request->no_telp,
                    'jam_operasional'   => $request->jam_operasional,
                    'koordinat'         => $request->koordinat,
                    'kecamatan'         => $request->kecamatan,
                    'sumber'            => $request->sumber,
                    'website'           => $request->website,
                    ]);
            }

        return redirect('/paud')->with('success', 'Data paud berhasil diubah');
    }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
    public function destroy($id_paud)
    {
$pauds = DB::table('pauds')->where('id_paud', $id_paud)->first();

    if($pauds->foto_paud != 'no image.jpg'){
    Storage::delete('public/img_paud/'.$pauds->foto_paud);
    }
    $pauds =    DB::delete('DELETE FROM pauds WHERE id_paud = ?' , [$id_paud]);
// ==================================================================================
        // Storage::delete('$image');
        return redirect('/paud')->with('delete', 'Data paud telah berhasil dihapus');
    }


    public function import_paud()
    {
        
        Excel::load(Input::file('csv_file'), function($pauds){
            $pauds->each(function ($sheet){
            Paud::firstOrCreate($sheet->toArray());
            return $sheet;
            });
        });

        return redirect('/paud');
    }
}
