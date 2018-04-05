<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\models\Adminopd;
use Excel;
use Response;

class AdminopdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminopds = DB::table('admin_opds')->orderBy('id_opd','dsc')->get();
        return view('pages/admin2', compact('adminopds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/admin1');
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
            'nip'                  => 'required',
            'nama_opd'             => 'required',
            'alamat'               => 'required',
            'no_telp'              => 'required',
            'email'                => 'required',
            'username_opd'         => 'required',
            'password_opd'         => 'required'
        ]);
// // =======================================================

       

           DB::table('admin_opds')->insert([  
            
            'nip'                  => $request->nip,
            'nama_opd'             => $request->nama_opd,
            'alamat'               => $request->alamat,
            'no_telp'              => $request->no_telp,
            'email'                => $request->email,
            'username_opd'         => $request->username_opd,
            'password_opd'         => $request->password_opd,
                    ]);
        

        return redirect('/adminopd');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_opd)
    {
        $this->validate($request, [
            'nip'                  => 'required',
            'nama_opd'             => 'required',
            'alamat'               => 'required',
            'no_telp'              => 'required',
            'email'                => 'required',
            'username_opd'         => 'required',
            'password_opd'         => 'required'
        ]);
// // =======================================================

       

            DB::table('admin_opds')
            ->where('id_opd', $id_opd)
            ->update([  
            
            'nip'                  => $request->nip,
            'nama_opd'             => $request->nama_opd,
            'alamat'               => $request->alamat,
            'no_telp'              => $request->no_telp,
            'email'                => $request->email,
            'username_opd'         => $request->username_opd,
            'password_opd'         => $request->password_opd,
                    ]);
        

        return redirect('/adminopd')->with('success', 'Data admin berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_opd)
    {
      $adminopds = DB::delete('DELETE FROM admin_opds WHERE id_opd = ?' , [$id_opd]);

    return redirect('/adminopd')->with('delete', 'Data admin telah berhasil dihapus');
    }

     public function import_adminopd()
    {
        Excel::load(Input::file('csv_file'), function($adminopds){
            $adminopds->each(function ($sheet){
            Adminopd::firstOrCreate($sheet->toArray());
            return $sheet;
            });
        });
     return redirect('/adminopd');
    }
}
