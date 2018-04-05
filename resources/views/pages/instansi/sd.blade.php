@extends('layouts.app')
@section('content')

<section class="content-header">
      <h1 style="color:#807e7d"> 
       <b> DATA SEKOLAH DASAR</b>       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-table"></i>Data</a></li>
        <li class="active"><a href="/sd">Data Sekolah Dasar</a></li>
      </ol>
    </section>



 @if(count($pds)> 0 )
        
    
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box box-default removable-box">
            <div class="box-header with-border">
              <span class="info-box-icon" style="background-color: white"><i class="ion ion-ios-paper-outline"></i></span>
              <div class="info-box-content">
                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Sekolah Dasar</h4></span>
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
                @foreach($pds as $pd)
                <tr>
                  <td>{{++$i}}</td>
                  <td>{{$pd->nama_tempat}}</td>
                  <td style="display:none;">{{$pd->gambaran_umum}}</td>
                  <td style="display:none;">{{$pd->alamat}}</td>
                  <td>{{$pd->no_telp}}</td>
                  <td>{{$pd->jam_operasional}}</td>
                  <td style="display:none;">{{$pd->koordinat}}</td>
                  <td>{{$pd->kecamatan}}</td>               
                  <td>{{$pd->website}}</td>
                  <td style="display:none;">{{$pd->foto_pd}}</td>
                  <td style="display:none;">{{$pd->sumber}}</td>
                  <td style="display:none;">{{$pd->id_data}}</td>

                  <td style="white-space: nowrap;" align="center"> 
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-lihat-{{$pd->id_pd}}"><i class="ion-eye"></i></button>
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-success" data-toggle="modal" data-target="#modal-edit-{{$pd->id_pd}}"><i class="ion-ios-compose"></i></button>
                    <button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus-{{$pd->id_pd}}"><i class="ion-ios-trash"></i></button>
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
{{--==========================================================================================================================--}}
     <div class="modal fade" id="modal-lihat-{{$pd->id_pd}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center">LIHAT</h4>
              </div>
              <div class="modal-body overflow-hidden">

                <div class="col-xs-12 img-table">
                    <img src="/storage/img_pd/{{$pd->foto_pd}}">
                </div>


                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                  <b>Nama Tempat</b>
                  </div>
                  <div class="col-xs-9">
                    {{ $pd->nama_tempat }}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                  <b>
                    Website
                  </b>
                  </div>
                  <div class="col-xs-9">
                    {{ $pd->website }}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>No Telpon</b>
                  </div>
                  <div class="col-xs-9">
                    {{ $pd->no_telp}}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Jam Operasional</b>
                  </div>
                  <div class="col-xs-9">
                    {{ $pd->jam_operasional}}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Kecamatan</b>
                  </div>
                  <div class="col-xs-9">
                    {{ $pd->kecamatan }}
                  </div>
                </div>
                
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Alamat</b>
                  </div>
                  <div class="col-xs-9">
                    {!!$pd->alamat!!}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Deskripsi</b>
                  </div>
                  <div class="col-xs-9 white-space">
                    {!! $pd->gambaran_umum !!}
                  </div>
                </div>
              <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Sumber</b>
                  </div>
                  <div class="col-xs-9">
                    {{ $pd->sumber }}
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
{{-- ============================================================================================================================ --}}
      <div class="modal fade" id="modal-edit-{{$pd->id_pd}}">
     
          <div class="modal-dialog">
             {!! Form::open(['action' => ['PdController@update', $pd->id_pd], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center">Edit</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Tempat</label>
                  <input type="text" class="form-control" name="nama_tempat" value="{{$pd->nama_tempat}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Gambaran umum</label>
                  <input type="text" class="form-control" name="gambaran_umum" value="{{$pd->gambaran_umum}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Alamat</label>
                  {{Form::textarea('alamat', $pd->alamat,['class' => 'form-control', 'placeholder'=>'Body Text'])}}
                </div>
                <div class="form-group">
                  <select class="form-control" name="kecamatan">
                                  <option value="{{$pd->kecamatan}}"></option>
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
                  <input type="text" class="form-control" name="no_telp" value="{{$pd->no_telp}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jam Operasional</label>
                  <input type="text" class="form-control" name="jam_operasional" value="{{$pd->jam_operasional}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Koordinat</label>
                  <input type="text" class="form-control" name="koordinat" value="{{$pd->koordinat}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Website</label>
                  <input type="text" class="form-control" name="website" value="{{$pd->website}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Sumber</label>
                  <input type="text" class="form-control" name="sumber" value="{{$pd->sumber}}">
                </div>
                <div class="form-group">
                  {{Form::file('foto_pd')}}
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

      <div class="modal fade" id="modal-hapus-{{$pd->id_pd}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center">HAPUS</h4>
              </div>
              <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus data sd  ini?</p>
              </div>
              <div class="modal-footer">
                         
                            <form action="/sd/{{$pd->id_pd}}" method="post">
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
          </div>

       </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@else
  <p>No pd was input</p>
@endif


@endsection