{{-- {{$user}} --}}


@extends('layouts.app')

@section('content')

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> --}}
    {{-- <script src="../../plugins/JQuery/jquery-2.2.3.min.js"></script> --}}
    <script src="../../jQuery/jquery-3.2.1.min.js"></script>
    {{-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}

    {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script> --}}
    

 {{--    <script src="../../plugins/morris/morris.min.js"></script>
    <script src="../../plugins/morris/morris.js"></script> --}}

    <script src="../../plugins/chartjs/Chart.min.js"></script>
    <script src="../../plugins/chartjs/Chart.js"></script>

    <?php
      function hitungwilayah($kota)
      {
        $wilayah = DB::table('visitors')
        ->where('city_name', $kota)
        ->count();

        return $wilayah;
      }

      function persenwilayah($kota)
      {
        $jumlahkota = DB::table('visitors')
        ->where('city_name', $kota)
        ->count();
        $jumlahvisitor = DB::table('visitors')
        ->count();
        $persen = $jumlahkota/$jumlahvisitor*100;
        return $persen;
      }
    ?>


  <section class="content-header">
      <h1 style="color:#807e7d"> 
       <b> DASHBOARD DATA ANALITIK</b>       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active"><a href="/dashboard">Dashboard Aplikasi</li>
      </ol>
    </section>    

  <!--<section class="content-header">
      <h1 style="color:#807e7d"> 
       <b> DASHBOARD <small>APLIKASI</small> </b>
        <small class="pull-right"><i class="ion ion-ios-clock-outline" style="margin-right: 5px"></i>21 Agustus 2017 10:45</small>
      </h1>
    </section>-->

    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3 style="color: white">{{ $jumlahuser }}</h3>
              <p>Jumlah User</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-person" style="color:white;"></i>
            </div>
        </div>

        </div>   
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3 style="color: white">{{ $visitor }}</h3>

              <p style="color:white">Jumlah Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-location" style="color:white; font-size: 70px"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3 style="color: white">{{ $complaint }}</h3>

              <p style="color:white">Kritik dan Saran</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-chatbubble" style="color:white"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3 style="color: white">53<sup style="font-size: 20px">%</sup></h3>

              <p style="color:white">Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars" style="color:white"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>

    <div class="row">
        <div class="col-md-6">
          
          <div class="box box-widget">
            <div class="box-header with-border bg-yellow">
              <span class="info-box-icon bg-yellow"><i class="ion ion-ios-location"></i></span>
              <div class="info-box-content">
                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Statistik Visitor</h4></span>
              </div>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus" style="color: white"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times" style="color: white"></i></button>
              </div>
            </div>
            <div class="box-body">
             <div class="chart">
                <canvas id="lineChart" style="height:250px"></canvas>
              </div>
            </div>
          </div>

          <div class="box box-widget">
            <div class="box-header with-border bg-maroon">
              <span class="info-box-icon bg-maroon" style="background-color: white"><i class="ion ion-ios-download"></i></span>
              <div class="info-box-content">
                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Statistik Download Aplikasi</h4></span>
              </div>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus" style="color:white"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times" style="color:white"></i></button>
              </div>
            </div>
            <div class="chart">
                <canvas id="areaChart" style="height:250px"></canvas>
              </div>
          </div>

          <div class="box box-widget">
            <div class="box-header with-border bg-teal">
              <span class="info-box-icon bg-teal" style="background-color: white"><i class="ion ion-ios-paper"></i></span>
              <div class="info-box-content">
                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Statistik Pengajuan</h4></span>
              </div>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus" style="color:white"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times" style="color:white"></i></button>
              </div>
            </div> 
            <div class="chart">
              <canvas id="barChart" style="height:250px"></canvas>
              </div>
            <!-- /.box-body -->
          </div>

          <div class="box box-widget">
            <div class="box-header with-border bg-olive">
              <span class="info-box-icon bg-olive" style="background-color: white"><i class="ion ion-ios-people"></i></span>
              <div class="info-box-content">
                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Demografi</h4></span>
              </div>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus" style="color:white"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times" style="color:white"></i></button>
              </div>
            </div>
            <div class="chart">
                <canvas id="demo" style="height:250px"></canvas>
              </div>
          </div>
        </div>


        <div class="col-md-6">

          <div class="box box-widget">
            <div class="box-header with-border bg-red">
              <span class="info-box-icon bg-red" style="background-color: white"><i class="ion ion-ios-location"></i></span>
              <div class="info-box-content">
                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Visitor</h4></span>
              </div>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus" style="color:white"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times" style="color:white"></i></button>
              </div>
            </div>
            <div class="box-body" style="background-color: white">
              <div class="row">
              <font color="black">
                <div class="col-sm-6">
                  <!-- Progress bars -->
                  <div class="clearfix">
                    <span class="pull-left">Jakarta</span>
                    <small class="pull-right">{{hitungwilayah('Jakarta')}}</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-Disabled bg-red" style="width: {{persenwilayah('Jakarta')}}%;"></div>
                  </div>

                  <div class="clearfix">
                    <span class="pull-left">Depok</span>
                    <small class="pull-right">{{hitungwilayah('Depok')}}</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-Disabled bg-red" style="width: {{persenwilayah('Depok')}}%;"></div>
                  </div>

                  <div class="clearfix">
                    <span class="pull-left">Tangerang</span>
                    <small class="pull-right">{{hitungwilayah('Tangerang')}}</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-Disabled bg-red" style="width: {{persenwilayah('Tangerang')}}%;"></div>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                  <!-- Progress bars -->
                  <div class="clearfix">
                    <span class="pull-left">Bogor</span>
                    <small class="pull-right">{{hitungwilayah('Bogor')}}</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-Disabled bg-red" style="width: {{persenwilayah('Bogor')}}%;"></div>
                  </div>

                  <div class="clearfix">
                    <span class="pull-left">Bekasi</span>
                    <small class="pull-right">{{hitungwilayah('Bekasi')}}</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-Disabled bg-red" style="width: {{persenwilayah('Bekasi')}}%;"></div>
                  </div>

                  <!-- <div class="clearfix">
                    <span class="pull-left">Luar Jabodetabek</span>
                    <small class="pull-right">50</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-Disabled bg-red" style="width: 70%;"></div>
                  </div> -->
                </div>
              </div>
              </font>
            </div>
          </div>

          <div class="box box-widget">
              <div class="box-header with-border bg-orange">
                  <span class="info-box-icon bg-orange" style="background-color: white"><i class="ion ion-ios-personadd"></i></span>
              <div class="info-box-content">
                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Member</h4></span>
              </div>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus" style="color:white"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times" style="color:white"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix" style="padding: 1em 0">
                    @foreach($user as $users)
                    <li>
                      <img src="{{ $users->foto }}" alt="User Image" width="70px">
                      <a class="users-list-name" href="#">{{ $users->username }}</a>
                      <span class="users-list-date">{{ str_limit ($users->bio, 10) }}</span>
                    </li>
                    @endforeach
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="javascript:void(0)" class="uppercase">View All Users</a>
                </div>
                <!-- /.box-footer -->
          </div>

          <div class="box box-widget">
            <div class="box-header with-border bg-green">
              <span class="info-box-icon bg-green" style="background-color: white"><i class="ion ion-ios-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Statistik Pembaca Artikel</h4></span>
              </div>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus" style="color:white"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times" style="color:white"></i></button>
              </div>
            </div>
            <div class="box-body">
             <div class="chart">
                <canvas id="artikel" style="height:250px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>


        </div>
        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row -->
    </section>

    {{-- <section class="content">
        <div id="container" style="width: 75%;"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"
            src="./Bar_files/saved_resource.html"></iframe>
        </div>
      </section> --}}

 
  
@include('inc.datachart')



{{--============================================================================================================================= --}}


@endsection
