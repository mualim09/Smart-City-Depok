<!DOCTYPE html>
<html>
<head>
<title>Maps | Hi-Depok</title>
<link rel="shortcut icon" href="{{ URL::asset('img/logoopendata.png') }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
  @font-face {
    font-family: "Brandon_Grotesque_bold";
    src: url(../assets/font/Brandon_blk.otf);}

  @font-face {
    font-family: "Brandon_Grotesque_reg";
    src: url(../assets/font/Brandon_reg.otf);}

  .f_bold {
    font-family: "Brandon_Grotesque_bold";
  }

  .checkbox {
    position: relative;
    margin: 0 10px 0 0;
    cursor: pointer;
  }
  .checkbox:before {
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    content: "";
    position: absolute;
    left: 0;
    z-index: 1;
    width: 1rem;
    height: 1rem;
    border: 2px solid #d0cece;
  }
  .checkbox:checked:before {
    -webkit-transform: rotate(-45deg);
    -moz-transform: rotate(-45deg);
    -ms-transform: rotate(-45deg);
    -o-transform: rotate(-45deg);
    transform: rotate(-45deg);
    height: .5rem;
    border-color: #009688;
    border-top-style: none;
    border-right-style: none;
  }
  .checkbox:after {
    content: "";
    position: absolute;
    top: -0.125rem;
    left: 0;
    width: 1.1rem;
    height: 1.1rem;
    background: #fff;
    cursor: pointer;
  }
  .scrollbar {
    float: left;
    height: 300px;
    overflow-y: auto;
  }

  .style-7::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
  }
  .style-7::-webkit-scrollbar {
    width: 6px;
    background-color: #F5F5F5;
  }

  .style-7::-webkit-scrollbar-thumb {
    background-image: -webkit-gradient(linear,
                       left bottom,
                       left top,
                       color-stop(0.44, rgb(122,153,217)),
                       color-stop(0.72, rgb(73,125,189)),
                       color-stop(0.86, rgb(28,58,148)));
  }

  .f_reg {
    font-family: "Brandon_Grotesque_reg";
  }

  #map-canvas {
    position: absolute;
    height: 100%;
    width: 100%;
    background-color: grey;
  }

#map-canvas img {
  max-width: none !important;
}
/*.gm-style-iw {
  width: 350px !important;
  top: 15px !important;
  left: 0px !important;
  background-color: #fff;
  box-shadow: 0 1px 6px rgba(178, 178, 178, 0.6);
  border: 1px solid rgba(72, 181, 233, 0.6);
  border-radius: 2px 2px 10px 10px;
}*/

.scrollFix {
    line-height: 1.35;
    overflow: hidden;
    white-space: nowrap;
  }

