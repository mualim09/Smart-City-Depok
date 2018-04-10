<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>FAQ | Hi-Depok</title>
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans'>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="{{ URL::asset('css/faq.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
</head>
<body class="w3-text-white" style="background-image: url('../../img/pattern.png'); background-repeat: repeat-x repeat-y;">
  <!-- Navbar (sit on top) -->
  <div class="w3-top">
    <div class="w3-bar w3-padding-16" id="myNavbar">
      <a href="/" class="w3-bar-item" style="letter-spacing: 5px; font-size:15pt;">
        <img src="{{ URL::asset('img/minilogo.png') }}" style="width:40px; height:40px;margin-left:2em">
        <div class="f_bold w3-display-left w3-large" style="margin-left:6.5em">HI-DEPOK</div>
      </a>
      <div class="w3-right w3-display-right" style="margin-right:3em;letter-spacing:1px">
        <div class="w3-bar-item w3-hide-small" style="padding-top:1.5em;">FAQ</div>
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

  <div class="cont s--inactive">
    <div class="cont__inner">
      <div class="el">
        <div class="el__overflow">
          <div class="el__inner">
            <div class="el__bg"></div>
            <div class="el__preview-cont">
              <h2 class="el__heading" style="padding: 0 1.5em">Apa yang dimaksud dengan aplikasi Hi-Depok?</h2>
            </div>
            <div class="el__content">
              <div class="el__text" style="padding: 2em;">Hi-Depok adalah aplikasi yang bertujuan untuk memudahkan aktivitas warga Depok dan sekitarnya. Aplikasi ini dibuat untuk memenuhi program 1000 aplikasi untuk kota Depok yang di prakarsai oleh Pemkot Depok dan rencananya akan menjadi aplikasi pendukung <i>smart city</i> kota Depok.</div>
              <div class="el__close-btn"></div>
            </div>
          </div>
        </div>
        <div class="el__index">
          <div class="el__index-back">1</div>
          <div class="el__index-front">
            <div class="el__index-overlay" data-index="1">1</div>
          </div>
        </div>
      </div>
      <div class="el">
        <div class="el__overflow">
          <div class="el__inner">
            <div class="el__bg"></div>
            <div class="el__preview-cont">
              <h2 class="el__heading" style="padding: 0 1.5em">Apa saja keunggulan aplikasi Hi-Depok?</h2>
            </div>
            <div class="el__content">
              <div class="el__text" style="padding: 2em;">Hi-Depok adalah aplikasi yang bertujuan untuk memudahkan aktivitas warga Depok dan sekitarnya. Aplikasi ini dibuat untuk memenuhi program 1000 aplikasi untuk kota Depok yang di prakarsai oleh Pemkot Depok dan rencananya akan menjadi aplikasi pendukung <i>smart city</i> kota Depok.</div>
              <div class="el__close-btn"></div>
              <div class="el__close-btn"></div>
            </div>
          </div>
        </div>
        <div class="el__index">
          <div class="el__index-back">2</div>
          <div class="el__index-front">
            <div class="el__index-overlay" data-index="2">2</div>
          </div>
        </div>
      </div>
      <div class="el">
        <div class="el__overflow">
          <div class="el__inner">
            <div class="el__bg"></div>
            <div class="el__preview-cont">
              <h2 class="el__heading" style="padding: 0 1.5em">OS apa saja yang mensupport aplikasi Hi-Depok?</h2>
            </div>
            <div class="el__content">
              <div class="el__text" style="padding: 2em;">Hi-Depok adalah aplikasi yang bertujuan untuk memudahkan aktivitas warga Depok dan sekitarnya. Aplikasi ini dibuat untuk memenuhi program 1000 aplikasi untuk kota Depok yang di prakarsai oleh Pemkot Depok dan rencananya akan menjadi aplikasi pendukung <i>smart city</i> kota Depok.</div>
              <div class="el__close-btn"></div>
              <div class="el__close-btn"></div>
            </div>
          </div>
        </div>
        <div class="el__index">
          <div class="el__index-back">3</div>
          <div class="el__index-front">
            <div class="el__index-overlay" data-index="3">3</div>
          </div>
        </div>
      </div>
      <div class="el">
        <div class="el__overflow">
          <div class="el__inner">
            <div class="el__bg"></div>
            <div class="el__preview-cont">
              <h2 class="el__heading" style="padding: 0 1.5em">Siapa saja yang bisa menggunakan aplikasi Hi-Depok?</h2>
            </div>
            <div class="el__content">
              <div class="el__text" style="padding: 2em;">Hi-Depok adalah aplikasi yang bertujuan untuk memudahkan aktivitas warga Depok dan sekitarnya. Aplikasi ini dibuat untuk memenuhi program 1000 aplikasi untuk kota Depok yang di prakarsai oleh Pemkot Depok dan rencananya akan menjadi aplikasi pendukung <i>smart city</i> kota Depok.</div>
              <div class="el__close-btn"></div>
              <div class="el__close-btn"></div>
            </div>
          </div>
        </div>
        <div class="el__index">
          <div class="el__index-back">4</div>
          <div class="el__index-front">
            <div class="el__index-overlay" data-index="4">4</div>
          </div>
        </div>
      </div>
      <div class="el">
        <div class="el__overflow">
          <div class="el__inner">
            <div class="el__bg"></div>
            <div class="el__preview-cont">
              <h2 class="el__heading" style="padding: 0 1.5em">Bagaimana cara mendapatkan aplikasi Hi-Depok?</h2>
            </div>
            <div class="el__content">
              <div class="el__text" style="padding: 2em;">Hi-Depok adalah aplikasi yang bertujuan untuk memudahkan aktivitas warga Depok dan sekitarnya. Aplikasi ini dibuat untuk memenuhi program 1000 aplikasi untuk kota Depok yang di prakarsai oleh Pemkot Depok dan rencananya akan menjadi aplikasi pendukung <i>smart city</i> kota Depok.</div>
              <div class="el__close-btn"></div>
              <div class="el__close-btn"></div>
            </div>
          </div>
        </div>
        <div class="el__index">
          <div class="el__index-back">5</div>
          <div class="el__index-front">
            <div class="el__index-overlay" data-index="5">5</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- <div class="cont s--inactive">
    <div class="cont__inner">
      <div class="el">
        <div class="el__overflow">
          <div class="el__inner">
            <div class="el__bg"></div>
            <div class="el__preview-cont">
              <h2 class="el__heading" style="padding: 0 1.5em">Apakah saya harus mendaftar terlebih dahulu untuk menggunakan aplikasi Hi-Depok?</h2>
            </div>
            <div class="el__content">
              <div class="el__text" style="padding: 2em;">Hi-Depok adalah aplikasi yang bertujuan untuk memudahkan aktivitas warga Depok dan sekitarnya. Aplikasi ini dibuat untuk memenuhi program 1000 aplikasi untuk kota Depok yang di prakarsai oleh Pemkot Depok dan rencananya akan menjadi aplikasi pendukung <i>smart city</i> kota Depok.</div>
              <div class="el__close-btn"></div>
            </div>
          </div>
        </div>
        <div class="el__index">
          <div class="el__index-back">6</div>
          <div class="el__index-front">
            <div class="el__index-overlay" data-index="6">6</div>
          </div>
        </div>
      </div>
      <div class="el">
        <div class="el__overflow">
          <div class="el__inner">
            <div class="el__bg"></div>
            <div class="el__preview-cont">
              <h2 class="el__heading" style="padding: 0 1.5em">Apakah aplikasi Hi-Depok membutuhkan koneksi internet?</h2>
            </div>
            <div class="el__content">
              <div class="el__text" style="padding: 2em;">Hi-Depok adalah aplikasi yang bertujuan untuk memudahkan aktivitas warga Depok dan sekitarnya. Aplikasi ini dibuat untuk memenuhi program 1000 aplikasi untuk kota Depok yang di prakarsai oleh Pemkot Depok dan rencananya akan menjadi aplikasi pendukung <i>smart city</i> kota Depok.</div>
              <div class="el__close-btn"></div>
              <div class="el__close-btn"></div>
            </div>
          </div>
        </div>
        <div class="el__index">
          <div class="el__index-back">7</div>
          <div class="el__index-front">
            <div class="el__index-overlay" data-index="7">7</div>
          </div>
        </div>
      </div>
      <div class="el">
        <div class="el__overflow">
          <div class="el__inner">
            <div class="el__bg"></div>
            <div class="el__preview-cont">
              <h2 class="el__heading" style="padding: 0 1.5em">Bagaimana cara daftar sebagai partner di Hi-Depok?</h2>
            </div>
            <div class="el__content">
              <div class="el__text" style="padding: 2em;">Hi-Depok adalah aplikasi yang bertujuan untuk memudahkan aktivitas warga Depok dan sekitarnya. Aplikasi ini dibuat untuk memenuhi program 1000 aplikasi untuk kota Depok yang di prakarsai oleh Pemkot Depok dan rencananya akan menjadi aplikasi pendukung <i>smart city</i> kota Depok.</div>
              <div class="el__close-btn"></div>
              <div class="el__close-btn"></div>
            </div>
          </div>
        </div>
        <div class="el__index">
          <div class="el__index-back">8</div>
          <div class="el__index-front">
            <div class="el__index-overlay" data-index="8">8</div>
          </div>
        </div>
      </div>
      <div class="el">
        <div class="el__overflow">
          <div class="el__inner">
            <div class="el__bg"></div>
            <div class="el__preview-cont">
              <h2 class="el__heading" style="padding: 0 1.5em">Dapatkah saya mengajukan tempat untuk ditampilkan pada aplikasi Hi-Depok walaupun saya bukan pemilik tempat tersebut?</h2>
            </div>
            <div class="el__content">
              <div class="el__text" style="padding: 2em;">Hi-Depok adalah aplikasi yang bertujuan untuk memudahkan aktivitas warga Depok dan sekitarnya. Aplikasi ini dibuat untuk memenuhi program 1000 aplikasi untuk kota Depok yang di prakarsai oleh Pemkot Depok dan rencananya akan menjadi aplikasi pendukung <i>smart city</i> kota Depok.</div>
              <div class="el__close-btn"></div>
              <div class="el__close-btn"></div>
            </div>
          </div>
        </div>
        <div class="el__index">
          <div class="el__index-back">9</div>
          <div class="el__index-front">
            <div class="el__index-overlay" data-index="9">9</div>
          </div>
        </div>
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
      <hr style="margin: 0em 6em;border-top: 1px solid rgba(238, 238, 238, 0.16);">
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
      <hr style="margin: 0em 6em; border-top: 1px solid rgba(238, 238, 238, 0.16);">
      <p class="w3-small" style="margin-top: 1.2em">Supported by TiregDev © 2017</p>
    </footer>

<script src="{{ URL::asset('js/faq.js') }}"></script>
<script>
  // Change style of navbar on scroll
  window.onscroll = function() {myFunction()};
  function myFunction() {
  var navbar = document.getElementById("myNavbar");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
      navbar.className = "w3-bar" + " w3-card-2" + " w3-animate-top" + " w3-padding" + " header-bg" + " w3-text-white";
    } else {
      navbar.className = navbar.className.replace(" w3-card-2 w3-animate-top w3-padding header-bg w3-text-white", "");
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

</body>
</html>
