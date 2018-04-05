@extends('sipp-kling-layouts.app')

@section('content')
<section class="content-header overflow-hidden">
	<div class="col-xs-12 title-dashboard">
		<h2>Managemen Jadwal</h2>
		<div class="line-height"></div>
	</div>
</section>
<section class="content overflow-hidden">
	<div class="col-xs-12">
		<div class="box box-widget">
			<div class="box-header with-border" style="padding: 15px">
				<h3 class="box-title"><b>Tambah Jadwal</b></h3>
				<div class="line-height-box-body green-main-color"></div>
			</div>
				<form method="POST" action="#" accept-charset="UTF-8">
					<input name="_token" type="hidden" value="1GY1hVC6F81WdWyn5bWEmX5SStzhSLBX4YVg20pm">
                    <div class="box-body">
		                <div class="form-group overflow-hidden">
		                  <label for="periode" class="col-sm-2 control-label">Periode</label>

		                  <div class="col-sm-10">
		                    <select class="form-control" id="periode" required>
			                    <option value="0">- pilih periode -</option>
			                    <option value="1">Periode 1</option>
			                    <option value="2">Periode 2</option>
			                  </select>
		                  </div>
		                </div>

		                <div class="form-group overflow-hidden">
			                <label for="start-date" class="col-sm-2 control-label">Tanggal Mulai</label>
			                <div class="col-sm-10">
				                <div class="input-group date">
				                  <div class="input-group-addon">
				                    <i class="fa fa-calendar"></i>
				                  </div>
				                  <input type="text" class="form-control datepicker" required>
				                </div>
			           		</div>
			                <!-- /.input group -->
			              </div>
			              <!-- /.form group -->

			              <div class="form-group overflow-hidden">
			                <label for="finish-date" class="col-sm-2 control-label">Tanggal Selesai</label>
			                <div class="col-sm-10">
				                <div class="input-group date">
				                  <div class="input-group-addon">
				                    <i class="fa fa-calendar"></i>
				                  </div>
				                  <input type="text" class="form-control datepicker" required>
				                </div>
			           		</div>
			                <!-- /.input group -->
			              </div>
			              <!-- /.form group -->

			              <div class="form-group overflow-hidden">
			                  <label for="kecamatan" class="col-sm-2 control-label">Pilih kecamatan</label>

			                  <div class="col-sm-10">
			                    <select class="form-control kecamatan" id="filter-kecamatan" required>
									<option value="0">- semua kecamatan -</option>
									
									@foreach($kecamatans as $data)
									
									<option value="{{ $data->kecamatan }}">{{ $data->kecamatan }}</option>
									
									@endforeach
								
								</select>
			                  </div>
			                </div>

			                <div class="form-group overflow-hidden">
			                  <label for="kecamatan" class="col-sm-2 control-label">Pilih kelurahan</label>

			                  <div class="col-sm-10">
			                    <select class="form-control kelurahan" id="filter-kelurahan" disabled>
									<option value="0">- semua kelurahan -</option>
								</select>
			                  </div>
			                </div>

		                <div class="form-group overflow-hidden">
		                  <label for="isi" class="col-sm-2 control-label">Isi</label>

		                  <div class="col-sm-10">
		                    <textarea class="form-control" style="resize: none;height: 200px"></textarea>
		                  </div>
		                </div>

		              </div>
		              <div class="box-footer padding-box-footer">
		                <button type="submit" class="btn btn-flat pull-right green-main-color" style="color: #fff;">Submit</button>
		              </div>
              	</form>
		</div>
	</div>
</section>
@endsection