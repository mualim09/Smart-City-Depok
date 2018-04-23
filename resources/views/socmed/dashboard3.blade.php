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
    <li><a data-toggle="tab" href="#menu1">Mention</a></li>
    <li><a data-toggle="tab" href="#menu2">Direct Messages</a></li>
    <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
  </ul>

  <div class="tab-content">
  <div id="timeline" class="tab-pane fade in active">
{{-- ISI Timeline --}}
	<div class="box-body">
          {{-- ==== --}}
	<div class="box-body">
		<div class="col-md-6 col-md-offset-2" style="background-color: white; box-shadow: 0px 0px 3px 0.5px #888888;">  
		<div class="create-post">
            	<div class="row">
            		<div class="col-md-8 col-sm-8">
                 <div class="row">
                      <div class="form-group col-xs-12">
                        <textarea name="tweet" class="form-control" placeholder="What's happening?" rows="4" cols="200" maxlength="280" required></textarea>
                      </div>
                    </div>
                </div>
            		<div class="col-md-4 col-sm-4">
                  <div class="tools">
                    <ul class="publishing-tools list-inline">
            		  <li><a href="#"><label class="ion-images"><input type="file" name="images[]" multiple class="form-control" style="display:none;"></label></a></li>
                      <li><a href="#"><i class="ion-ios-videocam"></i></a></li>
                      <li><a href="#"><i class="ion-map"></i></a></li>
                    </ul>
                    <button class="btn btn-primary pull-middle">Tweet</button>
                  </div>
                </div>
            	</div>
            </div><!-- Post Create Box End-->
		</div>
	</div>

	<div class="box-body">
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
		          {{-- ==== --}}
        </div>
    </div> {{-- box didalam tab--}}
	</div>
{{-- ================================================== --}}
    

    <div id="menu1" class="tab-pane fade">
      
      <div class="box-body">
      	<div class="box-body">
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
        </div>
      </div>


    </div>
    
