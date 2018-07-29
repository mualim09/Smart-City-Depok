<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\models\Tibadah;
use Excel;
use Response;

class TibadahController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // $tibadahs = Tibadah::orderBy('id_ibadah','dsc')->paginate(5);
        $tibadahs = DB::table('tempat_ibadahs')->orderBy('id_ibadah','dsc')->get();
        return view('pages/instansi/tibadah', compact('tibadahs'));
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
            'foto'                => 'image|nullable|max:1999'
        ]);
// // =======================================================
// 
        
// 
// ===========================================================
        $iddata = '24';

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
          $path = $request->file('foto')->storeAs('public/img_tibadah', $fileNameToStore);
        } else {
          $fileNameToStore = 'no image.jpg';
        }

// =======================================================
        DB::table('tempat_ibadahs')->insert([
            'nama_tempat'          => $request->nama_tempat,
            'gambaran_umum'   => $request->gambaran_umum,
            'alamat'            => $request->alamat,
            'no_telp'               => $request->no_telp,
            'jam_operasional' => $request->jam_operasional,
            'koordinat'           => $request->koordinat,
            'kecamatan'       => $request->kecamatan,
            'website'           => $request->website,
            'id_data'               => $iddata,
            'sumber'          => $request->sumber,
            'foto'                => $fileNameToStore      

        ]);
          

          return redirect('/tibadah');

    }


    public function update(Request $request, $id_ibadah)
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
          $path = $request->file('foto')->storeAs('public/img_tibadah', $fileNameToStore);
        } 
// =======================================================
       $tibadah = DB::table('tempat_ibadahs')->where('id_ibadah', $id_ibadah)->first(); 
       if($request->hasFile('foto')){

            if($tibadah->foto != 'no image.jpg'){
            Storage::delete('public/img_tibadah/'.$tibadah->foto);
            $tibadah->foto = $fileNameToStore;
            }
        DB::table('tempat_ibadahs')
            ->where('id_ibadah', $id_ibadah)
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
                    'foto'              => $fileNameToStore 
                    ]);

        }

        else{

            DB::table('tempat_ibadahs')
            ->where('id_ibadah', $id_ibadah)
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

        return redirect('/tibadah')->with('success', 'Data Tempat Ibadah berhasil diubah');
    }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
    public function destroy($id_ibadah)
    {
    $tibadahs = DB::table('tempat_ibadahs')->where('id_ibadah', $id_ibadah)->first(); 

    if($tibadahs->foto != 'no image.jpg'){
    Storage::delete('public/img_tibadah/'.$tibadahs->foto);
    }
    $tibadahs =    DB::delete('DELETE FROM tempat_ibadahs WHERE id_ibadah = ?' , [$id_ibadah]);
// ==================================================================================
        // Storage::delete('$image');
        return redirect('/tibadah')->with('delete', 'Data Tempat Ibadah telah berhasil dihapus');
    }


    public function import_tibadah()
    {
        
        Excel::load(Input::file('csv_file'), function($tibadahs){
            $tibadahs->each(function ($sheet){
            Tni::firstOrCreate($sheet->toArray());
            return $sheet;
            });
        });

        return redirect('/tibadah');
    }
}
