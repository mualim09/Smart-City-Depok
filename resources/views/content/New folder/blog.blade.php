@extends('layouts.app')
@section('content')

    <section class="content-header">
      <h1>
       Data Blog
       <small class="pull-right">21 Agustus 2017 10:45</small>
      </h1>
     </section>




    @if(count($blogs)> 0 )
        
    
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box box-default removable-box">
            <div class="box-header with-border">
              <span class="info-box-icon" style="background-color: white"><i class="ion ion-ios-paper-outline"></i></span>
              <div class="info-box-content">
                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>BLOG</h4></span>
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
              <table id="example" class="table table-bordered table-hover" style="overflow-x:auto;">
                <thead>
                <tr>
                  <th nowrap>Judul Blog</th>
                  <th nowrap>Tanggal Penulisan</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($blogs as $blog)
                <tr>
                  <td nowrap>{{$blog->judul}}</td>
                  <td nowrap>{{$blog->created_at}}</td>
                  <td nowrap> 
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat" data-toggle="modal" data-target="#modal-lihat-{{$blog->id_blog}}"><i class="ion-eye"></i></button>
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat" data-toggle="modal" data-target="#modal-edit-{{$blog->id_blog}}"><i class="ion-ios-compose"></i></button>
                    <button type="button" class="btn btn-flat" data-toggle="modal" data-target="#modal-hapus-{{$blog->id_blog}}"><i class="ion-ios-trash"></i></button>

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

     <div class="modal fade" id="modal-lihat-{{$blog->id_blog}}">
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
                    <th style="padding:10px">Judul Blog</th>
                    <td style="padding:10px">{{$blog->judul}}</td>
                  </tr>
                  <tr>
                    <th style="padding:10px">Gambar</th>
                    <td style="padding:10px"><img style="width:50%" src="/storage/img_blog/{{$blog->image}}"></td>
                  </tr>
                  <tr>
                    <th style="padding:10px">Isi</th>
                    <td style="padding:10px">{!!$blog->isi!!}</td>
                  </tr>
                  <tr>
                    <th style="padding:10px">Tanggal Penulisan</th>
                    <td style="padding:10px">{{$blog->created_at}}</td>
                  </tr>
                </table>
              </div>
            </div>
           </div>
      </div>

      <div class="modal fade" id="modal-edit-{{$blog->id_blog}}">
     
          <div class="modal-dialog">
             {!! Form::open(['action' => ['BlogController@update', $blog->id_blog], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center">Edit</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">Judul Blog</label>
                  <input type="text" class="form-control" name="judul" value="{{$blog->judul}}">
                </div>
                <div class="form-group">
                  {{Form::label('body', 'Isi')}}
                  {{Form::textarea('isi', $blog->isi,['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder'=>'Body Text'])}}
                </div>
                <div class="form-group">
                  {{Form::file('image')}}
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

      <div class="modal fade" id="modal-hapus-{{$blog->id_blog}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">HAPUS</h4>
              </div>
              <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus blog ini?</p>
              </div>
              <div class="modal-footer">
                         
                            <form action="/blogs/{{$blog->id_blog}}" method="post">
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
  <p>No blog was input</p>
@endif

<div align="center">
{{$blogs->links()}}
</div>

</div>
</div>

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



@endsection