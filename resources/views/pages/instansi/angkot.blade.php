@extends('layouts.app')
@section('content')

<section class="content-header">
      <h1 style="color:#807e7d"> 
       <b> DATA ANGKOT</b>       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-table"></i>Data</a></li>
        <li class="active"><a href="/angkot">Data Angkot</a></li>
      </ol>
    </section>
 @if(count($angkots)> 0 )
        
    
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box box-default removable-box">
            <div class="box-header with-border">
              <span class="info-box-icon" style="background-color: white"><i class="ion ion-ios-paper-outline"></i></span>
              <div class="info-box-content">
                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>angkot</h4></span>
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
                  <th style="display:none;">Id</th>
                  <th>Kode Trayek</th>
                  <th>Trayek</th>
                  <th>Sumber</th>
                  <th style="display:none;">Id Data</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                ?>
                @foreach($angkots as $angkot)
                <tr>
                  <td>{{++$i}}</td>
                  <td style="display:none;">{{$angkot->id_angkot}}</td>
                  <td>{{$angkot->kode_trayek}}</td>
                  <td>{{$angkot->trayek}}</td>
                  <td>{{$angkot->sumber}}</td>
                  <td style="display:none;">{{$angkot->id_data}}</td>
                  <td style="white-space: nowrap;" align="center"> 
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-lihat-{{$angkot->id_angkot}}"><i class="ion-eye"></i></button>

                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-success" data-toggle="modal" data-target="#modal-edit-{{$angkot->id_angkot}}"><i class="ion-ios-compose"></i></button>

                    <button type="button" class="btn btn-flat btn-danger" data-toggle="modal"data-target="#modal-hapus-{{$angkot->id_angkot}}"><i class="ion-ios-trash"></i></button>
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

     <div class="modal fade" id="modal-lihat-{{$angkot->id_angkot}}">
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
                    Kode Trayek
                  </div>
                  <div class="col-xs-9">
                    {{ $angkot->kode_trayek }}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    Trayek
                  </div>
                  <div class="col-xs-9">
                    {{ $angkot->trayek }}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    Sumber
                  </div>
                  <div class="col-xs-9">
                    {{ $angkot->sumber }}
                  </div>
                </div>
              </div>
            </div>
           </div>
      </div>

{{-- ========================================================================================================================= --}}

      <div class="modal fade" id="modal-edit-{{$angkot->id_angkot}}">     
          <div class="modal-dialog">            
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center">Edit</h4>
              </div>


              <div class="modal-body">
              {!! Form::open(['action' => ['AngkotController@update', $angkot->id_angkot], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                <div class="form-group">
                  <label for="exampleInputPassword1">Kode Trayek</label>
                  <input type="text" class="form-control" name="kode_trayek" value="{{$angkot->kode_trayek}}">
                </div>          

                <div class="form-group">
                  <label for="exampleInputPassword1">Trayek</label>
                  <input type="text" class="form-control" name="trayek" value="{{$angkot->trayek}}">
                </div>                
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Trayek</label>
                  <input type="text" class="form-control" name="sumber" value="{{$angkot->sumber}}">
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
      <div class="modal fade" id="modal-hapus-{{$angkot->id_angkot}}">
          <div class="modal-dialog">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center">HAPUS</h4>
              </div>


              <div class="modal-body">
                <p>Apakah Anda yakin ingin data menghapus angkot ini?</p>
              </div>

              <div class="modal-footer">
                         
                            <form action="/angkot/{{$angkot->id_angkot}}" method="post">
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
  <p>No angkot was input</p>
@endif


@endsection