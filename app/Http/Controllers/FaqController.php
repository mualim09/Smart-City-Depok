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

class FaqController extends Controller
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
        $faqs = DB::table('content_faqs')->orderBy('id_faq','dsc')->paginate(5);
        return view('content/faq', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content/faq');
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
            'judul'              => 'required',
            'isi'                => 'required'  
        ]);
// =======================================================
        DB::table('content_faqs')->insert([
            'judul'              => $request->judul,
            'isi'                => $request->isi,
        ]);
          return redirect('/faqs');
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
    public function update(Request $request, $id_faq)
    {
        $this->validate($request, [
            'judul'         => 'required',
            'isi'              => 'required'
        ]);
// // =======================================================

       

            DB::table('content_faqs')
            ->where('id_faq', $id_faq)
            ->update([  
            'judul'           => $request->judul,
            'isi'                => $request->isi
                    ]);
        

        return redirect('/faqs')->with('success', 'Data FAQ berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_faq)
    {
    $faqs = DB::delete('DELETE FROM content_faqs WHERE id_faq = ?' , [$id_faq]);
    return redirect('/faqs')->with('delete', 'Data FAQ telah berhasil dihapus');
    }
}
