<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\models\Sma;
use Excel;
use Response;

class SmaController extends Controller
{

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // $smas = Sma::orderBy('id_sma','dsc')->paginate(5);
         $smas = DB::table('smas')->orderBy('id_sma','dsc')->get();
        return view('pages/instansi/sma', compact('smas'));
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
            'alamat'                => 'required',
            'no_telp'             => 'required',
            'jam_operasional' => 'required',
            'koordinat'           => 'required',
            'kecamatan'           => 'required',
            'website'             => 'required',
            'foto_sma'              => 'image|nullable|max:1999'
        ]);
// // =======================================================
// 
       
// 
// ===========================================================
        $idsmp = '9';

        if($request->hasFile('foto_sma')){
          //get filename and extension_loaded
          $filenameWithExt = $request->file('foto_sma')->getClientOriginalName();
          //get just filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //get just extends
          $extension = $request->file('foto_sma')->getClientOriginalExtension();
          //file name to Store(membuat yg aploud gambar mempunyai nama unik tersendiri)
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
          //upload the ImagickPixel
          $path = $request->file('foto_sma')->storeAs('public/img_sma', $fileNameToStore);
        } else {
          $fileNameToStore = 'no image.jpg';
        }

// =======================================================
        DB::table('smas')->insert([
            'nama_tempat'          => $request->nama_tempat,
            'gambaran_umum'   => $request->gambaran_umum,
            'alamat'            => $request->alamat,
            'no_telp'               => $request->no_telp,
            'jam_operasional' => $request->jam_operasional,
            'koordinat'           => $request->koordinat,
            'kecamatan'       => $request->kecamatan,
            'website'           => $request->website,
            'id_data'               => $idsmp,
            'sumber'          => $request->sumber,
            'foto_sma'                => $fileNameToStore      

        ]);
          

          return redirect('/sma');

    }


    public function update(Request $request, $id_sma)
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
            'foto_sma'         => 'image|nullable|max:1999'
        ]);
// // =======================================================



        if($request->hasFile('foto_sma')){
          //get filename and extension_loaded
          $filenameWithExt = $request->file('foto_sma')->getClientOriginalName();
          //get just filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //get just extends
          $extension = $request->file('foto_sma')->getClientOriginalExtension();
          //file name to Store(membuat yg aploud gambar mempunyai nama unik tersendiri)
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
          //upload the ImagickPixel
          $path = $request->file('foto_sma')->storeAs('public/img_sma', $fileNameToStore);
        } 
// =======================================================

       $sma = DB::table('smas')->where('id_sma', $id_sma)->first(); 
       if($request->hasFile('foto_sma')){

            if($sma->foto_sma != 'no image.jpg'){
            Storage::delete('public/img_sma/'.$sma->foto_sma);
            $sma->foto_sma = $fileNameToStore;
            }
        DB::table('smas')
            ->where('id_sma', $id_sma)
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
                    'foto_sma'          => $fileNameToStore 
                    ]);

        }

        else{

            DB::table('smas')
            ->where('id_sma', $id_sma)
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

        return redirect('/sma')->with('success', 'Data smp berhasil diubah');
    }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
    public function destroy($id_sma)
    {
    $smas = DB::table('smas')->where('id_sma', $id_sma)->first(); 

    if($smas->foto_sma != 'no image.jpg'){
    Storage::delete('public/img_sma/'.$smas->foto_sma);
    }
    $smas =    DB::delete('DELETE FROM smas WHERE id_sma = ?' , [$id_sma]);
// ==================================================================================
        // Storage::delete('$image');
        return redirect('/sma')->with('delete', 'Data SMA telah berhasil dihapus');
    }


    public function import_sma()
    {
        
        Excel::load(Input::file('csv_file'), function($smas){
            $smas->each(function ($sheet){
            Sma::firstOrCreate($sheet->toArray());
            return $sheet;
            });
        });

        return redirect('/sma');
    }
}
