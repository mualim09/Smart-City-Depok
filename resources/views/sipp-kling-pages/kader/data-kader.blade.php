@extends('sipp-kling-layouts.app')

@section('content')

@foreach($data as $key)
<div class="modal fade" id="detail-action">
	<div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header bg-aqua-active">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        	<p class="text-center">
					<i class="fa fa-info-circle fa-2x"></i><br>
					<strong>Detail Kader</strong>
			</p>
      </div>
      <div class="modal-body overflow-hidden">
      	<strong>Nama Kader :</strong><br>
      	<div class="line-height-modal" style="margin: 5px 0px 10px;"></div>
      	<h2 style="margin-top: 0px;color: #2e9d87;">- {{ $key->nama }} -</h2>
      	<hr>
      	<div class="more-occurs">
        	<span class="left">Email </span><strong class="right">{{$key->email}}</strong><br>
        	<span class="left">Kelurahan </span><strong class="right">{{$key->kelurahan}}</strong><br>
        	<span class="left">Kecamatan </span><strong class="right">{{$key->kecamatan}}</strong><br>
        	<span class="left">Password </span><strong class="right">{{$key->password}}</strong><br>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">Tutup</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
@endforeach



@foreach($data as $key)
<div class="modal fade" id="delete-action-{!! substr($key->id_petugas, 0, 15) !!}">
	<div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header" style="background-color: #f56954">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Hapus</h4>
      </div>
      <div class="modal-body overflow-hidden">
      	Apakah anda yakin ingin menghapus data ini?
      </div>
      <div class="modal-footer">
      	<form action="/sipp-kling/admin/{{ $key->id_petugas }}" method="post">
	        <input type="submit" class="btn btn-danger" name="submit" value="YA">
	        {{ csrf_field() }}
	        <input type="hidden" name="_method" value="DELETE">

        <button type="button" class="btn pull-left" data-dismiss="modal">Tidak</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
@endforeach

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
				<h3 class="box-title"><b>Data Kader</b></h3>
				<div class="line-height-box-body green-main-color"></div>
			</div>
			<div class="box-body">
			<div class="table-responsive">
						<table class="table table-bordered table-hover example2">
							<thead>
								<tr>
									<th>Nomor</th>
									<th>Nama</th>
									<th>Email</th>
									<th>Password</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $key)
								<tr>
									<td>{{ ++$loop->index }}</td>
									<td>{{ $key->nama }}</td>
									<td>{{ $key->email }}</td>
									<td>{{ $key->password }}</td>
									<td>
										<button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#detail-action"><i class="ion-eye"></i></button>

										<button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#delete-action-{!! substr($key->id_petugas, 0, 15) !!}"><i class="ion-ios-trash"></i></button>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
		</div>
	</div>
</section>
@endsection