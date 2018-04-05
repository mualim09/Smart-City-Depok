@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
       PARTNER
       <small class="pull-right">21 Agustus 2017 10:45</small>
      </h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-default removable-box">            
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
                              <th nowrap>Nama Partner</th>
                              <th nowrap>Kategori</th>
                              <th nowrap></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td nowrap>Partner 1</td>
                              <td nowrap>Apotek</td>
                              <td nowrap>
                                <a href="lihatpartner" target="_blank" style="text-decoration: none"><button class="btn btn_flat"><i class="ion-eye"></i></button></a>
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