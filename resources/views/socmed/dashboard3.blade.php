{{-- 
<!DOCTYPE html>
<html>
<head>
<title>Laravel 5 - Twitter API</title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>


<div class="container">
    <h2>Laravel 5 - Twitter API</h2>


    <form method="POST" action="{{ route('post.tweet') }}" enctype="multipart/form-data">


        {{ csrf_field() }}


        @if(count($errors))
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <br/>
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="form-group">
            <label>Add Tweet Text:</label>
            <textarea class="form-control" name="tweet"></textarea>
        </div>
        <div class="form-group">
            <label>Add Multiple Images:</label>
            <input type="file" name="images[]" multiple class="form-control">
        </div>
        <div class="form-group">
            <button class="btn btn-success">Add New Tweet</button>
        </div>
    </form>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="50px">No</th>
                <th>Twitter Id</th>
                <th>Message</th>
                <th>Images</th>
                <th>Favorite</th>
                <th>Retweet</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($data))
                @foreach($data as $key => $value)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $value['id'] }}</td>
                        <td>{{ $value['text'] }}</td>
                        <td>
                            @if(!empty($value['extended_entities']['media']))
                                @foreach($value['extended_entities']['media'] as $v)
                                    <img src="{{ $v['media_url_https'] }}" style="width:100px;">
                                @endforeach
                            @endif
                        </td>
                        <td>{{ $value['favorite_count'] }}</td>
                        <td>{{ $value['retweet_count'] }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6">There are no data.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>


</body>
</html> --}}


@extends('layouts.app')

@section('content')

<section class="content-header">
      <h1 style="color:#807e7d"><b>
        DASHBOARD 3</b><SMALL>SOCIAL FEEDS</SMALL>
        <small class="pull-right">21 Agustus 2017 10:45</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- =========================================================== -->

      <div class="row">

        <div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua">
              <h3 class="widget-user-username">Twitter</h3>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="../../dist/img/user1-128x128.jpg" alt="User Avatar">

            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header" style="color:#807e7d">100</h5>
                    <span class="description-text" style="word-wrap: break-word">TWEETS </span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header" style="color:#807e7d">13,000</h5>
                    <span class="description-text" style="word-wrap: break-word">FOLLOWERS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header" style="color:#807e7d">35</h5>
                    <span class="description-text" style="word-wrap: break-word ">FOLLOWING</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>


      <!-- =========================================================== -->

      <div class="row">
        <div class="col-md-6">           
          <div class="user-block bg-aqua">  
              <span class="info-box-icon bg-aqua"><i class="ion-social-twitter-outline"></i>Twitter</span>
                <h3 class="widget-user-username" style="margin-top: 30px">Timeline</h3>
            </div>

          <div class="box box-widget" style="height: 570px;overflow-y: auto;">
            
{{--             <div class="box-header with-border">
              <div class="user-block">
                <img class="img-circle" src="../../dist/img/user1-128x128.jpg" alt="User Image">
                <span class="username"><a href="#"><font color="black">Jonathan Burke Jr.</font></a></span>
                <span class="description">@JonBurke 6h</span>
                 <p style="margin-top: 10px">Far far away, behind the word mountains, far from the
                countries Vokalia and Consonantia, there live the blind
                texts. Separated they live in Bookmarksgrove right at
                </div>
              <!-- /.user-block -->
            </div>
              <img src="../../dist/img/photo2.png" style="width:206px; height:84px;"> --}}
{{--             @if(!empty($data))
                @foreach($data as $key => $value)  
              <div class="box-body" class="container">
                <hr>
                <div class="user-block">
                        <img class="img-circle" src="../../dist/img/user1-128x128.jpg" alt="User Image">
                <span class="username"><a href="#"><font color="black">{{$value['user']['name']}}</font></a></span>
                <span class="description">@ {{$value['user']['screen_name']}} 6h</span>
                 <p style="margin-top: 10px">{{ $value['text'] }}
                </div>
              <!-- /.user-block -->
              <style>
                img {
                display: block;
                margin-left: auto;
                margin-right: auto;
                }
                </style>
                    @if(!empty($value['extended_entities']['media']))
                      @foreach($value['extended_entities']['media'] as $v)
                          <img img src="{{ $v['media_url_https'] }}" style="height: 170px; overflow-y: auto;">
                      @endforeach
                    @endif
                    <br>
            </div>
                <span >
              <button type="button" class="btn btn-box-tool"><i class="fa  fa-comment-o"></i></button>
              <button type="button" class="btn btn-box-tool"><i class="fa  fa-retweet">{{ $value['retweet_count'] }}</i></button>
              <button type="button" class="btn btn-box-tool"><i class="fa   fa-heart-o">{{ $value['favorite_count'] }}</i></button>
                </span>
                <hr>  
            @endforeach
            @else
                <tr>
                    <td colspan="6">There are no data.</td>
                </tr>
            @endif
               


            </div></p></div> --}}

        <div class="col-md-6">           
          <div class="user-block bg-aqua">  
              <span class="info-box-icon bg-aqua"><i class="ion-social-twitter-outline"></i>Twitter</span>
                <h3 class="widget-user-username" style="margin-top: 30px">Mention</h3>
            </div>

          <div class="box box-widget" style="height: 570px;overflow-y: auto;">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="img-circle" src="../../dist/img/user1-128x128.jpg" alt="User Image">
                <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                <span class="description">6 hours <i class="fa  fa-globe"></i></span>
                <p style="margin-top: 10px">Far far away, behind the word mountains, far from the
                countries Vokalia and Consonantia, there live the blind
                texts. Separated they live in Bookmarksgrove right at
                </div>
              <!-- /.user-block -->
            </div>
              <img src="../../dist/img/photo2.png" width="100%">
              <div class="box-body">
                <span >
              <button type="button" class="btn btn-box-tool"><i class="fa  fa-thumbs-up"></i></button>Like
              <button type="button" class="btn btn-box-tool"><i class="fa  fa-comment"></i></button>Comment
                </span>

                <hr>

                <div class="user-block">
                <img class="img-circle" src="../../dist/img/user1-128x128.jpg" alt="User Image">
                <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                <span class="description">6 hours <i class="fa  fa-globe"></i></span>
                <p style="margin-top: 10px">Far far away, behind the word mountains, far from the
                countries Vokalia and Consonantia, there live the blind
                texts. Separated they live in Bookmarksgrove right at
                </div>
              <!-- /.user-block -->
            </div>
              <img src="../../dist/img/photo2.png" width="100%">
              <div class="box-body">
                <span >
              <button type="button" class="btn btn-box-tool"><i class="fa  fa-thumbs-up"></i></button>Like
              <button type="button" class="btn btn-box-tool"><i class="fa  fa-comment"></i></button>Comment
                </span>

                <hr>

                <div class="user-block">
                <img class="img-circle" src="../../dist/img/user1-128x128.jpg" alt="User Image">
                <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                <span class="description">6 hours <i class="fa  fa-globe"></i></span>
                <p style="margin-top: 10px">Far far away, behind the word mountains, far from the
                countries Vokalia and Consonantia, there live the blind
                texts. Separated they live in Bookmarksgrove right at
                </div>
              <!-- /.user-block -->
            </div>
              <img src="../../dist/img/photo2.png" width="100%">
              <div class="box-body">
                <span >
              <button type="button" class="btn btn-box-tool"><i class="fa  fa-thumbs-up"></i></button>Like
              <button type="button" class="btn btn-box-tool"><i class="fa  fa-comment"></i></button>Comment
                </span>
              </div>
            </div></p></div>

 

    </section>
    @endsection