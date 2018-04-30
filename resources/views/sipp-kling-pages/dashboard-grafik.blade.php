@extends('sipp-kling-layouts.app')

@section('content')

<section class="content-header overflow-hidden">
	<div class="col-xs-12 title-dashboard">
		<h2>Dashboard grafik</h2>
		<div class="line-height"></div>
	</div>

	<div class="filter-group overflow-hidden col-xs-12">
		<div class="row">
			<div class="form-group col-xs-12">
				<select class="form-control" id="change-dashboard">
					<option value="{{ url('sipp-kling') }}" {{ (\Request::route()->getName() == 'dashboard') ? 'selected' : ''}} >Dashboard Utama</option>
					<option value="{{ url('sipp-kling/dashboard-tabel') }}" {{ (\Request::route()->getName() == 'dashboard-tabel') ? 'selected' : ''}}>Dashboard Tabel</option>
					<option value="{{ url('sipp-kling/dashboard-grafik') }}"

					@if(Request::route()->getName() == 'dashboard-grafik' || Request::route()->getName() == 'dashboard-periode-pendataan')

					selected

					@else


					@endif
					 >Dashboard Grafik</option>
					 <option value="{{ url('sipp-kling/data-tempat') }}">Dashboard Map</option>
					<option value="{{ url('sipp-kling/dashboard-detail') }}">Dashboard Detail</option>
				</select>
			</div>

			<div class="col-xs-12 no-padding">
				<div class="kecamatan col-xs-12 col-lg-3">
					<select class="form-control" id="pendataan">
						<option value="{{ url('sipp-kling/dashboard-grafik') }}" selected="selected">Grafik total</option>
						<option value="{{ url('sipp-kling/dashboard-grafik/periode') }}">Grafik periode</option>
					</select>
				</div>
				<div class="kelurahan col-xs-12 col-lg-3">
						<select class="form-control" id="perbandingan">
							<option value="0">- pilih perbandingan -</option>
							<option value="1">bandingkan semua kecamatan</option>
							<option value="2">bandingkan kelurahan</option>
						</select>
				</div>
				<div class="rw col-xs-12 col-lg-3">
						<select class="form-control" id="perbandingan-kelurahan-di-kecamatan" disabled>
							<option value="0">- pilih kecamatan -</option>
							<option>Limo</option>
						</select>
				</div>
				<div class="rw col-xs-12 col-lg-3">
		              <button type="submit" class="btn btn-flat col-xs-12 green-main-color font-white"> <i class="fa fa-filter"></i>  <strong>Filter</strong> </button>
		          </div>
			</div>
		</div>
	</div>
</section>

