<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Information | Hi-Depok</title>
  <link rel="shortcut icon" href="{{ URL::asset('img/logo.png') }}">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ URL::asset('css/informasi.css') }}">
</head>
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
      background: #fafafa;
    }
    .orange-hd {
      background: #f8981d;
    }
  </style>

<body>
  <!-- Navbar (sit on top) -->
  <div class="w3-top">
    <div class="w3-bar w3-padding-16" id="myNavbar">
      <a href="/" class="w3-bar-item" style="letter-spacing: 5px; font-size:15pt;">
        <img src="{{ URL::asset('img/minilogo.png') }}" style="width:40px; height:40px;margin-left:2em">
        <div class="f_bold w3-display-left w3-large w3-text-white" style="margin-left:6.5em">HI-DEPOK</div>
      </a>
      <div onclick="openNav()" class="w3-bar-item w3-text-white w3-display-right w3-hover-text-blue" style="margin-right:8em; cursor:pointer">
          <i class="fa fa-bars w3-xxlarge"></i>
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
      <a href="/" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()" style="text-decoration: none;">BERANDA</a>
      <a href="/information" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()" style="text-decoration: none;">INFORMASI</a>
      <a href="/maps" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()" style="text-decoration: none;">PETA</a>
      <a href="/blog" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()" style="text-decoration: none;">BLOG</a>
      <a href="/event" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()" style="text-decoration: none;">ACARA</a>
      <a href="#" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()" style="text-decoration: none;">OPEN DATA</a>
      <a href="/faq" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()" style="text-decoration: none;">FAQ</a>
    </div>
    <div class="w3-display-bottommiddle f_nav2" style="margin-bottom:2em">
      desain oleh <a class="w3-text-blue" href="http://www.tireg-dev.com" style="text-decoration:none;"><b> Tireg Dev </b></a> <img src="{{ URL::asset('img/tireg_wh.png') }}" style="width:30px; height:30px">
    </div>
  </nav>

  <div class="com">
  <div class="com__content">
    <section class="com__section com__section--text">
      <h1 class="animate slideInLeft ">Struktur Pemerintahan Kota Depok</h1>
      <p class="animate slideInLeft delay-3">Struktur Organisasi Perangkat Daerah Kota Depok berdasarkan Peraturan Daerah Kota Depok Nomor 19 Tahun 2012 Tentang Perubahan Ketiga atas Peraturan Daerah Kota Depok Nomor 08 Tahun 2008...<br><br><a href="https://www.depok.go.id/instansi/struktur-organisasi-perangkat-daerah"><button class="w3-btn orange-hd w3-text-white w3-round-large w3-padding w3-medium"> Baca Selengkapnya </button></a>
      </p>
    </section>
    <section class="com__section com__section--text">
      <h1 class="animate slideInLeft">Infrastruktur</h1>
      <p class="animate slideInLeft delay-2">Pembangunan infrastruktur yang dilakukan Pemerintah Kota (Pemkot) Depok Jawa Barat bertujuan untuk meningkatkan perekonomian warga Depok...<br><br>
      <!-- <button class="w3-btn orange-hd w3-text-white w3-round-large w3-padding w3-medium"> See More </button> -->
      </p>
    </section>
    <section class="com__section com__section--text">
      <h1 class="animate slideInLeft">Aplikasi</h1>
      <p class="animate slideInLeft delay-2">Pesatnya perkembangan teknologi, Pemkot Depok mengembangangkan aplikasi-aplikasi yang membantu sistem kerja Pemerintahan dalam berbagai bidang...<br><br>
      <!-- <button class="w3-btn orange-hd w3-text-white w3-round-large w3-padding w3-medium"> See More </button> -->
      </p>
    </section>
    <section class="com__section com__section--text">
      <h1 class="animate slideInLeft">Organisasi</h1>
      <p class="animate slideInLeft delay-2">Organisasi Pemerintahan Daerah (OPD) sesuai lampiran Perda Kota Depok No 19 TH. 2012 terdiri dari beberapa organisasi yang berkaitan dalam pembangunan Kota Depok...<br><br>
      <!-- <a href="/organisasi"><button class="w3-btn orange-hd w3-text-white w3-round-large w3-padding w3-medium"> See More </button></a> -->
      </p>
    </section>
    <section class="com__section com__section--text">
      <h1 class="animate slideInLeft">Dashboard</h1>
      <p class="animate slideInLeft delay-2">Merupakan data analitik yang ditampilkan secara transparan kepada publik agar masyarakat dapat menegetahui perkembangan apa saja yang dilakukan di Kota Depok...<br><br>
     <!--  <a href="/organisasi"><button class="w3-btn orange-hd w3-text-white w3-round-large w3-padding w3-medium"> See More </button></a> -->
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
      <li class="com__nav-item">
        <a href="" class="com__nav-link" style="text-decoration: none;">
          <span class="blue-line animate scaleInLeft delay-2 w3-small w3-text-white"><b> Dashboard </b></span>
          <span class="white-line animate scaleInLeft delay-4"></span>
          <span class="white-line animate scaleInLeft delay-5"></span>
        </a>
      </li>
    </ul>
  </nav>
</div>
  
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="{{ URL::asset('js/informasi.js') }}"></script>
  <script src="{{ URL::asset('js/nav.js') }}"></script>
</body>
</html>
