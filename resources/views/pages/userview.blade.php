@extends('layouts.app')

@section('content')

<section class="content-header">
  <h1 style="color:#807e7d">
  <b>USER</b>
        <small class="pull-right">21 Agustus 2017 10:45</small>
    </h1>
</section>

<section class="content">
    <div class="box box-widget widget-user">
        <div class="widget-user-header bg-black" style="background: url('../dist/img/photo1.png') center center;">
            <!--<h3 class="widget-user-username">HI DEPOK</h3>
            <h5 class="widget-user-desc">MASTERPIECE</h5>-->
        </div>
        <div class="widget-user-image">
            <img class="img" src="../dist/img/user1-128x128.jpg" alt="User Avatar">
        </div>

        <div class="box-footer">
            <div class="row">
                <div class="col-sm-4">
                  <div class="description-block">
                      <h5 class="description-header"><b>Join pada</b></h5>
                      <span class="description-text">{{$user->created_at}}</span>
                    </div>

                </div>
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header"><b>{{$user->username}}</b></h5>
                    <span class="description-text">{{$user->bio}}</span>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="description-block">
                    <!--<button type="submit" class="btn btn-flat btn-default">EDIT PROFILE</button>-->
                  </div>
                </div>
            </div>
        </div>

        <div class="box-footer">
            <div class="row">
                <div class="col-sm-3">
                  <div class="description-block border-right">
                      <h5 class="description-header"><b><i class="ion ion-android-mail"></i></b></h5>
                      <span>{{$user->email}}</span>
                    </div>
                </div>
                <div class="col-sm-3 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><b><i class="ion ion-android-globe"></i></b></h5>
                    <span>{{$user->alamat}}</span>
                  </div>
                </div>
                <div class="col-sm-3 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><b><i class="ion ion-android-phone-portrait"></i></b></h5>
                    <span>{{$user->no_telp}}</span>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="description-block">
                    <h5 class="description-header"><b><i class="ion ion-android-calendar"></i></b></h5>
                    <span>{{$user->tanggal_lahir}}</span>
                  </div>
                </div>
            </div>
        </div>



        <div class="box-footer">
            <div class="row">
                <div class="col-sm-12">
                  <div class="description-block border-right">
               
                      <h5 class="description-header"><b>PENGHARGAAN</b></h5>
                      <span style="color:grey">Belum ada riwayat penghargaan</span>
            
                    </div>
                </div>
            </div>
        </div>

        <div class="box-footer">
            <div class="row">
                <div class="col-sm-12">
                  <div class="description-block border-right">
                      <h5 class="description-header"><b>KIRIMAN</b></h5>
                      <span style="color:grey">Anda ada riwayat kiriman</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>

@endsection
