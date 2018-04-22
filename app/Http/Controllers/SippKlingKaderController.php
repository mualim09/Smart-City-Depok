<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\Repository;

class SippKlingKaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repo;

    public function __construct(Repository $repository){
        $this->repo = $repository;
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $data = DB::table('petugas_sikelings')->get();
        return view('sipp-kling-pages/kader/data-kader', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sipp-kling-pages/kader/tambah-kader');
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
            'id_petugas' => $this->repo->getString(),
            'email' => $request->nama_petugas.'_'.$request->kelurahan.'@gmail.com',
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'nama' => $request->nama_petugas,
            'password' => md5($request->password),
            'id_kecamatan' => 0,
            'id_kelurahan' => 0
        ];

        DB::table('petugas_sikelings')->insert($data);
        return redirect('sipp-kling/kader')->with('success', 'Data kader berhasil ditambah !!');
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
    public function destroy($id)
    {
        $query = DB::delete('DELETE FROM petugas_sikelings WHERE id_petugas = ?' , [$id]);
        return redirect('/sipp-kling/kader')->with('delete', 'Data kader telah dihapus');
    }
}
