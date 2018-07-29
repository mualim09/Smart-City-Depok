<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\models\Kelurahan;
use Excel;
use Response;

class KelurahanController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // $kelurahans =Kelurahan::orderBy('id_kelurahan','dsc')->paginate(5);
        $kelurahans = DB::table('kelurahans')->orderBy('id_kelurahan','dsc')->get();
        return view('pages/instansi/kelurahan', compact('kelurahans'));
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
            'kelurahan'                 => 'required',
            'gambaran_umum'             => 'required',
            'alamat'                    => 'required',
            'lurah'                     => 'required',
            'no_telp'                   => 'required',
            'kecamatan'                 => 'required',
            'koordinat'                 => 'required',
            'website'                   => 'required',
            'foto_kelurahan'            => 'image|nullable|max:1999'
        ]);
// // =======================================================
// 
        $iddata= 27;

        if($request->hasFile('foto_kelurahan')){
          //get filename and extension_loaded
          $filenameWithExt = $request->file('foto_kelurahan')->getClientOriginalName();
          //get just filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //get just extends
          $extension = $request->file('foto_kelurahan')->getClientOriginalExtension();
          //file name to Store(membuat yg aploud gambar mempunyai nama unik tersendiri)
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
          //upload the ImagickPixel
          $path = $request->file('foto_kelurahan')->storeAs('public/img_kelurahan', $fileNameToStore);
        } else {
          $fileNameToStore = 'no image.jpg';
        }

// =======================================================
        DB::table('kelurahans')->insert([
            'kelurahan'                     => $request->kelurahan,
            'gambaran_umum'                 => $request->gambaran_umum,
            'alamat'                        => $request->alamat,
            'lurah'                         => $request->lurah,
            'no_telp'                       => $request->no_telp,
            'kecamatan'                     => $request->kecamatan,
            'koordinat'                     => $request->koordinat,
            'id_data'                       => $iddata,
            'website'                       => $request->website,
            'sumber'            => $request->sumber,
            'foto_kelurahan'                => $fileNameToStore      

        ]);
          

          return redirect('/kelurahan');

    }


    public function update(Request $request, $id_kelurahan)
    {
         $this->validate($request, [
            'kelurahan'                 => 'required',
            'gambaran_umum'             => 'required',
            'alamat'                    => 'required',
            'lurah'                     => 'required',
            'no_telp'                   => 'required',
            'kecamatan'                 => 'required',
            'koordinat'                 => 'required',
            'website'                   => 'required',
            'foto_kelurahan'            => 'image|nullable|max:1999'
        ]);
// // =======================================================



        if($request->hasFile('foto_kelurahan')){
          //get filename and extension_loaded
          $filenameWithExt = $request->file('foto_kelurahan')->getClientOriginalName();
          //get just filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //get just extends
          $extension = $request->file('foto_kelurahan')->getClientOriginalExtension();
          //file name to Store(membuat yg aploud gambar mempunyai nama unik tersendiri)
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
          //upload the ImagickPixel
          $path = $request->file('foto_kelurahan')->storeAs('public/img_kelurahan', $fileNameToStore);
        } 
// =======================================================
       $kelurahan = DB::table('kelurahans')->where('id_kelurahan', $id_kelurahan)->first();

       if($request->hasFile('foto_kelurahan')){

            if($kelurahan->foto_kelurahan != 'no image.jpg'){
            Storage::delete('public/img_kelurahan/'.$kelurahan->foto_kelurahan);
            $kelurahan->foto_kelurahan = $fileNameToStore;
            }
        DB::table('kelurahans')
            ->where('id_kelurahan', $id_kelurahan)
            ->update([  
            'kelurahan'                     => $request->kelurahan,
            'gambaran_umum'                 => $request->gambaran_umum,
            'alamat'                        => $request->alamat,
            'lurah'                         => $request->lurah,
            'no_telp'                       => $request->no_telp,
            'kecamatan'                     => $request->kecamatan,
            'koordinat'                     => $request->koordinat,
            'website'                       => $request->website,
            'sumber'          => $request->sumber,
            'foto_kelurahan'                => $fileNameToStore    
                    ]);
        }

        else{
            DB::table('kelurahans')
            ->where('id_kelurahan', $id_kelurahan)
            ->update([  
            'kelurahan'                     => $request->kelurahan,
            'gambaran_umum'                 => $request->gambaran_umum,
            'alamat'                        => $request->alamat,
            'lurah'                         => $request->lurah,
            'no_telp'                       => $request->no_telp,
            'kecamatan'                     => $request->kecamatan,
            'koordinat'                     => $request->koordinat,
            'sumber'          => $request->sumber,
            'website'                       => $request->website
                    ]);
            }

        return redirect('/kelurahan')->with('success', 'Data Kelurahan berhasil diubah');
    }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
    public function destroy($id_kelurahan)
    {
    $kelurahans = DB::table('kelurahans')->where('id_kelurahan', $id_kelurahan)->first();
    
    if($kelurahans->foto_kelurahan != 'no image.jpg'){
    Storage::delete('public/img_kelurahan/'.$kelurahans->foto_kelurahan);
    }
    $kelurahans =    DB::delete('DELETE FROM kelurahans WHERE id_kelurahan = ?' , [$id_kelurahan]);
// ==================================================================================
        return redirect('/kelurahan')->with('delete', 'Data Kelurahan telah berhasil dihapus');
    }


    public function import_kelurahan()
    {
        
        Excel::load(Input::file('csv_file'), function($kelurahans){
            $kelurahans->each(function ($sheet){
           Kelurahan::firstOrCreate($sheet->toArray());
            return $sheet;
            });
        });

        return redirect('/kelurahan');
    }
}