<section class="content overflow-hidden">
	<div class="col-xs-12">
		<div class="box box-widget">
			<div class="box-header with-border bg-light-blue" style="padding: 15px">
				<h3 class="box-title"><b>Rumah Sehat</b></h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus font-white"></i>
					</button>
				</div>
			</div>

			<div class="box-body">        
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#rs" data-toggle="tab">RS</a></li>
						<li><a href="#sab" data-toggle="tab">SAB</a></li>
						<li><a href="#pjb" data-toggle="tab">PJB</a></li>
						<li><a href="#spal" data-toggle="tab">SPAL</a></li>
						<li><a href="#jamban" data-toggle="tab">Jamban</a></li>
						<li><a href="#sampah" data-toggle="tab">Sampah</a></li>
					</ul>
					<div class="box-body border-radius-none">
						<div class="tab-content">
							<div class="tab-pane active" id="rs">
								<b>Rumah Sehat</b>
								<div class="line-height-box-body"></div>
									<div class="col-md-8">
										<canvas id="canvasrs" width="1351" height="675" style="display: block; height: 450px; width: 901px;"></canvas>
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

							<div class="tab-pane" id="sab">
								<b>Sarana Air Bersih</b>
								<div class="line-height-box-body"></div>
									<div class="col-md-8">
										<canvas id="canvassab" width="1351" height="675" style="display: block; height: 450px; width: 901px;"></canvas>
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

							<div class="tab-pane" id="pjb">
								<b>Pemantauan Jentik Berkala</b>
								<div class="line-height-box-body"></div>
									<div class="col-md-8">
										<canvas id="canvaspjb" width="1351" height="675" style="display: block; height: 450px; width: 901px;"></canvas>
									</div>
									<div class="col-md-4 bg-aqua-active box-keterangan">
										<p class="text-center">
											<i class="fa fa-info-circle fa-2x"></i><br>
											<strong>Keterangan</strong>
										</p>
										<div class="progress-group">
											<span class="progress-text">Total Keseluruhan</span>
											<span class="progress-number"><b>0</b></span>
										</div>
									</div>

									<div class="col-md-4 box-detail-keterangan">
										<div class="progress-group">
										</div>
									</div>
							</div>

								<div class="tab-pane" id="spal">
								<b>Saluran Pembuangan Air Limbah</b>
								<div class="line-height-box-body"></div>
									<div class="col-md-8">
										<canvas id="canvasspal" width="1351" height="675" style="display: block; height: 450px; width: 901px;"></canvas>
									</div>
									<div class="col-md-4 bg-aqua-active box-keterangan">
										<p class="text-center">
											<i class="fa fa-info-circle fa-2x"></i><br>
											<strong>Keterangan</strong>
										</p>
										<div class="progress-group">
											<span class="progress-text">Total Keseluruhan</span>
											<span class="progress-number"><b>0</b></span>
										</div>
									</div>

									<div class="col-md-4 box-detail-keterangan">
										<div class="progress-group">
										</div>
									</div>
							</div>


								<div class="tab-pane" id="jamban">
								<b>Jamban</b>
								<div class="line-height-box-body"></div>
									<div class="col-md-8">
										<canvas id="canvasjamban" width="1351" height="675" style="display: block; height: 450px; width: 901px;"></canvas>
									</div>
									<div class="col-md-4 bg-aqua-active box-keterangan">
										<p class="text-center">
											<i class="fa fa-info-circle fa-2x"></i><br>
											<strong>Keterangan</strong>
										</p>
										<div class="progress-group">
											<span class="progress-text">Total Keseluruhan</span>
											<span class="progress-number"><b>0</b></span>
										</div>
									</div>

									<div class="col-md-4 box-detail-keterangan">
										<div class="progress-group">
										</div>
									</div>
							</div>

							<div class="tab-pane" id="sampah">
								<b>Sampah</b>
								<div class="line-height-box-body"></div>
									<div class="col-md-8">
										<canvas id="canvassampah" width="1351" height="675" style="display: block; height: 450px; width: 901px;"></canvas>
									</div>
									<div class="col-md-4 bg-aqua-active box-keterangan">
										<p class="text-center">
											<i class="fa fa-info-circle fa-2x"></i><br>
											<strong>Keterangan</strong>
										</p>
										<div class="progress-group">
											<span class="progress-text">Total Keseluruhan</span>
											<span class="progress-number"><b>0</b></span>
										</div>
									</div>

									<div class="col-md-4 box-detail-keterangan">
										<div class="progress-group">
										</div>
									</div>
							</div>

						</div><!-- /.tab-content -->
					</div><!--box body-->
				</div><!-- nav-tabs-custom -->
			</div><!-- /.box-body -->
		</div>




<!-- ==================== -->

		<div class="box box-widget">
			<div class="box-header with-border bg-light-blue" style="padding: 15px">
				<h3 class="box-title"><b>Tempat Pengelolaan Makanan</b></h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus font-white"></i>
					</button>
				</div>
			</div>

			<div class="box-body">        
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#jb" data-toggle="tab">Pemeriksaan Jasa Boga</a></li>

		                <li><a href="#tmr" data-toggle="tab">Tempat Makan dan Restaurant</a></li>
		                <li><a href="#dam" data-toggle="tab">DAM</a></li>
					</ul>
					<div class="box-body border-radius-none">
						<div class="tab-content">
							<div class="tab-pane active" id="jb">
								<b>Pemeriksaan Jasa Boga</b>
								<div class="line-height-box-body"></div>
									<div class="col-md-8">
										<canvas id="canvasjb" width="1351" height="675" style="display: block; height: 450px; width: 901px;"></canvas>

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

							<div class="tab-pane" id="tmr">
								<b>Tempat Makan dan Restaurant</b>
								<div class="line-height-box-body"></div>
									<div class="col-md-8">
										<canvas id="canvastmr" width="1351" height="675" style="display: block; height: 450px; width: 901px;"></canvas>
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

							<div class="tab-pane" id="dam">
								<b>Depot Air Mineral</b>
								<div class="line-height-box-body"></div>
									<div class="col-md-8">
										<canvas id="canvasdam" width="1351" height="675" style="display: block; height: 450px; width: 901px;"></canvas>
									</div>
									<div class="col-md-4 bg-aqua-active box-keterangan">
										<p class="text-center">
											<i class="fa fa-info-circle fa-2x"></i><br>
											<strong>Keterangan</strong>
										</p>
										<div class="progress-group">
											<span class="progress-text">Total Keseluruhan</span>
											<span class="progress-number"><b>0</b></span>
										</div>
									</div>

									<div class="col-md-4 box-detail-keterangan">
										<div class="progress-group">
										</div>
									</div>
							</div>

						</div><!-- /.tab-content -->
					</div><!--box body-->
				</div><!-- nav-tabs-custom -->
			</div><!-- /.box-body -->
		</div>
