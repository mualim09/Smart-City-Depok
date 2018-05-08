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
          <option value="{{ url('sipp-kling/dashboard-grafik-waktu') }}">Dashboard Grafik Waktu</option>
          <option value="{{ url('sipp-kling/data-tempat') }}">Dashboard Map</option>
          <option value="{{ url('sipp-kling/dashboard-detail') }}">Dashboard Detail</option>
        </select>
      </div>
      <div class="col-xs-12 no-padding">
        <form class="form" role="search" method="post" action="{{ url('sipp-kling/dashboard-tabel/filter') }}">
          {{ csrf_field() }}
          <input type="hidden" name="disable-kelurahan" value="0" id="remove-this-stuff">
          <div class="col-xs-12 col-lg-4">
              <select class="form-control kecamatan" name="kecamatan" id="filter-kecamatan">
                <option value="0">- semua kecamatan -</option>
                
                @foreach($kecamatans as $data)
                
                  <option value="{{ $data->kecamatan }}" {{ (str_replace(' ', '', $data->kecamatan) == $param_kecamatan) ? 'selected' : '' }}> {{ $data->kecamatan }}</option>
                
                @endforeach
                
              </select>
          </div>
          <div class="col-xs-12 col-lg-4">
              <select class="form-control kelurahan" name="kelurahan" id="filter-kelurahan">
                <option value="0">- semua kelurahan -</option>


                @foreach($data_kelurahan as $data)

                  <option data-filter="delete-generate" value="{{ $data->kelurahan }}" {{ (str_replace(' ', '', $data->kelurahan) == $param_kelurahan) ? 'selected' : '' }}> {{ $data->kelurahan }}</option>
                
                @endforeach

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
{{-- =============================================================================================================== --}}

{{-- RUMAH SEHAT --}}
@foreach($rehats as $rehat)
<div class="modal fade" id="modal-rumah-sehat-{{$rehat->id_rumah_sehat}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header green-background-main-color">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Detail Rumah Sehat</h4>
      </div>
      <div class="modal-body overflow-hidden">
      	<div class="col-xs-12 col-lg-5 no-padding">
	        <div class="images-modal">
	        	<img src="https://i2.wp.com/tutorialaplikasi.com/wp-content/uploads/2016/06/Meme-keren.jpg" alt="images" />
	        </div>
	        <div class="margin-10"></div>
	        <div class="more-occurs">
	        	<span class="left">Petugas </span><strong class="right">{{$rehat->nama}}</strong><br>
	        	<span class="left">Status </span><strong class="right">{{$rehat->status}}</i></strong><br>
	        	<span class="left">Skor Akhir </span><strong class="right">{{$rehat->total_nilai}}</strong><br>
		        <span class="left">Update terakhir </span><strong class="right">{{$rehat->waktu}}</strong><br> 	
	        </div>
    	</div>
    	<div class="col-xs-12 col-lg-7">
	        <div class="deskripsi-modal">
	        	<div class="bg-aqua-active box-keterangan padding-10">
		        <p class="text-center">
					<i class="fa fa-info-circle fa-2x"></i><br>
					<strong>Keterangan</strong>
				</p>
			</div>
	        	<div class="more-occurs">
		        	<span class="left">Nama KK </span><strong class="right">{{$rehat->nama_kk}}</strong><br>
		        	<span class="left">Anggota Keluarga </span><strong class="right">{{$rehat->jumlah_anggota}}</strong><br>
		        	<span class="left">Status Rumah </span><strong class="right">{{$rehat->status_rumah}}</strong><br>
		        	<span class="left">No Telp </span><strong class="right">{{$rehat->no_telp}}</strong><br>
		        	<span class="left">Jamban </span><strong class="right">{{$rehat->jamban}}</strong><br>
		        	<span class="left">Sampah </span><strong class="right">{{$rehat->sampah}}</strong><br>
		        	<span class="left">SPAL </span><strong class="right">{{$rehat->spal}}</strong><br>
		        	<span class="left">PJB </span><strong class="right">{{$rehat->pjb}}</strong><br>
		        	<span class="left">Gambaran Umum </span><strong class="right">{{$rehat->gambaran_umum}}</strong><br>		       	
	        	</div>
	        	<div class="margin-10"></div>
	        	<div class="more-occurs">
		        	<span class="left">Alamat </span><strong class="right">{{$rehat->alamat}}</strong><br>	        		
		        	<span class="left">No Rumah </span><strong class="right">{{$rehat->no_rumah}}</strong><br>	        		
	        		<span class="left">RT / RW </span><strong class="right">{{$rehat->rt}} / {{$rehat->rw}}</strong><br>
		        	<span class="left">Kordinat </span><strong class="right">{{$rehat->koordinat}}</strong><br>	
	        	</div>
	        </div>
    	</div>
      </div>
      <div class="modal-footer green-background-main-color">
        <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
{{-- ===================================================================================================================== --}}
@foreach($rehats as $rehat)
<div class="modal fade" id="modal-hapus-rumah-sehat-{{$rehat->id_rumah_sehat}}">
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
      	<form action="/sipp-kling/hapus-rehat/{{ $rehat->id_rumah_sehat }}" method="post">
	        <input type="submit" class="btn btn-danger" name="submit" value="YA">
	        {{ csrf_field() }}
	        <input type="hidden" name="_method" value="DELETE">

        <button type="button" class="btn pull-left" data-dismiss="modal">Tidak</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach

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
								@foreach($rehats as $rehat)	
								<tr>
									<!-- <td>{{$rehat->id_rumah_sehat}}</td> -->
									<td>{{$rehat->nama_kk}}</td>
                  					<td style="display:none;">{{$rehat->kelurahan}}</td>            
                  					<td style="display:none;">{{$rehat->alamat}}</td>            
									<td>{{$rehat->rt}} / {{$rehat->rw}}</td>
									<td>{{$rehat->no_rumah}}</td>
									<td>{{$rehat->sampah}}</td>
									<td>{{$rehat->spal}}</td>
									<td>{{$rehat->jamban}}</td>
									<td>{{$rehat->pjb}}</td>
									<td style="display:none;">{{$rehat->status_rumah}}</td>
									<td>{{$rehat->status}}</td>
									<td>{{$rehat->total_nilai}}</td>
									<td style="white-space: nowrap;" align="center">
										<button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-rumah-sehat-{{$rehat->id_rumah_sehat}}"><i class="ion-eye"></i></button>

										<button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus-rumah-sehat-{{$rehat->id_rumah_sehat}}"><i class="ion-ios-trash"></i></button>

									</td>
								</tr>
								@endforeach	
							</tbody>
						</table>
					</div>
					<!-- /.box-body -->
				</div>
{{-- ===================================================================================================================== --}}
{{-- SAB  --}}
@foreach($sabs as $sab)
<div class="modal fade" id="modal-sab-{{$sab->id_rumah_sehat}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header green-background-main-color">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Detail Jasa Boga</h4>
      </div>
      <div class="modal-body overflow-hidden">
      	<div class="col-xs-12 col-lg-5 no-padding">
	        <div class="images-modal">
	        	<img src="https://i2.wp.com/tutorialaplikasi.com/wp-content/uploads/2016/06/Meme-keren.jpg" alt="images" />
	        </div>
	        <div class="margin-10"></div>
	        <div class="more-occurs">
	        	<span class="left">Petugas </span><strong class="right">{{$sab->nama}}</strong><br>
	        	<span class="left">Status </span><strong class="right">{{$sab->status}}</i></strong><br>
	        	<span class="left">Skor Akhir </span><strong class="right">{{$sab->total_nilai}}</strong><br>
		        <span class="left">Update terakhir </span><strong class="right">{{$sab->waktu}}</strong><br> 	
	        </div>
    	</div>
    	<div class="col-xs-12 col-lg-7">
	        <div class="deskripsi-modal">
	        	<div class="bg-aqua-active box-keterangan padding-10">
		        <p class="text-center">
					<i class="fa fa-info-circle fa-2x"></i><br>
					<strong>Keterangan</strong>
				</p>
			</div>
	        	<div class="more-occurs">
		        	<span class="left">Nama Pemilik </span><strong class="right">{{$sab->pemilik_sarana}}</strong><br>
		        	<span class="left">Golongan </span><strong class="right">{{$sab->golongan}}</strong><br>
		        	<span class="left">Sudah diambil</span><strong class="right">{{$sab->sudah_diambil}}</strong><br>
		        	<span class="left">Kode Sampel</span><strong class="right">{{$sab->kode_sampel}}</strong><br>
		        	<span class="left">Kode Sarana </span><strong class="right">{{$sab->kode_sarana}}</strong><br>
	        	</div>
	        	<div class="margin-10"></div>
	        	<div class="more-occurs">
		        	<span class="left">Alamat</span><strong class="right">{{$sab->alamat}}</strong><br>	        		
		        	<span class="left">Koordinat</span><strong class="right">{{$sab->koordinat}}</strong><br>	        		
	        	</div>
	        </div>
    	</div>
      </div>
      <div class="modal-footer green-background-main-color">
        <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
{{-- ===================================================================================================================== --}}
@foreach($sabs as $sab)
<div class="modal fade" id="modal-hapus-sab-{{$sab->id_rumah_sehat}}">
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
      	<form action="/sipp-kling/hapus-sab/{{$sab->id_rumah_sehat}}" method="post">
	        <input type="submit" class="btn btn-danger" name="submit" value="YA">
	        {{ csrf_field() }}
	        <input type="hidden" name="_method" value="DELETE">

        <button type="button" class="btn pull-left" data-dismiss="modal">Tidak</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
{{-- ===================================================================================================================== --}}

				<div class="tab-pane" id="sab">
					<div style="width: 100%;" class="overflow-hidden">
						<h4 class="box-title col-xs-6">Data Sarana Air Bersih (SAB)</h4>
					</div>
					<div class="line-height-box-body"></div>
					<div class="table-responsive">
						<table class="table table-bordered table-hover example2" style="overflow-x:auto;width: 100%">
							<thead>
								<tr>
									<th>Pemilik</th>
									<th>Kategori</th>
									<th>Status</th>
									<th>Alamat</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($sabs as $sab)	
								<tr>
									<td>{{$sab->pemilik_sarana}}</td>
									<td>{{$sab->kategori}}</td>
									<td>{{$sab->status}}</td>
									<td>{{$sab->alamat}}</td>
									<td style="white-space: nowrap;" align="center">
										<button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-sab-{{$sab->id_rumah_sehat}}"><i class="ion-eye"></i></button>

										<button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus-sab-{{$sab->id_rumah_sehat}}"><i class="ion-ios-trash"></i></button>

									</td>
								</tr>
								@endforeach	
							</tbody>
						</table>
					</div>
					<!-- /.box-body -->
				</div>
{{-- ===================================================================================================================== --}}
{{-- ==================================================================================================================== --}}
{{-- == JASA Boga == --}}
{{-- =============== --}}
@foreach($jabos as $jabo)
<div class="modal fade" id="modal-jasaboga-{{$jabo->id_jasaboga}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header green-background-main-color">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Detail Jasa Boga</h4>
      </div>
      <div class="modal-body overflow-hidden">
      	<div class="col-xs-12 col-lg-5 no-padding">
	        <div class="images-modal">
	        	<img src="https://i2.wp.com/tutorialaplikasi.com/wp-content/uploads/2016/06/Meme-keren.jpg" alt="images" />
	        </div>
	        <div class="margin-10"></div>
	        <div class="more-occurs">
	        	<span class="left">Petugas </span><strong class="right">{{$jabo->nama}}</strong><br>
	        	<span class="left">Status </span><strong class="right">{{$jabo->status}}</i></strong><br>
	        	<span class="left">Skor Akhir </span><strong class="right">{{$jabo->total_nilai}}</strong><br>
		        <span class="left">Update terakhir </span><strong class="right">{{$jabo->waktu}}</strong><br> 	
	        </div>
    	</div>
    	<div class="col-xs-12 col-lg-7">
	        <div class="deskripsi-modal">
	        	<div class="bg-aqua-active box-keterangan padding-10">
		        <p class="text-center">
					<i class="fa fa-info-circle fa-2x"></i><br>
					<strong>Keterangan</strong>
				</p>
			</div>
	        	<div class="more-occurs">
		        	<span class="left">Nama Pengusaha </span><strong class="right">{{$jabo->nama_pengusaha}}</strong><br>
		        	<span class="left">Nama Tempat </span><strong class="right">{{$jabo->nama_tempat}}</strong><br>
		        	<span class="left">No Telp </span><strong class="right">{{$jabo->no_telp}}</strong><br>
		        	<span class="left">Jam Operasional </span><strong class="right">{{$jabo->jam_operasional}}</strong><br>
		        	<span class="left">Gambaran Umum </span><strong class="right">{{$jabo->gambaran_umum}}</strong><br>		       	
		        	<span class="left">Website </span><strong class="right">{{$jabo->website}}</strong><br>
		        	<span class="left">Sumber </span><strong class="right">{{$jabo->sumber}}</strong><br>
	        	</div>
	        	<div class="margin-10"></div>
	        	<div class="more-occurs">
		        	<span class="left">Alamat </span><strong class="right">{{$jabo->alamat}}</strong><br>	        		
		        	<span class="left">Alamat </span><strong class="right">{{$jabo->koordinat}}</strong><br>	        		
	        	</div>
	        </div>
    	</div>
      </div>
      <div class="modal-footer green-background-main-color">
        <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
{{-- ===================================================================================================================== --}}
@foreach($jabos as $jabo)
<div class="modal fade" id="modal-hapus-jasaboga-{{$jabo->id_jasaboga}}">
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
      	<form action="/sipp-kling/hapus-jasaboga/{{ $jabo->id_jasaboga }}" method="post">
	        <input type="submit" class="btn btn-danger" name="submit" value="YA">
	        {{ csrf_field() }}
	        <input type="hidden" name="_method" value="DELETE">

        <button type="button" class="btn pull-left" data-dismiss="modal">Tidak</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
{{-- ====================================================================================================================== --}}
<div class="modal fade" id="modal-tambah-jasaboga">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{ url('sipp-kling/input_jb') }}">
      		{{ csrf_field() }}
      <div class="modal-header bg-aqua-active">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Tambah</h4>
      </div>
      <div class="modal-body overflow-hidden">
      		<div class="form-group">
      			<label for="pemilik">Nama Tempat</label>
      			<input type="text" id="pemilik" name="nama_tempat" class="form-control" placeholder="NASITI CAKE" required>
      		</div>	
      		<div class="form-group">
      			<label for="alamat">Alamat</label>
      			<textarea class="form-control" name="alamat" placeholder="Ex. Jalan Raya" style="resize: none;height: 200px;"></textarea>
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
				<div class="tab-pane" id="tpm1">
					<div class="table-responsive"></div>
					<div style="width: 100%;" class="overflow-hidden">
						<h4 class="box-title col-xs-6">DATA TPM - Pemeriksaan Jasa Boga</h4>
						<button class="btn btn-flat green-main-color font-white col-xs-6" data-toggle="modal" data-target="#modal-tambah-jasaboga"><i class="fa fa-plus" style="font-size: 12px"></i> Tambah</button>
					</div>
					<div class="line-height-box-body"></div>
					<div class="table-responsive">
						<table class="table table-bordered table-hover example2" style="overflow-x:auto;width: 100%">
							<thead>
								<tr>
									<th>Nama Pengusaha</th>
				  					<th style="display:none;">Kelurahan</th>                    
				  					<th>Alamat</th>                    
									{{-- <th>RT / RW</th> --}}
									<th>Nama Tempat</th>						
									<th>No Telpon</th>
									<th>Status</th>
									<th style="display:none;">Sumber</th>
									<th>Total Nilai</th>
				  					<th style="display:none;">Jam Operasional</th>                    
				  					<th style="display:none;">Gambaran Umum</th>                    
				  					<th style="display:none;">Foto</th>                    
				  					<th style="display:none;">Website</th>                    
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($jabos as $jabo)
								<tr>
									<td>{{$jabo->nama_pengusaha}}</td>
				  					<td style="display:none;">{{$jabo->kelurahan}}</td>            
				  					<td>{{$jabo->alamat}}</td>            
									{{-- <td>{{$jabo->rt}} / {{$rehat->rw}}</td> --}}
									<td>{{$jabo->nama_tempat}}</td>
									<td>{{$jabo->no_telp}}</td>
									<td>{{$jabo->status}}</td>
									<td style="display:none;">{{$jabo->sumber}}</td>
									<td>{{$jabo->total_nilai}}</td>
									<th style="display:none;">{{$jabo->jam_operasional}}</th>                    
				  					<th style="display:none;">{{$jabo->gambaran_umum}}</th>                    
				  					<th style="display:none;">{{$jabo->foto}}</th>                    
				  					<th style="display:none;">{{$jabo->website}}</th> 
									<td style="white-space: nowrap;" align="center">
										<button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-jasaboga-{{$jabo->id_jasaboga}}"><i class="ion-eye"></i></button>

										<button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus-jasaboga-{{$jabo->id_jasaboga}}"><i class="ion-ios-trash"></i></button>

									</td>
								</tr>
							@endforeach
						</tbody>
						</table>
					</div>
					<!-- /.box-body -->
				</div>


