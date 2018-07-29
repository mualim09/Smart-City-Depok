<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\models\Androiduser;
use Response;

class AndroiduserController extends Controller
{

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $users = Androiduser::orderBy('id_user','dsc')->paginate(5);
         // $kecamatans = DB::table('pauds')->orderBy('id_kecamatan','asc')->paginate(6);
        return view('pages/user', compact('users'));
    }





    public function show($username)
    {
//         // $blog = Blog::find($id_blog);
        // $user = DB::select('SELECT * FROM user_android WHERE id_user = ?' , [$id_user])->first();
//         // $blog = Blog::where('id_blog', $id_blog)->first();
        
// //==============================================================================
//         $blog = Blog::where('id_blog', $id_blog)->first();   
        $user = DB::table('user_android')->where('username', '=', $username)->first();
//         return view('detail/blog_show', compact('blog'));
        return view('pages/userview', compact('user'));
    }
    

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
    public function destroy($id_user)
    {
    $users = Androiduser::where('id_user', $id_user)->get()->first();
    $users = DB::delete('DELETE FROM user_android WHERE id_user = ?' , [$id_user]);
// ==================================================================================
        // Storage::delete('$image');
        return redirect('/datauser')->with('delete', 'Data User telah berhasil dihapus');
    }
}
