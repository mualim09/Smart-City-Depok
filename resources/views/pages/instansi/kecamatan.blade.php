@extends('layouts.app')
@section('content')

<section class="content-header">
      <h1 style="color:#807e7d"> 
       <b> DATA KECAMATAN</b>       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-table"></i>Data</a></li>
        <li class="active"><a href="/kecamatan">Kecamatan</a></li>
      </ol>
    </section>

 @if(count($kecamatans)> 0 )
        
    
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box box-default removable-box">
            <div class="box-header with-border">
              <span class="info-box-icon" style="background-color: white"><i class="ion ion-ios-paper-outline"></i></span>
              <div class="info-box-content">
                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Kecamatan</h4></span>
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
                  <th nowrap>Nama Camat</th>
                  <th nowrap>No Telpon</th>
                  <th nowrap>Kecamatan</th> 
                  <th nowrap>Alamat</th>
                  <th style="display:none;">Foto</th>
                  <th style="display:none;">Gambaran Umum</th>                  
                  <th style="display:none;">Sumber</th>
                  <th style="display:none;">Website</th>
                  <th style="display:none;">Koordinat</th>
                  <th style="display:none;">Id Data</th>

                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                ?>
                @foreach($kecamatans as $kecamatan)
                <tr>
                  <td>{{++$i}}</td>
                  <td nowrap>{{$kecamatan->nama_camat}}</td>
                  <td nowrap>{{$kecamatan->no_telp}}</td>
                  <td nowrap>{{$kecamatan->nama_kecamatan}}</td>
                  <td nowrap>{{$kecamatan->alamat}}</td>
                  <td style="display:none;">{{$kecamatan->foto}}</td>
                  <td style="display:none;">{{$kecamatan->gambaran_umum}}</td>
                  <td style="display:none;">{{$kecamatan->sumber}}</td>
                  <td style="display:none;">{{$kecamatan->website}}</td>
                  <td style="display:none;">{{$kecamatan->koordinat}}</td>
                  <td style="display:none;">{{$kecamatan->id_data}}</td>
                  
                  <td style="white-space: nowrap;" align="center"> 
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-lihat-{{$kecamatan->id_kecamatan}}"><i class="ion-eye"></i></button>

                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-success" data-toggle="modal" data-target="#modal-edit-{{$kecamatan->id_kecamatan}}"><i class="ion-ios-compose"></i></button>

                    <button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus-{{$kecamatan->id_kecamatan}}"><i class="ion-ios-trash"></i></button>

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


<div class="modal fade" id="modal-lihat-{{$kecamatan->id_kecamatan}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center">Lihat</h4>
              </div>
              <div class="modal-body overflow-hidden">
              <div class="col-sm-12 border-right">
               <div class="description-block">
                <img src="/storage/img_kecamatan/{{$kecamatan->foto}}" width="45%">
               </div>
              </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    Nama Camat
                  </div>
                  <div class="col-xs-9">
                    {{ $kecamatan->nama_camat }}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    Kecamatan
                  </div>
                  <div class="col-xs-9">
                    {{$kecamatan->nama_kecamatan}}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    No Telpon
                  </div>
                  <div class="col-xs-9">
                    {{ $kecamatan->no_telp}}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    Website
                  </div>
                  <div class="col-xs-9">
                    {{$kecamatan->website}}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    Alamat
                  </div>
                  <div class="col-xs-9">
                    {!!$kecamatan->alamat!!}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    Deskripsi
                  </div>
                  <div class="col-xs-9 white-space">
                   {!!$kecamatan->gambaran_umum!!}
                  </div>
                </div>
              <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    Sumber
                  </div>
                  <div class="col-xs-9">
                    {{$kecamatan->sumber}}
                  </div>
                </div>
                </div>
            </div>
           </div>
      </div>
{{-- ========================================================================================================================= --}}
      <div class="modal fade" id="modal-edit-{{$kecamatan->id_kecamatan}}">
          <div class="modal-dialog">
             {!! Form::open(['action' => ['KecamatanController@update', $kecamatan->id_kecamatan], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center">Edit</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Camat</label>
                  <input type="text" class="form-control" name="nama_camat" value="{{$kecamatan->nama_camat}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nomor Telepon</label>
                  <input type="text" class="form-control" name="no_telp" value="{{$kecamatan->no_telp}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Website</label>
                  <input type="text" class="form-control" name="website" value="{{$kecamatan->website}}">
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1">Kecamatan</label>
                  <select class="form-control" name="nama_kecamatan">
                                  <option value="{{$kecamatan->nama_kecamatan}}"></option>
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
                  <label for="exampleInputPassword1">Gambaran Umum</label>
                  <input type="textarea" class="form-control" name="gambaran_umum" value="{{$kecamatan->gambaran_umum}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Alamat</label>
                  {{Form::textarea('alamat', $kecamatan->alamat,['class' => 'form-control', 'placeholder'=>'Body Text'])}}
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Koordinat</label>
                  <input type="text" class="form-control" name="koordinat" value="{{$kecamatan->koordinat}}">
                </div>
            
                <div class="form-group">
                  {{Form::file('foto_kecamatan')}}
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



      <div class="modal fade" id="modal-hapus-{{$kecamatan->id_kecamatan}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center">HAPUS</h4>
              </div>
              <div class="modal-body">
                <p>Apakah Anda yakin data ingin menghapus  data Kecamatan ini?</p>
              </div>
              <div class="modal-footer">
                         
                            <form action="/kecamatan/{{$kecamatan->id_kecamatan}}" method="post">
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
<div class="box-body" align="center">
<br><br>
  <h4><p>No kecamatan was input</p></h4>
</div>  
@endif



</div>
</div>


@endsection