<!-- ========================================================================================================= -->
<div class="box box-widget">
			<div class="box-header with-border bg-light-blue" style="padding: 15px">
				<h3 class="box-title"><b>Tempat-Tempat Umum</b></h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus font-white"></i>
					</button>
				</div>
			</div>

			<div class="box-body">        
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#ibadah" data-toggle="tab">Tempat Ibadah</a></li>
              <li><a href="#pasar" data-toggle="tab">Pasar</a></li>
              <li><a href="#sekolah" data-toggle="tab">Sekolah</a></li>
              <li><a href="#pesantren" data-toggle="tab">Pesantren</a></li>
              <li><a href="#faskes" data-toggle="tab">Faskes</a></li>
              <li><a href="#hotel" data-toggle="tab">Hotel</a></li>
              <li><a href="#hotelmelati" data-toggle="tab">Hotel Melati</a></li>
					</ul>
					<div class="box-body border-radius-none">
						<div class="tab-content">
							<div class="tab-pane active" id="ibadah">
								<b>Tempat Ibadah</b>
								<div class="line-height-box-body"></div>
									<div class="col-md-8">
										<canvas id="canvasibadah" width="1351" height="675" style="display: block; height: 450px; width: 901px;"></canvas>
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

								<div class="tab-pane" id="pasar">
								<b>Pasar</b>
								<div class="line-height-box-body"></div>
									<div class="col-md-8">
										<canvas id="canvaspasar" width="1351" height="675" style="display: block; height: 450px; width: 901px;"></canvas>
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

							<div class="tab-pane" id="sekolah">
								<b>Sekolah</b>
								<div class="line-height-box-body"></div>
									<div class="col-md-8">
										<canvas id="canvassekolah" width="1351" height="675" style="display: block; height: 450px; width: 901px;"></canvas>
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

							<div class="tab-pane" id="pesantren">
								<b>Pesantren</b>
								<div class="line-height-box-body"></div>
									<div class="col-md-8">
										<canvas id="canvaspesantren" width="1351" height="675" style="display: block; height: 450px; width: 901px;"></canvas>
									</div>
									<div class="col-md-4 bg-aqua-active box-keterangan">
										<p class="text-center">
											<i class="fa fa-info-circle fa-2x"></i><br>
											<strong>Keterangan</strong>
										</p>
										<div class="progress-group">
											<span class="progress-text">Total Keseluruhan</span>
											<span class="progress-number"><b>0</b></span>
										</div>
									</div>

									<div class="col-md-4 box-detail-keterangan">
										<div class="progress-group">
										</div>
									</div>
							</div>

							<div class="tab-pane" id="hotel">
								<b>Hotel</b>
								<div class="line-height-box-body"></div>
									<div class="col-md-8">
										<canvas id="canvashotel" width="1351" height="675" style="display: block; height: 450px; width: 901px;"></canvas>
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

							<div class="tab-pane" id="hotelmelati">
								<b>Hotel Melati</b>
								<div class="line-height-box-body"></div>
									<div class="col-md-8">
										<canvas id="canvashotelmelati" width="1351" height="675" style="display: block; height: 450px; width: 901px;"></canvas>
									</div>
									<div class="col-md-4 bg-aqua-active box-keterangan">
										<p class="text-center">
											<i class="fa fa-info-circle fa-2x"></i><br>
											<strong>Keterangan</strong>
										</p>
										<div class="progress-group">
											<span class="progress-text">Total Keseluruhan</span>
											<span class="progress-number"><b>0</b></span>
										</div>
									</div>

									<div class="col-md-4 box-detail-keterangan">
										<div class="progress-group">
										</div>
									</div>
							</div>
						</div><!-- /.tab-content -->
					</div><!--box body-->
				</div><!-- nav-tabs-custom -->
			</div><!-- /.box-body -->
		</div>
		<!-- ================================================================================================ -->

				<div class="box box-widget">
			<div class="box-header with-border bg-light-blue" style="padding: 15px">
				<h3 class="box-title"><b>Pelayanan Kesehatan Lingkungan</b></h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus font-white"></i>
					</button>
				</div>
			</div>

			<div class="box-body">        
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#pkl" data-toggle="tab">PKL</a></li>

					</ul>
					<div class="box-body border-radius-none">
						<div class="tab-content">
							<div class="tab-pane active" id="pkl">
								<b>Pelayanan kesehatan Lingkungan</b>
								<div class="line-height-box-body"></div>
									<div class="col-md-8">
										<canvas id="canvaspkl" width="1351" height="675" style="display: block; height: 450px; width: 901px;"></canvas>
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

						</div><!-- /.tab-content -->
					</div><!--box body-->
				</div><!-- nav-tabs-custom -->
			</div><!-- /.box-body -->
		</div>

		<!-- </div> -->
	</div>
