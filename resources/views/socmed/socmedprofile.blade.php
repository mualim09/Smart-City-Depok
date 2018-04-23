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

<div class="container">
  {{-- <h2>HOME</h2> --}}
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#tweet">Tweets</a></li>
    <li><a data-toggle="tab" href="#menu1">Following</a></li>
    <li><a data-toggle="tab" href="#menu2">Followers</a></li>
    <li><a data-toggle="tab" href="#menu3">Likes</a></li>
  </ul>

  <div class="tab-content">
  <div id="tweet" class="tab-pane fade in active">
{{-- ISI Timeline --}}
  <div class="box-body">
          {{-- ==== --}}
    <div class="container">
    {{-- <div class="row justify-content-center"> --}}
    <div class="col-md-6 col-md-offset-2" style="background-color: white; box-shadow: 0px 0px 3px 0.5px #888888;">

            <!-- Post Create Box
            ================================================= -->
            <!-- Post Create Box End-->

            <!-- Post Content
            ================================================= -->
            <br>
            <div class="post-content">
              <div class="post-container">
                <img src="http://placehold.it/300x300" alt="user" class="profile-photo-md pull-left" />
                <div class="post-detail">
                  <div class="user-info">
                    <h5><a href="timeline.html" class="profile-link">Alexis Clark</a> <span class="following">following</span></h5>
                    <p class="text-muted">Published a photo about 3 mins ago</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Post Content
            ================================================= -->
            <div class="post-content">
              <div class="post-container">
                <img src="http://placehold.it/300x300" alt="user" class="profile-photo-md pull-left" />
                <div class="post-detail">
                  <div class="user-info">
                    <h5><a href="timeline.html" class="profile-link">Sophia Lee</a> <span class="following">following</span></h5>
                    <p class="text-muted">Updated her status about 33 mins ago</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Post Content
            ================================================= -->
            <div class="post-content">
              <div class="post-container">
                <img src="http://placehold.it/300x300" alt="user" class="profile-photo-md pull-left" />
                <div class="post-detail">
                  <div class="user-info">
                    <h5><a href="timeline.html" class="profile-link">Linda Lohan</a> <span class="following">following</span></h5>
                    <p class="text-muted">Published a photo about 1 hour ago</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Post Content
            ================================================= -->
            <div class="post-content">
              <div class="post-container">
                <img src="http://placehold.it/300x300" alt="user" class="profile-photo-md pull-left" />
                <div class="post-detail">
                  <div class="user-info">
                    <h5><a href="timeline.html" class="profile-link">John Doe</a> <span class="following">following</span></h5>
                    <p class="text-muted">Published a photo about 2 hour ago</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Post Content
            ================================================= -->

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
                        <div class="col-md-3 col-sm-3">
                          <div class="friend-card sh">
                            <img src="http://placehold.it/1030x360" alt="profile-cover" class="img-responsive cover" />
                            <div class="card-info">
                              <img src="http://placehold.it/300x300" alt="user" class="profile-photo-lg" />
                              <div class="friend-info">
                                 <button class="btn btn-primary1 pull-right ">Following</button>
                                <h5><a href="jobprof.php" class="profile-link">Senior Information Technology Business Analyst</a></h5>
                                <h6 class="grey">iZeno Pte Ltd : Greater Jakarta Area, Indonesia</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                          <div class="friend-card sh">
                            <img src="http://placehold.it/1030x360" alt="profile-cover" class="img-responsive cover" />
                            <div class="card-info">
                              <img src="http://placehold.it/300x300" alt="user" class="profile-photo-lg" />
                              <div class="friend-info">
                                 <button class="btn btn-primary1 pull-right ">Following</button>
                                <h5><a href="jobprof.php" class="profile-link">Senior Information Technology Business Analyst</a></h5>
                                <h6 class="grey">iZeno Pte Ltd : Greater Jakarta Area, Indonesia</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                          <div class="friend-card sh">
                            <img src="http://placehold.it/1030x360" alt="profile-cover" class="img-responsive cover" />
                            <div class="card-info">
                              <img src="http://placehold.it/300x300" alt="user" class="profile-photo-lg" />
                              <div class="friend-info">
                                 <button class="btn btn-primary1 pull-right ">Following</button>
                                <h5><a href="jobprof.php" class="profile-link">Senior Information Technology Business Analyst</a></h5>
                                <h6 class="grey">iZeno Pte Ltd : Greater Jakarta Area, Indonesia</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                          <div class="friend-card sh">
                            <img src="http://placehold.it/1030x360" alt="profile-cover" class="img-responsive cover" />
                            <div class="card-info">
                              <img src="http://placehold.it/300x300" alt="user" class="profile-photo-lg" />
                              <div class="friend-info">
                                 <button class="btn btn-primary1 pull-right ">Following</button>
                                <h5><a href="jobprof.php" class="profile-link">Senior Information Technology Business Analyst</a></h5>
                                <h6 class="grey">iZeno Pte Ltd : Greater Jakarta Area, Indonesia</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                          <div class="friend-card sh">
                            <img src="http://placehold.it/1030x360" alt="profile-cover" class="img-responsive cover" />
                            <div class="card-info">
                              <img src="http://placehold.it/300x300" alt="user" class="profile-photo-lg" />
                              <div class="friend-info">
                                 <button class="btn btn-primary1 pull-right ">Following</button>
                                <h5><a href="jobprof.php" class="profile-link">Senior Information Technology Business Analyst</a></h5>
                                <h6 class="grey">iZeno Pte Ltd : Greater Jakarta Area, Indonesia</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                          <div class="friend-card sh">
                            <img src="http://placehold.it/1030x360" alt="profile-cover" class="img-responsive cover" />
                            <div class="card-info">
                              <img src="http://placehold.it/300x300" alt="user" class="profile-photo-lg" />
                              <div class="friend-info">
                                 <button class="btn btn-primary1 pull-right ">Following</button>
                                <h5><a href="jobprof.php" class="profile-link">Senior Information Technology Business Analyst</a></h5>
                                <h6 class="grey">iZeno Pte Ltd : Greater Jakarta Area, Indonesia</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                          <div class="friend-card sh">
                            <img src="http://placehold.it/1030x360" alt="profile-cover" class="img-responsive cover" />
                            <div class="card-info">
                              <img src="http://placehold.it/300x300" alt="user" class="profile-photo-lg" />
                              <div class="friend-info">
                                 <button class="btn btn-primary1 pull-right ">Following</button>
                                <h5><a href="jobprof.php" class="profile-link">Senior Information Technology Business Analyst</a></h5>
                                <h6 class="grey">iZeno Pte Ltd : Greater Jakarta Area, Indonesia</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                          <div class="friend-card sh">
                            <img src="http://placehold.it/1030x360" alt="profile-cover" class="img-responsive cover" />
                            <div class="card-info">
                              <img src="http://placehold.it/300x300" alt="user" class="profile-photo-lg" />
                              <div class="friend-info">
                                 <button class="btn btn-primary1 pull-right ">Following</button>
                                <h5><a href="jobprof.php" class="profile-link">Senior Information Technology Business Analyst</a></h5>
                                <h6 class="grey">iZeno Pte Ltd : Greater Jakarta Area, Indonesia</h6>
                              </div>
                            </div>
                          </div>
                        </div>
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
                        <div class="col-md-3 col-sm-3">
                          <div class="friend-card sh">
                            <img src="http://placehold.it/1030x360" alt="profile-cover" class="img-responsive cover" />
                            <div class="card-info">
                              <img src="http://placehold.it/300x300" alt="user" class="profile-photo-lg" />
                              <div class="friend-info">
                                 <button class="btn btn-primary1 pull-right ">Following</button>
                                <h5><a href="jobprof.php" class="profile-link">Senior Information Technology Business Analyst</a></h5>
                                <h6 class="grey">iZeno Pte Ltd : Greater Jakarta Area, Indonesia</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                          <div class="friend-card sh">
                            <img src="http://placehold.it/1030x360" alt="profile-cover" class="img-responsive cover" />
                            <div class="card-info">
                              <img src="http://placehold.it/300x300" alt="user" class="profile-photo-lg" />
                              <div class="friend-info">
                                 <button class="btn btn-primary1 pull-right ">Following</button>
                                <h5><a href="jobprof.php" class="profile-link">Senior Information Technology Business Analyst</a></h5>
                                <h6 class="grey">iZeno Pte Ltd : Greater Jakarta Area, Indonesia</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                          <div class="friend-card sh">
                            <img src="http://placehold.it/1030x360" alt="profile-cover" class="img-responsive cover" />
                            <div class="card-info">
                              <img src="http://placehold.it/300x300" alt="user" class="profile-photo-lg" />
                              <div class="friend-info">
                                 <button class="btn btn-primary1 pull-right ">Following</button>
                                <h5><a href="jobprof.php" class="profile-link">Senior Information Technology Business Analyst</a></h5>
                                <h6 class="grey">iZeno Pte Ltd : Greater Jakarta Area, Indonesia</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                          <div class="friend-card sh">
                            <img src="http://placehold.it/1030x360" alt="profile-cover" class="img-responsive cover" />
                            <div class="card-info">
                              <img src="http://placehold.it/300x300" alt="user" class="profile-photo-lg" />
                              <div class="friend-info">
                                 <button class="btn btn-primary1 pull-right ">Following</button>
                                <h5><a href="jobprof.php" class="profile-link">Senior Information Technology Business Analyst</a></h5>
                                <h6 class="grey">iZeno Pte Ltd : Greater Jakarta Area, Indonesia</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                          <div class="friend-card sh">
                            <img src="http://placehold.it/1030x360" alt="profile-cover" class="img-responsive cover" />
                            <div class="card-info">
                              <img src="http://placehold.it/300x300" alt="user" class="profile-photo-lg" />
                              <div class="friend-info">
                                 <button class="btn btn-primary1 pull-right ">Following</button>
                                <h5><a href="jobprof.php" class="profile-link">Senior Information Technology Business Analyst</a></h5>
                                <h6 class="grey">iZeno Pte Ltd : Greater Jakarta Area, Indonesia</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                          <div class="friend-card sh">
                            <img src="http://placehold.it/1030x360" alt="profile-cover" class="img-responsive cover" />
                            <div class="card-info">
                              <img src="http://placehold.it/300x300" alt="user" class="profile-photo-lg" />
                              <div class="friend-info">
                                 <button class="btn btn-primary1 pull-right ">Following</button>
                                <h5><a href="jobprof.php" class="profile-link">Senior Information Technology Business Analyst</a></h5>
                                <h6 class="grey">iZeno Pte Ltd : Greater Jakarta Area, Indonesia</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                          <div class="friend-card sh">
                            <img src="http://placehold.it/1030x360" alt="profile-cover" class="img-responsive cover" />
                            <div class="card-info">
                              <img src="http://placehold.it/300x300" alt="user" class="profile-photo-lg" />
                              <div class="friend-info">
                                 <button class="btn btn-primary1 pull-right ">Following</button>
                                <h5><a href="jobprof.php" class="profile-link">Senior Information Technology Business Analyst</a></h5>
                                <h6 class="grey">iZeno Pte Ltd : Greater Jakarta Area, Indonesia</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                          <div class="friend-card sh">
                            <img src="http://placehold.it/1030x360" alt="profile-cover" class="img-responsive cover" />
                            <div class="card-info">
                              <img src="http://placehold.it/300x300" alt="user" class="profile-photo-lg" />
                              <div class="friend-info">
                                 <button class="btn btn-primary1 pull-right ">Following</button>
                                <h5><a href="jobprof.php" class="profile-link">Senior Information Technology Business Analyst</a></h5>
                                <h6 class="grey">iZeno Pte Ltd : Greater Jakarta Area, Indonesia</h6>
                              </div>
                            </div>
                          </div>
                        </div>
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
          {{-- ==== --}}
    <div class="container">
    {{-- <div class="row justify-content-center"> --}}
    <div class="col-md-6 col-md-offset-2" style="background-color: white; box-shadow: 0px 0px 3px 0.5px #888888;">

            <!-- Post Create Box
            ================================================= -->
            <!-- Post Create Box End-->

            <!-- Post Content
            ================================================= -->
            <br>
            <div class="post-content">
              <div class="post-container">
                <img src="http://placehold.it/300x300" alt="user" class="profile-photo-md pull-left" />
                <div class="post-detail">
                  <div class="user-info">
                    <h5><a href="timeline.html" class="profile-link">Alexis Clark</a> <span class="following">following</span></h5>
                    <p class="text-muted">Published a photo about 3 mins ago</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Post Content
            ================================================= -->
            <div class="post-content">
              <div class="post-container">
                <img src="http://placehold.it/300x300" alt="user" class="profile-photo-md pull-left" />
                <div class="post-detail">
                  <div class="user-info">
                    <h5><a href="timeline.html" class="profile-link">Sophia Lee</a> <span class="following">following</span></h5>
                    <p class="text-muted">Updated her status about 33 mins ago</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Post Content
            ================================================= -->
            <div class="post-content">
              <div class="post-container">
                <img src="http://placehold.it/300x300" alt="user" class="profile-photo-md pull-left" />
                <div class="post-detail">
                  <div class="user-info">
                    <h5><a href="timeline.html" class="profile-link">Linda Lohan</a> <span class="following">following</span></h5>
                    <p class="text-muted">Published a photo about 1 hour ago</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Post Content
            ================================================= -->
            <div class="post-content">
              <div class="post-container">
                <img src="http://placehold.it/300x300" alt="user" class="profile-photo-md pull-left" />
                <div class="post-detail">
                  <div class="user-info">
                    <h5><a href="timeline.html" class="profile-link">John Doe</a> <span class="following">following</span></h5>
                    <p class="text-muted">Published a photo about 2 hour ago</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Post Content
            ================================================= -->

            <!-- Post Content
            ================================================= -->
          </div>
    </div>
          {{-- ==== --}}
    </div> {{-- box didalam tab--}}

    </div>

{{-- ===== --}}
      </div>
    </div>     
  </div>

</div>

        


@endsection