#iw-container {
  margin-bottom: 10px;
}
#iw-container .iw-title {
  font-family: 'Open Sans Condensed', sans-serif;
  font-size: 22px;
  font-weight: 400;
  padding: 10px;
  background-color: #5684c4;
  color: white;
  margin: 0;
  border-radius: 2px 2px 0 0;
}
#iw-container .iw-content {
  position: relative;
  font-size: 13px;
  line-height: 18px;
  font-weight: 400;
  margin-right: 1px;
  padding: 15px 5px 20px 15px;
  max-height: 170px;
  overflow-y: auto;
  overflow-x: hidden;
  background-color: #fff;
  box-shadow: 0 1px 6px rgba(178, 178, 178, 0.6);
  border: 1px solid rgba(72, 181, 233, 0.6);
  border-radius: 2px 2px 10px 10px;
}
.iw-content img {
  float: right;
  margin: 0 5px 5px 10px;
}
.iw-subTitle {
  font-size: 16px;
  font-weight: 700;
  padding: 5px 0;
}
.iw-bottom-gradient {
  position: absolute;
  width: 326px;
  height: 25px;
  bottom: 10px;
  right: 18px;
  background: linear-gradient(to bottom, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
  background: -webkit-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
  background: -moz-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
  background: -ms-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
}
  
  .w3-check {
    width: 15px;
    height: 18px;
  }
  .responsive {
    top: 100%; 
    right: 1%; 
    width:500px;
    height:560px;
    white-space: nowrap; 
    border: 1px #4083c0 solid; 
    font-size: 13.6px!important;
  }
  .float-btn {
    width: 65px; 
    height: 65px; 
    font-size: 16.5pt;
  }
  @media only screen and (max-width: 500px) {
    .responsive {
      width: 100%;
      height: 350px;
      font-size: 11px!important;
    }
    .float-btn {
      width: 50px; 
      height: 50px; 
      font-size: 14.5pt;
    }
  }
</style>
</head>
<body>
<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar">
    <a href="/" class="w3-hide-small w3-bar-item w3-border w3-border-blue-gray w3-white" style="border-radius: 0px 25px 25px 0px; padding:0.2em 1.3em; padding-right:2em;  border:8px solid #1e335a; margin-top:0.5em">
      <img src="{{ URL::asset('img/logood.png') }}" style="width:180px; height:70px;">
    </a>
    <div class="w3-right w3-padding-16" style="margin-right:0.5em;letter-spacing:1px">
      <div class="w3-bar-item w3-large">
        <button class="w3-btn float-btn w3-circle w3-green w3-text-white" id="all" onclick="hapus()"><i class="fa fa-refresh w3-hover-opacity"></i></button>
        <button onclick="dropdown()" class="w3-btn float-btn w3-circle w3-blue-gray w3-text-white"><i class="fa fa-bars w3-hover-opacity"></i></button>
        <a href="/"><button class="w3-btn float-btn w3-circle w3-orange w3-text-white"><i class="fa fa-home w3-hover-opacity"></i></button></a>
      </div>
    </div>
  </div>
<!--   <div id="erase">
    <p>Data berhasil di hapus</p>
  </div> -->

  <!-- Data -->
  <div id="dropdown1" class="responsive scrollbar style-7 w3-dropdown-content w3-bar-block w3-card-4 w3-animate-zoom">
    <div class="w3-bar">
      <a id="myBtn" onclick="myFunc('Demo7')" href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom" style="padding: 12px 1.5em;"><i class="fa fa-map-signs w3-medium" style="margin-right: 7px;"></i> Batas Administrasi</a>
      <div id="Demo7" class="w3-hide w3-animate-left w3-text-gray" style="padding: 5px 2em 1em; border-bottom: 1px solid #ccc;">
        <input type="checkbox" class="checkbox" id="kec" onclick="camat()"> Kantor Kecamatan <br>
        <input type="checkbox" class="checkbox" id="cam" onclick="petacam()"> Peta Kecamatan <br>
        <div id="pet">
        <select class="w3-select" id="search-string_0" onchange="changeMap_0(this.value);">
          <option value="--Select--">Cari Kecamatan</option>
          <option value="BEJI">BEJI</option>
          <option value="BOJONGSARI">BOJONGSARI</option>
          <option value="CILODONG">CILODONG</option>
          <option value="CIMANGGIS">CIMANGGIS</option>
          <option value="CINERE">CINERE</option>
          <option value="CIPAYUNG">CIPAYUNG</option>
          <option value="LIMO">LIMO</option>
          <option value="PANCORAN MAS">PANCORAN MAS</option>
          <option value="SAWANGAN">SAWANGAN</option>
          <option value="SUKMA JAYA">SUKMA JAYA</option>
          <option value="TAPOS">TAPOS</option>
        </select><br><br>
        </div>
        <input type="checkbox" class="checkbox" id="kel" onclick="klrhn()"> Kantor Kelurahan <br>
        <input type="checkbox" class="checkbox" id="semuakel" onclick="semua()"> Peta Kelurahan <br>
        <div id="lur">
          <select class="w3-select" id="search-string_1" onchange="changeMap_1(this.value);">
            <option value="--Select--">Cari Kelurahan</option>
            <option value="ABADIJAYA">ABADIJAYA</option>
            <option value="BAKTI JAYA">BAKTI JAYA</option>
            <option value="BEDAHAN">BEDAHAN</option>
            <option value="BEJI">BEJI</option>
            <option value="BEJI TIMUR">BEJI TIMUR</option>
            <option value="BOJONG PONDOK TERONG">BOJONG PONDOK TERONG</option>
            <option value="BOJONGSARI BARU">BOJONGSARI BARU</option>
            <option value="BOJONGSARI LAMA">BOJONGSARI LAMA</option>
            <option value="CILANGKAP">CILANGKAP</option>
            <option value="CILODONG">CILODONG</option>
            <option value="CIMPAEUN">CIMPAEUN</option>
            <option value="CINANGKA">CINANGKA</option>
            <option value="CINERE">CINERE</option>
            <option value="CIPAYUNG">CIPAYUNG</option>
            <option value="CIPAYUNG JAYA">CIPAYUNG JAYA</option>
            <option value="CISALAK">CISALAK</option>
            <option value="CISALAK PASAR">CISALAK PASAR</option>
            <option value="CURUG">CURUG</option>
            <option value="DEPOK">DEPOK</option>
            <option value="DEPOK JAYA">DEPOK JAYA</option>
            <option value="DUREN MEKAR">DUREN MEKAR</option>
            <option value="DUREN SERIBU">DUREN SERIBU</option>
            <option value="GANDUL">GANDUL</option>
            <option value="GROGOL">GROGOL</option>
            <option value="HARJAMUKTI">HARJAMUKTI</option>
            <option value="JATIJAJAR">JATIJAJAR</option>
            <option value="JATIMULYA">JATIMULYA</option>
            <option value="KALIBARU">KALIBARU</option>
            <option value="KALIMULYA">KALIMULYA</option>
            <option value="KEDAUNG">KEDAUNG</option>
            <option value="KEMIRIMUKA">KEMIRIMUKA</option>
            <option value="KRUKUT">KRUKUT</option>
            <option value="KUKUSAN">KUKUSAN</option>
            <option value="LEUWINAGGUNG">LEUWINAGGUNG</option>
            <option value="LIMO">LIMO</option>
            <option value="MAMPANG">MAMPANG</option>
            <option value="MEKAR JAYA">MEKAR JAYA</option>
            <option value="MEKARSARI">MEKARSARI</option>
            <option value="MERUYUNG">MERUYUNG</option>
            <option value="PANCORAN MAS">PANCORAN MAS</option>
            <option value="PANGKALANJATI">PANGKALANJATI</option>
            <option value="PANGKALANJATI BARU">PANGKALANJATI BARU</option>
            <option value="PASIR GUNUNG SELATAN">PASIR GUNUNG SELATAN</option>
            <option value="PASIR PUTIH">PASIR PUTIH</option>
            <option value="PENGASINAN">PENGASINAN</option>
            <option value="PONDOK CINA">PONDOK CINA</option>
            <option value="PONDOK JAYA">PONDOK JAYA</option>
            <option value="PONDOK PETIR">PONDOK PETIR</option>
            <option value="RANGKAPAN JAYA">RANGKAPAN JAYA</option>
            <option value="RANGKAPAN JAYA BARU">RANGKAPAN JAYA BARU</option>
            <option value="RATUJAYA">RATUJAYA</option>
            <option value="SAWANGAN BARU">SAWANGAN BARU</option>
            <option value="SAWANGAN LAMA">SAWANGAN LAMA</option>
            <option value="SERUA">SERUA</option>
            <option value="SUKAMAJU">SUKAMAJU</option>
            <option value="SUKAMAJU BARU">SUKAMAJU BARU</option>
            <option value="SUKATANI">SUKATANI</option>
            <option value="SUKMAJAYA">SUKMAJAYA</option>
            <option value="TANAH BARU">TANAH BARU</option>
            <option value="TAPOS">TAPOS</option>
            <option value="TIRTAJAYA">TIRTAJAYA</option>
            <option value="TUGU">TUGU</option>
          </select>
        </div>
      </div>

      <a id="myBtn" onclick="myFunc('Demo8')" href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom" style="padding: 12px 1.5em;"><i class="fa fa-line-chart w3-medium" style="margin-right: 7px;"></i> Kemiskinan Publik </a>
        <div id="Demo8" class="w3-hide w3-animate-left w3-text-gray" style="padding: 5px 2em 1em; border-bottom: 1px solid #ccc;">
        <input type="checkbox" class="checkbox" id="krt" onclick="miskin()"> Angka Status Kesejahteraan Rumah Tangga <br>
        <div id="kemis">
          <select class="w3-select" id="search-string_4" onchange="changeMap_4(this.value);">
          <option value="--Select--">Cari Data</option>
          <option value="ABADIJAYA">ABADIJAYA</option>
          <option value="BAKTI JAYA">BAKTI JAYA</option>
          <option value="BEDAHAN">BEDAHAN</option>
          <option value="BEJI">BEJI</option>
          <option value="BEJI TIMUR">BEJI TIMUR</option>
          <option value="BOJONG PONDOK TERONG">BOJONG PONDOK TERONG</option>
          <option value="BOJONGSARI BARU">BOJONGSARI BARU</option>
          <option value="BOJONGSARI LAMA">BOJONGSARI LAMA</option>
          <option value="CILANGKAP">CILANGKAP</option>
          <option value="CILODONG">CILODONG</option>
          <option value="CIMPAEUN">CIMPAEUN</option>
          <option value="CINANGKA">CINANGKA</option>
          <option value="CINERE">CINERE</option>
          <option value="CIPAYUNG">CIPAYUNG</option>
          <option value="CIPAYUNG JAYA">CIPAYUNG JAYA</option>
          <option value="CISALAK">CISALAK</option>
          <option value="CISALAK PASAR">CISALAK PASAR</option>
          <option value="CURUG">CURUG</option>
          <option value="DEPOK">DEPOK</option>
          <option value="DEPOK JAYA">DEPOK JAYA</option>
          <option value="DUREN MEKAR">DUREN MEKAR</option>
          <option value="DUREN SERIBU">DUREN SERIBU</option>
          <option value="GANDUL">GANDUL</option>
          <option value="GROGOL">GROGOL</option>
          <option value="HARJAMUKTI">HARJAMUKTI</option>
          <option value="JATIJAJAR">JATIJAJAR</option>
          <option value="JATIMULYA">JATIMULYA</option>
          <option value="KALIBARU">KALIBARU</option>
          <option value="KALIMULYA">KALIMULYA</option>
          <option value="KEDAUNG">KEDAUNG</option>
          <option value="KEMIRIMUKA">KEMIRIMUKA</option>
          <option value="KRUKUT">KRUKUT</option>
          <option value="KUKUSAN">KUKUSAN</option>
          <option value="LEUWINAGGUNG">LEUWINAGGUNG</option>
          <option value="LIMO">LIMO</option>
          <option value="MAMPANG">MAMPANG</option>
          <option value="MEKAR JAYA">MEKAR JAYA</option>
          <option value="MEKARSARI">MEKARSARI</option>
          <option value="MERUYUNG">MERUYUNG</option>
          <option value="PANCORAN MAS">PANCORAN MAS</option>
          <option value="PANGKALANJATI">PANGKALANJATI</option>
          <option value="PANGKALANJATI BARU">PANGKALANJATI BARU</option>
          <option value="PASIR GUNUNG SELATAN">PASIR GUNUNG SELATAN</option>
          <option value="PASIR PUTIH">PASIR PUTIH</option>
          <option value="PENGASINAN">PENGASINAN</option>
          <option value="PONDOK CINA">PONDOK CINA</option>
          <option value="PONDOK JAYA">PONDOK JAYA</option>
          <option value="PONDOK PETIR">PONDOK PETIR</option>
          <option value="RANGKAPAN JAYA">RANGKAPAN JAYA</option>
          <option value="RANGKAPAN JAYA BARU">RANGKAPAN JAYA BARU</option>
          <option value="RATUJAYA">RATUJAYA</option>
          <option value="SAWANGAN BARU">SAWANGAN BARU</option>
          <option value="SAWANGAN LAMA">SAWANGAN LAMA</option>
          <option value="SERUA">SERUA</option>
          <option value="SUKAMAJU">SUKAMAJU</option>
          <option value="SUKAMAJU BARU">SUKAMAJU BARU</option>
          <option value="SUKATANI">SUKATANI</option>
          <option value="SUKMAJAYA">SUKMAJAYA</option>
          <option value="TANAH BARU">TANAH BARU</option>
          <option value="TAPOS">TAPOS</option>
          <option value="TIRTAJAYA">TIRTAJAYA</option>
          <option value="TUGU">TUGU</option>
        </select>
        </div>
        <input type="checkbox" class="checkbox" id="ski" onclick="sendiri()"> Angka Status Kesejahteraan Individu <br>
        <div id="indi">
          <select class="w3-select" id="search-string_6" onchange="changeMap_6(this.value);">
            <option value="--Select--">Cari Data</option>
            <option value="ABADIJAYA">ABADIJAYA</option>
            <option value="BAKTI JAYA">BAKTI JAYA</option>
            <option value="BEDAHAN">BEDAHAN</option>
            <option value="BEJI">BEJI</option>
            <option value="BEJI TIMUR">BEJI TIMUR</option>
            <option value="BOJONG PONDOK TERONG">BOJONG PONDOK TERONG</option>
            <option value="BOJONGSARI BARU">BOJONGSARI BARU</option>
            <option value="BOJONGSARI LAMA">BOJONGSARI LAMA</option>
            <option value="CILANGKAP">CILANGKAP</option>
            <option value="CILODONG">CILODONG</option>
            <option value="CIMPAEUN">CIMPAEUN</option>
            <option value="CINANGKA">CINANGKA</option>
            <option value="CINERE">CINERE</option>
            <option value="CIPAYUNG">CIPAYUNG</option>
            <option value="CIPAYUNG JAYA">CIPAYUNG JAYA</option>
            <option value="CISALAK">CISALAK</option>
            <option value="CISALAK PASAR">CISALAK PASAR</option>
            <option value="CURUG">CURUG</option>
            <option value="DEPOK">DEPOK</option>
            <option value="DEPOK JAYA">DEPOK JAYA</option>
            <option value="DUREN MEKAR">DUREN MEKAR</option>
            <option value="DUREN SERIBU">DUREN SERIBU</option>
            <option value="GANDUL">GANDUL</option>
            <option value="GROGOL">GROGOL</option>
            <option value="HARJAMUKTI">HARJAMUKTI</option>
            <option value="JATIJAJAR">JATIJAJAR</option>
            <option value="JATIMULYA">JATIMULYA</option>
            <option value="KALIBARU">KALIBARU</option>
            <option value="KALIMULYA">KALIMULYA</option>
            <option value="KEDAUNG">KEDAUNG</option>
            <option value="KEMIRI MUKA">KEMIRI MUKA</option>
            <option value="KRUKUT">KRUKUT</option>
            <option value="KUKUSAN">KUKUSAN</option>
            <option value="LEUWINANGGUNG">LEUWINANGGUNG</option>
            <option value="LIMO">LIMO</option>
            <option value="MAMPANG">MAMPANG</option>
            <option value="MEKAR JAYA">MEKAR JAYA</option>
            <option value="MEKARSARI">MEKARSARI</option>
            <option value="MERUYUNG">MERUYUNG</option>
            <option value="PANCORAN MAS">PANCORAN MAS</option>
            <option value="PANGKALAN JATI">PANGKALAN JATI</option>
            <option value="PANGKALAN JATI BARU">PANGKALAN JATI BARU</option>
            <option value="PASIR GUNUNG SELATAN">PASIR GUNUNG SELATAN</option>
            <option value="PASIR PUTIH">PASIR PUTIH</option>
            <option value="PENGASINAN">PENGASINAN</option>
            <option value="PONDOK CINA">PONDOK CINA</option>
            <option value="PONDOK JAYA">PONDOK JAYA</option>
            <option value="PONDOK PETIR">PONDOK PETIR</option>
            <option value="RANGKAPAN JAYA">RANGKAPAN JAYA</option>
            <option value="RANGKAPAN JAYA BARU">RANGKAPAN JAYA BARU</option>
            <option value="RATU JAYA">RATU JAYA</option>
            <option value="SAWANGAN BARU">SAWANGAN BARU</option>
            <option value="SAWANGAN LAMA">SAWANGAN LAMA</option>
            <option value="SERUA">SERUA</option>
            <option value="SUKAMAJU">SUKAMAJU</option>
            <option value="SUKAMAJU BARU">SUKAMAJU BARU</option>
            <option value="SUKATANI">SUKATANI</option>
            <option value="SUKMAJAYA">SUKMAJAYA</option>
            <option value="TANAH BARU">TANAH BARU</option>
            <option value="TAPOS">TAPOS</option>
            <option value="TIRTAJAYA">TIRTAJAYA</option>
            <option value="TUGU">TUGU</option>
          </select>
        </div>
        </div>
      </div>
      <a id="myBtn" onclick="myFunc('Demo1')" href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom" style="padding: 12px 1.5em;"><i class="fa fa-heartbeat w3-medium" style="margin-right: 7px;"></i> Fasilitas Kesehatan </a>
      <div id="Demo1" class="w3-hide w3-animate-left w3-text-gray" style="padding: 5px 2em 1em; border-bottom: 1px solid #ccc;">
        <input type="checkbox" class="checkbox" id="ap" onclick="apotik()"> Apotek <br>
        <input type="checkbox" class="checkbox" id="kli" onclick="nik()"> Klinik <br>
        <input type="checkbox" class="checkbox" id="rs" onclick="sakit()"> Rumah Sakit <br>
        <input type="checkbox" class="checkbox" id="pks" onclick="kesmas()"> Puskesmas <br>
        <input type="checkbox" class="checkbox" id="bd" onclick="bid()"> Bidan <br>
      </div>
      <a id="myBtn" onclick="myFunc('Demo2')" href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom" style="padding: 12px 1.5em;"><i class="fa fa-money w3-medium" style="margin-right: 7px;"></i> Perekonomian</a>
      <div id="Demo2" class="w3-hide w3-animate-left w3-text-gray" style="padding: 5px 2em 1em; border-bottom: 1px solid #ccc;">
        <input type="checkbox" class="checkbox" id="kl" onclick="klr()"> Kuliner <br>
        <input type="checkbox" class="checkbox" id="ps" onclick="pas()"> Pasar <br>
        <!-- <input type="checkbox" class="checkbox" id="sm" onclick="mart()"> Supermarket/Minimarket <br> -->
          <input type="checkbox" class="checkbox" id="mkt" onclick="market()"> Supermarket <br>
          <input type="checkbox" class="checkbox" id="indo" onclick="im()"> Indomaret <br>
          <input type="checkbox" class="checkbox" id="alfa" onclick="af()"> Alfamart <br>
          <input type="checkbox" class="checkbox" id="midi" onclick="alfadi()"> Alfamidi <br>
        <input type="checkbox" class="checkbox" id="um" onclick="usaha()"> UMKM <br>
        <input type="checkbox" class="checkbox" id="ml" onclick="mol()"> Mall <br>
        <input type="checkbox" class="checkbox" id="dus" onclick="pabrik()"> Industri/Pabrik <br>
        <input type="checkbox" class="checkbox" id="bak" onclick="tabung()"> Bank <br>
        <input type="checkbox" class="checkbox" id="ktr" onclick="kantoran()"> Perkantoran <br>
      </div>

<!--       <a id="myBtn" onclick="myFunc('Demo3')" href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom"><i class="fa fa-child"></i> Sosial</a>
      <div id="Demo3" class="w3-hide w3-animate-left w3-light-gray" style="padding-bottom:1em; padding-left:2em">
        <input class="w3-check" type="checkbox" id="pa" onclick="panti()"> Panti Asuhan <br>
      </div> -->
      <a id="myBtn" onclick="myFunc('Demo4')" href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom" style="padding: 12px 1.5em;"><i class="fa fa-suitcase w3-medium" style="margin-right: 7px;"></i> Wisata</a>
      <div id="Demo4" class="w3-hide w3-animate-left w3-text-gray" style="padding: 5px 2em 1em; border-bottom: 1px solid #ccc;">
        <input type="checkbox" class="checkbox" id="tp" onclick="tmn()"> Taman Publik <br>
        <input type="checkbox" class="checkbox" id="tw" onclick="wisata()"> Tempat Wisata <br>
      </div>
      <a id="myBtn" onclick="myFunc('Demo5')" href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom" style="padding: 12px 1.5em;"><i class="fa fa-users w3-medium" style="margin-right: 7px;"></i> Umum</a>
      <div id="Demo5" class="w3-hide w3-animate-left w3-text-gray" style="padding: 5px 2em 1em; border-bottom: 1px solid #ccc;">
        <input type="checkbox" class="checkbox" id="pl" onclick="listrik()"> PLN <br>
        <input type="checkbox" class="checkbox" id="ti" onclick="ibadah()"> Tempat Ibadah <br>
        <input type="checkbox" class="checkbox" id="pk" onclick="kebakar()"> Pemadam Kebakaran <br>
        <input type="checkbox" class="checkbox" id="pp" onclick="polis()"> Pos Polisi <br>
        <input type="checkbox" class="checkbox" id="tn" onclick="tentara()"> Markas TNI <br>
        <input type="checkbox" class="checkbox" id="pam" onclick="air()"> PDAM (Perusahaan Daerah Air Minum)<br>
        <input type="checkbox" class="checkbox" id="spb" onclick="pom()"> SPBU (Stasiun Pengisian Bahan Bakar Umum)<br>
        <input type="checkbox" class="checkbox" id="man" onclick="makam()"> TPU (Taman Pemakaman Umum) <br>
        <input type="checkbox" class="checkbox" id="or" onclick="raga()"> Olahraga <br>
        <input type="checkbox" class="checkbox" id="jp" onclick="kirim()"> Jasa Pengiriman <br>
      </div>
      <a id="myBtn" onclick="myFunc('Demo6')" href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom" style="padding: 12px 1.5em;"><i class="fa fa-university w3-medium" style="margin-right: 7px;"></i> Pendidikan</a>
      <div id="Demo6" class="w3-hide w3-animate-left w3-text-gray" style="padding: 5px 2em 1em; border-bottom: 1px solid #ccc;">
        <input class="checkbox" type="checkbox" id="pt" onclick="kampus()"> Perguruan Tinggi <br>
        <input type="checkbox" class="checkbox" id="s" onclick="dasar()"> SD (Sekolah Dasar) <br>
        <input type="checkbox" class="checkbox" id="sp" onclick="pertama()"> SMP (Sekolah Menengah Pertama) <br>
        <input type="checkbox" class="checkbox" id="sa" onclick="atas()"> SMA/SMK/MA <br>
        <input type="checkbox" class="checkbox" id="sl" onclick="luar()"> SLB (Sekolah Luar Biasa) <br>
        <input type="checkbox" class="checkbox" id="pptn" onclick="perpus()"> Perpustakaan <br>
      </div>
      <a id="myBtn" onclick="myFunc('Demo9')" href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom" style="padding: 12px 1.5em;"><i class="fa fa-building w3-medium" style="margin-right: 7px;"></i> Lainnya</a>
      <div id="Demo9" class="w3-hide w3-animate-left w3-text-gray" style="padding: 5px 2em 1em; border-bottom: 1px solid #ccc;">
        <input type="checkbox" class="checkbox" id="rth" onclick="hijau()"> Ruang Terbuka Hijau <br>
        <input type="checkbox" class="checkbox" id="as" onclick="sungai()"> Aliran Sungai <br>
        <input type="checkbox" class="checkbox" id="krl" onclick="kereta()"> Jalur Kereta <br>
      </div>
    </div>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
    <a href="/#download" class="w3-bar-item w3-button" onclick="toggleFunction()">Download</a>
    <a href="/maps" class="w3-bar-item w3-button">Maps</a>
    <a href="/blog" class="w3-bar-item w3-button">Blog</a>
    <a href="/event" class="w3-bar-item w3-button">Event</a>
    <a href="/#about" class="w3-bar-item w3-button">About</a>
  </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAtFnKBeTAorl8rWoo066pk7pwimSpA-w"></script>
<div id="map-canvas">
   <div class="w3-card-4" style="position: absolute;">wsnm,bdmsbdsbdj
   </div>
</div>
<script>
var pdam = <?php print_r(json_encode($pdams)) ?>;
var pasar = <?php print_r(json_encode($pasars)) ?>;
var kuliner = <?php print_r(json_encode($kuliners)) ?>;
var kelurahan = <?php print_r(json_encode($kelurahans)) ?>;
var apotek = <?php print_r(json_encode($apoteks)) ?>;
var klinik = <?php print_r(json_encode($kliniks)) ?>;
var rumah_sakit = <?php print_r(json_encode($rss)) ?>;
var puskesmas = <?php print_r(json_encode($puskesmass)) ?>;
var bidan = <?php print_r(json_encode($bidans)) ?>;
var supermarket = <?php print_r(json_encode($supermarkets)) ?>;
  var indomaret = <?php print_r(json_encode($indomarets)) ?>;
  var alfamart = <?php print_r(json_encode($alfamarts)) ?>;
  var alfamidi = <?php print_r(json_encode($alfamidis)) ?>;
  var markt = <?php print_r(json_encode($markets)) ?>;
var ukm = <?php print_r(json_encode($ukms)) ?>;
var taman = <?php print_r(json_encode($tamans)) ?>;
var tempatwisata = <?php print_r(json_encode($tempat_wisatas)) ?>;
var tempatibadah = <?php print_r(json_encode($tempat_ibadahs)) ?>;
var spbu = <?php print_r(json_encode($spbus)) ?>;
var tpu = <?php print_r(json_encode($tpus)) ?>;
var olahraga = <?php print_r(json_encode($olahragas)) ?>;
var mall = <?php print_r(json_encode($malls)) ?>;
var pengiriman = <?php print_r(json_encode($jasa_pengirimans)) ?>;
var kecamatan = <?php print_r(json_encode($kecamatans)) ?>;
var pln = <?php print_r(json_encode($plns)) ?>;
var damkar = <?php print_r(json_encode($damkars)) ?>;
var sd = <?php print_r(json_encode($sds)) ?>;
var smp = <?php print_r(json_encode($smps)) ?>;
var sma = <?php print_r(json_encode($smas)) ?>;
var perpustakaan = <?php print_r(json_encode($perpustakaans)) ?>;
var slb = <?php print_r(json_encode($slbs)) ?>;
var polisi = <?php print_r(json_encode($polisis)) ?>;
var universitas = <?php print_r(json_encode($universitass)) ?>;
var tni = <?php print_r(json_encode($tentaras)) ?>;
var industri = <?php print_r(json_encode($industris)) ?>;
var bank = <?php print_r(json_encode($banks)) ?>;
var kantor = <?php print_r(json_encode($kantors)) ?>;

var map;
// var lp = 1;
var layer_0;
var layer_1;
var layer_2;
var layer_3;
var layer_4;
var layer_5;
var layer_6;
var layer_7;
var depok = {lat: -6.3973829, lng: 106.8126366};
var depok_zoom = 13;

var btn = document.getElementById("pam");
var btn2 = document.getElementById("ps");
var btn3 = document.getElementById("kl");
var btn4 = document.getElementById("kel");
var btn5 = document.getElementById("ap");
var btn6 = document.getElementById("kli");
var btn7 = document.getElementById("rs");
var btn8 = document.getElementById("pks");
var btn9 = document.getElementById("bd");
var btn10 = document.getElementById("sm");
  var indomart = document.getElementById("indo");
  var alfamat = document.getElementById("alfa");
  var alfamid = document.getElementById("midi");
  var besar = document.getElementById("mkt");
var btn11 = document.getElementById("um");
var btn12 = document.getElementById("tp");
var btn13 = document.getElementById("tw");
var btn14 = document.getElementById("ti");
var btn15 = document.getElementById("spb");
var btn16 = document.getElementById("man");
var btn17 = document.getElementById("or");
var btn18 = document.getElementById("ml");
var btn19 = document.getElementById("jp");
var btn20 = document.getElementById("kec");
var btn21 = document.getElementById("pl");
var btn22 = document.getElementById("pk");
var btn23 = document.getElementById("s");
var btn24 = document.getElementById("sp");
var btn25 = document.getElementById("sa");
var btn26 = document.getElementById("sl");
var btn27 = document.getElementById("pptn");
var btn28 = document.getElementById("pp");
var btn29 = document.getElementById("pt");
var btn30 = document.getElementById("tn");
var btn31 = document.getElementById("dus");
var btn32 = document.getElementById("bak");
var btn33 = document.getElementById("ktr");

var all = document.getElementById("semuakel");
var kll = document.getElementById("cam");
var ruang = document.getElementById("rth");
var kali = document.getElementById("as");
var kin = document.getElementById("krt");
var train = document.getElementById("krl");
var idu = document.getElementById("ski");


var markers =[];
var markers2 =[];
var markers3 =[];
var markers4 =[];
var markers5 =[];
var markers6 =[];
var markers6 =[];
var markers7 =[];
var markers8 =[];
var markers9 =[];
var markers10 =[];
  var markersindomaret =[];
  var markersalfamart =[];
  var markersalfamidi =[];
  var markerssuper =[];
var markers11 =[];
var markers12 =[];
var markers13 =[];
var markers14 =[];
var markers15 =[];
var markers16 =[];
var markers17 =[];
var markers18 =[];
var markers19 =[];
var markers20 =[];
var markers21 =[];
var markers22 =[];
var markers23 =[];
var markers24 =[];
var markers25 =[];
var markers26 =[];
var markers27 =[];
var markers28 =[];
var markers29 =[];
var markers30 =[];
var markers31 =[];
var markers32 =[];
var markers33 =[];


// if(lp==1){
  $("#lur").hide();
  $("#kemis").hide();
  $("#indi").hide();
  $("#pet").hide();
  $("#erase").hide();
  function initialize(){
    map = new google.maps.Map(document.getElementById('map-canvas'),{
      zoom: depok_zoom,
      center: depok,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
    });
    var style = [
        {
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#ebe3cd"
            }
          ]
        },
        {
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#523735"
            }
          ]
        },
        {
          "elementType": "labels.text.stroke",
          "stylers": [
            {
              "color": "#f5f1e6"
            }
          ]
        },
        {
          "featureType": "administrative",
          "elementType": "geometry.stroke",
          "stylers": [
            {
              "color": "#c9b2a6"
            }
          ]
        },
        {
          "featureType": "administrative.country",
          "stylers": [
            {
              "visibility": "on"
            }
          ]
        },
        {
          "featureType": "administrative.land_parcel",
          "stylers": [
            {
              "visibility": "on"
            }
          ]
        },
        {
          "featureType": "administrative.land_parcel",
          "elementType": "geometry.stroke",
          "stylers": [
            {
              "color": "#dcd2be"
            }
          ]
        },
        {
          "featureType": "administrative.land_parcel",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#ae9e90"
            }
          ]
        },
        {
          "featureType": "administrative.locality",
          "stylers": [
            {
              "visibility": "on"
            }
          ]
        },
        {
          "featureType": "administrative.neighborhood",
          "stylers": [
            {
              "visibility": "on"
            }
          ]
        },
        {
          "featureType": "administrative.province",
          "stylers": [
            {
              "visibility": "on"
            }
          ]
        },
        {
          "featureType": "administrative.province",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#ff0000"
            },
            {
              "visibility": "on"
            }
          ]
        },
        {
          "featureType": "landscape.natural",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#dfd2ae"
            }
          ]
        },
        {
          "featureType": "poi",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#dfd2ae"
            }
          ]
        },
        {
          "featureType": "poi",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#93817c"
            }
          ]
        },
        {
          "featureType": "poi.attraction",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "poi.business",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "poi.government",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "poi.medical",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "poi.park",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "poi.park",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#a5b076"
            }
          ]
        },
        {
          "featureType": "poi.park",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#447530"
            }
          ]
        },
        {
          "featureType": "poi.place_of_worship",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "poi.school",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "poi.sports_complex",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "road",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#f5f1e6"
            }
          ]
        },
        {
          "featureType": "road.arterial",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#fdfcf8"
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#f8c967"
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "geometry.stroke",
          "stylers": [
            {
              "color": "#e9bc62"
            }
          ]
        },
        {
          "featureType": "road.highway.controlled_access",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#e98d58"
            }
          ]
        },
        {
          "featureType": "road.highway.controlled_access",
          "elementType": "geometry.stroke",
          "stylers": [
            {
              "color": "#db8555"
            }
          ]
        },
        {
          "featureType": "road.local",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#806b63"
            }
          ]
        },
        {
          "featureType": "transit.line",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#dfd2ae"
            }
          ]
        },
        {
          "featureType": "transit.line",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#8f7d77"
            }
          ]
        },
        {
          "featureType": "transit.line",
          "elementType": "labels.text.stroke",
          "stylers": [
            {
              "color": "#ebe3cd"
            }
          ]
        },
        {
          "featureType": "transit.station",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#dfd2ae"
            }
          ]
        },
        {
          "featureType": "transit.station.airport",
          "stylers": [
            {
              "visibility": "on"
            }
          ]
        },
        {
          "featureType": "transit.station.bus",
          "stylers": [
            {
              "visibility": "on"
            }
          ]
        },
        {
          "featureType": "transit.station.rail",
          "stylers": [
            {
              "visibility": "on"
            }
          ]
        },
        {
          "featureType": "water",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#b9d3c2"
            }
          ]
        },
        {
          "featureType": "water",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#92998d"
            }
          ]
        }
      ];
    var styledMapType = new google.maps.StyledMapType(style, {
        map: map,
        name: 'Styled Map'
      });
      map.mapTypes.set('map-style', styledMapType);
      map.setMapTypeId('map-style');
      layer_0 = new google.maps.FusionTablesLayer({
        query: {
          select: "col0",
          from: "1i4bNWnxrAqpCEs9XCT7-7_JFkGVzE97ekDvdIz-E"
        },
        // map: map,
        styleId: 2,
        templateId: 2
      });
      // layer_0.setMap(map);
      layer_1 = new google.maps.FusionTablesLayer({
        query: {
          select: "col0",
          from: "1h0wJn8wO-uhXB_bwO_QBs6BZZQnr-2S9EDAl9NsY"
        },
        // map: map,
        styleId: 2,
        templateId: 2
      }); 
      layer_2 = new google.maps.FusionTablesLayer({
        query: {
          select: "col0",
          from: "1oWi-ATg7xyLJ4oQZNspQFIUGCaukYKvWV9Mxj5Ta"
        },
        // map: map,
        styleId: 2,
        templateId: 2
      });
      layer_3 = new google.maps.FusionTablesLayer({
        query: {
          select: "col7",
          from: "1t-O9RvxOXS9zAYTeGgUQZ2bENy-hGsVDLHOXWTUs"
        },
        // map: map,
        styleId: 2,
        templateId: 2
      });
      layer_4 = new google.maps.FusionTablesLayer({
        query: {
          select: "col0",
          from: "1dNkNLRO-eIgTrwvRWDtzpTdtbL46q5qyIn4bxFy_"
        },
        // map: map,
        styleId: 2,
        templateId: 2
      });
      layer_5 = new google.maps.FusionTablesLayer({
        query: {
          select: "col0",
          from: "1IegFI2jij36G1BTsePlemft5jUDRw03JFVb_-r_5"
        },
        // map: map,
        styleId: 2,
        templateId: 2
      });
      layer_6 = new google.maps.FusionTablesLayer({
        query: {
          select: "col0",
          from: "1zQsALsOAsqdxNZLqBlBqoRYjGLmQLv0tIvNkZv4g"
        },
        // map: map,
        styleId: 2,
        templateId: 2
      });
      layer_7 = new google.maps.FusionTablesLayer({
        query: {
          select: "col0",
          from: "1kKFhr-EJ8uWfHlnV3o6Iqzdu-NGosuZr30Phs3HW"
        },
        // map: map,
        styleId: 2,
        templateId: 2
      });
      layer_7.setMap(map);     
  }
  function semua(){
      if(all.checked){
        $("#lur").show();
        layer_1.setMap(map);
      }
      else{
        $("#lur").hide();
        layer_1.setMap(null);
      }
  }
  function hijau(){
    if(rth.checked){
      layer_2.setMap(map);
    }
    else{
      layer_2.setMap(null);
    }
  }
  function sungai(){
    if(kali.checked){
      layer_3.setMap(map);
    }
    else{
      layer_3.setMap(null);
    }
  }
  function miskin(){
     if(kin.checked){
       $("#kemis").show();
       layer_4.setMap(map);
     }
     else{
       $("#kemis").hide();
       layer_4.setMap(null);
     }
  }
    function kereta(){
     if(train.checked){
       layer_5.setMap(map);
     }
     else{
       layer_5.setMap(null);
     }
  }
    function sendiri(){
     if(idu.checked){
       $("#indi").show();
       layer_6.setMap(map);
     }
     else{
       $("#indi").hide();
       layer_6.setMap(null);
     }
  }
      function petacam(){
     if(kll.checked){
       $("#pet").show();
       layer_0.setMap(map);
     }
     else{
       $("#pet").hide();
       layer_0.setMap(null);
     }
  }
  function changeMap_0() {
      var whereClause;
      var searchString = document.getElementById('search-string_0').value.replace(/'/g, "\\'");
      if (searchString != '--Select--') {
        whereClause = "'kecamatan' = '" + searchString + "'";
      }
      layer_0.setOptions({
        query: {
          select: "col0",
          from: "1i4bNWnxrAqpCEs9XCT7-7_JFkGVzE97ekDvdIz-E",
          where: whereClause
        }
      });
    }
    function changeMap_1() {
      var whereClause;
      var searchString = document.getElementById('search-string_1').value.replace(/'/g, "\\'");
      if (searchString != '--Select--') {
        whereClause = "'desa' = '" + searchString + "'";
      }
      layer_1.setOptions({
        query: {
          select: "col0",
          from: "1h0wJn8wO-uhXB_bwO_QBs6BZZQnr-2S9EDAl9NsY",
          where: whereClause
        }
      });
    }
    function changeMap_4() {
      var whereClause;
      var searchString = document.getElementById('search-string_4').value.replace(/'/g, "\\'");
      if (searchString != '--Select--') {
        whereClause = "'desa' = '" + searchString + "'";
      }
      layer_4.setOptions({
        query: {
          select: "col0",
          from: "1dNkNLRO-eIgTrwvRWDtzpTdtbL46q5qyIn4bxFy_",
          where: whereClause
        }
      });
    }
    function changeMap_6() {
      var whereClause;
      var searchString = document.getElementById('search-string_6').value.replace(/'/g, "\\'");
      if (searchString != '--Select--') {
        whereClause = "'desa' = '" + searchString + "'";
      }
      layer_6.setOptions({
        query: {
          select: "col0",
          from: "1zQsALsOAsqdxNZLqBlBqoRYjGLmQLv0tIvNkZv4g",
          where: whereClause
        }
      });
    }
  google.maps.event.addDomListener(window, 'load', initialize);
// }
  
function air(){
  for(var i = 0; i < pdam.length; i++){
    markers[i] = addMarker(pdam[i]);
  }
  function addMarker(pdam){
    if(btn.checked){
        var nama = pdam.nama_tempat;
        var alamat = pdam.alamat;
        var deskripsi = pdam.gambaran_umum;
        var jamoperasi = pdam.jam_operasional;
        var gambar = pdam.foto;
        var koordinat = pdam.koordinat;
        var latitude = parseFloat(koordinat.split(',')[0]);
        var longitude = parseFloat(koordinat.split(',')[1]);

        var konten = '<div id="iw-container"class="w3-animate-zoom">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     // '<div class="iw-subTitle">Deskripsi</div>' +
                     '<img src="{{ asset('storage/img_pdam/pdam.jpg') }}" width="83">' +
                     // '<p>' + deskripsi + '</p>' +
                     '<div class="iw-subTitle">Informasi Lainnya</div>' +
                     '<p><b> Alamat : </b>' + alamat +
                     '<br><b> Jam operasi : </b>' + jamoperasi + '</p>'+
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';
        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/pdam.png') }}"
              });

        var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });

        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
      }
      else{
        markers[i].setMap(null);
      }
    }
  }

