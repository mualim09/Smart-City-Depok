<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\models\Kecamatan;
use Excel;
use Response;

class KecamatanController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // $kecamatans =Kecamatan::orderBy('id_kecamatan','dsc')->paginate(5);
        $kecamatans = DB::table('kecamatans')->orderBy('id_kecamatan','dsc')->get();
        return view('pages/instansi/kecamatan', compact('kecamatans'));
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
            'nama_kecamatan'            => 'required',
            'gambaran_umum'             => 'required',
            'alamat'                    => 'required',
            'nama_camat'                => 'required',
            'koordinat'                 => 'required',
            'no_telp'                   => 'required',
            'website'                   => 'required',
            'foto_kecamatan'            => 'image|nullable|max:1999'
        ]);
// // =======================================================
// 
        $iddata = 28;
         // $partner =Kecamatan::all()->random()->id_kecamatan;
// ===========================================================
        

        if($request->hasFile('foto_kecamatan')){
          //get filename and extension_loaded
          $filenameWithExt = $request->file('foto_kecamatan')->getClientOriginalName();
          //get just filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //get just extends
          $extension = $request->file('foto_kecamatan')->getClientOriginalExtension();
          //file name to Store(membuat yg aploud gambar mempunyai nama unik tersendiri)
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
          //upload the ImagickPixel
          $path = $request->file('foto_kecamatan')->storeAs('public/img_kecamatan', $fileNameToStore);
        } else {
          $fileNameToStore = 'no image.jpg';
        }

// =======================================================
        DB::table('kecamatans')->insert([
            'nama_kecamatan'                => $request->nama_kecamatan,
            'gambaran_umum'                 => $request->gambaran_umum,
            'alamat'                        => $request->alamat,
            'nama_camat'                    => $request->nama_camat,
            'koordinat'                     => $request->koordinat,
            'no_telp'                       => $request->no_telp,
            'website'                       => $request->website,
            'id_data'                       => $iddata,
            'sumber'            => $request->sumber,
            'foto_kecamatan'                => $fileNameToStore      

        ]);
          

          return redirect('/kecamatan');

    }


    public function update(Request $request, $id_kecamatan)
    {
         $this->validate($request, [
           'nama_kecamatan'            => 'required',
            'gambaran_umum'             => 'required',
            'alamat'                    => 'required',
            'nama_camat'                => 'required',
            'koordinat'                 => 'required',
            'no_telp'                   => 'required',
            'website'                   => 'required',
            'foto_kecamatan'            => 'image|nullable|max:1999'
        ]);
// // =======================================================



        if($request->hasFile('foto_kecamatan')){
          //get filename and extension_loaded
          $filenameWithExt = $request->file('foto_kecamatan')->getClientOriginalName();
          //get just filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //get just extends
          $extension = $request->file('foto_kecamatan')->getClientOriginalExtension();
          //file name to Store(membuat yg aploud gambar mempunyai nama unik tersendiri)
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
          //upload the ImagickPixel
          $path = $request->file('foto_kecamatan')->storeAs('public/img_kecamatan', $fileNameToStore);
        } 
// =======================================================
       $kecamatan = DB::table('kecamatans')->where('id_kecamatan', $id_kecamatan)->first();
       // $kecamatan =Kecamatan::where('id_kecamatan', $id_kecamatan)->first(); 
       if($request->hasFile('foto_kecamatan')){

            if($kecamatan->foto_kecamatan != 'no image.jpg'){
            Storage::delete('public/img_kecamatan/'.$kecamatan->foto_kecamatan);
            $kecamatan->foto_kecamatan = $fileNameToStore;
            }
        DB::table('kecamatans')
            ->where('id_kecamatan', $id_kecamatan)
            ->update([  
            'nama_kecamatan'                => $request->nama_kecamatan,
            'gambaran_umum'                 => $request->gambaran_umum,
            'alamat'                        => $request->alamat,
            'nama_camat'                    => $request->nama_camat,
            'koordinat'                     => $request->koordinat,
            'no_telp'                       => $request->no_telp,
            'website'                       => $request->website,
            'sumber'            => $request->sumber,
            'foto_kecamatan'                => $fileNameToStore      
                    ]);

        }

        else{

            DB::table('kecamatans')
            ->where('id_kecamatan', $id_kecamatan)
            ->update([  
            'nama_kecamatan'                => $request->nama_kecamatan,
            'gambaran_umum'                 => $request->gambaran_umum,
            'alamat'                        => $request->alamat,
            'nama_camat'                    => $request->nama_camat,
            'koordinat'                     => $request->koordinat,
            'no_telp'                       => $request->no_telp,
            'sumber'            => $request->sumber,
            'website'                       => $request->website,
                    ]);
            }

        return redirect('/kecamatan')->with('success', 'Data Kecamatan berhasil diubah');
    }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
    public function destroy($id_kecamatan)
    {
    $kecamatans = DB::table('kecamatans')->where('id_kecamatan', $id_kecamatan)->first();

    if($kecamatans->foto_kecamatan != 'no image.jpg'){
    Storage::delete('public/img_kecamatan/'.$kecamatans->foto_kecamatan);
    }
    $kecamatans =    DB::delete('DELETE FROM kecamatans WHERE id_kecamatan = ?' , [$id_kecamatan]);
// ==================================================================================
        // Storage::delete('$image');
        return redirect('/kecamatan')->with('delete', 'Data Kecamatan telah berhasil dihapus');
    }

}
