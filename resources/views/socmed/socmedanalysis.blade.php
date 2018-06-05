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
                  <div class="col-md-4 bg-aqua-active box-ketsocmed">
                    
                    <p class="text-center">
                      <i class="fa fa-info-circle fa-2x"></i><br>
                      <strong>Keterangan</strong>
                    </p>
{{--                     <div class="progress-group">
                      <span class="progress-text">Total Keseluruhan</span>
                      <span class="progress-number"><b>9</b></span>
                    </div> --}}

                      <div class="row" align="center">
                      <div class="rating-block">
                        <span class="info-box-icon bg-green"><i class="fa fa-thumbs-o-up"></i></span>
                        <h4>Average user rating</h4>
                        <h2 class="bold">4.3 <small>/ 5</small></h2>
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
                    </div>
                    </div>


                  </div>
                  <div class="col-md-4 box-detail-keterangan">
                    <div class="progress-group">
                    </div>
                  </div>

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
                  <td>{{$dbtweet->id_twitter}}</td>
                  <td>{{$dbtweet->nama_akun}}</td>
                  <td>{!!$dbtweet->tweet!!}</td>
                  <td>{{$dbtweet->sentiment}}</td>
                  <td style="display:none;">{{$dbtweet->score_positif}}</td>
                  <td style="display:none;">{{$dbtweet->score_netral}}</td>
                  <td style="display:none;">{{$dbtweet->score_negatif}}</td>
                  <td>{{$dbtweet->created_at}}</td>
                  <td style="white-space: nowrap;" align="center">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" {{-- data-target="#modal-rumah-sehat-{{$rehat->id_rumah_sehat}}" --}}><i class="ion-eye"></i></button>

                    <button type="button" class="btn btn-flat btn-danger" data-toggle="modal" {{-- data-target="#modal-hapus-rumah-sehat-{{$rehat->id_rumah_sehat}}" --}}><i class="ion-ios-trash"></i></button>

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


@endsection