function pas(){
  for(var i = 0; i < pasar.length; i++){
    markers2[i] = addMarker(pasar[i]);
  }
  function addMarker(pasar){
    if(btn2.checked){
        var nama = pasar.nama_tempat;
        var alamat = pasar.alamat;
        var deskripsi = pasar.gambaran_umum;
        var jamoperasi = pasar.jam_operasional;
        var koordinat = pasar.koordinat;
        var latitude = parseFloat(koordinat.split(',')[0]);
        var longitude = parseFloat(koordinat.split(',')[1]);

        var konten = '<div id="iw-container"class="w3-animate-zoom">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     // '<div class="iw-subTitle">Deskripsi</div>' +
                     '<img src="{{ asset('storage/img_pasar/pasar.jpg') }}" width="83">' +
                     // '<p>' + deskripsi + '</p>' +
                     '<div class="iw-subTitle">Informasi Lainnya</div>' +
                     '<p><b> Alamat : </b>' + alamat +
                     '<br><b> Jam operasi : </b>' + jamoperasi + '</p>'+
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/pasar.png') }}"
              });
                
        var infoWindow = new google.maps.InfoWindow({
          maxWidth: 350
        });
        
        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
      }
      else{
        markers2[i].setMap(null);
      }
    }
  }

function klr(){
  for(var i = 0; i < kuliner.length; i++){
    markers3[i] = addMarker(kuliner[i]);
  }
   function addMarker(kuliner){
    if(btn3.checked){
        var nama = kuliner.nama_tempat;
        var alamat = kuliner.alamat;
        var deskripsi = kuliner.gambaran_umum;
        var jamoperasi = kuliner.jam_operasional;
        var telp = kuliner.no_telp;
        var koordinat = kuliner.koordinat;
        var latitude = parseFloat(koordinat.split(',')[0]);
        var longitude = parseFloat(koordinat.split(',')[1]);

        var konten = '<div id="iw-container"class="w3-animate-zoom">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     // '<div class="iw-subTitle">Deskripsi</div>' +
                     '<img src="{{ asset('storage/img_kuliner/no image.jpg') }}" width="83">' +
                     // '<p>' + deskripsi + '</p>' +
                     '<div class="iw-subTitle">Informasi Lainnya</div>' +
                     '<p><b> Alamat : </b>' + alamat +
                     '<br><b> Jam operasi : </b>' + jamoperasi +
                     '<br><b> Telepon : </b>' + telp + '</p>'+
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/kuliner.png') }}"
              });
                
        var infoWindow = new google.maps.InfoWindow({
          maxWidth: 350
        });
        
        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
      }
      else{
        markers3[i].setMap(null);
      }
    }
  }

