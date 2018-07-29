<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\models\Penduduk;
use Excel;
use Response;

class PendudukController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // $penduduks = Penduduk::orderBy('id_penduduk','dsc')->paginate(5);
         $penduduks = DB::table('penduduk_kelurahans')->orderBy('id_penduduk','dsc')->get();
        return view('pages/instansi/penduduk', compact('penduduks'));
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
            'kecamatan'             => 'required',
            'kelurahan'             => 'required',
            'laki_laki'             => 'required',
            'perempuan'             => 'required'
            // 'total_penduduk_kel'    => 'required'
            
        ]);
// // =======================================================
        // $total = DB::select('SELECT sum(laki_laki + perempuan) as total from penduduk_kelurahans ');
// ===========================================================
        

// =======================================================
        DB::table('penduduk_kelurahans')->insert([
            'kecamatan'             => $request->kecamatan,
            'kelurahan'             => $request->kelurahan,
            'laki_laki'             => $request->laki_laki,
            'perempuan'             => $request->perempuan,
            'total_penduduk_kel'    => $request->laki_laki + $request->perempuan
        ]);

        

          return redirect('/penduduk');

    }


    public function update(Request $request, $id_penduduk)
    {
         $this->validate($request, [
            'kecamatan'             => 'required',
            'kelurahan'             => 'required',
            'laki_laki'             => 'required',
            'perempuan'             => 'required',
            // 'total_penduduk_kel'    => 'required'
        ]);
// // =======================================================

        
       

            DB::table('penduduk_kelurahans')
            ->where('id_penduduk', $id_penduduk)
            ->update([  
            'kecamatan'             => $request->kecamatan,
            'kelurahan'             => $request->kelurahan,
            'laki_laki'             => $request->laki_laki,
            'perempuan'             => $request->perempuan,
            'total_penduduk_kel'    => $request->laki_laki + $request->perempuan
                    ]);
        

        return redirect('/penduduk')->with('success', 'Data Penduduk berhasil diubah');
    }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
    public function destroy($id_penduduk)
    {
      
    $penduduks = DB::table('penduduk_kelurahans')->where('id_penduduk', $id_penduduk)->first();
    $penduduks = DB::delete('DELETE FROM penduduk_kelurahans WHERE id_penduduk = ?' , [$id_penduduk]);

        return redirect('/penduduk')->with('delete', 'Data Penduduk telah berhasil dihapus');
    }


    public function import_penduduk()
    {
        
        Excel::load(Input::file('csv_file'), function($penduduks){
            $penduduks->each(function ($sheet){
            Penduduk::firstOrCreate($sheet->toArray());
            return $sheet;
            });
        });

        return redirect('/penduduk');
    }
}
