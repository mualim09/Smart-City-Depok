@extends('layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DATA Kritik dan Saran
        <small class="pull-right">21 Agustus 2017 10:45</small>
      </h1>
    </section>

   @if(count($complaints)> 0 )
    
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box box-default removable-box">
            <div class="box-header with-border">
              <span class="info-box-icon" style="background-color: white"><i class="ion ion-ios-people-outline"></i></span>
              <div class="info-box-content">
                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Kritik dan Saran</h4></span>
              </div>
            </div>

            <div class="box-body">
              <div style="overflow-x: auto">
              <table id="example" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th nowrap>Nama </th>
                  <th nowrap>Asal (Intansi/Alamat)  </th>
                  <th nowrap></th>
                </tr>
                </thead>
                <tbody>
                @foreach($complaints as $complaint)
                <tr>
                  <td nowrap>{{$complaint->nama}}</td>
                  <td nowrap>{{$complaint->asal}}</td>
                  <td nowrap>
                     <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-lihat-{{$complaint->id_complain}}"><i class="ion-eye"></i></button>
                    <button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus-{{$complaint->id_complain}}"><i class="ion-ios-trash"></i></button>

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

     <div class="modal fade" id="modal-lihat-{{$complaint->id_complain}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center">Lihat</h4>
              </div>
              <div class="modal-body">
              <table style="padding:10px">
                <tr>
                  <th>Nama</th>
                  <td style="padding:15px">{{$complaint->nama}}</td>
                </tr>
                <tr>
                  <th>NIK</th>
                  <td style="padding:15px">{{$complaint->nik}}</td>
                </tr>
                <tr>
                  <th>Asal/Intansi</th>
                  <td style="padding:15px">{{$complaint->asal}}</td>
                </tr>
                <tr>
                  <th>Pesan</th>
                  <td style="padding:15px">{{$complaint->pesan}}</td>
                </tr>
              </table>
              </div>
            </div>
            </div>
           </div>
      </div>

       

      <div class="modal fade" id="modal-hapus-{{$complaint->id_complain}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">HAPUS</h4>
              </div>
              <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus Kritik / Saran ini?</p>
              </div>
              <div class="modal-footer">
                         
                            <form action="/complaint/{{$complaint->id_complain}}" method="post">
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

                  </td>
                </tr>
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
  <p>Tidak ada Kritik dan Saran yang masuk</p>
@endif

<div align="center">
{{$complaints->links()}}
</div>

</div>
</div>


@endsection

