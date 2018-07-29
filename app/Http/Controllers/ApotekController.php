<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\models\Apotek;
use Excel;
use Response;

class ApotekController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $apoteks = DB::table('apoteks')->orderBy('id_apotek','dsc')->get();
        return view('pages/instansi/apotek', compact('apoteks'));
    }
// $apoteks = Apotek::orderBy('id_apotek','dsc')->get();
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
        $this->validate($request, [
            'nama_tempat'   	=> 'required',
            'gambaran_umum' 	=> 'required',
            'alamat' 			    => 'required',
            'no_telp' 			  => 'required',
            'jam_operasional' => 'required',
            'koordinat' 		  => 'required',
            'kecamatan' 		  => 'required',
            'website' 			  => 'required',
            'foto'         		=> 'image|nullable|max:1999'
        ]);
        $idapotek = '1';
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
          $path = $request->file('foto')->storeAs('public/img_apotek', $fileNameToStore);
        } else {
          $fileNameToStore = 'no image.jpg';
        }
        DB::table('apoteks')->insert([
            'nama_tempat'		   => $request->nama_tempat,
            'gambaran_umum'   => $request->gambaran_umum,
            'alamat'        	=> $request->alamat,
            'no_telp'			    => $request->no_telp,
            'jam_operasional' => $request->jam_operasional,
            'koordinat'			  => $request->koordinat,
            'kecamatan'       => $request->kecamatan,
            'website'         => $request->website,
            'sumber'        	=> $request->sumber,
            'id_data'			    => $idapotek,
            'foto'      		  => $fileNameToStore      

        ]);
          
          return redirect('/apotek');
    }


    public function update(Request $request, $id_apotek)
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
          $path = $request->file('foto')->storeAs('public/img_apotek', $fileNameToStore);
        } 
       
       $apotek = DB::table('apoteks')->where('id_apotek', $id_apotek)->first();
       // $apotek = Apotek::where('id_apotek', $id_apotek)->first(); 
       if($request->hasFile('foto')){

            if($apotek->foto != 'no image.jpg'){
            Storage::delete('public/img_apotek/'.$apotek->foto);
            $apotek->foto = $fileNameToStore;
            }
        DB::table('apoteks')
            ->where('id_apotek', $id_apotek)
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
            DB::table('apoteks')
            ->where('id_apotek', $id_apotek)
            ->update([  
                    'nama_tempat'       => $request->nama_tempat,
                    'gambaran_umum'     => $request->gambaran_umum,
                    'alamat'            => $request->alamat,
                    'no_telp'           => $request->no_telp,
                    'jam_operasional'   => $request->jam_operasional,
                    'koordinat'         => $request->koordinat,
                    'kecamatan'         => $request->kecamatan,
                    'website'           => $request->website,
                    'sumber'            => $request->sumber
                    ]);
            }
        return redirect('/apotek')->with('success', 'Data Apotek berhasil diubah');
    }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
    public function destroy($id_apotek)
    {
    $apoteks = DB::table('apoteks')->where('id_apotek', $id_apotek)->first();
    // $apoteks = Apotek::where('id_apotek', $id_apotek)->get()->first();
    
    if($apoteks->foto != 'no image.jpg')
      {
        Storage::delete('public/img_apotek/'.$apoteks->foto);
      }

    $apoteks =    DB::delete('DELETE FROM apoteks WHERE id_apotek = ?' , [$id_apotek]);
    return redirect('/apotek')->with('delete', 'Data Apotek telah berhasil dihapus');
    }


    public function import_apotek()
    {
        Excel::load(Input::file('csv_file'), function($apoteks){
            $apoteks->each(function ($sheet){
            Apotek::firstOrCreate($sheet->toArray());
            return $sheet;
            });
        });
     return redirect('/apotek');
    }
}
