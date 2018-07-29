<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\models\Pd;
use Excel;
use Response;

class PdController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // $pds = Pd::orderBy('id_pd','dsc')->paginate(5);
         $pds = DB::table('pendidikan_dasars')->orderBy('id_pd','dsc')->get();
        return view('pages/instansi/sd', compact('pds'));
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
            'foto_pd'             => 'image|nullable|max:1999'
        ]);
// // =======================================================

        $idpd = '7';

        if($request->hasFile('foto_pd')){
          //get filename and extension_loaded
          $filenameWithExt = $request->file('foto_pd')->getClientOriginalName();
          //get just filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //get just extends
          $extension = $request->file('foto_pd')->getClientOriginalExtension();
          //file name to Store(membuat yg aploud gambar mempunyai nama unik tersendiri)
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
          //upload the ImagickPixel
          $path = $request->file('foto_pd')->storeAs('public/img_pd', $fileNameToStore);
        } else {
          $fileNameToStore = 'no image.jpg';
        }

// =======================================================
        DB::table('pendidikan_dasars')->insert([
            'nama_tempat'           => $request->nama_tempat,
            'gambaran_umum'         => $request->gambaran_umum,
            'alamat'                => $request->alamat,
            'no_telp'               => $request->no_telp,
            'jam_operasional'       => $request->jam_operasional,
            'koordinat'             => $request->koordinat,
            'kecamatan'             => $request->kecamatan,
            'website'               => $request->website,
            'id_data'               => $idpd,
            'sumber'                => $request->sumber,
            'foto_pd'               => $fileNameToStore      

        ]);
          

          return redirect('/sd');

    }


    public function update(Request $request, $id_pd)
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
            'foto_pd'           => 'image|nullable|max:1999'
        ]);
// // =======================================================



        if($request->hasFile('foto_pd')){
          //get filename and extension_loaded
          $filenameWithExt = $request->file('foto_pd')->getClientOriginalName();
          //get just filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //get just extends
          $extension = $request->file('foto_pd')->getClientOriginalExtension();
          //file name to Store(membuat yg aploud gambar mempunyai nama unik tersendiri)
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
          //upload the ImagickPixel
          $path = $request->file('foto_pd')->storeAs('public/img_pd', $fileNameToStore);
        } 
// =======================================================
$pd = DB::table('pendidikan_dasars')->where('id_pd', $id_pd)->first();
       if($request->hasFile('foto_pd')){

            if($pd->foto_pd != 'no image.jpg'){
            Storage::delete('public/img_pd/'.$pd->foto_pd);
            $pd->foto_pd = $fileNameToStore;
            }
        DB::table('pendidikan_dasars')
            ->where('id_pd', $id_pd)
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
                    'foto_pd'           => $fileNameToStore 
                    ]);

        }

        else{

            DB::table('pendidikan_dasars')
            ->where('id_pd', $id_pd)
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

        return redirect('/sd')->with('success', 'Data Sekolah Dasar berhasil diubah');
    }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
    public function destroy($id_pd)
    {
$pds = DB::table('pendidikan_dasars')->where('id_pd', $id_pd)->first();

    if($pds->foto_pd != 'no image.jpg'){
    Storage::delete('public/img_pd/'.$pds->foto_pd);
    }
    $pds =    DB::delete('DELETE FROM pendidikan_dasars WHERE id_pd = ?' , [$id_pd]);
// ==================================================================================
        // Storage::delete('$image');
        return redirect('/sd')->with('delete', 'Data Sekolah Dasar telah berhasil dihapus');
    }


    public function import_pd()
    {
        
        Excel::load(Input::file('csv_file'), function($pds){
            $pds->each(function ($sheet){
            Pd::firstOrCreate($sheet->toArray());
            return $sheet;
            });
        });

        return redirect('/sd');
    }


}
