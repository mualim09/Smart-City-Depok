<div class="col-md-3 col-sm-3">
<div class="friend-card sh">
  @if (!empty($follow ['gambar_banner']))        
<img src="{!!$follow['gambar_banner']!!}" alt="profile-cover" {{-- class="img-responsive cover" --}} width=100%; height=70px; />
  @else 
  <div style="height: 70px; background-color: #eee"></div>
  @endif
  <div class="card-info">
  
  <div class="row">
  @if($follow['status_following'] == 'true')
      <form method="POST" action="{{ route('post.unfollow') }}" enctype="multipart/form-data">
      {{ csrf_field() }}
    <input type="hidden" name="id_akun" value="{{$follow['id_akun']}}">
    <input type="hidden" name="nama_akun" value="{{$follow['nama_akun']}}">
  
       <button class="btn btn-following pull-right">Following</button>

      </form> 
  
  @else
    <form method="POST" action="{{ route('post.follow') }}" enctype="multipart/form-data">
      {{ csrf_field() }}
    <input type="hidden" name="id_akun" value="{{$follow['id_akun']}}">
    <input type="hidden" name="nama_akun" value="{{$follow['nama_akun']}}">
       <button class="btn btn-primary1 pull-right ">Follow</button>
  </form>     
  
  @endif
  </div>

    <img src="{!!$follow['gambar_akun']!!}" alt="user" class="profile-photo-lg" />
    <div class="friend-info">
      <h5><a href="jobprof.php" class="profile-link">{{$follow['nama']}}</a></h5>
      <p style="font-size: 7pt"><a href="jobprof.php" class="profile-link">@ {{$follow['nama_akun']}}</a></p>
      <h6 class="grey">{!! str_limit ($follow['deskripsi'], 94) !!}</h6>
    </div>
  </div>
</div>
</div>

