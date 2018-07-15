@extends('socmed.socmed-layout.app')

@section('content')

<div class="box">
<section class="content-header overflow-hidden">
  <div class="col-xs-12 title-dashboard">
    <h3 style="margin-top: 0;">{!! str_replace('-', ' ', ucfirst(Request::route()->getName())) !!}</h3>
    <div class="line-height"></div>
  </div>
</section>

        {{-- ######### --}}
  <ul class="nav nav-tabs">

    <li class="active"><a data-toggle="tab" href="#tweet">CHART TOTAL</a></li>
    <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  CHART /TAHUN <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li role="presentation"><a data-toggle="tab" href="#menu1">Line Chart</a></li>
                  <li role="presentation"><a data-toggle="tab" href="#menu2">Bar Chart</a></li>
                </ul>
              </li>
    <li><a data-toggle="tab" href="#menu3">CHART /HARI</a></li>          
  </ul>

  {{-- <h2>HOME</h2> --}}

  <div class="tab-content">
  <div id="tweet" class="tab-pane fade in active">
{{-- ISI Timeline --}}
   <div class="box-body">

                <div class="line-height-box-body"></div>
                  <div class="col-md-8">
                    <canvas id="pie-chart" width="800" height="450"></canvas>
                  </div>
                  <div class="col-md-4 no-padding">
                    <strong>Informasi detail grafik:</strong>
                  </div>
                  <div class="col-md-4 right-side-information-grafik">
                    <div class="col-xs-6">
                      <strong class="third-leading">Average user rating</strong>
                      <p style="font-size: 30px;margin-top: 6px;">4.3 / 5</p>
                    </div>
                    <div class="col-xs-6" style="text-align: right;padding-top: 10px">
                      <i class="fa fa-thumbs-o-up fa-4x" style="color: #1ba1ed"></i>
                    </div>
                  </div>
                  <div class="col-md-4 right-side-information-grafik" style="padding:10px 25px 10px 20px">
                    <strong style="font-size: 16px;margin-bottom: 5px">Mentions</strong>
                    <div class="row">
                      <div class="col-xs-6">
                        Total
                      </div>
                      <div class="col-xs-6 text-right">
                        785
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-6">
                        No.of <span style="color: green">Positif</span>
                      </div>
                      <div class="col-xs-6 text-right">
                        151
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-6">
                        No.of <span style="color: red">Negatif</span>
                      </div>
                      <div class="col-xs-6 text-right">
                        155
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-6">
                        No.of <span style="color: #fc6">Neutral</span>
                      </div>
                      <div class="col-xs-6 text-right">
                        479
                      </div>
                    </div>
<!--                    <p class="text-center">
                      <i class="fa fa-info-circle fa-2x"></i><br>
                      <strong>Keterangan</strong>
                    </p>-->
{{--                     <div class="progress-group">
                      <span class="progress-text">Total Keseluruhan</span>
                      <span class="progress-number"><b>9</b></span>
                    </div> --}}

                      <div class="row" align="center">
                      <!-- <div class="rating-block"> -->
                        <!-- <h4>Average user rating</h4> -->
                        <!-- <h2 class="bold">4.3 <small>/ 5</small></h2> -->
{{--                         <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                        </button>
                        <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                        </button>
                        <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                        </button>
                        <button type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                        </button>
                        <button type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                        </button> --}}
                    <!-- </div> -->
                    </div>


                  </div>
                  <!-- <div class="col-md-4 box-detail-keterangan">
                    <div class="progress-group">
                    </div>
                  </div> -->

    </div> {{-- box didalam tab --}}
  </div>
{{-- ================================================== --}}

  <div id="menu1" class="tab-pane fade">  
  <div class="box-body">

  <div id="line" class="tab-pane fade in active">
    <div class="line-height-box-body"></div>
                  <div class="col-md-8">
                    <canvas id="line-chart" width="1351" height="675" style="display: block; height: 450px; width: 901px;"></canvas>
                  </div>
                  <div class="col-md-4 bg-aqua-active box-keterangan">
                    <p class="text-center">
                      <i class="fa fa-info-circle fa-2x"></i><br>
                      <strong>Keterangan</strong>
                    </p>
                    <div class="progress-group">
                      <span class="progress-text">Total Keseluruhan</span>
                      <span class="progress-number"><b>9</b></span>
                    </div>
                  </div>

                  <div class="col-md-4 box-detail-keterangan">
                    <div class="progress-group">
                    </div>
                  </div>
  </div>

    </div>
    </div>
    
{{-- ================================================== --}}
    <div id="menu2" class="tab-pane fade">
  
    <div class="box-body">

      <div class="line-height-box-body"></div>
                  <div class="col-md-8">
                    <canvas id="bar-chart" width="1351" height="675" style="display: block; height: 450px; width: 901px;"></canvas>
                  </div>
                  <div class="col-md-4 bg-aqua-active box-keterangan">
                    <p class="text-center">
                      <i class="fa fa-info-circle fa-2x"></i><br>
                      <strong>Keterangan</strong>
                    </p>
                    <div class="progress-group">
                      <span class="progress-text">Total Keseluruhan</span>
                      <span class="progress-number"><b>9</b></span>
                    </div>
                  </div>

                  <div class="col-md-4 box-detail-keterangan">
                    <div class="progress-group">
                    </div>
                  </div>



    </div>
    </div>

{{-- ================================================== --}}

    <div id="menu3" class="tab-pane fade">
  
   <div class="box-body">

                <div class="line-height-box-body"></div>
                  <div class="col-md-8">
                    <canvas id="hari-chart" width="800" height="450"></canvas>
                  </div>
                  <div class="col-md-4 bg-aqua-active box-ketsocmed">
                    <p class="text-center">
                      <i class="fa fa-info-circle fa-2x"></i><br>
                      <strong>Keterangan</strong>
                    </p>
                    <div class="progress-group">
                      <span class="progress-text">Total Keseluruhan</span>
                      <span class="progress-number"><b>9</b></span>
                    </div>
                  </div>

                  <div class="col-md-4 box-detail-keterangan">
                    <div class="progress-group">
                    </div>
                  </div>

    </div>
    </div>

{{-- ================================================== --}}
    </div>
  </div>
{{-- </div> --}}
{{-- =================================================================== --}}
{{-- Data Tabel --}}

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Sentiment Tweet</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
{{-- content box --}}

<div class="table-responsive"></div>
        <!-- /.box-body -->
          <div class="line-height-box-body"></div>
          <div class="table-responsive">
            
              {{-- expr --}}
            <table class="table table-bordered table-hover example2" style="overflow-x:auto;width: 100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Id twitter</th>
                  <th>Nama Akun</th>
                  <th>Text</th>
                  <th>Sentiment</th>
                  <th style="display:none;">Nilai Positif</th>
                  <th style="display:none;">Nilai Netral</th>
                  <th style="display:none;">Nilai Negatif</th>
                  <th>Tanggal tweet</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>


                @foreach ($dbtweets as $no => $dbtweet)
                <tr>
                  <td><?php echo ($no + 1); ?></td>
                  <td>{{$dbtweet['id_twitter']}}</td>
                  <td>{{$dbtweet['nama_akun']}}</td>
                  <td>{!!$dbtweet['tweet']!!}</td>
                  <td>{{$dbtweet['sentiment']}}</td>
                  <td style="display:none;">{{$dbtweet['score_positif']}}</td>
                  <td style="display:none;">{{$dbtweet['score_netral']}}</td>
                  <td style="display:none;">{{$dbtweet['score_negatif']}}</td>
                  <td>{{$dbtweet['created_at']}}</td>
                  <td style="white-space: nowrap;" align="center">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-view-{{$dbtweet['id_twitter']}}"><i class="ion-eye"></i></button>

                    <button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus-{{$dbtweet['id_twitter']}}"><i class="ion-ios-trash"></i></button>

                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            
          </div>

{{-- content box --}}
        </div>
        <!-- /.box-body -->
      </div>


{{-- ============================================================================================================================== --}}
{{-- ===============================================VIEW Detail=================================================================== --}}
@foreach ($dbtweets as $dbtweet)
     <div class="modal fade" id="modal-view-{{$dbtweet['id_twitter']}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center">Lihat</h4>
              </div>
              <div class="modal-body overflow-hidden">
                <div class="row">
                  <div class="col-xs-3">
                    <div class="col-xs-12 no-padding" style="margin-bottom: 10px">
                      <strong>Nama akun</strong><br>
                      <small><b>{{$dbtweet['nama_akun']}}</b></small>
                    </div>
                    <div class="col-xs-12 no-padding" style="margin-bottom: 10px">
                      <strong>Status</strong><br>
                      @if($dbtweet['sentiment'] == 'negatif')
                        <small class="status-sentiment">{{$dbtweet['sentiment']}}</small>
                      @elseif($dbtweet['sentiment'] == 'netral')
                        <small style="display: block;width: 100%;background:#fc6;padding: 3px 12px;color: #fff">{{$dbtweet['sentiment']}}</small>
                      @else
                        <small style="display: block;width: 100%;background: green;padding: 3px 12px;color: #fff">{{$dbtweet['sentiment']}}</small>
                      @endif
                    </div>
                    <div class="col-xs-12 no-padding" style="margin-bottom: 10px;background: #f0f0f0;padding: 6px 13px !important">
                      <strong>Score</strong><br>
                      Positif : {{$dbtweet['score_positif']}}<br>
                      Negatif : {{$dbtweet['score_netral']}}<br>
                      Netral  : {{$dbtweet['score_negatif']}}
                    </div>
                  </div>
                  <div class="col-xs-9">
                    <strong>Tweet:</strong>
                    <div class="box-tweet">
                      {!! $dbtweet['tweet'] !!}
                    </div>
                  </div>
                </div>
                <!-- <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    Nama Akun
                  </div>
                  <div class="col-xs-9">
                    {{$dbtweet['nama_akun']}}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    Sentiment
                  </div>
                  <div class="col-xs-9">
                    {{$dbtweet['sentiment']}}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    Tweet
                  </div>
                  <div class="col-xs-9">
                  
                  {!! $dbtweet['tweet'] !!}
                  
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    Score
                  </div>
                  <div class="col-xs-9">
                  Positif : {{$dbtweet['score_positif']}}<br>
                  Negatif : {{$dbtweet['score_netral']}}<br>
                  Netral  : {{$dbtweet['score_negatif']}}
                  </div>
                </div> -->
              </div>
            </div>
           </div>
      </div>
 @endforeach
{{-- ============================================================================================================================== --}}
@foreach ($dbtweets as  $dbtweet)
<div class="modal fade" id="modal-hapus-{{$dbtweet['id_twitter']}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #f56954">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Hapus</h4>
      </div>
      <div class="modal-body overflow-hidden">
        Apakah anda yakin ingin menghapus Tweet ini?
      </div>
      <div class="modal-footer">
        <form action="/analysis/hapus/{{$dbtweet['id_twitter']}}" method="post">
          <input type="submit" class="btn btn-danger" name="submit" value="YA">
          {{ csrf_field() }}
          <input type="hidden" name="_method" value="DELETE">

        <button type="button" class="btn pull-left" data-dismiss="modal">Tidak</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
{{-- ============================================================================================================================== --}}

@endsection