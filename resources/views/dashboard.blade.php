@extends('layouts.app')
@section('content')

<script src="../../plugins/chartjs/Chart.min.js"></script>
<script src="../../plugins/chartjs/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<style type="text/css">
.box-header {
  padding: 0px;
}
.box-body {
  padding: 22px;
}
.modal-info .modal-body {
    background-color: #ffffff !important;
    padding: 0 0 1em 0;
}
.modal-success .modal-body {
    background-color: #ffffff !important;
    padding: 0 0 1em 0;
    color: #000;
}
.w3-border-bottom {
    border-bottom: 1px solid #eee!important;
}
.products-list>.item {
  padding: 10px 25px;
}
.input-group .form-control {
    float: right;
    width: 40%;
    }
.scrolluser {
  height: 400px;
  overflow-y: scroll;
}
</style>

<!-- perhitungan untuk bar wilayah visitor -->
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
 <!--  <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
  <li class="active"><a href="/dashboard">Dashboard Aplikasi</li> -->
  </ol>
</section>    

<section class="content">
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua" data-toggle="modal" data-target="#jumlahuser" style="cursor: pointer;">
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
          <h3 style="color: white">{{ array_sum($visitor) }}</h3>
          <p style="color:white">Jumlah Visitor</p>
        </div>
        <div class="icon" style="    margin-top: -8px;">
          <i class="ion ion-ios-location" style="color:white; font-size: 70px; margin-top: -2px"></i>
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
          <h3 style="color: white">{!! round($bouncerate, 2) !!}<sup style="font-size: 20px">%</sup></h3>
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
          <canvas id="statistikvisitor" width="800" height="450"></canvas>
        </div>
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
      <div class="chart" style="padding: 22px;">
        <canvas id="statistik-pengajuan" style="height:250px"></canvas>
      </div>
    </div>

    <div class="box box-widget">
      <div class="box-header with-border bg-olive">
        <span class="info-box-icon bg-olive" style="background-color: white"><i class="ion ion-ios-people"></i></span>
        <div class="info-box-content">
          <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Statistik Event</h4></span>
        </div>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus" style="color:white"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times" style="color:white"></i></button>
        </div>
      </div>
      <div class="chart" style="padding: 22px;">
        <canvas id="statistik-event" style="height:250px"></canvas>
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
            </div>
          </div>
        </font>
      </div>
    </div>

    <div class="box box-widget">
      <div class="box-header with-border bg-maroon">
        <span class="info-box-icon bg-maroon" style="background-color: white"><i class="ion ion-ios-download"></i></span>
        <div class="info-box-content">
          <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Download Aplikasi</h4></span>
        </div>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus" style="color:white"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times" style="color:white"></i></button>
        </div>
      </div>
      <div class="chart" style="padding: 22px;">
        <center><p style="margin: 0;color: #4444449e"><b> Jumlah aplikasi Hi-Depok yang telah digunakan sebanyak : </p>
        <h1 class="maroon" style="margin: 0; color: #d81b60;">{{ $downloadapp }}</b></h1></center>
      </div>
    </div>

    <div class="box box-widget">
      <div class="box-header with-border bg-aqua">
        <span class="info-box-icon bg-aqua" style="background-color: white"><i class="ion ion-ios-personadd"></i></span>
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
            @if (!empty ($users->foto))
            <img src="{{ $users->foto }}" alt="User Image" width="70px">
            @else
            <div class="w3-circle w3-black" width="70px"></div>
            @endif
            <a class="users-list-name" href="#">{{ $users->username }}</a>
            <span class="users-list-date">{{ str_limit ($users->bio, 10) }}</span>
          </li>
          @endforeach
        </ul>
        <!-- /.users-list -->
      </div>
      <!-- /.box-body -->
      <div class="box-footer text-center" data-toggle="modal" data-target="#jumlahuser" style="cursor: pointer;">
        <a class="uppercase">View All Users</a>
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
        <canvas id="statistik-pembaca-artikel" style="height:250px"></canvas>
      </div>
    </div>
    <!-- /.box-body -->



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

<!-- Modal Jumlah User -->
<div class="modal modal-info fade" id="jumlahuser">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">User Hi-Depok</h4>
      </div>
      <div class="modal-body">
        <div class="input-group margin">
          <input type="text" class="form-control" placeholder="Masukkan Username...">
          <span class="input-group-btn">
            <button type="button" class="btn btn-info btn-flat">Cari</button>
          </span>
        </div>
        <div class="scrolluser">
          @foreach($user as $users)
          <ul class="products-list product-list-in-box">
            <li class="item w3-border-bottom">
              <div class="product-img">
                <img src="{{ $users->foto }}" alt="{{ $users->username }}" style="width: 50px; height: 50px">
              </div>
              <div class="product-info">
                <a href="javascript:void(0)" class="product-title">{{ $users->username }}
                  <span class="product-description">
                    {{ $users->bio }}
                  </span>
                </div>
              </li>
            </ul>
            @endforeach
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <script type="text/javascript">
    new Chart(document.getElementById("statistikvisitor"), {
      type: 'line',
      data: {
        labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
        datasets: [{ 
          data: <?php echo json_encode($visitor); ?>,
          label: "Visits",
          borderColor: "#8e5ea2",
          fill: true
        }
        ]
      },
      options: {
        title: {
          display: true,
          text: 'Statistik Pengunjung Hi-Depok 2018'
        }
      }
    });


  //statistik event
  new Chart(document.getElementById("statistik-event"), {
    type: 'doughnut',
    data: {
      labels: <?php echo json_encode($arrayevent); ?>,
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: <?php echo json_encode($arrayjmlevent); ?>,
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Predicted world population (millions) in 2050'
      }
    }
  });

  // Bar chart
new Chart(document.getElementById("statistik-pengajuan"), {
    type: 'bar',
    data: {
      labels: ["Diterima", "Diproses", "Ditolak"],
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: <?php echo json_encode($pengajuanjml); ?>,
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Predicted world population (millions) in 2050'
      }
    }
});

  new Chart(document.getElementById("statistik-pembaca-artikel"), {
    type: 'horizontalBar',
    data: {
      labels: <?php echo json_encode($arrayart); ?>,
      datasets: [
        {
          label: "Pembaca Artikel",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: <?php echo json_encode($arrayartjml); ?>,
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Predicted world population (millions) in 2050'
      }
    }
});
</script>

@include('inc.datachart')



{{--============================================================================================================================= --}}


@endsection