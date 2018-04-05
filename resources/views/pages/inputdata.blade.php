

@extends('layouts.app')
@section('content')

    <section class="content-header">
      <h1 style="color:#807e7d"> 
       <b>INPUT DATA UMUM</b>       
      </h1>     
    </section>

    <section class="content">
      <div class="row">
        
        <div class="col-md-6">

          <!--<div class="box box-primary">
            <div class="box-header with-border">
              <span class="info-box-icon" style="background-color: white"><i class="ion ion-ios-bookmarks-outline"></i></span>
              <div class="info-box-content">
                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Ensiklopedia</h4></span>
              </div>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
              </div>
            </div>

            <div class="box-body">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nama Penyakit"></input>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <textarea class="form-control" rows="3" placeholder="Gambaran Umum"></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <textarea class="form-control" rows="3" placeholder="Gejala"></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <textarea class="form-control" rows="3" placeholder="Perawatan"></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <textarea class="form-control" rows="3" placeholder="Konsul Dokter"></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <textarea class="form-control" rows="3" placeholder="Diagnosa"></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <textarea class="form-control" rows="3" placeholder="Faktor Risiko"></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <textarea class="form-control" rows="3" placeholder="Pengobatan"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>>
              </div>
            </div>
          </div>box box primary-->


          <div class="box box-success">
            <div class="box-header with-border">
              <span class="info-box-icon" style="background-color: white"><i class="ion ion-ios-paper-outline"></i></span>
              <div class="info-box-content">
                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Blog</h4></span>
              </div>
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </div>
            </div>
            <div class="box-body pad">
              {!! Form::open(['action' => 'BlogController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" width="50%">
                <br>
                <div class="form-group">
                  {{Form::textarea('isi', '',['id' => 'ckeditor', 'class' => 'form-control', 'placeholder'=>'Isi Text'])}}
                </div>
                <br>
                <div class="form-group">
                  {{Form::file('image')}}
                </div>
                <br>
                <input type="submit" class="btn btn-success" name="Submit" value="Submit">
              {!! Form::close() !!}

              <form action="import_csv_file" method="post" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
              </p>
              </form>
            </div>
          </div>

           <div class="box box-danger">
            <div class="box-header with-border">
               <span class="info-box-icon" style="background-color: white"><i class="ion ion-ios-mic-outline"></i></span>
              <div class="info-box-content">
                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Broadcast</h4></span>
              </div>
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> 
              </div>
            </div>
            <div class="box-body pad">
              {!! Form::open(['action' => 'BroadcastController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <input type="text" class="form-control" name="judul" placeholder="Judul" width="50%"><br>
                 <div class="form-group">
                  <label>Pengirim</label>
                  <select class="form-control" name="pengirim">
                    <option value="Pemkot Depok">Pemerintah Kota Depok</option>
                    <option value="Diskominfo">Dinas Komunikasi dan Informatika</option>
                    <option value="Dinas Kesehatan">Dinas Kesehatan</option>
                    <option value="Dinas Pendidikan">Dinas Pendidikan </option>
                  </select>
                </div>
                <textarea class="textarea" name="deskripsi" placeholder="Deskripsi Broadcast" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                </textarea>
                <div class="box-footer">
                  <button type="submit" class="btn btn-danger">Submit</button>
                </div>
             {!! Form::close() !!}
            </div>
          </div>

        </div><!--col-md-6-->


        <div class="col-md-6">
          
          <div class="box box-warning">
            <div class="box-header with-border">
               <span class="info-box-icon" style="background-color: white"><i class="ion ion-ios-calendar-outline"></i></span>
              <div class="info-box-content">
                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Event</h4></span>
              </div>
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> 
              </div>
            </div>
            <div class="box-body pad">
              {!! Form::open(['action' => 'EventController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Judul" width="50%" name="nama_event"><br>
                <input type="text" class="form-control" name="penyelenggara" placeholder="Penyelenggara" width="50%"><br>
                <input type="text" class="form-control" name="lokasi_event" placeholder="Tempat Penyeleggaran" width="50%">
                <label>Date start:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right datepicker"  name="tgl_mulai">
                </div>
                <label>Date start:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right datepicker" name="tgl_akhir">
                </div>
                <br>
                <div class="form-group">
                  {{Form::file('image_event')}}
                </div>
                <div class="form-group">
                  {{Form::textarea('deskripsi_event', '',['id'=> 'ckeditor', 'class' => 'form-control', 'placeholder'=>'Deskripsi Event'])}}
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-warning">Submit</button>
                </div>
              {!! Form::close() !!}
            </div>
          </div>

         

        </div><!--col-md-6-->
      
      </div><!--row-->

    </section>



@endsection



