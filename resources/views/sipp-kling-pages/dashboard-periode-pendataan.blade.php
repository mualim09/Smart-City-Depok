@extends('sipp-kling-layouts.app')

@section('content')

<section class="content-header overflow-hidden">
	<div class="col-xs-12 title-dashboard">
		<h2>Dashboard grafik waktu</h2>
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
					<option value="{{ url('sipp-kling/dashboard-map') }}">Dashboard Map</option>
					<option value="{{ url('sipp-kling/dashboard-detail') }}">Dashboard Detail</option>
				</select>
			</div>
<!-- 
			<div class="kecamatan col-xs-12 col-lg-6">
					<select class="form-control" id="pendataan">
						<option value="{{ url('sipp-kling/dashboard-grafik') }}">- semua periode -</option>
						<option {{ ($param == 'periode-satu') ? 'selected' : '' }}>periode satu</option>
						<option {{ ($param == 'periode-dua') ? 'selected' : '' }}>periode dua</option>
					</select>
				</div> -->

			<div class="col-xs-12 no-padding">
				<div class="kelurahan col-xs-12 col-lg-3">
						<select class="form-control" id="grafik">
							<option value="0">- pilih chart -</option>
							<option>grafik</option>
							<option>statistik</option>
						</select>
				</div>
				<div class="kelurahan col-xs-12 col-lg-3">
						<select class="form-control" id="perbandingan">
							<option value="0">- pilih perbandingan -</option>
							<option value="1">semua kecamatan</option>
							<option value="2">kelurahan di kecamatan</option>
						</select>
				</div>
				<div class="rw col-xs-12 col-lg-3">
						<select class="form-control" id="perbandingan-kelurahan-di-kecamatan" disabled>
							<option value="0">- pilih kecamatan -</option>
							<option>ini kecamatan</option>
						</select>
				</div>
				<div class="rw col-xs-12 col-lg-3">
					<button class="btn btn-primary col-xs-12"> <i class="fa fa-search"></i>  <strong>Search</strong> </button>
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
						<li><a href="#jbn" data-toggle="tab">Jamban</a></li>
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
											<div class="col-xs-12 no-padding overflow-hidden">
												<span class="progress-text">Krukut</span>
												<div class="pull-right detail-implicit">
													<small class="label pull-right" style="background-color: #FF7290">0</small>
													<small class="label pull-right" style="background-color: #5DC6C6">0</small>
												</div>
											</div>
											<div class="col-xs-12 no-padding overflow-hidden">
												<span class="progress-text">Limo</span>
												<div class="pull-right detail-implicit">
													<small class="label pull-right" style="background-color: #FF7290">0</small>
													<small class="label pull-right" style="background-color: #5DC6C6">0</small>
												</div>
											</div>
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
											<div class="col-xs-12 no-padding overflow-hidden">
												<span class="progress-text">Krukut</span>
												<div class="pull-right detail-implicit">
													<small class="label pull-right" style="background-color: #FF7290">0</small>
													<small class="label pull-right" style="background-color: #5DC6C6">0</small>
												</div>
											</div>
											<div class="col-xs-12 no-padding overflow-hidden">
												<span class="progress-text">Limo</span>
												<div class="pull-right detail-implicit">
													<small class="label pull-right" style="background-color: #FF7290">0</small>
													<small class="label pull-right" style="background-color: #5DC6C6">0</small>
												</div>
											</div>
										</div>
									</div>
							</div>

						</div><!-- /.tab-content -->
					</div><!--box body-->
				</div><!-- nav-tabs-custom -->
			</div><!-- /.box-body -->
		</div>

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
						<li class="active"><a href="#pjboga" data-toggle="tab">Pemeriksaan Jasa Boga</a></li>
		                <li><a href="#tmr" data-toggle="tab">Tempat Makan dan Restaurant</a></li>
		                <li><a href="#dam" data-toggle="tab">DAM</a></li>
					</ul>
					<div class="box-body border-radius-none">
						<div class="tab-content">
							<div class="tab-pane active" id="pjboga">
								<b>Tempat Pengelolaan Makanan</b>
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
											<div class="col-xs-12 no-padding overflow-hidden">
												<span class="progress-text">Krukut</span>
												<div class="pull-right detail-implicit">
													<small class="label pull-right" style="background-color: #FF7290">0</small>
													<small class="label pull-right" style="background-color: #5DC6C6">0</small>
												</div>
											</div>
											<div class="col-xs-12 no-padding overflow-hidden">
												<span class="progress-text">Limo</span>
												<div class="pull-right detail-implicit">
													<small class="label pull-right" style="background-color: #FF7290">0</small>
													<small class="label pull-right" style="background-color: #5DC6C6">0</small>
												</div>
											</div>
										</div>
									</div>
							</div>

						</div><!-- /.tab-content -->
					</div><!--box body-->
				</div><!-- nav-tabs-custom -->
			</div><!-- /.box-body -->
		</div>




		<div class="box box-widget">
			<div class="box-header with-border bg-light-blue" style="padding: 15px">
				<h3 class="box-title"><b>Tempat Tempat Umum</b></h3>

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
								<b>Tempat Tempat Umum</b>
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
											<div class="col-xs-12 no-padding overflow-hidden">
												<span class="progress-text">Krukut</span>
												<div class="pull-right detail-implicit">
													<small class="label pull-right" style="background-color: #FF7290">0</small>
													<small class="label pull-right" style="background-color: #5DC6C6">0</small>
												</div>
											</div>
											<div class="col-xs-12 no-padding overflow-hidden">
												<span class="progress-text">Limo</span>
												<div class="pull-right detail-implicit">
													<small class="label pull-right" style="background-color: #FF7290">0</small>
													<small class="label pull-right" style="background-color: #5DC6C6">0</small>
												</div>
											</div>
										</div>
									</div>
							</div>

						</div><!-- /.tab-content -->
					</div><!--box body-->
				</div><!-- nav-tabs-custom -->
			</div><!-- /.box-body -->
		</div>



		<div class="box box-widget">
			<div class="box-header with-border bg-light-blue" style="padding: 15px">
				<h3 class="box-title"><b>Pelayanan Kesehatan Lingkungan</b></h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus font-white"></i>
					</button>
				</div>
			</div>
       
					<div class="box-body border-radius-none padding-20">
								<b>Pelayanan Kesehatan Lingkungan</b>
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
											<div class="col-xs-12 no-padding overflow-hidden">
												<span class="progress-text">Krukut</span>
												<div class="pull-right detail-implicit">
													<small class="label pull-right" style="background-color: #FF7290">0</small>
													<small class="label pull-right" style="background-color: #5DC6C6">0</small>
												</div>
											</div>
											<div class="col-xs-12 no-padding overflow-hidden">
												<span class="progress-text">Limo</span>
												<div class="pull-right detail-implicit">
													<small class="label pull-right" style="background-color: #FF7290">0</small>
													<small class="label pull-right" style="background-color: #5DC6C6">0</small>
												</div>
											</div>
										</div>
									</div>
					</div><!--box body-->
		</div>
	</div>
</section>
@endsection