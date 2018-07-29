<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\models\Kuliner;
use Excel;
use Response;

class KulinerController extends Controller
{

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // $kuliners = Kuliner::orderBy('id_kuliner','dsc')->paginate(5);
        $kuliners = DB::table('kuliners')->orderBy('id_kuliner','dsc')->get();
        return view('pages/instansi/kuliner', compact('kuliners'));
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
        $idkuliner = '19';

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
          $path = $request->file('foto')->storeAs('public/img_kuliner', $fileNameToStore);
        } else {
          $fileNameToStore = 'no image.jpg';
        }

// =======================================================
        DB::table('kuliners')->insert([
            'nama_tempat'           => $request->nama_tempat,
            'gambaran_umum'         => $request->gambaran_umum,
            'alamat'                => $request->alamat,
            'no_telp'               => $request->no_telp,
            'jam_operasional'       => $request->jam_operasional,
            'koordinat'             => $request->koordinat,
            'kecamatan'             => $request->kecamatan,
            'website'               => $request->website,
            'sumber'          => $request->sumber,
            'id_data'               => $idkuliner,
            'foto'     => $fileNameToStore      

        ]);
          

          return redirect('/kuliner');

    }


    public function update(Request $request, $id_kuliner)
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
          $path = $request->file('foto')->storeAs('public/img_kuliner', $fileNameToStore);
        } 
// =======================================================

       $kuliner = DB::table('kuliners')->where('id_kuliner', $id_kuliner)->first();
       if($request->hasFile('foto')){

            if($kuliner->foto != 'no image.jpg'){
            Storage::delete('public/img_kuliner/'.$kuliner->foto);
            $kuliner->foto = $fileNameToStore;
            }
        DB::table('kuliners')
            ->where('id_kuliner', $id_kuliner)
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

            DB::table('kuliners')
            ->where('id_kuliner', $id_kuliner)
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

        return redirect('/kuliner')->with('success', 'Data Kuliner berhasil diubah');
    }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
    public function destroy($id_kuliner)
    {
      
    $kuliners = DB::table('kuliners')->where('id_kuliner', $id_kuliner)->first();

    if($kuliners->foto != 'no image.jpg'){
    Storage::delete('public/img_kuliner/'.$kuliners->foto);
    }
    $kuliners =    DB::delete('DELETE FROM kuliners WHERE id_kuliner = ?' , [$id_kuliner]);
// ==================================================================================
        // Storage::delete('$image');
        return redirect('/kuliner')->with('delete', 'Data Kuliner telah berhasil dihapus');
    }


    public function import_kuliner()
    {
        
        Excel::load(Input::file('csv_file'), function($kuliners){
            $kuliners->each(function ($sheet){
            Kuliner::firstOrCreate($sheet->toArray());
            return $sheet;
            });
        });

        return redirect('/kuliner');
    }
}
