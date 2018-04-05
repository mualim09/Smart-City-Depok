<!DOCTYPE html>
<html>
<head>
  <title>Maps | Sipp Kling</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
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
  @media  only screen and (max-width: 500px) {
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

<body>
<div class="w3-top">
  <div class="w3-bar">
    <div class="w3-right w3-padding-16" style="margin-right:0.5em;letter-spacing:1px">
      <div class="w3-bar-item w3-large">
        <button class="w3-btn float-btn w3-circle w3-green w3-text-white" id="all" onclick="hapus()"><i class="fa fa-refresh w3-hover-opacity"></i></button>
        <button onclick="dropdown()" class="w3-btn float-btn w3-circle w3-blue-gray w3-text-white"><i class="fa fa-bars w3-hover-opacity"></i></button>
        <a href="/"><button class="w3-btn float-btn w3-circle w3-orange w3-text-white"><i class="fa fa-home w3-hover-opacity"></i></button></a>
      </div>
    </div>
  </div>
  <div id="dropdown1" class="responsive scrollbar style-7 w3-dropdown-content w3-bar-block w3-card-4 w3-animate-zoom">
    <div class="w3-bar">
      <a id="myBtn" onclick="myFunc('data-angler-1')" href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom" style="padding: 12px 1.5em;"><i class="fa fa-map-signs w3-medium" style="margin-right: 7px;"></i> Kecamatan</a>
      <div id="data-angler-1" class="w3-hide w3-animate-left w3-text-gray" style="padding: 1em 2em 1em; border-bottom: 1px solid #ccc;">
        @foreach($kecamatans as $data)
          <input type="checkbox" class="checkbox" onclick="anglerWithParam(this.id)" id="core-<?= str_replace(' ', '', $data->kecamatan) ?>">{{ $data->kecamatan }}<br>
        @endforeach
        <!-- kelurahan untuk kecamatan masih statis -->
        <div id="core-Limo" style="display: none; margin-left: 10px;">
          <input type="checkbox" class="checkbox">LIMO<br>
          <input type="checkbox" class="checkbox">GROGOL<br>
          <input type="checkbox" class="checkbox">KRUKUT<br>
          <input type="checkbox" class="checkbox">MERUYUNG<br>
        </div>
      </div>
      <a id="myBtn" onclick="myFunc('data-angler-2')" href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom" style="padding: 12px 1.5em;"><i class="fa fa-home w3-medium" style="margin-right: 7px;"></i> Rumah Sehat</a>
      <div id="data-angler-2" class="w3-hide w3-animate-left w3-text-gray" style="padding: 1em 2em 1em; border-bottom: 1px solid #ccc;">

        <div style="margin-left: 10px;">
          <input type="checkbox" class="checkbox">Sehat<br>
          <input type="checkbox" class="checkbox">Tidak Sehat<br>
        </div>
      </div>

      <a id="myBtn" onclick="myFunc('data-angler-3')" href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom" style="padding: 12px 1.5em;"><i class="fa fa-home w3-medium" style="margin-right: 7px;"></i> TTU</a>
      <div id="data-angler-3" class="w3-hide w3-animate-left w3-text-gray" style="padding: 1em 2em 1em; border-bottom: 1px solid #ccc;">
        <!-- kelurahan untuk kecamatan masih statis -->
        <div style="margin-left: 10px;">
          <input type="checkbox" class="checkbox" onclick="anglerWithParam(this.id)" id="masjid">Masjid<br>

            <div id="masjid" style="display: none; margin-left: 10px;">
                <input type="checkbox" class="checkbox">Layak<br>
                <input type="checkbox" class="checkbox">Tidak Layak<br>
            </div>
          <input type="checkbox" class="checkbox">Sekolah<br>
          <input type="checkbox" class="checkbox">Kolam<br>
        </div>
      </div>

      <a id="myBtn" onclick="myFunc('data-angler-4')" href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom" style="padding: 12px 1.5em;"><i class="fa fa-cutlery w3-medium" style="margin-right: 7px;"></i> TPM</a>
      <div id="data-angler-4" class="w3-hide w3-animate-left w3-text-gray" style="padding: 1em 2em 1em; border-bottom: 1px solid #ccc;">
        
        <div style="margin-left: 10px;">
          <input type="checkbox" class="checkbox">Kuliner<br>
          <input type="checkbox" class="checkbox">Jasaboga<br>
        </div>
      
      </div>

      <a id="myBtn" onclick="myFunc('data-angler-5')" href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom" style="padding: 12px 1.5em;"><i class="fa fa-briefcase  w3-medium" style="margin-right: 7px;"></i> PKL</a>
      <div id="data-angler-5" class="w3-hide w3-animate-left w3-text-gray" style="padding: 1em 2em 1em; border-bottom: 1px solid #ccc;">
        
        <div style="margin-left: 10px;">
          <input type="checkbox" class="checkbox">Luar Gedung<br>
          <input type="checkbox" class="checkbox">Dalam Gedung<br>
        </div>
      
      </div>
      </div>
    </div>
  </div>
</div>


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

function anglerWithParam(param){
  var target = $('div#'+param);
  var param = document.getElementById(param);
  if(target.prop('checked')){
    target.toggle();
  } else {
    target.toggle();
    target.find('input:checkbox').removeAttr('checked');
  }
}
</script>

</body>
</html>