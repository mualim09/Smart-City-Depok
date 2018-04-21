<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/inputdatamaster', 'Dashboard2@datamaster');
// Route::get('/inputdataumum', 'Dashboard2@dataumum');



//===============================================================
//                          lockscreen                          =
//===============================================================
Route::get('/lockscreen', function () {
    return view('lockscreen');
});
Auth::routes();
// ##############################################################



//===============================================================
//                     Dashboard 1 2 3 4                        =
//===============================================================
Route::get('/dashboard', 'HomeController@index');
Route::get('dashboard2', 'Dashboard2Controller@total');
// Route::get('/dashboard3', function () {
//     return view('socmed/dashboard3');
// });
Route::get('/dashboard4', function () {
    return view('pages/dashboard4');
});
//##############################################################
// Twitter
Route::get('dashboard3', 'SocmedController@twitterUserTimeLine');
Route::get('dashboard3/profile', 'SocmedController@profile')->middleware('auth');
Route::post('tweet', ['as'=>'post.tweet','uses'=>'SocmedController@tweet']);


//===============================================================
//                          DATA UMUM                           =
//===============================================================
Route::resource('/events', 'EventController');

Route::resource('/blogs', 'BlogController');
Route::post('import_csv_file', 'BlogController@import_csv_file');


Route::get('/spaceroom', 'PendaftaranController@index_spaceroom');
Route::delete('/spaceroom/{id_sr}', 'PendaftaranController@destroy_spaceroom');


Route::get('/volunteer', 'PendaftaranController@index_volunteer');
Route::delete('/volunteer/{id_volunteer}', 'PendaftaranController@destroy_volunteer');


Route::resource('/broadcast', 'BroadcastController');
//###############################################################



//===============================================================
//                          Content                             =
//===============================================================
Route::resource('/abouts', 'AboutController');


Route::get('/faqs', function () {
    return view('content/faq');
});


//###############################################################



//===============================================================
//                               OPD                            =
//===============================================================
Route::resource('/opd', 'OpdController');

Route::resource('/adminopd', 'AdminopdController');
Route::post('import_adminopd', 'AdminopdController@import_adminopd');

Route::get('/dataadmin1', function () {
    return view('pages/admin1');
});
// Route::get('/dataadmin2', function () {
//     return view('pages/admin2');
// });

Route::get('/lihatadmin', function () {
    return view('opd/adminview');
});
// ##############################################################



//===============================================================
//                            USER                              =
//===============================================================
Route::resource('/datauser', 'AndroiduserController');
//###############################################################



//===============================================================
//                          PARTNER                             =
//===============================================================
Route::get('/datapartner', function () {
    return view('partner/partner');
});

Route::get('/lihatpartner', function () {
    return view('partner/partnerview');
});

Route::get('/editpartner', function () {
    return view('partner/partneredit');
});
//###############################################################



//===============================================================
//               Input Data Sementara                           =
//===============================================================
Route::get('/inputdataumum', function () {
    return view('pages/inputdata');
});


Route::get('/inputdatamaster', function () {
    return view('pages/inputdata2');
});

Route::get('/kesehatan', function () {
    return view('pages/form/sehat');
});

Route::get('/pendidikan', function () {
    return view('pages/form/pendidikan');
});

Route::get('/perekonomian', function () {
    return view('pages/form/perekonomian');
});

Route::get('/sosial', function () {
    return view('pages/form/sosial');
});

Route::get('/pariwisata', function () {
    return view('pages/form/pariwisata');
});

Route::get('/fasilitasumum', function () {
    return view('pages/form/fasilitasumum');
});

Route::get('/inputolahraga', function () {
    return view('pages/form/inputolahraga');
});

Route::get('/transportasi', function () {
    return view('pages/form/transportasi');
});

Route::get('/kependudukan', function () {
    return view('pages/form/kependudukan');
});

Route::get('/instansi', function () {
    return view('pages/form/instansi');
});

// ##############################################################



//===============================================================
//                  Karya & Masterpiece                         =
//===============================================================
Route::resource('/museum', 'MasterpieceController');
Route::post('import_museum', 'MasterpieceController@import_museum');
Route::put('/karya/{id_penghargaan}', 'MasterpieceController@accept');
Route::get('/karya', 'MasterpieceController@index_status');
Route::get('/karyaaccept', 'MasterpieceController@index_accept');
Route::get('/karyareject', 'MasterpieceController@index_reject');
// =============================================


