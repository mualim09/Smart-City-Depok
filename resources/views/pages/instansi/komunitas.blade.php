@extends('layouts.app')
@section('content')

<section class="content-header">
      <h1 style="color:#807e7d"> 
       <b> DATA KOMUNITAS</b>       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-table"></i>Data</a></li>
        <li class="active"><a href="/komunitas">Data Komunitas</a></li>
      </ol>
    </section>

 @if(count($komunitass)> 0 )

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box box-default removable-box">
            <div class="box-header with-border">
              <span class="info-box-icon" style="background-color: white"><i class="ion ion-ios-paper-outline"></i></span>
              <div class="info-box-content">
                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Komunitas</h4></span>
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
                <th>No</th>
                  <th>Nama Komunitas</th>
                  <th>Kategori</th>
                  <th>Kontak</th>
                  <th>Email</th>
                  <th style="display:none;">Deskripsi</th>
                  <th style="display:none;">Alamat</th>
                  <th style="display:none;">Foto</th>
                  <th style="display:none;">Note Komunitas</th>
                  <th style="display:none;">Id partner</th>

                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                ?>
                @foreach($komunitass as $komunitas)
                <tr>
                  <td>{{++$i}}</td>
                  <td>{{$komunitas->nama_komunitas}}</td>
                  <td>{{$komunitas->kategori_komunitas}}</td>
                  <td>{{$komunitas->alamat_komunitas}}</td>
                  <td>{{$komunitas->email_komunitas}}</td>
                  <td style="display:none;">{{$komunitas->deskripsi_komunitas}}</td>
                  <td style="display:none;">{{$komunitas->alamat_komunitas}}</td>
                  <td style="display:none;">{{$komunitas->foto_komunitas}}</td>
                  <td style="display:none;">{{$komunitas->note_komunitas}}</td>
                  <td style="display:none;">{{$komunitas->id_partner}}</td>
                  
                  
                  <td style="white-space: nowrap;" align="center">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-lihat-{{$komunitas->id_komunitas}}"><i class="ion-eye"></i></button>
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-success" data-toggle="modal" data-target="#modal-edit-{{$komunitas->id_komunitas}}"><i class="ion-ios-compose"></i></button>
                    <button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus-{{$komunitas->id_komunitas}}"><i class="ion-ios-trash"></i></button>
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

{{-- ======================================================================================================================= --}}

 <div class="modal fade" id="modal-lihat-{{$komunitas->id_komunitas}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center">LIHAT</h4>
              </div>
              <div class="modal-body overflow-hidden">

                <div class="col-xs-12 img-table">
                    <img src="/storage/img_komunitas/{{$komunitas->foto_komunitas}}">
                </div>


                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                  <b>Nama Komunitas</b>
                  </div>
                  <div class="col-xs-9">
                    {{ $komunitas->nama_komunitas }}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                  <b>
                    Kategori
                  </b>
                  </div>
                  <div class="col-xs-9">
                    {{ $komunitas->kategori_komunitas}}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Kontak</b>
                  </div>
                  <div class="col-xs-9">
                    {{ $komunitas->kontak_komunitas}}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Email</b>
                  </div>
                  <div class="col-xs-9">
                    {{ $komunitas->email_komunitas}}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Note</b>
                  </div>
                  <div class="col-xs-9">
                    {!!$komunitas->note_komunitas!!}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Alamat</b>
                  </div>
                  <div class="col-xs-9">
                    {!!$komunitas->alamat_komunitas!!}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Deskripsi</b>
                  </div>
                  <div class="col-xs-9 white-space">
                    {!! $komunitas->deskripsi_komunitas!!}
                  </div>
                </div>

            </div>
          </div>
        </div>
      </div>


{{-- =================================================================================================================== --}}
      <div class="modal fade" id="modal-edit-{{$komunitas->id_komunitas}}">    
          <div class="modal-dialog">
             {!! Form::open(['action' => ['KomunitasController@update', $komunitas->id_komunitas], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center">Edit</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                <label for="exampleInputPassword1">Nama Komunitas</label>
                <input type="text" class="form-control" name="nama_komunitas" value="{{$komunitas->nama_komunitas}}">
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1">Kategori</label>
                  <select class="form-control" name="kategori_komunitas">
                                  <option value="{{$komunitas->kategori_komunitas}}"></option>
                                  <option value="Sosial">Sosial</option>
                                  <option value="Seni">Seni</option>
                                  <option value="Pendidikan">Pendidikan</option>
                                  <option value="Kecantikan">Kecantikan</option>
                                  <option value="Budaya">Budaya</option>
                                  <option value="Olahraga">Olahraga</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Kontak</label>
                  <input type="text" class="form-control" name="kontak_komunitas" value="{{$komunitas->kontak_komunitas}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
                  <input type="text" class="form-control" name="email_komunitas" value="{{$komunitas->email_komunitas}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Alamat</label>
                  <input type="text" class="form-control" name="alamat_komunitas" value="{{$komunitas->alamat_komunitas}}">
                </div>
                <div class="form-group">
                  {{Form::file('foto_komunitas')}}
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Note</label>
                  <input type="text" class="form-control" name="note_komunitas" value="{{$komunitas->note_komunitas}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Deskripsi</label>
                  {{Form::textarea('deskripsi_komunitas', $komunitas->deskripsi_komunitas,['class' => 'form-control', 'placeholder'=>'Body Text'])}}
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

      <div class="modal fade" id="modal-hapus-{{$komunitas->id_komunitas}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center">HAPUS</h4>
              </div>
              <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus data komunitas ini?</p>
              </div>
              <div class="modal-footer">
                         
                            <form action="/komunitas/{{$komunitas->id_komunitas}}" method="post">
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
  <p>No komunitas was input</p>
@endif

@endsection