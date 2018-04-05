<!DOCTYPE html>
<html>
<title>Page Not Found!</title>
<link rel="shortcut icon" href="{{ URL::asset('img/logo.png') }}">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
    background-image: url('../img/img-4.png');
    min-height: 100%;
    background-position: center;
    background-size: cover;
}
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
</style>
<body class="w3-animate-opacity">
<div class="bgimg w3-display-container w3-text-white">
  <div class="w3-padding-64 w3-display-middle w3-center">
    <img src="{{ URL::asset('img/minilogo.png') }}" style="width:150px; height:150px">
    <h1 class="f_bold" style="font-size:100pt; margin: -20px 0;">404</h1>
    <div class="f_bold w3-xlarge">NOT FOUND</div>
    <p class="w3-large">Sorry, but the page that you requested doesn't exist.</p>
    <a href="/"><button class="w3-btn w3-border w3-padding-16"> Continue to Our Home Page </button></a>
  </div>
  <div class="w3-display-bottomleft w3-padding-large">
    design by <a href="http://www.tireg-dev.com" style="text-decoration:none;"><b> Tireg Dev </b></a> <img src="{{ URL::asset('img/tireg_wh.png') }}" style="width:30px; height:30px">
  </div>
</div>

</body>
</html>