function klrhn(){
  for(var i = 0; i < kelurahan.length; i++){
    markers4[i] = addMarker(kelurahan[i]);
  }
   function addMarker(kelurahan){
    if(btn4.checked){
        var nama_kel = kelurahan.kelurahan;
        var alamat = kelurahan.alamat;
        var lurah = kelurahan.lurah;
        var kecamatan = kelurahan.kecamatan;
        var telp = kelurahan.no_telp;
        var koordinat = kelurahan.koordinat;
        var latitude = parseFloat(koordinat.split(',')[0]);
        var longitude = parseFloat(koordinat.split(',')[1]);

        var konten = '<div id="iw-container"class="w3-animate-zoom">' +
                     '<div class="iw-title">' + nama_kel + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     '<div class="iw-subTitle">Informasi Umum</div>' +
                     '<img src="{{ asset('storage/img_kelurahan/kelurahan.jpg') }}" width="83">' +
                     '<p><b> Kecamatan : </b>' + kecamatan +
                     '<br><b> Kepala Lurah : </b>' + lurah + '</p>'+
                     '<div class="iw-subTitle">Informasi Lainnya</div>' +
                     '<p><b> Alamat : </b>' + alamat +
                     '<br><b> Telepon : </b>' + telp + '</p>'+
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/kelurahan.png') }}"
              });
                
        var infoWindow = new google.maps.InfoWindow({
          maxWidth: 350
        });
        
        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});

          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }

          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama_kel)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {               
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });               
      
        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
      
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
    }
    else{
      markers4[i].setMap(null);
    }
  }
}

function apotik(){
  for(var i = 0; i < apotek.length; i++){
    markers5[i] = addMarker(apotek[i]);
  }
   function addMarker(apotek){
    if(btn5.checked){
        var nama = apotek.nama_tempat;
        var alamat = apotek.alamat;
        var deskripsi = apotek.gambaran_umum;
        var jamoperasi = apotek.jam_operasional;
        var telp = apotek.no_telp;
        var gambar = apotek.foto;
        var koordinat = apotek.koordinat;
        var latitude = parseFloat(koordinat.split(',')[0]);
        var longitude = parseFloat(koordinat.split(',')[1]);
        
        var konten = '<div id="iw-container"class="w3-animate-zoom">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     // '<div class="iw-subTitle">Deskripsi</div>' +
                     '<img src="{{ asset('storage/img_apotek/no image.jpg') }}" width="83">' +
                     // '<p>' + deskripsi + '</p>' +
                     '<div class="iw-subTitle">Informasi Lainnya</div>' +
                     '<p><b> Alamat : </b>' + alamat +
                     '<br><b> Jam operasi : </b>' + jamoperasi +
                     '<br><b> Telepon : </b>' + telp + '</p>'+
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/apotek.png') }}"
              });
                
        var infoWindow = new google.maps.InfoWindow({
          maxWidth: 350
        });
        
        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
    }
    else{
      markers5[i].setMap(null);
    }
  }
}

function nik(){
  for(var i = 0; i < klinik.length; i++){
    markers6[i] = addMarker(klinik[i]);
  }
   function addMarker(klinik){
    if(btn6.checked){
        var nama = klinik.nama_tempat;
        var alamat = klinik.alamat;
        var deskripsi = klinik.gambaran_umum;
        var jamoperasi = klinik.jam_operasional;
        var telp = klinik.no_telp;
        var koordinat = klinik.koordinat;
        var latitude = parseFloat(koordinat.split(',')[0]);
        var longitude = parseFloat(koordinat.split(',')[1]);
        
        var konten = '<div id="iw-container"class="w3-animate-zoom">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     // '<div class="iw-subTitle">Deskripsi</div>' +
                     '<img src="{{ asset('storage/img_klinik/klinik.jpg') }}" width="83">' +
                     // '<p>' + deskripsi + '</p>' +
                     '<div class="iw-subTitle">Informasi Lainnya</div>' +
                     '<p><b> Alamat : </b>' + alamat +
                     '<br><b> Jam operasi : </b>' + jamoperasi +
                     '<br><b> Telepon : </b>' + telp + '</p>'+
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/klinik.png') }}"
              });
                
        var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });

        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
    }
    else{
      markers6[i].setMap(null);
    }
  }
}

