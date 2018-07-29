<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\models\Mall;
use Excel;
use Response;

class MallController extends Controller
{

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // $malls = Mall::orderBy('id_mall','dsc')->paginate(5);
         $malls = DB::table('malls')->orderBy('id_mall','dsc')->get();
        return view('pages/instansi/mall', compact('malls'));
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
        $idmall = '13';

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
          $path = $request->file('foto')->storeAs('public/img_mall', $fileNameToStore);
        } else {
          $fileNameToStore = 'no image.jpg';
        }

// =======================================================
        DB::table('malls')->insert([
            'nama_tempat'           => $request->nama_tempat,
            'gambaran_umum'         => $request->gambaran_umum,
            'alamat'                => $request->alamat,
            'no_telp'               => $request->no_telp,
            'jam_operasional'       => $request->jam_operasional,
            'koordinat'             => $request->koordinat,
            'kecamatan'             => $request->kecamatan,
            'website'               => $request->website,
            'sumber'          => $request->sumber,
            'id_data'               => $idmall,
            'foto'     => $fileNameToStore      

        ]);
          

          return redirect('/mall');

    }


    public function update(Request $request, $id_mall)
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
          $path = $request->file('foto')->storeAs('public/img_mall', $fileNameToStore);
        } 
// =======================================================
      $mall = DB::table('malls')->where('id_mall', $id_mall)->first();
       if($request->hasFile('foto')){

            if($mall->foto != 'no image.jpg'){
            Storage::delete('public/img_mall/'.$mall->foto);
            $mall->foto = $fileNameToStore;
            }
        DB::table('malls')
            ->where('id_mall', $id_mall)
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

            DB::table('malls')
            ->where('id_mall', $id_mall)
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

        return redirect('/mall')->with('success', 'Data Mall berhasil diubah');
    }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
    public function destroy($id_mall)
    {
      
    $mall = DB::table('malls')->where('id_mall', $id_mall)->first();

    if($malls->foto != 'no image.jpg'){
    Storage::delete('public/img_mall/'.$malls->foto);
    }
    $malls =    DB::delete('DELETE FROM malls WHERE id_mall = ?' , [$id_mall]);
// ==================================================================================
        // Storage::delete('$image');
        return redirect('/mall')->with('delete', 'Data Mall telah berhasil dihapus');
    }


    public function import_mall()
    {
        
        Excel::load(Input::file('csv_file'), function($malls){
            $malls->each(function ($sheet){
            Mall::firstOrCreate($sheet->toArray());
            return $sheet;
            });
        });

        return redirect('/mall');
    }
}
