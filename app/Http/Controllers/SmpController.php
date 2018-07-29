<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\models\Smp;
use Excel;
use Response;

class SmpController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // $smps = Smp::orderBy('id_smp','dsc')->paginate(5);
         $smps = DB::table('smps')->orderBy('id_smp','dsc')->get();
        return view('pages/instansi/smp', compact('smps'));
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
            'foto_smp'              => 'image|nullable|max:1999'
        ]);
// // =======================================================
// 
       
// 
// ===========================================================
        $idsmp = '7';

        if($request->hasFile('foto_smp')){
          //get filename and extension_loaded
          $filenameWithExt = $request->file('foto_smp')->getClientOriginalName();
          //get just filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //get just extends
          $extension = $request->file('foto_smp')->getClientOriginalExtension();
          //file name to Store(membuat yg aploud gambar mempunyai nama unik tersendiri)
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
          //upload the ImagickPixel
          $path = $request->file('foto_smp')->storeAs('public/img_smp', $fileNameToStore);
        } else {
          $fileNameToStore = 'no image.jpg';
        }

// =======================================================
        DB::table('smps')->insert([
            'nama_tempat'          => $request->nama_tempat,
            'gambaran_umum'   => $request->gambaran_umum,
            'alamat'            => $request->alamat,
            'no_telp'               => $request->no_telp,
            'jam_operasional' => $request->jam_operasional,
            'koordinat'           => $request->koordinat,
            'kecamatan'       => $request->kecamatan,
            'website'           => $request->website,
            'id_data'               => $idsmp,
            'sumber'            => $request->sumber,
            'foto_smp'                => $fileNameToStore      

        ]);
          

          return redirect('/smp');

    }


    public function update(Request $request, $id_smp)
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
            'foto_smp'         => 'image|nullable|max:1999'
        ]);
// // =======================================================



        if($request->hasFile('foto_smp')){
          //get filename and extension_loaded
          $filenameWithExt = $request->file('foto_smp')->getClientOriginalName();
          //get just filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //get just extends
          $extension = $request->file('foto_smp')->getClientOriginalExtension();
          //file name to Store(membuat yg aploud gambar mempunyai nama unik tersendiri)
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
          //upload the ImagickPixel
          $path = $request->file('foto_smp')->storeAs('public/img_smp', $fileNameToStore);
        } 
// =======================================================

       $smp = DB::table('smps')->where('id_smp', $id_smp)->first(); 
       if($request->hasFile('foto_smp')){

            if($smp->foto_smp != 'no image.jpg'){
            Storage::delete('public/img_smp/'.$smp->foto_smp);
            $smp->foto_smp = $fileNameToStore;
            }
        DB::table('smps')
            ->where('id_smp', $id_smp)
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
                    'foto_smp'          => $fileNameToStore 
                    ]);

        }

        else{

            DB::table('smps')
            ->where('id_smp', $id_smp)
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

        return redirect('/smp')->with('success', 'Data smp berhasil diubah');
    }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
    public function destroy($id_smp)
    {
    $smps = DB::table('smps')->where('id_smp', $id_smp)->first(); 

    if($smps->foto_smp != 'no image.jpg'){
    Storage::delete('public/img_smp/'.$smps->foto_smp);
    }
    $smps =    DB::delete('DELETE FROM smps WHERE id_smp = ?' , [$id_smp]);
// ==================================================================================
        // Storage::delete('$image');
        return redirect('/smp')->with('delete', 'Data smp telah berhasil dihapus');
    }


    public function import_smp()
    {
        
        Excel::load(Input::file('csv_file'), function($smps){
            $smps->each(function ($sheet){
            Smp::firstOrCreate($sheet->toArray());
            return $sheet;
            });
        });

        return redirect('/smp');
    }
}
