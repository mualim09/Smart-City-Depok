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
          <option value="{{ url('sipp-kling/dashboard-utama') }}" selected="selected">Dashboard Utama</option>
          <option value="{{ url('sipp-kling/dashboard-tabel') }}">Dashboard Tabel</option>
          <option value="{{ url('sipp-kling/dashboard-grafik-waktu') }}">Dashboard Grafik Waktu</option>
          <option value="{{ url('sipp-kling/dashboard-map') }}">Dashboard Map</option>
        </select>
      </div>
      <div class="col-xs-12 no-padding">
        <form class="form" role="search" method="post" action="{{ url('sipp-kling/filter') }}">
          {{ csrf_field() }}
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

<!-- modal -->
<div class="modal fade" id="rumahsehat">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-aqua">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Detail RW</h4>
      </div>
      <div class="modal-body overflow-hidden">
        <div class="col-xs-12 no-padding">
          <strong>Total</strong>
          <h2 class="reset-heading">{{$sehattpilih}}</h2>
          <div class="margin-10"></div>
          <hr/>
          <div class="margin-10"></div>
          <div class="more-occurs overflow-hidden">
           <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 01 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sehattpilihrw1}}</b></span><br>

              <span class="progress-text">RW 02 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sehattpilihrw2}}</b></span><br>
            
              <span class="progress-text">RW 03 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sehattpilihrw3}}</b></span><br>
            
              <span class="progress-text">RW 04 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sehattpilihrw4}}</b></span><br>

              <span class="progress-text">RW 05 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sehattpilihrw5}}</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 06 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sehattpilihrw6}}</b></span><br>

              <span class="progress-text">RW 07 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sehattpilihrw7}}</b></span><br>
            
              <span class="progress-text">RW 08 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sehattpilihrw8}}</b></span><br>
            
              <span class="progress-text">RW 09 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sehattpilihrw9}}</b></span><br>

              <span class="progress-text">RW 10 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sehattpilihrw10}}</b></span><br>
            </div>



            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 11 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sehattpilihrw11}}</b></span><br>

              <span class="progress-text">RW 12 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sehattpilihrw12}}</b></span><br>
            
              <span class="progress-text">RW 13 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sehattpilihrw13}}</b></span><br>
            
              <span class="progress-text">RW 14 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sehattpilihrw14}}</b></span><br>

              <span class="progress-text">RW 15 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sehattpilihrw15}}</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 16 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sehattpilihrw16}}</b></span><br>

              <span class="progress-text">RW 17 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sehattpilihrw17}}</b></span><br>
            
              <span class="progress-text">RW 18 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sehattpilihrw18}}</b></span><br>
            
              <span class="progress-text">RW 19 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sehattpilihrw19}}</b></span><br>

              <span class="progress-text">RW 20 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sehattpilihrw20}}</b></span><br>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Tutup</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="rumahtsehat">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-aqua">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Detail RW</h4>
      </div>
      <div class="modal-body overflow-hidden">
        <div class="col-xs-12 no-padding">
          <strong>Total</strong>
          <h2 class="reset-heading">{{$rumahtsehat}}</h2>
          <div class="margin-10"></div>
          <hr/>
          <div class="margin-10"></div>
          <div class="more-occurs overflow-hidden">
           <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 01 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$rumahtsehatrw1}}</b></span><br>

              <span class="progress-text">RW 02 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$rumahtsehatrw2}}</b></span><br>
            
              <span class="progress-text">RW 03 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$rumahtsehatrw3}}</b></span><br>
            
              <span class="progress-text">RW 04 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$rumahtsehatrw4}}</b></span><br>

              <span class="progress-text">RW 05 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$rumahtsehatrw5}}</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 06 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$rumahtsehatrw6}}</b></span><br>

              <span class="progress-text">RW 07 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$rumahtsehatrw7}}</b></span><br>
            
              <span class="progress-text">RW 08 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$rumahtsehatrw8}}</b></span><br>
            
              <span class="progress-text">RW 09 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$rumahtsehatrw9}}</b></span><br>

              <span class="progress-text">RW 10 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$rumahtsehatrw10}}</b></span><br>
            </div>



            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 11 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$rumahtsehatrw11}}</b></span><br>

              <span class="progress-text">RW 12 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$rumahtsehatrw12}}</b></span><br>
            
              <span class="progress-text">RW 13 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$rumahtsehatrw13}}</b></span><br>
            
              <span class="progress-text">RW 14 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$rumahtsehatrw14}}</b></span><br>

              <span class="progress-text">RW 15 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$rumahtsehatrw15}}</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 16 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$rumahtsehatrw16}}</b></span><br>

              <span class="progress-text">RW 17 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$rumahtsehatrw17}}</b></span><br>
            
              <span class="progress-text">RW 18 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$rumahtsehatrw18}}</b></span><br>
            
              <span class="progress-text">RW 19 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$rumahtsehatrw19}}</b></span><br>

              <span class="progress-text">RW 20 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$rumahtsehatrw20}}</b></span><br>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Tutup</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<!-- ================================================================================================================================ -->


