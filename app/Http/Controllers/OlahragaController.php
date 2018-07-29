<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\models\Olahraga;
use Excel;
use Response;

class OlahragaController extends Controller
{

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // $olahragas = Olahraga::orderBy('id_olahraga','dsc')->paginate(5);
         $olahragas = DB::table('olahragas')->orderBy('id_olahraga','dsc')->get();
        return view('pages/instansi/olahraga', compact('olahragas'));
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
            'foto'     => 'image|nullable|max:1999'
        ]);
// // =======================================================
// 
       
// 
// ===========================================================
        $idolahraga = '21';

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
          $path = $request->file('foto')->storeAs('public/img_olahraga', $fileNameToStore);
        } else {
          $fileNameToStore = 'no image.jpg';
        }

// =======================================================
        DB::table('olahragas')->insert([
            'nama_tempat'           => $request->nama_tempat,
            'gambaran_umum'         => $request->gambaran_umum,
            'alamat'                => $request->alamat,
            'no_telp'               => $request->no_telp,
            'jam_operasional'       => $request->jam_operasional,
            'koordinat'             => $request->koordinat,
            'kecamatan'             => $request->kecamatan,
            'website'               => $request->website,
            'id_data'               => $idolahraga,
            'sumber'          => $request->sumber,
            'foto'                  => $fileNameToStore      

        ]);
          

          return redirect('/olahraga');

    }


    public function update(Request $request, $id_olahraga)
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
          $path = $request->file('foto')->storeAs('public/img_olahraga', $fileNameToStore);
        } 
// =======================================================
$olahraga = DB::table('olahragas')->where('id_olahraga', $id_olahraga)->first();
       if($request->hasFile('foto')){

            if($olahraga->foto != 'no image.jpg'){
            Storage::delete('public/img_olahraga/'.$olahraga->foto);
            $olahraga->foto = $fileNameToStore;
            }
        DB::table('olahragas')
            ->where('id_olahraga', $id_olahraga)
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

            DB::table('olahragas')
            ->where('id_olahraga', $id_olahraga)
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

        return redirect('/olahraga')->with('success', 'Data Olahraga berhasil diubah');
    }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
    public function destroy($id_olahraga)
    {
      
$olahragas = DB::table('olahragas')->where('id_olahraga', $id_olahraga)->first();

    if($olahragas->foto != 'no image.jpg'){
    Storage::delete('public/img_olahraga/'.$olahragas->foto);
    }
    $olahragas =    DB::delete('DELETE FROM olahragas WHERE id_olahraga = ?' , [$id_olahraga]);
// ==================================================================================
        // Storage::delete('$image');
        return redirect('/olahraga')->with('delete', 'Data Olahraga telah berhasil dihapus');
    }


    public function import_olahraga()
    {
        
        Excel::load(Input::file('csv_file'), function($olahragas){
            $olahragas->each(function ($sheet){
            Olahraga::firstOrCreate($sheet->toArray());
            return $sheet;
            });
        });

        return redirect('/olahraga');
    }
}
