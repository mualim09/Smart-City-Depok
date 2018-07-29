<!DOCTYPE html>
<html>
<title>Blog | Hi-Depok</title>
<link rel="shortcut icon" href="{{ URL::asset('img/logo.png') }}">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ URL::asset('css/style2.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/scroll_down.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/loader.css') }}">
<style>
body {font-family: "Open Sans"}
</style>

<!-- Loader -->
<div id="loader-wrapper">
  <div id="loader"> </div>
  <div class="loader-section section-left"></div>
  <div class="loader-section section-right"></div>
</div>

<body>
  <!-- Navbar (sit on top) -->
  <div class="w3-top" data-collapse="medium" data-animation="over-right" data-duration="400" data-contain="1" data-doc-height="1" data-ix="nav-bar-load" data-easing="ease-out-quart" data-easing2="ease-out-quart">
    <div class="w3-bar w3-padding-16" id="myNavbar">
      <a href="/" class="w3-bar-item" style="letter-spacing: 5px; font-size:15pt;">
        <img class="logo" src="{{ URL::asset('img/minilogo.png') }}">
        <div class="f_bold w3-text-white w3-display-left w3-large w3-hide-small" style="margin-left:6.5em">HI-DEPOK</div>
      </a>
      <div class="hamburger w3-text-white w3-right w3-display-right">
        <div class="w3-bar-item w3-hide-small" style="padding-top:1em; margin-top: 10px;">BLOG</div>
        <div onclick="openNav()" class="w3-bar-item w3-hover-text-blue w3-xxlarge" style="cursor: pointer;"> <i class="fa fa-bars"></i> </div>
      </div>
    </div>
  </div>
  <!-- Hidden Sidebar (reveals when clicked on menu icon)-->
  <nav class="w3-sidebar w3-black w3-animate-right f_nav" style="display:none;padding-top:150px;right:0;z-index:2" id="mySidebar">
    <a class="w3-display-topleft w3-padding-16" href="#">
      <img class="hidepok_logo" src="{{ URL::asset('img/minilogo.png') }}">
    </a>
    <a href="javascript:void(0)" onclick="closeNav()" class="btn_close w3-black w3-display-topright w3-text-white w3-hover-text-orange">
      <i class="fa fa-remove"></i>
    </a>
    <div class="f_bold w3-display-middle w3-bar-block w3-center">
      <a href="/" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">BERANDA</a>
      <a href="/information" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">INFORMASI</a>
      <!-- <a href="/maps" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">PETA</a> -->
      <a href="/blog" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">BLOG</a>
      <a href="/event" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">ACARA</a>
      <!-- <a href="/" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">OPEN DATA</a> -->
      <a href="/faq" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">FAQ</a>
    </div>
    <div class="w3-display-bottommiddle f_nav2" style="margin-bottom:2em">
      desain oleh <a class="w3-text-blue" href="http://www.tireg-dev.com" style="text-decoration:none;"><b> Tireg Dev </b></a> <img src="{{ URL::asset('img/tireg_wh.png') }}" style="width:30px; height:30px">
    </div>
  </nav>

  <div style="width:100%; ">
    <!-- Slideshow -->
    <div class="mySlides w3-display-container w3-center">
      <div style="background-color:#000; position:relative; width:100%;height:450px;">
        <img src="{{ asset ('img/bg_blog.jpg') }}" style="position:absolute; width:100%; height:450px; left:0; opacity:0.25">
      </div>
      <div class="w-container contents w3-display-middle" style="top: 43%;">
        <div class="main-heading-wrapper w3-center">
          <div class="blog_headerjudul f_bold w3-wide w3-text-white" data-ix="fade-in-heading">BLOG</div><BR>
          <h4 class="blog_headerjudul2 w3-text-white" data-ix="fade-in-heading-2" style="">Mari lihat apa yang terjadi di Kota Depok</h4>
        </div>
        <a href="#more" class="scroll w-inline-blxock down-arrow" data-ix="down-arrow"><span class="down-inner" data-ix="down-arrow-on-load" style="top: 170%;"></span></a>
      </div>
    </div>

    <!-- Isi Blog -->
    <div class="w3-content" style="max-width: 1300px">
      <div class="w3-row w3-white w3-padding-48">
        <div class="blog_content w3-twothird">
          @foreach($blogs as $blog)
          <div class="w3-card-4 w3-white w3-padding-16" style="margin-bottom: 1.5em" data-ix="scale-on-scroll">
            <div class="w3-container" style="padding: 0 2em">
              <h3 class="blog_contentjudul"><b>{{ $blog->judul }}</b></h3>
              <h5 class="blog_contenttime"><span class="w3-opacity">{{ $blog->created_at }}</span></h5>
              <p> {!! str_limit($blog->isi, 150) !!} </p>
            </div>
            <div class="w3-container" style="padding: 0 2em">
            <p><a href="/blog/{{ $blog->judul }}"><button class="blog_contentbtn w3-button w3-white w3-border">Baca Selengkapnya</button></a></p>
            </div>
          </div>
          @endforeach   
          <div class="col-md-6" align="center" data-ix="scale-on-scroll">
            <center>{{ $blogs->render() }}</center>
          </div>
        </div>

        <!-- About/Information menu -->
        <div class="w3-third" data-ix="scale-on-scroll">
          <center>
            <div class="about w3-center w3-hide-large w3-hide-medium" style="margin: 1.5em 0 0.4em 0;"> BERITA </div>
            <div class="w3-row">
              <a class="" href="javascript:void(0)" onclick="openCity(event, 'tab1');">
                <div class="blog_btn w3-quarter tablink w3-bottombar w3-hover-light-grey w3-padding w3-border-orange w3-light-grey"><i class="fa fa-circle gray-text"></i></div>
              </a>
              <a href="javascript:void(0)" onclick="openCity(event, 'tab2');">
                <div class="blog_btn w3-quarter tablink w3-bottombar w3-hover-light-grey w3-padding"><i class="fa fa-circle gray-text"></i></div>
              </a>
              <a href="javascript:void(0)" onclick="openCity(event, 'tab3');">
                <div class="blog_btn w3-quarter tablink w3-bottombar w3-hover-light-grey w3-padding"><i class="fa fa-circle gray-text"></i></div>
              </a>
              <a href="javascript:void(0)" onclick="openCity(event, 'tab4');">
                <div class="blog_btn w3-quarter tablink w3-bottombar w3-hover-light-grey w3-padding"><i class="fa fa-circle gray-text"></i></div>
              </a>
            </div>
          </center>
          <div id="tab1" class="w3-container city" style="padding: 1.01em 16px;">
            @foreach($items as $item)
              <a class="blog_news w3-text-black w3-hover-text-orange" href="{{ $item->get_permalink() }}">{{ $item->get_title() }}</a><hr style="margin: 1em 0; border-color: #eee; box-shadow: none;">
              <!-- <p>{{ $item->get_description() }}</p> -->
            @endforeach
          </div>            
          <div id="tab2" class="w3-container city" style="padding: 1.01em 16px; display:none">
            @foreach($items2 as $item2)
              <a class="blog_news w3-text-black w3-hover-text-orange" href="{{ $item2->get_permalink() }}">{{ $item2->get_title() }}</a><hr style="margin: 1em 0; border-color: #eee; box-shadow: none;">
            @endforeach
          </div>
          <div id="tab3" class="w3-container city" style="padding: 1.01em 16px; display:none">
            @foreach($items3 as $item3)
              <a class="blog_news w3-text-black w3-hover-text-orange" href="{{ $item3->get_permalink() }}">{{ $item3->get_title() }}</a><hr style="margin: 1em 0; border-color: #eee; box-shadow: none;">
            @endforeach
          </div>
          <div id="tab4" class="w3-container city" style="padding: 1.01em 16px; display:none">
            @foreach($items4 as $item4)
              <a class="blog_news w3-text-black w3-hover-text-orange" href="{{ $item4->get_permalink() }}">{{ $item4->get_title() }}</a><hr style="margin: 1em 0; border-color: #eee; box-shadow: none;">
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="w3-center w3-padding w3-text-white" style="background-color: #2b2b2b">
    <div class="w3-row">
      <div class="w3-third w3-container">
        <div class="w3-xlarge w3-section" style="letter-spacing:8px">
          <a href="https://www.facebook.com/hidepok.id/"><i class="fa fa-facebook-official w3-hover-opacity w3-large w3-text-white"></i></a>
          <a href="https://www.youtube.com/channel/UCLlSJpLt38NnYe1YCph3XXw"><i class="fa fa-youtube w3-hover-opacity w3-large w3-text-white"></i></a>
          <a href="https://www.instagram.com/hidepok.id/"><i class="fa fa-instagram w3-hover-opacity w3-large w3-text-white"></i></a>
        </div>
      </div>
      <div class="w3-third w3-container">
        <a class="w3-text-white" href="/" style="text-decoration:none"><h3 class="w3-large w3-hover-opacity" style="letter-spacing:3px">HI-DEPOK</h3></a>
      </div>
      <div class="w3-third w3-container w3-large w3-hide-small" style="padding:15px">
        <a href="/hidepok/information" class="w3-bar-item w3-text-white w3-hover-opacity w3-small" style="text-decoration:none" onclick="toggleFunction()">Informasi</a>
        <a href="/hidepok/maps" class="w3-bar-item w3-text-white w3-hover-opacity w3-small" style="text-decoration:none; padding-left: 1.7em">Peta</a>
        <a href="/hidepok/blog" class="w3-bar-item w3-text-white w3-hover-opacity w3-small" style="text-decoration:none;padding: 0em 1.7em;" onclick="toggleFunction()">Blog</a>
        <a href="/hidepok/event" class="w3-bar-item w3-text-white w3-hover-opacity w3-small" style="text-decoration:none;padding-right: 1.7em;">Acara</a>
        <a href="/hidepok/faq" class="w3-bar-item w3-text-white w3-hover-opacity w3-small" style="text-decoration:none">FAQ</a>
      </div>
    </div>
    <hr style="margin: 0em 6em;border-top: 1px solid rgba(255, 255, 255, 0.39)">
    <div class="w3-row w3-small w3-padding">
      <div class="w3-content" style="max-width:700px">
        <div class="w3-third w3-container">
          <h5 class="w3-hide-small">E-MAIL</h5>
          <p>humas@hidepok.id</p>
        </div>
        <div class="w3-third w3-container">
          <h5 class="w3-hide-small">HUBUNGI KAMI</h5>
          <p>+62 811 222 333 11</p>
        </div>
        <div class="w3-third w3-container">
          <h5 class="w3-hide-small">LOKASI</h5>
          <p>Jalan Margonda No.54, Depok</p>
        </div>
      </div>
    </div>
    <hr style="margin: 0em 6em; border-top:1px solid rgba(255, 255, 255, 0.35)">
    <p class="w3-small" style="margin-top: 1.2em">Didukung oleh TiregDev © 2017</p>
  </footer>

  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://daks2k3a4ib2z.cloudfront.net/5317d67d660658b254000454/js/webflow.js?2f83b8326cc4c8f7327b5dba30444a37"></script>
  <script src="{{ URL::asset('js/nav.js') }}"></script>
  <script src="{{ URL::asset('js/blog_event.js') }}"></script>
  <script  src="{{ URL::asset('js/loader.js') }}"></script>

</body>
</html>

