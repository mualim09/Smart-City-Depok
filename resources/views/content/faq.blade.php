@extends('layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
     <section class="content-header">
      <h1 style="color:#807e7d"> 
       <b>FAQ</b>       
      </h1>
    </section>  

@if(count($faqs)> 0 )
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box box-widget removable-box">
            <div class="box-header with-border">
              <span class="info-box-icon" style="background-color: white"><i class="ion ion-help-circled"></i></span>
              <div class="info-box-content">
                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>FAQ</h4></span>
              </div>
            </div>
{{-- =========================================================================================================== --}}
{!! Form::open(['action' => 'FaqController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
          <div class="modal fade" id="modal-tambah">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><center>TAMBAH DATA</center></b></h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Pertanyaan</label>
                  <input type="text" class="form-control" name="question" placeholder="question">
                </div>
                <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea class="form-control" rows="5" name="answer" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nanswer ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-flat" style="background-color: black; color:white">SUBMIT</button>
                {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>

{{-- ========================================================================================================= --}}
          <div class="content">
            <div class="box-body">
            <button class="btn" data-toggle="modal" data-target="#modal-tambah" style="background-color: #333333; color: white; margin-bottom: 5px"><i class="ion ion-plus" style="font-size: 36px"></i></button>
                <?php
                $i = 0;
                ?>
                @foreach($faqs as $faq)
            <div class="box box-primary direct-chat direct-chat-primary" style="border: 2px solid #333333">
            <div class="box-header with-border" style="background-color: #333333; color:white">
              <h3 class="box-title"><b>FAQ {{++$i}}</b></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus" style="color:white"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Edit" data-widget="chat-pane-toggle">
                  <i class="ion ion-edit" style="color:white"></i></button>
                <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#modal-hapus-{{$faq->id_faq}}"><i class="fa fa-times" style="color:white"></i></button>
              </div>
            </div>

{{-- ==================================================================================================================== --}}
            <div class="box-body">

            <div class="content">
            <h3 class="widget-user-username"><b>{{$faq->question}}</b></h3>
            <h5 class="widget-user-desc">{{$faq->answer}}</h5>
            </div>

              <div class="direct-chat-contacts" style="background-color: white; color:black">
          {!! Form::open(['action' => ['FaqController@update', $faq->id_faq], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}     
              <div class="content">
                
                <div class="form-group">
                  <label>Pertanyaan</label>
                  <input type="text" class="form-control" name="question" value="{{$faq->question}}" style="background-color: white; color:black">
                </div>
                <div class="form-group">
                  <label>Deskripsi</label>
                  {{Form::textarea('answer', $faq->answer,['class' => 'form-control' ])}}
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
        
      
      <!-- /.row -->
   {{--    <div class="modal fade" id="modal-lihat">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-grey">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><center>LIHAT</center></b></h4>
              </div>
              <div class="modal-body">
                <center>
                  <p><b><h3>What is Hi depokkkkkkkkk</h3></b></p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nanswer ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </center>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
 --}}
      
      <div class="modal fade" id="modal-hapus-{{$faq->id_faq}}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><center>HAPUS</center></b></h4>
            </div>
            
            <div class="modal-body"><center>
              <p>Apakah Anda yakin ingin menghapus FAQ ini?</p></center>
            </div>
            
            <div class="modal-footer">
              <form action="faqs/{{$faq->id_faq}}" method="post">
                            <input type="submit" class="btn btn-danger" name="submit" value="YA">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">      
                <button type="button" class="btn btn-primary btn-flat" data-dismiss="modal">TIDAK</button>
              </form>  
            </div>
          </div>
        </div>
      </div>

    </div>
    @endforeach
 
 <div align="center">{{$faqs->links()}}</div>  



    </div>
    </div> 
  </section>
    <!-- /.content -->

@endif    

    <style> 

#div2 {
    white-space: nowrap; 
    width: 80em; 
    overflow: hidden;
    text-overflow: ellipsis; 
}

</style>
@endsection