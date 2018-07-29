<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\models\Pospolisi;
use Excel;
use Response;

class PospolisiController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // $pospolisis = Pospolisi::orderBy('id_polisi','dsc')->paginate(5);
         $pospolisis = DB::table('pos_polisis')->orderBy('id_polisi','dsc')->get();
        return view('pages/instansi/pospolisi', compact('pospolisis'));
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
        $iddata = '31';

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
          $path = $request->file('foto')->storeAs('public/img_pospolisi', $fileNameToStore);
        } else {
          $fileNameToStore = 'no image.jpg';
        }

// =======================================================
        DB::table('pos_polisis')->insert([
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
          

          return redirect('/pospolisi');

    }


    public function update(Request $request, $id_polisi)
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
          $path = $request->file('foto')->storeAs('public/img_pospolisi', $fileNameToStore);
        } 
// =======================================================
       $pospolisi = DB::table('pos_polisis')->where('id_polisi', $id_polisi)->first(); 
       if($request->hasFile('foto')){

            if($pospolisi->foto != 'no image.jpg'){
            Storage::delete('public/img_pospolisi/'.$pospolisi->foto);
            $pospolisi->foto = $fileNameToStore;
            }
        DB::table('pos_polisis')
            ->where('id_polisi', $id_polisi)
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

            DB::table('pos_polisis')
            ->where('id_polisi', $id_polisi)
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

        return redirect('/pospolisi')->with('success', 'Data Pos Polisi berhasil diubah');
    }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
    public function destroy($id_polisi)
    {
    $pospolisis = DB::table('pos_polisis')->where('id_polisi', $id_polisi)->first(); 

    if($pospolisis->foto != 'no image.jpg'){
    Storage::delete('public/img_pospolisi/'.$pospolisis->foto);
    }
    $pospolisis =    DB::delete('DELETE FROM pos_polisis WHERE id_polisi = ?' , [$id_polisi]);
// ==================================================================================
        // Storage::delete('$image');
        return redirect('/pospolisi')->with('delete', 'Data Pos Polisi telah berhasil dihapus');
    }


    public function import_pospolisi()
    {
        
        Excel::load(Input::file('csv_file'), function($pospolisis){
            $pospolisis->each(function ($sheet){
            Pospolisi::firstOrCreate($sheet->toArray());
            return $sheet;
            });
        });

        return redirect('/pospolisi');
    }
}