<div class="modal fade" id="spal_terbuka">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-aqua">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Detail RW</h4>
      </div>
      <div class="modal-body overflow-hidden">
        <div class="col-xs-12 no-padding">
          <strong>Total</strong>
          <h2 class="reset-heading">{{$spaltb}}</h2>
          <div class="margin-10"></div>
          <hr/>
          <div class="margin-10"></div>
          <div class="more-occurs overflow-hidden">
            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 01 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltbrw1}}</b></span><br>

              <span class="progress-text">RW 02 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltbrw2}}</b></span><br>
            
              <span class="progress-text">RW 03 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltbrw3}}</b></span><br>
            
              <span class="progress-text">RW 04 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltbrw4}}</b></span><br>

              <span class="progress-text">RW 05 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltbrw5}}</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 06 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltbrw6}}</b></span><br>

              <span class="progress-text">RW 07 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltbrw7}}</b></span><br>
            
              <span class="progress-text">RW 08 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltbrw8}}</b></span><br>
            
              <span class="progress-text">RW 09 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltbrw9}}</b></span><br>

              <span class="progress-text">RW 10 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltbrw10}}</b></span><br>
            </div>



            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 11 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltbrw11}}</b></span><br>

              <span class="progress-text">RW 12 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltbrw12}}</b></span><br>
            
              <span class="progress-text">RW 13 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltbrw13}}</b></span><br>
            
              <span class="progress-text">RW 14 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltbrw14}}</b></span><br>

              <span class="progress-text">RW 15 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltbrw15}}</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 16 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltbrw16}}</b></span><br>

              <span class="progress-text">RW 17 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltbrw17}}</b></span><br>
            
              <span class="progress-text">RW 18 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltbrw18}}</b></span><br>
            
              <span class="progress-text">RW 19 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltbrw19}}</b></span><br>

              <span class="progress-text">RW 20 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltbrw20}}</b></span><br>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Tutup</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="spal_tertutup">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-aqua">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Detail RW</h4>
      </div>
      <div class="modal-body overflow-hidden">
        <div class="col-xs-12 no-padding">
          <strong>Total</strong>
          <h2 class="reset-heading">{{$spaltp}}</h2>
          <div class="margin-10"></div>
          <hr/>
          <div class="margin-10"></div>
          <div class="more-occurs overflow-hidden">
            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 01 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltprw1}}</b></span><br>

              <span class="progress-text">RW 02 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltprw2}}</b></span><br>
            
              <span class="progress-text">RW 03 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltprw3}}</b></span><br>
            
              <span class="progress-text">RW 04 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltprw4}}</b></span><br>

              <span class="progress-text">RW 05 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltprw5}}</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 06 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltprw6}}</b></span><br>

              <span class="progress-text">RW 07 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltprw7}}</b></span><br>
            
              <span class="progress-text">RW 08 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltprw8}}</b></span><br>
            
              <span class="progress-text">RW 09 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltprw9}}</b></span><br>

              <span class="progress-text">RW 10 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltprw10}}</b></span><br>
            </div>



            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 11 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltprw11}}</b></span><br>

              <span class="progress-text">RW 12 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltprw12}}</b></span><br>
            
              <span class="progress-text">RW 13 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltprw13}}</b></span><br>
            
              <span class="progress-text">RW 14 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltprw14}}</b></span><br>

              <span class="progress-text">RW 15 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltprw15}}</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 16 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltprw16}}</b></span><br>

              <span class="progress-text">RW 17 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltprw17}}</b></span><br>
            
              <span class="progress-text">RW 18 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltprw18}}</b></span><br>
            
              <span class="progress-text">RW 19 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltprw19}}</b></span><br>

              <span class="progress-text">RW 20 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$spaltprw20}}</b></span><br>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Tutup</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="sampah_dipilah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-aqua">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Detail RW</h4>
      </div>
      <div class="modal-body overflow-hidden">
        <div class="col-xs-12 no-padding">
          <strong>Total</strong>
          <h2 class="reset-heading">{{$sampahpilih}}</h2>
          <div class="margin-10"></div>
          <hr/>
          <div class="margin-10"></div>
          <div class="more-occurs overflow-hidden">
           <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 01 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahpilihrw1}}</b></span><br>

              <span class="progress-text">RW 02 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahpilihrw2}}</b></span><br>
            
              <span class="progress-text">RW 03 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahpilihrw3}}</b></span><br>
            
              <span class="progress-text">RW 04 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahpilihrw4}}</b></span><br>

              <span class="progress-text">RW 05 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahpilihrw5}}</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 06 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahpilihrw6}}</b></span><br>

              <span class="progress-text">RW 07 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahpilihrw7}}</b></span><br>
            
              <span class="progress-text">RW 08 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahpilihrw8}}</b></span><br>
            
              <span class="progress-text">RW 09 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahpilihrw9}}</b></span><br>

              <span class="progress-text">RW 10 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahpilihrw10}}</b></span><br>
            </div>



            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 11 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahpilihrw11}}</b></span><br>

              <span class="progress-text">RW 12 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahpilihrw12}}</b></span><br>
            
              <span class="progress-text">RW 13 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahpilihrw13}}</b></span><br>
            
              <span class="progress-text">RW 14 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahpilihrw14}}</b></span><br>

              <span class="progress-text">RW 15 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahpilihrw15}}</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 16 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahpilihrw16}}</b></span><br>

              <span class="progress-text">RW 17 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahpilihrw17}}</b></span><br>
            
              <span class="progress-text">RW 18 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahpilihrw18}}</b></span><br>
            
              <span class="progress-text">RW 19 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahpilihrw19}}</b></span><br>

              <span class="progress-text">RW 20 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahpilihrw20}}</b></span><br>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Tutup</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="sampah_tdipilah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-aqua">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Detail RW</h4>
      </div>
      <div class="modal-body overflow-hidden">
        <div class="col-xs-12 no-padding">
          <strong>Total</strong>
          <h2 class="reset-heading">{{$sampahtpilih}}</h2>
          <div class="margin-10"></div>
          <hr/>
          <div class="margin-10"></div>
          <div class="more-occurs overflow-hidden">
            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 01 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahtpilihrw1}}</b></span><br>

              <span class="progress-text">RW 02 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahtpilihrw2}}</b></span><br>
            
              <span class="progress-text">RW 03 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahtpilihrw3}}</b></span><br>
            
              <span class="progress-text">RW 04 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahtpilihrw4}}</b></span><br>

              <span class="progress-text">RW 05 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahtpilihrw5}}</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 06 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahtpilihrw6}}</b></span><br>

              <span class="progress-text">RW 07 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahtpilihrw7}}</b></span><br>
            
              <span class="progress-text">RW 08 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahtpilihrw8}}</b></span><br>
            
              <span class="progress-text">RW 09 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahtpilihrw9}}</b></span><br>

              <span class="progress-text">RW 10 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahtpilihrw10}}</b></span><br>
            </div>



            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 11 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahtpilihrw11}}</b></span><br>

              <span class="progress-text">RW 12 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahtpilihrw12}}</b></span><br>
            
              <span class="progress-text">RW 13 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahtpilihrw13}}</b></span><br>
            
              <span class="progress-text">RW 14 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahtpilihrw14}}</b></span><br>

              <span class="progress-text">RW 15 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahtpilihrw15}}</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 16 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahtpilihrw16}}</b></span><br>

              <span class="progress-text">RW 17 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahtpilihrw17}}</b></span><br>
            
              <span class="progress-text">RW 18 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahtpilihrw18}}</b></span><br>
            
              <span class="progress-text">RW 19 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahtpilihrw19}}</b></span><br>

              <span class="progress-text">RW 20 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$sampahtpilihrw20}}</b></span><br>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Tutup</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>










