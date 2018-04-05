<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\models\Panti;
use Excel;
use Response;


class PantiController extends Controller
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
         // $pantis = Panti::orderBy('id_panti','dsc')->paginate(5);
         $pantis = DB::table('panti_asuhans')->orderBy('id_panti','dsc')->get();
        return view('pages/instansi/panti', compact('pantis'));
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
            'nama_panti'            => 'required',
            'nama_pj'               => 'required',
            'deskripsi'             => 'required',
            'alamat'                => 'required',
            'kontak'                => 'required',
            'kecamatan'             => 'required',
            'jumlah_anak'           => 'required',
            'jumlah_anak_angkat'    => 'required'
            
        ]);
// // =======================================================
// 
        
// 
// ===========================================================
        $iddata = '17';

// =======================================================
        DB::table('panti_asuhans')->insert([
            'nama_panti'            => $request->nama_panti,
            'nama_pj'               => $request->nama_pj,
            'deskripsi'             => $request->deskripsi,
            'alamat'                => $request->alamat,
            'kontak'                => $request->kontak,
            'kecamatan'             => $request->kecamatan,
            'jumlah_anak'           => $request->jumlah_anak,
            'jumlah_anak_angkat'    => $request->jumlah_anak_angkat,
            'sumber'            => $request->sumber,
            'id_data'               => $iddata
        ]);
          

          return redirect('/panti');

    }


    public function update(Request $request, $id_panti)
    {
         $this->validate($request, [
            'nama_panti'            => 'required',
            'nama_pj'               => 'required',
            'deskripsi'             => 'required',
            'alamat'                => 'required',
            'kontak'                => 'required',
            'kecamatan'             => 'required',
            'jumlah_anak'           => 'required',
            'jumlah_anak_angkat'    => 'required'
        ]);
// // =======================================================

       

            DB::table('panti_asuhans')
            ->where('id_panti', $id_panti)
            ->update([  
            'nama_panti'            => $request->nama_panti,
            'nama_pj'               => $request->nama_pj,
            'deskripsi'             => $request->deskripsi,
            'alamat'                => $request->alamat,
            'kontak'                => $request->kontak,
            'kecamatan'             => $request->kecamatan,
            'jumlah_anak'           => $request->jumlah_anak,
            'sumber'                => $request->sumber,
            'jumlah_anak_angkat'    => $request->jumlah_anak_angkat
                    ]);
        

        return redirect('/panti')->with('success', 'Data panti berhasil diubah');
    }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
    public function destroy($id_panti)
    {
      
    $pantis = DB::table('panti_asuhans')->where('id_panti', $id_panti)->first();
    $pantis = DB::delete('DELETE FROM panti_asuhans WHERE id_panti = ?' , [$id_panti]);

        return redirect('/panti')->with('delete', 'Data panti telah berhasil dihapus');
    }


    public function import_panti()
    {
        
        Excel::load(Input::file('csv_file'), function($pantis){
            $pantis->each(function ($sheet){
            Panti::firstOrCreate($sheet->toArray());
            return $sheet;
            });
        });

        return redirect('/panti');
    }
}
