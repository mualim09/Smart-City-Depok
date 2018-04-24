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
    <li class="active"><a data-toggle="tab" href="#tweet">Chart 1</a></li>
    <li><a data-toggle="tab" href="#menu1">Chart 2</a></li>
    <li><a data-toggle="tab" href="#menu2">Chart 3</a></li>
    <li><a data-toggle="tab" href="#menu3">Chart 4</a></li>
  </ul>

  {{-- <h2>HOME</h2> --}}

  <div class="tab-content">
  <div id="tweet" class="tab-pane fade in active">
{{-- ISI Timeline --}}
   <div class="box-body">

                <div class="line-height-box-body"></div>
                  <div class="col-md-8">
                    <canvas id="line-chart" width="800" height="450"></canvas>
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

    </div> {{-- box didalam tab --}}
  </div>
{{-- ================================================== --}}

    <div id="menu1" class="tab-pane fade">
      
      <div class="box-body">

    <div class="line-height-box-body"></div>
                  <div class="col-md-8">
                    <canvas id="canvasbar" width="1351" height="675" style="display: block; height: 450px; width: 901px;"></canvas>
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
    <div id="menu2" class="tab-pane fade">
  
    <div class="box-body">

      <div class="line-height-box-body"></div>
                  <div class="col-md-8">
                    <canvas id="canvasline" width="1351" height="675" style="display: block; height: 450px; width: 901px;"></canvas>
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
                    <canvas id="bubble-chart" width="1351" height="675" style="display: block; height: 450px; width: 901px;"></canvas>
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
                {{-- @foreach($rehats as $rehat)  --}}
                <tr>
                  <td>1</td>
                  <td>2312312312</td>
                  <td>tejo menawan</td>
                  <td>Jalan di Margonda Raya massih suka macet</td>
                  <td>negatif</td>
                  <td style="display:none;">0.25</td>
                  <td style="display:none;">0.25</td>
                  <td style="display:none;">0.5</td>
                  <td>9 mei 2018</td>
                  <td style="white-space: nowrap;" align="center">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" {{-- data-target="#modal-rumah-sehat-{{$rehat->id_rumah_sehat}}" --}}><i class="ion-eye"></i></button>

                    <button type="button" class="btn btn-flat btn-danger" data-toggle="modal" {{-- data-target="#modal-hapus-rumah-sehat-{{$rehat->id_rumah_sehat}}" --}}><i class="ion-ios-trash"></i></button>

                  </td>
                </tr>
                {{-- @endforeach  --}}
              </tbody>
            </table>
          </div>


{{-- content box --}}
        </div>
        <!-- /.box-body -->
      </div>


@endsection