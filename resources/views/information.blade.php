<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Information | Hi-Depok</title>
  <link rel="shortcut icon" href="{{ URL::asset('img/logo.png') }}">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
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
    </div>
  </div>

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
  
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="{{ URL::asset('js/informasi.js') }}"></script>
 
</body>
</html>
