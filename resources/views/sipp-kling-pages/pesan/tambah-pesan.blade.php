@extends('sipp-kling-layouts.app')

@section('content')
<section class="content-header overflow-hidden">
	<div class="col-xs-12 title-dashboard">
		<h2>Managemen Pesan</h2>
		<div class="line-height"></div>
	</div>
</section>
<section class="content overflow-hidden">
	<div class="col-xs-12">
		<div class="box box-widget">
			<div class="box-header with-border" style="padding: 15px">
				<h3 class="box-title"><b>Tambah Pesan</b></h3>
				<div class="line-height-box-body green-main-color"></div>
			</div>
				<form method="POST" action="#" accept-charset="UTF-8">
					<input name="_token" type="hidden" value="1GY1hVC6F81WdWyn5bWEmX5SStzhSLBX4YVg20pm">
                    <div class="box-body">
		            <div class="form-group overflow-hidden">
	                  <label for="perihal" class="col-sm-2 control-label">Perihal</label>

	                  <div class="col-sm-10">
	                    <select class="form-control" id="perihal" required>
		                    <option value="0">- pilih perihal -</option>
		                    <option value="umum">Umum</option>
		                    <option value="privasi">Privasi</option>
		                  </select>
	                  </div>
	                </div>

	                <div class="form-group overflow-hidden">
	                  <label for="nama_kader" class="col-sm-2 control-label">Nama kader</label>

	                  <div class="col-sm-10">
	                    <input type="text" name="nama_kader" class="form-control" id="nama_kader" required>
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