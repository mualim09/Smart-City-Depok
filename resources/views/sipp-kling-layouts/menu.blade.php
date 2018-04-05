<ul class="sidebar-menu" data-widget="tree">
  <li>
    <a href="{{ url('/sipp-kling') }}">
      <i class="fa fa-dashboard"></i> <span>Dashboard</span>
    </a>
  </li>
  <li class="treeview">
    <!-- <a href="#"> -->
    <a href="{{ url('sipp-kling/admin/') }}">
      <i class="fa fa-user-secret"></i> <span>Data Admin</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    
    <ul class="treeview-menu">

      <!-- <li><a href="{{ url('/sipp-kling/admin/tambah-admin') }}"><i class="fa fa-circle-o"></i> Tambah Data Admin</a></li> -->

      <li><a href="{{ url('/sipp-kling/admin/create') }}"><i class="fa fa-circle-o"></i> Tambah Data Admin</a></li>

      <li><a href="{{ url('/sipp-kling/admin') }}"><i class="fa fa-circle-o"></i> Kelola Data Admin</a></li>
    </ul>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-user"></i> <span>Data Kader</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    
    <ul class="treeview-menu">
      <li><a href="{{ url('sipp-kling/kader/tambah-kader') }}"><i class="fa fa-circle-o"></i> Tambah Data Kader</a></li>
      <li><a href="{{ url('sipp-kling/kader') }}"><i class="fa fa-circle-o"></i> Kelola Data Kader</a></li>
    </ul>
  </li>
  <li>
    <a href="{{ url('sipp-kling/data-tempat') }}">
      <i class="fa fa-map-marker"></i> <span>Data Tempat</span>
    </a>
  </li>
  <li>
    <a href="{{ url('sipp-kling/jadwal') }}">
      <i class="fa fa-calendar"></i> <span>Jadwal</span>
    </a>
  </li>
  <li>
    <a href="{{ url('sipp-kling/pesan') }}">
      <i class="fa fa-envelope"></i> <span>Pesan</span>
    </a>
  </li>