{{-- ================================================== --}}

    <div id="menu2" class="tab-pane fade">
	<div class="box-body">
      
		            <!-- Chat Room
            ================================================= -->
            <div class="chat-room" >
              <div  class="row">
                <div class="col-md-4">

                  <!-- Contact List in Left-->
                  <ul class="nav nav-tabs contact-list scrollbar-wrapper scrollbar-outer">
                    <li class="active">
                      <a href="#contact-1" data-toggle="tab">
                        <div class="contact">
                          <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left"/>
                          <div class="msg-preview">
                            <h6>Linda Lohan</h6>
                            <p class="text-muted">Hi there, how are you</p>
                            <small class="text-muted">a min ago</small>
                            <div class="chat-alert">1</div>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#contact-2" data-toggle="tab">
                        <div class="contact">
                          <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left"/>
                          <div class="msg-preview">
                            <h6>Julia Cox</h6>
                            <p class="text-muted">see you soon</p>
                            <small class="text-muted">an hour ago</small>
                            <div class="seen"><i class="icon ion-checkmark-round"></i></div>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#contact-3" data-toggle="tab">
                        <div class="contact">
                          <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left"/>
                          <div class="msg-preview">
                            <h6>Sophia Lee</h6>
                            <p class="text-muted">Okay fine. thank you</p>
                            <small class="text-muted">13 hour ago</small>
                            <div class="replied"><i class="icon ion-reply"></i></div>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#contact-4" data-toggle="tab">
                        <div class="contact">
                          <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left"/>
                          <div class="msg-preview">
                            <h6>John Doe</h6>
                            <p class="text-muted">hey anybody there</p>
                            <small class="text-muted">Yesterday</small>
                            <div class="chat-alert">1</div>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#contact-5" data-toggle="tab">
                        <div class="contact">
                          <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left"/>
                          <div class="msg-preview">
                            <h6>Anna Young</h6>
                            <p class="text-muted">I gotta go</p>
                            <small class="text-muted">2 days ago</small>
                            <div class="seen"><i class="icon ion-checkmark-round"></i></div>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#contact-6" data-toggle="tab">
                        <div class="contact">
                          <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left"/>
                          <div class="msg-preview">
                            <h6>Richard Bell</h6>
                            <p class="text-muted">Hey there?</p>
                            <small class="text-muted">2 days ago</small>
                            <div class="chat-alert">1</div>
                          </div>
                        </div>
                      </a>
                    </li>
                  </ul><!--Contact List in Left End-->

                </div>
                <div class="col-md-7">

					 <div class="send-message">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Type your message">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Send</button>
                      </span>
                    </div>
                  </div>
                  <!--Chat Messages in Right-->
                  <div class="tab-content scrollbar-wrapper wrapper scrollbar-outer">
                    <div class="tab-pane active" id="contact-1">
                      <div class="chat-body">
                        <ul class="chat-message">
                          <li class="left">
                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                            <div class="chat-item">
                              <div class="chat-item-header">
                                <h5>Linda Lohan</h5>
                                <small class="text-muted">3 days ago</small>
                              </div>
                              <p>Hi honey, how are you doing???? Long time no see. Where have you been?</p>
                            </div>
                          </li>
                          <li class="right">
                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-right" />
                            <div class="chat-item">
                              <div class="chat-item-header">
                                <h5>Sarah Cruiz</h5>
                                <small class="text-muted">3 days ago</small>
                              </div>
                              <p>I have been on vacation</p>
                            </div>
                          </li>
                          <li class="right">
                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-right" />
                            <div class="chat-item">
                              <div class="chat-item-header">
                                <h5>Sarah Cruiz</h5>
                                <small class="text-muted">3 days ago</small>
                              </div>
                              <p>it was a great time for me. we had a lot of fun <i class="em em-blush"></i></p>
                            </div>
                          </li>
                          <li class="left">
                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                            <div class="chat-item">
                              <div class="chat-item-header">
                                <h5>Linda Lohan</h5>
                                <small class="text-muted">3 days ago</small>
                              </div>
                              <p>that's cool I wish I were you <i class="em em-expressionless"></i></p>
                            </div>
                          </li>
                          <li class="right">
                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-right" />
                            <div class="chat-item">
                              <div class="chat-item-header">
                                <h5>Sarah Cruiz</h5>
                                <small class="text-muted">3 days ago</small>
                              </div>
                              <p><i class="em em-hand"></i></p>
                            </div>
                          </li>
                          <li class="left">
                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                            <div class="chat-item">
                              <div class="chat-item-header">
                                <h5>Linda Lohan</h5>
                                <small class="text-muted">a min ago</small>
                              </div>
                              <p>Hi there, how are you</p>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="tab-pane" id="contact-2">
                      <div class="chat-body">
                        <ul class="chat-message">
                          <li class="left">
                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                            <div class="chat-item">
                              <div class="chat-item-header">
                                <h5>Julia Cox</h5>
                                <small class="text-muted">a day ago</small>
                              </div>
                              <p>Hi</p>
                            </div>
                          </li>
                          <li class="right">
                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-right" />
                            <div class="chat-item">
                              <div class="chat-item-header">
                                <h5>Sarah Cruiz</h5>
                                <small class="text-muted">a day ago</small>
                              </div>
                              <p>hellow</p>
                            </div>
                          </li>
                          <li class="left">
                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                            <div class="chat-item">
                              <div class="chat-item-header">
                                <h5>Julia Cox</h5>
                                <small class="text-muted">an hour ago</small>
                              </div>
                              <p>good</p>
                            </div>
                          </li>
                          <li class="right">
                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-right" />
                            <div class="chat-item">
                              <div class="chat-item-header">
                                <h5>Sarah Cruiz</h5>
                                <small class="text-muted">an hour ago</small>
                              </div>
                              <p>see you soon</p>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="tab-pane" id="contact-3">
                      <div class="chat-body">
                        <ul class="chat-message">
                          <li class="right">
                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-right" />
                            <div class="chat-item">
                              <div class="chat-item-header">
                                <h5>Sarah</h5>
                                <small class="text-muted">2 days ago</small>
                              </div>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                            </div>
                          </li>
                          <li class="left">
                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                            <div class="chat-item">
                              <div class="chat-item-header">
                                <h5>Sophia Lee</h5>
                                <small class="text-muted">a day ago</small>
                              </div>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p>
                            </div>
                          </li>
                          <li class="right">
                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-right" />
                            <div class="chat-item">
                              <div class="chat-item-header">
                                <h5>Sarah  Cruiz</h5>
                                <small class="text-muted">13 hours ago</small>
                              </div>
                              <p>Okay fine. thank you</p>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="tab-pane" id="contact-4">
                      <div class="chat-body">
                        <ul class="chat-message">
                          <li class="left">
                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                            <div class="chat-item">
                              <div class="chat-item-header">
                                <h5>John Doe</h5>
                                <small class="text-muted">a day ago</small>
                              </div>
                              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>
                            </div>
                          </li>
                          <li class="left">
                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                            <div class="chat-item">
                              <div class="chat-item-header">
                                <h5>John Doe</h5>
                                <small class="text-muted">a day ago</small>
                              </div>
                              <p>hey anybody there</p>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="tab-pane" id="contact-5">
                      <div class="chat-body">
                        <ul class="chat-message">
                          <li class="left">
                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                            <div class="chat-item">
                              <div class="chat-item-header">
                                <h5>Anna Young</h5>
                                <small class="text-muted">2 days ago</small>
                              </div>
                              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores</p>
                            </div>
                          </li>
                          <li class="left">
                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                            <div class="chat-item">
                              <div class="chat-item-header">
                                <h5>Anna Young</h5>
                                <small class="text-muted">2 days ago</small>
                              </div>
                              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            </div>
                          </li>
                          <li class="right">
                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-right" />
                            <div class="chat-item">
                              <div class="chat-item-header">
                                <h5>Sarah Cruiz</h5>
                                <small class="text-muted">2 days ago</small>
                              </div>
                              <p>I gotta go</p>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="tab-pane" id="contact-6">
                      <div class="chat-body">
                        <ul class="chat-message">
                          <li class="left">
                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                            <div class="chat-item">
                              <div class="chat-item-header">
                                <h5>Richard Bell</h5>
                                <small class="text-muted">2 days ago</small>
                              </div>
                              <p>Hello</p>
                            </div>
                          </li>
                          <li class="left">
                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                            <div class="chat-item">
                              <div class="chat-item-header">
                                <h5>Richard Bell</h5>
                                <small class="text-muted">2 days ago</small>
                              </div>
                              <p>Hi</p>
                            </div>
                          </li>
                          <li class="left">
                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                            <div class="chat-item">
                              <div class="chat-item-header">
                                <h5>Richard Bell</h5>
                                <small class="text-muted">2 days ago</small>
                              </div>
                              <p>Hey</p>
                            </div>
                          </li>
                          <li class="left">
                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                            <div class="chat-item">
                              <div class="chat-item-header">
                                <h5>Richard Bell</h5>
                                <small class="text-muted">2 days ago</small>
                              </div>
                              <p>Hey there</p>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div><!--Chat Messages in Right End-->

                 

                </div>
                <div class="clearfix"></div>
              </div>
            </div>

      </div> {{-- body --}}
    </div>

{{-- ================================================== --}}
    

    <div id="menu3" class="tab-pane fade">
      
      <div class="box-body">
      	


      </div>

    </div>


  </div>
         
    </div>

        
        <!-- /.box-body -->

        <!-- /.box-footer-->
      </div>

    		


@endsection