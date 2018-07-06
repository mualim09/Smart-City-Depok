  <div class="post-content">
    <div class="post-container">
      <img src="{{$datas['gambar_akun']}}" alt="user" class="profile-photo-md pull-left" />

      <div class="post-detail">

        <div class="user-info">
          <h5><a href="{!!$datas['nama_akun_url']!!}" class="profile-link">{{$datas['nama']}}</a> 
            <span class="following">
              <a href="{!!$datas['nama_akun_url']!!}">&#64;{{$datas['nama_akun']}}</a>
            </span>
          </h5>
          <p class="text-muted">{{$datas['created_at']}}</p>
<<<<<<< HEAD
          <div class="reaction">
            <div class="btn-group">
              <a class="btn-del dropdown-toggle" data-toggle="dropdown"><i class="fa fa-angle-down"></i></a>
              <ul class="dropdown-menu dropdel">
                <li><a href="#">Delete</a></li>
              </ul>
            </div>
          </div>
        </div>
        
        <div class="line-divider"></div>
        <div class="post-text">
          {{--   <p><i class="em em-thumbsup"></i> <i class="em em-thumbsup"></i> --}}{!!$datas['tweet']!!}{{-- </p> --}}
        </div>
        @if($datas['pictvid'] == '')
=======
        </div>
        
        <div class="reaction">      

          <a class="btn text-blue symbolmodal" data-toggle="modal" data-target="#modal-reply-{{$datas['id_twitter']}}"><i class="fa fa-reply-all"></i></a>
          
        {{-- ========================================================================================================= --}}
        {{-- Retweet --}}
        @if(!empty($datas['retweet_status'])) 
        <form method="POST" action="{{ route('post.unretweet') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
            <input type="hidden" name="id_twitter" value="{{$datas['id_twitter']}}">
            <button type="submit" class="fa fa-retweet text-green symbolbutton">{{$datas['retweet_count']}}
            </button>
         </form>
        @else
        <a class="btn text-green symbolmodal" data-toggle="modal" data-target="#modal-retweet-{{$datas['id_twitter']}}"><i class="fa fa-retweet"></i>{{$datas['retweet_count']}}</a>  
        @endif
>>>>>>> 351fb21c67ee9267d88f155a870e27e7f0aa0e57

        @elseif($datas['video'] == '') 
        <img src="{!!$datas['pictvid']!!}" class="img-thumbnail" width= 100%; {{-- height= 50%; --}} top: -0px;>

<<<<<<< HEAD
        @elseif($datas['video'] != '')
        <video width=100%; top: -0px; loop controls>
         <source src="{!!$datas['pictvid']!!}" type="video/mp4">
           {{-- <source src="{!!$datas['pictvid']!!}" type="application/x-mpegURL"> --}}
           </video>

           @endif 
=======
        @if($datas['like_status'] == 'true' )
        <form method="POST" action="{{ route('post.unlike') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
            <input type="hidden" name="id_twitter" value="{{$datas['id_twitter']}}">
            <button type="submit" class="glyphicon glyphicon-heart text-red symbolbutton">{{$datas['favorite_count']}}
            </button>
         </form>
        @else
        <form method="POST" action="{{ route('post.like') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
            <input type="hidden" name="id_twitter" value="{{$datas['id_twitter']}}">
            <button type="submit" class="glyphicon glyphicon-heart text-red symbolbutton">{{$datas['favorite_count']}}
            </button>
        </form>
        @endif
        {{-- ========================================================================================================= --}}

        <div class="btn-group">
        @if($datas['nama_akun'] == $get_profile['nama_akun'])

          <a class="btn-del dropdown-toggle" data-toggle="dropdown"><i class="fa fa-angle-down"></i></a>          
          <ul class="dropdown-menu dropdel">
              <form method="POST" action="{{ route('post.destroytweet') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
              <input type="hidden" name="id_twitter" value="{{$datas['id_twitter']}}">
            <li><button type="submit" class="glyphicon glyphicon-trash symbolbutton pull-right"> Delete
            </button></li>    
            </form>
          </ul>
        @endif  
        </div>      


        </div>

        <div class="line-divider"></div>
        <div class="post-text">
        {{--   <p><i class="em em-thumbsup"></i> <i class="em em-thumbsup"></i> --}}{!!$datas['tweet']!!}{{-- </p> --}}
        </div>
    @if($datas['pictvid'] == '')
    
    @elseif($datas['video'] == '') 
    <img src="{!!$datas['pictvid']!!}" class="img-thumbnail" width= 100%; {{-- height= 50%; --}} top: -0px;>
>>>>>>> 351fb21c67ee9267d88f155a870e27e7f0aa0e57


           @if($datas['nama_akun'] == $get_profile['nama_akun'])
           <div class="line-divider" style="margin-top: 10px"></div>
           <a class="btn btntl text-blue" data-toggle="modal" data-target="#modal-reply-{{$datas['id_twitter']}}"><i class="fa fa-reply-all"></i></a>

           {{-- ========================================================================================================= --}}
           {{-- Retweet --}}
           @if(!empty($datas['retweet_status'])) 
           <form method="POST" action="{{ route('post.unretweet') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id_twitter" value="{{$datas['id_twitter']}}">
            <a class="btn btntl text-green"><i class="fa fa-retweet text-green"></i>{{$datas['retweet_count']}}</a>
          </form>
          @else
          <a class="btn btntl text-green" data-toggle="modal" data-target="#modal-retweet-{{$datas['id_twitter']}}"><i class="fa fa-retweet"></i>{{$datas['retweet_count']}}</a>  
          @endif

<<<<<<< HEAD
          {{-- ========================================================================================================= --}}
          {{-- LIKE --}}
=======
{{--     @if($datas['nama_akun'] == $get_profile['nama_akun'])
    <form method="POST" action="{{ route('post.destroytweet') }}" enctype="multipart/form-data">
      {{ csrf_field() }}
    <input type="hidden" name="id_twitter" value="{{$datas['id_twitter']}}">
    <button type="submit" class="glyphicon glyphicon-trash pull-right">
    </button>
    </form>
    @endif --}}
>>>>>>> 351fb21c67ee9267d88f155a870e27e7f0aa0e57

          @if($datas['like_status'] == 'true' )
          <form method="POST" action="{{ route('post.unlike') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id_twitter" value="{{$datas['id_twitter']}}">
            <a class="btn btntl text-red"><i class="glyphicon glyphicon-heart text-red"></i>{{$datas['favorite_count']}}</a>
          </form>
          @else
          <form method="POST" action="{{ route('post.like') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id_twitter" value="{{$datas['id_twitter']}}">
            <a class="btn btntl text-red"><i class="glyphicon glyphicon-heart text-red"></i>{{$datas['favorite_count']}}</a>
          </form>
          @endif
          {{-- ========================================================================================================= --}}
           <!-- <form method="POST" action="{{ route('post.destroytweet') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id_twitter" value="{{$datas['id_twitter']}}">
            <button type="submit" class="glyphicon glyphicon-trash pull-right">
            </button>
          </form> -->
          @endif

        </div>
      </div>
    </div>