{{-- ============================================================================================================================================ --}}

{{-- ============================================================================================================================================ --}}
{{-- KULINER --}}

@foreach($kuliners as $kuliner)
<div class="modal fade" id="modal-kuliner-{{$kuliner->id_kuliner}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header green-background-main-color">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Detail Data Restoran</h4>
      </div>
      <div class="modal-body overflow-hidden">
      	<div class="col-xs-12 col-lg-5 no-padding">
	        <div class="images-modal">
	        	<img src="https://i2.wp.com/tutorialaplikasi.com/wp-content/uploads/2016/06/Meme-keren.jpg" alt="images" />
	        </div>
	        <div class="margin-10"></div>
	        <div class="more-occurs">
	        	<span class="left">Petugas </span><strong class="right">{{$kuliner->nama}}</strong><br>
	        	<span class="left">Status </span><strong class="right">{{$kuliner->status}}</i></strong><br>
	        	<span class="left">Skor Akhir </span><strong class="right">{{$kuliner->total_nilai}}</strong><br>
		        <span class="left">Update terakhir </span><strong class="right">{{$kuliner->waktu}}</strong><br> 	
	        </div>
    	</div>
    	<div class="col-xs-12 col-lg-7">
	        <div class="deskripsi-modal">
	        	<div class="bg-aqua-active box-keterangan padding-10">
		        <p class="text-center">
					<i class="fa fa-info-circle fa-2x"></i><br>
					<strong>Keterangan</strong>
				</p>
			</div>
	        	<div class="more-occurs">
		        	<span class="left">Nama Pengusaha </span><strong class="right">{{$kuliner->nama_pemilik}}</strong><br>
		        	<span class="left">Nama Tempat </span><strong class="right">{{$kuliner->nama_tempat}}</strong><br>
		        	<span class="left">No Telp </span><strong class="right">{{$kuliner->no_telp}}</strong><br>
		        	<span class="left">Jam Operasional </span><strong class="right">{{$kuliner->jam_operasional}}</strong><br>
		        	<span class="left">Gambaran Umum </span><strong class="right">{{$kuliner->gambaran_umum}}</strong><br>		       	
		        	<span class="left">Website </span><strong class="right">{{$kuliner->website}}</strong><br>
		        	<span class="left">Sumber </span><strong class="right">{{$kuliner->sumber}}</strong><br>
	        	</div>
	        	<div class="margin-10"></div>
	        	<div class="more-occurs">
		        	<span class="left">Alamat </span><strong class="right">{{$kuliner->alamat}}</strong><br>	        		
		        	<span class="left">Koordinat </span><strong class="right">{{$kuliner->koordinat}}</strong><br>	        		
	        	</div>
	        </div>
    	</div>
      </div>
      <div class="modal-footer green-background-main-color">
        <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
{{-- ============================================================================================================================================= --}}
@foreach($kuliners as $kuliner)
<div class="modal fade" id="modal-hapus-kuliner-{{$kuliner->id_kuliner}}">
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
      	<form action="/sipp-kling/hapus-kuliner/{{ $kuliner->id_kuliner }}" method="post">
	        <input type="submit" class="btn btn-danger" name="submit" value="YA">
	        {{ csrf_field() }}
	        <input type="hidden" name="_method" value="DELETE">

        <button type="button" class="btn pull-left" data-dismiss="modal">Tidak</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
{{-- ============================================================================================================================================= --}}