//===============================================================
//                   TAMPILAN PUBLIC                            =
//===============================================================
Route::get('/', function () {
    return view('welcome');
});
// Route::get('/', 'FeedController@berita');/
// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/blog/{judul}', 'BlogController@error');

Route::get('/', 'FeedController@berita');
Route::get('/maps', 'MapsController@maps');
Route::get('/blog', 'BlogController@viewblog');
Route::get('/blog/{judul}', 'BlogController@viewblog2');
Route::get('/event', 'EventController@viewevent');
Route::get('/event/{nama_event}', 'EventController@viewevent2');
Route::resource('complaint', 'ComplainController');
Route::get('/information', function () {
    return view('information');
});
Route::get('/faq', function () {
    return view('faq');
});
Route::resource('/faqs', 'FaqController');






//===============================================================
//                      DATA INSTANSI                           =
//===============================================================
Route::resource('/apotek', 'ApotekController');
Route::post('import_apotek', 'ApotekController@import_apotek');

Route::resource('/rs', 'RsController');
Route::post('import_rs', 'RsController@import_rs');

Route::resource('/klinik', 'KlinikController');
Route::post('import_klinik', 'KlinikController@import_klinik');

Route::resource('/puskesmas', 'PuskesmasController');
Route::post('import_puskesmas', 'PuskesmasController@import_puskesmas');

Route::resource('bidan', 'BidanController');
Route::post('import_bidan', 'BidanController@import_bidan');
// =========================================================
Route::resource('paud', 'PaudController');
Route::post('import_paud', 'PaudController@import_paud');

Route::resource('sd', 'PdController');
Route::post('import_pd', 'PdController@import_pd');

Route::resource('slb', 'SlbController');
Route::post('import_slb', 'SlbController@import_slb');

Route::resource('smp', 'SmpController');
Route::post('import_smp', 'SmpController@import_smp');

Route::resource('sma', 'SmaController');
Route::post('import_sma', 'SmaController@import_sma');

Route::resource('perpus', 'PerpusController');
Route::post('import_perpus', 'PerpusController@import_perpus');

Route::resource('universitas', 'UniversitasController');
Route::post('import_universitas', 'UniversitasController@import_universitas');
// ========================================================
Route::resource('mall', 'MallController');
Route::post('import_mall', 'MallController@import_mall');

Route::resource('supermarket', 'SupermarketController');
Route::post('import_supermarket', 'SupermarketController@import_supermarket');

Route::resource('pasar', 'PasarController');
Route::post('import_pasar', 'PasarController@import_pasar');

Route::resource('ukm', 'UkmController');
Route::post('import_ukm', 'UkmController@import_ukm');
// =======================================================
//
Route::resource('panti', 'PantiController');
Route::post('import_panti', 'PantiController@import_panti');

Route::resource('komunitas', 'KomunitasController');
Route::post('import_komunitas', 'KomunitasController@import_komunitas');
// ========================================================

Route::resource('kuliner', 'KulinerController');
Route::post('import_kuliner', 'KulinerController@import_kuliner');

Route::resource('wisata', 'WisataController');
Route::post('import_wisata', 'WisataController@import_wisata');
// ===========================================================

Route::resource('olahraga', 'OlahragaController');
Route::post('import_olahraga', 'OlahragaController@import_olahraga');
// ==============================================================

Route::resource('angkot', 'AngkotController');
Route::post('import_angkot', 'AngkotController@import_angkot');

Route::resource('jpengiriman', 'JpengirimanController');
Route::post('import_jpengiriman', 'JpengirimanController@import_jpengiriman');
// ==============================================================

Route::resource('tibadah', 'TibadahController');
Route::post('import_tibadah', 'TibadahController@import_tibadah');

Route::resource('tpu', 'TpuController');
Route::post('import_tpu', 'TpuController@import_tpu');

Route::resource('taman', 'TamanController');
Route::post('import_taman', 'TamanController@import_taman');

// ==============================================================

Route::resource('kelurahan', 'KelurahanController');
Route::post('import_kelurahan', 'KelurahanController@import_kelurahan');

