@extends('layouts.app')

@section('content')


    <section class="content-header">
      <h1 style="color:#807e7d"> 
       <b> DASHBOARD DATA PUBLIK</b>       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active"><a href="/dashboard2">Dashboard Data Publik</li>
      </ol>
    </section>

    <!--<section class="content-header">
      <h1 style="color:#807e7d"><b>
        DASHBOARD 2</b><SMALL>USER</SMALL>
        <small class="pull-right">21 Agustus 2017 10:45</small>
      </h1>
    </section>-->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-widget">
            <div class="box-header with-border">
              <h3 class="box-title" style="color:#807e7d"><b>PENGAJUAN</b></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-stats-bars"></i></span>

            <div class="info-box-content">
              <span class="info-box-text" style="color:#807e7d">Jumlah<br>Pengajuan</span>
              <span class="info-box-number" style="margin-top: -20px; color:black"><h1><b>{{$totalM}}</b></h1></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-maroon"><i class="fa fa-hourglass-1"></i></span>

            <div class="info-box-content">
              <span class="info-box-text" style="color:#807e7d">Pengajuan<br>DiProses</span>
              <span class="info-box-number" style="margin-top: -20px;color:black"><h1><b>{{$prosesM}}</b></h1></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion-ios-checkmark"></i></span>

            <div class="info-box-content">
              <span class="info-box-text" style="color:#807e7d">Pengajuan <br>Diterima</span>
              <span class="info-box-number" style="margin-top:-20px; color:black"><h1><b>{{$terimaM}}</b></h1></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-close"></i></span>

            <div class="info-box-content">
              <span class="info-box-text" style="color:#807e7d">Pengajuan <br>Ditolak</span>
              <span class="info-box-number" style="margin-top:-20px; color:black"><h1><b>{{$tolakM}}</b></h1></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
            <center>
            <h4 class="box-title" style="color:#807e7d">PENGAJUAN TIAP BIDANG</h4><br>
            </center>
{{-- ({{($pendidikanM/$totalM)*100}})  --}}
            <div class="row">
              <div class="col-md-4">
                <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="ion ion-ios-book-outline"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Bidang Pendidikan</span>
                    <span class="info-box-number">{{$pendidikanM}}</span>
                    <div class="progress">
                      <div class="progress-bar" style="width: {{($pendidikanM/$totalM)*100}}% "></div>
                    </div>
                    <span class="progress-description">
                      {{$pendidikanM}} dari {{$totalM}} Pengajuan  
                    </span>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="info-box bg-orange">
                  <span class="info-box-icon"><i class="ion ion-ios-pulse"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Kesehatan</span>
                    <span class="info-box-number">{{$kesehatanM}} </span>
                    <div class="progress">
                      <div class="progress-bar" style="width: {{($kesehatanM/$totalM)*100}}% "></div>
                    </div>
                    <span class="progress-description">
                      {{$kesehatanM}}  dari {{$totalM}} Pengajuan
                    </span>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="info-box bg-red">
                  <span class="info-box-icon"><i class="ion ion-ios-americanfootball-outline"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Olahraga</span>
                    <span class="info-box-number">{{$olahragaM}}</span>
                    <div class="progress">
                      <div class="progress-bar" style="width: {{($olahragaM/$totalM)*100}}%  "></div>
                    </div>
                    <span class="progress-description">
                      {{$olahragaM}} dari {{$totalM}} Pengajuan 
                    </span>
                  </div>
                </div>
              </div>

               <div class="col-md-4">
                <div class="info-box bg-maroon">
                  <span class="info-box-icon"><i class="ion-ios-monitor-outline"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Teknologi</span>
                    <span class="info-box-number">{{$teknologiM}}</span>
                    <div class="progress">
                      <div class="progress-bar" style="width: {{($teknologiM/$totalM)*100}}%  "></div>
                    </div>
                    <span class="progress-description">
                    {{$teknologiM}} dari {{$totalM}} Pengajuan 
                    </span>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="info-box bg-green">
                  <span class="info-box-icon"><i class="ion-leaf"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Lingkungan</span>
                    <span class="info-box-number">{{$lingkunganM}}</span>
                    <div class="progress">
                      <div class="progress-bar" style="width: {{($lingkunganM/$totalM)*100}}%  "></div>
                    </div>
                    <span class="progress-description">
                      {{$lingkunganM}} dari {{$totalM}} Pengajuan 
                    </span>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="info-box bg-purple">
                  <span class="info-box-icon"><i class="ion-android-globe"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Umum</span>
                    <span class="info-box-number">{{$umumM}}</span>
                    <div class="progress">
                      <div class="progress-bar" style="width: {{($umumM/$totalM)*100}}% "></div>
                    </div>
                    <span class="progress-description">
                      {{$umumM}} dari {{$totalM}} Pengajuan 
                    </span>
                  </div>
                </div>
              </div>

            </div>
            <!-- footer -->

            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>

      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <div class="box box-widget">
            <div class="box-header with-border">
              <h3 class="box-title" style="color:#807e7d"><b>TEMPAT</b></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <!-- Info boxes -->
            <div class="row">
              <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-navy"><i class="fa fa-hospital-o"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text"><a href="/rs"><font color="black">RUMAH SAKIT</font></a></span>
                      <span class="info-box-number" style="margin-top: -10px; color:black"><h1><b>{{$Rss }}</b></h1></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
              <!-- /.col -->

              <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-maroon"><i class="ion-ios-medkit-outline"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text" style="color:#807e7d"><a href="/apotek"><font color="black">APOTEK</font></a></span>
                      <span class="info-box-number" style="margin-top: -10px; color:black"><h1><b>{{$Apotek}}</b></h1></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
              <!-- /.col -->

              <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-heartbeat"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text" style="color:#807e7d"><a href="/puskesmas"><font color="black">PUSKESMAS</font></a></span>
                      <span class="info-box-number" style="margin-top: -10px; color:black"><h1><b>{{$Puskesmas}}</b></h1></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
              <!-- /.col -->

              

              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-red"><i class=" fa fa-stethoscope"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text" style="color:#807e7d"><a href="/bidan"><font color="black">BIDAN</font></a></span>
                    <span class="info-box-number" style="margin-top: -10px; color:black"><h1><b>{{$Bidan }}</b></h1></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->


              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-yellow"><i class="fa fa-child"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text" style="color:#807e7d"><a href="/panti"><font color="black">PANTI ASUHAN</font></a></span>
                    <span class="info-box-number" style="margin-top: -10px; color:black"><h1><b>{{$Pasuhan}}</b></h1></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-olive"><i class="fa fa-star"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text" style="color:#807e7d"><a href="/tibadah"><font color="black">TEMPAT IBADAH</font></a></span>
                    <span class="info-box-number" style="margin-top: -10px; color:black"><h1><b>{{$Tibadah}}</b></h1></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-teal"><i class="ion ion-android-restaurant"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text" style="color:#807e7d"><a href="/kuliner"><font color="black">RESTAURANT</font></a></span>
                    <span class="info-box-number" style="margin-top: -10px; color:black"><h1><b>{{$Kuliner}}</b></h1></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

               <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-navy"><i class=" fa fa-map-signs"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text" style="color:#807e7d"><a href="/pasar"><font color="black">PASAR TRADISIONAL</font></a></span>
                    <span class="info-box-number" style="margin-top: -10px; color:black"><h1><b>{{$Pasar}}</b></h1></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->


              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-navy"><i class=" fa fa-map-signs"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text" style="color:#807e7d"><a href="/supermarket"><font color="black">SUPERMARKET</font></a></span>
                    <span class="info-box-number" style="margin-top: -10px; color:black"><h1><b>{{$Supermarket}}</b></h1></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>

               <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-maroon"><i class="ion ion-android-cart"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text" style="color:#807e7d"><a href="/mall"><font color="black">PASAR MODERN</font></a></span>
                    <span class="info-box-number" style="margin-top: -10px; color:black"><h1><b>{{$Mall}}</b></h1></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

               <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-green"><i class="ion ion-android-cloud-outline"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text" style="color:#807e7d"><a href="/pdam"><font color="black">PAM</font></a></span>
                    <span class="info-box-number" style="margin-top: -10px; color:black"><h1><b>{{$Pdam}}</b></h1></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

               <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-purple"><i class=" fa fa-lightbulb-o"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text" style="color:#807e7d"><a href="/pln"><font color="black">PLN</font></a></span>
                    <span class="info-box-number" style="margin-top: -10px; color:black"><h1><b>{{$Pln}}</b></h1></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

               <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-red"><i class="fa fa-ambulance"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text" style="color:#807e7d"><font color="black">AMBULANCE</font></span>
                    <span class="info-box-number" style="margin-top: -10px; color:black"><h1><b>0</b></h1></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-orange"><i class="fa fa-soccer-ball-o"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text" style="color:#807e7d"><a href="/olahraga"><font color="black">GOR</font></a></span>
                    <span class="info-box-number" style="margin-top: -10px; color:black"><h1><b>{{$Olahraga}}</b></h1></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-olive"><i class=" fa fa-plane"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text" style="color:#807e7d"><a href="/wisata"><font color="black">TEMPAT WISATA</font></a></span>
                    <span class="info-box-number" style="margin-top: -10px; color:black"><h1><b>{{$Twisata}}</b></h1></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-aqua"><i class="fa fa-tree"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text" style="color:#807e7d"><a href="/taman"><font color="black">TAMAN PUBLIC</font></a></span>
                    <span class="info-box-number" style="margin-top: -10px; color:black"><h1><b>{{$Taman}}</b></h1></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

               <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-navy"><i class="fa fa-graduation-cap"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text" style="color:#807e7d"><a href="/universitas"><font color="black">PERGURUAN TINGGI</font></a></span>
                    <span class="info-box-number" style="margin-top: -10px; color:black"><h1><b>{{$Univ}}</b></h1></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

               <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-maroon"><i class="fa fa-building-o"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text" style="color:#807e7d"><a href="/paud"><font color="black">PAUD</font></a></span>
                    {{-- <span class="info-box-number" style="margin-top: -10px; color:black"><h1><b>{{$Paud }}</b></h1></span> --}}
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-maroon"><i class="fa fa-building-o"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text" style="color:#807e7d"><a href="/slb"><font color="black">SLB</font></a></span>
                    {{-- <span class="info-box-number" style="margin-top: -10px; color:black"><h1><b>{{$Slb }}</b></h1></span> --}}

                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>

              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-maroon"><i class="fa fa-building-o"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text" style="color:#807e7d"><a href="/sd"><font color="black">SD/MI</font></a></span>
                    {{-- <span class="info-box-number" style="margin-top: -10px; color:black"><h1><b>{{$Sd }}</b></h1></span> --}}
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-maroon"><i class="fa fa-building-o"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text" style="color:#807e7d"><a href="/smp"><font color="black">SMP/MTs</font></a></span>
                    {{-- <span class="info-box-number" style="margin-top: -10px; color:black"><h1><b>{{$Smp}}</b></h1></span> --}}
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-maroon"><i class="fa fa-building-o"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text" style="color:#807e7d"><a href="/sma"><font color="black">SMA/SMK/MA</font></a></span>
                    {{-- <span class="info-box-number" style="margin-top: -10px; color:black"><h1><b>{{$Sma}}</b></h1></span> --}}
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

               <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-green"><i class="fa fa-fire-extinguisher"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text" style="color:#807e7d"><a href="/damkar"><font color="black">PEMADAM KEBAKARAN</font></a></span>
                    <span class="info-box-number" style="margin-top: -10px; color:black"><h1><b>{{$Damkar}}</b></h1></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-purple"><i class="fa fa-shield"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text" style="color:#807e7d"><a href="/pospolisi"><font color="black">POS POLISI</font></a>               
                    <span class="info-box-number" style="margin-top: -10px; color:black"><h1><b>{{$Polisi}}</b></h1></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-red"><i class="fa fa-subway"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text" style="color:#807e7d"><font color="black">TERMINAL DAN STASIUN</font></span>
                    <span class="info-box-number" style="margin-top: -10px; color:black"><h1><b>0</b></h1></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-orange"><i class="ion ion-android-cloud"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text" style="color:#807e7d"><a href="/tpu"><font color="black">TPU</font></a></span>
                    <span class="info-box-number" style="margin-top: -10px; color:black"><h1><b>{{$Tpu}}</b></h1></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-olive"><i class="fa fa-book"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text" style="color:#807e7d;"><a href="/perpus"><font color="black">PERPUSTAKAAN DAN TAMAN BACA</font></a></span>
                    <span class="info-box-number" style="margin-top: -10px; color:black"><h1><b>{{$Perpus}}</b></h1></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

               <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-olive"><i class="fa fa-plus-square"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text" style="color:#807e7d;"><a href="klinik"><font color="black">KLINIK</font></a></span>
                    <span class="info-box-number" style="margin-top: -10px; color:black"><h1><b>{{$Klinik}}</b></h1></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-olive"><i class="fa fa-bus"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text" style="color:#807e7d;"><a href="/angkot"><font color="black">Angkutan Umum</font></a></span>
                    <span class="info-box-number" style="margin-top: -10px; color:black"><h1><b>{{$Angkot}}</b></h1></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>

              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-light-blue"><i class="fa fa-bus"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text" style="color:#807e7d;"><a href="/jpengiriman"><font color="black">Jasa Kirim</font></a></span>
                    <span class="info-box-number" style="margin-top: -10px; color:black"><h1><b>{{$Jkirim}}</b></h1></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>

              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-light-blue"><i class="fa fa-tachometer"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text" style="color:#807e7d;"><a href="/spbu"><font color="black">SPBU</font></a></span>
                    <span class="info-box-number" style="margin-top: -10px; color:black"><h1><b>{{$Spbu}}</b></h1></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>

              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-aqua"><i class="fa fa-money"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text" style="color:#807e7d"><a href="/ukm"><font color="black">UMKM</font></a></span>
                    <span class="info-box-number" style="margin-top: -10px; color:black"><h1><b>{{$Ukm}}</b></h1></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>

              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-aqua"><i class="fa fa-group"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text" style="color:#807e7d"><a href="/komunitas"><font color="black">KOMUNITAS</font></a></span>
                    <span class="info-box-number" style="margin-top: -10px; color:black"><h1><b>{{$Komunitas}}</b></h1></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>

              <!-- /.col -->
            </div>
            <!-- /.row -->
            </div>
            <!-- ./box-body -->
          </div>
          <!-- /.box -->

     

          
    </section>

@endsection
