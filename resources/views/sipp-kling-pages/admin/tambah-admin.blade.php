@extends('sipp-kling-layouts.app')

@section('content')
<section class="content-header overflow-hidden">
	<div class="col-xs-12 title-dashboard">
		<h2>Managemen Admin</h2>
		<div class="line-height"></div>
	</div>
</section>
<section class="content overflow-hidden">
	<div class="col-xs-12">
		<div class="box box-widget">
			<div class="box-header with-border" style="padding: 15px">
				<h3 class="box-title"><b>Tambah Admin</b></h3>
				<div class="line-height-box-body green-main-color"></div>
			</div>
				<form method="POST" action="{{ url('sipp-kling/admin') }}" accept-charset="UTF-8">
					{{ csrf_field() }}
                    <div class="box-body">
                    	<div class="form-group overflow-hidden">
		                  <label for="nama" class="col-sm-2 control-label">Nama</label>

		                  <div class="col-sm-10">
		                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" required>
		                  </div>
		                </div>
		                <div class="form-group overflow-hidden">
		                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

		                  <div class="col-sm-10">
		                    <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" required>
		                  </div>
		                </div>
		                <div class="form-group overflow-hidden">
		                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

		                  <div class="col-sm-10">
		                    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required>
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