@extends('layouts.app')

@section('content')


<section class="content-header">
      <h1>
        ADMIN
        <small class="pull-right">21 Agustus 2017 10:45</small>
      </h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
           		<li class="active"><a href="#submit" data-toggle="tab">Tambah Data</a></li>
              	<li><a href="/adminopd">Data</a></li>
            </ul>
            <div class="box-body border-radius-none">
              <div class="tab-content">
                <div class="tab-pane active" id="submit">     
                  <div class="box-body">
                        <div class="box-header with-border">
                          <div class="col-md-12">
                              <form action="import_adminopd" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                                <button type="button" class="btn btn-file btn-flat" style="background-color: black; color:white">Import Data<input type="file" name="csv_file"></button>
                                <button type="submit" class="btn btn-flat" data-dismiss="modal"><i class="ion ion-checkmark"></i></button>
                              </form>
                              <label style="font-size: 12px">Import Melalui Excel (.csv)</label>
                          </div> 
                        </div>
                  </div>
                  
                    {!! Form::open(['action' => 'AdminopdController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                  <div class="box-body">
                    <div class="box-header with-border">
                      <div class="row">
                        <div class="col-md-12" style="padding: 1%">
                          <div class="box-body">
                            <div class="row content">
                              <div class="row" style="margin-bottom:10px">
                                <div class="col-md-3">
                                  <label>NIP</label>
                                </div>
                                <div class="col-md-9">
                                  <input type="number" class="form-control" name="nip" placeholder="195808161258467895" width="50%">
                                </div>
                              </div>
                              
                              <div class="row" style="margin-bottom:10px">
                                <div class="col-md-3">
                                  <label>OPD</label>
                                </div>
                                <div class="col-md-9">
                                  <select class="form-control" name="nama_opd">
                                    <option value="Sekretariat daerah">Sekretariat daerah</option>
                                    <option value="Sekretariat DPRD">Sekretariat DPRD</option>
                                    <option value="Badan Kepegawaian dan Pengembangan Sumber Daya Manusia">Badan Kepegawaian dan Pengembangan Sumber Daya Manusia</option>
                                    <option value="Badan Keuangan Daerah">Badan Keuangan Daerah</option>
                                    <option value="Badan Perencanaan Pembangunan dan Penelitian Pengembangan Daerah">Badan Perencanaan Pembangunan dan Penelitian Pengembangan Daerah</option>
                                    <option value="Dinas Kearsipan dan Perpustakaan">Dinas Kearsipan dan Perpustakaan</option>
                                    <option value="Dinas Kependudukan dan Pencatatan Sipil">Dinas Kependudukan dan Pencatatan Sipil</option>
                                    <option value="Dinas Ketahanan Pangan, Pertanian dan Perikanan">Dinas Ketahanan Pangan, Pertanian dan Perikanan</option>
                                    <option value="Dinas Komunikasi dan Informatika">Dinas Komunikasi dan Informatika</option>
                                    <option value="Dinas Koperasi dan Usaha Mikro">Dinas Koperasi dan Usaha Mikro</option>
                                    <option value="Dinas Lingkungan Hidup dan Kebersihan">Dinas Lingkungan Hidup dan Kebersihan</option>
                                    <option value="Dinas Pekerjaan Umum dan Penataan Ruang">Dinas Pekerjaan Umum dan Penataan Ruang</option>
                                    <option value="Dinas Pemadam Kebakaran dan Penyelamatan">Dinas Pemadam Kebakaran dan Penyelamatan</option>
                                    <option value="Dinas Pemuda, Olahraga, Kebudayaan dan Pariwisata">Dinas Pemuda, Olahraga, Kebudayaan dan Pariwisata</option>
                                    <option value="Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu">Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu</option>
                                    <option value="Dinas Pendidikan">Dinas Pendidikan</option>
                                    <option value="Dinas Perdagangan dan Perindustrian">Dinas Perdagangan dan Perindustrian</option>
                                    <option value="Dinas Perhubungan">Dinas Perhubungan</option>
                                    <option value="Dinas Perlindungan Anak, Pemberdayaan Masyarakat dan Keluarga">Dinas Perlindungan Anak, Pemberdayaan Masyarakat dan Keluarga</option>
                                    <option value="Dinas Perumahan dan Pemukiman">Dinas Perumahan dan Pemukiman</option>
                                    <option value="Dinas Sosial">Dinas Sosial</option>
                                    <option value="Dinas Tenaga Kerja">Dinas Tenaga Kerja</option>
                                    <option value="Satuan Polisi Pamong Praja">Satuan Polisi Pamong Praja</option>
                                  </select>
                                </div>
                              </div>
                              
                              <div class="row" style="margin-bottom:10px">
                                <div class="col-md-3">
                                  <label>Alamat</label>
                                </div>
                                <div class="col-md-9">
                                  <textarea class="form-control" rows="3" name="alamat" placeholder="Beji Timur"></textarea>
                                </div>
                              </div>
                              <div class="row" style="margin-bottom:10px">
                                <div class="col-md-3">
                                  <label>Nomor Telepon</label>
                                </div>
                                <div class="col-md-9">
                                  <input type="number" class="form-control" name="no_telp" placeholder="085745896521" width="50%">
                                </div>
                              </div>
                              <div class="row" style="margin-bottom:10px">
                                <div class="col-md-3">
                                  <label>Email</label>
                                </div>
                                <div class="col-md-9">
                                  <input type="email" class="form-control" name="email" placeholder="tegar96@gmail.com" width="50%">
                                </div>
                              </div>
                              <div class="row" style="margin-bottom:10px">
                                <div class="col-md-3">
                                  <label>Username</label>
                                </div>
                                <div class="col-md-9">
                                  <input type="text" class="form-control" name="username_opd" placeholder="tegar96" width="50%">
                                </div>
                              </div>
                              <div class="row" style="margin-bottom:10px">
                                <div class="col-md-3">
                                  <label>Password</label>
                                </div>
                                <div class="col-md-9">
                                  <input type="password" class="form-control" name="password_opd" placeholder="tegar1996" width="50%">
                                </div>
                              </div>
                              
                              <div class="row" style="margin-bottom:10px">
                                <div class="col-md-3">
                                  <label>Foto</label>
                                </div>

                              </div>
                            </div>
                          </div>
                          <div class="box-footer pull-right">
                            <div class="box-header with-border">
                              <button type="submit" class="btn btn-flat" style="width:100px; background-color: black; color:white">Submit</button>
                            </div>
                          </div>
                          {!! Form::close() !!}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


            </div>
          </div>
        </div>
      </div>
    </section>


<!-- page script -->
{{-- <script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script> --}}



@endsection