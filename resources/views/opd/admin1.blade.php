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
           		<li class="active"><a href="#data" data-toggle="tab">Data</a></li>
              	<li><a href="/dataadmin2">Tambah data</a></li>
            </ul>
            <div class="box-body border-radius-none">
              <div class="tab-content">
                <div class="tab-pane active" id="submit">     
                  <div class="box-body">
                        <div class="box-header with-border">
                          <div class="col-md-12">
                              <form action="import_apotek" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                                <button type="button" class="btn btn-file btn-flat" style="background-color: black; color:white">Import Data<input type="file" name="csv_file"></button>
                                <button type="submit" class="btn btn-flat" data-dismiss="modal"><i class="ion ion-checkmark"></i></button>
                              </form>
                              <label style="font-size: 12px">Import Melalui Excel (.csv)</label>
                          </div> 
                        </div>
                  </div>
                  
                    {!! Form::open(['action' => 'ApotekController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

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
                                  <label>Nama</label>
                                </div>
                                <div class="col-md-9">
                                  <input type="text" class="form-control" name="nama_peraih" placeholder="Tegar" width="50%">
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
                                  <input type="number" class="form-control" name="nomor_telp" placeholder="085745896521" width="50%">
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
                                  <input type="text" class="form-control" name="username" placeholder="tegar96" width="50%">
                                </div>
                              </div>
                              <div class="row" style="margin-bottom:10px">
                                <div class="col-md-3">
                                  <label>Password</label>
                                </div>
                                <div class="col-md-9">
                                  <input type="password" class="form-control" name="password" placeholder="tegar1996" width="50%">
                                </div>
                              </div>
                              <div class="row" style="margin-bottom:10px">
                                <div class="col-md-3">
                                  <label>OPD</label>
                                </div>
                                <div class="col-md-9">
                                  <select class="form-control" name="opd">
                                    <option>Sekretariat daerah</option>
                                    <option>Sekretariat DPRD</option>
                                    <option>Badan Kepegawaian dan Pengembangan Sumber Daya Manusia</option>
                                    <option>Badan Keuangan Daerah</option>
                                    <option>Badan Perencanaan Pembangunan dan Penelitian Pengembangan Daerah</option>
                                    <option>Dinas Kearsipan dan Perpustakaan</option>
                                    <option>Dinas Kependudukan dan Pencatatan Sipil</option>
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
                                    <option>Dinas Perumahan dan Pemukiman</option>
                                    <option>Dinas Sosial</option>
                                    <option>Dinas Tenaga Kerja</option>
                                    <option>Satuan Polisi Pamong Praja</option>
                                  </select>
                                </div>
                              </div>
                              <div class="row" style="margin-bottom:10px">
                                <div class="col-md-3">
                                  <label>Foto</label>
                                </div>
                                <div class="col-md-9">
                                  <div class="btn btn-default btn-flat btn-file" style="width:100px;">Upload 
                                      {{Form::file('foto')}}
                                  </div>
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

                <div class="tab-pane" id="data">
                <div class="box-body">
                        <div class="box-header with-border">
                          <div class="col-md-12">
                              <form action="import_apotek" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                                <button type="button" class="btn btn-file btn-flat" style="background-color: black; color:white">Import Data<input type="file" name="csv_file"></button>
                                <button type="submit" class="btn btn-flat" data-dismiss="modal"><i class="ion ion-checkmark"></i></button>
                              </form>
                              <label style="font-size: 12px">Import Melalui Excel (.csv)</label>
                          </div> 
                        </div>
                  </div>
                  <div class="box-body">
                  <div class="box-header with-border">
                  <div class="row">
                  <div class="col-md-12" style="padding-right:1%; padding-left: 1%">
                  <div class="box-body">
                  
                  
                  <div style="overflow-x: auto">
                    <table id="example" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th nowrap>NIP</th>
                        <th nowrap>Nama</th>
                        <th nowrap>Alamat</th>
                        <th nowrap>Nomor Telepom</th>
                        <th nowrap>Email</th>
                        <th nowrap>Username</th>
                        <th nowrap>Password</th>
                        <th nowrap>OPD</th>
                        <th nowrap></th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td nowrap>1958081612588467895</td>
                        <td nowrap>Tegar</td>
                        <td nowrap>Beji Timur</td>
                        <td nowrap>085745896521</td>
                        <td nowrap>tegar96@gmail.com</td>
                        <td nowrap>tegar96</td>
                        <td nowrap>*********</td>
                        <td nowrap>Dinas Komunikasi dan Informatika</td>
                        <td nowrap>
                          <a href="lihatadmin" target="_blank" style="text-decoration: none"><button class="btn btn_flat"><i class="ion-eye"></i></button></a>
                          <button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus"><i class="ion-ios-trash"></i></button>
                        </td>  
                      </tr>
                      </tbody>
                    </table>

                    <div class="modal fade" id="modal-lihat">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" align="center"><b>LIHAT</b></h4>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-sm-12 border-right">
                                <div class="description-block">
                                  <img src="dist/img/photo2.png" width="100%">
                                </div>
                              </div>
                              <div class="col-sm-12 border-right">
                                <div class="description-block">
                                  <h5 class="description-header">NIP</h5>
                                  <span>1958081612588467895</span>
                                </div>
                              </div>
                              <div class="col-sm-12 border-right">
                                <div class="description-block">
                                  <h5 class="description-header">NAMA</h5>
                                  <span>Tegar</span>
                                </div>
                              </div>
                              <div class="col-sm-12 border-right">
                                <div class="description-block">
                                  <h5 class="description-header">ALAMAT</h5>
                                  <span>Beji Timur</span>
                                </div>
                              </div>
                              <div class="col-sm-12 border-right">
                                <div class="description-block">
                                  <h5 class="description-header">NOMOR TELEPON</h5>
                                  <span>085745896521</span>
                                </div>
                              </div>
                              <div class="col-sm-12 border-right">
                                <div class="description-block">
                                  <h5 class="description-header">EMAIL</h5>
                                  <span>tegar96@gmail.com</span>
                                </div>
                              </div>
                              <div class="col-sm-12 border-right">
                                <div class="description-block">
                                  <h5 class="description-header">USERNAME</h5>
                                  <span>tagar96</span>
                                </div>
                              </div>
                              <div class="col-sm-12 border-right">
                                <div class="description-block">
                                  <h5 class="description-header">OPD</h5>
                                  <span>Dinas Komunikasi dan Informatika</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal fade" id="modal-hapus">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><center><b>HAPUS</b></center></h4>
                          </div>
                          <div class="modal-body"><center>
                            <p>Apakah Anda yakin akan menghapus data ini?</p></center>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Ya</button>
                            <button type="button" class="btn btn-primary btn-flat" data-dismiss="modal">Tidak</button>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>

                  </div>
                  </div>
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


<!-- jQuery 2.2.0 -->
<script src="../../plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
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
</script>



@endsection