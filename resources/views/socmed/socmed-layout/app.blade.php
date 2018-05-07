<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SOCMED- | Dashboard</title>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">
    {{-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.semanticui.min.css"> --}}
    {{-- ============================================================================================== --}}
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/table.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables/jquery.datatables.min.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables/buttons.dataTables.min.css') }}">
    {{-- <<link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="https://adminlte.io/themes/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/pace/pace.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/morris/morris.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css"') }}>


    <link rel="stylesheet" type="text/css" href="{{ asset('socmed/style.css') }}">


</head>
<body class="skin-purple-light sidebar-mini">
@if (!Auth::guest())
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="/dashboard" class="logo blue-background-main-color" style="height: 56px;">
                <b>SOCMED</b>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top blue-background-main-color" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle hover-changed" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-bell-o"></i>
                              <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                              <li class="header">You have 10 notifications</li>
                              <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                  
                                  <li>
                                    <a href="#">
                                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                    </a>
                                  </li>
                                </ul>
                              </li>
                              <li class="footer"><a href="#">View all</a></li>
                            </ul>
                          </li>
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="{{ asset('dist/img/admin.png')  }}"
                                     class="user-image" alt="User Image"/>
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{!! Auth::user()->name!!}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="{{ asset('dist/img/admin.png') }}"
                                         class="img-circle" alt="User Image"/>
                                    <p>
                                        {!! Auth::user()->name !!}
                                        <small>Member since {!! Auth::user()->created_at->format('M. Y') !!}</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    {{-- <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div> --}}
                                    <div class="pull-right">
                                        <a href="{!! url('/logout') !!}" class="btn btn-default btn-flat"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Sign out
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}

                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        @include('socmed.socmed-layout.socmed-sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @include('inc.messages')
            @yield('content')
        </div>

        <!-- Main Footer -->
        {{-- <footer class="main-footer" style="max-height: 100px;text-align: center">
            <strong>Copyright © 2017 <a href="#">TIREGDEV</a>.</strong> All rights reserved.
        </footer> --}}
        <footer class="main-footer" style="max-height: 100px;text-align: center">
            <img src="{{ asset('dist/img/depok.png') }}" height="40px" class="user-image" alt="User Image"/>
            <img src="{{ asset('dist/img/depokbersahabat.png') }}" height="40px" class="user-image" alt="User Image"/>
            <br>
            <strong>Copyright © 2017 <a href="#">TIREGDEV</a>.</strong> All rights reserved.
        </footer>

    </div>

@else
{{-- ============================================================================================================ --}}
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="/"><b>HI-DEPOK</b></a>
  </div>

  <!-- START LOCK SCREEN ITEM -->
    <!-- lockscreen image -->
    <div class="callout callout-warning" align="center">
                <h4><i class="icon fa fa-warning"></i> I am a danger callout <i class="icon fa fa-warning"></i></h4>
                <p>There is a problem that we need to fix. A wonderful serenity has taken possession of my entire soul,
                  like these sweet mornings of spring which I enjoy with my whole heart.</p>
              </div>

  <div class="text-center">
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2017-2018 <b><a href="http://hi.depok.go.id" class="text-black">TIREGDEV</a></b><br>
    All rights reserved
  </div>
</div>
{{-- ============================================================================================================ --}}

@endif
<!-- jQuery 3.1.1 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
<script type="text/javascript">
var base_url = {!! json_encode(url('/')) !!}
</script>

<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/js/app.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>

<!-- select search -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.full.min.js"></script>

{{-- Data Table --}}

<script type="text/javascript" src="https://adminlte.io/themes/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://adminlte.io/themes/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/buttons/1.4.2/js/buttons.colVis.min.js"></script>





<!-- Slimscroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<script src="../../dist/js/app.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>

<script src="../../js/UIPageScrolling.js"></script>

{{-- ====================================================================================================================== --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{ asset('plugins/fullcalendar/fullcalendar.min.js') }}"></script>
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('plugins/pace/pace.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
{{-- Chart --}}

<script type="text/javascript">
    $(document).ready(function () {
          $('.datepicker').datepicker({
         autoclose: true
         });

        // $(document).ajaxStart(function() { Pace.restart(); });

        // $(".select-search").select2();
      });

</script>

<script type="text/javascript">
// To make Pace works on Ajax calls
$(document).ajaxStart(function() { Pace.restart(); });
$('.ajax').click(function(){
    $.ajax({url: '#', success: function(result){
        $('.ajax-content').html('<hr>Ajax Request Completed !');
    }});
});
</script>



<!-- Morris.js charts -->


<!-- tiny mce -->
{{-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script> --}}


<!-- core js -->
<script type="text/javascript" src="{{ asset('js/initialize.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/core.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/sipp-kling.js') }}"></script>
<!-- vue -->
{{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/vue@2.5.15/dist/vue.js"></script> --}}


@if(Request::route()->getName() == 'analysis')

    <script type="text/javascript">
        $(function(){
            $('.example2').DataTable({
              'paging'      : true, 
              'lengthChange': false,
              'searching'   : true,
              'ordering'    : true,
              'info'        : true,
              'autoWidth'   : true,
              
            dom: 'Bfrtip',
            buttons: [
                {
                        extend: 'copyHtml5',
                        title: 'data export'
                },

                {
                        extend: 'excelHtml5',
                        title: 'data export'
                },

                {
                        extend: 'csvHtml5',
                        title: 'data export'
                },

                {
                    extend: 'pdfHtml5',
                    title: 'data export'
                },

                    // 'colvis',

                    ],

                    });
        });
    </script>
@endif



@if(Request::route()->getName() == 'analysis')
    <script async="" src="{{ asset('plugins/bar_chart/analytics.js.download') }}"></script>
    <script src="{{ asset('plugins/bar_chart/Chart.bundle.js.download')}}"></script>
    <script src="{{ asset('plugins/bar_chart/utils.js.download') }}"></script>
    <script type="text/javascript" src="{{ asset('js/chart-sipp-kling.js') }}"></script>
    <script type="text/javascript">
        $(function(){
              var color = Chart.helpers.color;
              var rsChartData = {
                labels: ["januari", "februari", "maret", "april"],
                datasets: [{
                  label: 'Positif',
                  backgroundColor: color(window.chartColors.blue).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [15 , 20 , 30 , 40]
                }, {
                  label: 'Netral',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: [40 , 30 , 20 , 15]
                }, {
                  label: 'Negatif',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: [20 , 20 , 18 , 12]
                },]
              };

            $('#canvasbar').SippKlingCharts({
                type        : 'bar',
                chartData   : rsChartData,
                titleText   : 'Data RS 2017',
                ketId       : 'rs'
            });


            $('#canvasline').SippKlingCharts({
                type        : 'bubble',
                chartData   : rsChartData,
                titleText   : 'Data RS 2017',
                ketId       : 'rs'
            });
          });

            new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: [1500,1600,1700,1750,1800,1850,1900,1950,1999,2050],
    datasets: [{ 
        data: [86,114,106,106,107,111,133,221,783,2478],
        label: "Africa",
        borderColor: "#3e95cd",
        fill: false
      }, { 
        data: [282,350,411,502,635,809,947,1402,3700,5267],
        label: "Asia",
        borderColor: "#8e5ea2",
        fill: false
      }, { 
        data: [168,170,178,190,203,276,408,547,675,734],
        label: "Europe",
        borderColor: "#3cba9f",
        fill: false
      }, { 
        data: [40,20,10,16,24,38,74,167,508,784],
        label: "Latin America",
        borderColor: "#e8c3b9",
        fill: false
      }, { 
        data: [6,3,2,2,7,26,82,172,312,433],
        label: "North America",
        borderColor: "#c45850",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'World population per region (in millions)'
    }
  }
});


new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
      labels: ["Positif", "Netal", "Negatif"],
      datasets: [{
        // label: "Population (millions)",
        backgroundColor: ["#a55eea","#2ed573","#ff4757"],
        data: [{{$total_positif}},{{$total_netral}},{{$total_negatif}}]
      }]
    },
    options: {
      title: {
        display: true,
        text: 'CHART TOTAL KEPUASAN MASYARAKAT DEPOK'
      }
    }
});



new Chart(document.getElementById("radar"), {
    type: 'radar',
    data: {
      labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
      datasets: [
        {
          label: "1950",
          fill: true,
          backgroundColor: "rgba(179,181,198,0.2)",
          borderColor: "rgba(179,181,198,1)",
          pointBorderColor: "#fff",
          pointBackgroundColor: "rgba(179,181,198,1)",
          data: [8.77,55.61,21.69,6.62,6.82]
        }, {
          label: "2050",
          fill: true,
          backgroundColor: "rgba(255,99,132,0.2)",
          borderColor: "rgba(255,99,132,1)",
          pointBorderColor: "#fff",
          pointBackgroundColor: "rgba(255,99,132,1)",
          pointBorderColor: "#fff",
          data: [25.48,54.16,7.61,8.06,4.45]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Distribution in % of world population'
      }
    }
});


            

    </script>
@endif


@yield('scripts')
</body>
</html>
