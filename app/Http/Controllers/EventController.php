<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\models\Event;
use App\ModelVisitor;
use Location;

class EventController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth', ['except' => ['viewevent', 'viewevent2']] );
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $events = DB::table('events')->orderBy('id_event','dsc')->get();
      return view('pages/data/event', compact('events'));
      
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
        'nama_event'        => 'required',
        'penyelenggara'     => 'required',
        'lokasi_event'      => 'required',
        'tgl_mulai'         => 'required',
        'tgl_akhir'         => 'required',
        'deskripsi_event'   => 'required',
        'image_event'       => 'image|nullable|max:1999'
      ]);
      if($request->hasFile('image_event')){
          //get filename and extension_loaded
        $filenameWithExt = $request->file('image_event')->getClientOriginalName();
          //get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //get just extends
        $extension = $request->file('image_event')->getClientOriginalExtension();
          //file name to Store(membuat yg aploud gambar mempunyai nama unik tersendiri)
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
          //upload the ImagickPixel
        $path = $request->file('image_event')->storeAs('public/img_event', $fileNameToStore);
      } else {
        $fileNameToStore = 'no image.jpg';
      }
      DB::table('events')->insert([
        'nama_event'        => $request->nama_event,
        'penyelenggara'     => $request->penyelenggara,
        'lokasi_event'      => $request->lokasi_event,
        'tgl_mulai'         => $request->tgl_mulai,
        'tgl_akhir'         => $request->tgl_akhir,
        'deskripsi_event'   => $request->deskripsi_event,
        'image_event'       => $fileNameToStore     
      ]);

      $terbaru = Event::select('nama_event')->latest()->first();
         $surel = Email::select('*')->get();
         $judul = $terbaru->nama_event;
         $desc = $terbaru->deskripsi_event;
        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);

        foreach($surel as $surels)
        {
        $imels = $surels->email;        
        $beautymail->send('email.sendmail', ['judul' => $judul, 'desc' => $deskripsi_event, 'jenis' => 'event', 'judul_jenis' => 'Event'], function($message) use($imels)
        {
            // $to_email = Input::get('email');
            $message
                ->from('hidepok.id@gmail.com', 'Hi-Depok')
                ->to($imels, $imels)
                ->subject('Acara Terbaru!');
        });
        }

      return redirect('/events');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_event)
    { 
      $event = DB::table('events')->where('id_event', '=', $id_event)->first();
      return view('detail/event_show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_event)
    {
      $event = DB::table('events')->where('id_event', '=', $id_event)->first();
      return view('pages/editdata/edit_event', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_event)
    {
      $this->validate($request, [
        'nama_event'        => 'required',
        'penyelenggara'     => 'required',
        'lokasi_event'      => 'required',
        'tgl_mulai'         => 'required',
        'tgl_akhir'         => 'required',
        'deskripsi_event'   => 'required',
      ]);
// =================================================================
      if($request->hasFile('image_event')){
          //get filename and extension_loaded
        $filenameWithExt = $request->file('image_event')->getClientOriginalName();
          //get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //get just extends
        $extension = $request->file('image_event')->getClientOriginalExtension();
          //file name to Store(membuat yg aploud gambar mempunyai nama unik tersendiri)
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
          //upload the ImagickPixel
        $path = $request->file('image_event')->storeAs('public/img_event', $fileNameToStore);
      } 

      $event = DB::table('events')->where('id_event', '=', $id_event)->first();
      if($request->hasFile('image_event')){
        Storage::delete('public/img_event/'.$event->image_event);
        $event->image_event = $fileNameToStore;
        DB::table('events')
        ->where('id_event', $id_event)
        ->update([  
          'nama_event'        => $request->nama_event,
          'penyelenggara'     => $request->penyelenggara,
          'lokasi_event'      => $request->lokasi_event,
          'tgl_mulai'         => $request->tgl_mulai,
          'tgl_akhir'         => $request->tgl_akhir,
          'deskripsi_event'   => $request->deskripsi_event,
          'image_event'       => $fileNameToStore
        ]);
      }
      else{
        DB::table('events')
        ->where('id_event', $id_event)
        ->update([  
          'nama_event'        => $request->nama_event,
          'penyelenggara'     => $request->penyelenggara,
          'lokasi_event'      => $request->lokasi_event,
          'tgl_mulai'         => $request->tgl_mulai,
          'tgl_akhir'         => $request->tgl_akhir,
          'deskripsi_event'   => $request->deskripsi_event
        ]);
      }
      return redirect('/events')->with('success', 'Event berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_event)
    {
      $events = DB::table('events')->where('id_event', '=', $id_event)->first();

      if($events->image_event != 'no image.jpg'){
        Storage::delete('public/img_event/'.$events->image_event);
      }
      $events =    DB::delete('DELETE FROM events WHERE id_event = ?' , [$id_event]);   
      return redirect('/events')->with('delete', 'Event telah dihapus');
    }

//======================================================================================

    public function viewevent(){
      $events = DB::table('events')
      ->latest()
      ->SimplePaginate(5);
      $slides = DB::table('events')
      ->latest()
      ->limit(3)
      ->get();

      $ip= \Request::ip();
      $data = Location::get($ip);
      ModelVisitor::create([
            'ip'             => $ip,
            'country_name'   => $data->countryName,
            'country_code'   => $data->countryCode,
            'region_name'    => $data->regionName,
            'region_code'    => $data->regionCode,
            'city_name'      => $data->cityName,
            'zip_code'       => $data->zipCode,
            'iso_code'       => $data->isoCode,
            'postal_code'    => $data->postalCode,
            'latitude'       => $data->latitude,
            'longitude'      => $data->longitude,
            'metro_code'     => $data->metroCode,
            'area_code'      => $data->areaCode,
            'driver'         => $data->driver,
            'bounce_rate'    => 'Event'
        ]);

      return view('/event', ['events' => $events, 'slides' => $slides]);
    }

    public function viewevent2($nama_event){
      $event = Event::where('nama_event', $nama_event)->first();
      if(!$event){
        abort(404);
      }
      $acaks = DB::table('events')
      ->inRandomOrder()
      ->limit(3)
      ->get();

      $ip= \Request::ip();
        $data = Location::get($ip);
        
      ModelVisitor::create([
        'ip'             => $ip,
        'country_name'   => $data->countryName,
        'country_code'   => $data->countryCode,
        'region_name'    => $data->regionName,
        'region_code'    => $data->regionCode,
        'city_name'      => $data->cityName,
        'zip_code'       => $data->zipCode,
        'iso_code'       => $data->isoCode,
        'postal_code'    => $data->postalCode,
        'latitude'       => $data->latitude,
        'longitude'      => $data->longitude,
        'metro_code'     => $data->metroCode,
        'area_code'      => $data->areaCode,
        'driver'         => $data->driver,
        'event'          => $nama_event
      ]);

      return view('/event/viewevent', ['event' => $event, 'acaks' => $acaks]);

    }
  }