<div class="modal fade" id="ada_jentik">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-aqua">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Detail RW</h4>
      </div>
      <div class="modal-body overflow-hidden">
        <div class="col-xs-12 no-padding">
          <strong>Total</strong>
          <h2 class="reset-heading">{{$pjbya}}</h2>
          <div class="margin-10"></div>
          <hr/>
          <div class="margin-10"></div>
          <div class="more-occurs overflow-hidden">
        <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 01 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbyarw1}}</b></span><br>

              <span class="progress-text">RW 02 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbyarw2}}</b></span><br>
            
              <span class="progress-text">RW 03 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbyarw3}}</b></span><br>
            
              <span class="progress-text">RW 04 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbyarw4}}</b></span><br>

              <span class="progress-text">RW 05 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbyarw5}}</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 06 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbyarw6}}</b></span><br>

              <span class="progress-text">RW 07 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbyarw7}}</b></span><br>
            
              <span class="progress-text">RW 08 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbyarw8}}</b></span><br>
            
              <span class="progress-text">RW 09 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbyarw9}}</b></span><br>

              <span class="progress-text">RW 10 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbyarw10}}</b></span><br>
            </div>



            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 11 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbyarw11}}</b></span><br>

              <span class="progress-text">RW 12 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbyarw12}}</b></span><br>
            
              <span class="progress-text">RW 13 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbyarw13}}</b></span><br>
            
              <span class="progress-text">RW 14 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbyarw14}}</b></span><br>

              <span class="progress-text">RW 15 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbyarw15}}</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 16 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbyarw16}}</b></span><br>

              <span class="progress-text">RW 17 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbyarw17}}</b></span><br>
            
              <span class="progress-text">RW 18 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbyarw18}}</b></span><br>
            
              <span class="progress-text">RW 19 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbyarw19}}</b></span><br>

              <span class="progress-text">RW 20 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbyarw20}}</b></span><br>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Tutup</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="tada_jentik">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-aqua">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Detail RW</h4>
      </div>
      <div class="modal-body overflow-hidden">
        <div class="col-xs-12 no-padding">
          <strong>Total</strong>
          <h2 class="reset-heading">{{$pjbta}}</h2>
          <div class="margin-10"></div>
          <hr/>
          <div class="margin-10"></div>
          <div class="more-occurs overflow-hidden">
           <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 01 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbtarw1}}</b></span><br>

              <span class="progress-text">RW 02 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbtarw2}}</b></span><br>
            
              <span class="progress-text">RW 03 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbtarw3}}</b></span><br>
            
              <span class="progress-text">RW 04 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbtarw4}}</b></span><br>

              <span class="progress-text">RW 05 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbtarw5}}</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 06 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbtarw6}}</b></span><br>

              <span class="progress-text">RW 07 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbtarw7}}</b></span><br>
            
              <span class="progress-text">RW 08 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbtarw8}}</b></span><br>
            
              <span class="progress-text">RW 09 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbtarw9}}</b></span><br>

              <span class="progress-text">RW 10 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbtarw10}}</b></span><br>
            </div>



            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 11 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbtarw11}}</b></span><br>

              <span class="progress-text">RW 12 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbtarw12}}</b></span><br>
            
              <span class="progress-text">RW 13 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbtarw13}}</b></span><br>
            
              <span class="progress-text">RW 14 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbtarw14}}</b></span><br>

              <span class="progress-text">RW 15 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbtarw15}}</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 16 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbtarw16}}</b></span><br>

              <span class="progress-text">RW 17 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbtarw17}}</b></span><br>
            
              <span class="progress-text">RW 18 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbtarw18}}</b></span><br>
            
              <span class="progress-text">RW 19 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbtarw19}}</b></span><br>

              <span class="progress-text">RW 20 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$pjbtarw20}}</b></span><br>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Tutup</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>










<div class="modal fade" id="modal_koya">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-aqua">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Detail RW</h4>
      </div>
      <div class="modal-body overflow-hidden">
        <div class="col-xs-12 no-padding">
          <strong>Total</strong>
          <h2 class="reset-heading">{{$koya}}</h2>
          <div class="margin-10"></div>
          <hr/>
          <div class="margin-10"></div>
          <div class="more-occurs overflow-hidden">
