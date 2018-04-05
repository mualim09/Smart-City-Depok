

@extends('layouts.app')

@section('content')


    <section class="content-header">
      <h1 style="color:#807e7d"> 
       <b>MUSEUM</b>       
      </h1>
    </section>


 @if(count($masterpieces)> 0 )

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><a href="#submit" data-toggle="tab">Submit</a></li>
              <li><a href="#data" data-toggle="tab">Data</a></li>
            </ul>
            <div class="box-body border-radius-none">
              <div class="tab-content">
                <div class="tab-pane active" id="submit">

                  <div class="box-body">
                        <div class="box-header with-border">
                          <div class="col-md-12">
                              <form action="import_museum" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                                <button type="button" class="btn btn-file btn-flat" style="background-color: black; color:white">Import Data<input type="file" name="csv_file"></button>
                                <button type="submit" class="btn btn-flat" data-dismiss="modal"><i class="ion ion-checkmark"></i></button>
                              </form>
                              <label style="font-size: 12px">Import Melalui Excel (.csv)</label>
                          </div> 
                        </div>
                  </div>
                  
                    {!! Form::open(['action' => 'MasterpieceController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                  <div class="box-body">
                    <div class="box-header with-border">
                      <div class="row">
                        <div class="col-md-12" style="padding: 1%">
                          <div class="box-body">
                            <div class="row content">
                              <div class="row" style="margin-bottom:10px">
                                <div class="col-md-3">
                                  <label>Nama</label>
                                </div>
                                <div class="col-md-9">
                                  <input type="text" class="form-control" name="nama_peraih" placeholder="Nisrina Putri" width="50%">
                                </div>
                              </div>
                              <div class="row" style="margin-bottom:10px">
                                <div class="col-md-3">
                                  <label>Prestasi</label>
                                </div>
                                <div class="col-md-9">
                                  <input type="text" class="form-control" name="nama_prestasi" placeholder="Juara 1 OSN Matematika" width="50%">
                                </div>
                              </div>
                              <div class="row" style="margin-bottom:10px">
                                <div class="col-md-3">
                                  <label>Instansi</label>
                                </div>
                                <div class="col-md-9">
                                  <input type="text" class="form-control" name="instansi" placeholder="Umum" width="50%">
                                </div>
                              </div>

                              <div class="row" style="margin-bottom:10px">
                                <div class="col-md-3">
                                  <label>Deskripsi</label>
                                </div>
                                <div class="col-md-9">
                                  <textarea class="form-control" rows="3" name="deskripsi" placeholder="Pengharagaan atas mengikuti OSN Matematika tingkat SD di Kota Depok"></textarea>
                                </div>
                              </div>

                              <div class="row" style="margin-bottom:10px">
                                <div class="col-md-3">
                                  <label>Tingkat</label>
                                </div>
                                <div class="col-md-9">
                                  <select class="form-control" name="tingkat">
                                    <option value="Kota">Kabupaten/Kota</option>
                                    <option value="Provinsi">Provinsi</option>
                                    <option value="Nasional">Nasional</option>
                                    <option value="Internasional">Internasional</option>
                                  </select>
                                </div>
                              </div>

                              <div class="row" style="margin-bottom:10px">
                                <div class="col-md-3">
                                  <label>Kategori Penghargaan</label>
                                </div>
                                <div class="col-md-9">
                                  <select class="form-control" name="kategori">
                                    <option value="Teknologi">Teknologi</option>
                                    <option value="Kesehatan">Kesehatan</option>
                                    <option value="Pendidikan">Pendidikan</option>
                                    <option value="Lingkungan">Lingkungan</option>
                                    <option value="Olahraga">Olahraga</option>
                                    <option value="Umum">Umum</option>
                                  </select>
                                </div>
                              </div>

                              <div class="row" style="margin-bottom:10px">
                                <div class="col-md-3">
                                  <label>Riwayat</label>
                                </div>
                                <div class="col-md-9">
                                  <textarea class="form-control" rows="3" name="riwayat" placeholder="Penghargaan pertama"></textarea>
                                </div>
                              </div>

                              <div class="row" style="margin-bottom:10px">
                                <div class="col-md-3">
                                  <label>Keterangan</label>
                                </div>
                                <div class="col-md-9">
                                  <textarea class="form-control" rows="3" name="keterangan" placeholder="Penghargaan diserahakan pada tanggal 20 Juni 2017"></textarea>
                                </div>
                              </div>

                              <div class="row" style="margin-bottom:10px">
                                <div class="col-md-3">
                                  <label>Foto</label>
                                </div>
                                <div class="col-md-9">
                                  <div class="btn btn-default btn-flat btn-file" style="width:100px;">Upload 
                                      {{Form::file('image')}}
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

{{-- =========================================================================================================================================== --}}

                <div class="tab-pane" id="data">
                  <div style="overflow-x: auto">
                    <table id="examples" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th nowrap>No</th>
                        <th nowrap>Nama</th>
                        <th nowrap>Prestasi</th>
                        <th nowrap>Instansi</th>
                        <th nowrap>Tingkat</th>
                        <th nowrap>Kategori penghargaan</th>
                        <th nowrap></th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php
                      $i = 0;
                      ?>
                      @foreach($masterpieces as $masterpiece)
                      <tr>
                        <td>{{++$i}}</td>
                        <td nowrap>{{$masterpiece->nama_peraih}}</td>
                        <td nowrap>{{$masterpiece->nama_prestasi}}</td>
                        <td nowrap>{{$masterpiece->instansi}}</td>
                        <td nowrap>{{$masterpiece->tingkat}}</td>
                        <td nowrap>{{$masterpiece->kategori}}</td>
                        <td nowrap>
                          <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-lihat-{{$masterpiece->id_penghargaan}}"><i class="ion-eye"></i></button>
                          <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-success" data-toggle="modal" data-target="#modal-edit-{{$masterpiece->id_penghargaan}}"><i class="ion-compose"></i></button>
                          <button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus-{{$masterpiece->id_penghargaan}}"><i class="ion-ios-trash"></i></button>
                        </td>  
                      </tr>
                      

                    <div class="modal fade" id="modal-lihat-{{$masterpiece->id_penghargaan}}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" align="center"><b>LIHAT</b></h4>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-sm-12 border-right">
                                <div class="description-block">
                                  <img src="/storage/img_masterpiece/{{$masterpiece->image}}" width="100%">
                                </div>
                              </div>
                              <div class="col-sm-12 border-right">
                                <div class="description-block">
                                  <h5 class="description-header">NAMA</h5>
                                  <span>{{$masterpiece->nama_peraih}}</span>
                                </div>
                              </div>
                              <div class="col-sm-12 border-right">
                                <div class="description-block">
                                  <h5 class="description-header">DESKRIPSI</h5>
                                  <span>{{$masterpiece->deskripsi}}</span>
                                </div>
                              </div>
                              <div class="col-sm-12 border-right">
                                <div class="description-block">
                                  <h5 class="description-header">PRESTASI</h5>
                                  <span>{{$masterpiece->nama_prestasi}}</span>
                                </div>
                              </div>
                              <div class="col-sm-12 border-right">
                                <div class="description-block">
                                  <h5 class="description-header">INSTANSI</h5>
                                  <span>{{$masterpiece->instansi}}</span>
                                </div>
                              </div>
                              <div class="col-sm-12 border-right">
                                <div class="description-block">
                                  <h5 class="description-header">TINGKAT</h5>
                                  <span>{{$masterpiece->tingkat}}</span>
                                </div>
                              </div>
                              <div class="col-sm-12 border-right">
                                <div class="description-block">
                                  <h5 class="description-header">KATEGORI</h5>
                                  <span>{{$masterpiece->kategori}}</span>
                                </div>
                              </div>
                              <div class="col-sm-12 border-right">
                                <div class="description-block">
                                  <h5 class="description-header">RIWAYAT</h5>
                                  <span>{{$masterpiece->riwayat}}</span>
                                </div>
                              </div>
                              <div class="col-sm-12 border-right">
                                <div class="description-block">
                                  <h5 class="description-header">KETERANGAN</h5>
                                  <span>{{$masterpiece->keterangan}}</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
{{-- =========================================================================================================================================== --}}

      <div class="modal fade" id="modal-edit-{{$masterpiece->id_penghargaan}}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" align="center"><b>EDIT</b></h4>
                          </div>
                          <div class="modal-body">
                            {!! Form::open(['action' => ['MasterpieceController@update', $masterpiece->id_penghargaan], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                          
                            <div class="row">
                              <div class="col-sm-12 border-right">
                                <div class="description-block">
                                  <img src="/storage/img_masterpiece/{{$masterpiece->image}}" width="100%">
                                </div>
                              </div>
                              <div class="col-sm-12 border-right">
                                <div class="description-block">
                                  <h5 class="description-header">NAMA</h5>
                                  <span><input type="text" class="form-control" name="nama_peraih" value="{{$masterpiece->nama_peraih}}" width="50%"></span>

                                </div>
                              </div>
                              <div class="col-sm-12 border-right">
                                <div class="description-block">
                                  <h5 class="description-header">DESKRIPSI</h5>
                                   <span>
                                   <div class="form-group"> 
                                    {{Form::textarea('deskripsi', $masterpiece->deskripsi,['class' => 'form-control'] )}}
                                  </div>
                                  </span>
                                </div>
                              </div>
                              <div class="col-sm-12 border-right">
                                <div class="description-block">
                                  <h5 class="description-header">PRESTASI</h5>
                                  <span><input type="text" class="form-control" name="nama_prestasi" value="{{$masterpiece->nama_prestasi}}" width="50%"></span>
                                </div>
                              </div>
                              <div class="col-sm-12 border-right">
                                <div class="description-block">
                                  <h5 class="description-header">INSTANSI</h5>
                                  <span><input type="text" class="form-control" name="instansi" value="{{$masterpiece->instansi}}" width="50%"></span>
                                </div>
                              </div>
                              <div class="col-sm-12 border-right">
                                <div class="description-block">
                                  <h5 class="description-header">TINGKAT</h5>
                                  <span>
                                    <select class="form-control" name="tingkat">
                                    <option value="{{$masterpiece->tingkat}}"></option>
                                    <option value="Kota">Kabupaten/Kota</option>
                                    <option value="Provinsi">Provinsi</option>
                                    <option value="Nasional">Nasional</option>
                                    <option value="Internasional">Internasional</option>
                                  </select>
                                  </span>
                                </div>
                              </div>
                              <div class="col-sm-12 border-right">
                                <div class="description-block">
                                  <h5 class="description-header">KATEGORI</h5>
                                  <span>                                
                                  <select class="form-control" name="kategori">
                                    <option value="{{$masterpiece->kategori}}"></option>
                                    <option value="Teknologi">Teknologi</option>
                                    <option value="Kesehatan">Kesehatan</option>
                                    <option value="Pendidikan">Pendidikan</option>
                                    <option value="Lingkungan">Lingkungan</option>
                                    <option value="Olahraga">Olahraga</option>
                                    <option value="Umum">Umum</option>
                                  </select>
                                  </span>
                                </div>
                              </div>
                              <div class="col-sm-12 border-right">
                                <div class="description-block">
                                  <h5 class="description-header">RIWAYAT</h5>
                                  <div class="form-group"> 
                                    {{Form::textarea('riwayat', $masterpiece->riwayat,['class' => 'form-control'] )}}
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-12 border-right">
                                <div class="description-block">
                                  <h5 class="description-header">KETERANGAN</h5>
                                  <span><div class="form-group"> 
                                    {{Form::textarea('keterangan', $masterpiece->keterangan,['class' => 'form-control'] )}}
                                  </div></span>
                                </div>
                              </div>

                              <div class="modal-footer">
                              {{Form::hidden('_method', 'PUT')}}
                              <button type="submit" class="btn btn-info btn-fill pull-right">Edit</button>
                              <div class="clearfix"></div>
                            </div>
                            </div>
                            {!! Form::close() !!}
                          </div>
                        </div>
                      </div>
                    </div>

{{-- =========================================================================================================================================== --}}
                    <div class="modal fade" id="modal-hapus-{{$masterpiece->id_penghargaan}}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><center><b>HAPUS</b></center></h4>
                          </div>
                          <div class="modal-body"><center>
                            <p>Apakah Anda yakin akan menghapus data penghargaan ini?</p></center>
                          </div>
                          <div class="modal-footer">
                            <form action="/museum/{{$masterpiece->id_penghargaan}}" method="post">
                            <input type="submit" class="btn btn-danger" name="submit" value="YA">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            </form>
                            <button type="button" class="btn btn-primary btn-flat" data-dismiss="modal">Tidak</button>
                          </div>
                        </div>
                      </div>
                    </div>

                  @endforeach
                  </tbody>
                    </table>

                  </div>     
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


@endif


@endsection