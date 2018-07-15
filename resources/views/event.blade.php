<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Acara | Hi-Depok</title>
  <link rel="shortcut icon" href="{{ URL::asset('img/logo.png') }}">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://daks2k3a4ib2z.cloudfront.net/5317d67d660658b254000454/js/webflow.js?2f83b8326cc4c8f7327b5dba30444a37"></script>
  <link rel="stylesheet" href="{{ URL::asset('css/bv.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/scroll_down.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/style2.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/loader.css') }}">
</head>

<!-- Loader -->
<div id="loader-wrapper">
  <div id="loader"> </div>
  <div class="loader-section section-left"></div>
  <div class="loader-section section-right"></div>
</div>

<body>
  <div class="w3-top" data-collapse="medium" data-animation="over-right" data-duration="400" data-contain="1" data-doc-height="1" data-ix="nav-bar-load" data-easing="ease-out-quart" data-easing2="ease-out-quart">
    <div class="w3-bar w3-padding-16" id="myNavbar">
      <a href="/" class="w3-bar-item" style="letter-spacing: 5px; font-size:15pt;">
        <img class="logo" src="{{ URL::asset('img/minilogo.png') }}">
        <div class="f_bold w3-text-white w3-display-left w3-large w3-hide-small" style="margin-left:6.5em">HI-DEPOK</div>
      </a>
      <div class="hamburger w3-text-white w3-right w3-display-right">
        <div class="w3-bar-item w3-hide-small" style="padding-top:1em; margin-top: 10px;">ACARA</div>
        <div onclick="openNav()" class="w3-bar-item w3-hover-text-blue w3-xxlarge" style="cursor: pointer;"> <i class="fa fa-bars"></i> </div>
      </div>
    </div>
  </div>

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
      <a href="/maps" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">PETA</a>
      <a href="/blog" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">BLOG</a>
      <a href="/event" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">ACARA</a>
      <a href="/" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">OPEN DATA</a>
      <a href="/faq" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">FAQ</a>
    </div>
    <div class="w3-display-bottommiddle f_nav2" style="margin-bottom:2em">
      desain oleh <a class="w3-text-blue" href="http://www.tireg-dev.com" style="text-decoration:none;"><b> Tireg Dev </b></a> <img src="{{ URL::asset('img/tireg_wh.png') }}" style="width:30px; height:30px">
    </div>
  </nav>

  <div class="mySlides w3-display-container w3-center">
    <div style="background-color:#000; position:relative; width:100%;height:450px;">
      <img src="{{ asset ('img/bg_event.jpg') }}" style="position:absolute; width:100%; height:450px; left:0; opacity:0.25">
    </div>
    <div class="w-container contents w3-display-middle" style="top: 43%;">
      <div class="main-heading-wrapper w3-center">
        <div class="blog_headerjudul f_bold w3-wide w3-text-white" data-ix="fade-in-heading">ACARA</div><BR>
        <h4 class="blog_headerjudul2 w3-text-white" data-ix="fade-in-heading-2">Mari lihat acara apa saja yang ada di Kota Depok</h4>
      </div>
      <a href="#more" class="scroll w-inline-blxock down-arrow" data-ix="down-arrow"><span class="down-inner" data-ix="down-arrow-on-load" style="top: 140%;"></span></a>
    </div>
  </div>

  <!-- Isi Blog -->
  <div class="w3-content w3-padding-32" style="max-width: 1000px">
    
    <div class="w3-row">
      @foreach($events as $event)
    <div class="event_content w3-third w3-white w3-padding-16 w3-border" data-ix="scale-on-scroll">
      <div class="w3-container" style="padding: 0 2em">
        <h3 class="blog_contentjudul"><b>{{ $event->nama_event}}</b></h3>
        <h5 class="blog_contenttime"><span class="w3-opacity">Tanggal berlangsung : {{ $event->tgl_mulai }} s/d {{ $event->tgl_akhir }}</span></h5>
      </div>
      <div class="w3-container" style="padding: 0 3.5em">
        <p class="w3-justify">{!! str_limit ($event->deskripsi_event, 150) !!}</p>
      </div>
      <div class="w3-container" style="padding: 0 2em">
        <p><a href="/event/{{ $event->nama_event }}"><button class="blog_contentbtn w3-button w3-white w3-border"><b>Baca Selengkapnya?</b></button></a></p>
      </div>
    </div>
    @endforeach 
    {{$events->links()}}
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
