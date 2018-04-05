<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\models\Komunitas;
use Excel;
use Response;

class KomunitasController extends Controller
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
         // $komunitass = Komunitas::orderBy('id_komunitas','dsc')->paginate(5);
         $komunitass = DB::table('komunitass')->orderBy('id_komunitas','dsc')->get();
        return view('pages/instansi/komunitas', compact('komunitass'));
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
            'nama_komunitas'            => 'required',
            'deskripsi_komunitas'       => 'required',
            'alamat_komunitas'          => 'required',
            'kontak_komunitas'          => 'required',
            'kategori_komunitas'        => 'required',
            'email_komunitas'           => 'required',
            'note_komunitas'            => 'required',
            'foto_komunitas'            => 'image|nullable|max:1999'
        ]);
// // =======================================================
// 
        
         // $partner = Komunitas::all()->random()->id_komunitas;
// ===========================================================
        

        if($request->hasFile('foto_komunitas')){
          //get filename and extension_loaded
          $filenameWithExt = $request->file('foto_komunitas')->getClientOriginalName();
          //get just filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //get just extends
          $extension = $request->file('foto_komunitas')->getClientOriginalExtension();
          //file name to Store(membuat yg aploud gambar mempunyai nama unik tersendiri)
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
          //upload the ImagickPixel
          $path = $request->file('foto_komunitas')->storeAs('public/img_komunitas', $fileNameToStore);
        } else {
          $fileNameToStore = 'no image.jpg';
        }

// =======================================================
        DB::table('komunitass')->insert([
            'nama_komunitas'            => $request->nama_komunitas,
            'deskripsi_komunitas'       => $request->deskripsi_komunitas,
            'alamat_komunitas'          => $request->alamat_komunitas,
            'kontak_komunitas'          => $request->kontak_komunitas,
            'kategori_komunitas'        => $request->kategori_komunitas,
            'email_komunitas'           => $request->email_komunitas,
            'note_komunitas'            => $request->note_komunitas,
            'id_partner'                => rand(1,999),
            'foto_komunitas'            => $fileNameToStore      

        ]);
          

          return redirect('/komunitas');

    }


    public function update(Request $request, $id_komunitas)
    {
         $this->validate($request, [
            'nama_komunitas'            => 'required',
            'deskripsi_komunitas'       => 'required',
            'alamat_komunitas'          => 'required',
            'kontak_komunitas'          => 'required',
            'kategori_komunitas'        => 'required',
            'email_komunitas'           => 'required',
            'note_komunitas'            => 'required',
            'foto_komunitas'            => 'image|nullable|max:1999'
        ]);
// // =======================================================



        if($request->hasFile('foto_komunitas')){
          //get filename and extension_loaded
          $filenameWithExt = $request->file('foto_komunitas')->getClientOriginalName();
          //get just filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //get just extends
          $extension = $request->file('foto_komunitas')->getClientOriginalExtension();
          //file name to Store(membuat yg aploud gambar mempunyai nama unik tersendiri)
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
          //upload the ImagickPixel
          $path = $request->file('foto_komunitas')->storeAs('public/img_komunitas', $fileNameToStore);
        } 
// =======================================================

       $komunitas = DB::table('komunitass')->where('id_komunitas', $id_komunitas)->first();
       if($request->hasFile('foto_komunitas')){

            if($komunitas->foto_komunitas != 'no image.jpg'){
            Storage::delete('public/img_komunitas/'.$komunitas->foto_komunitas);
            $komunitas->foto_komunitas = $fileNameToStore;
            }
        DB::table('komunitass')
            ->where('id_komunitas', $id_komunitas)
            ->update([  
            'nama_komunitas'            => $request->nama_komunitas,
            'deskripsi_komunitas'       => $request->deskripsi_komunitas,
            'alamat_komunitas'          => $request->alamat_komunitas,
            'kontak_komunitas'          => $request->kontak_komunitas,
            'kategori_komunitas'        => $request->kategori_komunitas,
            'email_komunitas'           => $request->email_komunitas,
            'note_komunitas'            => $request->note_komunitas,
            'foto_komunitas'            => $fileNameToStore    
                    ]);

        }

        else{

            DB::table('komunitass')
            ->where('id_komunitas', $id_komunitas)
            ->update([  
            'nama_komunitas'            => $request->nama_komunitas,
            'deskripsi_komunitas'       => $request->deskripsi_komunitas,
            'alamat_komunitas'          => $request->alamat_komunitas,
            'kontak_komunitas'          => $request->kontak_komunitas,
            'kategori_komunitas'        => $request->kategori_komunitas,
            'email_komunitas'           => $request->email_komunitas,
            'note_komunitas'            => $request->note_komunitas,
                    ]);
            }

        return redirect('/komunitas')->with('success', 'Data komunitas berhasil diubah');
    }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
    public function destroy($id_komunitas)
    {
    $komunitass = DB::table('komunitass')->where('id_komunitas', $id_komunitas)->first();

    if($komunitass->foto_komunitas != 'no image.jpg'){
    Storage::delete('public/img_komunitas/'.$komunitass->foto_komunitas);
    }
    $komunitass =    DB::delete('DELETE FROM komunitass WHERE id_komunitas = ?' , [$id_komunitas]);
// ==================================================================================
        // Storage::delete('$image');
        return redirect('/komunitas')->with('delete', 'Data komunitas telah berhasil dihapus');
    }


    public function import_komunitas()
    {
        
        Excel::load(Input::file('csv_file'), function($komunitass){
            $komunitass->each(function ($sheet){
            Komunitas::firstOrCreate($sheet->toArray());
            return $sheet;
            });
        });

        return redirect('/komunitas');
    }
}
