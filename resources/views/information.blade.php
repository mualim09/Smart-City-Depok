<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Information | Hi-Depok</title>
<link rel="shortcut icon" href="{{ URL::asset('img/logo.png') }}">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="{{ URL::asset('css/informasi.css') }}">
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script type="text/javascript" src="https://daks2k3a4ib2z.cloudfront.net/5317d67d660658b254000454/js/webflow.js?2f83b8326cc4c8f7327b5dba30444a37"></script>
<style>
body {font-family: "Open Sans"}
</style>
  <style>
    @font-face {
      font-family: "Brandon_Grotesque_bold";
      src: url(../assets/font/Brandon_blk.otf);}

    @font-face {
      font-family: "Brandon_Grotesque_reg";
      src: url(../assets/font/Brandon_reg.otf);}

    .f_bold {
      font-family: "Brandon_Grotesque_bold";
    }

    .f_reg {
      font-family: "Brandon_Grotesque_reg";
    }
    .header-bg {
      background: #171717;
    }
  </style>
<link rel="stylesheet" href="{{ URL::asset('css/bv.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/scroll_down.css') }}">

<body class="w3-white w3-text-white">
  <!-- Navbar (sit on top) -->
  <div class="w3-top" data-collapse="medium" data-animation="over-right" data-duration="400" data-contain="1" data-doc-height="1" data-ix="nav-bar-load" data-easing="ease-out-quart" data-easing2="ease-out-quart">
      <div class="w3-bar w3-padding-16" id="myNavbar">
        <a href="/" class="w3-bar-item" style="letter-spacing: 5px; font-size:15pt;">
          <img src="{{ URL::asset('img/minilogo.png') }}" style="width:40px; height:40px;margin-left:2em">
          <div class="f_bold w3-text-white w3-display-left w3-large" style="margin-left:6.5em">HI-DEPOK</div>
        </a>
        <div class="w3-text-white w3-right w3-display-right" style="margin-right:3em;letter-spacing:1px">
          <div class="w3-bar-item w3-hide-small" style="padding-top:1em; margin-top: 10px;">INFORMATION</div>
          <div onclick="openNav()" class="w3-bar-item w3-hover-text-blue w3-xxlarge" style="cursor: pointer;"> <i class="fa fa-bars"></i> </div>
        </div>
      </div>
    </div>


    <!-- Hidden Sidebar (reveals when clicked on menu icon)-->
      <nav class="w3-sidebar w3-black w3-animate-right w3-xxlarge" style="display:none;padding-top:150px;right:0;z-index:2; overflow: hidden" id="mySidebar">
        <a class="w3-display-topleft w3-padding-16" href="#" style="margin-left: 0.77em;">
          <img src="{{ URL::asset('img/minilogo.png') }}" style="width:50px; height:50px">
        </a>
        <a href="javascript:void(0)" onclick="closeNav()" class="w3-black w3-xxxlarge w3-display-topright w3-text-white w3-hover-text-blue" style="padding: 6px 32px;">
          <i class="fa fa-remove"></i>
        </a>
        <div class="f_bold w3-display-middle w3-bar-block w3-center">
          <a href="/" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">HOME</a>
          <a href="/information" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">INFORMATION</a>
          <a href="/maps" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">MAPS</a>
          <a href="/blog" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">BLOG</a>
          <a href="/event" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">EVENT</a>
          <a href="/" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">OPEN DATA</a>
          <a href="/faq" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">FAQ</a>
        </div>
        <div class="w3-display-bottommiddle w3-medium" style="margin-bottom:2em">
          design by <a class="w3-text-blue" href="http://www.tireg-dev.com" style="text-decoration:none;"><b> Tireg Dev </b></a> <img src="{{ URL::asset('img/tireg_wh.png') }}" style="width:30px; height:30px">
        </div>
      </nav>



  <div class="com">
  <div class="com__content">
    <section class="com__section com__section--text">
      <h1 class="animate slideInLeft ">Struktur Pemerintahan Kota Depok</h1>
      <p class="animate slideInLeft delay-3">Struktur Organisasi Perangkat Daerah Kota Depok berdasarkan Peraturan Daerah Kota Depok Nomor 19 Tahun 2012 Tentang Perubahan Ketiga atas Peraturan Daerah Kota Depok Nomor 08 Tahun 2008...<br><br>
      <button class="w3-btn orange-hd w3-text-white w3-round-large w3-padding w3-medium"> See More </button>
      </p>
    </section>
    <section class="com__section com__section--text">
      <h1 class="animate slideInLeft">Infrastruktur</h1>
      <p class="animate slideInLeft delay-2">Pembangunan infrastruktur yang dilakukan Pemerintah Kota (Pemkot) Depok Jawa Barat bertujuan untuk meningkatkan perekonomian warga Depok...<br><br>
      <button class="w3-btn orange-hd w3-text-white w3-round-large w3-padding w3-medium"> See More </button>
      </p>
    </section>
    <section class="com__section com__section--text">
      <h1 class="animate slideInLeft">Aplikasi</h1>
      <p class="animate slideInLeft delay-2">Pesatnya perkembangan teknologi, Pemkot Depok mengembangangkan aplikasi-aplikasi yang membantu sistem kerja Pemerintahan dalam berbagai bidang...<br><br>
      <button class="w3-btn orange-hd w3-text-white w3-round-large w3-padding w3-medium"> See More </button>
      </p>
    </section>
    <section class="com__section com__section--text">
      <h1 class="animate slideInLeft">Organisasi</h1>
      <p class="animate slideInLeft delay-2">Organisasi Pemerintahan Daerah (OPD) sesuai lampiran Perda Kota Depok No 19 TH. 2012 terdiri dari beberapa organisasi yang berkaitan dalam pembangunan Kota Depok...<br><br>
      <a href="/organisasi"><button class="w3-btn orange-hd w3-text-white w3-round-large w3-padding w3-medium"> See More </button></a>
      </p>
    </section>
  </div>
  <nav class="com__nav">
    <ul class="com__nav-list">
      <li class="com__nav-item">
        <a href="" class="com__nav-link" style="text-decoration: none;">
          <span class="blue-line animate scaleInLeft delay-2 w3-small w3-text-white"><b>Struktur Pemerintahan Kota Depok</b></span>
          <span class="white-line animate scaleInLeft delay-4"></span>
          <span class="white-line animate scaleInLeft delay-5"></span>
        </a>
      </li>
      <li class="com__nav-item">
        <a href="" class="com__nav-link" style="text-decoration: none;">
          <span class="blue-line animate scaleInLeft delay-2 w3-small w3-text-white"><b> Infrastruktur </b></span>
          <span class="white-line animate scaleInLeft delay-4"></span>
          <span class="white-line animate scaleInLeft delay-5"></span>
        </a>
      </li>
      <li class="com__nav-item">
        <a href="" class="com__nav-link" style="text-decoration: none;">
          <span class="blue-line animate scaleInLeft delay-2 w3-small w3-text-white"><b> Aplikasi </b></span>
          <span class="white-line animate scaleInLeft delay-4"></span>
          <span class="white-line animate scaleInLeft delay-5"></span>
        </a>
      </li>
      <li class="com__nav-item">
        <a href="" class="com__nav-link" style="text-decoration: none;">
          <span class="blue-line animate scaleInLeft delay-2 w3-small w3-text-white"><b> Organisasi </b></span>
          <span class="white-line animate scaleInLeft delay-4"></span>
          <span class="white-line animate scaleInLeft delay-5"></span>
        </a>
      </li>
    </ul>
  </nav>
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
    <div class="w3-third w3-container w3-large" style="padding:15px">
      <a href="/information" class="w3-bar-item w3-text-white w3-hover-opacity w3-small" style="text-decoration:none" onclick="toggleFunction()">Information</a>
      <a href="/maps" class="w3-bar-item w3-text-white w3-hover-opacity w3-small" style="text-decoration:none; padding-left: 1.7em">Maps</a>
      <a href="/blog" class="w3-bar-item w3-text-white w3-hover-opacity w3-small" style="text-decoration:none;padding: 0em 1.7em;" onclick="toggleFunction()">Blog</a>
      <a href="/event" class="w3-bar-item w3-text-white w3-hover-opacity w3-small" style="text-decoration:none;padding-right: 1.7em;">Event</a>
      <a href="/faq" class="w3-bar-item w3-text-white w3-hover-opacity w3-small" style="text-decoration:none">FAQ</a>

    </div>
  </div>
  <hr style="margin: 0em 6em;border-top: 1px solid rgba(255, 255, 255, 0.39)">
  <div class="w3-row w3-small w3-padding">
    <div class="w3-content" style="max-width:700px">
      <div class="w3-third w3-container">
        <h5>MAIL</h5>
        <p>humas@hidepok.id</p>
      </div>
      <div class="w3-third w3-container">
        <h5>CALL</h5>
        <p>+62 811 222 333 11</p>
      </div>
      <div class="w3-third w3-container">
        <h5>FIND US</h5>
        <p>Jalan Margonda No.54, Depok</p>
      </div>
    </div>
  </div>
  <hr style="margin: 0em 6em; border-top:1px solid rgba(255, 255, 255, 0.35)">
  <p class="w3-small" style="margin-top: 1.2em">Supported by TiregDev © 2017</p>
