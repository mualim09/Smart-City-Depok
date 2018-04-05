<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\models\Ukm;
use Excel;
use Response;

class UkmController extends Controller
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
         // $ukms = Ukm::orderBy('id_ukm','dsc')->paginate(5);
         $ukms = DB::table('ukms')->orderBy('id_ukm','dsc')->get();
        return view('pages/instansi/ukm', compact('ukms'));
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
            'nama_ukm'            => 'required',
            'nama_owner_ukm'      => 'required',
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
        $iddata = '16';

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
          $path = $request->file('foto')->storeAs('public/img_ukm', $fileNameToStore);
        } else {
          $fileNameToStore = 'no image.jpg';
        }

// =======================================================
        DB::table('ukms')->insert([
            'nama_ukm'          => $request->nama_ukm,
            'nama_owner_ukm'    => $request->nama_owner_ukm,
            'gambaran_umum'     => $request->gambaran_umum,
            'alamat'            => $request->alamat,
            'no_telp'           => $request->no_telp,
            'jam_operasional'   => $request->jam_operasional,
            'koordinat'         => $request->koordinat,
            'kecamatan'         => $request->kecamatan,
            'website'           => $request->website,
            'sumber'          => $request->sumber,
            'id_data'           => $iddata,
            'foto'              => $fileNameToStore      

        ]);
          

          return redirect('/ukm');

    }


    public function update(Request $request, $id_ukm)
    {
         $this->validate($request, [
            'nama_ukm'          => 'required',
            'nama_owner_ukm'    => 'required',
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
          $path = $request->file('foto')->storeAs('public/img_ukm', $fileNameToStore);
        } 
// =======================================================
       $ukm = DB::table('ukms')->where('id_ukm', $id_ukm)->first(); 
       if($request->hasFile('foto')){

            if($ukm->foto != 'no image.jpg'){
            Storage::delete('public/img_ukm/'.$ukm->foto);
            $ukm->foto = $fileNameToStore;
            }
        DB::table('ukms')
            ->where('id_ukm', $id_ukm)
            ->update([  
                    'nama_ukm'          => $request->nama_ukm,
                    'nama_owner_ukm'    => $request->nama_owner_ukm,
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

            DB::table('tpus')
            ->where('id_ukm', $id_ukm)
            ->update([  
                    'nama_ukm'       => $request->nama_ukm,
                    'nama_owner_ukm'    => $request->nama_owner_ukm,
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

        return redirect('/ukm')->with('success', 'Data UKM berhasil diubah');
    }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
    public function destroy($id_ukm)
    {
    $ukms = DB::table('ukms')->where('id_ukm', $id_ukm)->first(); 
 
    if($ukms->foto != 'no image.jpg'){
    Storage::delete('public/img_ukm/'.$ukms->foto);
    }
    $ukms =    DB::delete('DELETE FROM ukms WHERE id_ukm = ?' , [$id_ukm]);
// ==================================================================================
        // Storage::delete('$image');
        return redirect('/ukm')->with('delete', 'Data UKM telah berhasil dihapus');
    }


    public function import_ukm()
    {
        
        Excel::load(Input::file('csv_file'), function($ukms){
            $ukms->each(function ($sheet){
            Ukm::firstOrCreate($sheet->toArray());
            return $sheet;
            });
        });

        return redirect('/ukm');
    }
}
