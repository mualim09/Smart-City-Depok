<aside class="main-sidebar" id="sidebar-wrapper">
    <!-- sidebar: style can be found in sidebar.less -->
  
{{-- @foreach($get_profile as $profile) --}}
    <section class="sidebar">
      <ul class="sidebar-menu" style="padding:10px"	>
        <ul class="sidebar-menu" data-widget="tree">
          <div class="box box-widget">
            <div class="box-body box-profile">
              <h4 class="text-center" style="margin-top: -5px;">{{strtoupper($get_profile['nama'])}}</h4>
              <img class="profile-user-img img-responsive img-circle" style="border: 0px solid black" src="{{$get_profile['gambar_akun']}}" alt="User profile picture">
              <p class="text-muted text-center">&#64;{{$get_profile['nama_akun']}}</p>
              <h6 class="text-center">{{$get_profile['deskripsi']}}</h6>
              <div class="row" style="padding: 2px">
                <div class="col-md-4" style="padding:0px">
                  <div class="description-block text-center border-right">
                    <span class="description-percentage text-green">Tweets</span>
                    <h6 class="description-header">{{$get_profile['tweets']}}</h6>
                  </div>
                </div>
                <div class="col-md-4" style="padding:0px">
                  <div class="description-block text-center border-right">
                    <span class="description-percentage text-green">Following</span>
                    <h5 class="description-header">{{$get_profile['friends_count']}}</h5>
                  </div>
                </div>
                <div class="col-md-4" style="padding:0px">
                  <div class="description-block text-center">
                    <span class="description-percentage text-green">Followers</span>
                    <h5 class="description-header">{{$get_profile['followers_count']}}</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box box-widget">
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="/dashboard-socmed"><i class="ion ion-home text-red"></i>Home</a></li>
                <li><a href="/dashboard-socmed/analysis"><i class="ion ion-stats-bars text-yellow"></i>Analytics</a></li>
                <li><a href="/dashboard-socmed/profile"><i class="ion ion-person text-light-blue"></i>Profile</a></li>
              </ul>
            </div>
          </div>
        </ul>
      </ul>
    </section>
{{-- @endforeach --}}
</aside>