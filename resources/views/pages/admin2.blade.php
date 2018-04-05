@extends('layouts.app')

@section('content')


<section class="content-header">
      <h1>
        ADMIN
        <small class="pull-right">21 Agustus 2017 10:45</small>
      </h1>
</section>

 @if(count($adminopds)> 0 )
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
           		<li><a href="/dataadmin1">Tambah Data</a></li>
              	<li class="active"><a href="#data" data-toggle="tab">Data</a></li>
            </ul>
            <div class="box-body border-radius-none">
              <div class="tab-content">
               

                <div class="tab-pane active" id="data">

                  <div class="box-body">
                  <div class="box-header with-border">
                  <div class="row">
                  <div class="col-md-12" style="padding-right:1%; padding-left: 1%">
                  <div class="box-body">
                  
                  
                  <div style="overflow-x: auto">
                  <table id="examples" class="table table-striped table-bordered" style="overflow-x:auto;width: 100%" >
                      <thead>
                      <tr>
                        <th>No</th>
                        <th nowrap>NIP</th>
                        <th nowrap>Nama OPD</th>
                        <th nowrap>Alamat</th>
                        <th nowrap>Nomor Telepom</th>
                        <th nowrap>Email</th>
                        <th nowrap>Username</th>
                        <th nowrap>Password</th>
                        <th nowrap></th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php
                      $i = 0;
                      ?>
                @foreach($adminopds as $adminopd)

                      <tr>
                        <td>{{++$i}}</td>
                        <td nowrap>{{$adminopd->nip}}</td>
                        <td nowrap>{{$adminopd->nama_opd}}</td>
                        <td nowrap>{{$adminopd->alamat}}</td>
                        <td nowrap>{{$adminopd->no_telp}}</td>
                        <td nowrap>{{$adminopd->email}}</td>
                        <td nowrap>{{$adminopd->username_opd}}</td>
                        <td nowrap>{{$adminopd->password_opd}}</td>
                  
                        <td style="white-space: nowrap;" align="center">                    
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-success" data-toggle="modal" data-target="#modal-edit-{{$adminopd->id_opd}}"><i class="ion-ios-compose"></i></button>

                        <button type="button" class="btn btn-flat btn-danger" data-toggle="modal"data-target="#modal-hapus-{{$adminopd->id_opd}}"><i class="ion-ios-trash"></i></button>
                      </td>  
                      </tr>
{{-- ========================================================================================================================= --}}

      <div class="modal fade" id="modal-edit-{{$adminopd->id_opd}}">     
          <div class="modal-dialog">            
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center">Edit</h4>
              </div>


              <div class="modal-body">
              {!! Form::open(['action' => ['AdminopdController@update', $adminopd->id_opd], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                <div class="form-group">
                  <label for="exampleInputPassword1">Nip</label>
                  <input type="text" class="form-control" name="nip" value="{{$adminopd->nip}}">
                </div>          

                <div class="form-group">
                  <label for="exampleInputPassword1">Nama</label>
                  <input type="text" class="form-control" name="nama_opd" value="{{$adminopd->nama_opd}}">
                </div>                
                
                <div class="form-group">
                  <label for="exampleInputPassword1">No Telpon</label>
                  <input type="text" class="form-control" name="no_telp" value="{{$adminopd->no_telp}}">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
                  <input type="text" class="form-control" name="email" value="{{$adminopd->email}}">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Username admin</label>
                  <input type="text" class="form-control" name="username_opd" value="{{$adminopd->username_opd}}">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Password admin</label>
                  <input type="text" class="form-control" name="password_opd" value="{{$adminopd->password_opd}}">
                </div>

                <div class="form-group">
                  <label>Alamat</label>
                  {{Form::textarea('alamat', $adminopd->alamat,['class' => 'form-control' ])}}
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
      <div class="modal fade" id="modal-hapus-{{$adminopd->id_opd}}">
          <div class="modal-dialog">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center">HAPUS</h4>
              </div>


              <div class="modal-body">
                <p>Apakah Anda yakin ingin data menghapus admin ini?</p>
              </div>

              <div class="modal-footer">
                         
                            <form action="/adminopd/{{$adminopd->id_opd}}" method="post">
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
  <p>No Admin was input</p>
@endif



{{-- 
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
 --}}


@endsection