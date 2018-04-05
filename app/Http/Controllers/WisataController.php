<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\models\Wisata;
use Excel;
use Response;

class WisataController extends Controller
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
         // $wisatas = Wisata::orderBy('id_wisata','dsc')->get();
         $wisatas = DB::table('tempat_wisatas')->orderBy('id_wisata','dsc')->get();
        return view('pages/instansi/wisata', compact('wisatas'));
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
        $idwisata = '20';

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
          $path = $request->file('foto')->storeAs('public/img_wisata', $fileNameToStore);
        } else {
          $fileNameToStore = 'no image.jpg';
        }

// =======================================================
        DB::table('tempat_wisatas')->insert([
            'nama_tempat'           => $request->nama_tempat,
            'gambaran_umum'         => $request->gambaran_umum,
            'alamat'                => $request->alamat,
            'no_telp'               => $request->no_telp,
            'jam_operasional'       => $request->jam_operasional,
            'koordinat'             => $request->koordinat,
            'kecamatan'             => $request->kecamatan,
            'website'               => $request->website,
            'id_data'               => $idwisata,
            'sumber'                => $request->sumber,
            'foto'                  => $fileNameToStore      

        ]);
          

          return redirect('/wisata');

    }


    public function update(Request $request, $id_wisata)
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
          $path = $request->file('foto')->storeAs('public/img_wisata', $fileNameToStore);
        } 
// =======================================================

       $wisata = DB::table('tempat_wisatas')->where('id_wisata', $id_wisata)->first(); 
       if($request->hasFile('foto')){

            if($wisata->foto != 'no image.jpg'){
            Storage::delete('public/img_wisata/'.$wisata->foto);
            $wisata->foto = $fileNameToStore;
            }
        DB::table('tempat_wisatas')
            ->where('id_wisata', $id_wisata)
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

            DB::table('tempat_wisatas')
            ->where('id_wisata', $id_wisata)
            ->update([  
                    'nama_tempat'       => $request->nama_tempat,
                    'gambaran_umum'     => $request->gambaran_umum,
                    'alamat'            => $request->alamat,
                    'no_telp'           => $request->no_telp,
                    'jam_operasional'   => $request->jam_operasional,
                    'koordinat'         => $request->koordinat,
                    'kecamatan'         => $request->kecamatan,
                    'sumber'          => $request->sumber,
                    'website'           => $request->website
                    ]);
            }

        return redirect('/wisata')->with('success', 'Data Wisata berhasil diubah');
    }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
    public function destroy($id_wisata)
    {
    $wisatas = DB::table('tempat_wisatas')->where('id_wisata', $id_wisata)->first(); 

    if($wisatas->foto != 'no image.jpg'){
    Storage::delete('public/img_wisata/'.$wisatas->foto);
    }
    $wisatas =    DB::delete('DELETE FROM tempat_wisatas WHERE id_wisata = ?' , [$id_wisata]);
// ==================================================================================
        // Storage::delete('$image');
        return redirect('/wisata')->with('delete', 'Data Wisata telah berhasil dihapus');
    }


    public function import_wisata()
    {
        
        Excel::load(Input::file('csv_file'), function($wisatas){
            $wisatas->each(function ($sheet){
            Wisata::firstOrCreate($sheet->toArray());
            return $sheet;
            });
        });

        return redirect('/wisata');
    }
}
