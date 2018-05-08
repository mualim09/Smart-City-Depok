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
							<option value="0">bandingkan semua kecamatan</option>
							<option value="2" selected="selected">bandingkan kelurahan</option>
						</select>
				</div>
				<form role="form" class="form" method="post" action="{{ url('sipp-kling/dashboard-grafik/filter') }}">
					{{ csrf_field() }}
					<div class="rw col-xs-12 col-lg-3">
							<select class="form-control" name="kecamatan" id="perbandingan-kelurahan-di-kecamatan">
								<option value="0">- pilih kecamatan -</option>
								@foreach($kecamatans as $datas)
	                
				                  <option value="{{ $datas->kecamatan }}" {{ ($datas->kecamatan == $param_kecamatan) ? 'selected' : '' }}> {{ $datas->kecamatan }}</option>
				                
				                @endforeach
							</select>
					</div>
					<div class="rw col-xs-12 col-lg-3">
			              <button type="submit" class="btn btn-flat col-xs-12 green-main-color font-white"> <i class="fa fa-filter"></i>  <strong>Filter</strong> </button>
			        </div>
		        </form>
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
        	function getMaps(param){
        		var fixMaps = [];
        		for (var a = 0; a < param.length; a++) {
        			fixMaps[a] = param[a]['kelurahan'];
        		}

        		return fixMaps;
        	}

        	function getValidDataWithoutTotal(param){
        		var fixData = [];
        		for (var i = 0; i < param.length; i++) {
        			fixData[i] = Number(param[i]['total']);
        		}

        		return fixData;
        	}

        	var maps = getMaps({!! json_encode($data['rts']) !!});

        	// scope
        	var scale = ['rts','rs','pjby','pjbt','spalbt','spaltb','spaltt','tpsor','tpsdib','jambankali','jambankoya','jambanheli','jambanseptik','pklluar','pkldalam','depotlayak','depottlayak','rmlayak','rmtlayak','jblayak','jbtlayak','masjidlayak','masjidtlayak','sklayak','sktlayak','psrlayak','psrtlayak','pstlayak','psttlayak','hlayak','htlayak','hmlayak','hmtlayak'];

        	// canvas
        	var canvas = ['canvasrs','canvaspjb','canvasspal','canvassampah','canvaspkl','canvasdam','canvastmr','canvasjb','canvasibadah','canvaspasar','canvassekolah','canvaspesantren','canvashotel','canvashotelmelati'];

        	var jsonParsePhpVar = {!! json_encode($data) !!};
        	var data = [];
        	var x;
        	var i = 0;
        	for(x in jsonParsePhpVar){
        		data[scale[i++]] = getValidDataWithoutTotal(jsonParsePhpVar[x]);
        	}

        	var color = Chart.helpers.color;
              var rsChartData = {
                labels: maps,
                datasets: [{
                  label: 'Rumah Tidak Sehat',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: data['rts']
                }, {
                  label: 'Rumah Sehat',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: data['rs']
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
                labels: maps,
                datasets: [
                {
                  label: 'YA',
                  backgroundColor: color(window.chartColors.red).alpha(0.9).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: data['pjby']
                },
                {
                  label: 'TIDAK',
                  backgroundColor: color(window.chartColors.green).alpha(0.9).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: data['pjbt']
                }]
            };

            $('#canvaspjb').SippKlingCharts({
                type        : 'bar',
                chartData   : pjbChartData,
                titleText   : 'Data PJB 2017',
                ketId       : 'pjb'
            });

            var jambanChartData = {
                labels: maps,
                datasets: [{
                  label: 'Kali',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: data['jambankali']
                },
                {
                  label: 'Koya / Empang',
                  backgroundColor: color(window.chartColors.yellow).alpha(1).rgbString(),
                  borderColor: window.chartColors.yellow,
                  borderWidth: 1,
                  data: data['jambankoya']
                },
                {
                  label: 'Helikopter',
                  backgroundColor: color(window.chartColors.blue).alpha(1).rgbString(),
                  borderColor: window.chartColors.blue,
                  borderWidth: 1,
                  data: data['jambanheli']
                }, {
                  label: 'Septik Tank',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: data['jambanseptik']
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
                labels: maps,
                datasets: [{
                  label: 'Terbuka',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data:data['spaltb']
                }, {
                  label: 'Tertutup',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: data['spaltt']
                }]
              };

            $('#canvasspal').SippKlingCharts({
                type        : 'bar',
                chartData   : spalChartData,
                titleText   : 'Data SPAL 2017',
                ketId       : 'spal'
            });

            var color = Chart.helpers.color;
              var sampahChartData = {
                labels: maps,
                datasets: [{
                  label: 'Dipilah / Organik',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: data['tpsor']
                }, {
                  label: 'Tidak Dipilah / Dibuang',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: data['tpsdib']
                }]
              };

            $('#canvassampah').SippKlingCharts({
                type        : 'bar',
                chartData   : sampahChartData,
                titleText   : 'Data Sampah 2017',
                ketId       : 'sampah'
            });

            var pklChartData = {
                labels: maps,
                datasets: [{
                  label: 'Luar Gedung',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: data['pklluar']
                }, {
                  label: 'Dalam Gedung',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: data['pkldalam']
                }]
              };

            $('#canvaspkl').SippKlingCharts({
                type        : 'bar',
                chartData   : pklChartData,
                titleText   : 'Data PKL 2017',
                ketId       : 'pkl'
            });

            var color = Chart.helpers.color;
              var damChartData = {
                labels: maps,
                datasets: [{
                  label: 'Memenuhi Persyaratan',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: data['depotlayak']
                }, {
                  label: 'Tidak Memenuhi Persyaratan',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: data['depottlayak']
                }]
              };

            $('#canvasdam').SippKlingCharts({
                type        : 'bar',
                chartData   : damChartData,
                titleText   : 'Data DAM 2017',
                ketId       : 'dam'
            });


            var tmrChartData = {
                labels: maps,
                datasets: [{
                  label: 'Layak',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: data['rmlayak']
                }, {
                  label: 'Tidak Layak',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: data['rmtlayak']
                }]
              };

            $('#canvastmr').SippKlingCharts({
                type        : 'bar',
                chartData   : tmrChartData,
                titleText   : 'Data Kuliner 2017',
                ketId       : 'tmr'
            });

            var jbChartData = {
                labels: maps,
                datasets: [{
                  label: 'Layak',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: data['jblayak']
                }, {
                  label: 'Tidak Layak',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: data['jbtlayak']
                }]
              };

            $('#canvasjb').SippKlingCharts({
                type        : 'bar',
                chartData   : jbChartData,
                titleText   : 'Data Kuliner 2017',
                ketId       : 'jb'
            });

            var ibadahChartData = {
                labels: maps,
                datasets: [{
                  label: 'Layak',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: data['masjidlayak']
                }, {
                  label: 'Tidak Layak',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: data['masjidtlayak']
                }]
              };

            $('#canvasibadah').SippKlingCharts({
                type        : 'bar',
                chartData   : ibadahChartData,
                titleText   : 'Data Tempat Ibadah 2017',
                ketId       : 'ibadah'
            });

            var pasarChartData = {
                labels: maps,
                datasets: [{
                  label: 'Sehat',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: data['psrlayak']
                 },
                 {
                  label: 'Tidak Sehat',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: data['psrtlayak']
                }]
              };

            $('#canvaspasar').SippKlingCharts({
                type        : 'bar',
                chartData   : pasarChartData,
                titleText   : 'Data Pasar 2017',
                ketId       : 'pasar'
            });


            var sekolahChartData = {
                labels: maps,
                datasets: [
                {
                  label: 'Sehat',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: data['sklayak']
              },
              {
                  label: 'Tidak Sehat',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: data['sktlayak']
               }]
                };

            $('#canvassekolah').SippKlingCharts({
                type        : 'bar',
                chartData   : sekolahChartData,
                titleText   : 'Data Sekolah 2017',
                ketId       : 'sekolah'
            });


            var pesantrenChartData = {
                labels: maps,
                datasets: [{
                  label: 'Sehat',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: data['pstlayak']
              },
              {
                  label: 'Tidak Sehat',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: data['psttlayak']
              }]  
            };

            $('#canvaspesantren').SippKlingCharts({
                type        : 'bar',
                chartData   : pesantrenChartData,
                titleText   : 'Data Pesantren 2017',
                ketId       : 'pesantren'
            });

            var hotelChartData = {
                labels: maps,
                datasets: [{
                  label: 'Sehat',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: data['hlayak']
                },{
                  label: 'Tidak Sehat',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: ['htlayak']
                }]
              };

            $('#canvashotel').SippKlingCharts({
                type        : 'bar',
                chartData   : hotelChartData,
                titleText   : 'Data Hotel 2017',
                ketId       : 'hotel'
            });


            var hotelmelatiChartData = {
                labels: ["grogol", "krukut", "limo", "meruyung"],
                datasets: [ {
                  label: 'Sehat',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: data['hmlayak']
                }, {
                  label: 'Tidak Sehat',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: ata['hmtlayak']
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