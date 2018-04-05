@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
       USER
       <small class="pull-right">21 Agustus 2017 10:45</small>
      </h1>
    </section>
 @if(count($users)> 0 )

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-default removable-box">            
            <div class="box-body">
              <div class="box-header with-border">
                <div class="col-md-12">
                  <form action="import_apotek" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                    <button type="button" class="btn btn-file btn-flat" style="background-color: black; color:white">Import Data<input type="file" name="csv_file"></button>
                    <button type="submit" class="btn btn-flat" data-dismiss="modal"><i class="ion ion-checkmark"></i></button>
                  </form>
                  <label style="font-size: 12px">Import Melalui Excel (.csv)</label>
                </div> 
              </div>
            </div>

            <div class="box-body">
              <div class="box-header with-border">
                <div class="row">
                  <div class="col-md-12" style="padding-right:1%; padding-left: 1%">
                    <div class="box-body">
                      
                        <table id="example" class="table table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th nowrap>Nama</th>
                              <th nowrap>Alamat</th>
                              <th nowrap>Nomor Telepon</th>
                              <th nowrap>Email</th>
                              <th nowrap>Tanggal bergabung</th>

                            </tr>
                          </thead>
                          <tbody>
                           <?php
                            $i = 0;
                            ?>
                            @foreach($users as $user)
                            <tr>
                              <td>{{++$i}}</td>
                              <td nowrap>{{$user->username}}</td>
                              <td nowrap>{{$user->alamat}}</td>
                              <td nowrap>{{$user->no_telp}}</td>
                              <td nowrap>{{$user->email}}</td>
                              <td nowrap>{{$user->created_at}}</td>
                              <td nowrap>
                                <a href="/datauser/{{$user->username}}" target="_blank" style="text-decoration: none"><button class="btn btn-flat btn-info"><i class="ion-eye"></i></button></a>
                                <button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus-{{$user->id_user}}"><i class="ion-ios-trash"></i></button>
                              </td>  
                            </tr>
                          

                       

                        <div class="modal fade" id="modal-hapus-{{$user->id_user}}">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><center><b>HAPUS</b></center></h4>
                              </div>
                              <div class="modal-body"><center>
                                <p>Apakah Anda yakin akan menghapus data ini?</p></center>
                              </div>
                              <div class="modal-footer">
                                <form action="/datauser/{{$user->id_user}}" method="post">
                                <input type="submit" class="btn btn-danger" name="submit" value="YA">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                </form>
                                <button type="button" class="btn btn-primary btn-flat" data-dismiss="modal">Tidak</button>
                              </div>
                            </div>
                          </div>
                        </div>

                        @endforeach
                        </tbody>
                        </table>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>

@else
  <p>No angkot was input</p>
@endif




@endsection