<div class="modal fade" id="modal-tambah-kuliner">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{ url('sipp-kling/input_kuliner') }}">
      		{{ csrf_field() }}
      <div class="modal-header bg-aqua-active">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Tambah</h4>
      </div>
      <div class="modal-body overflow-hidden">
      		<div class="form-group">
      			<label for="pemilik">Nama Tempat</label>
      			<input type="text" id="pemilik" name="nama_tempat" class="form-control" required></input>
      		</div>	
      		<div class="form-group">
      			<label for="alamat">Alamat</label>
      			<textarea class="form-control" name="alamat" placeholder="Ex. Jalan Raya" style="resize: none;height: 200px;"></textarea>
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
{{-- =========================================================================================================================================== --}}
				<div class="tab-pane" id="tpm2">
					<div class="table-responsive"></div>
					<div style="width: 100%;" class="overflow-hidden">
						<h4 class="box-title col-xs-6">DATA TPM - Tempat Makan Dan Restoran</h4>
						<button class="btn btn-flat green-main-color font-white col-xs-6" data-toggle="modal" data-target="#modal-tambah-kuliner"><i class="fa fa-plus" style="font-size: 12px"></i> Tambah</button>
					</div>
					<div class="line-height-box-body"></div>
					<div class="table-responsive">
						<table class="table table-bordered table-hover example2" style="overflow-x:auto;width: 100%">
							<thead>
								<tr>
									<th>Nama Pemilik</th>
									<th>Jumlah Penjamah</th>
									<th>Jumlah Karyawan</th>
									<th>No. Izin Usaha</th>
				  					<th style="display:none;">Kelurahan</th>                    
				  					<th style="display:none;">Alamat</th>                    
									{{-- <th>RT / RW</th> --}}
									<th>Nama Tempat</th>						
									<th>No Telpon</th>
									<th>Status</th>
									<th style="display:none;">Sumber</th>
									<th>Total Nilai</th>
				  					<th style="display:none;">Jam Operasional</th>                    
				  					<th style="display:none;">Gambaran Umum</th>                    
				  					<th style="display:none;">Foto</th>                    
				  					<th style="display:none;">Website</th>                    
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($kuliners as $kuliner)
								<tr>
									<td>{{$kuliner->nama_pemilik}}</td>
									<td>{{$kuliner->jumlah_penjamah}}</td>
									<td>{{$kuliner->jumlah_karyawan}}</td>
									<td>{{$kuliner->no_izin_usaha}}</td>
				  					<td style="display:none;">{{$kuliner->kelurahan}}</td>            
				  					<td style="display:none;">{{$kuliner->alamat}}</td>            
									{{-- <td>{{$kuliner->rt}} / {{$kuliner->rw}}</td> --}}
									<td>{{$kuliner->nama_tempat}}</td>
									<td>{{$kuliner->no_telp}}</td>
									<td>{{$kuliner->status}}</td>
									<td style="display:none;">{{$kuliner->sumber}}</td>
									<td>{{$kuliner->total_nilai}}</td>
									<th style="display:none;">{{$kuliner->jam_operasional}}</th>                    
				  					<th style="display:none;">{{$kuliner->gambaran_umum}}</th>                    
				  					<th style="display:none;">{{$kuliner->foto}}</th>                    
				  					<th style="display:none;">{{$kuliner->website}}</th> 
									<td style="white-space: nowrap;" align="center">
										<button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-kuliner-{{$kuliner->id_kuliner}}"><i class="ion-eye"></i></button>

										<button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus-kuliner-{{$kuliner->id_kuliner}}"><i class="ion-ios-trash"></i></button>

									</td>
								</tr>
							@endforeach
						</tbody>
						</table>
					</div>
					<!-- /.box-body -->
				</div>

{{-- ============================================================================================================================================ --}}
{{-- DAM --}}

@foreach($dams as $dam)
<div class="modal fade" id="modal-dam-{{$dam->id_dam}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header green-background-main-color">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Detail Data DAM</h4>
      </div>
      <div class="modal-body overflow-hidden">
      	<div class="col-xs-12 col-lg-5 no-padding">
	        <div class="images-modal">
	        	<img src="https://i2.wp.com/tutorialaplikasi.com/wp-content/uploads/2016/06/Meme-keren.jpg" alt="images" />
	        </div>
	        <div class="margin-10"></div>
	        <div class="more-occurs">
	        	<span class="left">Petugas </span><strong class="right">{{$dam->nama}}</strong><br>
	        	<span class="left">Status </span><strong class="right">{{$dam->status}}</i></strong><br>
	        	<span class="left">Skor Akhir </span><strong class="right">{{$dam->total_nilai}}</strong><br>
		        <span class="left">Update terakhir </span><strong class="right">{{$dam->waktu}}</strong><br> 	
	        </div>
    	</div>
    	<div class="col-xs-12 col-lg-7">
	        <div class="deskripsi-modal">
	        	<div class="bg-aqua-active box-keterangan padding-10">
		        <p class="text-center">
					<i class="fa fa-info-circle fa-2x"></i><br>
					<strong>Keterangan</strong>
				</p>
			</div>
	        	<div class="more-occurs">
		        	<span class="left">Nama Pemilik </span><strong class="right">{{$dam->nama_pemilik}}</strong><br>
		        	<span class="left">Nama Depot </span><strong class="right">{{$dam->nama_depot}}</strong><br>
		        	<span class="left">No Telp </span><strong class="right">{{$dam->no_telp}}</strong><br>
		        	<span class="left">Jam Operasional </span><strong class="right">{{$dam->jam_operasional}}</strong><br>
		        	<span class="left">Gambaran Umum </span><strong class="right">{{$dam->gambaran_umum}}</strong><br>		       	
		        	<span class="left">Website </span><strong class="right">{{$dam->website}}</strong><br>
		        	{{-- <span class="left">Sumber </span><strong class="right">{{$dam->sumber}}</strong><br> --}}
	        	</div>
	        	<div class="margin-10"></div>
	        	<div class="more-occurs">
		        	<span class="left">Alamat </span><strong class="right">{{$dam->alamat}}</strong><br>	        		
		        	<span class="left">Koordinat </span><strong class="right">{{$dam->koordinat}}</strong><br>	        		
	        	</div>
	        </div>
    	</div>
      </div>
      <div class="modal-footer green-background-main-color">
        <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach

{{-- ============================================================================================================================================= --}}
@foreach($dams as $dam)
<div class="modal fade" id="modal-hapus-dam-{{$dam->id_dam}}">
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
      	<form action="/sipp-kling/hapus-dam/{{ $dam->id_dam }}" method="post">
	        <input type="submit" class="btn btn-danger" name="submit" value="YA">
	        {{ csrf_field() }}
	        <input type="hidden" name="_method" value="DELETE">

        <button type="button" class="btn pull-left" data-dismiss="modal">Tidak</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
{{-- ============================================================================================================================================= --}}


<div class="modal fade" id="modal-tambah-dam">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{ url('sipp-kling/input_dam') }}">
      		{{ csrf_field() }}
      <div class="modal-header bg-aqua-active">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Tambah</h4>
      </div>
      <div class="modal-body overflow-hidden">
      		<div class="form-group">
      			<label for="pemilik">Nama Depot</label>
      			<input type="text" id="pemilik" name="nama_depot" class="form-control" required></input>
      		</div>	
      		<div class="form-group">
      			<label for="alamat">Alamat</label>
      			<textarea class="form-control" name="alamat" placeholder="Ex. Jalan Raya" style="resize: none;height: 200px;"></textarea>
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
{{-- =========================================================================================================================================== --}}

				<div class="tab-pane" id="tpm3">
					<div class="table-responsive"></div>
					<div style="width: 100%;" class="overflow-hidden">
						<h4 class="box-title col-xs-6">DATA TPM - DAM</h4>
						<button class="btn btn-flat green-main-color font-white col-xs-6" data-toggle="modal" data-target="#modal-tambah-dam"><i class="fa fa-plus" style="font-size: 12px"></i> Tambah</button>
					</div>
					<div class="line-height-box-body"></div>
					<div class="table-responsive">
						<table class="table table-bordered table-hover example2" style="overflow-x:auto;width: 100%">
							<thead>
								<tr>
									<th>Nama Pemilik</th>
									<th>Nama Depot</th>						
				  					<th>Kelurahan</th>                    
				  					<th style="display:none;">Alamat</th>                    
									<th>No Telpon</th>
									<th>Status</th>
									{{-- <th style="display:none;">Sumber</th> --}}
									<th>Total Nilai</th>
				  					<th style="display:none;">Jam Operasional</th>                    
				  					<th style="display:none;">Gambaran Umum</th>                    
				  					<th style="display:none;">Foto</th>                    
				  					<th style="display:none;">Website</th>
									<th>Update terakhir</th>                    
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($dams as $dam)
								<tr>
									<td>{{$dam->nama_pemilik}}</td>
									<td>{{$dam->nama_depot}}</td>
				  					<td>{{$dam->kelurahan}}</td>            
				  					<td style="display:none;">{{$dam->alamat}}</td>            
									<td>{{$dam->no_telp}}</td>
									<td>{{$dam->status}}</td>
									{{-- <td style="display:none;">{{$dam->sumber}}</td> --}}
									<td>{{$dam->total_nilai}}</td>
									<th style="display:none;">{{$dam->jam_operasional}}</th>                    
				  					<th style="display:none;">{{$dam->gambaran_umum}}</th>                    
				  					<th style="display:none;">{{$dam->foto}}</th>                    
				  					<th style="display:none;">{{$dam->website}}</th> 
									<td>{{$dam->waktu}}</td>
									<td style="white-space: nowrap;" align="center">
										<button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-dam-{{$dam->id_dam}}"><i class="ion-eye"></i></button>

										<button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus-dam-{{$dam->id_dam}}"><i class="ion-ios-trash"></i></button>

									</td>
								</tr>
							@endforeach
						</tbody>
						</table>
					</div>
					<!-- /.box-body -->
				</div>


{{-- ============================================================================================================================================ --}}
{{-- TEMPAT IBADAH --}}

