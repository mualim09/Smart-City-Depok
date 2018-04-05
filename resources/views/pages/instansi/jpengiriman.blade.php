@extends('layouts.app')
@section('content')

<section class="content-header">
      <h1 style="color:#807e7d"> 
       <b> DATA JASA PENGIRIMAN</b>       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-table"></i>Data</a></li>
        <li class="active"><a href="/jpengiriman">Jasa Pengiriman</a></li>
      </ol>
    </section>

 @if(count($pengirimans)> 0 )
        
    
    <!-- Main content -->
 <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box box-default removable-box">
            <div class="box-header with-border">
              <span class="info-box-icon" style="background-color: white"><i class="ion ion-ios-paper-outline"></i></span>
              <div class="info-box-content">
                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>JASA PENGIRIMAN</h4></span>
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
                @foreach($pengirimans as $pengiriman)
                <tr>
                  <td>{{++$i}}</td>
                  <td>{{$pengiriman->nama_tempat}}</td>
                  <td style="display:none;">{{$pengiriman->gambaran_umum}}</td>
                  <td style="display:none;">{{$pengiriman->alamat}}</td>
                  <td>{{$pengiriman->no_telp}}</td>
                  <td>{{$pengiriman->jam_operasional}}</td>
                  <td style="display:none;">{{$pengiriman->koordinat}}</td>
                  <td>{{$pengiriman->kecamatan}}</td>               
                  <td>{{$pengiriman->website}}</td>
                  <td style="display:none;">{{$pengiriman->foto}}</td>
                  <td style="display:none;">{{$pengiriman->sumber}}</td>
                  <td style="display:none;">{{$pengiriman->id_data}}</td>

                  <td style="white-space: nowrap;" align="center"> 
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-lihat-{{$pengiriman->id_pengiriman}}"><i class="ion-eye"></i></button>

                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-success" data-toggle="modal" data-target="#modal-edit-{{$pengiriman->id_pengiriman}}"><i class="ion-ios-compose"></i></button>

                    <button type="button" class="btn btn-flat btn-danger" data-toggle="modal"data-target="#modal-hapus-{{$pengiriman->id_pengiriman}}"><i class="ion-ios-trash"></i></button>
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
 <div class="modal fade" id="modal-lihat-{{$pengiriman->id_pengiriman}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center">LIHAT</h4>
              </div>
              <div class="modal-body overflow-hidden">

                <div class="col-xs-12 img-table">
                    <img src="/storage/img_jpengiriman/{{$pengiriman->foto}}">
                </div>


                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                  <b>Nama Tempat</b>
                  </div>
                  <div class="col-xs-9">
                    {{ $pengiriman->nama_tempat }}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                  <b>
                    Website
                  </b>
                  </div>
                  <div class="col-xs-9">
                    {{ $pengiriman->website }}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>No Telpon</b>
                  </div>
                  <div class="col-xs-9">
                    {{ $pengiriman->no_telp}}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Jam Operasional</b>
                  </div>
                  <div class="col-xs-9">
                    {{ $pengiriman->jam_operasional}}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Kecamatan</b>
                  </div>
                  <div class="col-xs-9">
                    {{ $pengiriman->kecamatan }}
                  </div>
                </div>
                
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Alamat</b>
                  </div>
                  <div class="col-xs-9">
                    {!!$pengiriman->alamat!!}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Deskripsi</b>
                  </div>
                  <div class="col-xs-9 white-space">
                    {!! $pengiriman->gambaran_umum !!}
                  </div>
                </div>
              <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Sumber</b>
                  </div>
                  <div class="col-xs-9">
                    {{ $pengiriman->sumber }}
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>

{{-- ========================================================================================================================= --}}

      <div class="modal fade" id="modal-edit-{{$pengiriman->id_pengiriman}}">     
          <div class="modal-dialog">            
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center">Edit</h4>
              </div>


              <div class="modal-body">
              {!! Form::open(['action' => ['JpengirimanController@update', $pengiriman->id_pengiriman], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Tempat</label>
                  <input type="text" class="form-control" name="nama_tempat" value="{{$pengiriman->nama_tempat}}">
                </div>          

                <div class="form-group">
                  <label>Gambaran Umum</label>
                  {{Form::textarea('gambaran_umum', $pengiriman->gambaran_umum,['class' => 'form-control' ])}}
                </div>

                <div class="form-group">
                  <label>Alamat</label>
                  {{Form::textarea('alamat', $pengiriman->alamat,['class' => 'form-control' ])}}
                </div>

                <div class="form-group">
                  <select class="form-control" name="kecamatan">
                                  <option value="{{$pengiriman->kecamatan}}"></option>
                                  <option value="beji">Beji</option>
                                  <option value="bojongsari">Bojongsari</option>
                                  <option value="cimanggis">Cimanggis</option>
                                  <option value="cinere">Cinere</option>
                                  <option value="cilodong">Cilodong</option>
                                  <option value="cipayung">Cipayung</option>
                                  <option value="limo">Limo</option>
                                  <option value="pancoran mas">Pancoran Mas</option>
                                  <option value="sawangan">Sawangan</option>
                                  <option value="sukmajaya">Sukmajaya</option>
                                  <option value="tapos">Tapos</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Nomor Telepon</label>
                  <input type="text" class="form-control" name="no_telp" value="{{$pengiriman->no_telp}}">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Jam Operasional</label>
                  <input type="text" class="form-control" name="jam_operasional" value="{{$pengiriman->jam_operasional}}">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Koordinat</label>
                  <input type="text" class="form-control" name="koordinat" value="{{$pengiriman->koordinat}}">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Website</label>
                  <input type="text" class="form-control" name="website" value="{{$pengiriman->website}}">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Sumber</label>
                  <input type="text" class="form-control" name="sumber" value="{{$pengiriman->sumber}}">
                </div>
                
                <div class="form-group">
                  {{Form::file('foto')}}
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
      <div class="modal fade" id="modal-hapus-{{$pengiriman->id_pengiriman}}">
          <div class="modal-dialog">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center">HAPUS</h4>
              </div>


              <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus data jasa pengiriman ini?</p>
              </div>

              <div class="modal-footer">
                         
                            <form action="/jpengiriman/{{$pengiriman->id_pengiriman}}" method="post">
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
  <p>No pengiriman was input</p>
@endif


@endsection