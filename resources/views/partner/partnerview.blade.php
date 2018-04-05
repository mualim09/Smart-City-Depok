@extends('layouts.app')

@section('content')

<section class="content-header">
  <h1 style="color:#807e7d">
  <b>PARTNER</b>
        <small class="pull-right">21 Agustus 2017 10:45</small>
    </h1>
</section>

<section class="content">
<div class="box box-widget">
  <div class="box-body" style="background-color: white">
    <div class="box-body box-profile">
      <center>
        <img class="img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
      </center>
      <div class="col-sm-12">
        <div class="description-block">
          <h5 class="description-header"><b>Admin</b></h5>
          <span class="description-text">admingmail.com</span>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="description-block border-right">
            <h5 class="description-header">NIP</b></h5>
            <span>19589641 191258 7 005</span>
          </div>
        </div>
        <div class="col-sm-3 border-right">
          <div class="description-block">
            <h5 class="description-header">OPD</b></h5>
            <span>Dinas Komunikasi dan Informatika</span>
          </div>
        </div>
        <div class="col-sm-3 border-right">
          <div class="description-block">
            <h5 class="description-header"><b>NOMOR TELEPON</b></h5>
            <span>085746952841</span>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="description-block">
            <h5 class="description-header"><b>ALAMAT</b></h5>
            <span>Beji Timur</span>
          </div>
        </div>
      </div>
      <div class="box-footer">
        <div class="col-md-2 pull-right">
          <a href="/editpartner" class="btn btn-block btn-flat" style="width: 100%; background-color: black; color: white"><b>EDIT</b></a>
        </div>
      </div>
    </div>
  </div>

</section>

@endsection