function sakit(){
  for(var i = 0; i < rumah_sakit.length; i++){
    markers7[i] = addMarker(rumah_sakit[i]);
  }
   function addMarker(rumah_sakit){
    if(btn7.checked){
        var nama = rumah_sakit.nama_tempat;
        var alamat = rumah_sakit.alamat;
        var deskripsi = rumah_sakit.gambaran_umum;
        var jamoperasi = rumah_sakit.jam_operasional;
        var telp = rumah_sakit.no_telp;
        var koordinat = rumah_sakit.koordinat;
        var latitude = parseFloat(koordinat.split(',')[0]);
        var longitude = parseFloat(koordinat.split(',')[1]);
        
        var konten = '<div id="iw-container"class="w3-animate-zoom">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     // '<div class="iw-subTitle">Deskripsi</div>' +
                     '<img src="{{ asset('storage/img_rs/rs.jpg') }}" width="83">' +
                     // '<p>' + deskripsi + '</p>' +
                     '<div class="iw-subTitle">Informasi Lainnya</div>' +
                     '<p><b> Alamat : </b>' + alamat +
                     '<br><b> Jam operasi : </b>' + jamoperasi +
                     '<br><b> Telepon : </b>' + telp + '</p>'+
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/rs.png') }}"
              });
                
        var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });

        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
    }
    else{
      markers7[i].setMap(null);
    }
  }
}

function kesmas(){
  for(var i = 0; i < puskesmas.length; i++){
    markers8[i] = addMarker(puskesmas[i]);
  }
   function addMarker(puskesmas){
    if(btn8.checked){
        var nama = puskesmas.nama_tempat;
        var alamat = puskesmas.alamat;
        var deskripsi = puskesmas.gambaran_umum;
        var jamoperasi = puskesmas.jam_operasional;
        var telp = puskesmas.no_telp;
        var koordinat = puskesmas.koordinat;
        var latitude = parseFloat(koordinat.split(',')[0]);
        var longitude = parseFloat(koordinat.split(',')[1]);
        
        var konten = '<div id="iw-container"class="w3-animate-zoom">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     // '<div class="iw-subTitle">Deskripsi</div>' +
                     '<img src="{{ asset('storage/img_puskesmas/puskesmas.jpg') }}" width="83">' +
                     // '<p>' + deskripsi + '</p>' +
                     '<div class="iw-subTitle">Informasi Lainnya</div>' +
                     '<p><b> Alamat : </b>' + alamat +
                     '<br><b> Jam operasi : </b>' + jamoperasi +
                     '<br><b> Telepon : </b>' + telp + '</p>'+
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/puskesmas.png') }}"
              });
                
        var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });

        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
    }
    else{
      markers8[i].setMap(null);
    }
  }
}

function bid(){
  for(var i = 0; i < bidan.length; i++){
    markers9[i] = addMarker(bidan[i]);
  }
   function addMarker(bidan){
    if(btn9.checked){
        var nama = bidan.nama_tempat;
        var alamat = bidan.alamat;
        var deskripsi = bidan.gambaran_umum;
        var jamoperasi = bidan.jam_operasional;
        var telp = bidan.no_telp;
        var koordinat = bidan.koordinat;
        var latitude = parseFloat(koordinat.split(',')[0]);
        var longitude = parseFloat(koordinat.split(',')[1]);
        
        var konten = '<div id="iw-container"class="w3-animate-zoom">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     // '<div class="iw-subTitle">Deskripsi</div>' +
                     '<img src="{{ asset('storage/img_bidan/bidan.jpg') }}" width="83">' +
                     // '<p>' + deskripsi + '</p>' +
                     '<div class="iw-subTitle">Informasi Lainnya</div>' +
                     '<p><b> Alamat : </b>' + alamat +
                     '<br><b> Jam operasi : </b>' + jamoperasi +
                     '<br><b> Telepon : </b>' + telp + '</p>'+
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/bidan.png') }}"
              });
                
        var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });

        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
    }
    else{
      markers9[i].setMap(null);
    }
  }
}

// function mart(){
//   for(var i = 0; i < supermarket.length; i++){
//     markers10[i] = addMarker(supermarket[i]);
//   }
//    function addMarker(supermarket){
//     if(btn10.checked){
//       var nama = supermarket.nama_tempat;
//       var alamat = supermarket.alamat;
//       var deskripsi = supermarket.gambaran_umum;
//       var jamoperasi = supermarket.jam_operasional;
//       var telp = supermarket.no_telp;
//       var web = supermarket.website;
//       var ktgri = supermarket.kategori;
//       var koordinat = supermarket.koordinat;
//       var markert;
//       var latitude = parseFloat(koordinat.split(',')[0]);
//       var longitude = parseFloat(koordinat.split(',')[1]);
      
//       var konten = '<div id="iw-container"class="w3-animate-zoom">' +
//                      '<div class="iw-title">' + nama + '</div>' +
//                      '<div class="iw-content scrollbar style-7">' +
//                      '<div class="iw-subTitle">Deskripsi</div>' +
//                      '<img src="{{ asset('storage/default/supermarket.jpg') }}" width="83">' +
//                      '<p>' + deskripsi + '</p>' +
//                      '<div class="iw-subTitle">Informasi Lainnya</div>' +
//                      '<p><b> Alamat : </b>' + alamat +
//                      '<br><b> Jam operasi : </b>' + jamoperasi +
//                      '<br><b> Telepon : </b>' + telp +
//                      '<br><b> Website : </b>' + web + '</p>' +
//                      '<div class="iw-bottom-gradient"></div>' +
//                      '</div>' +
//                      '</div>';

//         if (ktgri == "supermarket"){
//          markert = "{{ asset('img/marker/supermarket.png') }}"
//         }
//         else if (ktgri == "alfamart"){
//           markert = "{{ asset('img/marker/alfamart.png') }}"
//         }
//         else if (ktgri == "indomaret"){
//           markert = "{{ asset('img/marker/indomaret.png') }}"
//         }
//         else if (ktgri == "alfamidi"){
//           markert = "{{ asset('img/marker/alfamidi.png') }}"
//         }
//         var mark = new google.maps.Marker({
//                   map: map,
//                   position: {lat: latitude, lng: longitude},
//                   icon: markert
//               });       
        
//         var infoWindow = new google.maps.InfoWindow({
//           maxWidth: 350
//         });
        
//         google.maps.event.addListener(infoWindow, 'domready', function() {
//           var iwOuter = $('.gm-style-iw');

//           iwOuter.css({top: '17px'});

//           var iwBackground = iwOuter.prev();

//           // Removes background shadow DIV
//           iwBackground.children(':nth-child(2)').css({'display' : 'none'});

//           //Removes white background DIV
//           iwBackground.children(':nth-child(4)').css({'display' : 'none'});

//           // Moves the infowindow 115px to the right.
//           iwOuter.parent().parent().css({left: '115px'});

//           // Moves the shadow of the arrow 76px to the left margin.
//           iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

//           // Moves the arrow 76px to the left margin.
//           iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

//           // Changes the desired tail shadow color.
//           iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

//           // Reference to the div that groups the close button elements.
//           var iwCloseBtn = iwOuter.next();

//           // Apply the desired effect to the close button
//           iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});

//           // If the content of infowindow not exceed the set maximum height, then the gradient is removed.
//           if($('.iw-content').height() < 140){
//             $('.iw-bottom-gradient').css({display: 'none'});
//           }

//           // The API automatically applies 0.7 opacity to the button after the mouseout event. This function reverses this event to the desired value.
//           iwCloseBtn.mouseout(function(){
//             $(this).css({opacity: '1'});
//           });
//         });

//         var infoWnd = new google.maps.InfoWindow();           
//         infoWnd.setContent(nama)
//         var activeInfoWindow ;

//         google.maps.event.addListener(mark, 'mouseover', function() {        
//         // Close active window if exists - [one might expect this to be default behaviour no?]        
//         if(activeInfoWindow != null) activeInfoWindow.close();

//         // Close info Window on mouseclick if already opened
//         infoWindow.close();
      
//         // Open new InfoWindow for mouseover event
//         infoWnd.open(map, mark);
        
//         // Store new open InfoWindow in global variable
//         activeInfoWindow = infoWnd;       
//         });               
      
//         // on mouseout (moved mouse off marker) make infoWindow disappear
//         google.maps.event.addListener(mark, 'mouseout', function() {
//           infoWnd.close();  
//         });

//         google.maps.event.addListener(mark, 'click', function(){
//           infoWindow.setContent(konten);
//           infoWindow.open(map, mark);

//         //Close active window if exists - [one might expect this to be default behaviour no?]       
//         if(activeInfoWindow != null) activeInfoWindow.close();

//         // Open InfoWindow - on click 
//         infoWindow.open(map, mark);
        
//         // Close "mouseover" infoWindow
//         infoWnd.close();
        
//         // Store new open InfoWindow in global variable
//         activeInfoWindow = infoWindow;

//         });
//         return mark;
//     }
//     else{
//       markers10[i].setMap(null);
//     }
//   }
// }

function im(){
  for(var i = 0; i < indomaret.length; i++){
    markersindomaret[i] = addMarker(indomaret[i]);
  }
   function addMarker(indomaret){
    if(indomart.checked){
      var nama = indomaret.nama_tempat;
      var alamat = indomaret.alamat;
      var deskripsi = indomaret.gambaran_umum;
      var jamoperasi = indomaret.jam_operasional;
      var telp = indomaret.no_telp;
      var web = indomaret.website;
      var ktgri = indomaret.kategori;
      var koordinat = indomaret.koordinat;
      var latitude = parseFloat(koordinat.split(',')[0]);
      var longitude = parseFloat(koordinat.split(',')[1]);
      
      var konten = '<div id="iw-container"class="w3-animate-zoom">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     // '<div class="iw-subTitle">Deskripsi</div>' +
                     '<img src="{{ asset('storage/img_supermarket/supermarket.jpg') }}" width="83">' +
                     // '<p>' + deskripsi + '</p>' +
                     '<div class="iw-subTitle">Informasi Lainnya</div>' +
                     '<p><b> Alamat : </b>' + alamat +
                     '<br><b> Jam operasi : </b>' + jamoperasi +
                     '<br><b> Telepon : </b>' + telp +
                     '<br><b> Website : </b>' + web + '</p>' +
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/indomaret.png') }}"
              });       
        
       var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });

        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
    }
    else{
      markersindomaret[i].setMap(null);
    }
  }
}

function af(){
  for(var i = 0; i < alfamart.length; i++){
    markersalfamart[i] = addMarker(alfamart[i]);
  }
   function addMarker(alfamart){
    if(alfamat.checked){
      var ktgri = alfamart.kategori;
      var nama = alfamart.nama_tempat;
      var alamat = alfamart.alamat;
      var deskripsi = alfamart.gambaran_umum;
      var jamoperasi = alfamart.jam_operasional;
      var telp = alfamart.no_telp;
      var web = alfamart.website;
      var koordinat = alfamart.koordinat;
      var latitude = parseFloat(koordinat.split(',')[0]);
      var longitude = parseFloat(koordinat.split(',')[1]);
      
      var konten = '<div id="iw-container"class="w3-animate-zoom">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     // '<div class="iw-subTitle">Deskripsi</div>' +
                     '<img src="{{ asset('storage/img_supermarket/supermarket.jpg') }}" width="83">' +
                     // '<p>' + deskripsi + '</p>' +
                     '<div class="iw-subTitle">Informasi Lainnya</div>' +
                     '<p><b> Alamat : </b>' + alamat +
                     '<br><b> Jam operasi : </b>' + jamoperasi +
                     '<br><b> Telepon : </b>' + telp +
                     '<br><b> Website : </b>' + web + '</p>' +
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/alfamart.png') }}"
              });                
        
        var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });

        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
    }
    else{
      markersalfamart[i].setMap(null);
    }
  }
}

function alfadi(){
  for(var i = 0; i < alfamidi.length; i++){
    markersalfamidi[i] = addMarker(alfamidi[i]);
  }
   function addMarker(alfamidi){
    if(alfamid.checked){
      var ktgri = alfamidi.kategori;
      var nama = alfamidi.nama_tempat;
      var alamat = alfamidi.alamat;
      var deskripsi = alfamidi.gambaran_umum;
      var jamoperasi = alfamidi.jam_operasional;
      var telp = alfamidi.no_telp;
      var web = alfamidi.website;
      var koordinat = alfamidi.koordinat;
      var latitude = parseFloat(koordinat.split(',')[0]);
      var longitude = parseFloat(koordinat.split(',')[1]);
      
      var konten = '<div id="iw-container"class="w3-animate-zoom">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     // '<div class="iw-subTitle">Deskripsi</div>' +
                     '<img src="{{ asset('storage/img_supermarket/supermarket.jpg') }}" width="83">' +
                     // '<p>' + deskripsi + '</p>' +
                     '<div class="iw-subTitle">Informasi Lainnya</div>' +
                     '<p><b> Alamat : </b>' + alamat +
                     '<br><b> Jam operasi : </b>' + jamoperasi +
                     '<br><b> Telepon : </b>' + telp +
                     '<br><b> Website : </b>' + web + '</p>' +
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/alfamidi.png') }}"
              });                
        
        var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });

        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
    }
    else{
      markersalfamidi[i].setMap(null);
    }
  }
}

