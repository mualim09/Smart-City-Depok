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
              <li><a href="/karya">PROCESSED</a></li>
              <li class="active"><a href="/karyaaccept">ACCEPTED</a></li>
              <li><a href="/karyareject">REJECTED</a></li>
            </ul>
            <div class="tab-content">
{{-- ==========================================================================================================================================  --}}

         
{{-- =========================================================================================================================================== --}}

               
            <div class="tab-pane active">
              @if(count($masterpiecess)> 0 )
              <div class="row">

              @foreach($masterpiecess as $masterpiece)
                <div class="col-md-4">           
                  <div class="box box-widget" >
                    <div class="box-header with-border">


                      <div class="user-block">
                        {{-- @foreach($user_foto as $fotos)  --}} 
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

                      </center></span>
                    </div>
                  </div>
                </div>
              @endforeach

              </div>
            </div><!-- /.tab-pane -->
         @endif 
  {{-- ======================================================================================================================================== --}}

{{-- ======================================================================================================================= --}}



          </div>
          <!-- nav-tabs-custom -->
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection