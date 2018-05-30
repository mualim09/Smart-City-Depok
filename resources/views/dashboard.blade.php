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


	<section class="content-header">
      <h1 style="color:#807e7d"> 
       <b> DASHBOARD APLIKASI</b>       
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
              <h3 style="color: white">150</h3>
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
              <h3 style="color: white">65</h3>

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
              <h3 style="color: white">65</h3>

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
            <div class="box-header with-border bg-purple">
              <span class="info-box-icon bg-purple" style="background-color: white"><i class="ion ion-ios-heart"></i></span>
              <div class="info-box-content">
                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Interest</h4></span>
              </div>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus" style="color:white"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times" style="color:white"></i></button>
              </div>
            </div>
            <div class="chart">
                <canvas id="interest" style="height:250px"></canvas>
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
             <div class="box-header with-border bg-blue">
              <span class="info-box-icon bg-blue" style="background-color: white"><i class="ion ion-ios-monitor"></i></span>
              <div class="info-box-content">
                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Info Admin</h4></span>
              </div>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus" style="color:white"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times" style="color:white"></i>
                </button>
              </div>
            </div>
              <div class="box-body" style="background-color: white">
                <div class="box-body box-profile">
                  <center>
                    <img class="img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                  </center>
                  <div class="text-center"><b>Admin1</b></div>
                    <p class="text-muted text-center">admin1@gmail.com</p>
                    <ul class="list-group list-group-unbordered">
                      <li class="list-group-item">
                        <b>NIP</b> <a class="pull-right">19589641 191258 7 005 </a>
                      </li>
                      <li class="list-group-item">
                        <b>Asal OPD</b> <a class="pull-right">Dinas Komunikasi dan Informatika</a>
                      </li>
                      <li class="list-group-item">
                        <b>Nomor Telepon</b> <a class="pull-right">085746952841</a>
                      </li>
                      <li class="list-group-item">
                        <b>Alamat</b> <a class="pull-right">Beji Timur</a>
                      </li>
                    </ul>
                    <a href="#" class="btn btn-primary btn-block btn-flat"><b>Lihat</b></a>
                  </div>
                </div>
              </div>

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
                    <small class="pull-right">90</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-Disabled bg-red" style="width: 90%;"></div>
                  </div>

                  <div class="clearfix">
                    <span class="pull-left">Depok</span>
                    <small class="pull-right">500</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-Disabled bg-red" style="width: 70%;"></div>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                  <!-- Progress bars -->
                  <div class="clearfix">
                    <span class="pull-left">Bogor</span>
                    <small class="pull-right">140</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-Disabled bg-red" style="width: 90%;"></div>
                  </div>

                  <div class="clearfix">
                    <span class="pull-left">Bekasi</span>
                    <small class="pull-right">50</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-Disabled bg-red" style="width: 70%;"></div>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              </font>
            </div><!--row-->
            <!-- /.box-body-->
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
                  <ul class="users-list clearfix">
                    <li>
                      <img src="dist/img/user1-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Alexander Pierce</a>
                      <span class="users-list-date">Today</span>
                    </li>
                    <li>
                      <img src="dist/img/user8-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Norman</a>
                      <span class="users-list-date">Yesterday</span>
                    </li>
                    <li>
                      <img src="dist/img/user7-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Jane</a>
                      <span class="users-list-date">12 Jan</span>
                    </li>
                    <li>
                      <img src="dist/img/user6-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#">John</a>
                      <span class="users-list-date">12 Jan</span>
                    </li>
                    <li>
                      <img src="dist/img/user2-160x160.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Alexander</a>
                      <span class="users-list-date">13 Jan</span>
                    </li>
                    <li>
                      <img src="dist/img/user5-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Sarah</a>
                      <span class="users-list-date">14 Jan</span>
                    </li>
                    <li>
                      <img src="dist/img/user4-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Nora</a>
                      <span class="users-list-date">15 Jan</span>
                    </li>
                    <li>
                      <img src="dist/img/user3-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Nadia</a>
                      <span class="users-list-date">15 Jan</span>
                    </li>
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
