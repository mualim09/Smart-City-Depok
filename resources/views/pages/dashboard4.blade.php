@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1 style="color:#807e7d"> 
       <b> DASHBOARD KESEHATAN LINGKUNGAN</b>       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active"><a href="#">Dashboard Kesehatan Lingkungan</li>
      </ol>
    </section>

    <!--<section class="content-header">
      <h1 style="color:#807e7d"><b>
        DASHBOARD 4</b><SMALL>KESEHATAN LINGKUNGAN</SMALL>
        <small class="pull-right">21 Agustus 2017 10:45</small>
      </h1>
    </section>-->

  <section class="content">
    <!-------------------------------------- RUMAH SEHAT -------------------------------------------------->
    <div class="row">
      <div class="col-md-8">
        <div class="box box-widget">
          <div class="box-header with-border" style="background-color: white">
                  <span class="info-box-icon" style="background-color: white"><i class="ion ion-home"></i></span>
              <div class="info-box-content">
                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Rumah Sehat</h4></span>
              </div>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#rs" data-toggle="tab">RS</a></li>
                <li><a href="#pjb" data-toggle="tab">PJB</a></li>
                <li><a href="#spal" data-toggle="tab">SPAL</a></li>
                <li><a href="#sab" data-toggle="tab">SAB</a></li>
                <li><a href="#jbn" data-toggle="tab">Jamban</a></li>
                <li><a href="#sampah" data-toggle="tab">Sampah</a></li>
              </ul>
              <div class="box-body border-radius-none">
                <div class="tab-content">
                  <div class="tab-pane active" id="rs">
                    <b>Rumah Sehat</b>
                    <div class="row">
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-green">
                          <div class="inner">
                            <h3 id="jumlah">0</h3>
                            <p>Jumlah</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars" style="color: white"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-light-blue">
                          <div class="inner">
                            <h3 id="jumlahsehat">0</h3>
                              <p>Sehat </p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-checkmark" style="color: white"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-red">
                          <div class="inner">
                            <h3 id="jumlahtidaksehat">0</h3>
                              <p>Tidak sehat</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-close" style="color: white"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="sab">
                    <b>Sarana Air Bersih</b>
                    <div class="row">
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-green">
                          <div class="inner">
                            <h3 id="jumlah">0</h3>
                            <p>Jumlah</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-light-blue">
                          <div class="inner">
                            <h3 id="jumlahsehat">0</h3>
                              <p>Sehat </p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-checkmark"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-red">
                          <div class="inner">
                            <h3 id="jumlahtidaksehat">0</h3>
                              <p>Tidak sehat</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-close"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="spal">
                    <b>Sarana Pembuangan Air Limbah</b>
                    <div class="row">
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-green">
                          <div class="inner">
                            <h3 id="jumlah">0</h3>
                            <p>Jumlah</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-light-blue">
                          <div class="inner">
                            <h3 id="jumlahsehat">0</h3>
                              <p>Sehat </p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-checkmark"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-red">
                          <div class="inner">
                            <h3 id="jumlahtidaksehat">0</h3>
                              <p>Tidak sehat</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-close"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="sampah">
                    <b>Sampah</b>
                    <div class="row">
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-green">
                          <div class="inner">
                            <h3 id="jumlah">0</h3>
                            <p>Jumlah</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-light-blue">
                          <div class="inner">
                            <h3 id="jumlahsehat">0</h3>
                              <p>Sehat </p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-checkmark"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-red">
                          <div class="inner">
                            <h3 id="jumlahtidaksehat">0</h3>
                              <p>Tidak sehat</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-close"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="pjb">
                    <b>Pemantauan Jentik Berkala</b>
                    <div class="row">
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-green">
                          <div class="inner">
                            <h3 id="jumlah">0</h3>
                            <p>Jumlah</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-light-blue">
                          <div class="inner">
                            <h3 id="jumlahsehat">0</h3>
                              <p>Sehat </p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-checkmark"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-red">
                          <div class="inner">
                            <h3 id="jumlahtidaksehat">0</h3>
                              <p>Tidak sehat</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-close"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="jbn">
                    <b>Jamban</b>
                    <div class="row">
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-green">
                          <div class="inner">
                            <h3 id="jumlah">0</h3>
                            <p>Jumlah</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-light-blue">
                          <div class="inner">
                            <h3 id="jumlahsehat">0</h3>
                              <p>Sehat </p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-checkmark"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-red">
                          <div class="inner">
                            <h3 id="jumlahtidaksehat">0</h3>
                              <p>Tidak sehat</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-close"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <script>
            //kodingan jml rumah sehat
            var jumlahrs = document.getElementById("jumlah");
            var refi = firebase.database().ref("rs");
            refi.on("value", function(snapshot) {
              jumlahrs.innerHTML = snapshot.numChildren();
            });
          </script>

          <script>
            //kodingan rs sehat
            var sehatrs = document.getElementById("jumlahsehat");
            var refi = firebase.database().ref("rs");
            var test;
            var sehat = 0;

            refi.on("child_added", function(snapshot) {
              snapshot.forEach(function(snapshot2) {
                test = snapshot2.val().totalNilai;
                //console.log(test);
                if (test >= 1068) {
                  sehat++;
                  sehatrs.innerHTML = sehat;
                }
              });
            });
          </script>

          <script>
            //kodingan rs tdk sehat
            var nosehat = document.getElementById("jumlahtidaksehat");
            var refi2 = firebase.database().ref("rs");
            var test2;
            var tidaksehat = 0;

            refi2.on("child_added", function(no) {
              no.forEach(function(no2) {
                test2 = no2.val().totalNilai;
                //console.log(test2);
                if (test2 <= 1068) {
                  tidaksehat++;
                  nosehat.innerHTML = tidaksehat;
                }
              });
            });
          </script>

        <!-------------------------------------- PKL -------------------------------------------------->

        <div class="box box-widget">
          <div class="box-header with-border" style="background-color: white">
                  <span class="info-box-icon" style="background-color: white"><i class="ion ion-leaf"></i></span>
              <div class="info-box-content">
                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>PELAYANAN KESEHATAN LINGKUNGAN</h4></span>
              </div>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
          </div>
          <div class="box-body">
            <div class="box-body border-radius-none">
              <div class="tab-content">
                <div class="tab-pane active" id="pkl">
                  <b>Pelayanan Kesehatan Lingkungan</b>
                  <div class="row">
                    <div class="col-lg-4 col-xs-6">
                      <div class="small-box bg-green">
                        <div class="inner">
                          <h3 id="jumlah">0</h3>
                          <p>Jumlah</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-stats-bars"></i>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-xs-6">
                      <div class="small-box bg-light-blue">
                        <div class="inner">
                          <h3 id="jumlahsehat">0</h3>
                            <p>Sehat </p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-checkmark"></i>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-xs-6">
                      <div class="small-box bg-red">
                        <div class="inner">
                          <h3 id="jumlahtidaksehat">0</h3>
                            <p>Tidak sehat</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-close"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div></div>
      <div class="col-md-4">
        <div class="box box-widget">
          <div class="box-header with-border bg-orange">
                  <span class="info-box-icon bg-orange" style="background-color: white"><i class="ion ion-ios-star-outline"></i></span>
              <div class="info-box-content">
                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Reward</h4></span>
              </div>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus" style="color:white"></i></button>
            </div>
          </div>
          <div class="box-body">
            <ul class="products-list product-list-in-box">
                <li class="item">
                  <div class="product-img">
                    <img src="dist/img/default-50x50.gif" class="img-circle" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Petugas 1
                      <span class="label label-warning pull-right">90</span></a>
                    <span class="product-description">
                          Kecamatana Limo. Kelurahan Limo
                        </span>
                  </div>
                </li>
                <!-- /.item -->
                <li class="item">
                  <div class="product-img">
                    <img src="dist/img/default-50x50.gif" class="img-circle" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Petugas 2
                      <span class="label label-info pull-right">70</span></a>
                    <span class="product-description">
                        Kecamatan Limo. Kelurahan Grogol.
                        </span>
                  </div>
                </li>
                <!-- /.item -->
                <li class="item">
                  <div class="product-img">
                    <img src="dist/img/default-50x50.gif" class="img-circle" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Petugas 3<span
                        class="label label-danger pull-right">50</span></a>
                    <span class="product-description">
                          Kecamatan Limo. Kelurahan Meruyung.
                        </span>
                  </div>
                </li>
                <!-- /.item -->
                <li class="item">
                  <div class="product-img">
                    <img src="dist/img/default-50x50.gif" class="img-circle" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Petugas 4
                      <span class="label label-success pull-right">49</span></a>
                    <span class="product-description">
                          Kecamatan Limo. Kelurahan Krukut.
                        </span>
                  </div>
                </li>
                <!-- /.item -->
                <li class="item">
                  <div class="product-img">
                    <img src="dist/img/default-50x50.gif" class="img-circle" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Petugas 5
                      <span class="label label-success pull-right">39</span></a>
                    <span class="product-description">
                          Kecamatan Limo. Kelurahan Limo.
                        </span>
                  </div>
                </li>
                <!-- /.item -->
              </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

    @endsection