<!DOCTYPE html>
<html>
<title>Event
 | {{ $event->nama_event }}</title>
<link rel="shortcut icon" href="{{ URL::asset('img/logo.png') }}">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

.centerpagination {
    text-align: center;
}

.pagination {
    display: inline-block;
}

.pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
    border: 1px solid #ddd;
    margin: 0 4px;
}

.pagination a.active {
    background-color: #4CAF50;
    color: white;
    border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {background-color: #ddd;}

.orange-hd {
      background: #171717;
    }

</style>

<body class="w3-white w3-text-black">

  <!-- Navbar (sit on top) -->
  <div class="w3-top">
    <div class="w3-bar w3-padding-16" id="myNavbar">
      <a href="/" class="w3-bar-item" style="letter-spacing: 5px; font-size:15pt;">
        <img src="{{ URL::asset('img/minilogo.png') }}" style="width:50px; height:50px;margin-left:2em">
        <div class="f_bold w3-display-left" style="font-size:17pt;margin-left:5.5em">HI-DEPOK</div>
      </a>
      <div class=" w3-right w3-display-right" style="margin-right:3em;letter-spacing:1px">
        <div class="w3-bar-item w3-hide-small" style="padding-top:1.5em;">EVENT</div>
        <div onclick="openNav()" class="w3-bar-item w3-hover-text-blue w3-xxlarge" style="cursor: pointer;"> <i class="fa fa-bars"></i> </div>
      </div>
    </div>
  </div>
  <!-- Hidden Sidebar (reveals when clicked on menu icon)-->
    <nav class="w3-sidebar w3-black w3-animate-right w3-xxlarge" style="display:none;padding-top:150px;right:0;z-index:2" id="mySidebar">
      <a class="w3-display-topleft w3-padding-16" href="#" style="margin-left: 0.77em;">
        <img src="{{ URL::asset('img/minilogo.png') }}" style="width:50px; height:50px">
      </a>
      <a href="javascript:void(0)" onclick="closeNav()" class="w3-black w3-xxxlarge w3-display-topright w3-text-white w3-hover-text-blue" style="padding: 6px 32px;">
        <i class="fa fa-remove"></i>
      </a>
      <div class="f_bold w3-display-middle w3-bar-block w3-center">
        <a href="/" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">HOME</a>
        <a href="/informasi" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">INFORMATION</a>
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



  <div class="w3-content w3-padding-64" style="    padding-top: 130px!important;;max-width:1100px">
    <img src="{{ asset ("storage/img_event/$event->image_event") }}" style="width:100%; height:400px" data-ix="scale-on-scroll">
    <h2 data-ix="scale-on-scroll">{{ $event->nama_event }}</h2>
    <div class="w3-row">
      <div class="w3-half" data-ix="scale-on-scroll">
        <p class="w3-text-grey w3-small" style="margin:0"> {{ $event->tgl_mulai }} - {{ $event->tgl_akhir }} </p>
      </div>
      <div class="w3-half" data-ix="scale-on-scroll-delay-100">
        <a href=""><button class="w3-right w3-small w3-blue-gray w3-round-large w3-padding" style="margin-left:0.5em"><i class="fa fa-facebook-official"></i> Facebook </button></a>
        <a href=""><button class="w3-right w3-small w3-blue w3-round-large w3-padding" style="margin-left:0.5em"><i class="fa fa-twitter"></i> Twitter </button></a>
        <a href=""><button class="w3-right w3-small w3-red w3-round-large w3-padding" style="margin-left:0.5em"><i class="fa fa-youtube"></i> Youtube </button> </a>
      </div>
    </div>
    <hr>
    <p data-ix="scale-on-scroll">Penyelenggara : {{ $event->penyelenggara }}</p>
    <p data-ix="scale-on-scroll">Tempat : {{ $event->lokasi_event }}</p>
    <p data-ix="scale-on-scroll" class="w3-justify">{!! $event->deskripsi_event !!}</p>
  </div>

  <div class="w3-container w3-light-gray">
    <div class="w3-content w3-padding-64">
      <h2 class="f_bold w3-center" data-ix="scale-on-scroll">EVENT LAINNYA</h2>
      <p class="w3-opacity w3-center" data-ix="scale-on-scroll"><i>Cari tahu event lainnya di Kota Depok</i></p><br>
      <div class="w3-row-padding w3-padding-32" style="margin:0 -16px">
      @foreach($acaks as $acak)
        <div class="w3-third w3-margin-bottom" data-ix="scale-on-scroll">
          <img src="{{ asset ("storage/img_event/$acak->image_event") }}" style="width:100%; height:300px">
          <div class="w3-container w3-white">
            <p><b>{{ $acak-> nama_event }}</b></p>
            <p class="w3-opacity">{{ $acak->tgl_mulai }} - {{ $acak->tgl_akhir }}</p>
            <a href="/event/{{ $acak->nama_event }}" style="text-decoration: none;"><button class="w3-button w3-black w3-margin-bottom">Selengkapnya</button></a>
          </div>
        </div>
      @endforeach
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
document.getElementById("myBtn").click();
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

</script>
<script>
  // Change style of navbar on scroll
  window.onscroll = function() {myFunction()};
  function myFunction() {
  var navbar = document.getElementById("myNavbar");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
      navbar.className = "w3-bar" + " w3-card-2" + " w3-animate-top" + " orange-hd" + " w3-text-white";
    } else {
      navbar.className = navbar.className.replace(" w3-card-2 w3-animate-top orange-hd w3-text-white", "");
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
<script src="{{ URL::asset('js/nav.js') }}"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="https://daks2k3a4ib2z.cloudfront.net/5317d67d660658b254000454/js/webflow.js?2f83b8326cc4c8f7327b5dba30444a37"></script>
</body>
</html>