function market(){
  for(var i = 0; i < markt.length; i++){
    markerssuper[i] = addMarker(markt[i]);
  }
   function addMarker(markt){
    if(besar.checked){
      var ktgri = markt.kategori;
      var nama = markt.nama_tempat;
      var alamat = markt.alamat;
      var deskripsi = markt.gambaran_umum;
      var jamoperasi = markt.jam_operasional;
      var telp = markt.no_telp;
      var web = markt.website;
      var koordinat = markt.koordinat;
      var latitude = parseFloat(koordinat.split(',')[0]);
      var longitude = parseFloat(koordinat.split(',')[1]);
      
      var konten = '<div id="iw-container"class="w3-animate-zoom">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     // '<div class="iw-subTitle">Deskripsi</div>' +
                     '<img src="{{ asset('storage/img_supermarket/supermarket.jpg') }}" width="83">' +
                     // '<p>' + deskripsi + '</p>' +
                     '<div class="iw-subTitle">Informasi Lainnya</div>' +
                     '<p><b> Alamat : </b>' + alamat +
                     '<br><b> Jam operasi : </b>' + jamoperasi +
                     '<br><b> Telepon : </b>' + telp +
                     '<br><b> Website : </b>' + web + '</p>' +
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';
  
        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/supermarket.png') }}"
              });                
        var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });

        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
    }
    else{
      markerssuper[i].setMap(null);
    }
  }
}

function usaha(){
  for(var i = 0; i < ukm.length; i++){
    markers11[i] = addMarker(ukm[i]);
  }
   function addMarker(ukm){
    if(btn11.checked){
        var toko = ukm.nama_ukm;
        var nama = ukm.nama_owner_ukm;
        var alamat = ukm.alamat_ukm;
        var kec = ukm.kecamatan;
        var deskripsi = ukm.diskripsi_ukm;
        var koordinat = ukm.koordinat_ukm;
        var latitude = parseFloat(koordinat.split(',')[0]);
        var longitude = parseFloat(koordinat.split(',')[1]);
        
        var konten = '<div id="iw-container"class="w3-animate-zoom">' +
                     '<div class="iw-title">' + toko + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     '<div class="iw-subTitle">Informasi Umum</div>' +
                     '<img src="{{ asset('storage/img_ukm/no image.jpg') }}" width="83">' +
                     '<p><b> Nama Pemilik : </b>' + nama +
                     // '<br><b> Deskripsi : </b>' + deskripsi + '</p>' +
                     '<div class="iw-subTitle">Informasi Lainnya</div>' +
                     '<p><b> Alamat : </b>' + alamat +
                     '<br><b> Kecamatan : </b>' + kec + '</p>' +
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/umkm.png') }}"
              });
                
        var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });

        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
    }
    else{
      markers11[i].setMap(null);
    }
  }
}

function tmn(){
  for(var i = 0; i < taman.length; i++){
    markers12[i] = addMarker(taman[i]);
  }
   function addMarker(taman){
    if(btn12.checked){
        var nama = taman.nama_tempat;
        var alamat = taman.alamat;
        var kec = taman.kecamatan;
        var deskripsi = taman.gambaran_umum;
        var web = taman.website;
        var jamoperasi = taman.jam_operasional;
        var koordinat = taman.koordinat;
        var latitude = parseFloat(koordinat.split(',')[0]);
        var longitude = parseFloat(koordinat.split(',')[1]);
        
        var konten = '<div id="iw-container"class="w3-animate-zoom">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     // '<div class="iw-subTitle">Deskripsi</div>' +
                     '<img src="{{ asset('storage/img_taman/taman.jpg') }}" width="83">' +
                     // '<p>' + deskripsi + '</p>' +
                     '<div class="iw-subTitle">Informasi Lainnya</div>' +
                     '<p><b> Kecamatan : </b>' + kec +
                     '<br><b> Alamat : </b>' + alamat +
                     '<br><b> Jam Operasi : </b>' + jamoperasi +
                     '<br><b> Website : </b>' + web + '</p>' +
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/taman.png') }}"
              });
                
        var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });

        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
    }
    else{
      markers12[i].setMap(null);
    }
  }
}

function wisata(){
  for(var i = 0; i < tempatwisata.length; i++){
    markers13[i] = addMarker(tempatwisata[i]);
  }
   function addMarker(tempatwisata){
    if(btn13.checked){
        var nama = tempatwisata.nama_tempat;
        var alamat = tempatwisata.alamat;
        var kec = tempatwisata.kecamatan;
        var deskripsi = tempatwisata.gambaran_umum;
        var web = tempatwisata.website;
        var jamoperasi = tempatwisata.jam_operasional;
        var koordinat = tempatwisata.koordinat;
        var latitude = parseFloat(koordinat.split(',')[0]);
        var longitude = parseFloat(koordinat.split(',')[1]);
        
        var konten = '<div id="iw-container"class="w3-animate-zoom">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     // '<div class="iw-subTitle">Deskripsi</div>' +
                     '<img src="{{ asset('storage/img_wisata/wisata.jpg') }}" width="83">' +
                     // '<p>' + deskripsi + '</p>' +
                     '<div class="iw-subTitle">Informasi Lainnya</div>' +
                     '<p><b> Kecamatan : </b>' + kec +
                     '<br><b> Alamat : </b>' + alamat +
                     '<br><b> Jam Operasi : </b>' + jamoperasi +
                     '<br><b> Website : </b>' + web + '</p>' +
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/wisata.png') }}"
              });
                
        var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });

        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
    }
    else{
      markers13[i].setMap(null);
    }
  }
}

function ibadah(){
  for(var i = 0; i < tempatibadah.length; i++){
    markers14[i] = addMarker(tempatibadah[i]);
  }
   function addMarker(tempatibadah){
    if(btn14.checked){
        var nama = tempatibadah.nama_tempat;
        var alamat = tempatibadah.alamat;
        var kec = tempatibadah.kecamatan;
        var deskripsi = tempatibadah.gambaran_umum;
        var koordinat = tempatibadah.koordinat;
        var latitude = parseFloat(koordinat.split(',')[0]);
        var longitude = parseFloat(koordinat.split(',')[1]);
        
        var konten = '<div id="iw-container"class="w3-animate-zoom">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     // '<div class="iw-subTitle">Deskripsi</div>' +
                     '<img src="{{ asset('storage/img_tibadah/ibadah.jpg') }}" width="83">' +
                     // '<p>' + deskripsi + '</p>' +
                     '<div class="iw-subTitle">Informasi Lainnya</div>' +
                     '<p><b> Kecamatan : </b>' + kec +
                     '<br><b> Alamat : </b>' + alamat + '</p>'+
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/ibadah.png') }}"
              });
                
        var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });

        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
    }
    else{
      markers14[i].setMap(null);
    }
  }
}

function pom(){
  for(var i = 0; i < spbu.length; i++){
    markers15[i] = addMarker(spbu[i]);
  }
   function addMarker(spbu){
    if(btn15.checked){
        var nama = spbu.nama_tempat;
        var alamat = spbu.alamat;
        var kec = spbu.kecamatan;
        var jamoperasi = spbu.jam_operasional;
        var koordinat = spbu.koordinat;
        var latitude = parseFloat(koordinat.split(',')[0]);
        var longitude = parseFloat(koordinat.split(',')[1]);
        
        var konten = '<div id="iw-container"class="w3-animate-zoom">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     // '<div class="iw-subTitle">Deskripsi</div>' +
                     '<img src="{{ asset('storage/img_spbu/spbu.jpg') }}" width="83">' +
                     // '<p>' + deskripsi + '</p>' +
                     '<div class="iw-subTitle">Informasi Lainnya</div>' +
                     '<p><b> Kecamatan : </b>' + kec +
                     '<br><b> Alamat : </b>' + alamat + 
                     '<br><b> Jam Operasi : </b>' + jamoperasi + '</p>'+
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/spbu.png') }}"
              });
                
        var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });

        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
    }
    else{
      markers15[i].setMap(null);
    }
  }
}

function makam(){
  for(var i = 0; i < tpu.length; i++){
    markers16[i] = addMarker(tpu[i]);
  }
   function addMarker(tpu){
    if(btn16.checked){
        var nama = tpu.nama_tempat;
        var alamat = tpu.alamat;
        var kec = tpu.kecamatan;
        var koordinat = tpu.koordinat;
        var latitude = parseFloat(koordinat.split(',')[0]);
        var longitude = parseFloat(koordinat.split(',')[1]);
        
        var konten = '<div id="iw-container"class="w3-animate-zoom">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     '<div class="iw-subTitle">Informasia</div>' +
                     '<img src="{{ asset('storage/img_tpu/tpu.jpg') }}" width="83">' +
                     '<p><b> Kecamatan : </b>' + kec +
                     '<br><b> Alamat : </b>' + alamat + '</p>'+
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/tpu.png') }}"
              });
                
        var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });

        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
    }
    else{
      markers16[i].setMap(null);
    }
  }
}

function raga(){
  for(var i = 0; i < olahraga.length; i++){
    markers17[i] = addMarker(olahraga[i]);
  }
   function addMarker(olahraga){
    if(btn17.checked){
        var nama = olahraga.nama_tempat;
        var alamat = olahraga.alamat;
        var kec = olahraga.kecamatan;
        var deskripsi = olahraga.gambaran_umum;
        var koordinat = olahraga.koordinat;
        var latitude = parseFloat(koordinat.split(',')[0]);
        var longitude = parseFloat(koordinat.split(',')[1]);
        
        var konten = '<div id="iw-container"class="w3-animate-zoom">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     '<div class="iw-subTitle">Deskripsi</div>' +
                     '<img src="{{ asset('storage/img_olahraga/gor.jpg') }}" width="83">' +
                     '<p>' + deskripsi + '</p>' +
                     '<div class="iw-subTitle">Informasi Lainnya</div>' +
                     '<p><b> Kecamatan : </b>' + kec +
                     '<br><b> Alamat : </b>' + alamat +
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/gor.png') }}"
              });
                
        var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });

        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
    }
    else{
      markers17[i].setMap(null);
    }
  }
}

function mol(){
  for(var i = 0; i < mall.length; i++){
    markers18[i] = addMarker(mall[i]);
  }
   function addMarker(mall){
    if(btn18.checked){
        var nama = mall.nama_tempat;
        var alamat = mall.alamat;
        var kec = mall.kecamatan;
        var koordinat = mall.koordinat;
        var jamoperasi = mall.jam_operasional;
        var telp = mall.no_telp;
        var latitude = parseFloat(koordinat.split(',')[0]);
        var longitude = parseFloat(koordinat.split(',')[1]);
        
        var konten = '<div id="iw-container"class="w3-animate-zoom">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     '<div class="iw-subTitle">Informasi</div>' +
                     '<img src="{{ asset('storage/img_mall/mall.jpg') }}" width="83">' +
                     '<p><b> Kecamatan : </b>' + kec +
                     '<br><b> Alamat : </b>' + alamat + 
                     '<br><b> Jam Operasi : </b>' + jamoperasi + 
                     '<br><b> Telepon : </b>' + telp +'</p>'+
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/mall.png') }}"
              });
                
        var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });

        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
    }
    else{
      markers18[i].setMap(null);
    }
  }
}

function kirim(){
  for(var i = 0; i < pengiriman.length; i++){
    markers19[i] = addMarker(pengiriman[i]);
  }
   function addMarker(pengiriman){
    if(btn19.checked){
        var nama = pengiriman.nama_tempat;
        var alamat = pengiriman.alamat;
        var kec = pengiriman.kecamatan;
        var koordinat = pengiriman.koordinat;
        var jamoperasi = pengiriman.jam_operasional;
        var telp = pengiriman.no_telp;
        var latitude = parseFloat(koordinat.split(',')[0]);
        var longitude = parseFloat(koordinat.split(',')[1]);
        
        var konten = '<div id="iw-container"class="w3-animate-zoom">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     '<div class="iw-subTitle">Informasi</div>' +
                     '<img src="{{ asset('storage/img_jpengiriman/pengiriman.jpg') }}" width="83">' +
                     '<p><b> Kecamatan : </b>' + kec +
                     '<br><b> Alamat : </b>' + alamat + 
                     '<br><b> Jam Operasi : </b>' + jamoperasi + 
                     '<br><b> Telepon : </b>' + telp +'</p>'+
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/pengiriman.png') }}"
              });
                
        var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });

        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
    }
    else{
      markers19[i].setMap(null);
    }
  }
}

function camat(){
  for(var i = 0; i < kecamatan.length; i++){
    markers20[i] = addMarker(kecamatan[i]);
  }
   function addMarker(kecamatan){
    if(btn20.checked){
        var nama = kecamatan.nama_kecamatan;
        var namcam = kecamatan.nama_camat;
        var alamat = kecamatan.alamat;
        var koordinat = kecamatan.koordinat;
        var latitude = parseFloat(koordinat.split(',')[0]);
        var longitude = parseFloat(koordinat.split(',')[1]);
        
        var konten = '<div id="iw-container"class="w3-animate-zoom">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     '<div class="iw-subTitle">Informasi Umum</div>' +
                     '<img src="{{ asset('storage/img_kecamatan/no image.jpg') }}" width="83">' +
                     '<p><b> Kepala Camat : </b>' + namcam + '</p>' +
                     '<div class="iw-subTitle">Informasi Lainnya</div>' +
                     '<br><b> Alamat : </b>' + alamat + '</p>'
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/kecamatan.png') }}"
              });
                
        var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });

        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
    }
    else{
      markers20[i].setMap(null);
    }
  }
}