</footer>

<script>
// Toggle between hiding and showing blog replies/comments
// document.getElementById("myBtn").click();
// function myFunction(id) {
//     var x = document.getElementById(id);
//     if (x.className.indexOf("w3-show") == -1) {
//         x.className += " w3-show";
//     } else {
//         x.className = x.className.replace(" w3-show", "");
//     }
// }
</script>
<script>
  // Change style of navbar on scroll
  window.onscroll = function() {myFunction()};
  function myFunction() {
  var navbar = document.getElementById("myNavbar");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
      navbar.className = "w3-bar" + " w3-card-2" + " w3-animate-top" + " w3-padding" + " header-bg" + " w3-text-dark-gray";
    } else {
      navbar.className = navbar.className.replace(" w3-card-2 w3-animate-top w3-padding header-bg w3-text-dark-gray", "");
      }
  }
  // Used to toggle the menu on small screens when clicking on the menu button
  function toggleFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
      x.className += " w3-show";
    } else {
      x.className = x.className.replace(" w3-show", "");
    }
  }
  // Automatic Slideshow - change image every 4 seconds
  var myIndex = 0;
  carousel();
  function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 4000);
  }
</script>
<script>
function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" w3-border-orange w3-light-grey", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-border-orange w3-light-grey";
}
</script>
<script src="{{ URL::asset('js/nav.js') }}"></script>
</body>
</html>
