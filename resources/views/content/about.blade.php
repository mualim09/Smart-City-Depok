@extends('layouts.app')

@section('content')


    
    <section class="content-header">
      <h1 style="color:#807e7d"> 
       <b>ABOUT</b>       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Content</a></li>
        <li class="active"><a href="#">About</li>
      </ol>
    </section>  

    <!--<section class="content-header">
      <h1 style="color:#807e7d">
         ABOUT
        <small class="pull-right">21 Agustus 2017 10:45</small>
      </h1>
    </section>-->

@if(count($abouts)> 0 )
    <section class="content">
          <div class="box box-widget">
            <div class="box-body" style="padding: 5%">
              @foreach($abouts as $about)
              <h1 style="background-color: white; text-align: justify; text-justify: inter-word; color: black"><b>ABOUT</b></h1>
              <font color="black">{!!$about->isi_about!!}</font>
              <hr><a href="/abouts/{{$about->id_about}}/edit" ><button class="btn flat pull-right" style="background-color: black; color: white">EDIT</button></a>
            @endforeach
            </div>
          </div>
    </section>
@endif


{{-- 
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script> --}}

@endsection