@foreach($ibadahs as $ibadah)
<div class="modal fade" id="modal-ibadah-{{$ibadah->id_ibadah}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header green-background-main-color">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Detail Data Tempat Ibadah</h4>
      </div>
      <div class="modal-body overflow-hidden">
      	<div class="col-xs-12 col-lg-5 no-padding">
	        <div class="images-modal">
	        	<img src="https://i2.wp.com/tutorialaplikasi.com/wp-content/uploads/2016/06/Meme-keren.jpg" alt="images" />
	        </div>
	        <div class="margin-10"></div>
	        <div class="more-occurs">
	        	<span class="left">Petugas </span><strong class="right">{{$ibadah->nama}}</strong><br>
	        	<span class="left">Status </span><strong class="right">{{$ibadah->status}}</i></strong><br>
	        	<span class="left">Skor Akhir </span><strong class="right">{{$ibadah->total_nilai}}</strong><br>
		        <span class="left">Update terakhir </span><strong class="right">{{$ibadah->waktu}}</strong><br> 	
	        </div>
    	</div>
    	<div class="col-xs-12 col-lg-7">
	        <div class="deskripsi-modal">
	        	<div class="bg-aqua-active box-keterangan padding-10">
		        <p class="text-center">
					<i class="fa fa-info-circle fa-2x"></i><br>
					<strong>Keterangan</strong>
				</p>
			</div>
	        	<div class="more-occurs">
		        	<span class="left">Nama Pengurus </span><strong class="right">{{$ibadah->nama_pengurus}}</strong><br>
		        	<span class="left">Nama Tempat </span><strong class="right">{{$ibadah->nama_tempat}}</strong><br>
		        	<span class="left">Jumlah Jamaah </span><strong class="right">{{$ibadah->jumlah_jamaah}}</strong><br>
		        	<span class="left">No Telp </span><strong class="right">{{$ibadah->no_telp}}</strong><br>
		        	<span class="left">Jam Operasional </span><strong class="right">{{$ibadah->jam_operasional}}</strong><br>
		        	<span class="left">Gambaran Umum </span><strong class="right">{{$ibadah->gambaran_umum}}</strong><br>		       	
		        	<span class="left">Website </span><strong class="right">{{$ibadah->website}}</strong><br>
		        	<span class="left">Sumber </span><strong class="right">{{$ibadah->sumber}}</strong><br>
	        	</div>
	        	<div class="margin-10"></div>
	        	<div class="more-occurs">
		        	<span class="left">Alamat </span><strong class="right">{{$ibadah->alamat}}</strong><br>	        		
		        	<span class="left">Koordinat </span><strong class="right">{{$ibadah->koordinat}}</strong><br>	        		
	        	</div>
	        </div>
    	</div>
      </div>
      <div class="modal-footer green-background-main-color">
        <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach

{{-- ============================================================================================================================================= --}}
@foreach($ibadahs as $ibadah)
<div class="modal fade" id="modal-hapus-ibadah-{{$ibadah->id_ibadah}}">
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
      	<form action="/sipp-kling/hapus-ibadah/{{ $ibadah->id_ibadah }}" method="post">
	        <input type="submit" class="btn btn-danger" name="submit" value="YA">
	        {{ csrf_field() }}
	        <input type="hidden" name="_method" value="DELETE">

        <button type="button" class="btn pull-left" data-dismiss="modal">Tidak</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
{{-- ============================================================================================================================================= --}}


<div class="modal fade" id="modal-tambah-ibadah">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{ url('sipp-kling/input_ibadah') }}">
      		{{ csrf_field() }}
      <div class="modal-header bg-aqua-active">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Tambah</h4>
      </div>
      <div class="modal-body overflow-hidden">
      		<div class="form-group">
      			<label for="pemilik">Nama Depot</label>
      			<input type="text" id="pemilik" name="nama_tempat" class="form-control" placeholder="Ex. Mesjid Ar-Rahman" required></input>
      		</div>	
      		<div class="form-group">
      			<label for="alamat">Alamat</label>
      			<textarea class="form-control" name="alamat" placeholder="Ex. Jalan Raya" style="resize: none;height: 200px;"></textarea>
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
{{-- ================================================================================================================== --}}
				<div class="tab-pane" id="ttu1">
				<div class="table-responsive"></div>
					<div style="width: 100%;" class="overflow-hidden">
						<h4 class="box-title col-xs-6">DATA TPM - Tempat Ibadah</h4>
						<button class="btn btn-flat green-main-color font-white col-xs-6" data-toggle="modal" data-target="#modal-tambah-ibadah"><i class="fa fa-plus" style="font-size: 12px"></i> Tambah</button>
					</div>
					<div class="line-height-box-body"></div>
					<div class="table-responsive">
						<table class="table table-bordered table-hover example2" style="overflow-x:auto;width: 100%">
							<thead>
								<tr>
									<th>Nama Pengurus</th>
				  					<th style="display:none;">Kelurahan</th>                    
				  					<th>Alamat</th>                    
									<th>Nama Tempat</th>						
									<th>Jumlah Jamaah</th>
									<th>Status</th>
									<th style="display:none;">Sumber</th>
									<th>Total Nilai</th>
				  					<th style="display:none;">Jam Operasional</th>                    
				  					<th style="display:none;">Gambaran Umum</th>                    
				  					<th style="display:none;">Foto</th>                    
				  					<th style="display:none;">Website</th>                    
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($ibadahs as $ibadah)
								<tr>
									<td>{{$ibadah->nama_pengurus}}</td>
				  					<td style="display:none;">{{$ibadah->kelurahan}}</td>            
				  					<td>{{$ibadah->alamat}}</td>            
									<td>{{$ibadah->nama_tempat}}</td>
									<td>{{$ibadah->jumlah_jamaah}}</td>
									<td>{{$ibadah->status}}</td>
									<td style="display:none;">{{$ibadah->sumber}}</td>
									<td>{{$ibadah->total_nilai}}</td>
									<th style="display:none;">{{$ibadah->jam_operasional}}</th>                    
				  					<th style="display:none;">{{$ibadah->gambaran_umum}}</th>                    
				  					<th style="display:none;">{{$ibadah->foto}}</th>                    
				  					<th style="display:none;">{{$ibadah->website}}</th> 
									<td style="white-space: nowrap;" align="center">
										<button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-ibadah-{{$ibadah->id_ibadah}}"><i class="ion-eye"></i></button>

										<button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus-ibadah-{{$ibadah->id_ibadah}}"><i class="ion-ios-trash"></i></button>

									</td>
								</tr>
							@endforeach
						</tbody>
						</table>
					</div>
					<!-- /.box-body -->
				</div>
{{-- ========================================================================================================================================== --}}
{{-- PASAR --}}
@foreach($pasars as $pasar)
<div class="modal fade" id="modal-pasar-{{$pasar->id_pasar}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header green-background-main-color">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Detail Jasa Boga</h4>
      </div>
      <div class="modal-body overflow-hidden">
      	<div class="col-xs-12 col-lg-5 no-padding">
	        <div class="images-modal">
	        	<img src="https://i2.wp.com/tutorialaplikasi.com/wp-content/uploads/2016/06/Meme-keren.jpg" alt="images" />
	        </div>
	        <div class="margin-10"></div>
	        <div class="more-occurs">
	        	<span class="left">Petugas </span><strong class="right">{{$pasar->nama}}</strong><br>
	        	<span class="left">Status </span><strong class="right">{{$pasar->status}}</i></strong><br>
	        	<span class="left">Skor Akhir </span><strong class="right">{{$pasar->total_nilai}}</strong><br>
		        <span class="left">Update terakhir </span><strong class="right">{{$pasar->waktu}}</strong><br> 	
	        </div>
    	</div>
    	<div class="col-xs-12 col-lg-7">
	        <div class="deskripsi-modal">
	        	<div class="bg-aqua-active box-keterangan padding-10">
		        <p class="text-center">
					<i class="fa fa-info-circle fa-2x"></i><br>
					<strong>Keterangan</strong>
				</p>
			</div>
	        	<div class="more-occurs">
		        	<span class="left">Nama Penegelola </span><strong class="right">{{$pasar->nama_pengelola}}</strong><br>
		        	<span class="left">Nama Pasar </span><strong class="right">{{$pasar->nama_tempat}}</strong><br>
		        	<span class="left">Jam Operasional </span><strong class="right">{{$pasar->jam_operasional}}</strong><br>
		        	<span class="left">Jumlah Asosiasi</span><strong class="right">{{$pasar->jumlah_asosiasi}}</strong><br>
		        	<span class="left">Jumlah Kios</span><strong class="right">{{$pasar->jumlah_kios}}</strong><br>
		        	<span class="left">Jumlah Pedagang </span><strong class="right">{{$pasar->jumlah_pedagang}}</strong><br>
	        	</div>
	        	<div class="margin-10"></div>
	        	<div class="more-occurs">
		        	<span class="left">Alamat</span><strong class="right">{{$pasar->alamat}}</strong><br>	        		
		        	<span class="left">Koordinat</span><strong class="right">{{$pasar->koordinat}}</strong><br>	        		
	        	</div>
	        </div>
    	</div>
      </div>
      <div class="modal-footer green-background-main-color">
        <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
{{-- ===================================================================================================================== --}}
@foreach($pasars as $pasar)
<div class="modal fade" id="modal-hapus-pasar-{{$pasar->id_pasar}}">
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
      	<form action="/sipp-kling/hapus-pasar/{{$pasar->id_pasar}}" method="post">
	        <input type="submit" class="btn btn-danger" name="submit" value="YA">
	        {{ csrf_field() }}
	        <input type="hidden" name="_method" value="DELETE">

        <button type="button" class="btn pull-left" data-dismiss="modal">Tidak</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
{{-- ===================================================================================================================== --}}
<div class="modal fade" id="modal-tambah-pasar">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{ url('sipp-kling/input_pasar') }}">
      		{{ csrf_field() }}
      <div class="modal-header bg-aqua-active">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Tambah</h4>
      </div>
      <div class="modal-body overflow-hidden">
      		<div class="form-group">
      			<label for="pemilik">Nama</label>
      			<input type="text" id="pemilik" name="nama_tempat" class="form-control" placeholder="Ex. Pasar Kamis" required></input>
      		</div>	
      		<div class="form-group">
      			<label for="alamat">Alamat</label>
      			<textarea class="form-control" name="alamat" placeholder="Ex. Jalan Raya" style="resize: none;height: 200px;"></textarea>
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

{{-- ============================================================================================================================================= --}}

