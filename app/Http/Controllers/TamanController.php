<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\models\Taman;
use Excel;
use Response;

class TamanController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // $tamans = Taman::orderBy('id_taman','dsc')->paginate(5);
         $tamans = DB::table('tamans')->orderBy('id_taman','dsc')->get();
        return view('pages/instansi/taman', compact('tamans'));
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
        $iddata = '26';

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
          $path = $request->file('foto')->storeAs('public/img_taman', $fileNameToStore);
        } else {
          $fileNameToStore = 'no image.jpg';
        }

// =======================================================
        DB::table('tamans')->insert([
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
          

          return redirect('/taman');

    }


    public function update(Request $request, $id_taman)
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
          $path = $request->file('foto')->storeAs('public/img_taman', $fileNameToStore);
        } 
// =======================================================
       $taman = DB::table('tamans')->where('id_taman', $id_taman)->first(); 
       if($request->hasFile('foto')){

            if($taman->foto != 'no image.jpg'){
            Storage::delete('public/img_taman/'.$taman->foto);
            $taman->foto = $fileNameToStore;
            }
        DB::table('tamans')
            ->where('id_taman', $id_taman)
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

            DB::table('tamans')
            ->where('id_taman', $id_taman)
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

        return redirect('/taman')->with('success', 'Data Taman berhasil diubah');
    }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
    public function destroy($id_taman)
    {
    $tamans = DB::table('tamans')->where('id_taman', $id_taman)->first(); 

    if($tamans->foto != 'no image.jpg'){
    Storage::delete('public/img_taman/'.$tamans->foto);
    }
    $tamans =    DB::delete('DELETE FROM tamans WHERE id_taman = ?' , [$id_taman]);
// ==================================================================================
        // Storage::delete('$image');
        return redirect('/taman')->with('delete', 'Data Taman telah berhasil dihapus');
    }


    public function import_taman()
    {
        
        Excel::load(Input::file('csv_file'), function($tamans){
            $tamans->each(function ($sheet){
            Taman::firstOrCreate($sheet->toArray());
            return $sheet;
            });
        });

        return redirect('/taman');
    }
}