Route::resource('kecamatan', 'KecamatanController');

Route::resource('penduduk', 'PendudukController');
Route::post('import_penduduk', 'PendudukController@import_penduduk');
// ==================================================================

Route::resource('pdam', 'PdamController');
Route::post('import_pdam', 'PdamController@import_pdam');

Route::resource('pospolisi', 'PospolisiController');
Route::post('import_pospolisi', 'PospolisiController@import_pospolisi');

Route::resource('pln', 'PlnController');
Route::post('import_pln', 'PlnController@import_pln');

Route::resource('spbu', 'SpbuController');
Route::post('import_spbu', 'SpbuController@import_spbu');

Route::resource('damkar', 'DamkarController');
Route::post('import_damkar', 'DamkarController@import_damkar');

Route::resource('tni', 'TniController');
Route::post('import_tni', 'TniController@import_tni');
// ###################################################################



//========================================================================
//Masih blom dipake
//--------------------------------------------------
Route::get('/blogform', function () {
    return view('pages/data/blogform');
});

Route::get('/eventform', function () {
    return view('pages/data/eventform');
});

Route::get('/ensiklopediaform', function () {
    return view('pages/data/ensiklopediaform');
});

Route::get('/broadcastform', function () {
    return view('pages/data/broadcastform');
});
//---------------------------------------------------


//===============================================================
//                      SIPP-KLING                              =
//===============================================================


// Route::get('/sipp-kling/dashboard', 'SippKlingController@total_jumlah');


Route::get('/sipp-kling/dashboard-tabel', 'SippKlingController@rehat')->name('dashboard-tabel');

Route::get('/sipp-kling/dashboard-grafik-waktu', 'SippKlingController@grafik')->name('dashboard-grafik-waktu');



// Route::get('/sipp-kling/dashboard-tabel', function(){


// this is just for passing data
// <<<<<<< HEAD
Route::get('/sipp-kling-data-kelurahan/', 'SippKlingController@getDataKelurahan');

// ||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
Route::get('/sipp-kling/dashboard-tabel', 'SipklingtabelController@view_tabel')->middleware('auth')->name('dashboard-tabel');

// this is just for passing data
// FILTER
Route::get('/sipp-kling-data-kelurahan/', 'SippKlingController@getDataKelurahanByKec');
Route::any('/sipp-kling/dashboard-tabel/filter', 'SipklingtabelController@view_tabel_param')->name('dashboard-tabel');


// #######################################################################################################################
// RUMAH SEHAT
Route::post('/sipp-kling/input_rh', 'SipklingtabelController@input_rh')->name('dashboard-tabel');
Route::delete('sipp-kling/hapus-rehat/{id_rumah_sehat}', 'SipklingtabelController@delete_rh')->name('dashboard-tabel');

// SAB
Route::delete('sipp-kling/hapus-sab/{id_rumah_sehat}', 'SipklingtabelController@delete_sab')->name('dashboard-tabel');

// JASA BOGA
Route::post('/sipp-kling/input_jb', 'SipklingtabelController@input_jb')->name('dashboard-tabel');
Route::delete('sipp-kling/hapus-jasaboga/{id_jasaboga}', 'SipklingtabelController@delete_jb')->name('dashboard-tabel');

// Kuliner
Route::post('/sipp-kling/input_kuliner', 'SipklingtabelController@input_kuliner')->name('dashboard-tabel');
Route::delete('sipp-kling/hapus-kuliner/{id_kuliner}', 'SipklingtabelController@delete_kuliner')->name('dashboard-tabel');

// DAM
Route::post('/sipp-kling/input_dam', 'SipklingtabelController@input_dam')->name('dashboard-tabel');
Route::delete('sipp-kling/hapus-dam/{id_dam}', 'SipklingtabelController@delete_dam')->name('dashboard-tabel');

// TEMPAT IBADAH
Route::post('/sipp-kling/input_ibadah', 'SipklingtabelController@input_ibadah')->name('dashboard-tabel');
Route::delete('sipp-kling/hapus-ibadah/{id_ibadah}', 'SipklingtabelController@delete_ibadah')->name('dashboard-tabel');

