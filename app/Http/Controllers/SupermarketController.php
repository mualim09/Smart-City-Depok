<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\models\Supermarket;
use Excel;
use Response;

class SupermarketController extends Controller
{

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // $supermarkets = Supermarket::orderBy('id_supermarket','dsc')->paginate(5);
         $supermarkets = DB::table('supermarkets')->orderBy('id_supermarket','dsc')->get();
        return view('pages/instansi/supermarket', compact('supermarkets'));
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
        $idsupermarket = '14';

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
          $path = $request->file('foto')->storeAs('public/img_supermarket', $fileNameToStore);
        } else {
          $fileNameToStore = 'no image.jpg';
        }

// =======================================================
        DB::table('supermarkets')->insert([
            'nama_tempat'           => $request->nama_tempat,
            'gambaran_umum'         => $request->gambaran_umum,
            'alamat'                => $request->alamat,
            'no_telp'               => $request->no_telp,
            'jam_operasional'       => $request->jam_operasional,
            'koordinat'             => $request->koordinat,
            'kecamatan'             => $request->kecamatan,
            'website'               => $request->website,
            'sumber'          => $request->sumber,
            'id_data'               => $idsupermarket,
            'foto'     => $fileNameToStore      

        ]);
          

          return redirect('/supermarket');

    }


    public function update(Request $request, $id_supermarket)
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
          $path = $request->file('foto')->storeAs('public/img_supermarket', $fileNameToStore);
        } 
// =======================================================

       $supermarket = DB::table('supermarkets')->where('id_supermarket', $id_supermarket)->first(); 
       if($request->hasFile('foto')){

            if($supermarket->foto != 'no image.jpg'){
            Storage::delete('public/img_supermarket/'.$supermarket->foto);
            $supermarket->foto = $fileNameToStore;
            }
        DB::table('supermarkets')
            ->where('id_supermarket', $id_supermarket)
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
                    'foto'              => $fileNameToStore 
                    ]);

        }

        else{

            DB::table('supermarkets')
            ->where('id_supermarket', $id_supermarket)
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

        return redirect('/supermarket')->with('success', 'Data Supermarket berhasil diubah');
    }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
    public function destroy($id_supermarket)
    {
    $supermarkets = DB::table('supermarkets')->where('id_supermarket', $id_supermarket)->first(); 

    if($supermarkets->foto != 'no image.jpg'){
    Storage::delete('public/img_supermarket/'.$supermarkets->foto);
    }
    $supermarkets =    DB::delete('DELETE FROM supermarkets WHERE id_supermarket = ?' , [$id_supermarket]);
// ==================================================================================
        // Storage::delete('$image');
        return redirect('/supermarket')->with('delete', 'Data Mall telah berhasil dihapus');
    }


    public function import_supermarket()
    {
        
        Excel::load(Input::file('csv_file'), function($supermarkets){
            $supermarkets->each(function ($sheet){
            Supermarket::firstOrCreate($sheet->toArray());
            return $sheet;
            });
        });

        return redirect('/supermarket');
    }
}