<div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 01 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$koyarw1}}</b></span><br>

              <span class="progress-text">RW 02 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$koyarw2}}</b></span><br>
            
              <span class="progress-text">RW 03 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$koyarw3}}</b></span><br>
            
              <span class="progress-text">RW 04 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$koyarw4}}</b></span><br>

              <span class="progress-text">RW 05 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$koyarw5}}</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 06 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$koyarw6}}</b></span><br>

              <span class="progress-text">RW 07 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$koyarw7}}</b></span><br>
            
              <span class="progress-text">RW 08 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$koyarw8}}</b></span><br>
            
              <span class="progress-text">RW 09 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$koyarw9}}</b></span><br>

              <span class="progress-text">RW 10 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$koyarw10}}</b></span><br>
            </div>



            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 11 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$koyarw11}}</b></span><br>

              <span class="progress-text">RW 12 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$koyarw12}}</b></span><br>
            
              <span class="progress-text">RW 13 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$koyarw13}}</b></span><br>
            
              <span class="progress-text">RW 14 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$koyarw14}}</b></span><br>

              <span class="progress-text">RW 15 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$koyarw15}}</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 16 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$koyarw16}}</b></span><br>

              <span class="progress-text">RW 17 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$koyarw17}}</b></span><br>
            
              <span class="progress-text">RW 18 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$koyarw18}}</b></span><br>
            
              <span class="progress-text">RW 19 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$koyarw19}}</b></span><br>

              <span class="progress-text">RW 20 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$koyarw20}}</b></span><br>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Tutup</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal_kali">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-aqua">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Detail RW</h4>
      </div>
      <div class="modal-body overflow-hidden">
        <div class="col-xs-12 no-padding">
          <strong>Total</strong>
          <h2 class="reset-heading">{{$kali}}</h2>
          <div class="margin-10"></div>
          <hr/>
          <div class="margin-10"></div>
          <div class="more-occurs overflow-hidden">
           <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 01 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$kalirw1}}</b></span><br>

              <span class="progress-text">RW 02 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$kalirw2}}</b></span><br>
            
              <span class="progress-text">RW 03 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$kalirw3}}</b></span><br>
            
              <span class="progress-text">RW 04 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$kalirw4}}</b></span><br>

              <span class="progress-text">RW 05 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$kalirw5}}</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 06 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$kalirw6}}</b></span><br>

              <span class="progress-text">RW 07 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$kalirw7}}</b></span><br>
            
              <span class="progress-text">RW 08 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$kalirw8}}</b></span><br>
            
              <span class="progress-text">RW 09 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$kalirw9}}</b></span><br>

              <span class="progress-text">RW 10 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$kalirw10}}</b></span><br>
            </div>



            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 11 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$kalirw11}}</b></span><br>

              <span class="progress-text">RW 12 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$kalirw12}}</b></span><br>
            
              <span class="progress-text">RW 13 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$kalirw13}}</b></span><br>
            
              <span class="progress-text">RW 14 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$kalirw14}}</b></span><br>

              <span class="progress-text">RW 15 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$kalirw15}}</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 16 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$kalirw16}}</b></span><br>

              <span class="progress-text">RW 17 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$kalirw17}}</b></span><br>
            
              <span class="progress-text">RW 18 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$kalirw18}}</b></span><br>
            
              <span class="progress-text">RW 19 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$kalirw19}}</b></span><br>

              <span class="progress-text">RW 20 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$kalirw20}}</b></span><br>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Tutup</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>



<div class="modal fade" id="modal_helikopter">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-aqua">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Detail RW</h4>
      </div>
      <div class="modal-body overflow-hidden">
        <div class="col-xs-12 no-padding">
          <strong>Total</strong>
          <h2 class="reset-heading">{{$helikopter}}</h2>
          <div class="margin-10"></div>
          <hr/>
          <div class="margin-10"></div>
          <div class="more-occurs overflow-hidden">
            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 01 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$helikopterrw1}}</b></span><br>

              <span class="progress-text">RW 02 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$helikopterrw2}}</b></span><br>
            
              <span class="progress-text">RW 03 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$helikopterrw3}}</b></span><br>
            
              <span class="progress-text">RW 04 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$helikopterrw4}}</b></span><br>

              <span class="progress-text">RW 05 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$helikopterrw5}}</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 06 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$helikopterrw6}}</b></span><br>

              <span class="progress-text">RW 07 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$helikopterrw7}}</b></span><br>
            
              <span class="progress-text">RW 08 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$helikopterrw8}}</b></span><br>
            
              <span class="progress-text">RW 09 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$helikopterrw9}}</b></span><br>

              <span class="progress-text">RW 10 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$helikopterrw10}}</b></span><br>
            </div>



            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 11 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$helikopterrw11}}</b></span><br>

              <span class="progress-text">RW 12 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$helikopterrw12}}</b></span><br>
            
              <span class="progress-text">RW 13 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$helikopterrw13}}</b></span><br>
            
              <span class="progress-text">RW 14 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$helikopterrw14}}</b></span><br>

              <span class="progress-text">RW 15 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$helikopterrw15}}</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 16 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$helikopterrw16}}</b></span><br>

              <span class="progress-text">RW 17 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$helikopterrw17}}</b></span><br>
            
              <span class="progress-text">RW 18 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$helikopterrw18}}</b></span><br>
            
              <span class="progress-text">RW 19 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$helikopterrw19}}</b></span><br>

              <span class="progress-text">RW 20 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$helikopterrw20}}</b></span><br>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Tutup</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal_septic_tank">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-aqua">
        <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title font-white" align="center">Detail RW</h4>
      </div>
      <div class="modal-body overflow-hidden">
        <div class="col-xs-12 no-padding">
          <strong>Total</strong>
          <h2 class="reset-heading">{{$septik}}</h2>
          <div class="margin-10"></div>
          <hr/>
          <div class="margin-10"></div>
          <div class="more-occurs overflow-hidden">
           <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 01 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$septikrw1}}</b></span><br>

              <span class="progress-text">RW 02 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$septikrw2}}</b></span><br>
            
              <span class="progress-text">RW 03 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$septikrw3}}</b></span><br>
            
              <span class="progress-text">RW 04 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$septikrw4}}</b></span><br>

              <span class="progress-text">RW 05 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$septikrw5}}</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 06 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$septikrw6}}</b></span><br>

              <span class="progress-text">RW 07 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$septikrw7}}</b></span><br>
            
              <span class="progress-text">RW 08 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$septikrw8}}</b></span><br>
            
              <span class="progress-text">RW 09 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$septikrw9}}</b></span><br>

              <span class="progress-text">RW 10 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$septikrw10}}</b></span><br>
            </div>



            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 11 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$septikrw11}}</b></span><br>

              <span class="progress-text">RW 12 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$septikrw12}}</b></span><br>
            
              <span class="progress-text">RW 13 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$septikrw13}}</b></span><br>
            
              <span class="progress-text">RW 14 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$septikrw14}}</b></span><br>

              <span class="progress-text">RW 15 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$septikrw15}}</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 16 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$septikrw16}}</b></span><br>

              <span class="progress-text">RW 17 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$septikrw17}}</b></span><br>
            
              <span class="progress-text">RW 18 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$septikrw18}}</b></span><br>
            
              <span class="progress-text">RW 19 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$septikrw19}}</b></span><br>

              <span class="progress-text">RW 20 </span>
              <span class="progress-number pull-right"><b id="grw1">{{$septikrw20}}</b></span><br>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Tutup</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>