{{-- ================================================================================================================== --}}
{{-- Ini tabel Pasar --}}
				<div class="tab-pane" id="ttupasar">
					<div class="table-responsive"></div>
					<div style="width: 100%;" class="overflow-hidden">
						<h4 class="box-title col-xs-6">DATA TPM - Pasar</h4>
						<button class="btn btn-flat green-main-color font-white col-xs-6" data-toggle="modal" data-target="#modal-tambah-pasar"><i class="fa fa-plus" style="font-size: 12px"></i> Tambah</button>
					</div>
					<div class="line-height-box-body"></div>
					<div class="table-responsive">
						<table class="table table-bordered table-hover example2" style="overflow-x:auto;width: 100%">
							<thead>
								<tr>
									<th>Nama Pengelola</th>
									<th>Nama Tempat</th>						
				  					{{-- <th >Kelurahan</th>                     --}}
				  					<th style="display:none;">Alamat</th>                    
									<th>Jumlah Pedagang</th>
									<th>Jumlah Kios</th>
									<th>Jumlah Asosiasi</th>
									<th>Status</th>
									<th style="display:none;">Sumber</th>
									<th>Total Nilai</th>
				  					<th style="display:none;">Jam Operasional</th>                    
				  					<th style="display:none;">Gambaran Umum</th>                    
				  					<th style="display:none;">Foto</th>                    
				  					<th style="display:none;">Website</th>                    
									<th>Action</th>
								</tr>
							</thead>
							<tbody> 
								@foreach($pasars as $pasar)
								<tr>
									<td>{{$pasar->nama_pengelola}}</td>
									<td>{{$pasar->nama_tempat}}</td>
				  					{{-- <td >{{$pasar->kelurahan}}</td>             --}}
				  					<td style="display:none;">{{$pasar->alamat}}</td>            
									<td>{{$pasar->jumlah_pedagang}}</td>
									<td>{{$pasar->jumlah_kios}}</td>
									<td>{{$pasar->jumlah_asosiasi}}</td>
									<td>{{$pasar->status}}</td>
									<td style="display:none;">{{$pasar->sumber}}</td>
									<td>{{$pasar->total_nilai}}</td>
									<th style="display:none;">{{$pasar->jam_operasional}}</th>                    
				  					<th style="display:none;">{{$pasar->gambaran_umum}}</th>                    
				  					<th style="display:none;">{{$pasar->foto}}</th>                    
				  					<th style="display:none;">{{$pasar->website}}</th> 
									<td style="white-space: nowrap;" align="center">
										<button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-pasar-{{$pasar->id_pasar}}"><i class="ion-eye"></i></button>

										<button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus-pasar-{{$pasar->id_pasar}}"><i class="ion-ios-trash"></i></button>

									</td>
								</tr>
							@endforeach
						</tbody>
						</table>
					</div>
					<!-- /.box-body -->
				</div>
{{-- ========================================================================================================================================== --}}

{{-- SEKOLAH --}}
@foreach($sekolahs as $sekolah)
<div class="modal fade" id="modal-sekolah-{{$sekolah->id_sekolah}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header green-background-main-color">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Detail Data Tempat sekolah</h4>
      </div>
      <div class="modal-body overflow-hidden">
      	<div class="col-xs-12 col-lg-5 no-padding">
	        <div class="images-modal">
	        	<img src="https://i2.wp.com/tutorialaplikasi.com/wp-content/uploads/2016/06/Meme-keren.jpg" alt="images" />
	        </div>
	        <div class="margin-10"></div>
	        <div class="more-occurs">
	        	<span class="left">Petugas </span><strong class="right">{{$sekolah->nama}}</strong><br>
	        	<span class="left">Status </span><strong class="right">{{$sekolah->status}}</i></strong><br>
	        	<span class="left">Skor Akhir </span><strong class="right">{{$sekolah->total_nilai}}</strong><br>
		        <span class="left">Update terakhir </span><strong class="right">{{$sekolah->waktu}}</strong><br> 	
	        </div>
    	</div>
    	<div class="col-xs-12 col-lg-7">
	        <div class="deskripsi-modal">
	        	<div class="bg-aqua-active box-keterangan padding-10">
		        <p class="text-center">
					<i class="fa fa-info-circle fa-2x"></i><br>
					<strong>Keterangan</strong>
				</p>
			</div>
	        	<div class="more-occurs">
		        	<span class="left">Kepala Sekolah </span><strong class="right">{{$sekolah->nama_kepala_sekolah}}</strong><br>
		        	<span class="left">Nama Tempat </span><strong class="right">{{$sekolah->nama_tempat}}</strong><br>
		        	<span class="left">Kategori </span><strong class="right">{{$sekolah->kategori}}</strong><br>
		        	<span class="left">Murid Per Tahun </span></span><strong class="right">{{$sekolah->jumlah_murid_pertahun}}</strong><br>
		        	<span class="left">Luas Bangunan </span><strong class="right">{{$sekolah->luas_bangunan}}</strong><br>
		        	<span class="left">Luas Tanah </span><strong class="right">{{$sekolah->luas_tanah}}</strong><br>
		        	<span class="left">Tahun Berdiri </span><strong class="right">{{$sekolah->tahun_berdiri}}</strong><br>
		        	<span class="left">No Telp </span><strong class="right">{{$sekolah->no_telp}}</strong><br>
		        	<span class="left">Jam Operasional </span><strong class="right">{{$sekolah->jam_operasional}}</strong><br>
		        	<span class="left">Gambaran Umum </span><strong class="right">{{$sekolah->gambaran_umum}}</strong><br>		       	
		        	<span class="left">Website </span><strong class="right">{{$sekolah->website}}</strong><br>
		        	<span class="left">Sumber </span><strong class="right">{{$sekolah->sumber}}</strong><br>
	        	</div>
	        	<div class="margin-10"></div>
	        	<div class="more-occurs">
		        	<span class="left">Alamat </span><strong class="right">{{$sekolah->alamat}}</strong><br>	        		
		        	<span class="left">Koordinat </span><strong class="right">{{$sekolah->koordinat}}</strong><br>	        		
	        	</div>
	        </div>
    	</div>
      </div>
      <div class="modal-footer green-background-main-color">
        <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach

{{-- ============================================================================================================================================= --}}
@foreach($sekolahs as $sekolah)
<div class="modal fade" id="modal-hapus-sekolah-{{$sekolah->id_sekolah}}">
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
      	<form action="/sipp-kling/hapus-sekolah/{{ $sekolah->id_sekolah }}" method="post">
	        <input type="submit" class="btn btn-danger" name="submit" value="YA">
	        {{ csrf_field() }}
	        <input type="hidden" name="_method" value="DELETE">

        <button type="button" class="btn pull-left" data-dismiss="modal">Tidak</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
{{-- ============================================================================================================================================= --}}


<div class="modal fade" id="modal-tambah-sekolah">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{ url('sipp-kling/input_sekolah') }}">
      		{{ csrf_field() }}
      <div class="modal-header bg-aqua-active">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Tambah</h4>
      </div>
      <div class="modal-body overflow-hidden">
      		<div class="form-group">
      			<label for="pemilik">Nama Sekolah</label>
      			<input type="text" id="pemilik" name="nama_tempat" class="form-control" placeholder="Ex. SD Maju Terus" required></input>
      		</div>	
      		<div class="form-group">
      			<label for="alamat">Alamat</label>
      			<textarea class="form-control" name="alamat" placeholder="Ex. Jalan Raya" style="resize: none;height: 200px;"></textarea>
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
{{-- ================================================================================================================== --}}

				<div class="tab-pane" id="ttusekolah">
					<div class="table-responsive"></div>
					<div style="width: 100%;" class="overflow-hidden">
						<h4 class="box-title col-xs-6">DATA TPM - Sekolah</h4>
						<button class="btn btn-flat green-main-color font-white col-xs-6" data-toggle="modal" data-target="#modal-tambah-sekolah"><i class="fa fa-plus" style="font-size: 12px"></i> Tambah</button>
					</div>
					<div class="line-height-box-body"></div>
					<div class="table-responsive">
						<table class="table table-bordered table-hover example2" style="overflow-x:auto;width: 100%">
							<thead>
								<tr>
									<th>Nama Kepala Sekolah</th>
				  					<th style="display:none;">Kelurahan</th>                    
				  					<th style="display:none;">Alamat</th>                    
									<th>Nama Tempat</th>						
									<th>Kategori</th>						
									<th>Luas Bangunan</th>						
									<th>Luas Tanah</th>						
									<th>Jumlah Murid</th>
									<th>Tahun Berdiri</th>
									<th>Status</th>
									<th style="display:none;">Sumber</th>
									<th>Total Nilai</th>
				  					<th style="display:none;">Jam Operasional</th>                    
				  					<th style="display:none;">Gambaran Umum</th>                    
				  					<th style="display:none;">Foto</th>                    
				  					<th style="display:none;">Website</th>                    
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($sekolahs as $sekolah)
								<tr>
									<td>{{$sekolah->nama_kepala_sekolah}}</td>
				  					<td style="display:none;">{{$sekolah->kelurahan}}</td>            
				  					<td style="display:none;">{{$sekolah->alamat}}</td>            
									<td>{{$sekolah->nama_tempat}}</td>
									<td>{{$sekolah->kategori}}</td>
									<td>{{$sekolah->luas_bangunan}}</td>
									<td>{{$sekolah->luas_tanah}}</td>
									<td>{{$sekolah->jumlah_murid_pertahun}}</td>
									<td>{{$sekolah->tahun_berdiri}}</td>
									<td>{{$sekolah->status}}</td>
									<td style="display:none;">{{$sekolah->sumber}}</td>
									<td>{{$sekolah->total_nilai}}</td>
									<th style="display:none;">{{$sekolah->jam_operasional}}</th>                    
				  					<th style="display:none;">{{$sekolah->gambaran_umum}}</th>                    
				  					<th style="display:none;">{{$sekolah->foto}}</th>                    
				  					<th style="display:none;">{{$sekolah->website}}</th> 
									<td style="white-space: nowrap;" align="center">
										<button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-sekolah-{{$sekolah->id_sekolah}}"><i class="ion-eye"></i></button>

										<button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus-sekolah-{{$sekolah->id_sekolah}}"><i class="ion-ios-trash"></i></button>

									</td>
								</tr>
							@endforeach
						</tbody>
						</table>
					</div>
					<!-- /.box-body -->
				</div>
{{-- ========================================================================================================================================== --}}

{{-- DATA PUSKESMAS --}}

