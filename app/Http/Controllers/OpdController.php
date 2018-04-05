<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Excel;
use Response;
use DateTime;

class OpdController extends Controller
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

        $opds = DB::table('content_opds')->orderBy('id_content','dsc')->get();
        return view('opd/opd', compact('opds'));
    }
// $apoteks = Apotek::orderBy('id_apotek','dsc')->get();
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'nama_tempat'       => 'required',
        //     'gambaran_umum'     => 'required',
        //     'alamat'                => 'required',
        //     'no_telp'             => 'required',
        //     'jam_operasional' => 'required',
        //     'koordinat'           => 'required',
        //     'kecamatan'           => 'required',
        //     'website'             => 'required',
        //     'foto'              => 'image|nullable|max:1999'
        // ]);
        // $idapotek = '1';
        // if($request->hasFile('foto')){
        //   //get filename and extension_loaded
        //   $filenameWithExt = $request->file('foto')->getClientOriginalName();
        //   //get just filename
        //   $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //   //get just extends
        //   $extension = $request->file('foto')->getClientOriginalExtension();
        //   //file name to Store(membuat yg aploud gambar mempunyai nama unik tersendiri)
        //   $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //   //upload the ImagickPixel
        //   $path = $request->file('foto')->storeAs('public/img_apotek', $fileNameToStore);
        // } else {
        //   $fileNameToStore = 'no image.jpg';
        // }
        // DB::table('apoteks')->insert([
        //     'nama_tempat'          => $request->nama_tempat,
        //     'gambaran_umum'   => $request->gambaran_umum,
        //     'alamat'            => $request->alamat,
        //     'no_telp'               => $request->no_telp,
        //     'jam_operasional' => $request->jam_operasional,
        //     'koordinat'           => $request->koordinat,
        //     'kecamatan'       => $request->kecamatan,
        //     'website'         => $request->website,
        //     'sumber'            => $request->sumber,
        //     'id_data'               => $idapotek,
        //     'foto'                => $fileNameToStore      

        // ]);
          
        //   return redirect('/apotek');
    }


    public function update(Request $request, $id_content)
    {
        $this->validate($request, [
            'judul'               => 'required',
            'isi_content'         => 'required', 
            'no_telp'             => 'required', 
            'alamat'              => 'required', 
            'website'             => 'required', 
            'id_opd'              => 'required', 
        ]);
// ==============================================d=============
        $now = new DateTime();
// =======================================================
        DB::table('content_opds')->insert([
            'judul'                 => $request->judul,
            'isi_content'           => $request->isi_content,
            'no_telp'               => $request->no_telp,
            'alamat'                => $request->alamat,
            'website'               => $request->website,
            'id_opd'                => $request->id_opd,
            'tgl_update'            => $now


        ]);
          return redirect('/opd');
    }
    

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
    public function destroy($id_content)
    {

    $opds =    DB::delete('DELETE FROM content_opds WHERE id_content = ?' , [$id_content]);
    return redirect('/opd')->with('delete', 'Data Opd telah berhasil dihapus');
    }


}
