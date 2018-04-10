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
      <a id="myBtn" onclick="myFunc('data-angler-1')" href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom" style="padding: 12px 1.5em;"><i class="fa fa-map-signs w3-medium" style="margin-right: 7px;"></i> Limo</a>
      <div id="data-angler-1" class="w3-hide w3-animate-left w3-text-gray" style="padding: 1em 2em 1em; border-bottom: 1px solid #ccc;">
          <input type="checkbox" class="checkbox" id="limo" onclick="anglerWithParam(this.id)">LIMO<br>
            <div id="limo" style="display: none; margin-left: 10px;">
                <input type="checkbox" class="checkbox" id="sehat" onclick="rumahsehat()">Rumah Sehat<br>
                <input type="checkbox" class="checkbox" id="rts" onclick="tidaksehat()">Rumah Tidak Sehat<br>
            </div>
          <input type="checkbox" class="checkbox" id="grogol" onclick="anglerWithParam(this.id)">GROGOL<br>
            <div id="grogol" style="display: none; margin-left: 10px;">
                <input type="checkbox" class="checkbox" id="grs" onclick="gro()">Rumah Sehat<br>
                <input type="checkbox" class="checkbox" id="gts" onclick="grots()">Rumah Tidak Sehat<br>
            </div>
          <input type="checkbox" class="checkbox" id="krukut" onclick="anglerWithParam(this.id)">KRUKUT<br>
            <div id="krukut" style="display: none; margin-left: 10px;">
                <input type="checkbox" class="checkbox" id="krs" onclick="kru()">Rumah Sehat<br>
                <input type="checkbox" class="checkbox" id="kts" onclick="kruts()">Rumah Tidak Sehat<br>
            </div>
          <input type="checkbox" class="checkbox" id="meruyung" onclick="anglerWithParam(this.id)">MERUYUNG<br>
            <div id="meruyung" style="display: none; margin-left: 10px;">
                <input type="checkbox" class="checkbox" id="mrs" onclick="mer()">Rumah Sehat<br>
                <input type="checkbox" class="checkbox" id="mts" onclick="merts()">Rumah Tidak Sehat<br>
            </div>
      </div>
      
      </div>
    </div>
  </div>

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

var btn = document.getElementById("sehat");
var btn2 = document.getElementById("rts");
var btn3 = document.getElementById("grs");
var btn4 = document.getElementById("gts");
var btn5 = document.getElementById("krs");
var btn6 = document.getElementById("kts");
var btn7 = document.getElementById("mrs");
var btn8 = document.getElementById("mts");

var map;

var markers = [];
var markers2 = [];
var markers3 = [];
var markers4 = [];
var markers5 = [];
var markers6 = [];
var markers7 = [];
var markers8 = [];

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

    var konten = '<div>' + 
                 '<h3>' + nama + '</h3>' +
                 '<p>' + alamat + '</p>'+
                 '<p>' + lurah + '</p>'+
                 ''
                 '<div>';

    var mark = new google.maps.Marker({
              map: map,
              position: {lat: latitude, lng: longitude},
              icon: "{{ asset('img/marker/gor.png') }}"
    });
    
    var infoWindow = new google.maps.InfoWindow({
      konten: konten,
      maxWidth: 350
    });

    google.maps.event.addListener(mark, 'click', function(){
      infoWindow.setContent(konten);
      infoWindow.open(map, mark);
    });
    return mark;
  }
  else{
    markers[i].setMap(null);
  }
}
}

function tidaksehat(){
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

    var konten = '<div>' + 
                 '<h3>' + nama + '</h3>' +
                 '<p>' + alamat + '</p>'+
                 '<p>' + lurah + '</p>'+
                 ''
                 '<div>';

    var mark = new google.maps.Marker({
              map: map,
              position: {lat: latitude, lng: longitude},
              icon: "{{ asset('img/marker/bank.png') }}"
    });
    
    var infoWindow = new google.maps.InfoWindow({
      konten: konten,
      maxWidth: 350
    });

    google.maps.event.addListener(mark, 'click', function(){
      infoWindow.setContent(konten);
      infoWindow.open(map, mark);
    });
    return mark;
  }
  else{
    markers2[i].setMap(null);
  }
}
}