</section>
<script type="text/javascript">
        $(function(){
          var color = Chart.helpers.color;
              var rsChartData = {
                labels: ["grogol", "krukut", "limo", "meruyung"],
                datasets: [{
                  label: 'Rumah Tidak Sehat',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [{!! $rumah_sehat['rts'][0]->total !!} , {!! $rumah_sehat['rts'][1]->total !!} , {!! $rumah_sehat['rts'][2]->total !!} , {!! $rumah_sehat['rts'][3]->total !!} ]
                }, {
                  label: 'Rumah Sehat',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: [{!! $rumah_sehat['rs'][0]->total !!} , {!! $rumah_sehat['rs'][1]->total !!} , {!! $rumah_sehat['rs'][2]->total !!} , {!! $rumah_sehat['rs'][3]->total !!} ]
                }]
              };

            $('#canvasrs').SippKlingCharts({
                type        : 'bar',
                chartData   : rsChartData,
                titleText   : 'Data RS 2017',
                ketId       : 'rs'
            });

            // pemantauan jentik berkala
            var pjbChartData = {
                labels: ["grogol", "krukut", "limo", "meruyung"],
                datasets: [
                {
                  label: 'YA',
                  backgroundColor: color(window.chartColors.red).alpha(0.9).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [{!! $rumah_sehat['pjby'][0]->total !!} , {!! $rumah_sehat['pjby'][1]->total !!} , {!! $rumah_sehat['pjby'][2]->total !!} , {!! $rumah_sehat['pjby'][3]->total !!}]
                },
                {
                  label: 'TIDAK',
                  backgroundColor: color(window.chartColors.green).alpha(0.9).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: [{!! $rumah_sehat['pjbt'][0]->total !!} , {!! $rumah_sehat['pjbt'][1]->total !!} , {!! $rumah_sehat['pjbt'][2]->total !!} , {!! $rumah_sehat['pjbt'][3]->total !!} ]
                }]
            };

            $('#canvaspjb').SippKlingCharts({
                type        : 'bar',
                chartData   : pjbChartData,
                titleText   : 'Data PJB 2017',
                ketId       : 'pjb'
            });



 var color = Chart.helpers.color;
              var jambanChartData = {
                labels: ["grogol", "krukut", "limo", "meruyung"],
                datasets: [{
                  label: 'Kali',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [{!! $rumah_sehat['jambankali'][0]->total !!} , {!! $rumah_sehat['jambankali'][1]->total !!} , {!! $rumah_sehat['jambankali'][2]->total !!} , {!! $rumah_sehat['jambankali'][3]->total !!}  ]
                },
                {
                  label: 'Koya / Empang',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [{!! $rumah_sehat['jambankoya'][0]->total !!} , {!! $rumah_sehat['jambankoya'][1]->total !!} , {!! $rumah_sehat['jambankoya'][2]->total !!} , {!! $rumah_sehat['jambankoya'][3]->total !!}]
                },
                {
                  label: 'Helikopter',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [{!! $rumah_sehat['jambanheli'][0]->total !!} , {!! $rumah_sehat['jambanheli'][1]->total !!} , {!! $rumah_sehat['jambanheli'][2]->total !!} , {!! $rumah_sehat['jambanheli'][3]->total !!} ]
                }, {
                  label: 'Septik Tank',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: [{!! $rumah_sehat['jambanseptik'][0]->total !!} , {!! $rumah_sehat['jambanseptik'][1]->total !!} , {!! $rumah_sehat['jambanseptik'][2]->total !!} , {!! $rumah_sehat['jambanseptik'][3]->total !!} ]
                }]
              };

            $('#canvasjamban').SippKlingCharts({
                type        : 'bar',
                chartData   : jambanChartData,
                titleText   : 'Data Jamban 2017',
                ketId       : 'jamban'
            });




            var color = Chart.helpers.color;
              var spalChartData = {
                labels: ["grogol", "krukut", "limo", "meruyung"],
                datasets: [{
                  label: 'Terbuka',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [{!! $rumah_sehat['spaltb'][0]->total !!} , {!! $rumah_sehat['spaltb'][1]->total !!} , {!! $rumah_sehat['spaltb'][2]->total !!} , {!! $rumah_sehat['spaltb'][3]->total !!}]
                }, {
                  label: 'Tertutup',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: [{!! $rumah_sehat['spaltt'][0]->total !!} , {!! $rumah_sehat['spaltt'][1]->total !!} , {!! $rumah_sehat['spaltt'][2]->total !!} , {!! $rumah_sehat['spaltt'][3]->total !!}]
                }]
              };

            $('#canvasspal').SippKlingCharts({
                type        : 'bar',
                chartData   : spalChartData,
                titleText   : 'Data SPAL 2017',
                ketId       : 'spal'
            });

//SAMPAH
              var color = Chart.helpers.color;
              var sampahChartData = {
                labels: ["grogol", "krukut", "limo", "meruyung"],
                datasets: [{
                  label: 'Dipilah / Organik',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [{!! $rumah_sehat['tpsor'][0]->total !!} , {!! $rumah_sehat['tpsor'][1]->total !!} , {!! $rumah_sehat['tpsor'][2]->total !!} , {!! $rumah_sehat['tpsor'][3]->total !!}]
                }, {
                  label: 'Tidak Dipilah / Dibuang',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: [{!! $rumah_sehat['tpsdib'][0]->total !!} , {!! $rumah_sehat['tpsdib'][1]->total !!} ,
                   {!! $rumah_sehat['tpsdib'][2]->total !!} , {!! $rumah_sehat['tpsdib'][3]->total !!}]
                }]
              };

            $('#canvassampah').SippKlingCharts({
                type        : 'bar',
                chartData   : sampahChartData,
                titleText   : 'Data Sampah 2017',
                ketId       : 'sampah'
            });

//PKL
var color = Chart.helpers.color;
              var pklChartData = {
                labels: ["grogol", "krukut", "limo", "meruyung"],
                datasets: [{
                  label: 'Luar Gedung',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [{!! $pelayanan_keslings['pklluar'][0]->total !!} , {!! $pelayanan_keslings['pklluar'][1]->total !!} ,
                   {!! $pelayanan_keslings['pklluar'][2]->total !!} , {!! $pelayanan_keslings['pklluar'][3]->total !!}]
                }, {
                  label: 'Dalam Gedung',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: [{!! $pelayanan_keslings['pkldalam'][0]->total !!} , {!! $pelayanan_keslings['pkldalam'][1]->total !!} , 
                  {!! $pelayanan_keslings['pkldalam'][2]->total !!} , {!! $pelayanan_keslings['pkldalam'][3]->total !!}]
                }]
              };

            $('#canvaspkl').SippKlingCharts({
                type        : 'bar',
                chartData   : pklChartData,
                titleText   : 'Data PKL 2017',
                ketId       : 'pkl'
            });

//////////////////////////////////////////////////////////////////////////////////////////DAM///////////////////////////////////////////////////////
            var color = Chart.helpers.color;
              var damChartData = {
                labels: ["grogol", "krukut", "limo", "meruyung"],
                datasets: [{
                  label: 'Memenuhi Persyaratan',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [{!! $dam_sip_klings['depotlayak'][0]->total !!} , {!! $dam_sip_klings['depotlayak'][1]->total !!} , 
                  {!! $dam_sip_klings['depotlayak'][2]->total !!} , {!! $dam_sip_klings['depotlayak'][3]->total !!}]
                }, {
                  label: 'Tidak Memenuhi Persyaratan',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: [{!! $dam_sip_klings['depottlayak'][0]->total !!} , {!! $dam_sip_klings['depottlayak'][1]->total !!} ,
                   {!! $dam_sip_klings['depottlayak'][2]->total !!} , {!! $dam_sip_klings['depottlayak'][3]->total !!}]
                }]
              };

            $('#canvasdam').SippKlingCharts({
                type        : 'bar',
                chartData   : damChartData,
                titleText   : 'Data DAM 2017',
                ketId       : 'dam'
            });


//============================================================TMr===============================
            var color = Chart.helpers.color;
              var tmrChartData = {
                labels: ["grogol", "krukut", "limo", "meruyung"],
                datasets: [{
                  label: 'Layak',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [{!! $kuliners['rmlayak'][0]->total !!} , {!! $kuliners['rmlayak'][1]->total !!} ,
                   {!! $kuliners['rmlayak'][2]->total !!} , {!! $kuliners['rmlayak'][3]->total !!}]
                }, {
                  label: 'Tidak Layak',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: [{!! $kuliners['rmtlayak'][0]->total !!} , {!! $kuliners['rmtlayak'][1]->total !!} ,
                   {!! $kuliners['rmtlayak'][2]->total !!} , {!! $kuliners['rmtlayak'][3]->total !!} ]
                }]
              };

            $('#canvastmr').SippKlingCharts({
                type        : 'bar',
                chartData   : tmrChartData,
                titleText   : 'Data Kuliner 2017',
                ketId       : 'tmr'
            });


//============================================================JASA BOGA===============================
            var color = Chart.helpers.color;
              var jbChartData = {
                labels: ["grogol", "krukut", "limo", "meruyung"],
                datasets: [{
                  label: 'Layak',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [{!! $jasa_bogas['jblayak'][0]->total !!} , {!! $jasa_bogas['jblayak'][1]->total !!} ,
                   {!! $jasa_bogas['jblayak'][2]->total !!} , {!! $jasa_bogas['jblayak'][3]->total !!}]
                }, {
                  label: 'Tidak Layak',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: [{!! $jasa_bogas['jbtlayak'][0]->total !!} , {!! $jasa_bogas['jbtlayak'][1]->total !!} ,
                   {!! $jasa_bogas['jbtlayak'][2]->total !!} , {!! $jasa_bogas['jbtlayak'][3]->total !!} ]
                }]
              };

            $('#canvasjb').SippKlingCharts({
                type        : 'bar',
                chartData   : jbChartData,
                titleText   : 'Data Kuliner 2017',
                ketId       : 'jb'
            });

//============================================================TMPAT IBADAH===============================
            var color = Chart.helpers.color;
              var ibadahChartData = {
                labels: ["grogol", "krukut", "limo", "meruyung"],
                datasets: [{
                  label: 'Layak',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [{!! $tempat_ibadahs['masjidlayak'][0]->total !!} , {!! $tempat_ibadahs['masjidlayak'][1]->total !!} ,
                   {!! $tempat_ibadahs['masjidlayak'][2]->total !!} , {!! $tempat_ibadahs['masjidlayak'][3]->total !!} ]
                }, {
                  label: 'Tidak Layak',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: [{!! $tempat_ibadahs['masjidtlayak'][0]->total !!} , {!! $tempat_ibadahs['masjidtlayak'][1]->total !!} ,
                   {!! $tempat_ibadahs['masjidtlayak'][2]->total !!} , {!! $tempat_ibadahs['masjidtlayak'][3]->total !!} ]
                }]
              };

            $('#canvasibadah').SippKlingCharts({
                type        : 'bar',
                chartData   : ibadahChartData,
                titleText   : 'Data Tempat Ibadah 2017',
                ketId       : 'ibadah'
            });
//=========================================================================Pasar
            var color = Chart.helpers.color;
              var pasarChartData = {
                labels: ["grogol", "krukut", "limo", "meruyung"],
                datasets: [{
                  label: 'Sehat',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: [ {!! $pasars['psrlayak'][0]->total !!} , {!! $pasars['psrlayak'][1]->total !!} ,
                   {!! $pasars['psrlayak'][2]->total !!} , {!! $pasars['psrlayak'][3]->total !!}]
                 },
                 {
                  label: 'Tidak Sehat',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [{!! $pasars['psrtlayak'][0]->total !!} , {!! $pasars['psrtlayak'][1]->total !!} ,
                   {!! $pasars['psrtlayak'][2]->total !!} , {!! $pasars['psrtlayak'][3]->total !!}]
                }]
              };

            $('#canvaspasar').SippKlingCharts({
                type        : 'bar',
                chartData   : pasarChartData,
                titleText   : 'Data Pasar 2017',
                ketId       : 'pasar'
            });





            //=========================================================================SEKOLAH
            var color = Chart.helpers.color;
              var sekolahChartData = {
                labels: ["grogol", "krukut", "limo", "meruyung"],
                datasets: [
                {
                  label: 'Sehat',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: [{!! $sekolahs['sklayak'][0]->total !!} , {!! $sekolahs['sklayak'][1]->total !!} ,
                   {!! $sekolahs['sklayak'][2]->total !!} , {!! $sekolahs['sklayak'][3]->total !!} ]
              },
              {
                  label: 'Tidak Sehat',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [{!! $sekolahs['sktlayak'][0]->total !!} , {!! $sekolahs['sktlayak'][1]->total !!} ,
                   {!! $sekolahs['sktlayak'][2]->total !!} , {!! $sekolahs['sktlayak'][3]->total !!}]
               }]
                };

            $('#canvassekolah').SippKlingCharts({
                type        : 'bar',
                chartData   : sekolahChartData,
                titleText   : 'Data Sekolah 2017',
                ketId       : 'sekolah'
            });






            //=========================================================================PESANTREN
            var color = Chart.helpers.color;
              var pesantrenChartData = {
                labels: ["grogol", "krukut", "limo", "meruyung"],
                datasets: [{
                  label: 'Sehat',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: [{!! $pesantrens['pstlayak'][0]->total !!} , {!! $pesantrens['pstlayak'][1]->total !!} ,
                   {!! $pesantrens['pstlayak'][2]->total !!} , {!! $pesantrens['pstlayak'][3]->total !!} ]
              },
              {
                  label: 'Tidak Sehat',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [{!! $pesantrens['psttlayak'][0]->total !!} , {!! $pesantrens['psttlayak'][1]->total !!} ,
                   {!! $pesantrens['psttlayak'][2]->total !!} , {!! $pesantrens['psttlayak'][3]->total !!}]
              }]  
            };

            $('#canvaspesantren').SippKlingCharts({
                type        : 'bar',
                chartData   : pesantrenChartData,
                titleText   : 'Data Pesantren 2017',
                ketId       : 'pesantren'
            });




                        //=========================================================================HOTEL=======================================
            var color = Chart.helpers.color;
              var hotelChartData = {
                labels: ["grogol", "krukut", "limo", "meruyung"],
                datasets: [{
                  label: 'Sehat',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: [ {!! $hotels['hlayak'][0]->total !!} , {!! $hotels['hlayak'][1]->total !!} ,
                   {!! $hotels['hlayak'][2]->total !!} , {!! $hotels['hlayak'][3]->total !!}]
                },{
                  label: 'Tidak Sehat',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [{!! $hotels['htlayak'][0]->total !!} , {!! $hotels['htlayak'][1]->total !!} ,
                   {!! $hotels['htlayak'][2]->total !!} , {!! $hotels['htlayak'][3]->total !!} ]
                }]
              };

            $('#canvashotel').SippKlingCharts({
                type        : 'bar',
                chartData   : hotelChartData,
                titleText   : 'Data Hotel 2017',
                ketId       : 'hotel'
            });










                        //=========================================================================HOTEL MELATI=======================================
            var color = Chart.helpers.color;
              var hotelmelatiChartData = {
                labels: ["grogol", "krukut", "limo", "meruyung"],
                datasets: [ {
                  label: 'Sehat',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: [{!! $hotel_melatis['hmlayak'][1]->total !!} , {!! $hotel_melatis['hmlayak'][1]->total !!} ,
                   {!! $hotel_melatis['hmlayak'][1]->total !!} , {!! $hotel_melatis['hmlayak'][1]->total !!} ]
                }, {
                  label: 'Tidak Sehat',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [ {!! $hotel_melatis['hmtlayak'][1]->total !!} , {!! $hotel_melatis['hmtlayak'][1]->total !!} ,
                   {!! $hotel_melatis['hmtlayak'][1]->total !!} , {!! $hotel_melatis['hmtlayak'][1]->total !!}]
                }]
              };

            $('#canvashotelmelati').SippKlingCharts({
                type        : 'bar',
                chartData   : hotelmelatiChartData,
                titleText   : 'Data Hotel Melati 2017',
                ketId       : 'hotelmelati'
            });


      });

    </script>
@endsection