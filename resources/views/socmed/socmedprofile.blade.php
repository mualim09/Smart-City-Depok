@extends('socmed.socmed-layout.app')

@section('content')

<div class="box">

<section class="content-header overflow-hidden">
  <div class="col-xs-12 title-dashboard">
    <h3 style="margin-top: 0;">{!! str_replace('-', ' ', ucfirst(Request::route()->getName())) !!} </h3>
    <div class="line-height"></div>
  </div>
</section>

<div class="box-header with-border">

<div class="container">
  {{-- <h2>HOME</h2> --}}
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#tweet">Tweets</a></li>
    <li><a data-toggle="tab" href="#menu1">Following</a></li>
    <li><a data-toggle="tab" href="#menu2">Followers</a></li>
    <li><a data-toggle="tab" href="#menu3">Find</a></li>
  </ul>

  <div class="tab-content">
  <div id="tweet" class="tab-pane fade in active">
{{-- ISI Timeline --}}
  <div class="box-body">
          {{-- ==== --}}
    <div class="container">
    {{-- <div class="row justify-content-center"> --}}

    <div class="col-md-6 col-md-offset-2" style="background-color: white; box-shadow: 0px 0px 3px 0.5px #888888; padding: 2em; margin-top: 1em">


            <!-- Post Create Box
            ================================================= -->

           @foreach($get_tweets as $datas)

          @include('socmed.inc.timelinetweet')

           @endforeach
          <div style="text-align: right;">
          {{ $get_tweets->links() }}              
          </div>
            <!-- Post Content
            ================================================= -->
          </div>
    </div>
          {{-- ==== --}}
    </div> {{-- box didalam tab--}}
  </div>
{{-- ================================================== --}}
    

    <div id="menu1" class="tab-pane fade">
      
      <div class="box-body">
      {{-- <div class="container"> --}}
    {{-- <div class="row justify-content-center"> --}}
      <div class="col-md-11">
          {{--  ====  --}}
                    <div class="block-title">
                    <div class="friend-list">
                      <div class="row">
                        {{-- ===================================================================================================== --}}
                        @foreach ($get_following  as $follow)

                         @include('socmed.inc.akunview')                        

                        @endforeach
                        {{-- ===================================================================================================== --}}
                      </div>

                        <div style="text-align: right;">
                          {{$get_following->links()}}              
                        </div>

                    </div>
                </div>
            </div>
          {{-- </div> --}}
          {{-- ==== --}}
      </div>
    </div>
    
{{-- ================================================== --}}

    <div id="menu2" class="tab-pane fade">
  
          <div class="box-body">
      {{-- <div class="container"> --}}
    {{-- <div class="row justify-content-center"> --}}
      <div class="col-md-11">
          {{--  ====  --}}
                    <div class="block-title">
                    <div class="friend-list">
                      <div class="row">
{{-- ===================================================================================================== --}}
                        @foreach ($get_followers  as $follow)
                         
                         @include('socmed.inc.akunview')

                        @endforeach
{{-- ===================================================================================================== --}}   
                      </div>

                      <div style="text-align: right;">
                          {{$get_followers->links()}}              
                      </div>

                    </div>
                </div>
            </div>
          {{-- </div> --}}
          {{-- ==== --}}
      </div>
    </div>

{{-- ================================================== --}}
    

    <div id="menu3" class="tab-pane fade"> 
    <div class="box-body">
    <div class="container">

            <!-- Post Create Box
            ================================================= -->
        <div class="container">
          <div class="row">
                <div class="col-md-6">
                <h2>Cari Akun Twitter</h2>
                    <div id="custom-search-input">
                        <div class="input-group col-md-12">
                            <input type="text" class="form-control input-lg" name="namaakun" placeholder="pemkotdepok" />
                            <span class="input-group-btn">
                                <button class="btn btn-info btn-lg" type="button">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
          </div>
        </div>

    </div>
    </div> {{-- box didalam tab--}}
    </div>

{{-- ===============================================================================--}}
      </div>
    </div>     
  </div>

</div>

        


@endsection