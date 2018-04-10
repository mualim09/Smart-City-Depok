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
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
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
.centerpagination {
    text-align: center;
}
.header-bg {
  background: #171717;
}
.orange-hd {
  background: #f8981d;
}
.gray-text {
  color: #cccccc!important;
}
.pagination a.active {
    background-color: #4CAF50;
    color: white;
    border: 1px solid #4CAF50;
}
.pagination a:hover:not(.active) {background-color: #ddd;}
.pagination li{
    display: inline;
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
          <div class="w3-bar-item w3-hide-small" style="padding-top:1em; margin-top: 10px;">BLOG</div>
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

<div style="width:100%; ">

  <!-- <header class="w3-container w3-center w3-padding-64 w3-white" style>
    <h1 class="f_bold w3-xxlarge"><b>BLOG</b></h1>
    <h6>Mari lihat apa yang terjadi di Kota Depok</h6>
    </div>
  </header> -->

  <!-- Slideshow -->
  <div class="mySlides w3-display-container w3-center">
    <div style="background-color:#000; position:relative; width:100%;height:450px;">
      <img src="{{ asset ('img/bg_blog.jpg') }}" style="position:absolute; width:100%; height:450px; left:0; opacity:0.25">
    </div>
    <div class="w-container contents w3-display-middle" style="top: 43%;">
      <div class="main-heading-wrapper w3-center">
        <h1 class="f_bold w3-wide w3-text-white" data-ix="fade-in-heading" style="font-size: 60pt">BLOG</h1><BR>
        <h4 class="w3-medium w3-text-white" data-ix="fade-in-heading-2" style="margin-top: -40px;">Mari lihat apa yang terjadi di Kota Depok</h4>
      </div>
      <a href="#more" class="scroll w-inline-blxock down-arrow" data-ix="down-arrow"><span class="down-inner" data-ix="down-arrow-on-load" style="top: 140%;"></span></a>
    </div>
  </div>


  <!-- Isi Blog -->
  <div class="w3-content" style="max-width: 1300px">
    <div class="w3-row w3-white w3-padding-48">
      <div class="w3-twothird" style="padding-right: 3em" >
        @foreach($blogs as $blog)
        <div class="w3-card-4 w3-white w3-padding-16" style="margin-bottom: 2.5em" data-ix="scale-on-scroll">
          <div class="w3-container" style="padding: 0 2em">
            <h3><b>{{ $blog->judul }}</b></h3>
            <h5><span class="w3-opacity">{{ $blog->created_at }}</span></h5>
          </div>
          <!-- <div class="w3-container" style="padding: 0 3.5em"> -->
            <!-- <p class="w3-justify">Hi-Depok merupakan wujud peningkatan pelayanan pemerintah Kota Depok kepada warganya. Aplikasi ini dapat membantu warga Kota Depok dalam berbagai aspek pelayanan seperti pelayanan kesehatan, keamanan, sosial dan juga kebutuhan akan informasi.</p> -->
            <!-- <p class="w3-justify">{{ $blog->isi }}</p> -->
          <!-- </div> -->
          <div class="w3-container" style="padding: 0 2em">
          <p><a href="/blog/{{ $blog->judul }}"><button class="w3-button w3-padding-large w3-white w3-border"><b>Read More</b></button></a></p>
          </div>
        </div>
        @endforeach
       
  <div class="col-md-6" align="center" data-ix="scale-on-scroll">
    <center>{{$blogs->links()}}</center>
  </div>
    <!-- END BLOG ENTRIES -->
    </div>

      <!-- About/Information menu -->
      <div class="w3-third" data-ix="scale-on-scroll">

        <center>
          <div class="w3-row">
            <a href="javascript:void(0)" onclick="openCity(event, 'tab1');">
              <div class="w3-quarter tablink w3-bottombar w3-hover-light-grey w3-padding w3-border-orange w3-light-grey"><i class="fa fa-circle gray-text"></i></div>
            </a>
            <a href="javascript:void(0)" onclick="openCity(event, 'tab2');">
              <div class="w3-quarter tablink w3-bottombar w3-hover-light-grey w3-padding"><i class="fa fa-circle gray-text"></i></div>
            </a>
            <a href="javascript:void(0)" onclick="openCity(event, 'tab3');">
              <div class="w3-quarter tablink w3-bottombar w3-hover-light-grey w3-padding"><i class="fa fa-circle gray-text"></i></div>
            </a>
            <a href="javascript:void(0)" onclick="openCity(event, 'tab4');">
              <div class="w3-quarter tablink w3-bottombar w3-hover-light-grey w3-padding"><i class="fa fa-circle gray-text"></i></div>
            </a>
          </div>
        </center>
          
          <div id="tab1" class="w3-container city">
          @foreach($items as $item)
            <h5><a class="w3-text-black w3-hover-text-orange" href="{{ $item->get_permalink() }}" style="text-decoration: none;">{{ $item->get_title() }}</a></h5>
            <hr>
            <!-- <p>{{ $item->get_description() }}</p> -->
          @endforeach
          </div>
          
          <div id="tab2" class="w3-container city" style="display:none">
          @foreach($items2 as $item2)
            <h5><a class="w3-text-black" href="{{ $item2->get_permalink() }}" style="text-decoration: none;">{{ $item2->get_title() }}</a></h5>
            <!-- <p>Paris is the capital of France.</p>  -->
          @endforeach
          </div>

          <div id="tab3" class="w3-container city" style="display:none">
          @foreach($items3 as $item3)
            <h5><a class="w3-text-black" href="{{ $item3->get_permalink() }}" style="text-decoration: none;">{{ $item3->get_title() }}</a></h5>
            <!-- <p>Tokyo is the capital of Japan.</p> -->
          @endforeach
          </div>


          <div id="tab4" class="w3-container city" style="display:none">
          @foreach($items4 as $item4)
            <h5><a class="w3-text-black" href="{{ $item4->get_permalink() }}" style="text-decoration: none;">{{ $item4->get_title() }}</a></h5>
            <!-- <p>Tokyo is the capital of Japan.</p> -->
          @endforeach
          </div>

        <!-- Posts -->
        <!-- <div class="w3-white w3-margin" style="border:3px solid rgba(248, 152, 29, 0.31)">
          <div class="w3-container w3-padding w3-white">
            <h1 class="w3-center">DEPOK NEWS</h1>
          </div>
          <ul class="w3-ul w3-hoverable w3-white">
          @foreach($items as $item)
            <li class="w3-padding-16" data-ix="scale-on-scroll-delay-100">
              <span><a class="w3-text-black" href="{{ $item->get_permalink() }}" style="text-decoration: none;">{{ $item->get_title() }}</a></span>
            </li>
          @endforeach
          </ul>
        </div> -->


      <!-- END About/Intro Menu -->
      </div>

    <!-- END GRID -->
    </div>
  </div>

<!-- END w3-content -->
</div>

<!-- Subscribe Modal -->
<!-- <div id="subscribe" class="w3-modal w3-animate-opacity">
  <div class="w3-modal-content" style="padding:32px">
    <div class="w3-container w3-white">
      <i onclick="document.getElementById('subscribe').style.display='none'" class="fa fa-remove w3-transparent w3-button w3-xlarge w3-right"></i>
      <h2 class="w3-wide">SUBSCRIBE</h2>
      <p>Join my mailing list to receive updates on the latest blog posts and other things.</p>
      <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail"></p>
      <button type="button" class="w3-button w3-block w3-padding-large w3-cyan w3-margin-bottom" onclick="document.getElementById('subscribe').style.display='none'">Subscribe</button>
    </div>
  </div>
</div> -->
 
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