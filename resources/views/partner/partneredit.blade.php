@extends('layouts.app')

@section('content')

<section class="content-header">
  <h1 style="color:#807e7d">
  <b>EDIT PARTNER</b>
        <small class="pull-right">21 Agustus 2017 10:45</small>
    </h1>
</section>

<section class="content">
<div class="box box-widget">
  <div class="box-body" style="background-color: white">
    <div class="box-body">
      <div class="col-md-6 content">
        <center>
          <img class="img-responsive" src="../../dist/img/user4-128x128.jpg" width="80%">
          <br>
          <div class="btn btn-default btn-flat btn-file" style="width:100px; background-color: black; color:white">GANTI FOTO
            {{Form::file('foto')}}
          </div>
        </center>
      </div>
      <div class="col-md-6 content">
        <h5 class="description-header"><b>USERNAME</b></h5>
        <input type="text" class="form-control" placeholder="19589641 191258 7 005" width="80%">

        <h5 class="description-header"><b>EMAIL</b></h5>
        <input type="email" class="form-control" placeholder="19589641 191258 7 005" width="80%">

        <h5 class="description-header"><b>NIP</b></h5>
        <input type="number" class="form-control" placeholder="19589641 191258 7 005" width="80%">

        <h5 class="description-header"><b>OPD</b></h5>
        <div class="form-group">
          <select class="form-control">
            <option>Sekretariat Daerah</option>
            <option>Sekretariat DPRD</option>
            <option>Badan Kepegawaian dan Pengembangan Sumber Daya Manusia</option>
            <option>Badan Keuangan Daerah</option>
            <option>Badan Perencanaan Pembangunan dan Penelitian Pengembangan Daerah</option>
            <option>Dinas Kearsipan dan Perpustakaan</option>
            <option>Dinas Kependudukan dan Pencatatan Sipil</option>
            <option>Dinas Kesehatan</option>
            <option>Dinas Ketahanan Pangan, Pertanian dan Perikanan</option>
            <option>Dinas Komunikasi dan Informatika</option>
            <option>Dinas Koperasi dan Usaha Mikro</option>
            <option>Dinas Lingkungan Hidup dan Kebersihan</option>
            <option>Dinas Pekerjaan Umum dan Penataan Ruang</option>
            <option>Dinas Pemadam Kebakaran dan Penyelamatan</option>
            <option>Dinas Pemuda, Olahraga, Kebudayaan dan Pariwisata</option>
            <option>Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu</option>
            <option>Dinas Pendidikan</option>
            <option>Dinas Perdagangan dan Perindustrian</option>
            <option>Dinas Perhubungan</option>
            <option>Dinas Perlindungan Anak, Pemberdayaan Masyarakat dan Keluarga</option>
            <option>Dinas Perumahan dan Permukiman</option>
            <option>Dinas Sosial</option>
            <option>Dinas Tenaga Kerja</option>
            <option>Inspektorat Daerah</option>
            <option>Kantor Kesatuan Bangsa dan Politik</option>
            <option>Kecamatan Beji</option>
            <option>Kecamatan Bojongsari</option>
            <option>Kecamatan Cilodong</option>
            <option>Kecamatan Cimanggis</option>
            <option>Kecamatan Cinere</option>
            <option>Kecamatan Cipayung</option>
            <option>Kecamatan Limo</option>
            <option>Kecamatan Pancoran Mas</option>
            <option>Kecamatan Sawangan</option>
            <option>Kecamatan Sukmajaya</option>
            <option>Kecamatan Tapos</option>
            <option>Rumah Sakit Umum Daerah</option>
            <option>Satuan Polisi Pamong  Praja</option>
          </select>
        </div>

        <h5 class="description-header"><b>NOMOR TELEPON</b></h5>
        <input type="number" class="form-control" placeholder="085746952841">

        <h5 class="description-header"><b>ALAMAT</b></h5>
        <textarea class="form-control" rows="3" placeholder="Beji Timur"></textarea>
      </div>
      <div class="box-footer">
        <div class="col-md-2 pull-right">
          <a href="#" class="btn btn-block btn-flat" style="width: 100%; background-color: black; color: white"><b>EDIT</b></a>
        </div>
      </div>
    </div>
  </div>

</section>

@endsection