<section class="content" style="overflow: hidden;">
  <div class="col-xs-12">
    <div class="box box-widget">
      <div class="box-header with-border bg-light-blue green-background-main-color" style="padding: 15px">
        <h3 class="box-title" style="color:#fff"><b>History</b></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus font-white"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times font-white"></i></button>
        </div>
      </div>
      <div class="box-body chat" id="chat-box">
        @foreach($getHistoryData as $data)
        <div class="item">
          @if($data->aktivitas == 'UPDATE')
            <i class="fa fa-refresh history-icon-style history-update"></i>
          @else
            <i class="fa fa-plus history-icon-style history-tambah"></i>
          @endif

          <p class="message">
            <a href="#" class="name">
              <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> {{ date('d-m-y, G:i:s', strtotime($data->waktu)) }}</small>
              {{ $data->nama }}
            </a>

            @if($data->aktivitas == 'UPDATE')
              {{ $data->nama }} telah mengupdate data
            @else
              {{ $data->nama }} telah menambah data
            @endif

          </p>
        </div>
        @endforeach
      </div>
      <div class="box-footer with-border text-center">
        <a href="{{ url('sipp-kling/history') }}" class="btn btn-default btn-flat">view all</a>
      </div>
    </div>
  </div>



<div class="col-xs-12">
    <div class="row">
      <div class="col-md-12 col-lg-8">
        <div class="box box-widget">
          <div class="box-header with-border bg-light-blue">
            <span class="info-box-icon bg-light-blue"><i class="ion ion-home font-white"></i></span>
            <div class="info-box-content">
              <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4 class="font-white">Rumah Sehat</h4></span>
            </div>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus font-white"></i></button>
            </div>
          </div>
          <div class="box-body" style="padding: 20px 0px;">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#rs" data-toggle="tab">RS</a></li>
                <li><a href="#pjb" data-toggle="tab">PJB</a></li>
                <li><a href="#spal" data-toggle="tab">SPAL</a></li>
                <li><a href="#sab" data-toggle="tab">SAB</a></li>
                <li><a href="#jbn" data-toggle="tab">Jamban</a></li>
                <li><a href="#sampah" data-toggle="tab">Sampah</a></li>
              </ul>
            </div>
            <div class="box-body border-radius-none" style="padding: 20px">
                <div class="tab-content">
                  <div class="tab-pane active" id="rs">
                    <div class="overflow-hidden">
                      <div class="col-xs-4 pull-left no-padding">
                        <b>Rumah Sehat</b>
                        <div class="line-height-box-body bg-light-blue"></div>
                      </div>
                      <div class="col-xs-8 no-padding">
                        <div class="pull-left col-xs-5 rw-p-control">
                          <p>Lihat detail rw</p>
                        </div>
                        <div class="pull-right col-xs-7 no-padding">
                          <select core-angler="select-retrieve-data-rw" class="form-control">
                            <option value="0">- pilih kategori -</option>
                            <option value="rumahsehat">Rumah Sehat</option>
                            <option value="rumahtsehat">Rumah Tidak Sehat</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-green">
                          <div class="inner">
                            <h3 id="jumlah_rs">{{$jumlah_rs}}</h3>
                            <p>Jumlah</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars" style="color: white"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-light-blue">
                          <div class="inner">
                            <h3 id="jumlah_rssehat">{{$jumlah_rssehat}}</h3>
                              <p>Sehat </p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-checkmark" style="color: white"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-red">
                          <div class="inner">
                            <h3 id="jumlah_rstidaksehat">{{$jumlah_rstidaksehat}}</h3>
                              <p>Tidak sehat</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-close" style="color: white"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>



                  <div class="tab-pane" id="sab">
                    <b>Sarana Air Bersih</b>
                    <div class="line-height-box-body bg-light-blue"></div>
                    <div class="row">
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-green">
                          <div class="inner">
                            <h3 id="jumlah_sab">0</h3>
                            <p>Jumlah</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-light-blue">
                          <div class="inner">
                            <h3 id="jumlah_sabsehat">0</h3>
                              <p>Sehat </p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-checkmark"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-red">
                          <div class="inner">
                            <h3 id="jumlah_sabtidaksehat">0</h3>
                              <p>Tidak sehat</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-close"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="spal">
                    <div class="overflow-hidden">
                        <div class="col-xs-4 pull-left no-padding">
                          <b>Sarana Pembuangan Air Limbah</b>
                          <div class="line-height-box-body bg-light-blue"></div>
                        </div>
                        <div class="col-xs-8 no-padding">
                          <div class="pull-left col-xs-5 rw-p-control">
                            <p>Lihat detail rw</p>
                          </div>
                          <div class="pull-right col-xs-7 no-padding">
                            <select core-angler="select-retrieve-data-rw" class="form-control">
                              <option value="0">- pilih kategori -</option>
                              <option value="spal_terbuka">Terbuka</option>
                              <option value="spal_tertutup">Tertutup</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    <div class="row">
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-green">
                          <div class="inner">
                            <h3 id="jumlah">{{$jumlah_spal}}</h3>
                            <p>Jumlah</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-light-blue">
                          <div class="inner">
                            <h3 id="jumlahsehat">{{$jumlah_spalterbuka}}</h3>
                              <p>Terbuka</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-checkmark"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-red">
                          <div class="inner">
                            <h3 id="jumlahtidaksehat">{{$jumlah_spaltertutup}}</h3>
                              <p>Tertutup</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-close"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="sampah">
                    <div class="overflow-hidden">
                        <div class="col-xs-4 pull-left no-padding">
                          <b>Sampah</b>
                          <div class="line-height-box-body bg-light-blue"></div>
                        </div>
                        <div class="col-xs-8 no-padding">
                          <div class="pull-left col-xs-5 rw-p-control">
                            <p>Lihat detail rw</p>
                          </div>
                          <div class="pull-right col-xs-7 no-padding">
                            <select core-angler="select-retrieve-data-rw" class="form-control">
                              <option value="0">- pilih kategori -</option>
                              <option value="sampah_dipilah">Dipilah/ Organik</option>
                              <option value="sampah_tdipilah">Tidak Dipilah/ Dibuang</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    <div class="row">
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-green">
                          <div class="inner">
                            <h3 id="jumlah">{{$jumlah_tps}}</h3>
                            <p>Jumlah</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-light-blue">
                          <div class="inner">
                            <h3 id="jumlahsehat">{{$jumlah_tpsorganik}}</h3>
                              <p>Dipilah/ Organik </p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-checkmark"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-red">
                          <div class="inner">
                            <h3 id="jumlahtidaksehat">{{$jumlah_tpsdibuang}}</h3>
                              <p>Tidak Dipilah/ Dibuang</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-close"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="pjb">
                        <div class="overflow-hidden">
                        <div class="col-xs-4 pull-left no-padding">
                    <b>Pemantauan Jentik Berkala</b>
                    <div class="line-height-box-body bg-light-blue"></div>
