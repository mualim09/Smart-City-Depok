@extends('layouts.app')
@section('content')

 <section class="content-header">
      <h1>
       DATA EVENT
        <small class="pull-right">21 Apgustus 2017 10:45</small>
      </h1>
     </section>

    @if(count($events)> 0 )

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box box-default removable-box">
            <div class="box-header with-border">
              <span class="info-box-icon" style="background-color: white"><i class="ion ion-ios-calendar-outline"></i></span>
              <div class="info-box-content">
                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>EVENT</h4></span>
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
              <table id="example" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th nowrap>Nama Event</th>
                  <th nowrap>Penyelenggara</th>
                  <th nowrap>Event Dimulai</th>
                  <th nowrap>Event Selesai</th>
                  <th nowrap>Lokasi</th>
                  <th nowrap>Tanggal Publish</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                 <?php
                $i = 0;
                ?>
                @foreach($events as $event) 
                <tr>
                  <td>{{++$i}}</td>
                  <td nowrap>{{$event->nama_event}}</td>
                  <td nowrap>{{$event->penyelenggara}}</td>
                  <td nowrap>{{$event->tgl_mulai}}</td>
                  <td nowrap>{{$event->tgl_akhir}}</td>
                  <td nowrap>{{$event->lokasi_event}}</td>
                  <td nowrap>{{$event->created_at}}</td>
                  <td nowrap> 
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-lihat-{{$event->id_event}}"><i class="ion-eye"></i></button>
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-success" data-toggle="modal" data-target="#modal-edit-{{$event->id_event}}"><i class="ion-ios-compose"></i></button>
                    <button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus-{{$event->id_event}}"><i class="ion-ios-trash"></i></button>
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
{{-- ========================================================================================================================= --}}

<div class="modal fade" id="modal-lihat-{{$event->id_event}}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" align="center"><b>LIHAT</b></h4>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-sm-12 border-right">
                                <div class="description-block">
                                  <img src="/storage/img_event/{{$event->image_event}}" width="45%">
                                </div>
                              </div>
                              <div class="col-sm-12 border-right">
                                <div class="description-block">
                                  <h5 class="description-header">Nama Event</h5>
                                  <span>{{$event->nama_event}}</span>
                                </div>
                              </div>
                              <div class="col-sm-12 border-right">
                                <div class="description-block">
                                  <h5 class="description-header">Penyelenggara</h5>
                                  <span>{{$event->penyelenggara}}</span>
                                </div>
                              </div>
                              <div class="col-sm-12 border-right">
                                <div class="description-block">
                                  <h5 class="description-header">Lokasi</h5>
                                  <span>{{$event->lokasi_event}}</span>
                                </div>
                              </div>
                              <div class="col-sm-12 border-right">
                                <div class="description-block">
                                  <h5 class="description-header">Deskripsi</h5>
                                  <span>{!!$event->deskripsi_event!!}</span>
                                </div>
                              </div>
                              <div class="col-sm-12 border-right">
                                <div class="description-block">
                                  <h5 class="description-header">Tanggal acara</h5>
                                  <span>{{$event->tgl_mulai}} sampai {{$event->tgl_akhir}}</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
{{-- =========================================================================================================================== --}}
      <div class="modal fade" id="modal-edit-{{$event->id_event}}">
          <div class="modal-dialog">
          {!! Form::open(['action' => ['EventController@update', $event->id_event], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center">Edit</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Event</label>
                  <input type="text" class="form-control" name="nama_event" value="{{$event->nama_event}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Penyelenggara</label>
                  <input type="text" class="form-control" name="penyelenggara" value="{{$event->penyelenggara}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Lokasi</label>
                  <input type="text" class="form-control" name="lokasi_event" value="{{$event->lokasi_event}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Event Dimulai</label>
                  <input type="text" class="form-control" name="tgl_mulai" value="{{$event->tgl_mulai}}">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Event Selesai</label>
                  <input type="text" class="form-control" name="tgl_akhir" value="{{$event->tgl_akhir}}">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Deskripsi</label>
                  <textarea class="form-control" id="event" name="deskripsi_event" value="{!!$event->deskripsi_event!!}"></textarea>
                </div>

                <div class="form-group">
                  {{Form::file('image_event')}}
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
        </div>  

{{-- =========================================================================================================================== --}}
      <div class="modal fade" id="modal-hapus-{{$event->id_event}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">HAPUS</h4>
              </div>
              <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus Event ini?</p>
              </div>
              <div class="modal-footer">
                         
                            <form action="/events/{{$event->id_event}}" method="post">
                            <input type="submit" class="btn btn-danger" name="submit" value="Ya">
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
  <p>No Event was input</p>
@endif
@endsection


