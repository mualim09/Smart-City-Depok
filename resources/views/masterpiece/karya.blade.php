  @extends('layouts.app')

@section('content')




    <section class="content-header">
      <h1 style="color:#807e7d"> 
       <b>KARYA</b>       
      </h1>
    </section>  

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
           
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="/karya">PROCESSED</a></li>
              <li><a href="/karyaaccept">ACCEPTED</a></li>
              <li><a href="/karyareject">REJECTED</a></li>
            </ul>
            <div class="tab-content">
{{-- ==========================================================================================================================================  --}}
            @if(count($masterpieces)> 0 )
            <div class="tab-pane active" id="tab_1" >
           
              <div class="row">

              @foreach($masterpieces as $masterpiece)
                <div class="col-md-4">           
                  <div class="box box-widget" >
                    <div class="box-header with-border">

                      
                      <div class="user-block">
                        {{-- {{$user_foto}} --}}
                        <img class="img-square" src="../../dist/img/user1-128x128.jpg" alt="User Image">
                        {{-- @endforeach --}}
                        <span class="username"><a href="#"><font color="black">{{$masterpiece->nama_peraih}}</font></a></span>
                        <span class="description">{{$masterpiece->nama_prestasi}}</span>
                        <span class="description">{{$masterpiece->kategori}}</span>
                        <p style="margin-top: 10px">{{$masterpiece->deskripsi}}</p>
                      </div>
                      
                    </div>
                    <img src="/storage/img_masterpiece/{{$masterpiece->image}}" width="100%">
                    <div class="box-body">
                      <span><center>

                      
                      <button type="button" class="btn btn-box-tool"><i class="fa   fa-heart-o"></i></button>{{$masterpiece->jumlah_suka}} Suka
                      <button type="button" class="btn btn-box-tool"><i class="fa  fa-comment-o"></i></button>{{$masterpiece->jumlah_komentar}} Komentar
                      </center></span>
                    </div>

                    <div class="box-footer">
                      <span><center>
                      {!! Form::open(['action' => ['MasterpieceController@accept', $masterpiece->id_penghargaan], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                      
                      <select class="form-control" name="status">
                                <option value="diterima">TERIMA</option>
                                <option value="ditolak">TOLAK</option>
                       </select>
                       <div class="modal-footer">
                      {{Form::hidden('_method', 'PUT')}}
                      <button type="submit" class="btn btn-info btn-fill pull-right">PROCESSED</button>
                      <div class="clearfix"></div>
                      </div>           
                      {!! Form::close() !!}
                      </center></span>
                    </div>

                  </div>
                </div>
              @endforeach 

              {{-- @else
              <p>DATA GA ADA YG BARU</p> --}}

              </div>
            </div><!-- /.tab-pane -->

           

          

         
{{-- =========================================================================================================================================== --}}

{{-- ======================================================================================================================= --}}

          @else
          <br>
         <p align="center">DATA TERBARU BELUM TERSEDIA</p> 
        @endif 

          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection