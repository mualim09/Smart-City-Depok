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
  padding: 0px 15px;
  max-height: 135px;
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
  .legend {
    height: 70%;
    margin: 9.5em 0.5em;
    width: 200px;
    background-color: #607d8bc2;
    border: 1px #4083c0 solid;
    color: white;
  }
  .w3-table td {
    padding: 0;
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
      <a id="myBtn" onclick="myFunc('Demo1')" href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom" style="padding: 12px 1.5em;"><i class="fa fa-map-signs w3-medium" style="margin-right: 7px;"></i> Batas Administrasi</a>
      <div id="Demo1" class="w3-hide w3-animate-left w3-text-gray" style="padding: 5px 2em 1em; border-bottom: 1px solid #ccc;">
        <input type="checkbox" class="checkbox" id="kec" onclick="camat()"> Kantor Kecamatan <br>
        <input type="checkbox" class="checkbox" id="kel" onclick="klrhn()"> Kantor Kelurahan <br>
      </div>
      <a id="myBtn" onclick="myFunc('data-angler-1')" href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom" style="padding: 12px 1.5em;"><i class="fa fa-line-chart w3-medium" style="margin-right: 7px;"></i> Kecamatan Limo</a>
      <div id="data-angler-1" class="w3-hide w3-animate-left w3-text-gray" style="padding: 1em 2em 1em; border-bottom: 1px solid #ccc;">
        <input type="checkbox" class="checkbox" id="sehat" onclick="rumahsehat()">Rumah Sehat<br>
        <input type="checkbox" class="checkbox" id="rts" onclick="tidaksehat()">Rumah Tidak Sehat<br>
      </div>     
      <a id="myBtn" onclick="myFunc('Demo2')" href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom" style="padding: 12px 1.5em;"><i class="fa fa-line-chart w3-medium" style="margin-right: 7px;"></i> Kecamatan Grogol</a>
      <div id="Demo2" class="w3-hide w3-animate-left w3-text-gray" style="padding: 5px 2em 1em; border-bottom: 1px solid #ccc;">
        <input type="checkbox" class="checkbox" id="grs" onclick="gro()">Rumah Sehat<br>
        <input type="checkbox" class="checkbox" id="gts" onclick="grots()">Rumah Tidak Sehat<br>
      </div>
      <a id="myBtn" onclick="myFunc('Demo3')" href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom" style="padding: 12px 1.5em;"><i class="fa fa-line-chart w3-medium" style="margin-right: 7px;"></i> Kecamatan Krukut</a>
      <div id="Demo3" class="w3-hide w3-animate-left w3-text-gray" style="padding: 5px 2em 1em; border-bottom: 1px solid #ccc;">
        <input type="checkbox" class="checkbox" id="krs" onclick="kru()">Rumah Sehat<br>
        <input type="checkbox" class="checkbox" id="kts" onclick="kruts()">Rumah Tidak Sehat<br>
      </div>
      <a id="myBtn" onclick="myFunc('Demo4')" href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom" style="padding: 12px 1.5em;"><i class="fa fa-line-chart w3-medium" style="margin-right: 7px;"></i> Kecamatan Meruyung</a>
      <div id="Demo4" class="w3-hide w3-animate-left w3-text-gray" style="padding: 5px 2em 1em; border-bottom: 1px solid #ccc;">
        <input type="checkbox" class="checkbox" id="mrs" onclick="mer()">Rumah Sehat<br>
        <input type="checkbox" class="checkbox" id="mts" onclick="merts()">Rumah Tidak Sehat<br>
      </div>
    </div>
  </div>
</div>

<!-- Sidebar (hidden by default) -->
<nav class="legend w3-sidebar w3-bar-block w3-card w3-top w3-small w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px; padding: 20px;" id="mySidebar">
  <div class="w3-bar">
    <p> <b>Informasi Lengkap</b></p>
    <table class="w3-table w3-text-white">
      <tr>
        <td>Nama Kepala Keluarga</td><td>:</td><td>Jaanih Narip</td>
      </tr>
      <tr>
        <td>Alamat</td><td>:</td><td>Grogol, Limo, Kota Depok, Jawa</td>
      </tr>
      <tr>
        <td>No. Rumah</td><td>:</td><td>31</td>
      </tr>
      <tr>
        <td>RT</td><td>:</td><td>RT001</td>
      </tr>
      <tr>
        <td>RW</td><td>:</td><td>RW04</td>
      </tr>
      <tr>
        <td>Kelurahan</td><td>:</td><td>Limo</td>
      </tr>
      <tr>
        <td>Jumlah Anggota</td><td>:</td><td>5</td>
      </tr>
      <tr>
        <td>Status</td><td>:</td><td>Rumah Sehat</td>
      </tr>
    </table>
  </div>  
</nav>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAtFnKBeTAorl8rWoo066pk7pwimSpA-w"></script>
<div id="map-canvas"></div>

<script>
var rs = <?php print_r(json_encode($rss)) ?>;
var trs = <?php print_r(json_encode($trss)) ?>;
var grogol =<?php print_r(json_encode($grogols)) ?>;
var grot = <?php print_r(json_encode($grots)) ?>;
var krukut =<?php print_r(json_encode($krukuts)) ?>;
var krut = <?php print_r(json_encode($kruts)) ?>;
var meruyung =<?php print_r(json_encode($meruyungs)) ?>;
var mert = <?php print_r(json_encode($merts)) ?>;
var kecamatan = <?php print_r(json_encode($kecamatans)) ?>;
var kelurahan = <?php print_r(json_encode($kelurahans)) ?>;


var btn = document.getElementById("sehat");
var btn2 = document.getElementById("rts");
var btn3 = document.getElementById("grs");
var btn4 = document.getElementById("gts");
var btn5 = document.getElementById("krs");
var btn6 = document.getElementById("kts");
var btn7 = document.getElementById("mrs");
var btn8 = document.getElementById("mts");
var btn9 = document.getElementById("kec");
var btn10 = document.getElementById("kel");

var map;

var markers = [];
var markers2 = [];
var markers3 = [];
var markers4 = [];
var markers5 = [];
var markers6 = [];
var markers7 = [];
var markers8 = [];
var markers9 = [];
var markers10 = [];

var layer_7;

      function initMap() {
        // Create a map object and specify the DOM element for display.
        map = new google.maps.Map(document.getElementById('map-canvas'), {
          center: {lat: -6.3973829, lng: 106.8126366},
          zoom: 13
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
      google.maps.event.addDomListener(window, 'load', initMap);

function rumahsehat(){
  if(btn.checked){
    document.getElementById("mySidebar").style.width = "200px";
    document.getElementById("mySidebar").style.display = "block";
  }
  for(var i = 0; i < rs.length; i++){
  markers[i] = addMarker(rs[i]); 
}
function addMarker(rs){
  if(btn.checked){
    var nama = rs.nama_kk;
    var alamat = rs.alamat;
    var lurah = rs.kelurahan;
    var koordinat = rs.koordinat;
    var latitude = parseFloat(koordinat.split(',')[0]);
    var longitude = parseFloat(koordinat.split(',')[1]);

    var konten =  '<div id="iw-container"class="w3-animate-zoom">' +
                  '<div class="iw-title">' + 'Rumah Sehat' + '</div>' +
                  '<div class="iw-content scrollbar style-7">' +
                  '<p><b> Nama Pemilik : </b>' + nama +
                  '<br><b> Alamat : </b>' + alamat +
                  '<br><b> Kelurahan : </b>' + lurah + '</p>'+
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
      markers[i].setMap(null);
    }
  }
}

function tidaksehat(){
  if(btn2.checked){
    document.getElementById("mySidebar").style.width = "200px";
    document.getElementById("mySidebar").style.display = "block";
  }
  for(var i = 0; i < trs.length; i++){
    markers2[i] = addMarker(trs[i]); 
}
function addMarker(trs){
  if(btn2.checked){
    var nama = trs.nama_kk;
    var alamat = trs.alamat;
    var lurah = trs.kelurahan;
    var koordinat = trs.koordinat;
    var latitude = parseFloat(koordinat.split(',')[0]);
    var longitude = parseFloat(koordinat.split(',')[1]);

    var konten =  '<div id="iw-container"class="w3-animate-zoom">' +
                  '<div class="iw-title">' + 'Rumah Tidak Sehat' + '</div>' +
                  '<div class="iw-content scrollbar style-7">' +
                  '<p><b> Nama Pemilik : </b>' + nama +
                  '<br><b> Alamat : </b>' + alamat +
                  '<br><b> Kelurahan : </b>' + lurah + '</p>'+
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
    markers2[i].setMap(null);
  }
}
}

function gro(){
  if(btn3.checked){
    document.getElementById("mySidebar").style.width = "200px";
    document.getElementById("mySidebar").style.display = "block";
  }
  for(var i = 0; i < grogol.length; i++){
    markers3[i] = addMarker(grogol[i]); 
}
function addMarker(grogol){
  if(btn3.checked){
    var nama = grogol.nama_kk;
    var alamat = grogol.alamat;
    var lurah = grogol.kelurahan;
    var koordinat = grogol.koordinat;
    var latitude = parseFloat(koordinat.split(',')[0]);
    var longitude = parseFloat(koordinat.split(',')[1]);

    var konten =  '<div id="iw-container"class="w3-animate-zoom">' +
                  '<div class="iw-title">' + 'Rumah Sehat' + '</div>' +
                  '<div class="iw-content scrollbar style-7">' +
                  '<p><b> Nama Pemilik : </b>' + nama +
                  '<br><b> Alamat : </b>' + alamat +
                  '<br><b> Kelurahan : </b>' + lurah + '</p>'+
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
    markers3[i].setMap(null);
  }
}
}

function grots(){
  if(btn4.checked){
    document.getElementById("mySidebar").style.width = "200px";
    document.getElementById("mySidebar").style.display = "block";
  }
  for(var i = 0; i < grot.length; i++){
    markers4[i] = addMarker(grot[i]); 
}
function addMarker(grot){
  if(btn4.checked){
    var nama = grot.nama_kk;
    var alamat = grot.alamat;
    var lurah = grot.kelurahan;
    var koordinat = grot.koordinat;
    var latitude = parseFloat(koordinat.split(',')[0]);
    var longitude = parseFloat(koordinat.split(',')[1]);

    var konten =  '<div id="iw-container"class="w3-animate-zoom">' +
                  '<div class="iw-title">' + 'Rumah Tidak Sehat' + '</div>' +
                  '<div class="iw-content scrollbar style-7">' +
                  '<p><b> Nama Pemilik : </b>' + nama +
                  '<br><b> Alamat : </b>' + alamat +
                  '<br><b> Kelurahan : </b>' + lurah + '</p>'+
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
    markers4[i].setMap(null);
  }
}
}

function kru(){
  if(btn5.checked){
    document.getElementById("mySidebar").style.width = "200px";
    document.getElementById("mySidebar").style.display = "block";
  }
  for(var i = 0; i < krukut.length; i++){
    markers5[i] = addMarker(krukut[i]); 
}
function addMarker(krukut){
  if(btn5.checked){
    var nama = krukut.nama_kk;
    var alamat = krukut.alamat;
    var lurah = krukut.kelurahan;
    var koordinat = krukut.koordinat;
    var latitude = parseFloat(koordinat.split(',')[0]);
    var longitude = parseFloat(koordinat.split(',')[1]);

    var konten =  '<div id="iw-container"class="w3-animate-zoom">' +
                  '<div class="iw-title">' + 'Rumah Sehat' + '</div>' +
                  '<div class="iw-content scrollbar style-7">' +
                  '<p><b> Nama Pemilik : </b>' + nama +
                  '<br><b> Alamat : </b>' + alamat +
                  '<br><b> Kelurahan : </b>' + lurah + '</p>'+
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
    markers5[i].setMap(null);
  }
}
}

function kruts(){
  if(btn6.checked){
    document.getElementById("mySidebar").style.width = "200px";
    document.getElementById("mySidebar").style.display = "block";
  }
  for(var i = 0; i < krut.length; i++){
    markers6[i] = addMarker(krut[i]); 
}
function addMarker(krut){
  if(btn6.checked){
    var nama = krut.nama_kk;
    var alamat = krut.alamat;
    var lurah = krut.kelurahan;
    var koordinat = krut.koordinat;
    var latitude = parseFloat(koordinat.split(',')[0]);
    var longitude = parseFloat(koordinat.split(',')[1]);

    var konten =  '<div id="iw-container"class="w3-animate-zoom">' +
                  '<div class="iw-title">' + 'Rumah Tidak Sehat' + '</div>' +
                  '<div class="iw-content scrollbar style-7">' +
                  '<p><b> Nama Pemilik : </b>' + nama +
                  '<br><b> Alamat : </b>' + alamat +
                  '<br><b> Kelurahan : </b>' + lurah + '</p>'+
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

function mer(){
  if(btn7.checked){
    document.getElementById("mySidebar").style.width = "200px";
    document.getElementById("mySidebar").style.display = "block";
  }
  for(var i = 0; i < meruyung.length; i++){
    markers7[i] = addMarker(meruyung[i]); 
}
function addMarker(meruyung){
  if(btn7.checked){
    var nama = meruyung.nama_kk;
    var alamat = meruyung.alamat;
    var lurah = meruyung.kelurahan;
    var koordinat = meruyung.koordinat;
    var latitude = parseFloat(koordinat.split(',')[0]);
    var longitude = parseFloat(koordinat.split(',')[1]);

    var konten =  '<div id="iw-container"class="w3-animate-zoom">' +
                  '<div class="iw-title">' + 'Rumah Sehat' + '</div>' +
                  '<div class="iw-content scrollbar style-7">' +
                  '<p><b> Nama Pemilik : </b>' + nama +
                  '<br><b> Alamat : </b>' + alamat +
                  '<br><b> Kelurahan : </b>' + lurah + '</p>'+
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
    markers7[i].setMap(null);
  }
}
}

function merts(){
  if(btn8.checked){
    document.getElementById("mySidebar").style.width = "200px";
    document.getElementById("mySidebar").style.display = "block";
  }
  for(var i = 0; i < mert.length; i++){
    markers8[i] = addMarker(mert[i]); 
}
function addMarker(mert){
  if(btn8.checked){
    var nama = mert.nama_kk;
    var alamat = mert.alamat;
    var lurah = mert.kelurahan;
    var koordinat = mert.koordinat;
    var latitude = parseFloat(koordinat.split(',')[0]);
    var longitude = parseFloat(koordinat.split(',')[1]);

    var konten =  '<div id="iw-container"class="w3-animate-zoom">' +
                  '<div class="iw-title">' + 'Rumah Tidak Sehat' + '</div>' +
                  '<div class="iw-content scrollbar style-7">' +
                  '<p><b> Nama Pemilik : </b>' + nama +
                  '<br><b> Alamat : </b>' + alamat +
                  '<br><b> Kelurahan : </b>' + lurah + '</p>'+
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
    markers8[i].setMap(null);
  }
}
}

function camat(){
  if(btn9.checked){
    document.getElementById("mySidebar").style.width = "200px";
    document.getElementById("mySidebar").style.display = "block";
  }
  for(var i = 0; i < kecamatan.length; i++){
    markers9[i] = addMarker(kecamatan[i]);
  }
   function addMarker(kecamatan){
    if(btn9.checked){
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
      markers9[i].setMap(null);
    }
  }
}

function klrhn(){
  if(btn10.checked){
    document.getElementById("mySidebar").style.width = "200px";
    document.getElementById("mySidebar").style.display = "block";
  }
  for(var i = 0; i < kelurahan.length; i++){
    markers10 [i] = addMarker(kelurahan[i]);
  }
   function addMarker(kelurahan){
    if(btn10.checked){
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
      markers10[i].setMap(null);
    }
  }
}

function hapus(){
  if(btn.checked){
    document.getElementById("mySidebar").style.display = "none";
    for(var i = 0; i < rs.length; i++){
      btn.checked = false;
    markers[i].setMap(null);
  }
}

if(btn2.checked){
    document.getElementById("mySidebar").style.display = "none";
    for(var i = 0; i < trs.length; i++){
      btn2.checked = false;
    markers2[i].setMap(null);
  }
}

  if(btn3.checked){
    document.getElementById("mySidebar").style.display = "none";
    for(var i = 0; i < grogol.length; i++){
      btn3.checked = false;
    markers3[i].setMap(null);
  }
}

  if(btn4.checked){
    document.getElementById("mySidebar").style.display = "none";
    for(var i = 0; i < grot.length; i++){
      btn4.checked = false;
    markers4[i].setMap(null);
  }
}

  if(btn5.checked){
    document.getElementById("mySidebar").style.display = "none";
    for(var i = 0; i < krukut.length; i++){
      btn5.checked = false;
    markers5[i].setMap(null);
  }
}

  if(btn6.checked){
    document.getElementById("mySidebar").style.display = "none";
    for(var i = 0; i < krut.length; i++){
      btn6.checked = false;
    markers6[i].setMap(null);
  }
}

  if(btn7.checked){
    document.getElementById("mySidebar").style.display = "none";
    for(var i = 0; i < meruyung.length; i++){
      btn7.checked = false;
    markers7[i].setMap(null);
  }
}

  if(btn8.checked){
    document.getElementById("mySidebar").style.display = "none";
    for(var i = 0; i < mert.length; i++){
      btn8.checked = false;
    markers8[i].setMap(null);
  }
}

  if(btn9.checked){
    document.getElementById("mySidebar").style.display = "none";
    for(var i = 0; i < kecamatan.length; i++){
      btn9.checked = false;
    markers9[i].setMap(null);
  }
}
  if(btn10.checked){
    document.getElementById("mySidebar").style.display = "none";
    for(var i = 0; i < kelurahan.length; i++){
      btn10.checked = false;
    markers10[i].setMap(null);
  }
}
}


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