</div>
                        <div class="col-xs-8 no-padding">
                          <div class="pull-left col-xs-5 rw-p-control">
                            <p>Lihat detail rw</p>
                          </div>
                          <div class="pull-right col-xs-7 no-padding">
                            <select core-angler="select-retrieve-data-rw" class="form-control">
                              <option value="0">- pilih kategori -</option>
                              <option value="ada_jentik">Ada jentik</option>
                              <option value="tada_jentik">Tidak ada jentik</option>
                            </select>
                          </div>
                        </div>
                      </div>



                    <div class="row">
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-green">
                          <div class="inner">
                            <h3 id="jumlah">{{$jumlah_pjb}}</h3>
                            <p>Jumlah</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-light-blue">
                          <div class="inner">
                            <h3 id="jumlahsehat">{{$jumlah_adapjb}}</h3>
                              <p>Ada Jentik </p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-checkmark"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-red">
                          <div class="inner">
                            <h3 id="jumlahtidaksehat">{{$jumlah_tidakpjb}}</h3>
                              <p>Tidak Ada Jentik</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-close"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="jbn">
                    <div class="overflow-hidden">
                        <div class="col-xs-4 pull-left no-padding">
                          <b>Jamban</b>
                          <div class="line-height-box-body bg-light-blue"></div>
                        </div>
                        <div class="col-xs-8 no-padding">
                          <div class="pull-left col-xs-5 rw-p-control">
                            <p>Lihat detail rw</p>
                          </div>
                          <div class="pull-right col-xs-7 no-padding">
                            <select core-angler="select-retrieve-data-rw" class="form-control">
                              <option value="0">- pilih kategori -</option>
                              <option value="modal_koya">Koya</option>
                              <option value="modal_kali">Kali</option>
                              <option value="modal_helikopter">Helikopter</option>
                              <option value="modal_septic_tank">Septik Tank</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    <div class="row">
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-green">
                          <div class="inner">
                            <h3 id="jumlah">{{$jumlah_jamban}}</h3>
                            <p>Jumlah</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-light-blue">
                          <div class="inner">
                            <h3 id="jumlahsehat">{{$jumlah_koya}}</h3>
                              <p>Koya/Empang</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-checkmark"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-red">
                          <div class="inner">
                            <h3 id="jumlahtidaksehat">{{$jumlah_kali}}</h3>
                              <p>Kali</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-close"></i>
                          </div>
                        </div>
                      </div>
                                            <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-light-blue">
                          <div class="inner">
                            <h3 id="jumlahsehat">{{$jumlah_helikopter}}</h3>
                              <p>Helikopter</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-checkmark"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-red">
                          <div class="inner">
                            <h3 id="jumlahtidaksehat">{{$jumlah_septik}}</h3>
                              <p>Septik Tank</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-close"></i>
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

      <div class="col-md-12 col-lg-4">
        <div class="box box-widget">
          <div class="box-header with-border bg-orange orange-sipp-kling-main-color">
            <span class="info-box-icon bg-orange orange-sipp-kling-main-color"><i class="ion ion-ios-star-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4>Reward</h4></span>
            </div>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus" style="color:white"></i></button>
            </div>
          </div>
          <div class="box-body" style="height: 320px; overflow: auto;">
            <ul class="products-list product-list-in-box">
              <li class="item">
                <div class="product-img">
                  <img src="{{ asset('dist/img/default-50x50.gif') }}" class="img-circle" alt="Product Image">
                </div>
                <div class="product-info">
                  <a href="javascript:void(0)" class="product-title">
                    Petugas 1 <span class="label label-warning pull-right">90</span>
                  </a>
                  <span class="product-description">
                  Kecamatana Limo,<br>
                  Kelurahan Limo
                  </span>
                </div>
              </li>
              <li class="item">
                <div class="product-img">
                  <img src="{{ asset('dist/img/default-50x50.gif') }}" class="img-circle" alt="Product Image">
                </div>
                <div class="product-info">
                  <a href="javascript:void(0)" class="product-title">
                    Petugas 1 <span class="label label-warning pull-right">90</span>
                  </a>
                  <span class="product-description">
                  Kecamatana Limo,<br>
                  Kelurahan Limo
                  </span>
                </div>
              </li>
              <li class="item">
                <div class="product-img">
                  <img src="{{ asset('dist/img/default-50x50.gif') }}" class="img-circle" alt="Product Image">
                </div>
                <div class="product-info">
                  <a href="javascript:void(0)" class="product-title">
                    Petugas 1 <span class="label label-warning pull-right">90</span>
                  </a>
                  <span class="product-description">
                  Kecamatana Limo,<br>
                  Kelurahan Limo
                  </span>
                </div>
              </li>
              <li class="item">
                <div class="product-img">
                  <img src="{{ asset('dist/img/default-50x50.gif') }}" class="img-circle" alt="Product Image">
                </div>
                <div class="product-info">
                  <a href="javascript:void(0)" class="product-title">
                    Petugas 1 <span class="label label-warning pull-right">90</span>
                  </a>
                  <span class="product-description">
                  Kecamatana Limo,<br>
                  Kelurahan Limo
                  </span>
                </div>
              </li>
              <li class="item">
                <div class="product-img">
                  <img src="{{ asset('dist/img/default-50x50.gif') }}" class="img-circle" alt="Product Image">
                </div>
                <div class="product-info">
                  <a href="javascript:void(0)" class="product-title">
                    Petugas 1 <span class="label label-warning pull-right">90</span>
                  </a>
                  <span class="product-description">
                  Kecamatan Limo,<br>
                  Kelurahan Limo
                  </span>
                </div>
              </li>
              <!-- /.item -->
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xs-12">



    <div class="box box-widget">
          <div class="box-header with-border bg-light-blue">
                  <span class="info-box-icon bg-light-blue"><i class="ion ion-leaf" style="color: #fff"></i></span>
              <div class="info-box-content">
                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4 class="font-white">PELAYANAN KESEHATAN LINGKUNGAN</h4></span>
              </div>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus font-white"></i></button>
              </div>
          </div>
          <div class="box-body">
            <div class="box-body border-radius-none">
              <div class="tab-content">
                <div class="tab-pane active" id="pkl">
                  <b>Pelayanan Kesehatan Lingkungan</b>
                  <div class="line-height-box-body bg-light-blue"></div>
                  <div class="row">
                    <div class="col-lg-4 col-xs-6">
                      <div class="small-box bg-green">
                        <div class="inner">
                          <h3 id="jumlah">{{$jumlah_pkl}}</h3>
                          <p>Jumlah</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-stats-bars"></i>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-xs-6">
                      <div class="small-box bg-light-blue">
                        <div class="inner">
                          <h3 id="jumlahsehat">{{$jumlah_pkldalam}}</h3>
                            <p>Dalam Gedung</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-checkmark"></i>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-xs-6">
                      <div class="small-box bg-red">
                        <div class="inner">
                          <h3 id="jumlahtidaksehat">{{$jumlah_pklluar}}</h3>
                            <p>Luar Gedung</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-close"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        </div>



    <div class="box box-widget">
          <div class="box-header with-border bg-light-blue">
            <span class="info-box-icon bg-light-blue"><i class="ion ion-android-restaurant font-white"></i></span>
            <div class="info-box-content">
              <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4 class="font-white">Tempat Pengelolaan Makanan</h4></span>
            </div>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus font-white"></i></button>
            </div>
          </div>
          <div class="box-body" style="padding: 20px 0px;">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#pjbb" data-toggle="tab">PJB</a></li>
                <li><a href="#tmr" data-toggle="tab">TMR</a></li>
                <li><a href="#dam" data-toggle="tab">DAM</a></li>
              </ul>
            </div>
            <div class="box-body border-radius-none" style="padding: 20px">
                <div class="tab-content">
                  <div class="tab-pane active" id="pjbb">
                    <b>Pemeriksaan Jasa Boga</b>
                    <div class="line-height-box-body bg-light-blue"></div>
                    <div class="row">
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-green">
                          <div class="inner">
                            <h3>{{$jumlah_jb}}</h3>
                            <p>Jumlah</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars" style="color: white"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-light-blue">
                          <div class="inner">
                            <h3>{{$jumlah_jblayak}}</h3>
                              <p>Penyimpangan Sedikit</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-checkmark" style="color: white"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-red">
                          <div class="inner">
                            <h3>{{$jumlah_jbtlayak}}</h3>
                              <p>Penyimpangan Banyak</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-close" style="color: white"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="tmr">
                    <b>Tempat Makan dan Restaurant</b>
                    <div class="line-height-box-body bg-light-blue"></div>
                    <div class="row">
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-green">
                          <div class="inner">
                            <h3>{{$jumlah_kuliner}}</h3>
                            <p>Jumlah</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-light-blue">
                          <div class="inner">
                            <h3>{{$jumlah_kullayak}}</h3>
                              <p>Laik Hygiene Sanitasi</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-checkmark"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-red">
                          <div class="inner">
                            <h3>{{$jumlah_kultlayak}}</h3>
                            <p>Tidak Laik Hygiene Sanitasi</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-close"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="dam">
                    <b>Depot Air Minum</b>
                    <div class="line-height-box-body bg-light-blue"></div>
                    <div class="row">
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-green">
                          <div class="inner">
                            <h3 id="jumlah">{{$jumlah_dam}}</h3>
                            <p>Jumlah</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-light-blue">
                          <div class="inner">
                            <h3>{{$jumlah_damlayak}}</h3>
                              <p>Memenuhi Persyaratan</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-checkmark"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-red">
                          <div class="inner">
                            <h3>{{$jumlah_damtlayak}}</h3>
                              <p>Belum Memenuhi Persyaratan</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-close"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>



    <div class="box box-widget">
          <div class="box-header with-border bg-light-blue">
            <span class="info-box-icon bg-light-blue"><i class="ion ion-home font-white"></i></span>
            <div class="info-box-content">
              <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h4 class="font-white">Tempat Tempat Umum</h4></span>
            </div>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus font-white"></i></button>
            </div>
          </div>
          <div class="box-body" style="padding: 20px 0px;">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tibd" data-toggle="tab">TEMPAT IBADAH</a></li>
              <li><a href="#psr" data-toggle="tab">PASAR</a></li>
              <li><a href="#sklh" data-toggle="tab">SEKOLAH</a></li>
              <li><a href="#psntrn" data-toggle="tab">PESANTREN</a></li>
              <li><a href="#puskesmas" data-toggle="tab">PUSKESMAS</a></li>
              <li><a href="#hotel" data-toggle="tab">HOTEL</a></li>
              <li><a href="#melati" data-toggle="tab">HOTEL MELATI</a></li>
              </ul>
            </div>
            <div class="box-body border-radius-none" style="padding: 20px">
                <div class="tab-content">
                  <div class="tab-pane active" id="tibd">
                  <b>Tempat Ibadah</b>
                  <div class="row">
                    <div class="col-lg-4 col-xs-6">
                      <div class="small-box bg-olive">
                        <div class="inner">
                          <h3 id="jmlttuibadah">{{$jumlah_masjid}}</h3>
                          <p>Jumlah</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-stats-bars"></i>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-xs-6">
                      <div class="small-box bg-light-blue">
                        <div class="inner">
                          <h3 id="ibadahsehat">{{$jumlah_masjidlayak}}</h3>
                            <p>Layak</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-checkmark"></i>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-xs-6">
                      <div class="small-box bg-red">
                        <div class="inner">
                          <h3 id="ibadahnosehat">{{$jumlah_masjidtlayak}}</h3>
                            <p>Tidak Layak</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-close"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                
                <div class="tab-pane" id="psr">
                  <b>Pasar</b>
                  <div class="row">
                    <div class="col-lg-4 col-xs-6">
                      <div class="small-box bg-olive">
                        <div class="inner">
                          <h3 id="jmlttupasar">{{$jumlah_pasar}}</h3>
                          <p>Jumlah</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-stats-bars"></i>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-xs-6">
                      <div class="small-box bg-light-blue">
                        <div class="inner">
                          <h3 id="pasarsehat">{{$jumlah_pasarlayak}}</h3>
                            <p>Sehat </p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-checkmark"></i>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-xs-6">
                      <div class="small-box bg-red">
                        <div class="inner">
                          <h3 id="pasarnosehat">{{$jumlah_pasartlayak}}</h3>
                            <p>Tidak sehat</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-close"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="tab-pane" id="sklh">
                <b>Sekolah</b>
                <div class="row">
                  <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-olive">
                      <div class="inner">
                        <h3 id="jmlttusekolah">{{$jumlah_sekolah}}</h3>
                        <p>Jumlah</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-light-blue">
                      <div class="inner">
                        <h3 id="sekolahsehat">{{$jumlah_sekolahlayak}}</h3>
                          <p>Sehat </p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-checkmark"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-red">
                      <div class="inner">
                        <h3 id="sekolahnosehat">{{$jumlah_sekolahtlayak}}</h3>
                          <p>Tidak sehat</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-close"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="tab-pane" id="psntrn">
                <b>Pesantren</b>
                <div class="row">
                  <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-olive">
                      <div class="inner">
                        <h3 id="jmlttupesantren">{{$jumlah_pesantren}}</h3>
                        <p>Jumlah</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-light-blue">
                      <div class="inner">
                        <h3 id="pesantrensehat">{{$jumlah_pesantrenlayak}}</h3>
                          <p>Sehat </p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-checkmark"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-red">
                      <div class="inner">
                        <h3 id="pesantrennosehat">{{$jumlah_pesantrentlayak}}</h3>
                          <p>Tidak sehat</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-close"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="tab-pane" id="puskesmas">
                <b>Puskesmas</b>
                <div class="row">
                  <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-olive">
                      <div class="inner">
                        <h3 id="jmlttupuskesmas">{{$jumlah_pusk}}</h3>
                        <p>Jumlah</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-light-blue">
                      <div class="inner">
                        <h3 id="puskesmassehat">{{$jumlah_pusklayak}}</h3>
                          <p>Sehat </p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-checkmark"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-red">
                      <div class="inner">
                        <h3 id="puskesmasnosehat">{{$jumlah_pusktlayak}}</h3>
                          <p>Tidak sehat</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-close"></i>
                      </div>
                    </div>
                  </div>
                </div>
                </div>

                <div class="tab-pane" id="hotel">
                <b>Hotel</b>
                <div class="row">
                  <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-olive">
                      <div class="inner">
                        <h3 id="jmlttuhotel">{{$jumlah_hotel}}</h3>
                        <p>Jumlah</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-light-blue">
                      <div class="inner">
                        <h3 id="hotelsehat">{{$jumlah_hotellayak}}</h3>
                          <p>Layak </p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-checkmark"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-red">
                      <div class="inner">
                        <h3 id="hotelnosehat">{{$jumlah_hotelmlayak}}</h3>
                          <p>Tidak Layak</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-close"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="tab-pane" id="melati">
                <b>Hotel Melati</b>
                <div class="row">
                  <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-olive">
                      <div class="inner">
                        <h3 id="jmlttuhotelm">{{$jumlah_hotelm}}</h3>
                        <p>Jumlah</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-light-blue">
                      <div class="inner">
                        <h3 id="hotelmsehat">{{$jumlah_hotelmlayak}}</h3>
                          <p>Layak </p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-checkmark"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-red">
                      <div class="inner">
                        <h3 id="hotelmnosehat">{{$jumlah_hotelmtlayak}}</h3>
                          <p>Tidak Layak</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-close"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

                </div>
              </div>
          </div>
        </div>
        <!-- end tempat umum -->
  </div>
  

</section>
@endsection