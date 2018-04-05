<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ComplainController extends Controller
{

public function __construct()
    {
        $this->middleware('auth', ['except' => ['store']] );
    }

    public function index()
    { 
        $complaints = DB::table('complaints')->orderBy('id_complain','dsc')->paginate(6);
        return view('content/complaint')->with('complaints', $complaints);
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'nama'		=> 'required',
    		'nik'		=> 'required',
    		'asal'		=> 'required',
    		'pesan'		=> 'required'
    	]);

    	DB::table('complaints')->insert([
    		'nama'		=> $request->nama,
    		'nik'		=> $request->nik,
    		'asal'		=> $request->asal,
    		'pesan'		=> $request->pesan
    	]);

    	return redirect('/');
    }

    public function destroy($id_complain)
    {
    $complaints =    DB::delete('DELETE FROM complaints WHERE id_complain = ?' , [$id_complain]);
    return redirect('/complaint')->with('delete', 'Kritik / Saran telah dihapus');
    }
}
 