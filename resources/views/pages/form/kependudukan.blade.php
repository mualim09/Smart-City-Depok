{{-- @if(!Auth::guest())
@extends('auth.login')
@endif
 --}}
@extends('layouts.app')
@section('content')

    <section class="content-header">
      <h1 style="color:#807e7d"> 
       <b>INPUT DATA KEPENDUDUKAN</b>       
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
              <li><a href="#kelurahan" data-toggle="tab">Kelurahan</a></li>
              <li><a href="#kecamatan" data-toggle="tab">Kecamatan</a></li>
              <li><a href="#penduduk" data-toggle="tab">Jumlah Penduduk</a></li>          
            </ul>
            <div class="box-body border-radius-none">
              <div class="tab-content">

                <!--KESEHATAN-->
{{-- ============================================================================================================== --}}
                <div class="tab-pane active" id="kelurahan">    
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion-ios-people-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Kelurahan</h4></span>
                    </div>
                  </div>
                    <div class="box-body">
                      <div class="box-header with-border">
                        <div class="col-md-12">
                            <form action="import_kelurahan" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                              <button type="button" class="btn btn-file btn-flat" style="background-color: black; color:white">Import Data<input type="file" name="csv_file"></button>
                              <button type="submit" class="btn btn-flat" data-dismiss="modal"><i class="ion ion-checkmark"></i></button>
                            </form>
                            <label style="font-size: 12px">Import Melalui Excel (.csv)</label>
                        </div> 
                      </div>
                    </div>
                
                 {!! Form::open(['action' => 'KelurahanController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                <div class="box-body">
                  <div class="box-header with-border">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">
                          <div class="row content">
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Nama Kelurahan</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="kelurahan" placeholder="Beji"  width="50%">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Nama Lurah</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="lurah" placeholder="Drs.Tarno">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Gambaran Umum</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="gambaran_umum" placeholder="Rindang dan asri"></textarea>
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

                <div class="tab-pane" id="kecamatan">
                  
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion-ios-people-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Kecamatan</h4></span>
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
                  {!! Form::open(['action' => 'KecamatanController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                  <div class="box-body">
                  <div class="box-header with-border">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">
                          <div class="row content">
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Nama Camat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_camat" placeholder="Drs. Henry">
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

                 <div class="tab-pane" id="penduduk">
                  
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion-ios-people-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Jumlah Penduduk</h4></span>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="box-header with-border">
                      <div class="col-md-12">
                            <form action="import_penduduk" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                              <button type="button" class="btn btn-file btn-flat" style="background-color: black; color:white">Import Data<input type="file" name="csv_file"></button>
                              <button type="submit" class="btn btn-flat" data-dismiss="modal"><i class="ion ion-checkmark"></i></button>
                            </form>
                            <label style="font-size: 12px">Import Melalui Excel (.csv)</label>
                      </div> 
                    </div>
                  </div>
                  {!! Form::open(['action' => 'PendudukController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                  <div class="box-body">
                  <div class="box-header with-border">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">
                          <div class="row content">
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
                                <label>Kelurahan</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" rows="3" name="kelurahan" placeholder="Beji timur"></input>
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Laki-laki</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="laki_laki" placeholder="200000">
                              </div>  
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Perempuan</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="perempuan" placeholder="300000">
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



   
              </div><!-- /.tab-content -->
            </div><!--box body-->
          </div><!-- nav-tabs-custom -->
        </div><!--col-md-12-->
      </div><!--row-->
    </section>

    @endsection