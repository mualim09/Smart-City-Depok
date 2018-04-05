{{-- @if(!Auth::guest())
@extends('auth.login')
@endif
 --}}
@extends('layouts.app')
@section('content')

    <section class="content-header">
      <h1 style="color:#807e7d"> 
       <b>INPUT DATA MASTER</b>       
      </h1>
    </section>

    <!--<section class="content-header">    
      <h1 style="color:#807e7d">
         INPUT DATA 
        <small class="pull-right">21 Agustus 2017 10:45</small>
      </h1>
    </section>-->

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  Kesehatan<span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#apotek">Apotek</a></li>
                  <li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#rs">Rumah Sakit</a></li>
                  <li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#klinik">Klinik</a></li>
                  <li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#puskesmas">Puskesmas</a></li>
                  <li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#bidan">Bidan</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  Pendidikan <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#paud">Paud</a></li>
                  <li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#pd">Pendidikan Dasar</a></li>
                  <li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#pk">Pendidikan Khusus</a></li>
                  <li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#smp">Sekolah Menengah Pertama</a></li>
                  <li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#sma">Sekolah Menengah Atas</a></li>
                  <li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#perpus">Perpustakaan</a></li>
                  <li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#universitas">Universitas</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  Perekonomian <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#mall">Mall</a></li>
                  <li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#smarket">Supermarket</a></li>
                  <li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#pasar">Pasar</a></li>
                  <!--<li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#umkm">UMKM</a></li>-->
                </ul>
              </li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  Sosial <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#panti">Panti Asuhan</a></li>
                  <li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#kom">Komunitas</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  Pariwisata <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#kuliner">Kuliner</a></li>
                  <li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#wisata">Tempat Wisata</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  Fasilitas Umum <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#tibadah">Tempat Ibadah</a></li>
                  <li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#tpu">TPU</a></li>
                  <li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#taman">Taman</a></li>
                </ul>
              </li>
              <li><a href="#olahraga" data-toggle="tab">Olahraga</a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  Transportasi <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#angkot">Angkot</a></li>
                  <li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#pengiriman">Jasa Pengiriman</a></li>
                </ul>
              </li>
            
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  Kependudukan<span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#kelurahan">Kelurahan</a></li>
                  <li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#kecamatan">Kecamatan</a></li>
                  <li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#jumlahpenduduk">Jumlah Penduduk Kelurahan</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  Instansi<span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#pdam">PDAM</a></li>
                  <li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#pospolisi">Pos Polisi</a></li>
                  <li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#pln">PLN</a></li>
                  <li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#spbu">SPBU</a></li>
                  <li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#damkar">Damkar</a></li>
                  <li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#tni">TNI</a></li>
                </ul>
              </li>
            </ul>
            <div class="box-body border-radius-none">
              <div class="tab-content">

                <!--KESEHATAN-->
{{-- ============================================================================================================== --}}
                <div class="tab-pane active" id="apotek">
                  
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion ion-ios-medkit-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Apotek</h4></span>
                    </div>
                  </div>  
                    <div class="box-body">
                        <div class="box-header with-border">
                        <div class="col-md-3">
                         <label>Import Melalui Excel (.csv)</label>
                        </div>
                          <div class="col-md-9">
                            <form action="import_apotek" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <input type="file" name="csv_file">
                            <br>
                            <p><input type="submit" value="Upload"></p>
                            </form>
                          </div>  
                        </div>
                  </div>
                
                {!! Form::open(['action' => 'ApotekController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">

                          <div class="row">
                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="Apotek Medika" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="Apotek pada umumnya memiliki fungsi sebagai tempat pengabdian profesi seorang Apoteker maupun Asisten Apoteker, pelayanan resep dan sebagai sarana farmasi yang melakukan peracikan obat."></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Ridwan Rais no.2"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kecamatan</label>
                              </div>
                              <div class="col-md-9">
                                <select class="form-control" name="kecamatan">
                                  <option></option>
                                  <option value="Beji">Beji</option>
                                  <option value="Bojongsari">Bojongsari</option>
                                  <option value="Cimanggis">Cimanggis</option>
                                  <option value="Cinere">Cinere</option>
                                  <option value="Cilodong">Cilodong</option>
                                  <option value="Cipayung">Cipayung</option>
                                  <option value="Limo">Limo</option>
                                  <option value="Pancoran Mas">Pancoran Mas</option>
                                  <option value="Sawangan">Sawangan</option>
                                  <option value="Sukmajaya">Sukmajaya</option>
                                  <option value="Tapos">Tapos</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>

                                                        

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>

                            

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Upload foto</label>
                              </div>
                              <div class="col-md-9">
                                {{Form::file('foto')}}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
{{-- ================================================================================================================--}}

                <div class="tab-pane" id="rs">
                  
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion ion-ios-medkit-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Rumah Sakit</h4></span>
                    </div>
                  </div>
                  <div class="box-body">
                        <div class="box-header with-border">
                        <div class="col-md-3">
                         <label>Import Melalui Excel (.csv)</label>
                        </div>
                          <div class="col-md-9">
                            <form action="import_rs" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <input type="file" name="csv_file">
                            <br>
                            <p><input type="submit" value="Upload"></p>
                            </form>
                          </div>  
                        </div>
                  </div>
                  {!! Form::open(['action' => 'RsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">
                          <div class="row">
                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="Rumah Sakit Medika" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="Ruah Sakit pada umumnya memiliki fungsi sebagai tempat berobat."></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Ridwan Rais no.2"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kecamatan</label>
                              </div>
                              <div class="col-md-9">
                                <select class="form-control" name="kecamatan">
                                  <option></option>
                                  <option value="Beji">Beji</option>
                                  <option value="Bojongsari">Bojongsari</option>
                                  <option value="Cimanggis">Cimanggis</option>
                                  <option value="Cinere">Cinere</option>
                                  <option value="Cilodong">Cilodong</option>
                                  <option value="Cipayung">Cipayung</option>
                                  <option value="Limo">Limo</option>
                                  <option value="Pancoran Mas">Pancoran Mas</option>
                                  <option value="Sawangan">Sawangan</option>
                                  <option value="Sukmajaya">Sukmajaya</option>
                                  <option value="Tapos">Tapos</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Upload foto</label>
                              </div>
                              <div class="col-md-9">
                                {{Form::file('foto')}}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
{{-- ================================================================================================================--}}

                <div class="tab-pane" id="klinik">
                  
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion ion-ios-medkit-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Klinik</h4></span>
                    </div>
                  </div>

                  <div class="box-body">
                        <div class="box-header with-border">
                        <div class="col-md-3">
                         <label>Import Melalui Excel (.csv)</label>
                        </div>
                          <div class="col-md-9">
                            <form action="import_klinik" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <input type="file" name="csv_file">
                            <br>
                            <p><input type="submit" value="Upload"></p>
                            </form>
                          </div>  
                        </div>
                  </div>
                  {!! Form::open(['action' => 'KlinikController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">
                          <div class="row">
                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="Klinik Medika" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="Klinik pada umumnya memiliki fungsi sebagai tempat berobat."></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Ridwan Rais no.2"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kecamatan</label>
                              </div>
                              <div class="col-md-9">
                                <select class="form-control" name="kecamatan">
                                  <option></option>
                                  <option value="Beji">Beji</option>
                                  <option value="Bojongsari">Bojongsari</option>
                                  <option value="Cimanggis">Cimanggis</option>
                                  <option value="Cinere">Cinere</option>
                                  <option value="Cilodong">Cilodong</option>
                                  <option value="Cipayung">Cipayung</option>
                                  <option value="Limo">Limo</option>
                                  <option value="Pancoran Mas">Pancoran Mas</option>
                                  <option value="Sawangan">Sawangan</option>
                                  <option value="Sukmajaya">Sukmajaya</option>
                                  <option value="Tapos">Tapos</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Upload foto</label>
                              </div>
                              <div class="col-md-9">
                                {{Form::file('foto_klinik')}}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
{{-- ================================================================================================================--}}

                <div class="tab-pane" id="puskesmas">
                  
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion ion-ios-medkit-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Puskesmas</h4></span>
                    </div>
                  </div>

                  <div class="box-body">
                        <div class="box-header with-border">
                        <div class="col-md-3">
                         <label>Import Melalui Excel (.csv)</label>
                        </div>
                          <div class="col-md-9">
                            <form action="import_puskesmas" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <input type="file" name="csv_file">
                            <br>
                            <p><input type="submit" value="Upload"></p>
                            </form>
                          </div>  
                        </div>
                  </div>
                
                {!! Form::open(['action' => 'PuskesmasController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">

                          <div class="row">
                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="Puskesmas Medika" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="Puskesmas pada umumnya memiliki fungsi sebagai tempat untuk borobat bagi masyarakat dengan penyakit yang umum dan tidak kronis"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Ridwan Rais no.2"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kecamatan</label>
                              </div>
                              <div class="col-md-9">
                                <select class="form-control" name="kecamatan">
                                  <option></option>
                                  <option value="Beji">Beji</option>
                                  <option value="Bojongsari">Bojongsari</option>
                                  <option value="Cimanggis">Cimanggis</option>
                                  <option value="Cinere">Cinere</option>
                                  <option value="Cilodong">Cilodong</option>
                                  <option value="Cipayung">Cipayung</option>
                                  <option value="Limo">Limo</option>
                                  <option value="Pancoran Mas">Pancoran Mas</option>
                                  <option value="Sawangan">Sawangan</option>
                                  <option value="Sukmajaya">Sukmajaya</option>
                                  <option value="Tapos">Tapos</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>

                                                        

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Upload foto</label>
                              </div>
                              <div class="col-md-9">
                                {{Form::file('foto')}}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
{{-- ============================================================================================================ --}}
                <div class="tab-pane" id="bidan">
                  
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion ion-ios-medkit-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Bidan</h4></span>
                    </div>
                  </div>

                 <div class="box-body">
                        <div class="box-header with-border">
                        <div class="col-md-3">
                         <label>Import Melalui Excel (.csv)</label>
                        </div>
                          <div class="col-md-9">
                            <form action="import_bidan" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <input type="file" name="csv_file">
                            <br>
                            <p><input type="submit" value="Upload"></p>
                            </form>
                          </div>  
                        </div>
                  </div>
                
                {!! Form::open(['action' => 'BidanController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">

                          <div class="row">
                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="Bidan Medika" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="Bidan pada umumnya memiliki fungsi sebagai tempat ibu yang akan akan mulai melahirkan sehingga ibu dan anak tetap sehat pasca kelahiran"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Ridwan Rais no.2"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kecamatan</label>
                              </div>
                              <div class="col-md-9">
                                <select class="form-control" name="kecamatan">
                                  <option></option>
                                  <option value="Beji">Beji</option>
                                  <option value="Bojongsari">Bojongsari</option>
                                  <option value="Cimanggis">Cimanggis</option>
                                  <option value="Cinere">Cinere</option>
                                  <option value="Cilodong">Cilodong</option>
                                  <option value="Cipayung">Cipayung</option>
                                  <option value="Limo">Limo</option>
                                  <option value="Pancoran Mas">Pancoran Mas</option>
                                  <option value="Sawangan">Sawangan</option>
                                  <option value="Sukmajaya">Sukmajaya</option>
                                  <option value="Tapos">Tapos</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Upload foto</label>
                              </div>
                              <div class="col-md-9">
                                {{Form::file('foto')}}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>

<!--================================================PENDIDIKAN=====================================================-->

                <div class="tab-pane" id="paud">
                  
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion-ios-book-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Paud</h4></span>
                    </div>
                  </div>

                  <div class="box-body">
                        <div class="box-header with-border">
                        <div class="col-md-3">
                         <label>Import Melalui Excel (.csv)</label>
                        </div>
                          <div class="col-md-9">
                            <form action="import_paud" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <input type="file" name="csv_file">
                            <br>
                            <p><input type="submit" value="Upload"></p>
                            </form>
                          </div>  
                        </div>
                  </div>
                
                {!! Form::open(['action' => 'PaudController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">

                          <div class="row">
                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="Bidan Medika" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="Bidan pada umumnya memiliki fungsi sebagai tempat ibu yang akan akan mulai melahirkan sehingga ibu dan anak tetap sehat pasca kelahiran"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Ridwan Rais no.2"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kecamatan</label>
                              </div>
                              <div class="col-md-9">
                                <select class="form-control" name="kecamatan">
                                  <option></option>
                                  <option value="Beji">Beji</option>
                                  <option value="Bojongsari">Bojongsari</option>
                                  <option value="Cimanggis">Cimanggis</option>
                                  <option value="Cinere">Cinere</option>
                                  <option value="Cilodong">Cilodong</option>
                                  <option value="Cipayung">Cipayung</option>
                                  <option value="Limo">Limo</option>
                                  <option value="Pancoran Mas">Pancoran Mas</option>
                                  <option value="Sawangan">Sawangan</option>
                                  <option value="Sukmajaya">Sukmajaya</option>
                                  <option value="Tapos">Tapos</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Upload foto</label>
                              </div>
                              <div class="col-md-9">
                                {{Form::file('foto_paud')}}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
{{-- =========================================================================================================== --}}
                <div class="tab-pane" id="pd">
                  
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion-ios-book-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Pendidikan Dasar</h4></span>
                    </div>
                  </div>

                 <div class="box-body">
                        <div class="box-header with-border">
                        <div class="col-md-3">
                         <label>Import Melalui Excel (.csv)</label>
                        </div>
                          <div class="col-md-9">
                            <form action="import_pd" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <input type="file" name="csv_file">
                            <br>
                            <p><input type="submit" value="Upload"></p>
                            </form>
                          </div>  
                        </div>
                  </div>
                
                {!! Form::open(['action' => 'PdController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">

                          <div class="row">
                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="Bidan Medika" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="Bidan pada umumnya memiliki fungsi sebagai tempat ibu yang akan akan mulai melahirkan sehingga ibu dan anak tetap sehat pasca kelahiran"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Ridwan Rais no.2"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kecamatan</label>
                              </div>
                              <div class="col-md-9">
                                <select class="form-control" name="kecamatan">
                                  <option></option>
                                  <option value="Beji">Beji</option>
                                  <option value="Bojongsari">Bojongsari</option>
                                  <option value="Cimanggis">Cimanggis</option>
                                  <option value="Cinere">Cinere</option>
                                  <option value="Cilodong">Cilodong</option>
                                  <option value="Cipayung">Cipayung</option>
                                  <option value="Limo">Limo</option>
                                  <option value="Pancoran Mas">Pancoran Mas</option>
                                  <option value="Sawangan">Sawangan</option>
                                  <option value="Sukmajaya">Sukmajaya</option>
                                  <option value="Tapos">Tapos</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Upload foto</label>
                              </div>
                              <div class="col-md-9">
                                {{Form::file('foto_pd')}}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}

                      </div>
                    </div>
                  </div>
                </div>




{{-- ============================================================================================================ --}}
                <div class="tab-pane" id="pk">
                  
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion-ios-book-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Pendidikan Khusus</h4></span>
                    </div>
                  </div>

                  <div class="box-body">
                        <div class="box-header with-border">
                        <div class="col-md-3">
                         <label>Import Melalui Excel (.csv)</label>
                        </div>
                          <div class="col-md-9">
                            <form action="import_slb" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <input type="file" name="csv_file">
                            <br>
                            <p><input type="submit" value="Upload"></p>
                            </form>
                          </div>  
                        </div>
                  </div>
                
                {!! Form::open(['action' => 'SlbController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">

                          <div class="row">
                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="Bidan Medika" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="Bidan pada umumnya memiliki fungsi sebagai tempat ibu yang akan akan mulai melahirkan sehingga ibu dan anak tetap sehat pasca kelahiran"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Ridwan Rais no.2"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kecamatan</label>
                              </div>
                              <div class="col-md-9">
                                <select class="form-control" name="kecamatan">
                                  <option></option>
                                  <option value="Beji">Beji</option>
                                  <option value="Bojongsari">Bojongsari</option>
                                  <option value="Cimanggis">Cimanggis</option>
                                  <option value="Cinere">Cinere</option>
                                  <option value="Cilodong">Cilodong</option>
                                  <option value="Cipayung">Cipayung</option>
                                  <option value="Limo">Limo</option>
                                  <option value="Pancoran Mas">Pancoran Mas</option>
                                  <option value="Sawangan">Sawangan</option>
                                  <option value="Sukmajaya">Sukmajaya</option>
                                  <option value="Tapos">Tapos</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Upload foto</label>
                              </div>
                              <div class="col-md-9">
                                {{Form::file('foto_slb')}}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
{{-- ============================================================================================================= --}}
                <div class="tab-pane" id="smp">
                  
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion-ios-book-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Sekolah Menengah Pertama</h4></span>
                    </div>
                  </div>

                  <div class="box-body">
                        <div class="box-header with-border">
                        <div class="col-md-3">
                         <label>Import Melalui Excel (.csv)</label>
                        </div>
                          <div class="col-md-9">
                            <form action="import_smp" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <input type="file" name="csv_file">
                            <br>
                            <p><input type="submit" value="Upload"></p>
                            </form>
                          </div>  
                        </div>
                  </div>
                
                {!! Form::open(['action' => 'SmpController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">

                          <div class="row">
                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="Bidan Medika" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="Bidan pada umumnya memiliki fungsi sebagai tempat ibu yang akan akan mulai melahirkan sehingga ibu dan anak tetap sehat pasca kelahiran"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Ridwan Rais no.2"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kecamatan</label>
                              </div>
                              <div class="col-md-9">
                                <select class="form-control" name="kecamatan">
                                  <option></option>
                                  <option value="Beji">Beji</option>
                                  <option value="Bojongsari">Bojongsari</option>
                                  <option value="Cimanggis">Cimanggis</option>
                                  <option value="Cinere">Cinere</option>
                                  <option value="Cilodong">Cilodong</option>
                                  <option value="Cipayung">Cipayung</option>
                                  <option value="Limo">Limo</option>
                                  <option value="Pancoran Mas">Pancoran Mas</option>
                                  <option value="Sawangan">Sawangan</option>
                                  <option value="Sukmajaya">Sukmajaya</option>
                                  <option value="Tapos">Tapos</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Upload foto</label>
                              </div>
                              <div class="col-md-9">
                                {{Form::file('foto_smp')}}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
{{-- ============================================================================================================= --}}
                <div class="tab-pane" id="sma">
                  
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion-ios-book-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Sekolah Menengah Atas</h4></span>
                    </div>
                  </div>

                  <div class="box-body">
                        <div class="box-header with-border">
                        <div class="col-md-3">
                         <label>Import Melalui Excel (.csv)</label>
                        </div>
                          <div class="col-md-9">
                            <form action="import_sma" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <input type="file" name="csv_file">
                            <br>
                            <p><input type="submit" value="Upload"></p>
                            </form>
                          </div>  
                        </div>
                  </div>
                
                {!! Form::open(['action' => 'SmaController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">

                          <div class="row">
                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="Bidan Medika" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="Bidan pada umumnya memiliki fungsi sebagai tempat ibu yang akan akan mulai melahirkan sehingga ibu dan anak tetap sehat pasca kelahiran"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Ridwan Rais no.2"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kecamatan</label>
                              </div>
                              <div class="col-md-9">
                                <select class="form-control" name="kecamatan">
                                  <option></option>
                                  <option value="Beji">Beji</option>
                                  <option value="Bojongsari">Bojongsari</option>
                                  <option value="Cimanggis">Cimanggis</option>
                                  <option value="Cinere">Cinere</option>
                                  <option value="Cilodong">Cilodong</option>
                                  <option value="Cipayung">Cipayung</option>
                                  <option value="Limo">Limo</option>
                                  <option value="Pancoran Mas">Pancoran Mas</option>
                                  <option value="Sawangan">Sawangan</option>
                                  <option value="Sukmajaya">Sukmajaya</option>
                                  <option value="Tapos">Tapos</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Upload foto</label>
                              </div>
                              <div class="col-md-9">
                                {{Form::file('foto_sma')}}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
{{-- ============================================================================================================ --}}
                <div class="tab-pane" id="perpus">
                  
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion-ios-book-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Perpustakaan</h4></span>
                    </div>
                  </div>

                  <div class="box-body">
                        <div class="box-header with-border">
                        <div class="col-md-3">
                         <label>Import Melalui Excel (.csv)</label>
                        </div>
                          <div class="col-md-9">
                            <form action="import_perpus" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <input type="file" name="csv_file">
                            <br>
                            <p><input type="submit" value="Upload"></p>
                            </form>
                          </div>  
                        </div>
                  </div>
                
                {!! Form::open(['action' => 'PerpusController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">

                          <div class="row">
                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="Perpustakaan PNJ" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="Perpustakaan berada di lantai 2 gedung Q. Mempunyai berbagai koleksi buku baru dan lama "></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Ridwan Rais no.2"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kecamatan</label>
                              </div>
                              <div class="col-md-9">
                                <select class="form-control" name="kecamatan">
                                  <option></option>
                                  <option value="Beji">Beji</option>
                                  <option value="Bojongsari">Bojongsari</option>
                                  <option value="Cimanggis">Cimanggis</option>
                                  <option value="Cinere">Cinere</option>
                                  <option value="Cilodong">Cilodong</option>
                                  <option value="Cipayung">Cipayung</option>
                                  <option value="Limo">Limo</option>
                                  <option value="Pancoran Mas">Pancoran Mas</option>
                                  <option value="Sawangan">Sawangan</option>
                                  <option value="Sukmajaya">Sukmajaya</option>
                                  <option value="Tapos">Tapos</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Upload foto</label>
                              </div>
                              <div class="col-md-9">
                                {{Form::file('foto_perpustakaan')}}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
{{-- =========================================================================================================== --}}
<div class="tab-pane" id="universitas">
                  
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion-ios-book-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Universitas</h4></span>
                    </div>
                  </div>

                  <div class="box-body">
                        <div class="box-header with-border">
                        <div class="col-md-3">
                         <label>Import Melalui Excel (.csv)</label>
                        </div>
                          <div class="col-md-9">
                            <form action="import_universitas" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <input type="file" name="csv_file">
                            <br>
                            <p><input type="submit" value="Upload"></p>
                            </form>
                          </div>  
                        </div>
                  </div>
                
                {{-- {!! Form::open(['action' => 'PerpusController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!} --}}
                
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">

                          <div class="row">
                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="Universitas Indonesia" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="Salah satu Universitas terbaik dengan suasana kampus yang rindang"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Ridwan Rais no.2"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kecamatan</label>
                              </div>
                              <div class="col-md-9">
                                <select class="form-control" name="kecamatan">
                                  <option></option>
                                  <option value="Beji">Beji</option>
                                  <option value="Bojongsari">Bojongsari</option>
                                  <option value="Cimanggis">Cimanggis</option>
                                  <option value="Cinere">Cinere</option>
                                  <option value="Cilodong">Cilodong</option>
                                  <option value="Cipayung">Cipayung</option>
                                  <option value="Limo">Limo</option>
                                  <option value="Pancoran Mas">Pancoran Mas</option>
                                  <option value="Sawangan">Sawangan</option>
                                  <option value="Sukmajaya">Sukmajaya</option>
                                  <option value="Tapos">Tapos</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Upload foto</label>
                              </div>
                              <div class="col-md-9">
                                {{Form::file('foto')}}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {{-- {!! Form::close() !!} --}}
                      </div>
                    </div>
                  </div>
                </div>



{{-- ========================================================================================================== --}}
                <!-- PEREKONOMIAN -->

                <div class="tab-pane" id="mall">
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion-ios-cart-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Mall</h4></span>
                    </div>
                  </div>
                  
                  <div class="box-body">
                        <div class="box-header with-border">
                        <div class="col-md-3">
                         <label>Import Melalui Excel (.csv)</label>
                        </div>
                          <div class="col-md-9">
                            <form action="import_mall" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <input type="file" name="csv_file">
                            <br>
                            <p><input type="submit" value="Upload"></p>
                            </form>
                          </div>  
                        </div>
                  </div>
                
                {!! Form::open(['action' => 'MallController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">

                          <div class="row">
                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="Mall PNJ" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="Mall adalah tempat dimmana kita bisa membeli barang-barang yang ingin kita beli"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Ridwan Rais no.2"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kecamatan</label>
                              </div>
                              <div class="col-md-9">
                                <select class="form-control" name="kecamatan">
                                  <option></option>
                                  <option value="Beji">Beji</option>
                                  <option value="Bojongsari">Bojongsari</option>
                                  <option value="Cimanggis">Cimanggis</option>
                                  <option value="Cinere">Cinere</option>
                                  <option value="Cilodong">Cilodong</option>
                                  <option value="Cipayung">Cipayung</option>
                                  <option value="Limo">Limo</option>
                                  <option value="Pancoran Mas">Pancoran Mas</option>
                                  <option value="Sawangan">Sawangan</option>
                                  <option value="Sukmajaya">Sukmajaya</option>
                                  <option value="Tapos">Tapos</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Upload foto</label>
                              </div>
                              <div class="col-md-9">
                                {{Form::file('foto')}}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}

                      </div>
                    </div>
                  </div>
                </div>
{{-- ============================================================================================================ --}}
                <div class="tab-pane" id="smarket">
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion-ios-cart-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Supermarket</h4></span>
                    </div>
                  </div>
                  <div class="box-body">
                        <div class="box-header with-border">
                        <div class="col-md-3">
                         <label>Import Melalui Excel (.csv)</label>
                        </div>
                          <div class="col-md-9">
                            <form action="import_pasar" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <input type="file" name="csv_file">
                            <br>
                            <p><input type="submit" value="Upload"></p>
                            </form>
                          </div>  
                        </div>
                  </div>
                
                {!! Form::open(['action' => 'PasarController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">

                          <div class="row">
                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="Supermarket PNJ" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="Supermarket adalah tempat pembeli membeli barang yang diiinginkannya"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Ridwan Rais no.2"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kecamatan</label>
                              </div>
                              <div class="col-md-9">
                                <select class="form-control" name="kecamatan">
                                  <option></option>
                                  <option value="Beji">Beji</option>
                                  <option value="Bojongsari">Bojongsari</option>
                                  <option value="Cimanggis">Cimanggis</option>
                                  <option value="Cinere">Cinere</option>
                                  <option value="Cilodong">Cilodong</option>
                                  <option value="Cipayung">Cipayung</option>
                                  <option value="Limo">Limo</option>
                                  <option value="Pancoran Mas">Pancoran Mas</option>
                                  <option value="Sawangan">Sawangan</option>
                                  <option value="Sukmajaya">Sukmajaya</option>
                                  <option value="Tapos">Tapos</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Upload foto</label>
                              </div>
                              <div class="col-md-9">
                                {{Form::file('foto')}}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
{{-- ============================================================================================================= --}}
                <div class="tab-pane" id="pasar">
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion-ios-cart-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Pasar</h4></span>
                    </div>
                  </div>

                  <div class="box-body">
                        <div class="box-header with-border">
                        <div class="col-md-3">
                         <label>Import Melalui Excel (.csv)</label>
                        </div>
                          <div class="col-md-9">
                            <form action="import_pasar" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <input type="file" name="csv_file">
                            <br>
                            <p><input type="submit" value="Upload"></p>
                            </form>
                          </div>  
                        </div>
                  </div>
                
                {!! Form::open(['action' => 'PasarController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">

                          <div class="row">
                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="Pasar kemiri" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="Pasar berada dekat dengan stasiun depok baru"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Ridwan Rais no.2"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kecamatan</label>
                              </div>
                              <div class="col-md-9">
                                <select class="form-control" name="kecamatan">
                                  <option></option>
                                  <option value="Beji">Beji</option>
                                  <option value="Bojongsari">Bojongsari</option>
                                  <option value="Cimanggis">Cimanggis</option>
                                  <option value="Cinere">Cinere</option>
                                  <option value="Cilodong">Cilodong</option>
                                  <option value="Cipayung">Cipayung</option>
                                  <option value="Limo">Limo</option>
                                  <option value="Pancoran Mas">Pancoran Mas</option>
                                  <option value="Sawangan">Sawangan</option>
                                  <option value="Sukmajaya">Sukmajaya</option>
                                  <option value="Tapos">Tapos</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Upload foto</label>
                              </div>
                              <div class="col-md-9">
                                {{Form::file('foto')}}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
{{-- ============================================================================================================ --}}
                <!-- SOSIAL -->

                <div class="tab-pane" id="panti">
                  
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion-ios-heart-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Panti Asuhan</h4></span>
                    </div>
                  </div>

                  <div class="box-body">
                        <div class="box-header with-border">
                        <div class="col-md-3">
                         <label>Import Melalui Excel (.csv)</label>
                        </div>
                          <div class="col-md-9">
                            <form action="import_panti" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <input type="file" name="csv_file">
                            <br>
                            <p><input type="submit" value="Upload"></p>
                            </form>
                          </div>  
                        </div>
                  </div>

{!! Form::open(['action' => 'PantiController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">
                          <div class="row">
                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nama Panti</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_panti" placeholder="Panti Abang Adik" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Penanggung Jawab</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_pj" placeholder="Tegar Beriman" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="kontak" placeholder="0212158389">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Jumlah Anak</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="jumlah_anak" placeholder="120">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Jumlah Anak Angkat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="jumlah_anak_angkat" placeholder="20">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Deskripsi</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="deskripsi" placeholder="Panti sangat sejuk berada di pertigaan gang kober"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kecamatan</label>
                              </div>
                              <div class="col-md-9">
                                <select class="form-control" name="kecamatan">
                                  <option></option>
                                  <option value="Beji">Beji</option>
                                  <option value="Bojongsari">Bojongsari</option>
                                  <option value="Cimanggis">Cimanggis</option>
                                  <option value="Cinere">Cinere</option>
                                  <option value="Cilodong">Cilodong</option>
                                  <option value="Cipayung">Cipayung</option>
                                  <option value="Limo">Limo</option>
                                  <option value="Pancoran Mas">Pancoran Mas</option>
                                  <option value="Sawangan">Sawangan</option>
                                  <option value="Sukmajaya">Sukmajaya</option>
                                  <option value="Tapos">Tapos</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Ridwan Rais no.2"></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
{{-- ========================================================================================================= --}}


                  <div class="tab-pane" id="kom">
                  
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion-ios-heart-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Komunitas</h4></span>
                    </div>
                  </div>

                  <div class="box-body">
                        <div class="box-header with-border">
                        <div class="col-md-3">
                         <label>Import Melalui Excel (.csv)</label>
                        </div>
                          <div class="col-md-9">
                            <form action="import_komunitas" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <input type="file" name="csv_file">
                            <br>
                            <p><input type="submit" value="Upload"></p>
                            </form>
                          </div>  
                        </div>
                  </div>

{!! Form::open(['action' => 'KomunitasController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">
                          <div class="row">
                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nama Komunitas</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_komunitas" placeholder="Chicken College Lover" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kategori Komunitas</label>
                              </div>
                              <div class="col-md-9">
                                <select class="form-control" name="kategori_komunitas">
                                  <option></option>
                                  <option value="Sosial">Sosial</option>
                                  <option value="Seni">Seni</option>
                                  <option value="Pendidikan">Pendidikan</option>
                                  <option value="Kecantikan">Kecantikan</option>
                                  <option value="Budaya">Budaya</option>
                                  <option value="Olahraga">Olahraga</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat_komunitas" placeholder="Beji Timur"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Deskripsi Komunitas</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="deskripsi_komunitas" placeholder="Chicken College Lover adalah suatu sarana untuk para pecinta ayam, komunitas ini juga digunakan sebagai sarana sharing dan charity untuk para penyuka ayam di kampus "></textarea>
                              </div>
                            </div>

                            {{-- <div class="form-group">
                              <div class="col-md-3">
                                <label>ID Partner</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="id_partner" placeholder="ID_Partner">
                              </div>
                            </div> --}}

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kontak</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="kontak_komunitas" placeholder="085715720688">
                              </div>  
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Email</label>
                              </div>
                              <div class="col-md-9">
                                <input type="email" class="form-control" rows="3" name="email_komunitas" placeholder="komunitasdepokgmail.com">
                              </div>  
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Note</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="note_komunitas" placeholder="Persyaratan belum lengkap" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Foto Komunitas</label>
                              </div>
                              <div class="col-md-9">
                                {{Form::file('foto_komunitas')}}
                              </div>
                            </div>

                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>



{{-- ========================================================================================================= --}}
                <!-- PARIWISATA -->

                <div class="tab-pane" id="kuliner">
                  
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion-ios-cloud-outline"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Kuliner</h4></span>
                    </div>
                  </div>

                  <div class="box-body">
                        <div class="box-header with-border">
                        <div class="col-md-3">
                         <label>Import Melalui Excel (.csv)</label>
                        </div>
                          <div class="col-md-9">
                            <form action="import_kuliner" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <input type="file" name="csv_file">
                            <br>
                            <p><input type="submit" value="Upload"></p>
                            </form>
                          </div>  
                        </div>
                  </div>
                
                {!! Form::open(['action' => 'KulinerController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">

                          <div class="row">
                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="Restoran Enak Banget" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="Restoran berada di lantai 2 ITC, tempatnya bersih dan ada wifinya"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Margonda Rais no.2"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kecamatan</label>
                              </div>
                              <div class="col-md-9">
                                <select class="form-control" name="kecamatan">
                                  <option></option>
                                  <option value="Beji">Beji</option>
                                  <option value="Bojongsari">Bojongsari</option>
                                  <option value="Cimanggis">Cimanggis</option>
                                  <option value="Cinere">Cinere</option>
                                  <option value="Cilodong">Cilodong</option>
                                  <option value="Cipayung">Cipayung</option>
                                  <option value="Limo">Limo</option>
                                  <option value="Pancoran Mas">Pancoran Mas</option>
                                  <option value="Sawangan">Sawangan</option>
                                  <option value="Sukmajaya">Sukmajaya</option>
                                  <option value="Tapos">Tapos</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Upload foto</label>
                              </div>
                              <div class="col-md-9">
                                {{Form::file('foto')}}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>

         
     {{-- ================================================================================================= --}}
                      {{-- Pariwisata --}}
                    <div class="tab-pane" id="wisata">
                  
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion-ios-cloud-outline"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Wisata</h4></span>
                    </div>
                  </div>

                  <div class="box-body">
                        <div class="box-header with-border">
                        <div class="col-md-3">
                         <label>Import Melalui Excel (.csv)</label>
                        </div>
                          <div class="col-md-9">
                            <form action="import_wisata" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <input type="file" name="csv_file">
                            <br>
                            <p><input type="submit" value="Upload"></p>
                            </form>
                          </div>  
                        </div>
                  </div>
                
                {!! Form::open(['action' => 'WisataController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">

                          <div class="row">
                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="Restoran Enak Banget" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="Restoran berada di lantai 2 ITC, tempatnya bersih dan ada wifinya"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Margonda Rais no.2"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kecamatan</label>
                              </div>
                              <div class="col-md-9">
                                <select class="form-control" name="kecamatan">
                                  <option></option>
                                  <option value="Beji">Beji</option>
                                  <option value="Bojongsari">Bojongsari</option>
                                  <option value="Cimanggis">Cimanggis</option>
                                  <option value="Cinere">Cinere</option>
                                  <option value="Cilodong">Cilodong</option>
                                  <option value="Cipayung">Cipayung</option>
                                  <option value="Limo">Limo</option>
                                  <option value="Pancoran Mas">Pancoran Mas</option>
                                  <option value="Sawangan">Sawangan</option>
                                  <option value="Sukmajaya">Sukmajaya</option>
                                  <option value="Tapos">Tapos</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Upload foto</label>
                              </div>
                              <div class="col-md-9">
                                {{Form::file('foto')}}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
    
    {{-- ===================================================================================================== --}}

                <div class="tab-pane" id="olahraga">
                  
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion-ios-americanfootball-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Olahraga</h4></span>
                    </div>
                  </div>

                  <div class="box-body">
                        <div class="box-header with-border">
                        <div class="col-md-3">
                         <label>Import Melalui Excel (.csv)</label>
                        </div>
                          <div class="col-md-9">
                            <form action="import_olahraga" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <input type="file" name="csv_file">
                            <br>
                            <p><input type="submit" value="Upload"></p>
                            </form>
                          </div>  
                        </div>
                  </div>
                
                {!! Form::open(['action' => 'OlahragaController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">

                          <div class="row">
                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="Gor SIMA" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="Mempunyai 3 lapangan dengan sarana yang lengkap"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Ridwan Rais no.2"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kecamatan</label>
                              </div>
                              <div class="col-md-9">
                                <select class="form-control" name="kecamatan">
                                  <option></option>
                                  <option value="Beji">Beji</option>
                                  <option value="Bojongsari">Bojongsari</option>
                                  <option value="Cimanggis">Cimanggis</option>
                                  <option value="Cinere">Cinere</option>
                                  <option value="Cilodong">Cilodong</option>
                                  <option value="Cipayung">Cipayung</option>
                                  <option value="Limo">Limo</option>
                                  <option value="Pancoran Mas">Pancoran Mas</option>
                                  <option value="Sawangan">Sawangan</option>
                                  <option value="Sukmajaya">Sukmajaya</option>
                                  <option value="Tapos">Tapos</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Upload foto</label>
                              </div>
                              <div class="col-md-9">
                                {{Form::file('foto')}}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}

                      </div>
                    </div>
                  </div>
                </div>
{{-- ========================================================================================================= --}}
                <!-- TRANSPORTASI -->

                <div class="tab-pane" id="angkot">
                  
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion-ios-speedometer-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Angkot</h4></span>
                    </div>
                  </div>


                  <div class="box-body">
                        <div class="box-header with-border">
                        <div class="col-md-3">
                         <label>Import Melalui Excel (.csv)</label>
                        </div>
                          <div class="col-md-9">
                            <form action="import_angkot" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <input type="file" name="csv_file">
                            <br>
                            <p><input type="submit" value="Upload"></p>
                            </form>
                          </div>  
                        </div>
                  </div>
                
                {!! Form::open(['action' => 'AngkotController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">
                          <div class="row">

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kode Trayek</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="kode_trayek" placeholder="D.01">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Trayek</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="trayek" placeholder="Terminal Depok - Depok Dalam PP"></input>
                              </div>  
                            </div>

                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
{{-- ========================================================================================================= --}}
                <div class="tab-pane" id="pengiriman">
                  
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion-ios-speedometer-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Jasa Pengiriman</h4></span>
                    </div>
                  </div>

                 <div class="box-body">
                        <div class="box-header with-border">
                        <div class="col-md-3">
                         <label>Import Melalui Excel (.csv)</label>
                        </div>
                          <div class="col-md-9">
                            <form action="import_jpengiriman" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <input type="file" name="csv_file">
                            <br>
                            <p><input type="submit" value="Upload"></p>
                            </form>
                          </div>  
                        </div>
                  </div>
                
                {!! Form::open(['action' => 'JpengirimanController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">

                          <div class="row">
                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="TIKI TAKA" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="Sebuah pengeriman barang dengan service yang cepat"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Ridwan Rais no.2"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kecamatan</label>
                              </div>
                              <div class="col-md-9">
                                <select class="form-control" name="kecamatan">
                                  <option></option>
                                  <option value="Beji">Beji</option>
                                  <option value="Bojongsari">Bojongsari</option>
                                  <option value="Cimanggis">Cimanggis</option>
                                  <option value="Cinere">Cinere</option>
                                  <option value="Cilodong">Cilodong</option>
                                  <option value="Cipayung">Cipayung</option>
                                  <option value="Limo">Limo</option>
                                  <option value="Pancoran Mas">Pancoran Mas</option>
                                  <option value="Sawangan">Sawangan</option>
                                  <option value="Sukmajaya">Sukmajaya</option>
                                  <option value="Tapos">Tapos</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Upload foto</label>
                              </div>
                              <div class="col-md-9">
                                {{Form::file('foto')}}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
{{-- =========================================================================================================== --}}
                <!-- FASILITAS UMUM -->

                <!-- KEPENDUDUKAN -->

                <div class="tab-pane" id="kelurahan">
                  
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion-ios-people-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Kelurahan</h4></span>
                    </div>
                  </div>

                  <div class="box-body">
                        <div class="box-header with-border">
                        <div class="col-md-3">
                         <label>Import Melalui Excel (.csv)</label>
                        </div>
                          <div class="col-md-9">
                            <form action="import_kelurahan" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <input type="file" name="csv_file">
                            <br>
                            <p><input type="submit" value="Upload"></p>
                            </form>
                          </div>  
                        </div>
                  </div>
                
                {!! Form::open(['action' => 'KelurahanController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">
                          <div class="row">

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nama Kelurahan</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="kelurahan" placeholder="Beji"  width="50%">
                              </div>
                            </div>

                             <div class="form-group">
                              <div class="col-md-3">
                                <label>Nama Lurah</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="lurah" placeholder="Drs.Tarno">
                              </div>
                            </div>


                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="Rindang dan asri"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Beji Timur"></textarea>
                              </div>
                            </div>

                           

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                            <input type="number" class="form-control" name="no_telp" placeholder="01012325671090" >
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kecamatan</label>
                              </div>
                              <div class="col-md-9">
                                <select class="form-control" name="kecamatan">
                                  <option></option>
                                  <option value="Beji">Beji</option>
                                  <option value="Bojongsari">Bojongsari</option>
                                  <option value="Cimanggis">Cimanggis</option>
                                  <option value="Cinere">Cinere</option>
                                  <option value="Cilodong">Cilodong</option>
                                  <option value="Cipayung">Cipayung</option>
                                  <option value="Limo">Limo</option>
                                  <option value="Pancoran Mas">Pancoran Mas</option>
                                  <option value="Sawangan">Sawangan</option>
                                  <option value="Sukmajaya">Sukmajaya</option>
                                  <option value="Tapos">Tapos</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915"  width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.Beji.com"  width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Upload foto</label>
                              </div>
                              <div class="col-md-9">
                                {{Form::file('foto')}}
                              </div>
                            </div>

                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
{{-- ========================================================================================================== --}}
                <div class="tab-pane" id="kecamatan">
                  
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion-ios-people-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Kecamatan</h4></span>
                    </div>
                  </div>

                  {!! Form::open(['action' => 'KecamatanController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">
                          <div class="row">

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nama Camat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_camat" placeholder="Drs. Henry">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>No Telpon</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="no_telp" placeholder="085215833089">
                              </div>
                            </div>


                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kecamatan</label>
                              </div>
                              <div class="col-md-9">
                                <select class="form-control" name="nama_kecamatan">
                                  <option></option>
                                  <option value="Beji">Beji</option>
                                  <option value="Bojongsari">Bojongsari</option>
                                  <option value="Cimanggis">Cimanggis</option>
                                  <option value="Cinere">Cinere</option>
                                  <option value="Cilodong">Cilodong</option>
                                  <option value="Cipayung">Cipayung</option>
                                  <option value="Limo">Limo</option>
                                  <option value="Pancoran Mas">Pancoran Mas</option>
                                  <option value="Sawangan">Sawangan</option>
                                  <option value="Sukmajaya">Sukmajaya</option>
                                  <option value="Tapos">Tapos</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="jln. Beji Timur no.12"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Upload foto</label>
                              </div>
                              <div class="col-md-9">
                                {{Form::file('foto_kecamatan')}}
                              </div>
                            </div>

                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
{{-- ========================================================================================================== --}}
                <div class="tab-pane" id="jumlahpenduduk">
                  
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion-ios-people-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Jumlah Penduduk Kelurahan</h4></span>
                    </div>
                  </div>

                  <div class="box-body">
                        <div class="box-header with-border">
                        <div class="col-md-3">
                         <label>Import Melalui Excel (.csv)</label>
                        </div>
                          <div class="col-md-9">
                            <form action="import_penduduk" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <input type="file" name="csv_file">
                            <br>
                            <p><input type="submit" value="Upload"></p>
                            </form>
                          </div>  
                        </div>
                  </div>

                    {!! Form::open(['action' => 'PendudukController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">
                          <div class="row">
                            
                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kecamatan</label>
                              </div>
                              <div class="col-md-9">
                                <select class="form-control" name="kecamatan">
                                  <option></option>
                                  <option value="Beji">Beji</option>
                                  <option value="Bojongsari">Bojongsari</option>
                                  <option value="Cimanggis">Cimanggis</option>
                                  <option value="Cinere">Cinere</option>
                                  <option value="Cilodong">Cilodong</option>
                                  <option value="Cipayung">Cipayung</option>
                                  <option value="Limo">Limo</option>
                                  <option value="Pancoran Mas">Pancoran Mas</option>
                                  <option value="Sawangan">Sawangan</option>
                                  <option value="Sukmajaya">Sukmajaya</option>
                                  <option value="Tapos">Tapos</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kelurahan</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="kelurahan" placeholder="Beji timur"></input>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Laki-laki</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="laki_laki" placeholder="200000">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Perempuan</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="perempuan" placeholder="200000">
                              </div>
                            </div>

                          </div>
                        </div>
                        
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
{{-- ========================================================================================================== --}}
                        {{-- INSTANSI --}}

            <div class="tab-pane" id="pdam">
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion ion-ios-briefcase-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>PDAM</h4></span>
                    </div>
                  </div>

                   <div class="box-body">
                        <div class="box-header with-border">
                        <div class="col-md-3">
                         <label>Import Melalui Excel (.csv)</label>
                        </div>
                          <div class="col-md-9">
                            <form action="import_pdam" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <input type="file" name="csv_file">
                            <br>
                            <p><input type="submit" value="Upload"></p>
                            </form>
                          </div>  
                        </div>
                  </div>
                  {!! Form::open(['action' => 'PdamController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">
                          <div class="row">
                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="PDAM Kota Depok" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="PDAM adalah suatu tempat untuk menyimpan sarana air bersih"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Ridwan Rais no.2"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kecamatan</label>
                              </div>
                              <div class="col-md-9">
                                <select class="form-control" name="kecamatan">
                                  <option></option>
                                  <option value="Beji">Beji</option>
                                  <option value="Bojongsari">Bojongsari</option>
                                  <option value="Cimanggis">Cimanggis</option>
                                  <option value="Cinere">Cinere</option>
                                  <option value="Cilodong">Cilodong</option>
                                  <option value="Cipayung">Cipayung</option>
                                  <option value="Limo">Limo</option>
                                  <option value="Pancoran Mas">Pancoran Mas</option>
                                  <option value="Sawangan">Sawangan</option>
                                  <option value="Sukmajaya">Sukmajaya</option>
                                  <option value="Tapos">Tapos</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Upload foto</label>
                              </div>
                              <div class="col-md-9">
                                {{Form::file('foto')}}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>

{{-- ========================================================================================================= --}}
<div class="tab-pane" id="pospolisi">
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion ion-ios-briefcase-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>POS POLISI</h4></span>
                    </div>
                  </div>

                   <div class="box-body">
                        <div class="box-header with-border">
                        <div class="col-md-3">
                         <label>Import Melalui Excel (.csv)</label>
                        </div>
                          <div class="col-md-9">
                            <form action="import_pospolisi" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <input type="file" name="csv_file">
                            <br>
                            <p><input type="submit" value="Upload"></p>
                            </form>
                          </div>  
                        </div>
                  </div>
                  {!! Form::open(['action' => 'PospolisiController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">
                          <div class="row">
                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="Pos Polisi Depok" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="Keadaan tempat tempat pos polisi berada"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Ridwan Rais no.2"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kecamatan</label>
                              </div>
                              <div class="col-md-9">
                                <select class="form-control" name="kecamatan">
                                  <option></option>
                                  <option value="Beji">Beji</option>
                                  <option value="Bojongsari">Bojongsari</option>
                                  <option value="Cimanggis">Cimanggis</option>
                                  <option value="Cinere">Cinere</option>
                                  <option value="Cilodong">Cilodong</option>
                                  <option value="Cipayung">Cipayung</option>
                                  <option value="Limo">Limo</option>
                                  <option value="Pancoran Mas">Pancoran Mas</option>
                                  <option value="Sawangan">Sawangan</option>
                                  <option value="Sukmajaya">Sukmajaya</option>
                                  <option value="Tapos">Tapos</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Upload foto</label>
                              </div>
                              <div class="col-md-9">
                                {{Form::file('foto')}}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
{{-- ========================================================================================================= --}}
<div class="tab-pane" id="pln">
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion ion-ios-briefcase-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>PLN</h4></span>
                    </div>
                  </div>

                   <div class="box-body">
                        <div class="box-header with-border">
                        <div class="col-md-3">
                         <label>Import Melalui Excel (.csv)</label>
                        </div>
                          <div class="col-md-9">
                            <form action="import_pln" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <input type="file" name="csv_file">
                            <br>
                            <p><input type="submit" value="Upload"></p>
                            </form>
                          </div>  
                        </div>
                  </div>
                  {!! Form::open(['action' => 'PlnController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">
                          <div class="row">
                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="PLN Kota Depok" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="PLN adalah tempat dimana suplai listrik depok berada"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Ridwan Rais no.2"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kecamatan</label>
                              </div>
                              <div class="col-md-9">
                                <select class="form-control" name="kecamatan">
                                  <option></option>
                                  <option value="Beji">Beji</option>
                                  <option value="Bojongsari">Bojongsari</option>
                                  <option value="Cimanggis">Cimanggis</option>
                                  <option value="Cinere">Cinere</option>
                                  <option value="Cilodong">Cilodong</option>
                                  <option value="Cipayung">Cipayung</option>
                                  <option value="Limo">Limo</option>
                                  <option value="Pancoran Mas">Pancoran Mas</option>
                                  <option value="Sawangan">Sawangan</option>
                                  <option value="Sukmajaya">Sukmajaya</option>
                                  <option value="Tapos">Tapos</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Upload foto</label>
                              </div>
                              <div class="col-md-9">
                                {{Form::file('foto')}}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
{{-- ========================================================================================================= --}}
<div class="tab-pane" id="spbu">
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion ion-ios-briefcase-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>SPBU</h4></span>
                    </div>
                  </div>

                   <div class="box-body">
                        <div class="box-header with-border">
                        <div class="col-md-3">
                         <label>Import Melalui Excel (.csv)</label>
                        </div>
                          <div class="col-md-9">
                            <form action="import_spbu" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <input type="file" name="csv_file">
                            <br>
                            <p><input type="submit" value="Upload"></p>
                            </form>
                          </div>  
                        </div>
                  </div>
                  {!! Form::open(['action' => 'SpbuController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">
                          <div class="row">
                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="SPBU Kota Depok" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="SPBU tempat untuk mengisi bahan bakar kendaraan"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Ridwan Rais no.2"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kecamatan</label>
                              </div>
                              <div class="col-md-9">
                                <select class="form-control" name="kecamatan">
                                  <option></option>
                                  <option value="Beji">Beji</option>
                                  <option value="Bojongsari">Bojongsari</option>
                                  <option value="Cimanggis">Cimanggis</option>
                                  <option value="Cinere">Cinere</option>
                                  <option value="Cilodong">Cilodong</option>
                                  <option value="Cipayung">Cipayung</option>
                                  <option value="Limo">Limo</option>
                                  <option value="Pancoran Mas">Pancoran Mas</option>
                                  <option value="Sawangan">Sawangan</option>
                                  <option value="Sukmajaya">Sukmajaya</option>
                                  <option value="Tapos">Tapos</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Upload foto</label>
                              </div>
                              <div class="col-md-9">
                                {{Form::file('foto')}}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
{{-- ========================================================================================================= --}}
<div class="tab-pane" id="damkar">
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion ion-ios-briefcase-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>DAMKAR</h4></span>
                    </div>
                  </div>

                   <div class="box-body">
                        <div class="box-header with-border">
                        <div class="col-md-3">
                         <label>Import Melalui Excel (.csv)</label>
                        </div>
                          <div class="col-md-9">
                            <form action="import_damkar" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <input type="file" name="csv_file">
                            <br>
                            <p><input type="submit" value="Upload"></p>
                            </form>
                          </div>  
                        </div>
                  </div>
                  {!! Form::open(['action' => 'DamkarController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">
                          <div class="row">
                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="Damkar Kota Depok" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="DAMKAR adalah petugas pemadam kebakaran"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Ridwan Rais no.2"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kecamatan</label>
                              </div>
                              <div class="col-md-9">
                                <select class="form-control" name="kecamatan">
                                  <option></option>
                                  <option value="Beji">Beji</option>
                                  <option value="Bojongsari">Bojongsari</option>
                                  <option value="Cimanggis">Cimanggis</option>
                                  <option value="Cinere">Cinere</option>
                                  <option value="Cilodong">Cilodong</option>
                                  <option value="Cipayung">Cipayung</option>
                                  <option value="Limo">Limo</option>
                                  <option value="Pancoran Mas">Pancoran Mas</option>
                                  <option value="Sawangan">Sawangan</option>
                                  <option value="Sukmajaya">Sukmajaya</option>
                                  <option value="Tapos">Tapos</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Upload foto</label>
                              </div>
                              <div class="col-md-9">
                                {{Form::file('foto')}}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
{{-- ========================================================================================================= --}}
<div class="tab-pane" id="tni">
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion ion-ios-briefcase-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>TNI</h4></span>
                    </div>
                  </div>

                   <div class="box-body">
                        <div class="box-header with-border">
                        <div class="col-md-3">
                         <label>Import Melalui Excel (.csv)</label>
                        </div>
                          <div class="col-md-9">
                            <form action="import_tni" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <input type="file" name="csv_file">
                            <br>
                            <p><input type="submit" value="Upload"></p>
                            </form>
                          </div>  
                        </div>
                  </div>
                  {!! Form::open(['action' => 'TniController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">
                          <div class="row">
                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="TNI Kota Depok" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="TNI adalah intansi yang bertugas untuk menjaga keamanan negara"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Ridwan Rais no.2"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kecamatan</label>
                              </div>
                              <div class="col-md-9">
                                <select class="form-control" name="kecamatan">
                                  <option></option>
                                  <option value="Beji">Beji</option>
                                  <option value="Bojongsari">Bojongsari</option>
                                  <option value="Cimanggis">Cimanggis</option>
                                  <option value="Cinere">Cinere</option>
                                  <option value="Cilodong">Cilodong</option>
                                  <option value="Cipayung">Cipayung</option>
                                  <option value="Limo">Limo</option>
                                  <option value="Pancoran Mas">Pancoran Mas</option>
                                  <option value="Sawangan">Sawangan</option>
                                  <option value="Sukmajaya">Sukmajaya</option>
                                  <option value="Tapos">Tapos</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Upload foto</label>
                              </div>
                              <div class="col-md-9">
                                {{Form::file('foto')}}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
{{-- ========================================================================================================= --}}

                <!-- Fasilitas Umum -->

    <div class="tab-pane" id="tibadah">
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion ion-ios-briefcase-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Tempat Ibadah</h4></span>
                    </div>
                  </div>

                   <div class="box-body">
                        <div class="box-header with-border">
                        <div class="col-md-3">
                         <label>Import Melalui Excel (.csv)</label>
                        </div>
                          <div class="col-md-9">
                            <form action="import_tibadah" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <input type="file" name="csv_file">
                            <br>
                            <p><input type="submit" value="Upload"></p>
                            </form>
                          </div>  
                        </div>
                  </div>
                  {!! Form::open(['action' => 'TibadahController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">
                          <div class="row">
                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="Mesjid Ar-Rahman" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="Mesjid dengan 2 lantai yang sejuk"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Ridwan Rais no.2"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kecamatan</label>
                              </div>
                              <div class="col-md-9">
                                <select class="form-control" name="kecamatan">
                                  <option></option>
                                  <option value="Beji">Beji</option>
                                  <option value="Bojongsari">Bojongsari</option>
                                  <option value="Cimanggis">Cimanggis</option>
                                  <option value="Cinere">Cinere</option>
                                  <option value="Cilodong">Cilodong</option>
                                  <option value="Cipayung">Cipayung</option>
                                  <option value="Limo">Limo</option>
                                  <option value="Pancoran Mas">Pancoran Mas</option>
                                  <option value="Sawangan">Sawangan</option>
                                  <option value="Sukmajaya">Sukmajaya</option>
                                  <option value="Tapos">Tapos</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Upload foto</label>
                              </div>
                              <div class="col-md-9">
                                {{Form::file('foto')}}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>

                
{{-- ========================================================================================================= --}}

 <div class="tab-pane" id="tpu">
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion ion-ios-briefcase-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>TPU</h4></span>
                    </div>
                  </div>

                   <div class="box-body">
                        <div class="box-header with-border">
                        <div class="col-md-3">
                         <label>Import Melalui Excel (.csv)</label>
                        </div>
                          <div class="col-md-9">
                            <form action="import_tpu" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <input type="file" name="csv_file">
                            <br>
                            <p><input type="submit" value="Upload"></p>
                            </form>
                          </div>  
                        </div>
                  </div>
                  {!! Form::open(['action' => 'TpuController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">
                          <div class="row">
                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="TPU Margonda" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="Tempat kita untuk melakukan Pemilihan Umum"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Ridwan Rais no.2"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kecamatan</label>
                              </div>
                              <div class="col-md-9">
                                <select class="form-control" name="kecamatan">
                                  <option></option>
                                  <option value="Beji">Beji</option>
                                  <option value="Bojongsari">Bojongsari</option>
                                  <option value="Cimanggis">Cimanggis</option>
                                  <option value="Cinere">Cinere</option>
                                  <option value="Cilodong">Cilodong</option>
                                  <option value="Cipayung">Cipayung</option>
                                  <option value="Limo">Limo</option>
                                  <option value="Pancoran Mas">Pancoran Mas</option>
                                  <option value="Sawangan">Sawangan</option>
                                  <option value="Sukmajaya">Sukmajaya</option>
                                  <option value="Tapos">Tapos</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Upload foto</label>
                              </div>
                              <div class="col-md-9">
                                {{Form::file('foto')}}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>



{{-- ========================================================================================================= --}}

<div class="tab-pane" id="taman">
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion ion-ios-briefcase-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>TAMAN</h4></span>
                    </div>
                  </div>

                   <div class="box-body">
                        <div class="box-header with-border">
                        <div class="col-md-3">
                         <label>Import Melalui Excel (.csv)</label>
                        </div>
                          <div class="col-md-9">
                            <form action="import_taman" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <input type="file" name="csv_file">
                            <br>
                            <p><input type="submit" value="Upload"></p>
                            </form>
                          </div>  
                        </div>
                  </div>
                  {!! Form::open(['action' => 'TamanController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">
                          <div class="row">
                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="Taman Beji" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="Susasannya sejuk dan menenangkan"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Ridwan Rais no.2"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Kecamatan</label>
                              </div>
                              <div class="col-md-9">
                                <select class="form-control" name="kecamatan">
                                  <option></option>
                                  <option value="Beji">Beji</option>
                                  <option value="Bojongsari">Bojongsari</option>
                                  <option value="Cimanggis">Cimanggis</option>
                                  <option value="Cinere">Cinere</option>
                                  <option value="Cilodong">Cilodong</option>
                                  <option value="Cipayung">Cipayung</option>
                                  <option value="Limo">Limo</option>
                                  <option value="Pancoran Mas">Pancoran Mas</option>
                                  <option value="Sawangan">Sawangan</option>
                                  <option value="Sukmajaya">Sukmajaya</option>
                                  <option value="Tapos">Tapos</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-3">
                                <label>Upload foto</label>
                              </div>
                              <div class="col-md-9">
                                {{Form::file('foto')}}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn" style="width:100%; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>


{{-- ========================================================================================================= --}}


              </div><!-- /.tab-content -->
            </div><!--box body-->
          </div><!-- nav-tabs-custom -->
        </div><!--col-md-12-->
      </div><!--row-->
    </section>

    @endsection