<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\models\Perpus;
use Excel;
use Response;

class PerpusController extends Controller
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
         // $perpuss = Perpus::orderBy('id_perpustakaan','dsc')->paginate(5);
         $perpuss = DB::table('perpustakaans')->orderBy('id_perpustakaan','dsc')->get();
        return view('pages/instansi/perpus', compact('perpuss'));
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
            'foto_perpustakaan'     => 'image|nullable|max:1999'
        ]);
// // =======================================================
// 
       
// 
// ===========================================================
        $idperpus = '12';

        if($request->hasFile('foto_perpustakaan')){
          //get filename and extension_loaded
          $filenameWithExt = $request->file('foto_perpustakaan')->getClientOriginalName();
          //get just filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //get just extends
          $extension = $request->file('foto_perpustakaan')->getClientOriginalExtension();
          //file name to Store(membuat yg aploud gambar mempunyai nama unik tersendiri)
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
          //upload the ImagickPixel
          $path = $request->file('foto_perpustakaan')->storeAs('public/img_perpus', $fileNameToStore);
        } else {
          $fileNameToStore = 'no image.jpg';
        }

// =======================================================
        DB::table('perpustakaans')->insert([
            'nama_tempat'           => $request->nama_tempat,
            'gambaran_umum'         => $request->gambaran_umum,
            'alamat'                => $request->alamat,
            'no_telp'               => $request->no_telp,
            'jam_operasional'       => $request->jam_operasional,
            'koordinat'             => $request->koordinat,
            'kecamatan'             => $request->kecamatan,
            'website'               => $request->website,
            'sumber'          => $request->sumber,
            'id_data'               => $idperpus,
            'foto_perpustakaan'     => $fileNameToStore      

        ]);
          

          return redirect('/perpus');

    }


    public function update(Request $request, $id_perpustakaan)
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
            'foto_perpustakaan' => 'image|nullable|max:1999'
        ]);
// // =======================================================



        if($request->hasFile('foto_perpustakaan')){
          //get filename and extension_loaded
          $filenameWithExt = $request->file('foto_perpustakaan')->getClientOriginalName();
          //get just filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //get just extends
          $extension = $request->file('foto_perpustakaan')->getClientOriginalExtension();
          //file name to Store(membuat yg aploud gambar mempunyai nama unik tersendiri)
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
          //upload the ImagickPixel
          $path = $request->file('foto_perpustakaan')->storeAs('public/img_perpus', $fileNameToStore);
        } 
// =======================================================
$perpus = DB::table('perpustakaans')->where('id_perpustakaan', $id_perpustakaan)->first();
       if($request->hasFile('foto_perpustakaan')){

            if($perpus->foto_perpustakaan != 'no image.jpg'){
            Storage::delete('public/img_perpus/'.$perpus->foto_perpustakaan);
            $perpus->foto_perpustakaan = $fileNameToStore;
            }
        DB::table('perpustakaans')
            ->where('id_perpustakaan', $id_perpustakaan)
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
                    'foto_perpustakaan' => $fileNameToStore 
                    ]);

        }

        else{

            DB::table('perpustakaans')
            ->where('id_perpustakaan', $id_perpustakaan)
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

        return redirect('/perpus')->with('success', 'Data Perpustakaan berhasil diubah');
    }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
    public function destroy($id_perpustakaan)
    {
      
$perpuss = DB::table('perpustakaans')->where('id_perpustakaan', $id_perpustakaan)->first();

    if($perpuss->foto_perpustakaan != 'no image.jpg'){
    Storage::delete('public/img_perpus/'.$perpuss->foto_perpustakaan);
    }
    $perpuss =    DB::delete('DELETE FROM perpustakaans WHERE id_perpustakaan = ?' , [$id_perpustakaan]);
// ==================================================================================
        // Storage::delete('$image');
        return redirect('/perpus')->with('delete', 'Data Perpustakaan telah berhasil dihapus');
    }


    public function import_perpus()
    {
        
        Excel::load(Input::file('csv_file'), function($perpuss){
            $perpuss->each(function ($sheet){
            Perpus::firstOrCreate($sheet->toArray());
            return $sheet;
            });
        });

        return redirect('/perpus');
    }
}