@foreach($puskess as $puskes)
<div class="modal fade" id="modal-puskes-{{$puskes->id_puskesmas}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header green-background-main-color">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Detail Data Tempat Puskesmas</h4>
      </div>
      <div class="modal-body overflow-hidden">
      	<div class="col-xs-12 col-lg-5 no-padding">
	        <div class="images-modal">
	        	<img src="https://i2.wp.com/tutorialaplikasi.com/wp-content/uploads/2016/06/Meme-keren.jpg" alt="images" />
	        </div>
	        <div class="margin-10"></div>
	        <div class="more-occurs">
	        	<span class="left">Petugas </span><strong class="right">{{$puskes->nama}}</strong><br>
	        	<span class="left">Status </span><strong class="right">{{$puskes->status}}</i></strong><br>
	        	<span class="left">Skor Akhir </span><strong class="right">{{$puskes->total_nilai}}</strong><br>
		        <span class="left">Update terakhir </span><strong class="right">{{$puskes->waktu}}</strong><br> 	
	        </div>
    	</div>
    	<div class="col-xs-12 col-lg-7">
	        <div class="deskripsi-modal">
	        	<div class="bg-aqua-active box-keterangan padding-10">
		        <p class="text-center">
					<i class="fa fa-info-circle fa-2x"></i><br>
					<strong>Keterangan</strong>
				</p>
			</div>
	        	<div class="more-occurs">
		        	<span class="left">Kepala Puskesmas </span><strong class="right">{{$puskes->nama_pimpinan}}</strong><br>
		        	<span class="left">Nama Tempat </span><strong class="right">{{$puskes->nama_tempat}}</strong><br>
		        	<span class="left">No Telp </span><strong class="right">{{$puskes->no_telp}}</strong><br>
		        	<span class="left">Jam Operasional </span><strong class="right">{{$puskes->jam_operasional}}</strong><br>
		        	<span class="left">Gambaran Umum </span><strong class="right">{{$puskes->gambaran_umum}}</strong><br>		       	
		        	<span class="left">Website </span><strong class="right">{{$puskes->website}}</strong><br>
		        	<span class="left">Sumber </span><strong class="right">{{$puskes->sumber}}</strong><br>
	        	</div>
	        	<div class="margin-10"></div>
	        	<div class="more-occurs">
		        	<span class="left">Alamat </span><strong class="right">{{$puskes->alamat}}</strong><br>	        		
		        	<span class="left">Koordinat </span><strong class="right">{{$puskes->koordinat}}</strong><br>	        		
	        	</div>
	        </div>
    	</div>
      </div>
      <div class="modal-footer green-background-main-color">
        <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach

{{-- ============================================================================================================================================= --}}
@foreach($puskess as $puskes)
<div class="modal fade" id="modal-hapus-puskes-{{$puskes->id_puskesmas}}">
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
      	<form action="/sipp-kling/hapus-puskes/{{ $puskes->id_puskesmas }}" method="post">
	        <input type="submit" class="btn btn-danger" name="submit" value="YA">
	        {{ csrf_field() }}
	        <input type="hidden" name="_method" value="DELETE">

        <button type="button" class="btn pull-left" data-dismiss="modal">Tidak</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
{{-- ============================================================================================================================================= --}}

<div class="modal fade" id="modal-tambah-puskes">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{ url('sipp-kling/input_puskes') }}">
      		{{ csrf_field() }}
      <div class="modal-header bg-aqua-active">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Tambah</h4>
      </div>
      <div class="modal-body overflow-hidden">
      		<div class="form-group">
      			<label for="pemilik">Nama Puskesmas</label>
      			<input type="text" id="pemilik" name="nama_tempat" class="form-control" placeholder="Ex. Puskesmas Sehat" required></input>
      		</div>	
      		<div class="form-group">
      			<label for="alamat">Alamat</label>
      			<textarea class="form-control" name="alamat" placeholder="Ex. Jalan Raya" style="resize: none;height: 200px;"></textarea>
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
{{-- ================================================================================================================== --}}

				<div class="tab-pane" id="ttupuskesmas">
				<div class="table-responsive"></div>
					<div style="width: 100%;" class="overflow-hidden">
						<h4 class="box-title col-xs-6">DATA TPM - PUSKESMAS</h4>
						<button class="btn btn-flat green-main-color font-white col-xs-6" data-toggle="modal" data-target="#modal-tambah-puskes"><i class="fa fa-plus" style="font-size: 12px"></i> Tambah</button>
					</div>
					<div class="line-height-box-body"></div>
					<div class="table-responsive">
						<table class="table table-bordered table-hover example2" style="overflow-x:auto;width: 100%">
							<thead>
								<tr>
									<th>Nama Pimpinan</th>
				  					<th>Kelurahan</th>                    
				  					<th style="display:none;">Alamat</th>                    
									<th>Nama Tempat</th>						
									<th>No Telpon</th>						
				  					<th>Jam Operasional</th>                    
				  					<th>Website</th>                    
									<th>Status</th>
									<th style="display:none;">Sumber</th>
									<th>Total Nilai</th>
				  					<th style="display:none;">Gambaran Umum</th>                    
				  					<th style="display:none;">Foto</th>                    
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($puskess as $puskes)
								<tr>
									<td>{{$puskes->nama_pimpinan}}</td>
				  					<td>{{$puskes->kelurahan}}</td>            
				  					<td style="display:none;">{{$puskes->alamat}}</td>            
									<td>{{$puskes->nama_tempat}}</td>
									<td>{{$puskes->no_telp}}</td>
									<th>{{$puskes->jam_operasional}}</th>                    
				  					<th>{{$puskes->website}}</th> 
									<td>{{$puskes->status}}</td>
									<td style="display:none;">{{$puskes->sumber}}</td>
									<td>{{$puskes->total_nilai}}</td>
				  					<th style="display:none;">{{$puskes->gambaran_umum}}</th>                    
				  					<th style="display:none;">{{$puskes->foto}}</th>                    
									<td style="white-space: nowrap;" align="center">
										<button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-puskes-{{$puskes->id_puskesmas}}"><i class="ion-eye"></i></button>

										<button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus-puskes-{{{$puskes->id_puskesmas}}}"><i class="ion-ios-trash"></i></button>

									</td>
								</tr>
							@endforeach
						</tbody>
						</table>
					</div>
					<!-- /.box-body -->
				</div>
{{-- ========================================================================================================================================== --}}

{{-- PESANTREN --}}

@foreach($pesantrens as $pesantren)
<div class="modal fade" id="modal-pesantren-{{$pesantren->id_pesantren}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header green-background-main-color">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Detail Data Tempat Pesantren</h4>
      </div>
      <div class="modal-body overflow-hidden">
      	<div class="col-xs-12 col-lg-5 no-padding">
	        <div class="images-modal">
	        	<img src="https://i2.wp.com/tutorialaplikasi.com/wp-content/uploads/2016/06/Meme-keren.jpg" alt="images" />
	        </div>
	        <div class="margin-10"></div>
	        <div class="more-occurs">
	        	<span class="left">Petugas </span><strong class="right">{{$pesantren->nama}}</strong><br>
	        	<span class="left">Status </span><strong class="right">{{$pesantren->status}}</i></strong><br>
	        	<span class="left">Skor Akhir </span><strong class="right">{{$pesantren->total_nilai}}</strong><br>
		        <span class="left">Update terakhir </span><strong class="right">{{$pesantren->waktu}}</strong><br> 	
	        </div>
    	</div>
    	<div class="col-xs-12 col-lg-7">
	        <div class="deskripsi-modal">
	        	<div class="bg-aqua-active box-keterangan padding-10">
		        <p class="text-center">
					<i class="fa fa-info-circle fa-2x"></i><br>
					<strong>Keterangan</strong>
				</p>
			</div>
        	<div class="more-occurs">
	        	<span class="left">Nama Pengelola </span><strong class="right">{{$pesantren->nama_pengelola}}</strong><br>
	        	<span class="left">Nama Tempat </span><strong class="right">{{$pesantren->nama_tempat}}</strong><br>
	        	<span class="left">Jumlah Santri </span><strong class="right">{{$pesantren->jumlah_santri}}</strong><br>
	        	<span class="left">No Telp </span><strong class="right">{{$pesantren->no_telp}}</strong><br>
	        	<span class="left">Jam Operasional </span><strong class="right">{{$pesantren->jam_operasional}}</strong><br>
	        	<span class="left">Gambaran Umum </span><strong class="right">{{$pesantren->gambaran_umum}}</strong><br>    	
	        	<span class="left">Website </span><strong class="right">{{$pesantren->website}}</strong><br>
	        	{{-- <span class="left">Sumber </span><strong class="right">{{$pesantren->sumber}}</strong><br> --}}
	        	</div>
        	<div class="margin-10"></div>
        	<div class="more-occurs">
	        	<span class="left">Alamat </span><strong class="right">{{$pesantren->alamat}}</strong><br>	        		
	        	<span class="left">Koordinat </span><strong class="right">{{$pesantren->koordinat}}</strong><br>	        		
        	</div>
	        </div>
    	</div>
      </div>
      <div class="modal-footer green-background-main-color">
        <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach

{{-- ============================================================================================================================================= --}}
@foreach($pesantrens as $pesantren)
<div class="modal fade" id="modal-hapus-pesantren-{{$pesantren->id_pesantren}}">
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
      	<form action="/sipp-kling/hapus-pesantren/{{ $pesantren->id_pesantren }}" method="post">
	        <input type="submit" class="btn btn-danger" name="submit" value="YA">
	        {{ csrf_field() }}
	        <input type="hidden" name="_method" value="DELETE">

        <button type="button" class="btn pull-left" data-dismiss="modal">Tidak</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
{{-- ===========================================================================================================================--}}


