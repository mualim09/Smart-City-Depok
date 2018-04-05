@extends('sipp-kling-layouts.app')

@section('content')
<section class="content-header overflow-hidden">
	<div class="col-xs-12 title-dashboard">
		<h2>Managemen Kader</h2>
		<div class="line-height"></div>
	</div>
</section>
<section class="content overflow-hidden">
	<div class="col-xs-12">
		<div class="box box-widget">
			<div class="box-header with-border" style="padding: 15px">
				<h3 class="box-title"><b>Tambah Kader</b></h3>
				<div class="line-height-box-body green-main-color"></div>
			</div>
				<form method="POST" action="{{ url('sipp-kling/kader/') }}" accept-charset="UTF-8">
					{{ csrf_field() }}
                    <div class="box-body">
		                <div class="form-group overflow-hidden">
		                  <label for="kecamatan" class="col-sm-2 control-label">Kecamatan</label>

		                  <div class="col-sm-10">
		                    <select class="form-control" name="kecamatan" id="filter-kecamatan" required>
			                    <option value="0">- pilih kecamatan -</option>
			                    @foreach($kecamatans as $data)
			                    <option value="{{ $data->kecamatan }}">{{ $data->kecamatan }}</option>
			                    @endforeach
			                  </select>
		                  </div>

		                </div>
		                <div class="form-group overflow-hidden">
		                  <label for="kelurahan" class="col-sm-2 control-label">Kelurahan</label>

		                  <div class="col-sm-10">
		                    <select class="form-control" name="kelurahan" id="filter-kelurahan" required disabled>
		                    	<option value="0">- pilih kelurahan -</option>
			                </select>

		                  </div>
		                </div>

		                <div class="form-group overflow-hidden">
		                  <label for="namaPetugas" class="col-sm-2 control-label">Nama Petugas</label>

		                  <div class="col-sm-10">
		                    <input type="text" name="nama_petugas" class="form-control" id="namaPetugas" placeholder="Enter Name">
		                  </div>
		                </div>

		                <div class="form-group overflow-hidden">
		                  <label for="passwordPetugas" class="col-sm-2 control-label">Password</label>

		                  <div class="col-sm-10">
		                    <input type="password" name="password" class="form-control" id="passwordPetugas" placeholder="Enter Password">
		                  </div>
		                </div>

		              </div>
		              <div class="box-footer padding-box-footer">
		                <button type="submit" class="btn btn-flat pull-right green-main-color" style="color: #fff;">Submit</button>
		              </div>
		              <!-- /.box-body -->
              	</form>
		</div>
	</div>
</section>
@endsection