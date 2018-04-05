<!DOCTYPE html>
<html>
<head>
  <meta content="text/html; charset=utf-8">
  <title>Hi-Depok</title>
  <link rel="shortcut icon" href="{{ URL::asset('img/logo.png') }}">
  <script type="text/javascript" src="http://yandex.st/jquery/2.0.3/jquery.min.js"></script>
  <script type="text/javascript" src="{{ URL::asset('js/UIPageScrolling.js') }}"></script>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ URL::asset('css/scroll_down.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/style2.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/card.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/effect.css') }}">
  <script>
    $(function() {
      $(".main").UIPageScrolling({
        sectionsControl:".page-control__item",
        captureTouch: true
      });
    })
  </script>
  <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ URL::asset('css/UIPageScrolling.css') }}" type="text/css">
</head>
<body class="page">
  <!-- Navbar -->
    <div class="w3-top">
      <div class="w3-bar w3-padding-16" id="myNavbar" style="margin: 0 8em">
        <a href="#">
          <img src="{{ URL::asset('img/minilogo.png') }}" style="width:50px; height:50px">
          <div class="f_bold w3-text-white w3-display-left w3-xlarge" style="margin-left:5em">HI-DEPOK</div>
        </a>
        <!-- <div class="f_bold w3-display-middle w3-medium">
          <a href="#page1" class="w3-bar-item w3-hide-small w3-text-white w3-hover-text-blue" style="text-decoration:none"> INTRODUCTION </a>
          <a href="#page2" class="w3-bar-item w3-hide-small w3-text-white w3-hover-text-blue" style="text-decoration:none"> NEWS </a>
          <a href="#page3" class="w3-bar-item w3-hide-small w3-text-white w3-hover-text-blue" style="text-decoration:none"> FEATURES </a>
          <a href="#page4" class="w3-bar-item w3-hide-small w3-text-white w3-hover-text-blue" style="text-decoration:none"> ABOUT </a>
        </div> -->
        <div onclick="openNav()" class="w3-bar-item w3-text-white w3-display-right w3-hover-text-blue" style="margin-right:1.5em; cursor:pointer">
          <i class="fa fa-bars w3-xxlarge"></i>
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
        <a href="#" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">HOME</a>
        <a href="/information" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">INFORMATION</a>
        <a href="/maps" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">MAPS</a>
        <a href="/blog" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">BLOG</a>
        <a href="/event" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">EVENT</a>
        <a href="#" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">OPEN DATA</a>
        <a href="/faq" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">FAQ</a>
      </div>
      <div class="w3-display-bottommiddle w3-medium" style="margin-bottom:2em">
        design by <a class="w3-text-blue" href="http://www.tireg-dev.com" style="text-decoration:none;"><b> Tireg Dev </b></a> <img src="{{ URL::asset('img/tireg_wh.png') }}" style="width:30px; height:30px">
      </div>
    </nav>

  <div class="main">
    <section class="slider">
      <input name="control" id="page1" type="radio" checked/>
      <input name="control" id="page2" type="radio"/>
      <input name="control" id="page3" type="radio"/>
      <input name="control" id="page4" type="radio"/>
      <div class="slider--el slider--el-1 anim-4parts">
        <div class="slider--el-bg">
          <div class="part top left"></div>
          <div class="part top right"></div>
          <div class="part bot left"></div>
          <div class="part bot right"></div>
        </div>
        <div class="slider--el-content">
          <div class="f_bold w3-display-topmiddle w3-medium w3-padding-32">
          <label class="w3-bar-item w3-hide-small w3-text-white w3-hover-text-blue w3-bottombar w3-border-white"> INTRODUCTION </label>
          <label class="w3-bar-item w3-hide-small w3-text-white w3-hover-text-blue" style="margin: 32px 2em;"> NEWS </label>
          <label class="w3-bar-item w3-hide-small w3-text-white w3-hover-text-blue" style="margin-right: 2em;"> FEATURES </label>
          <label class="w3-bar-item w3-hide-small w3-text-white w3-hover-text-blue"> ABOUT </label>
          </div>
          <div class="w3-center w3-text-white w3-display-middle" style="position: relative; text-align: center;z-index: 99;">
            <p class="ftag" style="font-size:80pt; margin:0px 0px"> We Share We Care </p>
            <hr style="    margin: -25px 150px 20px 150px;">
            <p class="f_reg w3-large" style="margin: 0px 230px;">
            Hi-Depok merupakan wujud peningkatan pelayanan pemerintah Kota Depok kepada warganya. Aplikasi ini dapat membantu warga Kota Depok dalam berbagai aspek pelayanan seperti pelayanan kesehatan, keamanan, sosial dan juga kebutuhan akan informasi.
          </p>
          </div>
        </div>
      </div>
      <div class="slider--el slider--el-2 anim-9parts">
        <div class="slider--el-bg">
          <div class="part left-top"></div>
          <div class="part mid-top"></div>
          <div class="part right-top"></div>
          <div class="part left-mid"></div>
          <div class="part mid-mid"></div>
          <div class="part right-mid"></div>
          <div class="part left-bot"></div>
          <div class="part mid-bot"></div>
          <div class="part right-bot"></div>
        </div>
        <div class="slider--el-content">
          <div class="f_bold w3-display-topmiddle w3-medium w3-padding-32">
          <label class="w3-bar-item w3-hide-small w3-text-white w3-hover-text-blue"> INTRODUCTION </label>
          <label class="w3-bar-item w3-hide-small w3-text-white w3-hover-text-blue w3-bottombar w3-border-white" style="margin: 32px 2em;"> NEWS </label>
          <label class="w3-bar-item w3-hide-small w3-text-white w3-hover-text-blue" style="margin-right: 2em;"> FEATURES </label>
          <label class="w3-bar-item w3-hide-small w3-text-white w3-hover-text-blue"> ABOUT </label>
          </div>
          <div class="w3-display-middle">
            <div class="w3-content" style="max-width:1100px">
            @foreach($beritas as $berita)
              <div class="mySlides w3-card-4 w3-round-large w3-black w3-animate-fading" style="border: 5px solid #f8981d; padding: 4em; opacity:0.7;">
                <h3><b>{{ $berita->get_title() }}</b></h3>
                <p class="w3-justify w3-medium">{!! $berita->get_description() !!}</p>
                <p class="w3-medium"><a href="{{ $berita->get_permalink() }}" style="text-decoration: none;" class="w3-medium"><br><button class="w3-button w3-padding-large w3-gray"><b>READ MORE</b></button></a></p>
              </div>
            @endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="slider--el slider--el-3 anim-5parts">
        <div class="slider--el-bg">
          <div class="part part-1"></div>
          <div class="part part-2"></div>
          <div class="part part-3"></div>
          <div class="part part-4"></div>
          <div class="part part-5"></div>
        </div>
        <div class="slider--el-content" style="padding: 0">
          <div class="f_bold w3-display-topmiddle w3-medium w3-padding-32">
          <label class="w3-bar-item w3-hide-small w3-text-white w3-hover-text-blue"> INTRODUCTION </label>
          <label class="w3-bar-item w3-hide-small w3-text-white w3-hover-text-blue" style="margin: 32px 2em;"> NEWS </label>
          <label class="w3-bar-item w3-hide-small w3-text-white w3-hover-text-blue w3-bottombar w3-border-white" style="margin-right: 2em;"> FEATURES </label>
          <label class="w3-bar-item w3-hide-small w3-text-white w3-hover-text-blue"> ABOUT </label>
          </div>
          <div style="position: absolute;top: 50%;transform: translate(12%,-50%);">
        <div class="w3-row w3-padding-64" id="about">
          <div class="w3-col m6 w3-padding-large w3-hide-small">
            <img src="{{ URL::asset('img/pc1.png') }}" style="width:100%">
          </div>
          <div class="w3-col m6 w3-padding-large w3-text-white" style="width: 25.99999%;">
            <p class="w3-xlarge" style="color: #f8981d">Now, you can do what you need in one application!</p><br>
            <div class="w3-row">
              <div class="w3-col" style="width:50px;">
                <div class="w3-button w3-left w3-hide-medium w3-hide-small w3-circle w3-margin-right w3-text-white w3-medium" style="width:35px; height:35px; background: #f8981d">1</div>
                <div class="w3-button w3-left w3-hide-medium w3-hide-small w3-circle w3-margin-right w3-text-white w3-medium" style="width:35px; height:35px; background: #f8981d; margin-top: 12px">2</div>
                <div class="w3-button w3-left w3-hide-medium w3-hide-small w3-circle w3-margin-right w3-text-white w3-medium" style="width:35px; height:35px; background: #f8981d; margin-top: 30px">3</div>
                <div class="w3-button w3-left w3-hide-medium w3-hide-small w3-circle w3-margin-right w3-text-white w3-medium" style="width:35px; height:35px; background: #f8981d; margin-top: 12px">4</div>
                <div class="w3-button w3-left w3-hide-medium w3-hide-small w3-circle w3-margin-right w3-text-white w3-medium" style="width:35px; height:35px; background: #f8981d; margin-top: 30px">5</div>
                <div class="w3-button w3-left w3-hide-medium w3-hide-small w3-circle w3-margin-right w3-text-white w3-medium" style="width:35px; height:35px; background: #f8981d; margin-top: 12px">6</div>
              </div>
              <div class="w3-rest">
                <p class="w3-medium"><b> Search Data </b><br style="margin-left:4em"> Tersedia semua data tentang Depok.</p>
                <p class="w3-medium"><b> Faskes </b><br style="margin-left:4em"> Pelayanan, pendaftaran fasilitas kesehatan, diagnosa dan ensiklopedi penyakit.</p>
                <p class="w3-medium"><b> Volunteer </b><br style="margin-left:4em"> Pendaftaran relawan untuk warga Depok.</p>
                <p class="w3-medium"><b> Ruang Publik </b><br style="margin-left:4em"> Pendaftaran  pemakaian ruang publik dan NTPD.</p>
                <p class="w3-medium"><b> Karya Warga Depok </b><br style="margin-left:4em"> Seluruh karya warga Depok.</p>
                <p class="w3-medium"><b> Portal Berita </b><br style="margin-left:4em"> Informasi dan kejadian di Kota Depok.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
        </div>
      </div>
      <div class="slider--el slider--el-4 anim-3parts">
        <div class="slider--el-bg">
          <div class="part left"></div>
          <div class="part mid"></div>
          <div class="part right"></div>
        </div>
        <div class="slider--el-content w3-display-container">
          <div class="f_bold w3-display-topmiddle w3-medium w3-padding-32">
          <label class="w3-bar-item w3-hide-small w3-text-white w3-hover-text-blue"> INTRODUCTION </label>
          <label class="w3-bar-item w3-hide-small w3-text-white w3-hover-text-blue" style="margin: 32px 2em;"> NEWS </label>
          <label class="w3-bar-item w3-hide-small w3-text-white w3-hover-text-blue" style="margin-right: 2em;"> FEATURES </label>
          <label class="w3-bar-item w3-hide-small w3-text-white w3-hover-text-blue w3-bottombar w3-border-white"> ABOUT </label>
          </div>
          <div class=
          <div class="w3-row">
            <div class="w3-third">
              <div class="w3-border w3-round-large w3-white w3-opacity">
                <div class="w3-container w3-text-white" style="background: #f8981d">
                  <h2 class="f_bold w3-center">COMPLAINT</h2>
                </div>
                <div class="w3-container" style="padding: 20px 48px;">
                {!! Form::open(['action' => 'ComplainController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                  <p class="f_reg w3-medium">
                    <label>Nama</label>
                    <input class="w3-input" type="text" name="nama"><br>
                    <label>NIK</label>
                    <input class="w3-input" type="text" name="nik"><br>
                    <label>Asal (Instansi/Alamat)</label>
                    <input class="w3-input" type="text" name="asal"><br>
                    <label>Kritik dan Saran</label>
                    <input class="w3-input" type="text" name="pesan">
                  </p>
                <input class="f_bold w3-container w3-button w3-padding w3-medium w3-text-white" style="width: 100%; background: #f8981d" type="submit" value="Submit">
                </input>
                  {!! Form::close() !!}
                </div>
              </div>
            </div>
            <div class="w3-twothird w3-text-white">
              <div style="margin-left: 100px">
                <h1 class="f_bold w3-jumbo"> ABOUT </h1>
                <p class="w3-medium w3-justify" style="line-height: 2em;"> Berkembang sejak tahun 2017 oleh komunitas, aplikasi yang berkembang dan bertujuan untuk melayani kebutuhan publik Kota Depok. Hi-Depok kini tumbuh menjadi aplikasi pendukung smart city Kota Depok dalam berbagai aspek pelayanan. Aplikasi ini di dukung oleh :</p><br>
                <div class="w3-padding-16">
                <img src="{{ URL::asset('img/depok.png')}}" style="width: 60px; height: 75px">
                <img src="{{ URL::asset('img/depokfriendly_fontPutih.png')}}" style="width: 135px; height: 55px;margin: 1.5em 1em 0 4em;">
                <img src="{{ URL::asset('img/logoopendata.png')}}" style="width: 90px; height: 75px">
                </div>
                <hr style="width:300px;margin: 40px 0 0;">
                <p class="w3-medium w3-text-white">Copyright © 2017 by <a href="http://www.tireg-dev.com" style="color:#f8981d; text-decoration:none;"><b> Tireg Dev </b></a> <img src="{{ URL::asset('img/tireg_wh.png') }}" style="width:30px; height:30px"> 
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="slider--control left">
        <label class="page1-left" for="page1"></label> 
        <label class="page2-left" for="page2"></label> 
        <label class="page3-left" for="page3"></label>
        <label class="page4-left" for="page4"></label> <i class="fa fa-arrow-left w3-large w3-text-white" style="padding: 10px 11.8px;"> </i>
      </div>
      <div class="slider--control right">
        <label class="page1-right" for="page1"></label>
        <label class="page2-right" for="page2"></label>
        <label class="page3-right" for="page3"></label> 
        <label class="page4-right" for="page4"></label> <i class="fa fa-arrow-right w3-large w3-text-white" style="padding: 10px 13px;"> </i>
      </div>
    </section>

    <!-- <section class="bg1 w3-display-container" id="introduction">
      <a href="#news" class="scroll w3-display-bottommiddle" style="margin-bottom:2em"><span></span></a>
      <div class="w3-center w3-text-white w3-display-middle" style="">
        <p class="ftag" style="font-size:80pt; margin:0px 0px"> We Share We Care </p>
        <p class="f_reg w3-large" style="margin:0px 0px;">
        Layanan Pemerintah Kota Depok dalam Berbagai Bidang untuk Masyarakat
      </p>
      </div>
    </section>


    <section class="w3-display-container" id="news" style="background-position: center;background-repeat: no-repeat;background-size: cover; background-image: url('img/bg2.jpg'); ">
      <div class="w3-display-middle">
      <div class="w3-content" style="max-width:1100px">
      @foreach($beritas as $berita)
        <div class="mySlides w3-card-4 w3-round-large w3-black w3-animate-fading" style="border: 5px solid orange; padding: 4em; opacity:0.7;">
          <h3><b>{{ $berita->get_title() }}</b></h3>
          <p class="w3-justify">{!! $berita->get_description() !!}</p>
          <p><a href="{{ $berita->get_permalink() }}" style="text-decoration: none;"><button class="w3-button w3-padding-large w3-gray"><b>READ MORE</b></button></a></p>
        </div>
      @endforeach
      </div>
      </div>
      <a href="#features" class="scroll w3-display-bottommiddle" style="margin-bottom:2em"><span></span></a>
    </section> -->

    <!-- <section class="w3-display-container" id="features" style="background-position: center;background-repeat: no-repeat;background-size: cover; background-image: url('img/bg3.jpg');">
      <div style="position: absolute;top: 50%;transform: translate(12%,-50%);">
        <div class="w3-row w3-padding-64" id="about">
          <div class="w3-col m6 w3-padding-large w3-hide-small">
            <img src="{{ URL::asset('img/pc.png') }}" style="width:100%">
          </div>
          <div class="w3-col m6 w3-padding-large w3-text-white" style="width: 25.99999%;">
            <p class="w3-xlarge w3-text-cyan">Now, you can doing what you need in one application!</p>
            <div class="w3-button w3-left w3-circle w3-margin-right w3-cyan w3-text-white" style="width:35px; height:35px">1</div>
            <p><b> Search Data </b><br style="margin-left:4em"> Tersedia semua data tentang Depok.</p>
            <div class="w3-button w3-left w3-circle w3-margin-right w3-cyan w3-text-white" style="width:35px; height:35px">2</div>
            <p><b> Kesehatan </b><br style="margin-left:4em"> Diagnosa, ensiklopedia, dan pendaftaran RSUD.</p>
            <div class="w3-button w3-left w3-circle w3-margin-right w3-cyan w3-text-white" style="width:35px; height:35px">3</div>
            <p><b> Volunteer </b><br style="margin-left:4em"> Pendaftaran relawan untuk warga Depok.</p>
            <div class="w3-button w3-left w3-circle w3-margin-right w3-cyan w3-text-white" style="width:35px; height:35px">4</div>
            <p><b> Ruang Publik </b><br style="margin-left:4em"> Pendaftaran  pemakaian ruang publik dan NTPD.</p>
            <div class="w3-button w3-left w3-circle w3-margin-right w3-cyan w3-text-white" style="width:35px; height:35px">5</div>
            <p><b> Karya Anak Depok </b><br style="margin-left:4em"> Seluruh karya anak Depok.</p>
            <div class="w3-button w3-left w3-circle w3-margin-right w3-cyan w3-text-white" style="width:35px; height:35px">6</div>
            <p><b> Portal Berita </b><br style="margin-left:4em"> Informasi dan kejadian di Kota Depok.</p>
          </div>
        </div>
      </div>
      <a href="#about" class="scroll w3-display-bottommiddle" style="margin-bottom:2em"><span></span></a>
    </section> -->
<!-- 
    <section class="w3-display-container" id="about" style="background-position: center;background-repeat: no-repeat;background-size: cover; background-image: url('img/bg4.png');">
      
    </section> -->
  </div>
  <script src="{{ URL::asset('js/index.js') }}"></script>
  <script src="{{ URL::asset('js/effect.js') }}"></script>
  <script src="{{ URL::asset('js/nav.js') }}"></script>
  <script src="{{ URL::asset('js/slide.js') }}"></script>
</body>
</html>