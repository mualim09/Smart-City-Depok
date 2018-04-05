<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\models\Angkot;
use Excel;
use Response;

class AngkotController extends Controller
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
        $angkots = DB::table('angkots')->orderBy('id_angkot','dsc')->get();
        return view('pages/instansi/angkot', compact('angkots'));
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
            'kode_trayek'         => 'required',
            'trayek'              => 'required'  
        ]);
// ===========================================================
        $iddata = '22';
// =======================================================
        DB::table('angkots')->insert([
            'kode_trayek'           => $request->kode_trayek,
            'trayek'                => $request->trayek,
            'id_data'               => $iddata
        ]);
          return redirect('/angkot');
    }




    public function update(Request $request, $id_angkot)
    {
         $this->validate($request, [
            'kode_trayek'         => 'required',
            'trayek'              => 'required'
        ]);
// // =======================================================

       

            DB::table('angkots')
            ->where('id_angkot', $id_angkot)
            ->update([  
            'kode_trayek'           => $request->kode_trayek,
            'trayek'                => $request->trayek
                    ]);
        

        return redirect('/angkot')->with('success', 'Data angkot berhasil diubah');
    }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
    public function destroy($id_angkot)
    {
      
    $angkots = DB::table('angkots')->where('id_angkot', $id_angkot)->first();
    $angkots = DB::delete('DELETE FROM angkots WHERE id_angkot = ?' , [$id_angkot]);

    return redirect('/angkot')->with('delete', 'Data angkot telah berhasil dihapus');
    }


    public function import_angkot()
    {
        
        Excel::load(Input::file('csv_file'), function($angkots){
            $angkots->each(function ($sheet){
            Angkot::firstOrCreate($sheet->toArray());
            return $sheet;
            });
        });

        return redirect('/angkot');
    }
}
