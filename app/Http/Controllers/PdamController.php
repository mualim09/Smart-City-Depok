<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\models\Pdam;
use Excel;
use Response;

class PdamController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // $pdams = Pdam::orderBy('id_pdam','dsc')->paginate(5);
         $pdams = DB::table('pdams')->orderBy('id_pdam','asc')->get();
        return view('pages/instansi/pdam', compact('pdams'));
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
        $iddata = '30';

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
          $path = $request->file('foto')->storeAs('public/img_pdam', $fileNameToStore);
        } else {
          $fileNameToStore = 'no image.jpg';
        }

// =======================================================
        DB::table('pdams')->insert([
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
          

          return redirect('/pdam');

    }


    public function update(Request $request, $id_pdam)
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
          $path = $request->file('foto')->storeAs('public/img_pdam', $fileNameToStore);
        } 
// =======================================================
$pdam = DB::table('pdams')->where('id_pdam', $id_pdam)->first();
       if($request->hasFile('foto')){

            if($pdam->foto != 'no image.jpg'){
            Storage::delete('public/img_pdam/'.$pdam->foto);
            $pdam->foto = $fileNameToStore;
            }
        DB::table('pdams')
            ->where('id_pdam', $id_pdam)
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

            DB::table('pdams')
            ->where('id_pdam', $id_pdam)
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

        return redirect('/pdam')->with('success', 'Data Pdam berhasil diubah');
    }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
    public function destroy($id_pdam)
    {
      
$pdams = DB::table('pdams')->where('id_pdam', $id_pdam)->first();

    if($pdams->foto != 'no image.jpg'){
    Storage::delete('public/img_pdam/'.$pdams->foto);
    }
    $pdams =    DB::delete('DELETE FROM pdams WHERE id_pdam = ?' , [$id_pdam]);
// ==================================================================================
        // Storage::delete('$image');
        return redirect('/pdam')->with('delete', 'Data Pdam telah berhasil dihapus');
    }


    public function import_pdam()
    {
        
        Excel::load(Input::file('csv_file'), function($pdams){
            $pdams->each(function ($sheet){
            Pdam::firstOrCreate($sheet->toArray());
            return $sheet;
            });
        });

        return redirect('/pdam');
    }
}
