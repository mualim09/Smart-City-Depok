@extends('layouts.app')
@section('content')

<section class="content-header">
      <h1 style="color:#807e7d"> 
       <b> DATA PANTI</b>       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-table"></i>Data</a></li>
        <li class="active"><a href="/panti">Data Panti</a></li>
      </ol>
    </section>



 @if(count($pantis)> 0 )
        
    
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box box-default removable-box">
            <div class="box-header with-border">
              <span class="info-box-icon" style="background-color: white"><i class="ion ion-ios-paper-outline"></i></span>
              <div class="info-box-content">
                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Panti</h4></span>
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
                  <th>Nama Panti</th>
                  <th>Penanggung Jawab</th>
                  <th>Kontak</th>
                  <th>Kecamatan</th>
                  <th style="display:none;">Deskripsi</th>
                  <th style="display:none;">Alamat</th>
                  <th style="display:none;">Jumlah anak</th>
                  <th style="display:none;">Jumlah anak angkat</th>
                  <th style="display:none;">sumber</th>
                  <th style="display:none;">Id data</th>

                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                ?>
                @foreach($pantis as $panti)
                <tr>
                  <td>{{++$i}}</td>
                  <td>{{$panti->nama_panti}}</td>
                  <td>{{$panti->nama_pj}}</td>
                  <td>{{$panti->kontak}}</td>
                  <td>{{$panti->kecamatan}}</td>              
                  <td style="display:none;">{{$panti->deskripsi}}</td>
                  <td style="display:none;">{{$panti->alamat}}</td>
                  <td style="display:none;">{{$panti->jumlah_anak}}</td>
                  <td style="display:none;">{{$panti->jumlah_anak_angkat}}</td>
                  <td style="display:none;">{{$panti->sumber}}</td>
                  <td style="display:none;">{{$panti->id_data}}</td>

                  <td style="white-space: nowrap;" align="center">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-lihat-{{$panti->id_panti}}"><i class="ion-eye"></i></button>
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-success" data-toggle="modal" data-target="#modal-edit-{{$panti->id_panti}}"><i class="ion-ios-compose"></i></button>
                    <button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus-{{$panti->id_panti}}"><i class="ion-ios-trash"></i></button>
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

{{-- ==================================================================================================================== --}}

 <div class="modal fade" id="modal-lihat-{{$panti->id_panti}}">
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
                  <b>Nama Panti</b>
                  </div>
                  <div class="col-xs-9">
                    {{ $panti->nama_panti }}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                  <b>
                    Penanggung Jawab
                  </b>
                  </div>
                  <div class="col-xs-9">
                    {{ $panti->nama_pj }}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Kontak</b>
                  </div>
                  <div class="col-xs-9">
                    {{ $panti->kontak}}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Jumlah anak</b>
                  </div>
                  <div class="col-xs-9">
                    {{ $panti->jumlah_anak}}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Jumlah anak angkat</b>
                  </div>
                  <div class="col-xs-9">
                    {{ $panti->jumlah_anak_angkat}}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Kecamatan</b>
                  </div>
                  <div class="col-xs-9">
                    {{ $panti->kecamatan }}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Deskripsi</b>
                  </div>
                  <div class="col-xs-9 white-space">
                    {!! $panti->deskripsi!!}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Alamat</b>
                  </div>
                  <div class="col-xs-9">
                    {!!$panti->alamat!!}
                  </div>
                </div>
                
              <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Sumber</b>
                  </div>
                  <div class="col-xs-9">
                    {{ $panti->sumber }}
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
{{-- ======================================================================================================================= --}}
      <div class="modal fade" id="modal-edit-{{$panti->id_panti}}">
     
          <div class="modal-dialog">
             {!! Form::open(['action' => ['PantiController@update', $panti->id_panti], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center">Edit</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Panti</label>
                  <input type="text" class="form-control" name="nama_panti" value="{{$panti->nama_panti}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Penjaga</label>
                  <input type="text" class="form-control" name="nama_pj" value="{{$panti->nama_pj}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nomor Telepon</label>
                  <input type="text" class="form-control" name="kontak" value="{{$panti->kontak}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jumlah Anak</label>
                  <input type="text" class="form-control" name="jumlah_anak" value="{{$panti->jumlah_anak}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jumlah Anak Angkat</label>
                  <input type="text" class="form-control" name="jumlah_anak_angkat" value="{{$panti->jumlah_anak_angkat}}">
                </div>
                <div class="form-group">
                  <select class="form-control" name="kecamatan">
                                  <option value="{{$panti->kecamatan}}"></option>
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
                  <label for="exampleInputPassword1">Sumber</label>
                  <input type="text" class="form-control" name="sumber" value="{{$panti->sumber}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Alamat</label>
                  {{Form::textarea('alamat', $panti->alamat,['class' => 'form-control', 'placeholder'=>'Body Text'])}}
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Deskripsi</label>
                  {{Form::textarea('deskripsi', $panti->deskripsi,['class' => 'form-control', 'placeholder'=>'Body Text'])}}
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

      <div class="modal fade" id="modal-hapus-{{$panti->id_panti}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center">HAPUS</h4>
              </div>
              <div class="modal-body">
                <p>Apakah Anda yakin data ingin menghapus Panti ini?</p>
              </div>
              <div class="modal-footer">
                         
                            <form action="/panti/{{$panti->id_panti}}" method="post">
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
  <p>No panti was input</p>
@endif


@endsection