//PASAR
Route::post('/sipp-kling/input_pasar', 'SipklingtabelController@input_pasar')->name('dashboard-tabel');
Route::delete('sipp-kling/hapus-pasar/{id_pasar}', 'SipklingtabelController@delete_pasar')->name('dashboard-tabel');

// SEKOLAH
Route::post('/sipp-kling/input_sekolah', 'SipklingtabelController@input_sekolah')->name('dashboard-tabel');
Route::delete('sipp-kling/hapus-sekolah/{id_sekolah}', 'SipklingtabelController@delete_sekolah')->name('dashboard-tabel');

// PUSKESMAS
Route::post('/sipp-kling/input_puskes', 'SipklingtabelController@input_puskes')->name('dashboard-tabel');
Route::delete('sipp-kling/hapus-puskes/{id_sekolah}', 'SipklingtabelController@delete_puskes')->name('dashboard-tabel');

//Hotel
Route::post('/sipp-kling/input_hotel', 'SipklingtabelController@input_hotel')->name('dashboard-tabel');
Route::delete('sipp-kling/hapus-hotel/{id_hotel}', 'SipklingtabelController@delete_hotel')->name('dashboard-tabel');

//HOTEL Melati
Route::post('/sipp-kling/input_melati', 'SipklingtabelController@input_melati')->name('dashboard-tabel');
Route::delete('sipp-kling/hapus-melati/{id_hotel_melati}', 'SipklingtabelController@delete_melati')->name('dashboard-tabel');

// PESANTREN
Route::post('/sipp-kling/input_pesantren', 'SipklingtabelController@input_pesantren')->name('dashboard-tabel');
Route::delete('sipp-kling/hapus-pesantren/{id_pesantren}', 'SipklingtabelController@delete_pesantren')->name('dashboard-tabel');

// PKL
Route::post('/sipp-kling/input_pkl', 'SipklingtabelController@input_pkl')->name('dashboard-tabel');
Route::delete('sipp-kling/hapus-pkl/{id_pelayanan_kesling}', 'SipklingtabelController@delete_pkl')->name('dashboard-tabel');
// |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

Route::prefix('sipp-kling')->group(function() {
    Route::get('/login', 'Auth\SippKlingLoginController@showLoginForm')->name('sipp-kling.login');
    Route::post('/login', 'Auth\SippKlingLoginController@login');
    //Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/', 'SippKlingController@total_jumlah')->name('dashboard');
    
});
Route::any('/sipp-kling/filter', 'SippKlingController@totalJumlahByParameter')->name('dashboard');


Route::get('/sipp-kling/dashboard-map', function(){
    return view('sipp-kling-pages/dashboard-map');
})->name('dashboard-map');


Route::get('/sipp-kling/dashboard-grafik-waktu/{param_periode}', function($param){

    return view('sipp-kling-pages/dashboard-periode-pendataan', ['param' => $param]);

})->name('dashboard-periode-pendataan');


Route::get('/sipp-kling/admin/tambah-admin', function(){
    return view('sipp-kling-pages/admin/tambah-admin');
});

Route::get('/sipp-kling/admin', function(){
    return view('sipp-kling-pages/admin/data-admin');
})->name('data-admin');

Route::get('/sipp-kling/kader/tambah-kader', function(){
    return view('sipp-kling-pages/kader/tambah-kader');
});

Route::get('/sipp-kling/kader', function(){
    return view('sipp-kling-pages/kader/data-kader');
})->name('data-kader');

Route::resource('/sipp-kling/admin', 'SippKlingAdminController',['names' => [
    'index' => 'admin',
    'create' => 'admin'
]]);

Route::resource('/sipp-kling/kader', 'SippKlingKaderController',['names' => [
    'index' => 'kader',
    'create' => 'kader'
]]);

Route::get('/sipp-kling/jadwal', function(){
    return view('sipp-kling-pages/jadwal/tambah-jadwal');
});

Route::get('/sipp-kling/pesan', function(){
    return view('sipp-kling-pages/pesan/tambah-pesan');
});

Route::get('/sipp-kling/data-tempat/', 'MapsSippklingController@maps');

Route::get('/sipp-kling/history', 'SippKlingController@history');

// Route::get('/login-sipp-kling', function(){
//     return 1;
// });