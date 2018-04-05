@extends('layouts.app')

@section('content')


    <section class="content-header">
      <h1 style="color:#807e7d"> 
       <b>EDIT ABOUT</b>       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Content</a></li>
        <li class="active"><a href="#">Edit About</li>
      </ol>
    </section>  

    <!--<section class="content-header">
      <h1 style="color:#807e7d">
         ABOUT
        <small class="pull-right">21 Agustus 2017 10:45</small>
      </h1>
    </section>-->

{!! Form::open(['action' => ['AboutController@update', $about->id_about], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <section class="content">
          <div class="box box-widget">
            
            <div class="box-body" style="padding: 5%">
              <h1 style="background-color: white; text-align: justify; text-justify: inter-word; color: black"><b>ABOUT</b></h1>
              
              <div class="form-group">
              {{-- <input type="text" class="form-control" name="sumber" value="{{$about->isi_about}}"> --}}
              {{Form::textarea('isi_about', $about->isi_about,['class' => 'form-control' ])}}
              </div>

              {{Form::hidden('_method', 'PUT')}}
              <button type="submit" class="btn flat pull-right" style="background-color: black; color: white">EDIT</button>
            </div>

          </div>
    </section>
{!! Form::close() !!}


{{-- <script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script> --}}

@endsection

