@extends('layouts.app')
@section('content')

<section class="content-header">
      <h1 style="color:#807e7d"> 
       <b> DATA KLINIK</b>       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-table"></i>Data</a></li>
        <li class="active"><a href="/klinik">Data Klinik</a></li>
      </ol>
    </section>



 @if(count($kliniks)> 0 )
        
    
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box box-default removable-box">
            <div class="box-header with-border">
              <span class="info-box-icon" style="background-color: white"><i class="ion ion-ios-paper-outline"></i></span>
              <div class="info-box-content">
                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>klinik</h4></span>
              </div>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div style="overflow-x: auto">
              <table id="examples" class="table table-bordered table-hover" style="overflow-x:auto;">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Tempat</th>
                  <th style="display:none;">Gambaran Umum</th>
                  <th style="display:none;">Alamat</th>
                  <th>No Telpon</th>
                  <th>Jam Operasional</th>
                  <th style="display:none;">Koordinat</th>            
                  <th>Kecamatan</th>                
                  <th>Website</th>
                  <th style="display:none;">Foto</th>                  
                  <th style="display:none;">Sumber</th>
                  <th style="display:none;">ID Data</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                ?>
                @foreach($kliniks as $klinik)
                <tr>
                  <td>{{++$i}}</td>
                  <td>{{$klinik->nama_tempat}}</td>
                  <td style="display:none;">{{$klinik->gambaran_umum}}</td>
                  <td style="display:none;">{{$klinik->alamat}}</td>
                  <td>{{$klinik->no_telp}}</td>
                  <td>{{$klinik->jam_operasional}}</td>
                  <td style="display:none;">{{$klinik->koordinat}}</td>
                  <td>{{$klinik->kecamatan}}</td>               
                  <td>{{$klinik->website}}</td>
                  <td style="display:none;">{{$klinik->foto}}</td>                  
                  <td style="display:none;">{{$klinik->sumber}}</td>
                  <td style="display:none;">{{$klinik->id_data}}</td>
                  
                  <td nowrap> 
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-lihat-{{$klinik->id_klinik}}"><i class="ion-eye"></i></button>
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-success" data-toggle="modal" data-target="#modal-edit-{{$klinik->id_klinik}}"><i class="ion-ios-compose"></i></button>
                    <button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus-{{$klinik->id_klinik}}"><i class="ion-ios-trash"></i></button>
                  </td>
                </tr>

<style>
        .example-modal .modal {
          position: relative;
          top: auto;
          bottom: auto;
          right: auto;
          left: auto;
          display: block;
          z-index: 1;}
        .example-modal .modal {
          background: transparent !important;}
          table, th, td
        {padding: 10px;}
</style>


     <div class="modal fade" id="modal-lihat-{{$klinik->id_klinik}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center">Lihat</h4>
              </div>
              <div class="modal-body overflow-hidden">

              <div class="col-xs-12 img-table">
                    <img src="/storage/img_klinik/{{$klinik->foto}}">
                  </div>

                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Nama Tempat</b>
                  </div>
                  <div class="col-xs-9">
                    {{ $klinik->nama_tempat }}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Website</b>
                  </div>
                  <div class="col-xs-9">
                    {{ $klinik->website }}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                   <b>No Telpon</b> 
                  </div>
                  <div class="col-xs-9">
                    {{ $klinik->no_telp}}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Jam Operasional</b>
                  </div>
                  <div class="col-xs-9">
                    {{ $klinik->jam_operasional}}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Kecamatan</b>
                  </div>
                  <div class="col-xs-9">
                    {{ $klinik->kecamatan }}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                   <b>Alamat</b> 
                  </div>
                  <div class="col-xs-9">
                    {!!$klinik->alamat!!}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                   <b> Deskripsi</b>
                  </div>
                  <div class="col-xs-9 white-space">
                    {!! $klinik->gambaran_umum !!}
                  </div>
                </div>
              <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Sumber</b>
                  </div>
                  <div class="col-xs-9">
                    {{ $klinik->sumber }}
                  </div>
              </div>

            </div>
          </div>
        </div>
      </div>
{{-- =========================================================================================================================== --}}
      <div class="modal fade" id="modal-edit-{{$klinik->id_klinik}}">
          <div class="modal-dialog">
             {!! Form::open(['action' => ['KlinikController@update', $klinik->id_klinik], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center">Edit</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Tempat</label>
                  <input type="text" class="form-control" name="nama_tempat" value="{{$klinik->nama_tempat}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Gambaran umum</label>
                  <input type="text" class="form-control" name="gambaran_umum" value="{{$klinik->gambaran_umum}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Alamat</label>
                  {{Form::textarea('alamat', $klinik->alamat,['class' => 'form-control', 'placeholder'=>'Body Text'])}}
                </div>
                <div class="form-group">
                  <select class="form-control" name="kecamatan">
                                  <option value="{{$klinik->kecamatan}}"></option>
                                  <option value="Beji">Beji</option>
                                  <option value="Bojongsari">Bojongsari</option>
                                  <option value="Cimanggis">Cimanggis</option>
                                  <option value="Cinere">Cinere</option>
                                  <option value="Cilodong">Cilodong</option>
                                  <option value="Cipayung">Cipayung</option>
                                  <option value="Limo">Limo</option>
                                  <option value="Pancoran mas">Pancoran Mas</option>
                                  <option value="Sawangan">Sawangan</option>
                                  <option value="Sukmajaya">Sukmajaya</option>
                                  <option value="Tapos">Tapos</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nomor Telepon</label>
                  <input type="text" class="form-control" name="no_telp" value="{{$klinik->no_telp}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jam Operasional</label>
                  <input type="text" class="form-control" name="jam_operasional" value="{{$klinik->jam_operasional}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Koordinat</label>
                  <input type="text" class="form-control" name="koordinat" value="{{$klinik->koordinat}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Website</label>
                  <input type="text" class="form-control" name="website" value="{{$klinik->website}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Sumber</label>
                  <input type="text" class="form-control" name="sumber" value="{{$klinik->sumber}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Foto</label>
                  {{Form::file('foto_klinik')}}
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

      <div class="modal fade" id="modal-hapus-{{$klinik->id_klinik}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">HAPUS</h4>
              </div>
              <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus klinik ini?</p>
              </div>
              <div class="modal-footer">
                         
                            <form action="/klinik/{{$klinik->id_klinik}}" method="post">
                            <input type="submit" class="btn btn-danger" name="submit" value="YA">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            </form>

                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>    

                 
                 @endforeach
                </tbody>
              </table>
              </div>

            </div>
            <!-- /.box-body -->
          </div>

       </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@else
  <p>No klinik was input</p>
@endif

@endsection