function listrik(){
  for(var i = 0; i < pln.length; i++){
    markers21[i] = addMarker(pln[i]);
  }
   function addMarker(pln){
    if(btn21.checked){
        var nama = pln.nama_tempat;
        var alamat = pln.alamat;
        var telp = pln.no_telp;
        var jamoperasi = pln.jam_operasional;
        var koordinat = pln.koordinat;
        var latitude = parseFloat(koordinat.split(',')[0]);
        var longitude = parseFloat(koordinat.split(',')[1]);
        
        var konten = '<div id="iw-container" class="w3-animate-zoom" style="width:100%;">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     '<div class="iw-subTitle">Informasi</div>' +
                     '<img src="{{ asset('storage/img_pln/pln.jpg') }}" width="83">' +
                     '<p><b> Alamat : </b>' + alamat +
                     '<br><b> Jam Operasi : </b>' + jamoperasi + 
                     '<br><b> Telepon : </b>' + telp + '</p>'
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/pln.png') }}"
              });
                
        var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });

        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
    }
    else{
      markers21[i].setMap(null);
    }
  }
}

function kebakar(){
  for(var i = 0; i < damkar.length; i++){
    markers22[i] = addMarker(damkar[i]);
  }
   function addMarker(damkar){
    if(btn22.checked){
        var nama = damkar.nama_tempat;
        var alamat = damkar.alamat;
        var telp = damkar.no_telp;
        var jamoperasi = damkar.jam_operasional;
        var camat = damkar.kecamatan;
        var koordinat = damkar.koordinat;
        var latitude = parseFloat(koordinat.split(',')[0]);
        var longitude = parseFloat(koordinat.split(',')[1]);

        var konten = '<div id="iw-container" class="w3-animate-zoom" style="width:100%;">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     '<div class="iw-subTitle">Informasi</div>' +
                     '<img src="{{ asset('storage/img_damkar/damkar.jpg') }}" width="83">' +
                     '<p><b> Kecamatan : </b>' + camat +
                     '<br><b> Alamat : </b>' + alamat +
                     '<br><b> Jam Operasi : </b>' + jamoperasi + 
                     '<br><b> Telepon : </b>' + telp + '</p>'
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/damkar.png') }}"
              });
                
        var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });

        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
    }
    else{
      markers22[i].setMap(null);
    }
  }
}

function dasar(){
  for(var i = 0; i < sd.length; i++){
    markers23[i] = addMarker(sd[i]);
  }
   function addMarker(sd){
    if(btn23.checked){
        var nama = sd.nama_tempat;
        var alamat = sd.alamat;
        var telp = sd.no_telp;
        var jamoperasi = sd.jam_operasional;
        var camat = sd.kecamatan;
        var koordinat = sd.koordinat;
        var latitude = parseFloat(koordinat.split(',')[0]);
        var longitude = parseFloat(koordinat.split(',')[1]);
        
        var konten = '<div id="iw-container" class="w3-animate-zoom" style="width:100%;">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     '<div class="iw-subTitle">Informasi</div>' +
                     '<img src="{{ asset('storage/img_pd/sd.jpg') }}" width="83">' +
                     '<p><b> Kecamatan : </b>' + camat +
                     '<br><b> Alamat : </b>' + alamat +
                     '<br><b> Jam Operasi : </b>' + jamoperasi + 
                     '<br><b> Telepon : </b>' + telp + '</p>'
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/sd.png') }}"
              });

        var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });

        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
    }
    else{
      markers23[i].setMap(null);
    }
  }
}

function pertama(){
  for(var i = 0; i < smp.length; i++){
    markers24[i] = addMarker(smp[i]);
  }
   function addMarker(smp){
    if(btn24.checked){
        var nama = smp.nama_tempat;
        var alamat = smp.alamat;
        var telp = smp.no_telp;
        var jamoperasi = smp.jam_operasional;
        var camat = smp.kecamatan;
        var koordinat = smp.koordinat;
        var latitude = parseFloat(koordinat.split(',')[0]);
        var longitude = parseFloat(koordinat.split(',')[1]);
        
        var konten = '<div id="iw-container" class="w3-animate-zoom" style="width:100%;">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     '<div class="iw-subTitle">Informasi</div>' +
                     '<img src="{{ asset('storage/img_smp/smp.jpg') }}" width="83">' +
                     '<p><b> Kecamatan : </b>' + camat +
                     '<br><b> Alamat : </b>' + alamat +
                     '<br><b> Jam Operasi : </b>' + jamoperasi + 
                     '<br><b> Telepon : </b>' + telp + '</p>'
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/smp.png') }}"
              });
                
        var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });

        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
    }
    else{
      markers24[i].setMap(null);
    }
  }
}

function atas(){
  for(var i = 0; i < sma.length; i++){
    markers25[i] = addMarker(sma[i]);
  }
   function addMarker(sma){
    if(btn25.checked){
        var nama = sma.nama_tempat;
        var alamat = sma.alamat;
        var telp = sma.no_telp;
        var jamoperasi = sma.jam_operasional;
        var camat = sma.kecamatan;
        var ktgri = sma.kategori;
        var semua;
        var koordinat = sma.koordinat;
        var latitude = parseFloat(koordinat.split(',')[0]);
        var longitude = parseFloat(koordinat.split(',')[1]);
        var konten = '<div id="iw-container" class="w3-animate-zoom" style="width:100%;">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     '<div class="iw-subTitle">Informasi</div>' +
                     '<img src="{{ asset('storage/img_sma/sma.jpg') }}" width="83">' +
                     '<p><b> Kecamatan : </b>' + camat +
                     '<br><b> Alamat : </b>' + alamat +
                     '<br><b> Jam Operasi : </b>' + jamoperasi + 
                     '<br><b> Telepon : </b>' + telp + '</p>'
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        if(ktgri == "SMA"){
          semua = "{{ asset('img/marker/sma.png') }}"
        }
        else if (ktgri == "SMK") {
          semua = "{{ asset('img/marker/smk.png') }}"
        }
        else if(ktgri == "MA"){
          semua = "{{ asset('img/marker/MA.png') }}"
        }
        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: semua
              });
                
        var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });

        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
    }
    else{
      markers25[i].setMap(null);
    }
  }
}

function luar(){
  for(var i = 0; i < slb.length; i++){
    markers26[i] = addMarker(slb[i]);
  }
   function addMarker(slb){
    if(btn26.checked){
        var nama = slb.nama_tempat;
        var alamat = slb.alamat;
        var telp = slb.no_telp;
        var jamoperasi = slb.jam_operasional;
        var camat = slb.kecamatan;
        var koordinat = slb.koordinat;
        var latitude = parseFloat(koordinat.split(',')[0]);
        var longitude = parseFloat(koordinat.split(',')[1]);
        
        var konten = '<div id="iw-container" class="w3-animate-zoom" style="width:100%;">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     '<div class="iw-subTitle">Informasi</div>' +
                     '<img src="{{ asset('storage/img_slb/slb.jpg') }}" width="83">' +
                     '<p><b> Kecamatan : </b>' + camat +
                     '<br><b> Alamat : </b>' + alamat +
                     '<br><b> Jam Operasi : </b>' + jamoperasi + 
                     '<br><b> Telepon : </b>' + telp + '</p>'
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/SLB.png') }}"
              });
                
        var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });

        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
    }
    else{
      markers26[i].setMap(null);
    }
  }
}

function perpus(){
  for(var i = 0; i < perpustakaan.length; i++){
    markers27[i] = addMarker(perpustakaan[i]);
  }
   function addMarker(perpustakaan){
    if(btn27.checked){
        var nama = perpustakaan.nama_tempat;
        var alamat = perpustakaan.alamat;
        var telp = perpustakaan.no_telp;
        var jamoperasi = perpustakaan.jam_operasional;
        var camat = perpustakaan.kecamatan;
        var koordinat = perpustakaan.koordinat;
        var latitude = parseFloat(koordinat.split(',')[0]);
        var longitude = parseFloat(koordinat.split(',')[1]);
        
        var konten = '<div id="iw-container" class="w3-animate-zoom" style="width:100%;">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     '<div class="iw-subTitle">Informasi</div>' +
                     '<img src="{{ asset('storage/img_perpus/perpus.jpg') }}" width="83">' +
                     '<p><b> Kecamatan : </b>' + camat +
                     '<br><b> Alamat : </b>' + alamat +
                     '<br><b> Jam Operasi : </b>' + jamoperasi + 
                     '<br><b> Telepon : </b>' + telp + '</p>'
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/perpus.png') }}"
              });
                
        var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });

        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
    }
    else{
      markers27[i].setMap(null);
    }
  }
}

function polis(){
  for(var i = 0; i < polisi.length; i++){
    markers28[i] = addMarker(polisi[i]);
  }
   function addMarker(polisi){
    if(btn28.checked){
        var nama = polisi.nama_tempat;
        var alamat = polisi.alamat;
        var telp = polisi.no_telp;
        var jamoperasi = polisi.jam_operasional;
        var deskripsi = polisi.gambaran_umum;
        var camat = polisi.kecamatan;
        var koordinat = polisi.koordinat;
        var latitude = parseFloat(koordinat.split(',')[0]);
        var longitude = parseFloat(koordinat.split(',')[1]);
        
        var konten = '<div id="iw-container" class="w3-animate-zoom" style="width:100%;">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     '<div class="iw-subTitle">Informasi</div>' +
                     '<img src="{{ asset('storage/img_pospolisi/polisi.jpg') }}" width="83">' +
                     '<p><b> Kecamatan : </b>' + camat +
                     '<br><b> Alamat : </b>' + alamat +
                     '<br><b> Jam Operasi : </b>' + jamoperasi + 
                     '<br><b> Telepon : </b>' + telp + '</p>'
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/pos_polisi.png') }}"
              });
                
        var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });

        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
    }
    else{
      markers28[i].setMap(null);
    }
  }
}

function kampus(){
  for(var i = 0; i < universitas.length; i++){
    markers29[i] = addMarker(universitas[i]);
  }
   function addMarker(universitas){
    if(btn29.checked){
        var nama = universitas.nama_tempat;
        var alamat = universitas.alamat;
        var telp = universitas.no_telp;
        var jamoperasi = universitas.jam_operasional;
        var deskripsi = universitas.gambaran_umum;
        var camat = universitas.kecamatan;
        var web = universitas.website;
        var koordinat = universitas.koordinat;
        var latitude = parseFloat(koordinat.split(',')[0]);
        var longitude = parseFloat(koordinat.split(',')[1]);
        
        var konten = '<div id="iw-container" class="w3-animate-zoom" style="width:100%;">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     '<div class="iw-subTitle">Informasi</div>' +
                     '<img src="{{ asset('storage/img_universitas/universitas.jpg') }}" width="83">' +
                     '<p><b> Kecamatan : </b>' + camat +
                     '<br><b> Alamat : </b>' + alamat +
                     '<br><b> Jam Operasi : </b>' + jamoperasi + 
                     '<br><b> Telepon : </b>' + telp + 
                     '<br><b> Website : </b>' + web + '</p>'
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/universitas.png') }}"
              });
                
        var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });

        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
    }
    else{
      markers29[i].setMap(null);
    }
  }
}

function tentara(){
  for(var i = 0; i < tni.length; i++){
    markers30[i] = addMarker(tni[i]);
  }
   function addMarker(tni){
    if(btn30.checked){
        var nama = tni.nama_tempat;
        var alamat = tni.alamat;
        var telp = tni.no_telp;
        var jamoperasi = tni.jam_operasional;
        var deskripsi = tni.gambaran_umum;
        var camat = tni.kecamatan;
        var web = tni.website;
        var koordinat = tni.koordinat;
        var latitude = parseFloat(koordinat.split(',')[0]);
        var longitude = parseFloat(koordinat.split(',')[1]);
        
        var konten = '<div id="iw-container" class="w3-animate-zoom" style="width:100%;">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     // '<div class="iw-subTitle">Deskripsi</div>' +
                     '<img src="{{ asset('storage/img_tni/tni.jpg') }}" width="83">' +
                     // '<p>' + deskripsi + '</p>' +
                     '<div class="iw-subTitle">Informasi Lainnya</div>' +
                     '<p><b> Kecamatan : </b>' + camat +
                     '<br><b> Alamat : </b>' + alamat +
                     '<br><b> Jam Operasi : </b>' + jamoperasi + 
                     '<br><b> Telepon : </b>' + telp + 
                     '<br><b> Website : </b>' + web + '</p>'
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/tni.png') }}"
              });
                
        var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });

        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
    }
    else{
      markers30[i].setMap(null);
    }
  }
}