<div class="modal fade" id="modal-tambah-pesantren">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{ url('sipp-kling/input_pesantren') }}">
      		{{ csrf_field() }}
      <div class="modal-header bg-aqua-active">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Tambah</h4>
      </div>
      <div class="modal-body overflow-hidden">
      		<div class="form-group">
      			<label for="pemilik">Nama Pesantren</label>
      			<input type="text" id="pemilik" name="nama_tempat" class="form-control" placeholder="Ex. Pesantren Aswaja" required></input>
      		</div>	
      		<div class="form-group">
      			<label for="alamat">Alamat</label>
      			<textarea class="form-control" name="alamat" placeholder="Ex. Jalan Raya" style="resize: none;height: 200px;"></textarea>
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
{{-- ================================================================================================================== --}}

				<div class="tab-pane" id="ttupesantren">
					<div class="table-responsive"></div>
					<div style="width: 100%;" class="overflow-hidden">
						<h4 class="box-title col-xs-6">DATA TPM - Pesantren</h4>
						<button class="btn btn-flat green-main-color font-white col-xs-6" data-toggle="modal" data-target="#modal-tambah-pesantren"><i class="fa fa-plus" style="font-size: 12px"></i> Tambah</button>
					</div>
					<div class="line-height-box-body"></div>
					<div class="table-responsive">
						<table class="table table-bordered table-hover example2" style="overflow-x:auto;width: 100%">
							<thead>
								<tr>
									<th>Nama Pengelola</th>
				  					<th>Kelurahan</th>                    
				  					<th style="display:none;">Alamat</th>                    
									<th>Nama Tempat</th>						
									<th>Jumlah Santri</th>
									<th>No Telpon</th>
				  					<th >Website</th>                    
									<th>Status</th>
									<th>Total Nilai</th>
				  					<th style="display:none;">Jam Operasional</th>                    
				  					<th style="display:none;">Gambaran Umum</th>                    
				  					<th style="display:none;">Foto</th>                    
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($pesantrens as $pesantren)
								<tr>
									<td>{{$pesantren->nama_pengelola}}</td>
				  					<td>{{$pesantren->kelurahan}}</td>            
				  					<td style="display:none;">{{$pesantren->alamat}}</td>            
									<td>{{$pesantren->nama_tempat}}</td>
									<td>{{$pesantren->jumlah_santri}}</td>
									<td >{{$pesantren->no_telp}}</td>
				  					<th>{{$pesantren->website}}</th> 
									<td>{{$pesantren->status}}</td>
									<td>{{$pesantren->total_nilai}}</td>
									<th style="display:none;">{{$pesantren->jam_operasional}}</th>                    
				  					<th style="display:none;">{{$pesantren->gambaran_umum}}</th>                    
				  					<th style="display:none;">{{$pesantren->foto}}</th>                    
									<td style="white-space: nowrap;" align="center">
										<button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-pesantren-{{$pesantren->id_pesantren}}"><i class="ion-eye"></i></button>

										<button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus-pesantren-{{$pesantren->id_pesantren}}"><i class="ion-ios-trash"></i></button>

									</td>
								</tr>
							@endforeach
						</tbody>
						</table>
					</div>
					<!-- /.box-body -->
				</div>
{{-- ========================================================================================================================================== --}}
{{-- HOTEL --}}
@foreach($hotels as $hotel)
<div class="modal fade" id="modal-hotel-{{$hotel->id_hotel}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header green-background-main-color">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Detail Data Tempat Hotel</h4>
      </div>
      <div class="modal-body overflow-hidden">
      	<div class="col-xs-12 col-lg-5 no-padding">
	        <div class="images-modal">
	        	<img src="https://i2.wp.com/tutorialaplikasi.com/wp-content/uploads/2016/06/Meme-keren.jpg" alt="images" />
	        </div>
	        <div class="margin-10"></div>
	        <div class="more-occurs">
	        	<span class="left">Petugas </span><strong class="right">{{$hotel->nama}}</strong><br>
	        	<span class="left">Status </span><strong class="right">{{$hotel->status}}</i></strong><br>
	        	<span class="left">Skor Akhir </span><strong class="right">{{$hotel->total_nilai}}</strong><br>
		        <span class="left">Update terakhir </span><strong class="right">{{$hotel->waktu}}</strong><br> 	
	        </div>
    	</div>
    	<div class="col-xs-12 col-lg-7">
	        <div class="deskripsi-modal">
	        	<div class="bg-aqua-active box-keterangan padding-10">
		        <p class="text-center">
					<i class="fa fa-info-circle fa-2x"></i><br>
					<strong>Keterangan</strong>
				</p>
			</div>
        	<div class="more-occurs">
	        	<span class="left">Nama Pemilik </span><strong class="right">{{$hotel->nama_pemilik}}</strong><br>
	        	<span class="left">Nama Hotel </span><strong class="right">{{$hotel->nama_tempat}}</strong><br>
	        	<span class="left">No Izin Usaha </span><strong class="right">{{$hotel->no_izin_usaha}}</strong><br>
	        	<span class="left">Jumlah Karyawan </span><strong class="right">{{$hotel->jumlah_karyawan}}</strong><br>
	        	<span class="left">No Telp </span><strong class="right">{{$hotel->no_telp}}</strong><br>
	        	<span class="left">Jam Operasional </span><strong class="right">{{$hotel->jam_operasional}}</strong><br>
	        	<span class="left">Gambaran Umum </span><strong class="right">{{$hotel->gambaran_umum}}</strong><br>    	
	        	<span class="left">Website </span><strong class="right">{{$hotel->website}}</strong><br>
	        	{{-- <span class="left">Sumber </span><strong class="right">{{$hotel->sumber}}</strong><br> --}}
	        	</div>
        	<div class="margin-10"></div>
        	<div class="more-occurs">
	        	<span class="left">Alamat </span><strong class="right">{{$hotel->alamat}}</strong><br>	        		
	        	<span class="left">Koordinat </span><strong class="right">{{$hotel->koordinat}}</strong><br>	        		
        	</div>
	        </div>
    	</div>
      </div>
      <div class="modal-footer green-background-main-color">
        <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach

{{-- ============================================================================================================================================= --}}
@foreach($hotels as $hotel)
<div class="modal fade" id="modal-hapus-hotel-{{$hotel->id_hotel}}">
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
      	<form action="/sipp-kling/hapus-hotel/{{ $hotel->id_hotel }}" method="post">
	        <input type="submit" class="btn btn-danger" name="submit" value="YA">
	        {{ csrf_field() }}
	        <input type="hidden" name="_method" value="DELETE">

        <button type="button" class="btn pull-left" data-dismiss="modal">Tidak</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
{{-- ===========================================================================================================================--}}
<div class="modal fade" id="modal-tambah-hotel">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{ url('sipp-kling/input_hotel') }}">
      		{{ csrf_field() }}
      <div class="modal-header bg-aqua-active">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Tambah</h4>
      </div>
      <div class="modal-body overflow-hidden">
      		<div class="form-group">
      			<label for="pemilik">Nama</label>
      			<input type="text" id="pemilik" name="nama_tempat" class="form-control" placeholder="Ex. Hotel Bumi Langit" required></input>
      		</div>	
      		<div class="form-group">
      			<label for="alamat">Alamat</label>
      			<textarea class="form-control" name="alamat" placeholder="Ex. Jalan Raya" style="resize: none;height: 200px;"></textarea>
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
{{-- =================================================================================================================== --}}

{{-- Ini tabel Hotel --}}
				<div class="tab-pane" id="ttuhotel">
					<div class="table-responsive"></div>
					<div style="width: 100%;" class="overflow-hidden">
						<h4 class="box-title col-xs-6">DATA TPM - Hotel</h4>
						<button class="btn btn-flat green-main-color font-white col-xs-6" data-toggle="modal" data-target="#modal-tambah-hotel"><i class="fa fa-plus" style="font-size: 12px"></i> Tambah</button>
					</div>
					<div class="line-height-box-body"></div>
					<div class="table-responsive">
						<table class="table table-bordered table-hover example2" style="overflow-x:auto;width: 100%">
							<thead>
								<tr>
									<th>Nama Pemilik</th>
				  					<th style="display:none;">Kelurahan</th>                    
				  					<th>Alamat</th>                    
									<th>Nama Tempat</th>						
									<th>No Izin Usaha</th>
									<th>Status</th>
									<th style="display:none;">Sumber</th>
									<th>Total Nilai</th>
				  					<th style="display:none;">Jam Operasional</th>                    
				  					<th style="display:none;">Gambaran Umum</th>                    
				  					<th style="display:none;">Foto</th>                    
				  					<th style="display:none;">Website</th>                    
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($hotels as $hotel)
								<tr>
									<td>{{$hotel->nama_pemilik}}</td>
				  					<td style="display:none;">{{$hotel->kelurahan}}</td>            
				  					<td>{{$hotel->alamat}}</td>            
									<td>{{$hotel->nama_tempat}}</td>
									<td>{{$hotel->no_izin_usaha}}</td>
									<td>{{$hotel->status}}</td>
									<td style="display:none;">{{$hotel->sumber}}</td>
									<td>{{$hotel->total_nilai}}</td>
									<th style="display:none;">{{$hotel->jam_operasional}}</th>                    
				  					<th style="display:none;">{{$hotel->gambaran_umum}}</th>                    
				  					<th style="display:none;">{{$hotel->foto}}</th>                    
				  					<th style="display:none;">{{$hotel->website}}</th> 
									<td style="white-space: nowrap;" align="center">
										<button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-jasaboga-{{$hotel->id_hotel}}"><i class="ion-eye"></i></button>

										<button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus-jasaboga-{{$hotel->id_hotel}}"><i class="ion-ios-trash"></i></button>

									</td>
								</tr>
							@endforeach
						</tbody>
						</table>
					</div>
					<!-- /.box-body -->
				</div>
{{-- ========================================================================================================================================== --}}
{{-- HOTEL MELATI--}}

<div class="modal fade" id="modal-tambah-melati">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{ url('sipp-kling/input_melati') }}">
      		{{ csrf_field() }}
      <div class="modal-header bg-aqua-active">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Tambah</h4>
      </div>
      <div class="modal-body overflow-hidden">
      		<div class="form-group">
      			<label for="pemilik">Nama</label>
      			<input type="text" id="pemilik" name="nama_tempat" class="form-control" placeholder="Ex. Hotel Manis Malam" required></input>
      		</div>	
      		<div class="form-group">
      			<label for="alamat">Alamat</label>
      			<textarea class="form-control" name="alamat" placeholder="Ex. Jalan Raya" style="resize: none;height: 200px;"></textarea>
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
{{-- =================================================================================================================== --}}

{{-- Ini tabel Hotel Melati --}}
@foreach($hotel_melatis as $hotel_melati)
<div class="modal fade" id="modal-melati-{{$hotel_melati->id_hotel_melati}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header green-background-main-color">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Detail Data Tempat Hotel Melati</h4>
      </div>
      <div class="modal-body overflow-hidden">
      	<div class="col-xs-12 col-lg-5 no-padding">
	        <div class="images-modal">
	        	<img src="https://i2.wp.com/tutorialaplikasi.com/wp-content/uploads/2016/06/Meme-keren.jpg" alt="images" />
	        </div>
	        <div class="margin-10"></div>
	        <div class="more-occurs">
	        	<span class="left">Petugas </span><strong class="right">{{$hotel_melati->nama}}</strong><br>
	        	<span class="left">Status </span><strong class="right">{{$hotel_melati->status}}</i></strong><br>
	        	<span class="left">Skor Akhir </span><strong class="right">{{$hotel_melati->total_nilai}}</strong><br>
		        <span class="left">Update terakhir </span><strong class="right">{{$hotel_melati->waktu}}</strong><br> 	
	        </div>
    	</div>
    	<div class="col-xs-12 col-lg-7">
	        <div class="deskripsi-modal">
	        	<div class="bg-aqua-active box-keterangan padding-10">
		        <p class="text-center">
					<i class="fa fa-info-circle fa-2x"></i><br>
					<strong>Keterangan</strong>
				</p>
			</div>
        	<div class="more-occurs">
	        	<span class="left">Nama Pemilik </span><strong class="right">{{$hotel_melati->nama_pemilik}}</strong><br>
	        	<span class="left">Nama Hotel Melati </span><strong class="right">{{$hotel_melati->nama_tempat}}</strong><br>
	        	<span class="left">No Izin Usaha </span><strong class="right">{{$hotel_melati->no_izin_usaha}}</strong><br>
	        	<span class="left">Jumlah Karyawan </span><strong class="right">{{$hotel_melati->jumlah_karyawan}}</strong><br>
	        	<span class="left">No Telp </span><strong class="right">{{$hotel_melati->no_telp}}</strong><br>
	        	<span class="left">Jam Operasional </span><strong class="right">{{$hotel_melati->jam_operasional}}</strong><br>
	        	<span class="left">Gambaran Umum </span><strong class="right">{{$hotel_melati->gambaran_umum}}</strong><br>    	
	        	<span class="left">Website </span><strong class="right">{{$hotel_melati->website}}</strong><br>
	        	{{-- <span class="left">Sumber </span><strong class="right">{{$hotel_melati->sumber}}</strong><br> --}}
	        	</div>
        	<div class="margin-10"></div>
        	<div class="more-occurs">
	        	<span class="left">Alamat </span><strong class="right">{{$hotel_melati->alamat}}</strong><br>	        		
	        	<span class="left">Koordinat </span><strong class="right">{{$hotel_melati->koordinat}}</strong><br>	        		
        	</div>
	        </div>
    	</div>
      </div>
      <div class="modal-footer green-background-main-color">
        <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach

