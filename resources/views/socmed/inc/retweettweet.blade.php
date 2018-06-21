<div class="modal fade" id="modal-retweet-{{$datas['id_twitter']}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{ route('post.retweet') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
      <input type="hidden" name="id_twitter" value="{{$datas['id_twitter']}}">
      <div class="modal-header bg-aqua-active">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Retweet</h4>
      </div>
      <div class="modal-body overflow-hidden">
          
        <div class="post-container center">
                <img src="{{$datas['gambar_akun']}}" alt="user" class="profile-photo-md pull-left" />
                <div class="post-detail">
                  <div class="user-info">
                    <h5><a href="{!!$datas['nama_akun_url']!!}" class="profile-link">{{$datas['nama']}}</a> 
                    <span class="following">
                      <a href="{!!$datas['nama_akun_url']!!}">&#64;{{$datas['nama_akun']}}</a>
                    </span>
                  </h5>
                  </div>
  
                  <div class="line-divider"></div>

                  <div class="post-text">
                  {!!$datas['tweet']!!}
                  </div>
              @if($datas['pictvid'] == '')
              
              @elseif($datas['video'] == '') 
              <img src="{!!$datas['pictvid']!!}" class="rounded img-responsive img-thumbnail center-block" width= 50%; {{-- height= 50%; --}}>

              @elseif($datas['video'] != '')
            <video width=100%; top: -0px; loop controls>
               <source src="{!!$datas['pictvid']!!}" type="video/mp4">
               {{-- <source src="{!!$datas['pictvid']!!}" type="application/x-mpegURL"> --}}
            </video>

              @endif 

              </div>
            </div>

            

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary pull-right">Retweet</button>
      </div>
     </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>