function gro(){
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

    var konten = '<div>' + 
                 '<h3>' + nama + '</h3>' +
                 '<p>' + alamat + '</p>'+
                 '<p>' + lurah + '</p>'+
                 ''
                 '<div>';

    var mark = new google.maps.Marker({
              map: map,
              position: {lat: latitude, lng: longitude},
              icon: "{{ asset('img/marker/gor.png') }}"
    });
    
    var infoWindow = new google.maps.InfoWindow({
      konten: konten,
      maxWidth: 350
    });

    google.maps.event.addListener(mark, 'click', function(){
      infoWindow.setContent(konten);
      infoWindow.open(map, mark);
    });
    return mark;
  }
  else{
    markers3[i].setMap(null);
  }
}
}

function grots(){
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

    var konten = '<div>' + 
                 '<h3>' + nama + '</h3>' +
                 '<p>' + alamat + '</p>'+
                 '<p>' + lurah + '</p>'+
                 ''
                 '<div>';

    var mark = new google.maps.Marker({
              map: map,
              position: {lat: latitude, lng: longitude},
              icon: "{{ asset('img/marker/damkar.png') }}"
    });
    
    var infoWindow = new google.maps.InfoWindow({
      konten: konten,
      maxWidth: 350
    });

    google.maps.event.addListener(mark, 'click', function(){
      infoWindow.setContent(konten);
      infoWindow.open(map, mark);
    });
    return mark;
  }
  else{
    markers4[i].setMap(null);
  }
}
}

function kru(){
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

    var konten = '<div>' + 
                 '<h3>' + nama + '</h3>' +
                 '<p>' + alamat + '</p>'+
                 '<p>' + lurah + '</p>'+
                 ''
                 '<div>';

    var mark = new google.maps.Marker({
              map: map,
              position: {lat: latitude, lng: longitude},
              icon: "{{ asset('img/marker/klinik.png') }}"
    });
    
    var infoWindow = new google.maps.InfoWindow({
      konten: konten,
      maxWidth: 350
    });

    google.maps.event.addListener(mark, 'click', function(){
      infoWindow.setContent(konten);
      infoWindow.open(map, mark);
    });
    return mark;
  }
  else{
    markers5[i].setMap(null);
  }
}
}

function kruts(){
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

    var konten = '<div>' + 
                 '<h3>' + nama + '</h3>' +
                 '<p>' + alamat + '</p>'+
                 '<p>' + lurah + '</p>'+
                 ''
                 '<div>';

    var mark = new google.maps.Marker({
              map: map,
              position: {lat: latitude, lng: longitude},
              icon: "{{ asset('img/marker/klinik.png') }}"
    });
    
    var infoWindow = new google.maps.InfoWindow({
      konten: konten,
      maxWidth: 350
    });

    google.maps.event.addListener(mark, 'click', function(){
      infoWindow.setContent(konten);
      infoWindow.open(map, mark);
    });
    return mark;
  }
  else{
    markers6[i].setMap(null);
  }
}
}

function mer(){
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

    var konten = '<div>' + 
                 '<h3>' + nama + '</h3>' +
                 '<p>' + alamat + '</p>'+
                 '<p>' + lurah + '</p>'+
                 ''
                 '<div>';

    var mark = new google.maps.Marker({
              map: map,
              position: {lat: latitude, lng: longitude},
              icon: "{{ asset('img/marker/mall.png') }}"
    });
    
    var infoWindow = new google.maps.InfoWindow({
      konten: konten,
      maxWidth: 350
    });

    google.maps.event.addListener(mark, 'click', function(){
      infoWindow.setContent(konten);
      infoWindow.open(map, mark);
    });
    return mark;
  }
  else{
    markers7[i].setMap(null);
  }
}
}

function merts(){
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

    var konten = '<div>' + 
                 '<h3>' + nama + '</h3>' +
                 '<p>' + alamat + '</p>'+
                 '<p>' + lurah + '</p>'+
                 ''
                 '<div>';

    var mark = new google.maps.Marker({
              map: map,
              position: {lat: latitude, lng: longitude},
              icon: "{{ asset('img/marker/pln.png') }}"
    });
    
    var infoWindow = new google.maps.InfoWindow({
      konten: konten,
      maxWidth: 350
    });

    google.maps.event.addListener(mark, 'click', function(){
      infoWindow.setContent(konten);
      infoWindow.open(map, mark);
    });
    return mark;
  }
  else{
    markers8[i].setMap(null);
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