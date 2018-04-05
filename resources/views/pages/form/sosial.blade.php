{{-- @if(!Auth::guest())
@extends('auth.login')
@endif
 --}}
@extends('layouts.app')
@section('content')

    <section class="content-header">
      <h1 style="color:#807e7d"> 
       <b>INPUT DATA SOSIAL</b>       
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
              <li><a href="#pantiasuhan" data-toggle="tab">Panti Asuhan</a></li>
              <li><a href="#komunitas" data-toggle="tab">Komunitas</a></li>          
            </ul>
            <div class="box-body border-radius-none">
              <div class="tab-content">

                <!--KESEHATAN-->
{{-- ============================================================================================================== --}}
                <div class="tab-pane active" id="pantiasuhan">    
                   <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion-ios-heart-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Panti Asuhan</h4></span>
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
                
               {!! Form::open(['action' => 'PantiController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}


                <div class="box-body">
                  <div class="box-header with-border">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">
                          <div class="row content">
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Nama Panti</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_panti" placeholder="Panti Kita" width="50%">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Penanggung Jawab</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_pj" placeholder="Tegar Beriman" width="50%">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Nomor Telepon (CP)</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="kontak" placeholder="0212158389">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Jumlah Anak</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="jumlah_anak" placeholder="20">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Jumlah Anak Angkat</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="jumlah_anak_angkat" placeholder="20">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Deskripsi</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="deskripsi" placeholder="Panti Asuhan terletak di sebelah Masjid Beji."></textarea>
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

                <div class="tab-pane" id="komunitas">
                  
                  <div class="box-header with-border">
                    <span class="info-box-icon" style="background-color: white"><i class="ion-ios-heart-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Komunitas</h4></span>
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
                  {!! Form::open(['action' => 'KomunitasController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                  <div class="box-body">
                  <div class="box-header with-border">
                    <div class="row">
                      <div class="col-md-12" style="padding: 1%">
                        <div class="box-body">
                          <div class="row content">
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Nama Komunitas</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_komunitas" placeholder="Rumah Kita" width="50%">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
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
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Deskripsi Komunitas</label>
                              </div>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="deskripsi_komunitas" placeholder="Komunitas Kita merupakan komunitas di Depok yang memiliki tujuan untuk membantu sesama."></textarea>
                              </div>
                            </div>
                            {{--<div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>ID Partner</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="id_partner" placeholder="001235656">
                              </div>
                            </div>--}}
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Kontak</label>
                              </div>
                              <div class="col-md-9">
                                <input type="number" class="form-control" name="kontak_komunitas" placeholder="0212158389">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Email</label>
                              </div>
                              <div class="col-md-9">
                                <input type="email" class="form-control" name="email_komunitas" placeholder="komunitaskita@gmail.com">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                              <div class="col-md-3">
                                <label>Note</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="note_komunitas" placeholder="Persyaratan belum lengkap" width="50%">
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

                


   
              </div><!-- /.tab-content -->
            </div><!--box body-->
          </div><!-- nav-tabs-custom -->
        </div><!--col-md-12-->
      </div><!--row-->
    </section>

    @endsection