<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\models\Slb;
use Excel;
use Response;

class SlbController extends Controller
{

  public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // $slbs = Slb::orderBy('id_slb','dsc')->paginate(5);
         $slbs = DB::table('pendidikan_khususs')->orderBy('id_slb','dsc')->get();
        return view('pages/instansi/slb', compact('slbs'));
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
            'foto_slb'              => 'image|nullable|max:1999'
        ]);
// // =======================================================
// 
        
// 
// ===========================================================
        $idslb = '8';

        if($request->hasFile('foto_slb')){
          //get filename and extension_loaded
          $filenameWithExt = $request->file('foto_slb')->getClientOriginalName();
          //get just filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //get just extends
          $extension = $request->file('foto_slb')->getClientOriginalExtension();
          //file name to Store(membuat yg aploud gambar mempunyai nama unik tersendiri)
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
          //upload the ImagickPixel
          $path = $request->file('foto_slb')->storeAs('public/img_slb', $fileNameToStore);
        } else {
          $fileNameToStore = 'no image.jpg';
        }

// =======================================================
        DB::table('pendidikan_khususs')->insert([
            'nama_tempat'          => $request->nama_tempat,
            'gambaran_umum'   => $request->gambaran_umum,
            'alamat'            => $request->alamat,
            'no_telp'               => $request->no_telp,
            'jam_operasional' => $request->jam_operasional,
            'koordinat'           => $request->koordinat,
            'kecamatan'       => $request->kecamatan,
            'website'           => $request->website,
            'id_data'               => $idslb,
            'sumber'            => $request->sumber,
            'foto_slb'                => $fileNameToStore      

        ]);
          

          return redirect('/slb');

    }


    public function update(Request $request, $id_slb)
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
            'foto_slb'         => 'image|nullable|max:1999'
        ]);
// // =======================================================



        if($request->hasFile('foto_slb')){
          //get filename and extension_loaded
          $filenameWithExt = $request->file('foto_slb')->getClientOriginalName();
          //get just filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //get just extends
          $extension = $request->file('foto_slb')->getClientOriginalExtension();
          //file name to Store(membuat yg aploud gambar mempunyai nama unik tersendiri)
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
          //upload the ImagickPixel
          $path = $request->file('foto_slb')->storeAs('public/img_slb', $fileNameToStore);
        } 
// =======================================================

       $slb = DB::table('pendidikan_khususs')->where('id_slb', $id_slb)->first(); 
       if($request->hasFile('foto_slb')){

            if($slb->foto_slb != 'no image.jpg'){
            Storage::delete('public/img_slb/'.$slb->foto_slb);
            $slb->foto_slb = $fileNameToStore;
            }
        DB::table('pendidikan_khususs')
            ->where('id_slb', $id_slb)
            ->update([  
                    'nama_tempat'       => $request->nama_tempat,
                    'gambaran_umum'     => $request->gambaran_umum,
                    'alamat'            => $request->alamat,
                    'no_telp'           => $request->no_telp,
                    'jam_operasional'   => $request->jam_operasional,
                    'koordinat'         => $request->koordinat,
                    'kecamatan'         => $request->kecamatan,
                    'website'           => $request->website,
                    'sumber'            => $request->sumber,
                    'foto_slb'          => $fileNameToStore 
                    ]);

        }

        else{

            DB::table('pendidikan_khususs')
            ->where('id_slb', $id_slb)
            ->update([  
                    'nama_tempat'       => $request->nama_tempat,
                    'gambaran_umum'     => $request->gambaran_umum,
                    'alamat'            => $request->alamat,
                    'no_telp'           => $request->no_telp,
                    'jam_operasional'   => $request->jam_operasional,
                    'koordinat'         => $request->koordinat,
                    'kecamatan'         => $request->kecamatan,
                    'sumber'            => $request->sumber,
                    'website'           => $request->website,
                    ]);
            }

        return redirect('/slb')->with('success', 'Data SLB berhasil diubah');
    }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
    public function destroy($id_slb)
    {
    $slbs = DB::table('pendidikan_khususs')->where('id_slb', $id_slb)->first(); 

    if($slbs->foto_slb != 'no image.jpg'){
    Storage::delete('public/img_slb/'.$slbs->foto_slb);
    }
    $slbs =    DB::delete('DELETE FROM pendidikan_khususs WHERE id_slb = ?' , [$id_slb]);
// ==================================================================================
        // Storage::delete('$image');
        return redirect('/slb')->with('delete', 'Data SLB telah berhasil dihapus');
    }


    public function import_slb()
    {
        
        Excel::load(Input::file('csv_file'), function($slbs){
            $slbs->each(function ($sheet){
            Slb::firstOrCreate($sheet->toArray());
            return $sheet;
            });
        });

        return redirect('/slb');
    }


}
