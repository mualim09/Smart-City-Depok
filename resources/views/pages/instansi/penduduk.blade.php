@extends('layouts.app')
@section('content')

<section class="content-header">
      <h1 style="color:#807e7d"> 
       <b> DATA PENDUDUK</b>       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-table"></i>Data</a></li>
        <li class="active"><a href="/penduduk">Penduduk</a></li>
      </ol>
    </section>

 @if(count($penduduks)> 0 )
        
    
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box box-default removable-box">
            <div class="box-header with-border">
              <span class="info-box-icon" style="background-color: white"><i class="ion ion-ios-paper-outline"></i></span>
              <div class="info-box-content">
                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Penduduk</h4></span>
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
                <th>NO</th>
                  <th nowrap>Kecamatan</th>
                  <th nowrap>Kelurahan</th>
                  <th nowrap>Laki laki</th>
                  <th nowrap>Perempuan</th>
                  <th nowrap>Total</th>
                  <th style="display:none;">Id Data</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                ?>
                @foreach($penduduks as $penduduk)
                <tr>
                   <td>{{++$i}}</td>
                  <td nowrap>{{$penduduk->kecamatan}}</td>
                  <td nowrap>{{$penduduk->kelurahan}}</td>
                  <td nowrap>{{$penduduk->laki_laki}}</td>
                  <td nowrap>{{$penduduk->perempuan}}</td>
                  <td nowrap>{{$penduduk->total_penduduk_kel}}</td>
                  <td style="display:none;">{{$penduduk->id_data}}</td>

                  <td nowrap> 
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-lihat-{{$penduduk->id_penduduk}}"><i class="ion-eye"></i></button>
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-success" data-toggle="modal" data-target="#modal-edit-{{$penduduk->id_penduduk}}"><i class="ion-ios-compose"></i></button>
                    <button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus-{{$penduduk->id_penduduk}}"><i class="ion-ios-trash"></i></button>
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

 <div class="modal fade" id="modal-lihat-{{$penduduk->id_penduduk}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center">LIHAT</h4>
              </div>
              <div class="modal-body overflow-hidden">

                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                  <b>Kecamatan</b>
                  </div>
                  <div class="col-xs-9">
                    {{ $penduduk->kecamatan }}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                  <b>Kelurahan</b>
                  </div>
                  <div class="col-xs-9">
                    {{ $penduduk->kelurahan }}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                  <b>
                    Laki-laki
                  </b>
                  </div>
                  <div class="col-xs-9">
                    {{ $penduduk->laki_laki }}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Perempuan</b>
                  </div>
                  <div class="col-xs-9">
                    {{ $penduduk->perempuan}}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Total penduduk</b>
                  </div>
                  <div class="col-xs-9">
                    {{ $penduduk->total_penduduk_kel}}
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modal-edit-{{$penduduk->id_penduduk}}">
     
          <div class="modal-dialog">
             {!! Form::open(['action' => ['PendudukController@update', $penduduk->id_penduduk], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center">Edit</h4>
              </div>
              <div class="modal-body">
                
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Kecamatan</label>
                  <select class="form-control" name="kecamatan">
                                  <option value="{{$penduduk->kecamatan}}"></option>
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
                  <label for="exampleInputPassword1">Kelurahan</label>
                  <input type="text" class="form-control" name="kelurahan" value="{{$penduduk->kelurahan}}">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Laki Laki</label>
                  <input type="text" class="form-control" name="laki_laki" value="{{$penduduk->laki_laki}}">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Perempuan</label>
                  <input type="text" class="form-control" name="perempuan" value="{{$penduduk->perempuan}}">
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

      <div class="modal fade" id="modal-hapus-{{$penduduk->id_penduduk}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center">HAPUS</h4>
              </div>
              <div class="modal-body">
                <p>Apakah Anda yakin data ingin menghapus Penduduk ini?</p>
              </div>
              <div class="modal-footer">
                         
                            <form action="/penduduk/{{$penduduk->id_penduduk}}" method="post">
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
  <p>No penduduk was input</p>
@endif


</div>
</div>



@endsection