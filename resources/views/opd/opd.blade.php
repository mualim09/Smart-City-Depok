@extends('layouts.app')
@section('content')

    <section class="content-header">
      <h1 style="color:#807e7d"> 
       <b> DATA OPD</b>       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-table"></i>Data</a></li>
        <li class="active"><a href="/opd">Opd</a></li>
      </ol>
    </section>


 @if(count($opds)> 0 )
        
    
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box box-default removable-box">
            <div class="box-header with-border">
              <span class="info-box-icon" style="background-color: white"><i class="ion ion-ios-paper-outline"></i></span>
              <div class="info-box-content">
                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>OPD</h4></span>
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
              <table id="examples" class="table table-striped table-bordered" style="overflow-x:auto;width: 100%" >
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama OPD</th>
                  <th>No Telpon</th>
                  <th>Website</th>
                  <th>Tanggal Update</th>
                  <th style="display:none;">Deskripsi</th>
                  <th style="display:none;">Alamat</th>
                  <th style="display:none;">Id OPD</th>
                  
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                ?>
                @foreach($opds as $opd)
                <tr>
                  <td>{{++$i}}</td>
                  <td>{{$opd->judul}}</td>
                  <td>{{$opd->no_telp}}</td>
                  <td>{{$opd->website}}</td>
                  <td>{{$opd->tgl_update}}</td>
                  
                  <td style="display:none;">{{$opd->isi_content}}</td>                
                  <td style="display:none;">{{$opd->alamat}}</td>                
                  <td style="display:none;">{{$opd->id_opd}}</td>

                  <td style="white-space: nowrap;" align="center"> 
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-lihat-{{$opd->id_content}}"><i class="ion-eye"></i></button>

                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-success" data-toggle="modal" data-target="#modal-edit-{{$opd->id_content}}"><i class="ion-ios-compose"></i></button>

                    <button type="button" class="btn btn-flat btn-danger" data-toggle="modal"data-target="#modal-hapus-{{$opd->id_content}}"><i class="ion-ios-trash"></i></button>
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

{{--  --}}

     <div class="modal fade" id="modal-lihat-{{$opd->id_content}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center">Lihat</h4>
              </div>
              <div class="modal-body overflow-hidden">


                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Nama OPD</b>
                  </div>
                  <div class="col-xs-9">
                    {{ $opd->judul }}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Deskripsi OPD</b>
                  </div>
                  <div class="col-xs-9">
                    {{ $opd->isi_content }}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>No Telpon</b>
                  </div>
                  <div class="col-xs-9">
                    {{ $opd->no_telp }}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Website</b>
                  </div>
                  <div class="col-xs-9">
                    {{ $opd->website}}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Alamat</b>
                  </div>
                  <div class="col-xs-9">
                    {!!$opd->alamat!!}
                  </div>
                </div>

                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Tanggal Update Data</b>
                  </div>
                  <div class="col-xs-9">
                    {{ $opd->tgl_update}}
                  </div>
                </div>
                
                
              </div>
            </div>
           </div>
      </div>

{{-- ========================================================================================================================= --}}

      <div class="modal fade" id="modal-edit-{{$opd->id_content}}">     
          <div class="modal-dialog">            
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center">Edit</h4>
              </div>


              <div class="modal-body">
              {!! Form::open(['action' => ['OpdController@update', $opd->id_content], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                <div class="form-group">
                  <label for="exampleInputPassword1">Nama OPD</label>
                  <input type="text" class="form-control" name="judul" value="{{$opd->judul}}">
                </div>          

                <div class="form-group">
                  <label>Deskripsi OPD</label>
                  {{Form::textarea('isi_content', $opd->isi_content,['class' => 'form-control' ])}}
                </div>

                <div class="form-group">
                  <label>Alamat</label>
                  {{Form::textarea('alamat', $opd->alamat,['class' => 'form-control' ])}}
                </div>          

                <div class="form-group">
                  <label for="exampleInputPassword1">Website</label>
                  <input type="text" class="form-control" name="website" value="{{$opd->website}}">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Nomor Telepon</label>
                  <input type="text" class="form-control" name="no_telp" value="{{$opd->no_telp}}">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Id Data</label>
                  <input type="text" class="form-control" name="id_opd" value="{{$opd->id_opd}}">
                </div>

                <div class="modal-footer">
                {{Form::hidden('_method', 'PUT')}}
                <button type="submit" class="btn btn-info btn-fill pull-right">Edit</button>
                <div class="clearfix"></div>
              </div>


              {!! Form::close() !!}
              </div>
                     
          </div>
        </div>
      </div>  
{{-- ======================================================================================================================== --}}
      <div class="modal fade" id="modal-hapus-{{$opd->id_content}}">
          <div class="modal-dialog">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center">HAPUS</h4>
              </div>


              <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus data opd ini?</p>
              </div>

              <div class="modal-footer">
                         
                            <form action="/opd/{{$opd->id_content}}" method="post">
                            <input type="submit" class="btn btn-danger" name="submit" value="YA">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            </form>

                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
              </div>

            </div>
          </div>
        </div>    

                  
                 @endforeach
                </tbody>
              </table>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
       </div>
      </div>
    </section>
    <!-- /.content -->
@else
  <p>No Opd was input</p>
@endif


@endsection