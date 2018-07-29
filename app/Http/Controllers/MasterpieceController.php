<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\models\Masterpiece;
use Excel;
use Response;
use DateTime;


class MasterpieceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $masterpieces = DB::table('penghargaans')
    ->where('status', '=', 'diterima')->get();         
    return view('masterpiece/museum', compact('masterpieces'));
    }

    public function index_status()
    {
    $masterpieces = DB::table('penghargaans')
    ->where('status', '=', 'diproses')->get(); 
    return view('/masterpiece.karya', ['masterpieces' => $masterpieces]);
    }
    public function index_accept()
    {
    $masterpiecess = DB::table('penghargaans')
    ->where('status', '=', 'diterima')->get();
    return view('/masterpiece.karyaaccept', ['masterpiecess' => $masterpiecess]);
    }
    public function index_reject()
    {
    $masterpiecesss = DB::table('penghargaans')
    ->where('status', '=', 'ditolak')->get();
    return view('/masterpiece.karyareject', ['masterpiecesss' => $masterpiecesss]);
    }



// ==============================================================================================
    public function accept(Request $request, $id_penghargaan)
    {
       $this->validate($request, [
            'status'         => 'required'
        ]);
         DB::table('penghargaans')
            ->where('id_penghargaan', $id_penghargaan)
            ->update([  
                    'status'   => $request->status
                    ]);
            return redirect('/karya');
    }
    
         

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//     public function create()
//     {
//         return view('pages/inputdata');
//     }

//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_peraih'         => 'required',
            'nama_prestasi'       => 'required',
            'instansi'            => 'required',
            'deskripsi'           => 'required',
            'tingkat'             => 'required',
            'kategori'            => 'required',
            'riwayat'             => 'required',
            'keterangan'          => 'required',
            'image'               => 'image|nullable|max:1999'
        ]);
        $status = 'diterima';
        $now = new DateTime();
        if($request->hasFile('image')){
          //get filename and extension_loaded
          $filenameWithExt = $request->file('image')->getClientOriginalName();
          //get just filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //get just extends
          $extension = $request->file('image')->getClientOriginalExtension();
          //file name to Store(membuat yg aploud gambar mempunyai nama unik tersendiri)
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
          //upload the ImagickPixel
          $path = $request->file('image')->storeAs('public/img_masterpiece', $fileNameToStore);
        } else {
          $fileNameToStore = 'no image.jpg';
        }
        DB::table('penghargaans')->insert([
            'nama_peraih'   => $request->nama_peraih,
            'nama_prestasi' => $request->nama_prestasi,
            'instansi'      => $request->instansi,
            'deskripsi'     => $request->deskripsi,
            'tingkat'       => $request->tingkat,
            'tgl_post'      => $now,
            'kategori'      => $request->kategori,
            'riwayat'       => $request->riwayat,
            'keterangan'    => $request->keterangan,
            'status'        => $status,
            'image'         => $fileNameToStore      

        ]);
          return redirect('/museum');
    }


    public function update(Request $request, $id_penghargaan)
    {
         $this->validate($request, [
            'nama_peraih'         => 'required',
            'nama_prestasi'       => 'required',
            'instansi'            => 'required',
            'deskripsi'           => 'required',
            'tingkat'             => 'required',
            'kategori'            => 'required',
            'riwayat'             => 'required',
            'keterangan'          => 'required',
            'image'               => 'image|nullable|max:1999'
        ]);

    $now = new DateTime();
  if($request->hasFile('image')){
 
          $filenameWithExt = $request->file('image')->getClientOriginalName();
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          $extension = $request->file('image')->getClientOriginalExtension();
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
          $path = $request->file('image')->storeAs('public/img_masterpiece', $fileNameToStore);
        } 
       $masterpiece = DB::table('penghargaans')->where('id_penghargaan', $id_penghargaan)->first();
       if($request->hasFile('image')){
            if($masterpiece->image != 'no image.jpg'){
            Storage::delete('public/img_masterpiece/'.$masterpiece->image);
            $masterpiece->image = $fileNameToStore;
            }
        DB::table('penghargaans')
            ->where('id_penghargaan', $id_penghargaan)
            ->update([  
                    'nama_peraih'   => $request->nama_peraih,
                    'nama_prestasi' => $request->nama_prestasi,
                    'instansi'      => $request->instansi,
                    'deskripsi'     => $request->deskripsi,
                    'tingkat'       => $request->tingkat,
                    'tgl_post'      => $now,
                    'kategori'      => $request->kategori,
                    'riwayat'       => $request->riwayat,
                    'keterangan'    => $request->keterangan,
                    'image'         => $fileNameToStore
                    ]);
        }
        else{

            DB::table('penghargaans')
            ->where('id_penghargaan', $id_penghargaan)
            ->update([  
                    'nama_peraih'   => $request->nama_peraih,
                    'nama_prestasi' => $request->nama_prestasi,
                    'instansi'      => $request->instansi,
                    'deskripsi'     => $request->deskripsi,
                    'tingkat'       => $request->tingkat,
                    'tgl_post'      => $now,
                    'kategori'      => $request->kategori,
                    'riwayat'       => $request->riwayat,
                    'keterangan'    => $request->keterangan,
                    ]);
            }
        return redirect('/museum')->with('success', 'Data penghargaan berhasil diubah');
    }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
    public function destroy($id_penghargaan)
    { 
       $penghargaans = DB::table('penghargaans')->where('id_penghargaan', $id_penghargaan)->first();
    
    if($penghargaans->image != 'no image.jpg'){
    Storage::delete('public/img_masterpiece/'.$penghargaans->image);}
    $penghargaans =    DB::delete('DELETE FROM penghargaans WHERE id_penghargaan = ?' , [$id_penghargaan]);
    return redirect('/museum')->with('delete', 'Data Penghargaan telah berhasil dihapus');
    }


    public function import_museum()
    {
        
        Excel::load(Input::file('csv_file'), function($penghargaans){
            $penghargaans->each(function ($sheet){
            Masterpiece::firstOrCreate($sheet->toArray());
            return $sheet;
            });
        });

        return redirect('/museum');
    }


    public function chart()
    {
        
        $penghargaans = DB::table('penghargaans')->get();

    return view('/dashboard', compact('penghargaans'));
    }
}
