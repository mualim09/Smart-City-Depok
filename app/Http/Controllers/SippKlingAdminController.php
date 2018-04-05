<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\Repository;

class SippKlingAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $repo;

    public function __construct(Repository $repository){
        $this->repo = $repository;
    }

    public function index()
    {
        $data = DB::table('admin_sikelings')->get();
        return view('sipp-kling-pages/admin/data-admin', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sipp-kling-pages/admin/tambah-admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'id_admin_sikeling' => $this->repo->getString(),
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => md5($request->password)
        ];

        DB::table('admin_sikelings')->insert($data);
        return redirect('sipp-kling/admin')->with('success', 'Data admin berhasil ditambah !!');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req, $id)
    {   
        $query = DB::delete('DELETE FROM admin_sikelings WHERE id_admin_sikeling = ?' , [$id]);
        return redirect('/sipp-kling/admin')->with('delete', 'Data admin telah dihapus');
    }
}