{{-- ============================================================================================================================================= --}}
@foreach($hotel_melatis as $hotel_melati)
<div class="modal fade" id="modal-hapus-melati-{{$hotel_melati->id_hotel_melati}}">
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
      	<form action="/sipp-kling/hapus-melati/{{ $hotel_melati->id_hotel_melati }}" method="post">
	        <input type="submit" class="btn btn-danger" name="submit" value="YA">
	        {{ csrf_field() }}
	        <input type="hidden" name="_method" value="DELETE">

        <button type="button" class="btn pull-left" data-dismiss="modal">Tidak</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
{{-- ===========================================================================================================================--}}
				<div class="tab-pane" id="ttuhm">
					<div class="table-responsive"></div>
					<div style="width: 100%;" class="overflow-hidden">
						<h4 class="box-title col-xs-6">DATA TPM - Hotel Melati</h4>
						<button class="btn btn-flat green-main-color font-white col-xs-6" data-toggle="modal" data-target="#modal-tambah-melati"><i class="fa fa-plus" style="font-size: 12px"></i> Tambah</button>
					</div>
					<div class="line-height-box-body"></div>
					<div class="table-responsive">
						<table class="table table-bordered table-hover example2" style="overflow-x:auto;width: 100%">
							<thead>
								<tr>
									<th>Nama Pemilik</th>
				  					<th style="display:none;">Kelurahan</th>                    
				  					<th>Alamat</th>                    
									<th>Nama Tempat</th>						
									<th>No Izin Usaha</th>
									<th>Status</th>
									<th style="display:none;">Sumber</th>
									<th>Total Nilai</th>
				  					<th style="display:none;">Jam Operasional</th>                    
				  					<th style="display:none;">Gambaran Umum</th>                    
				  					<th style="display:none;">Foto</th>                    
				  					<th style="display:none;">Website</th>                  
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($hotel_melatis as $hotel_melati)
								<tr>
									<td>{{$hotel_melati->nama_pemilik}}</td>
				  					<td style="display:none;">{{$hotel_melati->kelurahan}}</td>            
				  					<td>{{$hotel_melati->alamat}}</td>            
									<td>{{$hotel_melati->nama_tempat}}</td>
									<td>{{$hotel_melati->no_izin_usaha}}</td>
									<td>{{$hotel_melati->status}}</td>
									<td style="display:none;">{{$hotel_melati->sumber}}</td>
									<td>{{$hotel_melati->total_nilai}}</td>
									<th style="display:none;">{{$hotel_melati->jam_operasional}}</th>                    
				  					<th style="display:none;">{{$hotel_melati->gambaran_umum}}</th>                    
				  					<th style="display:none;">{{$hotel_melati->foto}}</th>                    
				  					<th style="display:none;">{{$hotel_melati->website}}</th>  
									<td style="white-space: nowrap;" align="center">
										<button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-melati-{{$hotel_melati->id_hotel_melati}}"><i class="ion-eye"></i></button>

										<button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus-melati-{{$hotel_melati->id_hotel_melati}}"><i class="ion-ios-trash"></i></button>

									</td>
								</tr>
							@endforeach
						</tbody>
						</table>
					</div>
					<!-- /.box-body -->
				</div>
{{-- ========================================================================================================================================== --}}
{{-- PKL --}}

@foreach($pkls as $pkl)
<div class="modal fade" id="modal-pkl-{{$pkl->id_pelayanan_kesling}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header green-background-main-color">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Detail Data Pelayanan Kesling</h4>
      </div>
      <div class="modal-body overflow-hidden">
      	<div class="col-xs-12 col-lg-5 no-padding">
	        <div class="images-modal">
	        	<img src="https://i2.wp.com/tutorialaplikasi.com/wp-content/uploads/2016/06/Meme-keren.jpg" alt="images" />
	        </div>
	        <div class="margin-10"></div>
	        <div class="more-occurs">
	        	<span class="left">Petugas </span><strong class="right">{{$pkl->nama}}</strong><br>
	        	{{-- <span class="left">Status </span><strong class="right">{{$pkl->status}}</i></strong><br> --}}
	        	{{-- <span class="left">Skor Akhir </span><strong class="right">{{$pkl->total_nilai}}</strong><br> --}}
		        <span class="left">Update terakhir </span><strong class="right">{{$pkl->waktu}}</strong><br> 	
	        </div>
    	</div>
    	<div class="col-xs-12 col-lg-7">
	        <div class="deskripsi-modal">
	        	<div class="bg-aqua-active box-keterangan padding-10">
		        <p class="text-center">
					<i class="fa fa-info-circle fa-2x"></i><br>
					<strong>Keterangan</strong>
				</p>
			</div>
        	<div class="more-occurs">
	        	<span class="left">Nama</span><strong class="right">{{$pkl->nama_pkl}}</strong><br>
	        	<span class="left">Umur </span><strong class="right">{{$pkl->umur}}</strong><br>
	        	<span class="left">Jenis Kelamin </span><strong class="right">{{$pkl->jenis_kelamin}}</strong><br>
	        	<span class="left">Nama Tempat </span><strong class="right">{{$pkl->nama_tempat}}</strong><br>
	        	<span class="left">Jenis </span><strong class="right">{{$pkl->jenis}}</strong><br>
	        	{{-- <span class="left">No Telp </span><strong class="right">{{$pkl->no_telp}}</strong><br>
	        	<span class="left">Jam Operasional </span><strong class="right">{{$pkl->jam_operasional}}</strong><br>
	        	<span class="left">Gambaran Umum </span><strong class="right">{{$pkl->gambaran_umum}}</strong><br>    	
	        	<span class="left">Website </span><strong class="right">{{$pkl->website}}</strong><br> --}}
	        	{{-- <span class="left">Sumber </span><strong class="right">{{$pkl->sumber}}</strong><br> --}}
	        	</div>
        	<div class="margin-10"></div>
        	<div class="more-occurs">
	        	<span class="left">Alamat </span><strong class="right">{{$pkl->alamat}}</strong><br>	        		
	        	<span class="left">Koordinat </span><strong class="right">{{$pkl->koordinat}}</strong><br>	        		
        	</div>
	        </div>
    	</div>
      </div>
      <div class="modal-footer green-background-main-color">
        <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach

{{-- ============================================================================================================================================= --}}
@foreach($pkls as $pkl)
<div class="modal fade" id="modal-hapus-pkl-{{$pkl->id_pelayanan_kesling}}">
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
      	<form action="/sipp-kling/hapus-pkl/{{ $pkl->id_pelayanan_kesling }}" method="post">
	        <input type="submit" class="btn btn-danger" name="submit" value="YA">
	        {{ csrf_field() }}
	        <input type="hidden" name="_method" value="DELETE">

        <button type="button" class="btn pull-left" data-dismiss="modal">Tidak</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
{{-- ============================================================================================================================================= --}}


<div class="modal fade" id="modal-tambah-pkl">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{ url('sipp-kling/input_pkl') }}">
      		{{ csrf_field() }}
      <div class="modal-header bg-aqua-active">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Tambah</h4>
      </div>
      <div class="modal-body overflow-hidden">
      		<div class="form-group">
      			<label for="pemilik">Nama</label>
      			<input type="text" id="pemilik" name="nama_tempat" class="form-control" placeholder="Ex. NASITI" required></input>
      		</div>	
      		<div class="form-group">
      			<label for="alamat">Alamat</label>
      			<textarea class="form-control" name="alamat" placeholder="Ex. Jalan Raya" style="resize: none;height: 200px;"></textarea>
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
{{-- ================================================================================================================== --}}

				<div class="tab-pane" id="pkl">
					<div class="table-responsive"></div>
					<div style="width: 100%;" class="overflow-hidden">
						<h4 class="box-title col-xs-6">DATA TPM - PELAYANAN KESLING</h4>
						<button class="btn btn-flat green-main-color font-white col-xs-6" data-toggle="modal" data-target="#modal-tambah-pkl"><i class="fa fa-plus" style="font-size: 12px"></i> Tambah</button>
					</div>
					<div class="line-height-box-body"></div>
					<div class="table-responsive">
						<table class="table table-bordered table-hover example2" style="overflow-x:auto;width: 100%">
							<thead>
								<tr>
									<th>Nama</th>
									<th>Jenis Kelamin</th>
									<th>Umur</th>
									<th>Nama Tempat</th>						
				  					<th>Kelurahan</th>                    
				  					<th style="display:none;">Alamat</th>                    
									<th>Jenis</th>
									<th>Kasus</th>
									                    
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($pkls as $pkl)
								<tr>
									<td>{{$pkl->nama_pkl}}</td>
									<td>{{$pkl->jenis_kelamin}}</td>
									<td>{{$pkl->umur}}</td>
									<td>{{$pkl->nama_tempat}}</td>
				  					<td>{{$pkl->kelurahan}}</td>            
				  					<td style="display:none;">{{$pkl->alamat}}</td>            
									<td>{{$pkl->jenis}}</td>
									<td>{{$pkl->kasus}}</td>
									
									<td style="white-space: nowrap;" align="center">
										<button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-pkl-{{$pkl->id_pelayanan_kesling}}"><i class="ion-eye"></i></button>

										<button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus-pkl-{{$pkl->id_pelayanan_kesling}}"><i class="ion-ios-trash"></i></button>

									</td>
								</tr>
							@endforeach
						</tbody>
						</table>
					</div>
					<!-- /.box-body -->
				</div>
{{-- ========================================================================================================================================== --}}

				<!-- /.box -->
			</div>
		</div>
	</section>
	@endsection