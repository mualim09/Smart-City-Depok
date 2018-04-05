<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\models\Blog;
use Excel;
use Response;

class BlogController extends AppBaseController
{

    public function __construct()
  {
      $this->middleware('auth', ['except' => ['viewblog', 'viewblog2', 'error']] );
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $blogs = DB::table('blogs')->orderBy('id_blog','dsc')->paginate(6);
        return view('pages/data/blog')->with('blogs', $blogs);
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
        $this->validate($request, [
            'judul'         => 'required',
            'isi'           => 'required',
            'image'         => 'image|nullable|max:1999'
        ]);
        if($request->hasFile('image')){
          //get filename and extension_loaded
          $filenameWithExt = $request->file('image')->getClientOriginalName();
          //get just filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //get just extends
          $extension = $request->file('image')->getClientOriginalExtension();
          //file name to Store(membuat yg aploud gambar mempunyai nama unik tersendiri)
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
          //upload the ImagickPixel
          $path = $request->file('image')->storeAs('public/img_blog', $fileNameToStore);
        } else {
          $fileNameToStore = 'no image.jpg';
        }
        DB::table('blogs')->insert([
            'judul'      => $request->judul,
            'isi'        => $request->isi,
            'image'      => $fileNameToStore       

        ]);
          return redirect('/blogs');
    }

    /**
     * Display the specified resource.
     * 
     * return view('detail.test');
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_blog)
    {
//         // $blog = Blog::find($id_blog);
//         // $blog = DB::select('SELECT * FROM blogs WHERE id_blog = ?' , [$id_blog]);
//         // $blog = Blog::where('id_blog', $id_blog)->first();
        
// //==============================================================================
//         $blog = Blog::where('id_blog', $id_blog)->first();   
//         // $blog = DB::table('blogs')->where('id_blog', '=', $id_blog)->first();
//         return view('detail/blog_show', compact('blog'));

    }

    /*adad
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_blog)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_blog)
    {
         $this->validate($request, [
            'judul'         => 'required',
            'isi'           => 'required',
        ]);

        if($request->hasFile('image')){
          //get filename and extension_loaded
          $filenameWithExt = $request->file('image')->getClientOriginalName();
          //get just filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //get just extends
          $extension = $request->file('image')->getClientOriginalExtension();
          //file name to Store(membuat yg aploud gambar mempunyai nama unik tersendiri)
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
          //upload the ImagickPixel
          $path = $request->file('image')->storeAs('public/img_blog', $fileNameToStore);
        } 

       $blog = DB::table('blogs')->where('id_blog', $id_blog)->first();
       // $blog = Blog::where('id_blog', $id_blog)->first(); 
       if($request->hasFile('image')){

            if($blog->image != 'no image.jpg'){
            Storage::delete('public/img_blog/'.$blog->image);
            $blog->image = $fileNameToStore;
            }
        DB::table('blogs')
            ->where('id_blog', $id_blog)
            ->update([  
                    'judul'      => $request->judul,
                    'isi'        => $request->isi,
                    'image'      => $fileNameToStore
                    ]);
        }

        else{
            DB::table('blogs')
            ->where('id_blog', $id_blog)
            ->update([  
                    'judul'      => $request->judul,
                    'isi'        => $request->isi
                    ]);
            }
        return redirect('/blogs')->with('success', 'Blog berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_blog)
    {
    $blogs = DB::table('blogs')->where('id_blog', $id_blog)->first();
    if($blogs->image != 'no image.jpg'){
    Storage::delete('public/img_blog/'.$blogs->image);
    }
    $blogs =    DB::delete('DELETE FROM blogs WHERE id_blog = ?' , [$id_blog]);
    return redirect('/blogs')->with('delete', 'Blog telah dihapus');
    }


    public function import_csv_file()
    {
        
        Excel::load(Input::file('csv_file'), function($blogs){
            $blogs->each(function ($sheet){
            Blog::firstOrCreate($sheet->toArray());
            return $sheet; 
            });
        });
        return redirect('/blogs');

    }


    public function viewblog()
    {
        $blogs = DB::table('blogs')
                         ->latest()
                         ->paginate(4);
        $artikels = DB::table('blogs')
                            ->latest()
                            ->limit(3)
                            ->get();
        $feed = \Feeds::make(['http://www.depoknews.id/feed/'], 10);
        $items = $feed->get_items(); //grab all items inside the rss

        $feed2 = \Feeds::make(['http://www.depokpos.com/feed/'], 10);
        $items2 = $feed2->get_items(); //grab all items inside the rss

        $feed3 = \Feeds::make(['http://www.depoktik.co.id/feed/'], 10);
        $items3 = $feed3->get_items(); //grab all items inside the rss

        $feed4 = \Feeds::make(['http://feeds.feedburner.com/depokgoid'], 10);
        $items4 = $feed4->get_items(); //grab all items inside the rss
    return view('/blog', ['blogs' => $blogs, 'artikels' => $artikels, 'items' => $items, 'items2' => $items2, 'items3' => $items3, 'items4' => $items4]);
    }

    public function viewblog2($judul){
    $blog = DB::table('blogs')->where('judul', $judul)->first();
      if(!$blog){
        abort(404);
      }
      $cakblogs = DB::table('blogs')
                            ->inRandomOrder()
                            ->limit(3)
                            ->get();
    return view('blog/viewblog', ['blog' => $blog, 'cakblogs' => $cakblogs]);

    }
}
