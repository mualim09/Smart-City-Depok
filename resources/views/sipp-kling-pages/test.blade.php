@extends('sipp-kling-layouts.app')

@section('content')
<section class="content-header overflow-hidden">
  <div class="col-xs-12 title-dashboard">
    <h2>{!! str_replace('-', ' ', ucfirst(Request::route()->getName())) !!}</h2>
    <div class="line-height"></div>
  </div>
  <div class="filter-group overflow-hidden col-xs-12">
    <div class="row">
      <div class="form-group col-xs-12">
        <select class="form-control" id="change-dashboard">
          <option value="{{ url('sipp-kling') }}" >Dashboard Utama</option>
          <option value="{{ url('sipp-kling/dashboard-tabel') }}" selected="selected">Dashboard Tabel</option>
          <option value="{{ url('sipp-kling/dashboard-grafik') }}">Dashboard Grafik</option>
          <option value="{{ url('sipp-kling/data-tempat') }}">Dashboard Map</option>
          <option value="{{ url('sipp-kling/dashboard-detail') }}">Dashboard Detail</option>
        </select>
      </div>
      <div class="col-xs-12 no-padding">
        <form class="form" role="search" method="post" action="{{ url('sipp-kling/dashboard-tabel/filter') }}">
          {{ csrf_field() }}
          <input type="hidden" name="kelurahan" value="0" id="remove-this-stuff">
          <div class="col-xs-12 col-lg-4">
              <select class="form-control kecamatan" name="kecamatan" id="filter-kecamatan">
                <option value="0">- semua kecamatan -</option>
                
                @foreach($kecamatans as $data)
                
                  <option value="{{ $data->kecamatan }}"> {{ $data->kecamatan }}</option>
                
                @endforeach
                
              </select>
          </div>
          <div class="col-xs-12 col-lg-4">
              <select class="form-control kelurahan" name="kelurahan" id="filter-kelurahan" disabled>
                <option value="0">- semua kelurahan -</option>
              </select>
          </div>
          <div class="rw col-xs-12 col-lg-4">
              <button type="submit" class="btn btn-flat col-xs-12 green-main-color font-white"> <i class="fa fa-filter"></i>  <strong>Filter</strong> </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>




{{-- ================================================================================================================== --}}
<section class="content overflow-hidden">
	<div class="col-xs-12">
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#rs" data-toggle="tab">Rumah Sehat</a></li>
				<li><a href="#sab" data-toggle="tab">Sarana Air Bersih</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						TPM <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#tpm1">Pemeriksaan Jasa Boga</a></li>
						<li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#tpm2">Tempat Makan dan Restaurant</a></li>
						<li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#tpm3">DAM</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						TTU <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#ttu1">Tempat Ibadah</a></li>
						<li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#ttupasar">Pasar</a></li>
						<li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#ttusekolah">Sekolah</a></li>
						<li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#ttupuskesmas">Puskesmas</a></li>
						<li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#ttupesantren">Pesantren</a></li>
						<li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#ttuhotel">Hotel</a></li>
						<li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#ttuhm">Hotel Melati</a></li>
					</ul>
				</li>
				<li><a href="#pkl" data-toggle="tab">PKL</a></li>
			</ul>
{{-- ===================================================================================================================== --}}
{{-- RUMAH SEHAT --}}

{{-- ===================================================================================================================== --}}


{{-- ====================================================================================================================== --}}
<div class="modal fade" id="modal-tambah-rs">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{ url('sipp-kling/input_rh') }}">
      		{{ csrf_field() }}
      <div class="modal-header bg-aqua-active">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Tambah</h4>
      </div>
      <div class="modal-body overflow-hidden">
      		<div class="form-group">
      			<label for="pemilik">Nama KK</label>
      			<input type="text" id="pemilik" name="nama_kk" class="form-control" placeholder="NASITI" required>
      		</div>	
      		<div class="form-group">
      			<label for="alamat">Alamat</label>
      			<textarea class="form-control" name="alamat" placeholder="Ex. Jalan Raya" style="resize: none;height: 200px;"></textarea>
      		</div>
      		<div class="form-group">
      			<label for="pemilik">No Rumah</label>
      			<input type="text" id="pemilik" name="no_rumah" class="form-control" placeholder="08" required>
      		</div>
      		<div class="form-group">
      			<label for="rt">RT</label>
      			<input type="text" id="rt" name="rt" class="form-control" placeholder="Ex. RT 001" required>
      		</div>
      		<div class="form-group">
      			<label for="rw">RW</label>
      			<input type="text" id="rw" name="rw" placeholder="Ex. RW 001" class="form-control" required>
      		</div>      		
      </div>
      <div class="modal-footer">
      	<button type="submit" class="btn btn-primary pull-right">Tambah</button>
        <button type="button" class="btn pull-left" data-dismiss="modal">Tutup</button>
      </div>
     </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
{{-- ====================================================================================================================== --}}


			<div class="tab-content">
				<div class="tab-pane active" id="rs">
				<div class="table-responsive"></div>
				<!-- /.box-body -->
					<div style="width: 100%;" class="overflow-hidden">
						<h4 class="box-title col-xs-6">Data Rumah Sehat</h4>
						<button class="btn btn-flat green-main-color font-white col-xs-6" data-toggle="modal" data-target="#modal-tambah-rs"><i class="fa fa-plus" style="font-size: 12px"></i> Tambah</button>
					</div>
					<div class="line-height-box-body"></div>
					<div class="table-responsive">
						<table class="table table-bordered table-hover example2" style="overflow-x:auto;width: 100%">
							<thead>
								<tr>
									<th>Nama KK</th>
                  					<th style="display:none;">Kelurahan</th>
                  					<th style="display:none;">Alamat</th>
									<th>RT / RW</th>
									<th>No Rumah</th>
									<th>Sampah</th>
									<th>SPAL</th>
									<th>Jamban</th>
									<th>PJB</th>
									<th style="display:none;">Status Rumah</th>
									<th>Status</th>
									<th>Total Nilai</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>	
								<tr>
									<!-- <td>asd</td> -->
									<td>asd</td>
                  					<td style="display:none;">asd</td>            
                  					<td style="display:none;">asd</td>            
									<td>asd</td>
									<td>asd</td>
									<td>asd</td>
									<td>asd</td>
									<td>asd</td>
									<td>asd</td>
									<td style="display:none;">asd</td>
									<td>asd</td>
									<td>asd</td>
									<td style="white-space: nowrap;" align="center">
										<button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-rumah-sehat-asd"><i class="ion-eye"></i></button>

										<button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus-rumah-sehat-asd"><i class="ion-ios-trash"></i></button>

									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!-- /.box-body -->
				</div>

				<!-- /.box -->
			</div>
		</div>
	</section>
	@endsection