@extends('socmed.socmed-layout.app')

@section('content')

<div class="box">
<section class="content-header overflow-hidden">
  <div class="col-xs-12 title-dashboard">
    <h3 style="margin-top: 0;">{!! str_replace('-', ' ', ucfirst(Request::route()->getName())) !!}</h3>
    <div class="line-height"></div>
  </div>
</section>

<div class="box-header with-border">

  {{-- <h2>HOME</h2> --}}
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#timeline">Timeline</a></li>
    <li><a data-toggle="tab" href="#mention">Mention</a></li>
    <li><a data-toggle="tab" href="#like">Like</a></li>
    <li><a data-toggle="tab" href="#retweet">Retweet</a></li>
  </ul>

  <div class="tab-content">

  <div id="timeline" class="tab-pane fade in active">
{{-- ISI Timeline --}}
  <div class="box-body">
          {{-- ==== --}}
  <div class="box-body">
    <div class="col-md-7 col-md-offset-2" style="background-color: white; box-shadow: 0px 0px 3px 0.5px #888888;">  
  <form method="POST" action="{{ route('post.tweet') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
    <div class="create-post">
              <div class="row">
                <div class="col-md-8 col-sm-8">
                 <div class="row">
                      <div class="form-group col-xs-12">
                        <textarea name="tweet" class="form-control" placeholder="What's happening?" rows="4" cols="300" maxlength="280" required></textarea>
                      </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                  <div class="tools">
                    <ul class="publishing-tools list-inline pull-right">
                  <li><a href="#"><label class="ion-images"><input type="file" name="images[]" multiple class="form-control" style="display:none;"></label></a></li>
                      <li><a href="#"><i class="ion-ios-videocam"></i></a></li>
                      <li><a href="#"><i class="ion-map"></i></a></li>
                    </ul>
                    <button class="btn btn-primary pull-right">Tweet</button>
                  </div>
                </div>
              </div>
            </div>
  </form>
            <!-- Post Create Box End-->
  </div>
</div>
{{-- ############################################################################################################################################ --}}
{{-- ############################################################# TIMELINE ##################################################################### --}}
{{-- ############################################################################################################################################ --}}

  <div class="box-body">
    <div class="col-md-7 col-md-offset-2" style="background-color: white; box-shadow: 0px 0px 3px 0.5px #888888; padding: 2em; margin-top: 3em">
          
            {{-- ================================================= --}}
           @foreach($data1 as $datas)

              @include('socmed.inc.timelinetweet')

           @endforeach
            {{-- ================================================= --}}
          <div style="text-align: right;">
          {{ $data1->links() }}              
          </div>
          </div>
              {{-- ==== --}}
        </div>
    </div> {{-- box didalam tab--}}
  </div>
{{-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}
{{-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++ REPLY  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}
{{-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}
@foreach($data1 as $datas)

  @include('socmed.inc.replytweet')

@endforeach
{{-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}
{{-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++ RETWEET  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}
{{-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}
@foreach($data1 as $datas)

  @include('socmed.inc.retweettweet')

@endforeach




{{-- ====================================================================================================================================== --}}
{{-- =============================================================== Mention ============================================================== --}}

    
<div id="mention" class="tab-pane fade">
  
    <div class="box-body">
<div class="container">
<div class="col-md-6 col-md-offset-2" style="background-color: white; box-shadow: 0px 0px 3px 0.5px #888888; padding: 2em; margin-top: 3em">
      

       @foreach($data1_mention as $datas)

        @include('socmed.inc.timelinetweet')

       @endforeach

       <div style="text-align: right;">
      {{ $data1_mention->links() }}              
      </div>

  </div>
</div>
      {{-- ==== --}}
    </div>
</div>

{{-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}
{{-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++ REPLY +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}
{{-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}

@foreach($data1_mention as $datas)

  @include('socmed.inc.replytweet')

@endforeach

{{-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}
{{-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++ RETWEET +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}
{{-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}

@foreach($data1_mention as $datas)

  @include('socmed.inc.retweettweet')

@endforeach
    
{{-- ================================================== --}}

<div id="like" class="tab-pane fade">

<div class="box-body">
<div class="container">
<div class="col-md-6 col-md-offset-2" style="background-color: white; box-shadow: 0px 0px 3px 0.5px #888888; padding: 2em; margin-top: 3em">
      
       @foreach($data1_like as $datas)

          @include('socmed.inc.timelinetweet')

       @endforeach

       <div style="text-align: right;">
      {{ $data1_like->links() }}              
      </div>

  </div>
</div>
      {{-- ==== --}}
</div>
</div>

{{-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}
{{-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++ REPLY +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}
{{-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}

@foreach($data1_like as $datas)

  @include('socmed.inc.replytweet')

@endforeach

{{-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}
{{-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++ RETWEET +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}
{{-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}

@foreach($data1_like as $datas)

  @include('socmed.inc.retweettweet')

@endforeach

{{-- ================================================== --}}
    

<div id="retweet" class="tab-pane fade">  
  <div class="box-body">
    <div class="container">
      <div class="col-md-6 col-md-offset-2" style="background-color: white; box-shadow: 0px 0px 3px 0.5px #888888; padding: 2em; margin-top: 3em">
      
       @foreach($data1_retweet as $datas)
       @if (!empty($datas['retweet_status']))

          @include('socmed.inc.timelinetweet')
          
       @endif
       @endforeach

       <div style="text-align: right;">
      {{ $data1_retweet->links() }}              
      </div>

      </div>
    </div>    
  </div>
</div>

{{-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}
{{-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++ REPLY +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}
{{-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}

@foreach($data1_retweet as $datas)

  @include('socmed.inc.replytweet')

@endforeach

{{-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}
{{-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++ RETWEET +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}
{{-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}

@foreach($data1_retweet as $datas)

  @include('socmed.inc.retweettweet')

@endforeach

{{-- ========================================================================================================================================= --}}
  </div>   
  </div>
        <!-- /.box-body -->

        <!-- /.box-footer-->
</div>

        


@endsection