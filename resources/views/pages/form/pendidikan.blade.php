{{-- @if(!Auth::guest())
@extends('auth.login')
@endif
 --}}
@extends('layouts.app')
@section('content')

    <section class="content-header">
      <h1 style="color:#807e7d"> 
       <b>INPUT DATA PENDIDIKAN</b>       
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
              <li><a href="#paud" data-toggle="tab">Paud</a></li>
              <li><a href="#sd" data-toggle="tab">SD</a></li>
              <li><a href="#slb" data-toggle="tab">SLB</a></li>
              <li><a href="#smp" data-toggle="tab">SMP</a></li>
              <li><a href="#sma" data-toggle="tab">SMA</a></li>
              <li><a href="#perpustakaan" data-toggle="tab">Perpustakaan</a></li>
              <li><a href="#universitas" data-toggle="tab">Universitas</a></li>             
            </ul>
            <div class="box-body border-radius-none">
              <div class="tab-content">

                <!--KESEHATAN-->
{{-- ============================================================================================================== --}}
                <div class="tab-pane active" id="paud">    
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion-ios-book-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Paud</h4></span>
                    </div>
                  </div>  
                    <div class="box-body">
                      <div class="box-header with-border">
                        <div class="col-md-12">
                            <form action="import_apotek" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                              <button type="button" class="btn btn-file btn-flat" style="background-color: black; color:white">Import Data<input type="file" name="csv_file"></button>
                              <button type="submit" class="btn btn-flat" data-dismiss="modal"><i class="ion ion-checkmark"></i></button>
                            </form>
                            <label style="font-size: 12px">Import Melalui Excel (.csv)</label>
                        </div> 
                      </div>
                    </div>
                
                {!! Form::open(['action' => 'PaudController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                <div class="box-body">
                  <div class="box-header with-border">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">
                          <div class="row content">
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="Paud Satu Bangsa " width="50%">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="Pendidikan anak usia dini (PAUD) adalah jenjang pendidikan sebelum jenjang pendidikan dasar yang merupakan suatu upaya pembinaan yang ditujukan bagi anak sejak lahir sampai dengan usia enam tahun yang dilakukan melalui pemberian rangsangan pendidikan untuk membantu pertumbuhan dan perkembangan jasmani dan rohani agar anak memiliki kesiapan dalam memasuki pendidikan lebih lanjut, yang diselenggarakan pada jalur formal, nonformal, dan informal."></textarea>
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Beji Timur"></textarea>
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
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
                              <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Foto</label>
                              </div>
                              <div class="col-md-9">
                                <div class="btn btn-default btn-flat btn-file" style="width:100px;">Upload 
                                    {{Form::file('foto')}}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer pull-right">
                          <button type="submit" class="btn btn-flat" style="width:100px; background-color: black; color:white">Submit</button>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
{{-- ================================================================================================================--}}

                <div class="tab-pane" id="sd">
                  
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion-ios-book-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Sekolah Dasar</h4></span>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="box-header with-border">
                      <div class="col-md-12">
                            <form action="import_rs" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                              <button type="button" class="btn btn-file btn-flat" style="background-color: black; color:white">Import Data<input type="file" name="csv_file"></button>
                              <button type="submit" class="btn btn-flat" data-dismiss="modal"><i class="ion ion-checkmark"></i></button>
                            </form>
                            <label style="font-size: 12px">Import Melalui Excel (.csv)</label>
                      </div> 
                    </div>
                  </div>
                  {!! Form::open(['action' => 'PdController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                  <div class="box-body">
                  <div class="box-header with-border">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">
                          <div class="row content">
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="SD Satu Bangsa" width="50%">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="Sekolah dasar (disingkat SD; bahasa Inggris: Elementary School atau Primary School) adalah jenjang paling dasar pada pendidikan formal di Indonesia. Sekolah dasar ditempuh dalam waktu 6 tahun, mulai dari kelas 1 sampai kelas 6."></textarea>
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Ridwan Rais no.2"></textarea>
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
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
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Foto</label>
                              </div>
                              <div class="col-md-9">
                                <div class="btn btn-default btn-flat btn-file" style="width:100px;">Upload 
                                    {{Form::file('foto')}}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer pull-right">
                          <div class="box-header with-border">
                            <button type="submit" class="btn btn-flat" style="width:100px; background-color: black; color:white">Submit</button>
                          </div>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
                </div>
{{-- ================================================================================================================--}}

                <div class="tab-pane" id="slb">
                  
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion-ios-book-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Sekolah Luar Biasa</h4></span>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="box-header with-border">
                      <div class="col-md-12">
                            <form action="import_rs" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                              <button type="button" class="btn btn-file btn-flat" style="background-color: black; color:white">Import Data<input type="file" name="csv_file"></button>
                              <button type="submit" class="btn btn-flat" data-dismiss="modal"><i class="ion ion-checkmark"></i></button>
                            </form>
                            <label style="font-size: 12px">Import Melalui Excel (.csv)</label>
                      </div> 
                    </div>
                  </div>
                   {!! Form::open(['action' => 'SlbController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                  <div class="box-body">
                  <div class="box-header with-border">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">
                          <div class="row content">
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="SLB Satu Bangsa" width="50%">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="Sekolah Luar Biasa (SLB) adalah sekolah khusus bagi anak usia sekolah yang memiliki kebutuhan khusus."></textarea>
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Ridwan Rais no.2"></textarea>
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
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
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Foto</label>
                              </div>
                              <div class="col-md-9">
                                <div class="btn btn-default btn-flat btn-file" style="width:100px;">Upload 
                                    {{Form::file('foto')}}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer pull-right">
                          <div class="box-header with-border">
                            <button type="submit" class="btn btn-flat" style="width:100px; background-color: black; color:white">Submit</button>
                          </div>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
                </div>
{{-- ================================================================================================================--}}
                <div class="tab-pane" id="smp">                 
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion-ios-book-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Sekolah Menengah Pertama</h4></span>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="box-header with-border">
                      <div class="col-md-12">
                            <form action="import_rs" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                              <button type="button" class="btn btn-file btn-flat" style="background-color: black; color:white">Import Data<input type="file" name="csv_file"></button>
                              <button type="submit" class="btn btn-flat" data-dismiss="modal"><i class="ion ion-checkmark"></i></button>
                            </form>
                            <label style="font-size: 12px">Import Melalui Excel (.csv)</label>
                      </div> 
                    </div>
                  </div>
                  {!! Form::open(['action' => 'SmpController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                  <div class="box-body">
                  <div class="box-header with-border">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">
                          <div class="row content">
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="SMP Satu Bangsa" width="50%">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="Sekolah Menengah Pertama (disingkat SMP, bahasa Inggris: junior high school atau Middle School) adalah jenjang pendidikan dasar pada pendidikan formal di Indonesia setelah lulus sekolah dasar (atau sederajat)."></textarea>
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Ridwan Rais no.2"></textarea>
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
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
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Foto</label>
                              </div>
                              <div class="col-md-9">
                                <div class="btn btn-default btn-flat btn-file" style="width:100px;">Upload 
                                    {{Form::file('foto')}}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer pull-right">
                          <div class="box-header with-border">
                            <button type="submit" class="btn btn-flat" style="width:100px; background-color: black; color:white">Submit</button>
                          </div>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
                </div>
{{-- ============================================================================================================ --}}
                <div class="tab-pane" id="sma">
                    <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion-ios-book-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Sekolah Menengah Atas</h4></span>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="box-header with-border">
                      <div class="col-md-12">
                            <form action="import_rs" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                              <button type="button" class="btn btn-file btn-flat" style="background-color: black; color:white">Import Data<input type="file" name="csv_file"></button>
                              <button type="submit" class="btn btn-flat" data-dismiss="modal"><i class="ion ion-checkmark"></i></button>
                            </form>
                            <label style="font-size: 12px">Import Melalui Excel (.csv)</label>
                      </div> 
                    </div>
                  </div>
                 {!! Form::open(['action' => 'SmaController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                  <div class="box-body">
                  <div class="box-header with-border">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">
                          <div class="row content">
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="SMA Satu Bangsa" width="50%">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="Sekolah Menengah Atas (disingkat SMA; bahasa Inggris: Senior High School atau High School), adalah jenjang pendidikan menengah pada pendidikan formal di Indonesia setelah lulus Sekolah Menengah Pertama (atau sederajat)."></textarea>
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Ridwan Rais no.2"></textarea>
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
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
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Foto</label>
                              </div>
                              <div class="col-md-9">
                                <div class="btn btn-default btn-flat btn-file" style="width:100px;">Upload 
                                    {{Form::file('foto')}}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer pull-right">
                          <div class="box-header with-border">
                            <button type="submit" class="btn btn-flat" style="width:100px; background-color: black; color:white">Submit</button>
                          </div>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
                </div>

{{-- ============================================================================================================ --}}
                <div class="tab-pane" id="perpustakaan">
                                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion-ios-book-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Perpustakaan</h4></span>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="box-header with-border">
                      <div class="col-md-12">
                            <form action="import_rs" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                              <button type="button" class="btn btn-file btn-flat" style="background-color: black; color:white">Import Data<input type="file" name="csv_file"></button>
                              <button type="submit" class="btn btn-flat" data-dismiss="modal"><i class="ion ion-checkmark"></i></button>
                            </form>
                            <label style="font-size: 12px">Import Melalui Excel (.csv)</label>
                      </div> 
                    </div>
                  </div>
                  {!! Form::open(['action' => 'PerpusController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                  <div class="box-body">
                  <div class="box-header with-border">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">
                          <div class="row content">
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="Perpustakaan Umum " width="50%">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="Perpustakaan adalah sebuah koleksi buku dan majalah. Walaupun dapat diartikan sebagai koleksi pribadi perseorangan, namun perpustakaan lebih umum dikenal sebagai sebuah koleksi besar yang dibiayai dan dioperasikan oleh sebuah kota atau institusi, serta dimanfaatkan oleh masyarakat yang rata-rata tidak mampu membeli sekian banyak buku atas biaya sendiri."></textarea>
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Ridwan Rais no.2"></textarea>
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
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
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Foto</label>
                              </div>
                              <div class="col-md-9">
                                <div class="btn btn-default btn-flat btn-file" style="width:100px;">Upload 
                                    {{Form::file('foto')}}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer pull-right">
                          <div class="box-header with-border">
                            <button type="submit" class="btn btn-flat" style="width:100px; background-color: black; color:white">Submit</button>
                          </div>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
                </div>

              {{-- ============================================================================================================ --}}
                <div class="tab-pane" id="universitas">
                   <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion-ios-book-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Universitas</h4></span>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="box-header with-border">
                      <div class="col-md-12">
                            <form action="import_rs" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                              <button type="button" class="btn btn-file btn-flat" style="background-color: black; color:white">Import Data<input type="file" name="csv_file"></button>
                              <button type="submit" class="btn btn-flat" data-dismiss="modal"><i class="ion ion-checkmark"></i></button>
                            </form>
                            <label style="font-size: 12px">Import Melalui Excel (.csv)</label>
                      </div> 
                    </div>
                  </div>
                  {{-- {!! Form::open(['action' => 'PerpusController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!} --}}
                  <div class="box-body">
                  <div class="box-header with-border">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">
                          <div class="row content">
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Nama Tempat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_tempat" placeholder="Universitas Satu Bangsa" width="50%">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="Universitas adalah suatu institusi pendidikan tinggi dan penelitian, yang memberikan gelar akademik dalam berbagai bidang. Sebuah universitas menyediakan pendidikan sarjana dan pascasarjana. Kata universitas berasal dari bahasa Latin universitas magistrorum et scholarium, yang berarti komunitas guru dan akademisi."></textarea>
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Alamat</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Jl. Ridwan Rais no.2"></textarea>
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
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
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="no_telp" placeholder="0212158389">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Jam Operasional </label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="jam_operasional" placeholder="10.00 - 21.00"></input>
                              </div>  
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Koordinat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="koordinat" placeholder="-6.2029107, 106.791915" width="50%">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Website</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="website" placeholder="www.website.com">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Foto</label>
                              </div>
                              <div class="col-md-9">
                                <div class="btn btn-default btn-flat btn-file" style="width:100px;">Upload 
                                    {{Form::file('foto')}}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-footer pull-right">
                          <div class="box-header with-border">
                            <button type="submit" class="btn btn-flat" style="width:100px; background-color: black; color:white">Submit</button>
                          </div>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
                </div>






              </div><!-- /.tab-content -->
            </div><!--box body-->
          </div><!-- nav-tabs-custom -->
        </div><!--col-md-12-->
      </div><!--row-->
    </section>

    @endsection