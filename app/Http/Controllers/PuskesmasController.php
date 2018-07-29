<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\models\Puskesmas;
use Excel;
use Response;

class PuskesmasController extends Controller
{


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // $puskesmass = Puskesmas::orderBy('id_puskesmas','dsc')->paginate(5);
         $puskesmass = DB::table('puskesmass')->orderBy('id_puskesmas','dsc')->get();
        return view('pages/instansi/puskesmas', compact('puskesmass'));
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
            'nama_tempat'   		=> 'required',
            'gambaran_umum' 		=> 'required',
            'alamat' 			    => 'required',
            'no_telp' 			  	=> 'required',
            'jam_operasional' 		=> 'required',
            'koordinat' 		  	=> 'required',
            'kecamatan' 		 	 => 'required',
            'website' 			  	=> 'required',
            'foto'         			=> 'image|nullable|max:1999'
        ]);
// // =======================================================
// 
        
// 
// ===========================================================
        $idpuskesmas = '4';

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
          $path = $request->file('foto')->storeAs('public/img_puskesmas', $fileNameToStore);
        } else {
          $fileNameToStore = 'no image.jpg';
        }

// =======================================================
        DB::table('puskesmass')->insert([
            'nama_tempat'		   	=> $request->nama_tempat,
            'gambaran_umum'   		=> $request->gambaran_umum,
            'alamat'        		=> $request->alamat,
            'no_telp'			    => $request->no_telp,
            'jam_operasional' 		=> $request->jam_operasional,
            'koordinat'			 	=> $request->koordinat,
            'kecamatan'       		=> $request->kecamatan,
            'website'        		=> $request->website,
            'sumber'            => $request->sumber,
            'id_data'			    => $idpuskesmas,
            'foto'      		  	=> $fileNameToStore      

        ]);
          

          return redirect('/puskesmas');

    }


    public function update(Request $request, $id_puskesmas)
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
          $path = $request->file('foto')->storeAs('public/img_puskesmas', $fileNameToStore);
        } 
// =======================================================

       $puskesmas = DB::table('puskesmass')->where('id_puskesmas', $id_puskesmas)->first(); 
       if($request->hasFile('foto')){

            if($puskesmas->foto != 'no image.jpg'){
            Storage::delete('public/img_puskesmas/'.$puskesmas->foto);
            $puskesmas->foto = $fileNameToStore;
            }
        DB::table('puskesmass')
            ->where('id_puskesmas', $id_puskesmas)
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
                    'foto'              => $fileNameToStore 
                    ]);

        }

        else{

            DB::table('puskesmass')
            ->where('id_puskesmas', $id_puskesmas)
            ->update([  
                    'nama_tempat'       => $request->nama_tempat,
                    'gambaran_umum'     => $request->gambaran_umum,
                    'alamat'            => $request->alamat,
                    'no_telp'           => $request->no_telp,
                    'jam_operasional'   => $request->jam_operasional,
                    'koordinat'         => $request->koordinat,
                    'kecamatan'         => $request->kecamatan,
                    'sumber'            => $request->sumber,
                    'website'           => $request->website
                    ]);
            }

        return redirect('/puskesmas')->with('success', 'Data Puskesmas berhasil diubah');
    }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
    public function destroy($id_puskesmas)
    {
     $puskesmass = DB::table('puskesmass')->where('id_puskesmas', $id_puskesmas)->first(); 

    if($puskesmass->foto != 'no image.jpg'){
    Storage::delete('public/img_puskesmas/'.$puskesmass->foto);
    }
    $puskesmass =    DB::delete('DELETE FROM puskesmass WHERE id_puskesmas = ?' , [$id_puskesmas]);
// ==================================================================================
        // Storage::delete('$image');
        return redirect('/puskesmas')->with('delete', 'Data Puskesmas telah berhasil dihapus');
    }


    public function import_puskesmas()
    {
        
        Excel::load(Input::file('csv_file'), function($puskesmass){
            $puskesmass->each(function ($sheet){
            Puskesmas::firstOrCreate($sheet->toArray());
            return $sheet;
            });
        });

        return redirect('/puskesmas');
    }


}