function pabrik(){
  for(var i = 0; i < industri.length; i++){
    markers31[i] = addMarker(industri[i]);
  }
   function addMarker(industri){
    if(btn31.checked){
        var nama = industri.nama_tempat;
        var alamat = industri.alamat;
        var telp = industri.no_telp;
        var jamoperasi = industri.jam_operasional;
        var deskripsi = industri.gambaran_umum;
        var camat = industri.kecamatan;
        var web = industri.website;
        var koordinat = industri.koordinat;
        var latitude = parseFloat(koordinat.split(',')[0]);
        var longitude = parseFloat(koordinat.split(',')[1]);
        
        var konten = '<div id="iw-container" class="w3-animate-zoom" style="width:100%;">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     // '<div class="iw-subTitle">Deskripsi</div>' +
                     '<img src="{{ asset('storage/default/no image.jpg') }}" width="83">' +
                     // '<p>' + deskripsi + '</p>' +
                     '<div class="iw-subTitle">Informasi Lainnya</div>' +
                     '<p><b> Kecamatan : </b>' + camat +
                     '<br><b> Alamat : </b>' + alamat +
                     '<br><b> Jam Operasi : </b>' + jamoperasi + 
                     '<br><b> Telepon : </b>' + telp + 
                     '<br><b> Website : </b>' + web + '</p>'
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/industri.png') }}"
              });
                
        var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });

        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
    }
    else{
      markers31[i].setMap(null);
    }
  }
}

function tabung(){
  for(var i = 0; i < bank.length; i++){
    markers32[i] = addMarker(bank[i]);
  }
   function addMarker(bank){
    if(btn32.checked){
        var nama = bank.nama_tempat;
        var alamat = bank.alamat;
        var telp = bank.no_telp;
        var jamoperasi = bank.jam_operasional;
        var deskripsi = bank.gambaran_umum;
        var camat = bank.kecamatan;
        var web = bank.website;
        var koordinat = bank.koordinat;
        var latitude = parseFloat(koordinat.split(',')[0]);
        var longitude = parseFloat(koordinat.split(',')[1]);
        
        var konten = '<div id="iw-container" class="w3-animate-zoom" style="width:100%;">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     // '<div class="iw-subTitle">Deskripsi</div>' +
                     '<img src="{{ asset('storage/default/no image.jpg') }}" width="83">' +
                     // '<p>' + deskripsi + '</p>' +
                     '<div class="iw-subTitle">Informasi Lainnya</div>' +
                     '<p><b> Kecamatan : </b>' + camat +
                     '<br><b> Alamat : </b>' + alamat +
                     '<br><b> Jam Operasi : </b>' + jamoperasi + 
                     '<br><b> Telepon : </b>' + telp + 
                     '<br><b> Website : </b>' + web + '</p>'
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/bank.png') }}"
              });
                
        var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });

        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
    }
    else{
      markers32[i].setMap(null);
    }
  }
}

function kantoran(){
  for(var i = 0; i < kantor.length; i++){
    markers33[i] = addMarker(kantor[i]);
  }
   function addMarker(kantor){
    if(btn33.checked){
        var nama = kantor.nama_tempat;
        var alamat = kantor.alamat;
        var telp = kantor.no_telp;
        var jamoperasi = kantor.jam_operasional;
        var deskripsi = kantor.gambaran_umum;
        var camat = kantor.kecamatan;
        var web = kantor.website;
        var koordinat = kantor.koordinat;
        var asal = kantor.sumber;
        var latitude = parseFloat(koordinat.split(',')[0]);
        var longitude = parseFloat(koordinat.split(',')[1]);
        var konten = '<div id="iw-container" class="w3-animate-zoom" style="width:100%;">' +
                     '<div class="iw-title">' + nama + '</div>' +
                     '<div class="iw-content scrollbar style-7">' +
                     '<img src="{{ asset('storage/default/no image.jpg') }}" width="83">' +
                     '<div class="iw-subTitle">Informasi Lainnya</div>' +
                     '<p><b> Kecamatan : </b>' + camat +
                     '<br><b> Alamat : </b>' + alamat +
                     '<br><b> Jam Operasi : </b>' + jamoperasi + 
                     '<br><b> Telepon : </b>' + telp + 
                     '<br><b> Website : </b>' + web + 
                     '<br><b> sumber : </b>' + asal + '</p>'
                     '<div class="iw-bottom-gradient"></div>' +
                     '</div>' +
                     '</div>';

        var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/rs.png') }}"
              });
                
        var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });

        google.maps.event.addListener(infoWindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          iwOuter.css({top: '17px'});

          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 317px !important;'});
          iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 193px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '27px', top: '8px', border: '7px solid #5684c4', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });

        var infoWnd = new google.maps.InfoWindow();
        // infoWnd.setContent('<div class="scrollFix">' +  nama + '</div>');
        var infoWnd = new google.maps.InfoWindow();           
        infoWnd.setContent(nama)
        var activeInfoWindow ;

        google.maps.event.addListener(mark, 'mouseover', function() {              
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.close();
          infoWnd.open(map, mark);
          activeInfoWindow = infoWnd;       
        });   

        google.maps.event.addListener(mark, 'mouseout', function() {
          infoWnd.close();  
        });

        google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
          if(activeInfoWindow != null) activeInfoWindow.close();
          infoWindow.open(map, mark);
          infoWnd.close();
          activeInfoWindow = infoWindow;
        });
        return mark;
    }
    else{
      markers33[i].setMap(null);
    }
  }
}

function hapus(){
  if(btn.checked){
    for(var i = 0; i < pdam.length; i++){
      btn.checked = false;
    markers[i].setMap(null);
  }
}

if(btn2.checked){
    for(var i = 0; i < pasar.length; i++){
      btn2.checked = false;
    markers2[i].setMap(null);
  }
}

  if(btn3.checked){
    for(var i = 0; i < kuliner.length; i++){
      btn3.checked = false;
    markers3[i].setMap(null);
  }
}

  if(btn4.checked){
    for(var i = 0; i < kelurahan.length; i++){
      btn4.checked = false;
    markers4[i].setMap(null);
  }
}

  if(btn5.checked){
    for(var i = 0; i < apotek.length; i++){
      btn5.checked = false;
    markers5[i].setMap(null);
  }
}

  if(btn6.checked){
    for(var i = 0; i < klinik.length; i++){
      btn6.checked = false;
    markers6[i].setMap(null);
  }
}

  if(btn7.checked){
    for(var i = 0; i < rumah_sakit.length; i++){
      btn7.checked = false;
    markers7[i].setMap(null);
  }
}

  if(btn8.checked){
    for(var i = 0; i < puskesmas.length; i++){
      btn8.checked = false;
    markers8[i].setMap(null);
  }
}

  if(btn9.checked){
    for(var i = 0; i < bidan.length; i++){
      btn9.checked = false;
    markers9[i].setMap(null);
  }
}

//   if(btn10.checked){
//     for(var i = 0; i < supermarket.length; i++){
//       btn10.checked = false;
//     markers10[i].setMap(null);
//   }
// }

  if(indomart.checked){
    for(var i = 0; i < indomaret.length; i++){
      indomart.checked = false;
    markersindomaret[i].setMap(null);
  }
}

  if(alfamat.checked){
    for(var i = 0; i < alfamart.length; i++){
      alfamat.checked = false;
    markersalfamart[i].setMap(null);
  }
}

  if(alfamid.checked){
    for(var i = 0; i < alfamidi.length; i++){
      alfamid.checked = false;
    markersalfamidi[i].setMap(null);
  }
}

  if(besar.checked){
    for(var i = 0; i < markt.length; i++){
      besar.checked = false;
    markerssuper[i].setMap(null);
  }
}

  if(btn11.checked){
    for(var i = 0; i < ukm.length; i++){
      btn11.checked = false;
    markers11[i].setMap(null);
  }
}

  if(btn12.checked){
    for(var i = 0; i < taman.length; i++){
      btn12.checked = false;
    markers12[i].setMap(null);
  }
}

  if(btn13.checked){
    for(var i = 0; i < tempatwisata.length; i++){
      btn13.checked = false;
    markers13[i].setMap(null);
  }
}

  if(btn14.checked){
    for(var i = 0; i < tempatibadah.length; i++){
      btn14.checked = false;
    markers14[i].setMap(null);
  }
}

  if(btn15.checked){
    for(var i = 0; i < spbu.length; i++){
      btn15.checked = false;
    markers15[i].setMap(null);
  }
}

  if(btn16.checked){
    for(var i = 0; i < tpu.length; i++){
      btn16.checked = false;
    markers16[i].setMap(null);
  }
}

  if(btn17.checked){
    for(var i = 0; i < olahraga.length; i++){
      btn17.checked = false;
    markers17[i].setMap(null);
  }
}

  if(btn18.checked){
    for(var i = 0; i < mall.length; i++){
      btn18.checked = false;
    markers18[i].setMap(null);
  }
}

  if(btn19.checked){
    for(var i = 0; i < pengiriman.length; i++){
      btn19.checked = false;
    markers19[i].setMap(null);
  }
}

  if(btn20.checked){
    for(var i = 0; i < kecamatan.length; i++){
      btn20.checked = false;
    markers20[i].setMap(null);
  }
}

  if(btn21.checked){
    for(var i = 0; i < pln.length; i++){
      btn21.checked = false;
    markers21[i].setMap(null);
  }
}

  if(btn22.checked){
    for(var i = 0; i < damkar.length; i++){
      btn22.checked = false;
    markers22[i].setMap(null);
  }
}

  if(btn23.checked){
    for(var i = 0; i < sd.length; i++){
      btn23.checked = false;
    markers23[i].setMap(null);
  }
}

  if(btn24.checked){
    for(var i = 0; i < smp.length; i++){
      btn24.checked = false;
    markers24[i].setMap(null);
  }
}

  if(btn25.checked){
    for(var i = 0; i < sma.length; i++){
      btn25.checked = false;
    markers25[i].setMap(null);
  }
}

  if(btn26.checked){
    for(var i = 0; i < slb.length; i++){
      btn26.checked = false;
    markers26[i].setMap(null);
  }
}

  if(btn27.checked){
    for(var i = 0; i < perpustakaan.length; i++){
      btn27.checked = false;
    markers27[i].setMap(null);
  }
}

  if(btn28.checked){
    for(var i = 0; i < polisi.length; i++){
      btn28.checked = false;
    markers28[i].setMap(null);
  }
}

  if(btn29.checked){
    for(var i = 0; i < universitas.length; i++){
      btn29.checked = false;
    markers29[i].setMap(null);
  }
}

  if(btn30.checked){
    for(var i = 0; i < tni.length; i++){
      btn30.checked = false;
    markers30[i].setMap(null);
  }
}

  if(btn31.checked){
    for(var i = 0; i < industri.length; i++){
      btn31.checked = false;
    markers31[i].setMap(null);
  }
}

  if(btn32.checked){
    for(var i = 0; i < bank.length; i++){
      btn32.checked = false;
    markers32[i].setMap(null);
  }
}

  if(btn33.checked){
    for(var i = 0; i < kantor.length; i++){
      btn33.checked = false;
    markers33[i].setMap(null);
  }
}

  if(all.checked){
    all.checked = false;
    $("#lur").hide();
    layer_1.setMap(null);
}

  if(rth.checked){
    rth.checked = false;
    layer_2.setMap(null);
}
  if(kali.checked){
    kali.checked = false;
    layer_3.setMap(null);
}
  if(kin.checked){
    kin.checked = false;
    $("#kemis").hide();
    layer_4.setMap(null);
}
  if(train.checked){
    train.checked = false;
    layer_5.setMap(null);
}
  if(idu.checked){
    idu.checked = false;
    $("#indi").hide();
    layer_6.setMap(null);
}
  if(kll.checked){
    kll.checked = false;
    $("#pet").hide();
    layer_0.setMap(null);
}
// $("#erase").show();
// setTimeout(function(){ $("#erase").hide();}, 1000);
}

</script>
<script>
// Change style of navbar on scroll
window.onscroll = function() {myFunction()};
function myFunction() {
    var navbar = document.getElementById("myNavbar");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        navbar.className = "w3-bar" + " w3-card-2" + " w3-animate-top" + " w3-white";
    } else {
        // navbar.className = navbar.className.replace(" w3-card-2 w3-animate-top w3-white", "");
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
</script>
<script>
function dropdown() {
    var x = document.getElementById("dropdown1");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>
<script>
var openInbox = document.getElementById("myBtn");
openInbox.click();

function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

function myFunc(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-border-bottom";
    } else {
        x.className = x.className.replace(" w3-show", "");
        x.previousElementSibling.className =
        x.previousElementSibling.className.replace(" w3-border-bottom", "");
    }
}
</script>

</body>
</html>