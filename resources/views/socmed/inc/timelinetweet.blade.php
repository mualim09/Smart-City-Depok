  <div class="post-content">
    <div class="post-container">
      <img src="{{$datas['gambar_akun']}}" alt="user" class="profile-photo-md pull-left" />

{{-- <div class="dropup pull-right">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropup

  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another action</a></li>
    <li><a href="#">Something else here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated link</a></li>
  </ul>
</div> --}}

      <div class="post-detail">
        <div class="user-info">
          <h5><a href="{!!$datas['nama_akun_url']!!}" class="profile-link">{{$datas['nama']}}</a> 
          <span class="following">
            <a href="{!!$datas['nama_akun_url']!!}">&#64;{{$datas['nama_akun']}}</a>
          </span>
        </h5>
          <p class="text-muted">{{$datas['created_at']}}</p>
        </div>
        <div class="reaction">
          <a class="btn text-blue" data-toggle="modal" data-target="#modal-reply-{{$datas['id_twitter']}}"><i class="fa fa-reply-all"></i></a>
          <a class="btn text-green" data-toggle="modal" data-target="#modal-retweet-{{$datas['id_twitter']}}"><i class="fa fa-retweet"></i>{{$datas['retweet_count']}}</a>
          <a class="btn text-red"><i class="fa fa-heart-o"></i>{{$datas['favorite_count']}}</a>
        </div>
        <div class="line-divider"></div>
        <div class="post-text">
        {{--   <p><i class="em em-thumbsup"></i> <i class="em em-thumbsup"></i> --}}{!!$datas['tweet']!!}{{-- </p> --}}
        </div>
    @if($datas['pictvid'] == '')
    
    @elseif($datas['video'] == '') 
    <img src="{!!$datas['pictvid']!!}" class="img-thumbnail" width= 100%; {{-- height= 50%; --}} top: -0px;>

    @elseif($datas['video'] != '')
  <video width=100%; top: -0px; loop controls>
     <source src="{!!$datas['pictvid']!!}" type="video/mp4">
     {{-- <source src="{!!$datas['pictvid']!!}" type="application/x-mpegURL"> --}}
  </video>

    @endif 

    </div>
  </div>
</div>