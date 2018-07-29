@extends('layouts.app')

@section('content')


    <section class="content-header">
      <h1 style="color:#807e7d">
         BLOG
        <small class="pull-right">21 Agustus 2017 10:45</small>
      </h1>
    </section>


    <section class="content">
          <div class="box box-success">
            <div class="box-header with-border">
              <span class="info-box-icon" style="background-color: white"><i class="ion ion-ios-paper-outline"></i></span>
              <div class="info-box-content">
                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Blog</h4></span>
              </div>
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
              </div>
            </div>
            <div class="box-body pad">
              {!! Form::open(['action' => 'BlogController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" width="50%">
                <br>
                <div class="form-group">
                  {{Form::textarea('isi', '',['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder'=>'Body Text'])}}
                </div>
                <!--
                <br>
                <div class="form-group">
                  {{Form::file('image')}}
                </div>
                <br>-->
                <input type="submit" class="btn btn-success pull-right" name="Submit" value="Submit">
              {!! Form::close() !!}
            </div>
          </div>
    </section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
<script>
        $('textarea').ckeditor();
        // $('.textarea').ckeditor(); // if class is prefered.
    </script>

@endsection

