<section class="content-header overflow-hidden">
	<div class="col-xs-12 title-dashboard">
		<h2>{!! str_replace('-', ' ', ucfirst(Request::route()->getName())) !!}</h2>
		<div class="line-height"></div>
	</div>
	<div class="filter-group overflow-hidden col-xs-12">
		<div class="row">
			<div class="form-group col-xs-12">
				<select class="form-control" id="change-dashboard">
					<option value="{{ url('sipp-kling') }}" {{ (\Request::route()->getName() == 'dashboard') ? 'selected' : ''}} >Dashboard Utama</option>
					<option value="{{ url('sipp-kling/dashboard-tabel') }}" {{ (\Request::route()->getName() == 'dashboard-tabel') ? 'selected' : ''}}>Dashboard Tabel</option>
					<option value="{{ url('sipp-kling/dashboard-grafik-waktu') }}" {{ (\Request::route()->getName() == 'dashboard-grafik-waktu') ? 'selected' : ''}} >Dashboard Grafik Waktu</option>
					<option value="{{ url('sipp-kling/dashboard-map') }}" {{ (\Request::route()->getName() == 'dashboard-map') ? 'selected' : ''}} >Dashboard Map</option>
				</select>
			</div>
			<div class="col-xs-12 no-padding">
				<form class="form" role="form" method="get" action="{{ Request::route()->getName() }}">
					<div class="col-xs-12 col-lg-4">
							<select class="form-control kecamatan" id="filter-kecamatan">
								<option value="0">- semua kecamatan -</option>
								
								@foreach($kecamatans as $data)
								
								<option value="{{ $data->kecamatan }}">{{ $data->kecamatan }}</option>
								
								@endforeach
								
							</select>
					</div>
					<div class="col-xs-12 col-lg-4">
							<select class="form-control kelurahan" id="filter-kelurahan" disabled>
								<option value="0">- semua kelurahan -</option>
							</select>
					</div>
					<div class="rw col-xs-12 col-lg-4">
							<button class="btn btn-flat col-xs-12 green-main-color font-white"> <i class="fa fa-filter"></i>  <strong>Filter</strong> </button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>