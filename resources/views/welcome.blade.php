<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Hi-Depok</title>
  <link rel="shortcut icon" href="{{ URL::asset('img/logo.png') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
  <link rel="stylesheet" href="{{ URL::asset('css/parallax2.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/loader.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/style2.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/w3schools.css') }}">
</head>
<!-- Loader -->
<div id="loader-wrapper">
  <div id="loader"> </div>
  <div class="loader-section section-left"></div>
  <div class="loader-section section-right"></div>
</div>

<body>
  <div class="w3-top nav-panel2">
    <div class="w3-bar w3-padding-16" id="myNavbar" style="margin: 0 2em">
      <a href="#">
        <img src="{{ URL::asset('img/minilogo.png') }}" style="width:50px; height:50px">
        <div class="f_bold w3-text-white w3-display-left w3-xlarge w3-hide-small" style="margin-left:4em">HI-DEPOK</div>
      </a>
      <div class="f_bold w3-display-middle w3-hide-medium w3-hide-small">
        <ul>
          <li data-target="1" class="nav-btn nav-page1 w3-hover-text-orange active"> PENGENALAN </li>
          <li data-target="2" class="nav-btn nav-page1 w3-hover-text-orange"> BERITA </li>
          <li data-target="3" class="nav-btn nav-page1 w3-hover-text-orange"> FITUR </li>
          <li data-target="4" class="nav-btn nav-page1 w3-hover-text-orange"> TENTANG </li>
        </ul>
      </div>
      <div onclick="openNav()" class="w3-bar-item w3-text-white w3-display-right w3-hover-text-orange" style="margin-right:1.5em; cursor:pointer">
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
      <a href="#" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">BERANDA</a>
      <a href="/information" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">INFORMASI</a>
      <a href="/maps" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">PETA</a>
      <a href="/blog" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">BLOG</a>
      <a href="/event" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">ACARA</a>
      <a href="#" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">OPEN DATA</a>
      <a href="/faq" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">FAQ</a>
    </div>
    <div class="w3-display-bottommiddle f_nav2" style="margin-bottom:2em">
      desain oleh <a class="w3-text-blue" href="http://www.tireg-dev.com" style="text-decoration:none;"><b> Tireg Dev </b></a> <img src="{{ URL::asset('img/tireg_wh.png') }}" style="width:30px; height:30px">
    </div>
  </nav>

  <div class="wrapper active-page1">
    <!-- Introduction -->
    <div class="page page1">
      <div class="w3-center w3-text-white w3-display-middle intro_awal">
        <div class="about w3-center w3-hide-large w3-hide-medium w3-text-white"> HI-DEPOK </div>
        <div class="ftag ftagr w3-hide-large w3-hide-medium w3-medium" style="display: inline-block;"> ( </div><p class="ftag ftagr" style="display: inline-block;"> We Share We Care </p><div class="w3-hide-large w3-hide-medium ftag ftagr" style="display: inline-block;"> ) </div>
        <hr style="border-top: 2px solid #eee; margin: 0 0 20px;">
        <p class="tagline fresponsive">
          Hi-Depok merupakan wujud peningkatan pelayanan pemerintah Kota Depok kepada warganya. Aplikasi ini dapat membantu warga Kota Depok dalam berbagai aspek pelayanan seperti pelayanan kesehatan, keamanan, sosial dan juga kebutuhan akan informasi
        </p>
        <!-- <a href="#"  id="notificationButton" class="button">Notification</a> -->
      </div>
      <div class="w3-display-bottommiddle f_nav2" style="bottom: 2%;color:#f8981d;"> Didukung oleh 
        <img src="{{ URL::asset('img/logodepok.png') }}" style="width: 16px; height: 20px;">
        <img src="{{ URL::asset('img/depokfriendly_fontPutih.png')}}" style="width: 45px; height: 20px;">
        <img src="{{ URL::asset('img/logoopendata.png')}}" style="width: 25px; height: 25px;">
      </div>
    </div>

    <!-- News -->
    <div class="page page2">
      <div class="w3-content w3-display-middle" style="max-width:800px">
        <div class="about w3-center w3-hide-large w3-hide-medium w3-text-white" style="margin-bottom: 0.4em;"> BERITA </div>
        @foreach($beritas as $berita)
          <div class="card_news mySlides w3-card-4 w3-round-large w3-black">
            <div class="judul_news"><b>{{ $berita->get_title() }}</b></div>
            <p class="w3-justify complaint">{!! str_limit ($berita->get_description(), 150) !!}</p>
            <p class="w3-medium"><a href="{{ $berita->get_permalink() }}" style="text-decoration: none;" class="w3-medium"><br><button class="w3-button w3-gray complaint"><b>Baca Selengkapnya</b></button></a></p>
          </div>
        @endforeach
        <div class="w3-text-white prev_news" onclick="plusDivs(-1)">&#10094;</div>
        <div class="w3-text-white next_news" onclick="plusDivs(1)">&#10095;</div>
      </div>
      <div class="w3-display-bottommiddle f_nav2" style="bottom: 2%;color:#f8981d;"> Didukung oleh 
        <img src="{{ URL::asset('img/logodepok.png') }}" style="width: 16px; height: 20px;">
        <img src="{{ URL::asset('img/depokfriendly_fontPutih.png')}}" style="width: 45px; height: 20px;">
        <img src="{{ URL::asset('img/logoopendata.png')}}" style="width: 25px; height: 25px;">
      </div>
    </div>

    <!-- Features -->
    <div class="page page3">
      <div class="w3-row feat_content">
        <div class="about w3-center w3-hide-large w3-hide-medium w3-text-white" style="margin-bottom: 0.4em;"> FITUR </div>
        <div class="w3-twothird w3-center">
          <img class="feat_img" src="{{ URL::asset('img/pc1.png') }}">
        </div>
        <div class="w3-third">
          <p class="feat_intro1" style="color: #f8981d">Sekarang, Anda dapat melakukan apa yang Anda butuhkan dalam satu aplikasi!</p><br>
          <div class="w3-text-white">
            <label class="feat_intro2"><b> Search Data </b><br class="w3-hide-large w3-hide-medium">
              <p class="w3-hide-small">Tersedia semua data tentang Depok.</p>
            </label>
            <label class="feat_intro2"><b> Faskes </b><br class="w3-hide-large w3-hide-medium">
              <p class="w3-hide-small">Pelayanan, pendaftaran fasilitas kesehatan, diagnosa dan ensiklopedi penyakit.</p>
            </label>
            <label class="feat_intro2"><b> Volunteer </b><br class="w3-hide-large w3-hide-medium">
              <p class="w3-hide-small">Pendaftaran relawan untuk warga Depok.</p>
            </label>
            <label class="feat_intro2"><b> Ruang Publik </b><br class="w3-hide-large w3-hide-medium">
              <p class="w3-hide-small">Pendaftaran  pemakaian ruang publik dan NTPD.</p>
            </label>
            <label class="feat_intro2"><b> Karya Warga Depok </b><br class="w3-hide-large w3-hide-medium">
              <p class="w3-hide-small"> Seluruh karya warga Depok.</p>
            </label>
            <label class="feat_intro2"><b> Portal Berita </b><br class="w3-hide-large w3-hide-medium">
              <p class="w3-hide-small">Informasi dan kejadian di Kota Depok.</p>
            </label>
          </div>
        </div>
      </div>
      <div class="w3-display-bottommiddle f_nav2" style="bottom: 2%;color:#f8981d;"> Didukung oleh 
        <img src="{{ URL::asset('img/logodepok.png') }}" style="width: 16px; height: 20px;">
        <img src="{{ URL::asset('img/depokfriendly_fontPutih.png')}}" style="width: 45px; height: 20px;">
        <img src="{{ URL::asset('img/logoopendata.png')}}" style="width: 25px; height: 25px;">
      </div>
    </div>
      
    <!-- About -->
    <div class="page page4">
      <div class="w3-display-middle">
        <div class="about_isi w3-text-white">
          <div class="about"> TENTANG </div>
          <p class="w3-justify tagline fresponsive"> Berkembang sejak tahun 2017 oleh komunitas, aplikasi yang berkembang dan bertujuan untuk melayani kebutuhan publik Kota Depok. Hi-Depok kini tumbuh menjadi aplikasi pendukung smart city Kota Depok dalam berbagai aspek pelayanan. Aplikasi ini didukung oleh :</p><br> 
          <div class="w3-center">
            <img class="sponsor1" src="{{ URL::asset('img/logodepok.png')}}">
            <img class="sponsor2" src="{{ URL::asset('img/depokfriendly_fontPutih.png')}}">
            <img class="sponsor3" src="{{ URL::asset('img/logoopendata.png')}}">
          </div><br>
          <button onclick="document.getElementById('id01').style.display='block'" class="w3-btn w3-black w3-border w3-border-black w3-round-large tagline fresponsive" style="padding: 0px 16px;">Kritik dan Saran</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Nav Responsive -->
  <div class="nav-panel w3-hide-large">
    <nav>
      <ul>
        <li data-target="1" class="nav-btn nav-page1 active"></li>
        <li data-target="2" class="nav-btn nav-page2"></li>
        <li data-target="3" class="nav-btn nav-page3"></li>
        <li data-target="4" class="nav-btn nav-page4"></li>
      </ul>
    </nav>
  </div>

  <!-- Modal Complaint -->
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-4 w3-border w3-round-large">
      <div class="w3-border w3-round-large w3-white">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-display-topright w3-hover-text-black" style="color: white; margin-top: 7px; font-size: 15pt; background-color: transparent;padding: 8px 16px;text-decoration: none; cursor: pointer;">&times;</span>
        <div class="w3-container w3-text-white" style="background: #f8981d">
          <h2 class="about w3-center w3-text-white">KRITIK DAN SARAN</h2>
        </div>
        <div class="w3-container" style="padding: 20px 48px;">
        {!! Form::open(['action' => 'ComplainController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
          <p class="complaint">
            <label>Nama</label>
            <input class="w3-input" type="text" name="nama"><br>
            <label>NIK</label>
            <input class="w3-input" type="text" name="nik"><br>
            <label>Asal (Instansi/Alamat)</label>
            <input class="w3-input" type="text" name="asal"><br>
            <label>Kritik dan Saran</label>
            <input class="w3-input" type="text" name="pesan"><br><br>
          </p>
          <input class="f_bold w3-container w3-button w3-padding w3-medium w3-text-white" style="width: 100%; background: #f8981d" type="submit" value="Kirim"></input>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>

  <div id="id02" class="w3-modal" style="display: block;">
    <div class="w3-display-topmiddle modal_subs w3-border w3-round-large w3-animate-top w3-card-4" style="animation: animatetop 8s;">
        <p class="f_reg w3-justify">Apakah Anda ingin berlangganan aplikasi Hi-Depok? Untuk mendapatkan informasi Kota Depok lebih banyak lagi. Klik tombol Subscribe di bawah ini ya.</p><br>
        <center>
        <button class="f_reg w3-button w3-black w3-border w3-round-large w3-border-white"> Subscribe</button>
        <button class="f_reg w3-button w3-black w3-border w3-round-large w3-border-white" onclick="document.getElementById('id02').style.display='none'"> Cancel </button>
        </center>
    </div>
  </div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js'></script>
  <script  src="{{ URL::asset('js/parallax2.js') }}"></script>
  <script  src="{{ URL::asset('js/loader.js') }}"></script>
  <script src="{{ URL::asset('js/nav.js') }}"></script>
  <script src="{{ URL::asset('js/news2.js') }}"></script>

  <!-- <script src="{{ URL::asset('js/notification.js') }}"></script> -->

</body>
</html>