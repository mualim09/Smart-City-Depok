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
          <option value="{{ url('sipp-kling/data-tempat') }}">Dashboard Map</option>
          <option value="{{ url('sipp-kling/dashboard-detail') }}">Dashboard Detail</option>
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
<div class="modal fade" id="sehatrs">
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



<div class="modal fade" id="tsehatrs">
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
  <div class="col-md-12 col-lg-8">
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
        @if(count($getHistoryData) == 0)
          <div class="null-history"> - data tidak ditemukan - </div>
        @else
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
        @endif
      </div>
      <div class="box-footer with-border text-center">
        <a href="{{ url('sipp-kling/history') }}" class="btn btn-default btn-flat">view all</a>
      </div>
    </div>
  </div>

  <div class="col-md-12 col-lg-4">
        <div class="box box-widget">
          <div class="box-header with-border bg-orange orange-sippkling-main-color" style="padding: 15px">
        <h3 class="box-title" style="color:#fff"><b>Reward</b></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus font-white"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times font-white"></i></button>
        </div>
      </div>
          <div class="box-body" style="height: 235px; overflow: auto;">
            <ul class="products-list product-list-in-box">
              <li class="item">
                <div class="product-img">
                  <img src="{{ asset('dist/img/avatar5.png') }}" class="img-circle" alt="Product Image">
                </div>
                <div class="product-info">
                  <a href="javascript:void(0)" class="product-title">
                    Handoko <span class="label label-warning pull-right">90</span>
                  </a>
                  <span class="product-description">
                  Kecamatan Limo,<br>
                  Kelurahan Limo
                  </span>
                </div>
              </li>
              <!-- /.item -->
              <li class="item">
                <div class="product-img">
                  <img src="{{ asset('dist/img/avatar04.png') }}" class="img-circle" alt="Product Image">
                </div>
                <div class="product-info">
                  <a href="javascript:void(0)" class="product-title">
                    Sudirman <span class="label label-warning pull-right">80</span>
                  </a>
                  <span class="product-description">
                  Kecamatan Limo,<br>
                  Kelurahan Krukut
                  </span>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>

  <div class="col-xs-12">
    <div class="row">
      <div class="col-xs-12">
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
                          <p>Lihat detail /RW</p>
                        </div>
                        <div class="pull-right col-xs-7 no-padding">
                          <select core-angler="select-retrieve-data-rw" class="form-control">
                            <option value="0">- pilih kategori -</option>
                            <option value="sehatrs">Rumah Sehat</option>
                            <option value="tsehatrs">Rumah Tidak Sehat</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-green">
                          <div class="inner">
                            @if($param_kelurahan == '0')
                            <p><strong>Total</strong></p>
                            <h3 id="jumlah_rs">{{$jumlah_rs}} / <span style="font-size: 15px;">{{$getTotal_rs}}</span></h3>
                            <small><i><strong style="font-size: 16px;">
                              {!!
                              
                              number_format(
                                $getTotal_rs == 0 ? 0 : ($jumlah_rs / $getTotal_rs) * 100, 2
                              )
                              
                            !!}%
                            </strong> dari total keseluruhan</i></small>
                            <small><i style="color: transparent;"><strong style="font-size: 16px;"></strong>-</i></small>
                            @else
                              <p><strong>Total</strong></p>
                            <h3 id="jumlah_rs">{{$jumlah_rs}} / <span style="font-size: 15px;">{{$getTotal_rs}}</span></h3>
                            <small><i><strong style="font-size: 16px;">
                              {!!
                              
                              number_format(
                                $getTotal_rs == 0 ? 0 : ($jumlah_rs / $getTotal_rs) * 100, 2
                              )
                              
                            !!}%
                            </strong> dari total keseluruhan</i></small><br>
                            <small><i style="color: transparent;"><strong style="font-size: 16px;"></strong>-</i></small>
                            <small><i style="color: transparent;"><strong style="font-size: 16px;"></strong>-</i></small>
                            @endif
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars" style="color: white"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-light-blue">
                          <div class="inner">
                            @if($param_kelurahan == '0')
                            <p>Sehat </p>
                            <h3 id="jumlah_rssehat">{{$jumlah_rssehat}} / <span style="font-size: 15px;">{{$jumlah_rs}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_rs == 0 ? 0 : ($jumlah_rssehat / $jumlah_rs) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_rs == 0 ? 0 : ($jumlah_rssehat / $getTotal_rs) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @else
                            <p>Sehat </p>
                            <h3 id="jumlah_rssehat">{{$jumlah_rssehat}} / <span style="font-size: 15px;">{{$jumlah_rs}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_rs == 0 ? 0 : ($jumlah_rssehat / $jumlah_rs) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kelurahan <b>{{ $param_kelurahan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_rs_kec == 0 ? 0 : ($jumlah_rssehat / $jumlah_rs_kec) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_rs == 0 ? 0 : ($jumlah_rssehat / $getTotal_rs) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @endif
                          </div>
                          <div class="icon">
                            <i class="ion ion-checkmark" style="color: white"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-red">
                          <div class="inner">
                            @if($param_kelurahan == '0')
                              <p>Tidak sehat</p>
                              <h3>{{$jumlah_rstidaksehat}} / <span style="font-size: 15px;">{{$jumlah_rs}}</span></h3>
                                <small><i><strong style="font-size: 16px;">{!!
                                number_format(
                                  $jumlah_rs == 0 ? 0 : ($jumlah_rstidaksehat / $jumlah_rs) * 100, 2
                                )
                              !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                              <br>
                              <small><i><strong style="font-size: 16px;">{!!
                                number_format(
                                  $getTotal_rs == 0 ? 0 : ($jumlah_rstidaksehat / $getTotal_rs) * 100, 2
                                )
                              !!}%</strong> dari total data keseluruhan</i></small>
                            @else
                              <p>Tidak sehat</p>
                              <h3>{{$jumlah_rstidaksehat}} / <span style="font-size: 15px;">{{$jumlah_rs}}</span></h3>
                                <small><i><strong style="font-size: 16px;">{!!
                                number_format(
                                  $jumlah_rs == 0 ? 0 : ($jumlah_rstidaksehat / $jumlah_rs) * 100, 2
                                )
                              !!}%</strong> dari total data kelurahan <b>{{ $param_kelurahan }}</b></i></small>
                              <br>
                                <small><i><strong style="font-size: 16px;">{!!
                                number_format(
                                  $jumlah_rs_kec == 0 ? 0 : ($jumlah_rstidaksehat / $jumlah_rs_kec) * 100, 2
                                )
                              !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                              <br>
                              <small><i><strong style="font-size: 16px;">{!!
                                number_format(
                                  $getTotal_rs == 0 ? 0 : ($jumlah_rstidaksehat / $getTotal_rs) * 100, 2
                                )
                              !!}%</strong> dari total data keseluruhan</i></small>
                            @endif
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
                            <i class="ion ion-stats-bars" style="color: white"></i>
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
                            <i class="ion ion-checkmark" style="color: white"></i>
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
                            <i class="ion ion-close" style="color: white"></i>
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
                            <p>Lihat detail /RW</p>
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
                            @if($param_kelurahan == '0')
                            <p><strong>Total</strong></p>
                            <h3 id="jumlah_rs">{{$jumlah_spal}} / <span style="font-size: 15px;">{{$getTotal_spal}}</span></h3>
                            <small><i><strong style="font-size: 16px;">
                              {!!
                              
                              number_format(
                                $getTotal_spal == 0 ? 0 : ($jumlah_spal / $getTotal_rs) * 100, 2
                              )
                              
                            !!}%
                            </strong> dari total keseluruhan</i></small>
                            @else
                            <p><strong>Total</strong></p>
                            <h3 id="jumlah_rs">{{$jumlah_spal}} / <span style="font-size: 15px;">{{$getTotal_spal}}</span></h3>
                            <small><i><strong style="font-size: 16px;">
                              {!!
                              
                              number_format(
                                $getTotal_spal == 0 ? 0 : ($jumlah_spal / $getTotal_spal) * 100, 2
                              )
                              
                            !!}%
                            </strong> dari total keseluruhan</i></small><br>
                            <small><i style="color: transparent;"><strong style="font-size: 16px;"></strong>-</i></small>
                            <small><i style="color: transparent;"><strong style="font-size: 16px;"></strong>-</i></small>
                            @endif
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars" style="color: white"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-light-blue">
                          <div class="inner">
                            @if($param_kelurahan == '0')
                            <p>Terbuka </p>
                            <h3 id="jumlah_rssehat">{{$jumlah_spalterbuka}} / <span style="font-size: 15px;">{{$jumlah_spal}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_spal == 0 ? 0 : ($jumlah_spalterbuka / $jumlah_spal) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_spal == 0 ? 0 : ($jumlah_spalterbuka / $getTotal_spal) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @else
                            <p>Sehat </p>
                            <h3 id="jumlah_rssehat">{{$jumlah_spalterbuka}} / <span style="font-size: 15px;">{{$jumlah_spal}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_spal == 0 ? 0 : ($jumlah_spalterbuka / $jumlah_spal) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kelurahan <b>{{ $param_kelurahan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_spal_kec == 0 ? 0 : ($jumlah_spalterbuka / $jumlah_spal_kec) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_spal == 0 ? 0 : ($jumlah_spalterbuka / $getTotal_spal) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @endif
                          </div>
                          <div class="icon">
                            <i class="ion ion-checkmark" style="color: white"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-red">
                          <div class="inner">
                            @if($param_kelurahan == '0')
                            <p>Tertutup </p>
                            <h3 id="jumlah_rssehat">{{$jumlah_spaltertutup}} / <span style="font-size: 15px;">{{$jumlah_spal}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_spal == 0 ? 0 : ($jumlah_spaltertutup / $jumlah_spal) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_spal == 0 ? 0 : ($jumlah_spaltertutup / $getTotal_spal) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @else
                            <p>Sehat </p>
                            <h3 id="jumlah_rssehat">{{$jumlah_spaltertutup}} / <span style="font-size: 15px;">{{$jumlah_spaltertutup}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_spal == 0 ? 0 : ($jumlah_spaltertutup / $jumlah_spal) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kelurahan <b>{{ $param_kelurahan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_spal_kec == 0 ? 0 : ($jumlah_spaltertutup / $jumlah_spal_kec) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_spal == 0 ? 0 : ($jumlah_spaltertutup / $getTotal_spal) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @endif
                          </div>
                          <div class="icon">
                            <i class="ion ion-close" style="color: white"></i>
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
                            <p>Lihat detail /RW</p>
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
                            @if($param_kelurahan == '0')
                            <p><strong>Total</strong></p>
                            <h3>{{$jumlah_tps}} / <span style="font-size: 15px;">{{$getTotal_tps}}</span></h3>
                            <small><i><strong style="font-size: 16px;">
                              {!!
                              
                              number_format(
                                $getTotal_tps == 0 ? 0 : ($jumlah_tps / $getTotal_tps) * 100, 2
                              )
                              
                            !!}%
                            </strong> dari total keseluruhan</i></small>
                            @else
                            <p><strong>Total</strong></p>
                            <h3 id="jumlah_rs">{{$jumlah_tps}} / <span style="font-size: 15px;">{{$getTotal_tps}}</span></h3>
                            <small><i><strong style="font-size: 16px;">
                              {!!
                              
                              number_format(
                                $getTotal_tps == 0 ? 0 : ($jumlah_tps / $getTotal_tps) * 100, 2
                              )
                              
                            !!}%
                            </strong> dari total keseluruhan</i></small><br>
                            <small><i style="color: transparent;"><strong style="font-size: 16px;"></strong>-</i></small>
                            <small><i style="color: transparent;"><strong style="font-size: 16px;"></strong>-</i></small>
                            @endif
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars" style="color: white"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-light-blue">
                          <div class="inner">
                            @if($param_kelurahan == '0')
                            <p>Dipilah / Organik</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_tpsorganik}} / <span style="font-size: 15px;">{{$jumlah_tps}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_tps == 0 ? 0 : ($jumlah_tpsorganik / $jumlah_tps) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_tps == 0 ? 0 : ($jumlah_tpsorganik / $getTotal_tps) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @else
                            <p>Dipilah / Organik</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_tpsorganik}} / <span style="font-size: 15px;">{{$jumlah_tps}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_tps == 0 ? 0 : ($jumlah_tpsorganik / $jumlah_tps) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kelurahan <b>{{ $param_kelurahan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_tps_kec == 0 ? 0 : ($jumlah_tpsorganik / $jumlah_tps_kec) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_tps == 0 ? 0 : ($jumlah_tpsorganik / $getTotal_tps) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @endif
                            <!-- <p>Dipilah/ Organik</p>
                            <h3 id="jumlahsehat">{{$jumlah_tpsorganik}}   / <span style="font-size: 15px;">{{$jumlah_tps}}</span></h3>
                              <small><i><strong style="font-size: 16px;">{!!
                              number_format($jumlah_tps == 0 ? 0 : ($jumlah_tpsorganik / $jumlah_tps) * 100, 2)
                            !!}%</strong> dari total data</i></small> -->
                          </div>
                          <div class="icon">
                            <i class="ion ion-checkmark" style="color: white"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-red">
                          <div class="inner">
                            @if($param_kelurahan == '0')
                            <p>Tidak dipilah / dibuang</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_tpsdibuang}} / <span style="font-size: 15px;">{{$jumlah_tps}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_tps == 0 ? 0 : ($jumlah_tpsdibuang / $jumlah_tps) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_tps == 0 ? 0 : ($jumlah_tpsdibuang / $getTotal_tps) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @else
                            <p>Tidak dipilah / dibuang</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_tpsdibuang}} / <span style="font-size: 15px;">{{$jumlah_tps}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_tps == 0 ? 0 : ($jumlah_tpsdibuang / $jumlah_tps) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kelurahan <b>{{ $param_kelurahan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_tps_kec == 0 ? 0 : ($jumlah_tpsdibuang / $jumlah_tps_kec) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_tps == 0 ? 0 : ($jumlah_tpsdibuang / $getTotal_tps) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @endif
                            <!-- <p>Tidak Dipilah/ Dibuang</p>
                            <h3 id="jumlahtidaksehat">{{$jumlah_tpsdibuang}} / <span style="font-size: 15px;">{{$jumlah_tps}}</span></h3>
                              <small><i><strong style="font-size: 16px;">{!!
                              number_format($jumlah_tps == 0 ? 0 : ($jumlah_tpsdibuang / $jumlah_tps) * 100, 2)
                            !!}%</strong> dari total data</i></small> -->
                          </div>
                          <div class="icon">
                            <i class="ion ion-close" style="color: white"></i>
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
                            <p>Lihat detail /RW</p>
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
                            @if($param_kelurahan == '0')
                            <p><strong>Total</strong></p>
                            <h3>{{$jumlah_pjb}} / <span style="font-size: 15px;">{{$getTotal_pjb}}</span></h3>
                            <small><i><strong style="font-size: 16px;">
                              {!!
                              
                              number_format(
                                $getTotal_pjb == 0 ? 0 : ($jumlah_pjb / $getTotal_pjb) * 100, 2
                              )
                              
                            !!}%
                            </strong> dari total keseluruhan</i></small>
                            @else
                            <p><strong>Total</strong></p>
                            <h3>{{$jumlah_pjb}} / <span style="font-size: 15px;">{{$getTotal_pjb}}</span></h3>
                            <small><i><strong style="font-size: 16px;">
                              {!!
                              
                              number_format(
                                $getTotal_pjb == 0 ? 0 : ($jumlah_pjb / $getTotal_pjb) * 100, 2
                              )
                              
                            !!}%
                            </strong> dari total keseluruhan</i></small><br>
                            <small><i style="color: transparent;"><strong style="font-size: 16px;"></strong>-</i></small>
                            <small><i style="color: transparent;"><strong style="font-size: 16px;"></strong>-</i></small>
                            @endif
                            <!-- <p>Jumlah</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_pjb}}</h3>
                            <small><i><strong style="font-size: 16px;">-</strong></i></small> -->
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars" style="color: white"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-light-blue">
                          <div class="inner">
                            @if($param_kelurahan == '0')
                            <p>Tidak ada jentik</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_tidakpjb}} / <span style="font-size: 15px;">{{$jumlah_pjb}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_pjb == 0 ? 0 : ($jumlah_tidakpjb / $jumlah_pjb) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_pjb == 0 ? 0 : ($jumlah_tidakpjb / $getTotal_pjb) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @else
                            <p>Tidak ada jentik</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_tidakpjb}} / <span style="font-size: 15px;">{{$jumlah_pjb}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_pjb == 0 ? 0 : ($jumlah_tidakpjb / $jumlah_pjb) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kelurahan <b>{{ $param_kelurahan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_pjb_kec == 0 ? 0 : ($jumlah_tidakpjb / $jumlah_pjb_kec) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_pjb == 0 ? 0 : ($jumlah_tidakpjb / $getTotal_tps) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @endif
                              <!-- <p>Tidak Ada Jentik</p>
                              <h3>{{$jumlah_tidakpjb}} / <span style="font-size: 15px;">{{$jumlah_pjb}}</span> </h3>
                              <small><i><strong style="font-size: 16px;">{!!
                              number_format($jumlah_pjb == 0 ? 0 : ($jumlah_tidakpjb / $jumlah_pjb) * 100, 2)
                            !!}%</strong> dari total data</i></small> -->
                          </div>
                          <div class="icon">
                            <i class="ion ion-checkmark" style="color: white"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-red">
                          <div class="inner">
                            @if($param_kelurahan == '0')
                            <p>Tidak ada jentik</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_adapjb}} / <span style="font-size: 15px;">{{$jumlah_pjb}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_pjb == 0 ? 0 : ($jumlah_adapjb / $jumlah_pjb) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_pjb == 0 ? 0 : ($jumlah_adapjb / $getTotal_pjb) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @else
                            <p>Tidak ada jentik</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_adapjb}} / <span style="font-size: 15px;">{{$jumlah_pjb}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_pjb == 0 ? 0 : ($jumlah_adapjb / $jumlah_pjb) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kelurahan <b>{{ $param_kelurahan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_pjb_kec == 0 ? 0 : ($jumlah_adapjb / $jumlah_pjb_kec) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_pjb == 0 ? 0 : ($jumlah_adapjb / $getTotal_pjb) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @endif
                            <!-- <p>Ada Jentik </p>
                            <h3>{{$jumlah_adapjb}} / <span style="font-size: 15px;">{{$jumlah_pjb}}</span></h3>
                              <small><i><strong style="font-size: 16px;">{!!
                              number_format($jumlah_pjb == 0 ? 0 : ($jumlah_adapjb / $jumlah_pjb) * 100, 2)
                            !!}%</strong> dari total data</i></small> -->
                          </div>
                          <div class="icon">
                            <i class="ion ion-close" style="color: white"></i>
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
                            <p>Lihat detail /RW</p>
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
                            @if($param_kelurahan == '0')
                            <p><strong>Total</strong></p>
                            <h3 id="jumlah_rs">{{$jumlah_jamban}} / <span style="font-size: 15px;">{{$getTotal_jamban}}</span></h3>
                            <small><i><strong style="font-size: 16px;">
                              {!!
                              
                              number_format(
                                $getTotal_jamban == 0 ? 0 : ($jumlah_jamban / $getTotal_jamban) * 100, 2
                              )
                              
                            !!}%
                            </strong> dari total keseluruhan</i></small>
                            @else
                            <p><strong>Total</strong></p>
                            <h3 id="jumlah_rs">{{$jumlah_jamban}} / <span style="font-size: 15px;">{{$getTotal_jamban}}</span></h3>
                            <small><i><strong style="font-size: 16px;">
                              {!!
                              
                              number_format(
                                $getTotal_jamban == 0 ? 0 : ($jumlah_jamban / $getTotal_jamban) * 100, 2
                              )
                              
                            !!}%
                            </strong> dari total keseluruhan</i></small><br>
                            <small><i style="color: transparent;"><strong style="font-size: 16px;"></strong>-</i></small>
                            <small><i style="color: transparent;"><strong style="font-size: 16px;"></strong>-</i></small>
                            @endif
                            <!-- <p>Total</p>
                            <h3>{{$jumlah_jamban}}</h3>
                            <small><i><strong style="font-size: 16px;">-</strong></i></small> -->
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars" style="color: white"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-light-blue">
                          <div class="inner">
                            @if($param_kelurahan == '0')
                            <p>Koya / Empang</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_koya}} / <span style="font-size: 15px;">{{$jumlah_jamban}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_jamban == 0 ? 0 : ($jumlah_koya / $jumlah_jamban) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_jamban == 0 ? 0 : ($jumlah_koya / $getTotal_jamban) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @else
                            <p>Koya / Empang</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_koya}} / <span style="font-size: 15px;">{{$jumlah_jamban}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_jamban == 0 ? 0 : ($jumlah_koya / $jumlah_jamban) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kelurahan <b>{{ $param_kelurahan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_jamban_kec == 0 ? 0 : ($jumlah_koya / $jumlah_jamban_kec) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_jamban == 0 ? 0 : ($jumlah_koya / $getTotal_jamban) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @endif
                            <!-- <h3>{{$jumlah_koya}} / <span style="font-size: 15px;">{{$jumlah_jamban}}</span></h3>
                              <p>Koya/Empang</p>
                              <small><i><strong style="font-size: 16px;">{!!
                              number_format($jumlah_jamban == 0 ? 0 : ($jumlah_koya / $jumlah_jamban) * 100, 2)
                            !!}%</strong> dari total jamban</i></small> -->
                          </div>
                          <div class="icon">
                            <i class="ion ion-checkmark" style="color: white"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-red">
                          <div class="inner">
                            @if($param_kelurahan == '0')
                            <p>Kali</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_kali}} / <span style="font-size: 15px;">{{$jumlah_jamban}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_jamban == 0 ? 0 : ($jumlah_kali / $jumlah_jamban) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_jamban == 0 ? 0 : ($jumlah_kali / $getTotal_jamban) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @else
                            <p>Kali</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_kali}} / <span style="font-size: 15px;">{{$jumlah_jamban}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_jamban == 0 ? 0 : ($jumlah_kali / $jumlah_jamban) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kelurahan <b>{{ $param_kelurahan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_jamban_kec == 0 ? 0 : ($jumlah_kali / $jumlah_jamban_kec) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_jamban == 0 ? 0 : ($jumlah_kali / $getTotal_jamban) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @endif
                            <!-- <p>Kali</p>
                            <h3 id="jumlahtidaksehat" style="color: white">{{$jumlah_kali}} / <span style="font-size: 15px;">{{$jumlah_jamban}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              number_format($jumlah_jamban == 0 ? 0 : ($jumlah_kali / $jumlah_jamban) * 100, 2)
                            !!}%</strong> dari total jamban</i></small> -->
                          </div>
                          <div class="icon">
                            <i class="ion ion-close"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-light-blue">
                          <div class="inner">
                            @if($param_kelurahan == '0')
                            <p>Helikopter</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_helikopter}} / <span style="font-size: 15px;">{{$jumlah_jamban}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_jamban == 0 ? 0 : ($jumlah_helikopter / $jumlah_jamban) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_jamban == 0 ? 0 : ($jumlah_helikopter / $getTotal_jamban) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @else
                            <p>Helikopter</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_helikopter}} / <span style="font-size: 15px;">{{$jumlah_jamban}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_jamban == 0 ? 0 : ($jumlah_helikopter / $jumlah_jamban) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kelurahan <b>{{ $param_kelurahan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_jamban_kec == 0 ? 0 : ($jumlah_helikopter / $jumlah_jamban_kec) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_jamban == 0 ? 0 : ($jumlah_helikopter / $getTotal_jamban) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @endif
                            <!-- <p>Helikopter</p>
                            <h3 id="jumlahsehat">{{$jumlah_helikopter}} / <span style="font-size: 15px;">{{$jumlah_jamban}}</span></h3>
                              <small><i><strong style="font-size: 16px;">{!!
                              number_format($jumlah_jamban == 0 ? 0 : ($jumlah_helikopter / $jumlah_jamban) * 100, 2)
                            !!}%</strong> dari total jamban</i></small> -->
                          </div>
                          <div class="icon">
                            <i class="ion ion-checkmark" style="color: white"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-red">
                          <div class="inner">
                            @if($param_kelurahan == '0')
                            <p>Septik</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_septik}} / <span style="font-size: 15px;">{{$jumlah_jamban}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_jamban == 0 ? 0 : ($jumlah_septik / $jumlah_jamban) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_jamban == 0 ? 0 : ($jumlah_septik / $getTotal_jamban) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @else
                            <p>Septik</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_septik}} / <span style="font-size: 15px;">{{$jumlah_jamban}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_jamban == 0 ? 0 : ($jumlah_septik / $jumlah_jamban) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kelurahan <b>{{ $param_kelurahan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_jamban_kec == 0 ? 0 : ($jumlah_septik / $jumlah_jamban_kec) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_jamban == 0 ? 0 : ($jumlah_septik / $getTotal_jamban) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @endif
                            <!-- <p>Septik Tank</p>
                            <h3>{{$jumlah_septik}} / <span style="font-size: 15px;">{{$jumlah_jamban}}</span></h3>
                              <small><i><strong style="font-size: 16px;">{!!
                              number_format($jumlah_jamban == 0 ? 0 : ($jumlah_septik / $jumlah_jamban) * 100, 2)
                            !!}%</strong> dari total jamban</i></small> -->
                          </div>
                          <div class="icon">
                            <i class="ion ion-close" style="color: white"></i>
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
                        @if($param_kelurahan == '0')
                            <p><strong>Total</strong></p>
                            <h3 id="jumlah_rs">{{$jumlah_pkl}} / <span style="font-size: 15px;">{{$getTotal_pkl}}</span></h3>
                            <small><i><strong style="font-size: 16px;">
                              {!!
                              
                              number_format(
                                $getTotal_pkl == 0 ? 0 : ($jumlah_pkl / $getTotal_pkl) * 100, 2
                              )
                              
                            !!}%
                            </strong> dari total keseluruhan</i></small>
                            @else
                              <p><strong>Total</strong></p>
                            <h3 id="jumlah_rs">{{$jumlah_pkl}} / <span style="font-size: 15px;">{{$getTotal_pkl}}</span></h3>
                            <small><i><strong style="font-size: 16px;">
                              {!!
                              
                              number_format(
                                $getTotal_pkl == 0 ? 0 : ($jumlah_pkl / $getTotal_pkl) * 100, 2
                              )
                              
                            !!}%
                            </strong> dari total keseluruhan</i></small>
                            @endif
                            <div class="icon">
                              <i class="ion ion-stats-bars" style="color: white"></i>
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-xs-6">
                      <div class="small-box bg-light-blue">
                        <div class="inner">
                          @if($param_kelurahan == '0')
                            <p>Dalam gedung</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_pkldalam}} / <span style="font-size: 15px;">{{$jumlah_pkl}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_pkl == 0 ? 0 : ($jumlah_pkldalam / $jumlah_pkl) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_pkl == 0 ? 0 : ($jumlah_pkldalam / $getTotal_pkl) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @else
                            <p>Dalam gedung</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_pkldalam}} / <span style="font-size: 15px;">{{$jumlah_pkl}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_pkl == 0 ? 0 : ($jumlah_pkldalam / $jumlah_pkl) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kelurahan <b>{{ $param_kelurahan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_pkl_kec == 0 ? 0 : ($jumlah_pkldalam / $jumlah_pkl_kec) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_pkl == 0 ? 0 : ($jumlah_pkldalam / $getTotal_pkl) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @endif
                          <!-- @if($param_kelurahan == '0')
                            <p>Dalam Gedung</p>
                            <h3 id="jumlahsehat">{{ $jumlah_pkldalam }} / <span style="font-size: 15px;">{{ $jumlah_pkl }}</span></h3>
                              <small><i><strong style="font-size: 16px;">{!!

                                number_format($jumlah_pkl == 0 ? 0 : ($jumlah_pkldalam / $jumlah_pkl) * 100, 2)
                              
                              !!}%</strong> dari total data</i></small><br>
                              <small><i><strong style="font-size: 16px;">{!!
                                
                                number_format($getTotal_pkl == 0 ? 0 : ($jumlah_pkldalam / $getTotal_pkl) * 100, 2)
                              
                              !!}%</strong> dari total data</i></small>
                            @else
                            <h3 id="jumlahsehat">{{ $jumlah_pkldalam }} / <span style="font-size: 15px;">{{ $jumlah_pkl }}</span></h3>
                              <small><i><strong style="font-size: 16px;">{!!
                                number_format($jumlah_pkl == 0 ? 0 : ($jumlah_pkldalam / $jumlah_pkl) * 100, 2)
                              !!}%</strong> dari total data</i></small><br>
                              <small><i><strong style="font-size: 16px;">{!!
                                number_format($getTotal_pkl == 0 ? 0 : ($jumlah_pkldalam / $getTotal_pkl) * 100, 2)
                              !!}%</strong> dari total data</i></small>
                            @endif -->
                        </div>
                        <div class="icon">
                          <i class="ion ion-checkmark" style="color: white"></i>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-xs-6">
                      <div class="small-box bg-red">
                        <div class="inner">
                          @if($param_kelurahan == '0')
                            <p>Luar gedung</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_pklluar}} / <span style="font-size: 15px;">{{$jumlah_pkl}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_pkl == 0 ? 0 : ($jumlah_pklluar / $jumlah_pkl) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_pkl == 0 ? 0 : ($jumlah_pklluar / $getTotal_pkl) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @else
                            <p>Luar gedung</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_pklluar}} / <span style="font-size: 15px;">{{$jumlah_pkl}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_pkl == 0 ? 0 : ($jumlah_pklluar / $jumlah_pkl) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kelurahan <b>{{ $param_kelurahan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_pkl_kec == 0 ? 0 : ($jumlah_pklluar / $jumlah_pkl_kec) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_pkl == 0 ? 0 : ($jumlah_pklluar / $getTotal_pkl) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @endif
                        </div>
                        <div class="icon">
                          <i class="ion ion-close" style="color: white"></i>
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
                            @if($param_kelurahan == '0')
                            <p><strong>Total</strong></p>
                            <h3 id="jumlah_rs">{{$jumlah_jb}} / <span style="font-size: 15px;">{{$getTotal_jb}}</span></h3>
                            <small><i><strong style="font-size: 16px;">
                              {!!
                              
                              number_format(
                                $getTotal_jb == 0 ? 0 : ($jumlah_jb / $getTotal_jb) * 100, 2
                              )
                              
                            !!}%
                            </strong> dari total keseluruhan</i></small>
                            @else
                            <p><strong>Total</strong></p>
                            <h3 id="jumlah_rs">{{$jumlah_jb}} / <span style="font-size: 15px;">{{$getTotal_jb}}</span></h3>
                            <small><i><strong style="font-size: 16px;">
                              {!!
                              
                              number_format(
                                $getTotal_jb == 0 ? 0 : ($jumlah_jb / $getTotal_jb) * 100, 2
                              )
                              
                            !!}%
                            </strong> dari total keseluruhan</i></small><br>
                            <small><i style="color: transparent;"><strong style="font-size: 16px;"></strong>-</i></small>
                            <small><i style="color: transparent;"><strong style="font-size: 16px;"></strong>-</i></small>
                            @endif
                            <!-- <p>Jumlah</p>
                            <h3>{{$jumlah_jb}}</h3>
                            <small><i><strong style="font-size: 16px;">-</strong></i></small> -->
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars" style="color: white"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-light-blue">
                          <div class="inner">
                            @if($param_kelurahan == '0')
                            <p>Penyimpangan sedikit</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_jblayak}} / <span style="font-size: 15px;">{{$jumlah_jb}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_jb == 0 ? 0 : ($jumlah_jblayak / $jumlah_jb) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_jb == 0 ? 0 : ($jumlah_jblayak / $getTotal_jb) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @else
                            <p>Penyimpangan sedikit</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_jblayak}} / <span style="font-size: 15px;">{{$jumlah_jb}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_jb == 0 ? 0 : ($jumlah_jblayak / $jumlah_jb) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kelurahan <b>{{ $param_kelurahan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_jb_kec == 0 ? 0 : ($jumlah_jblayak / $jumlah_jb_kec) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_jb == 0 ? 0 : ($jumlah_jblayak / $getTotal_jb) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @endif
                            <!-- <p>Penyimpangan Sedikit</p>
                            <h3>{{$jumlah_jblayak}} / <span style="font-size: 15px;">{{$jumlah_jb}}</span></h3>
                              <small><i><strong style="font-size: 16px;">{!!
                              number_format($jumlah_jb == 0 ? 0 : ($jumlah_jblayak / $jumlah_jb) * 100, 2)
                            !!}%</strong> dari total data</i></small> -->
                          </div>
                          <div class="icon">
                            <i class="ion ion-checkmark" style="color: white"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-red">
                          <div class="inner">
                            @if($param_kelurahan == '0')
                            <p>Penyimpangan banyak</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_jbtlayak}} / <span style="font-size: 15px;">{{$jumlah_jb}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_jb == 0 ? 0 : ($jumlah_jbtlayak / $jumlah_jb) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_jb == 0 ? 0 : ($jumlah_jbtlayak / $getTotal_jb) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @else
                            <p>Penyimpangan banyak</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_jbtlayak}} / <span style="font-size: 15px;">{{$jumlah_jb}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_jb == 0 ? 0 : ($jumlah_jbtlayak / $jumlah_jb) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kelurahan <b>{{ $param_kelurahan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_jb_kec == 0 ? 0 : ($jumlah_jbtlayak / $jumlah_jb_kec) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_jb == 0 ? 0 : ($jumlah_jbtlayak / $getTotal_jb) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @endif
                            <!-- <p>Penyimpangan Banyak</p>
                            <h3>{{$jumlah_jbtlayak}} / <span style="font-size: 15px;">{{$jumlah_jb}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              number_format($jumlah_jb == 0 ? 0 : ($jumlah_jbtlayak / $jumlah_jb) * 100, 2)
                            !!}%</strong> dari total data</i></small> -->
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
                            @if($param_kelurahan == '0')
                            <p><strong>Total</strong></p>
                            <h3 id="jumlah_rs">{{$jumlah_kuliner}} / <span style="font-size: 15px;">{{$getTotal_kuliner}}</span></h3>
                            <small><i><strong style="font-size: 16px;">
                              {!!
                              
                              number_format(
                                $getTotal_kuliner == 0 ? 0 : ($jumlah_kuliner / $getTotal_kuliner) * 100, 2
                              )
                              
                            !!}%
                            </strong> dari total keseluruhan</i></small>
                            @else
                            <p><strong>Total</strong></p>
                            <h3 id="jumlah_rs">{{$jumlah_kuliner}} / <span style="font-size: 15px;">{{$getTotal_kuliner}}</span></h3>
                            <small><i><strong style="font-size: 16px;">
                              {!!
                              
                              number_format(
                                $getTotal_kuliner == 0 ? 0 : ($jumlah_kuliner / $getTotal_kuliner) * 100, 2
                              )
                              
                            !!}%
                            </strong> dari total keseluruhan</i></small><br>
                            <small><i style="color: transparent;"><strong style="font-size: 16px;"></strong>-</i></small>
                            <small><i style="color: transparent;"><strong style="font-size: 16px;"></strong>-</i></small>
                            @endif
                            <!-- <p>Total</p>
                            <h3>{{$jumlah_kuliner}}</h3>
                            <small><i><strong style="font-size: 16px;">-</strong></i></small> -->
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-light-blue">
                          <div class="inner">
                            @if($param_kelurahan == '0')
                            <p>Laik Hygiene Sanitasi</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_kullayak}} / <span style="font-size: 15px;">{{$jumlah_kuliner}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_kuliner == 0 ? 0 : ($jumlah_kullayak / $jumlah_kuliner) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_kuliner == 0 ? 0 : ($jumlah_kullayak / $getTotal_kuliner) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @else
                            <p>Laik Hygiene Sanitasi</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_kullayak}} / <span style="font-size: 15px;">{{$jumlah_kuliner}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_kuliner == 0 ? 0 : ($jumlah_kullayak / $jumlah_kuliner) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kelurahan <b>{{ $param_kelurahan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_kuliner_kec == 0 ? 0 : ($jumlah_kullayak / $jumlah_kuliner_kec) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_kuliner == 0 ? 0 : ($jumlah_kullayak / $getTotal_kuliner) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @endif
                          </div>
                          <div class="icon">
                            <i class="ion ion-checkmark"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-red">
                          <div class="inner">
                            <p>Tidak Laik Hygiene Sanitasi</p>
                            <h3>{{$jumlah_kultlayak}} / <span style="font-size: 15px;">{{$jumlah_kuliner}}</span></h3>
                            
                            <small><i><strong style="font-size: 16px;">{!!
                              number_format($jumlah_kuliner == 0 ? 0 : ($jumlah_kultlayak / $jumlah_kuliner) * 100, 2)
                            !!}%</strong> dari total data</i></small>
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
                            @if($param_kelurahan == '0')
                            <p><strong>Total</strong></p>
                            <h3 id="jumlah_rs">{{$jumlah_dam}} / <span style="font-size: 15px;">{{$getTotal_dam}}</span></h3>
                            <small><i><strong style="font-size: 16px;">
                              {!!
                              
                              number_format(
                                $getTotal_dam == 0 ? 0 : ($jumlah_dam / $getTotal_dam) * 100, 2
                              )
                              
                            !!}%
                            </strong> dari total keseluruhan</i></small>
                            @else
                            <p><strong>Total</strong></p>
                            <h3 id="jumlah_rs">{{$jumlah_dam}} / <span style="font-size: 15px;">{{$getTotal_dam}}</span></h3>
                            <small><i><strong style="font-size: 16px;">
                              {!!
                              
                              number_format(
                                $getTotal_dam == 0 ? 0 : ($jumlah_dam / $getTotal_dam) * 100, 2
                              )
                              
                            !!}%
                            </strong> dari total keseluruhan</i></small><br>
                            <small><i style="color: transparent;"><strong style="font-size: 16px;"></strong>-</i></small>
                            <small><i style="color: transparent;"><strong style="font-size: 16px;"></strong>-</i></small>
                            @endif
                            <!-- <p>Total</p>
                            <h3 id="jumlah">{{$jumlah_dam}}</h3>
                            <small><i><strong style="font-size: 16px;">-</strong></i></small> -->
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-light-blue">
                          <div class="inner">
                            @if($param_kelurahan == '0')
                            <p>Memenuhi persyaratan</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_damlayak}} / <span style="font-size: 15px;">{{$jumlah_dam}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_dam == 0 ? 0 : ($jumlah_damlayak / $jumlah_dam) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_dam == 0 ? 0 : ($jumlah_damlayak / $getTotal_dam) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @else
                            <p>Memenuhi persyaratan</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_damlayak}} / <span style="font-size: 15px;">{{$jumlah_dam}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_dam == 0 ? 0 : ($jumlah_damlayak / $jumlah_dam) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kelurahan <b>{{ $param_kelurahan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_dam_kec == 0 ? 0 : ($jumlah_damlayak / $jumlah_dam_kec) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_dam == 0 ? 0 : ($jumlah_damlayak / $getTotal_dam) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @endif
                            <!-- <p>Memenuhi Persyaratan</p>
                            <h3>{{$jumlah_damlayak}} / <span style="font-size: 15px;">{{$jumlah_dam}}</span></h3>
                              
                              <small><i><strong style="font-size: 16px;">{!!
                              number_format($jumlah_dam == 0 ? 0 : ($jumlah_damlayak / $jumlah_dam) * 100, 2)
                            !!}%</strong> dari total data</i></small> -->
                          </div>
                          <div class="icon">
                            <i class="ion ion-checkmark"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-red">
                          <div class="inner">
                            <p>Belum Memenuhi Persyaratan</p>
                            <h3>{{$jumlah_damtlayak}} / <span style="font-size: 15px;">{{$jumlah_dam}}</span></h3>
                              
                              <small><i><strong style="font-size: 16px;">{!!
                              number_format($jumlah_dam == 0 ? 0 : ($jumlah_damtlayak / $jumlah_dam) * 100, 2)
                            !!}%</strong> dari total data</i></small>
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
                  <div class="line-height-box-body bg-light-blue"></div>
                  <div class="row">
                    <div class="col-lg-4 col-xs-6">
                      <div class="small-box bg-olive">
                        <div class="inner">
                          @if($param_kelurahan == '0')
                            <p><strong>Total</strong></p>
                            <h3 id="jumlah_rs">{{$jumlah_masjid}} / <span style="font-size: 15px;">{{$getTotal_masjid}}</span></h3>
                            <small><i><strong style="font-size: 16px;">
                              {!!
                              
                              number_format(
                                $getTotal_masjid == 0 ? 0 : ($jumlah_masjid / $getTotal_masjid) * 100, 2
                              )
                              
                            !!}%
                            </strong> dari total keseluruhan</i></small>
                            @else
                            <p><strong>Total</strong></p>
                            <h3 id="jumlah_rs">{{$jumlah_masjid}} / <span style="font-size: 15px;">{{$getTotal_masjid}}</span></h3>
                            <small><i><strong style="font-size: 16px;">
                              {!!
                              
                              number_format(
                                $getTotal_masjid == 0 ? 0 : ($jumlah_masjid / $getTotal_masjid) * 100, 2
                              )
                              
                            !!}%
                            </strong> dari total keseluruhan</i></small><br>
                            <small><i style="color: transparent;"><strong style="font-size: 16px;"></strong>-</i></small>
                            <small><i style="color: transparent;"><strong style="font-size: 16px;"></strong>-</i></small>
                            @endif
                          <!-- <p>Total</p>
                          <h3>{{$jumlah_masjid}}</h3>
                          <small><i><strong style="font-size: 16px;">-</strong></i></small> -->
                        </div>
                        <div class="icon">
                          <i class="ion ion-stats-bars"></i>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-xs-6">
                      <div class="small-box bg-light-blue">
                        <div class="inner">
                          @if($param_kelurahan == '0')
                            <p>Layak</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_masjidlayak}} / <span style="font-size: 15px;">{{$jumlah_masjid}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_masjid == 0 ? 0 : ($jumlah_masjidlayak / $jumlah_masjid) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_masjid == 0 ? 0 : ($jumlah_masjidlayak / $getTotal_masjid) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @else
                            <p>Layak</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_masjidlayak}} / <span style="font-size: 15px;">{{$jumlah_masjid}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_masjid == 0 ? 0 : ($jumlah_masjidlayak / $jumlah_masjid) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kelurahan <b>{{ $param_kelurahan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_masjid_kec == 0 ? 0 : ($jumlah_masjidlayak / $jumlah_masjid_kec) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_masjid == 0 ? 0 : ($jumlah_masjidlayak / $getTotal_masjid) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @endif
                          <!-- <p>Layak</p>
                          <h3 id="ibadahsehat">{{$jumlah_masjidlayak}} / <span style="font-size: 15px;">{{$jumlah_masjid}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              number_format($jumlah_masjid == 0 ? 0 : ($jumlah_masjidlayak / $jumlah_masjid) * 100, 2)
                            !!}%</strong> dari total data</i></small> -->
                        </div>
                        <div class="icon">
                          <i class="ion ion-checkmark"></i>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-xs-6">
                      <div class="small-box bg-red">
                        <div class="inner">
                          @if($param_kelurahan == '0')
                            <p>Tidak Layak</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_masjidtlayak}} / <span style="font-size: 15px;">{{$jumlah_masjid}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_masjid == 0 ? 0 : ($jumlah_masjidtlayak / $jumlah_masjid) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_masjid == 0 ? 0 : ($jumlah_masjidtlayak / $getTotal_masjid) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @else
                            <p>Tidak Layak</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_masjidtlayak}} / <span style="font-size: 15px;">{{$jumlah_masjid}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_masjid == 0 ? 0 : ($jumlah_masjidtlayak / $jumlah_masjid) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kelurahan <b>{{ $param_kelurahan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_masjid_kec == 0 ? 0 : ($jumlah_masjidtlayak / $jumlah_masjid_kec) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_masjid == 0 ? 0 : ($jumlah_masjidtlayak / $getTotal_masjid) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @endif
                          <!-- <p>Tidak Layak</p>
                          <h3 id="ibadahnosehat">{{$jumlah_masjidtlayak}} / <span style="font-size: 15px;">{{$jumlah_masjid}}</span></h3>
                            
                            <small><i><strong style="font-size: 16px;">{!!
                              number_format($jumlah_masjid == 0 ? 0 : ($jumlah_masjidtlayak / $jumlah_masjid) * 100, 2)
                            !!}%</strong> dari total data</i></small> -->
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
                  <div class="line-height-box-body bg-light-blue"></div>
                  <div class="row">
                    <div class="col-lg-4 col-xs-6">
                      <div class="small-box bg-olive">
                        <div class="inner">
                          @if($param_kelurahan == '0')
                            <p><strong>Total</strong></p>
                            <h3 id="jumlah_rs">{{$jumlah_pasar}} / <span style="font-size: 15px;">{{$getTotal_pasar}}</span></h3>
                            <small><i><strong style="font-size: 16px;">
                              {!!
                              
                              number_format(
                                $getTotal_pasar == 0 ? 0 : ($jumlah_pasar / $getTotal_pasar) * 100, 2
                              )
                              
                            !!}%
                            </strong> dari total keseluruhan</i></small>
                            @else
                            <p><strong>Total</strong></p>
                            <h3 id="jumlah_rs">{{$jumlah_pasar}} / <span style="font-size: 15px;">{{$getTotal_pasar}}</span></h3>
                            <small><i><strong style="font-size: 16px;">
                              {!!
                              
                              number_format(
                                $getTotal_pasar == 0 ? 0 : ($jumlah_pasar / $getTotal_pasar) * 100, 2
                              )
                              
                            !!}%
                            </strong> dari total keseluruhan</i></small><br>
                            <small><i style="color: transparent;"><strong style="font-size: 16px;"></strong>-</i></small>
                            <small><i style="color: transparent;"><strong style="font-size: 16px;"></strong>-</i></small>
                            @endif
                          <!-- <p>Total</p>
                          <h3 id="jmlttupasar">{{$jumlah_pasar}}</h3>
                          <small><i><strong style="font-size: 16px;">-</strong></i></small> -->
                        </div>
                        <div class="icon">
                          <i class="ion ion-stats-bars"></i>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-xs-6">
                      <div class="small-box bg-light-blue">
                        <div class="inner">
                          @if($param_kelurahan == '0')
                            <p>Sehat</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_pasarlayak}} / <span style="font-size: 15px;">{{$jumlah_pasar}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_pasar == 0 ? 0 : ($jumlah_pasarlayak / $jumlah_pasar) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_pasar == 0 ? 0 : ($jumlah_pasarlayak / $getTotal_pasar) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @else
                            <p>Sehat</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_pasarlayak}} / <span style="font-size: 15px;">{{$jumlah_pasar}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_pasar == 0 ? 0 : ($jumlah_pasarlayak / $jumlah_pasar) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kelurahan <b>{{ $param_kelurahan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_pasar_kec == 0 ? 0 : ($jumlah_pasarlayak / $jumlah_pasar_kec) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_pasar == 0 ? 0 : ($jumlah_pasarlayak / $getTotal_pasar) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @endif
                          <!-- <p>Sehat </p>
                          <h3 id="pasarsehat">{{$jumlah_pasarlayak}} / <span style="font-size: 15px;">{{$jumlah_pasar}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              number_format($jumlah_pasar == 0 ? 0 : ($jumlah_pasarlayak / 1) * 100, 2)
                            !!}%</strong> dari total data</i></small> -->

                        </div>
                        <div class="icon">
                          <i class="ion ion-checkmark"></i>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-xs-6">
                      <div class="small-box bg-red">
                        <div class="inner">
                          @if($param_kelurahan == '0')
                            <p>Sehat</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_pasartlayak}} / <span style="font-size: 15px;">{{$jumlah_pasar}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_pasar == 0 ? 0 : ($jumlah_pasartlayak / $jumlah_pasar) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_pasar == 0 ? 0 : ($jumlah_pasartlayak / $getTotal_pasar) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @else
                            <p>Sehat</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_pasartlayak}} / <span style="font-size: 15px;">{{$jumlah_pasar}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_pasar == 0 ? 0 : ($jumlah_pasartlayak / $jumlah_pasar) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kelurahan <b>{{ $param_kelurahan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_pasar_kec == 0 ? 0 : ($jumlah_pasartlayak / $jumlah_pasar_kec) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_pasar == 0 ? 0 : ($jumlah_pasartlayak / $getTotal_pasar) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @endif
                          <!-- <p>Tidak sehat</p>
                          <h3 id="pasarnosehat">{{$jumlah_pasartlayak}} / <span style="font-size: 15px;">{{$jumlah_pasar}}</span></h3>
                            
                            <small><i><strong style="font-size: 16px;">{!!
                              number_format($jumlah_pasar == 0 ? 0 : ($jumlah_pasartlayak / $jumlah_pasar) * 100, 2)
                            !!}%</strong> dari total data</i></small> -->
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
                <div class="line-height-box-body bg-light-blue"></div>
                <div class="row">
                  <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-olive">
                      <div class="inner">
                        @if($param_kelurahan == '0')
                            <p><strong>Total</strong></p>
                            <h3 id="jumlah_rs">{{$jumlah_sekolah}} / <span style="font-size: 15px;">{{$getTotal_sekolah}}</span></h3>
                            <small><i><strong style="font-size: 16px;">
                              {!!
                              
                              number_format(
                                $getTotal_sekolah == 0 ? 0 : ($jumlah_sekolah / $getTotal_sekolah) * 100, 2
                              )
                              
                            !!}%
                            </strong> dari total keseluruhan</i></small>
                            @else
                            <p><strong>Total</strong></p>
                            <h3 id="jumlah_rs">{{$jumlah_sekolah}} / <span style="font-size: 15px;">{{$getTotal_sekolah}}</span></h3>
                            <small><i><strong style="font-size: 16px;">
                              {!!
                              
                              number_format(
                                $getTotal_sekolah == 0 ? 0 : ($jumlah_sekolah / $getTotal_sekolah) * 100, 2
                              )
                              
                            !!}%
                            </strong> dari total keseluruhan</i></small><br>
                            <small><i style="color: transparent;"><strong style="font-size: 16px;"></strong>-</i></small>
                            <small><i style="color: transparent;"><strong style="font-size: 16px;"></strong>-</i></small>
                            @endif
                        <!-- <p>Total</p>
                        <h3 id="jmlttusekolah">{{$jumlah_sekolah}}</h3>
                        <small><i><strong style="font-size: 16px;">-</strong></i></small> -->
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-light-blue">
                      <div class="inner">
                        @if($param_kelurahan == '0')
                            <p>Sehat</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_sekolahlayak}} / <span style="font-size: 15px;">{{$jumlah_sekolah}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_sekolah == 0 ? 0 : ($jumlah_sekolahlayak / $jumlah_sekolah) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_sekolah == 0 ? 0 : ($jumlah_sekolahlayak / $getTotal_sekolah) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @else
                            <p>Sehat</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_sekolahlayak}} / <span style="font-size: 15px;">{{$jumlah_sekolah}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_sekolah == 0 ? 0 : ($jumlah_sekolahlayak / $jumlah_sekolah) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kelurahan <b>{{ $param_kelurahan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_sekolah_kec == 0 ? 0 : ($jumlah_sekolahlayak / $jumlah_sekolah_kec) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_sekolah == 0 ? 0 : ($jumlah_sekolahlayak / $getTotal_sekolah) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @endif
                        <!-- <p>Sehat</p>
                        <h3 id="sekolahsehat">{{$jumlah_sekolahlayak}} / <span style="font-size: 15px;">{{$jumlah_sekolah}}</span></h3>
                        <small><i><strong style="font-size: 16px;">{!!
                              number_format($jumlah_sekolah == 0 ? 0 : ($jumlah_sekolahlayak / $jumlah_sekolah) * 100, 2)
                            !!}%</strong> dari total data</i></small> -->
                      </div>
                      <div class="icon">
                        <i class="ion ion-checkmark"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-red">
                      <div class="inner">
                        @if($param_kelurahan == '0')
                            <p>Tidak sehat</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_sekolahlayak}} / <span style="font-size: 15px;">{{$jumlah_sekolah}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_sekolah == 0 ? 0 : ($jumlah_sekolahlayak / $jumlah_sekolah) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_sekolah == 0 ? 0 : ($jumlah_sekolahtlayak / $getTotal_sekolah) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @else
                            <p>Tidak sehat</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_sekolahtlayak}} / <span style="font-size: 15px;">{{$jumlah_sekolah}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_sekolah == 0 ? 0 : ($jumlah_sekolahtlayak / $jumlah_sekolah) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kelurahan <b>{{ $param_kelurahan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_sekolah_kec == 0 ? 0 : ($jumlah_sekolahtlayak / $jumlah_sekolah_kec) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_sekolah == 0 ? 0 : ($jumlah_sekolahtlayak / $getTotal_sekolah) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @endif
                        <!-- <p>Tidak sehat</p>
                        <h3 id="sekolahnosehat">{{$jumlah_sekolahtlayak}} / <span style="font-size: 15px;">{{$jumlah_sekolah}}</span></h3>
                          
                          <small><i><strong style="font-size: 16px;">{!!
                              number_format($jumlah_sekolah == 0 ? 0 : ($jumlah_sekolahtlayak / $jumlah_sekolah) * 100, 2)
                            !!}%</strong> dari total data</i></small> -->
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
                <div class="line-height-box-body bg-light-blue"></div>
                <div class="row">
                  <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-olive">
                      <div class="inner">
                        @if($param_kelurahan == '0')
                            <p><strong>Total</strong></p>
                            <h3 id="jumlah_rs">{{$jumlah_pesantren}} / <span style="font-size: 15px;">{{$getTotal_pesantren}}</span></h3>
                            <small><i><strong style="font-size: 16px;">
                              {!!
                              
                              number_format(
                                $getTotal_pesantren == 0 ? 0 : ($jumlah_pesantren / $getTotal_pesantren) * 100, 2
                              )
                              
                            !!}%
                            </strong> dari total keseluruhan</i></small>
                            @else
                            <p><strong>Total</strong></p>
                            <h3 id="jumlah_rs">{{$jumlah_pesantren}} / <span style="font-size: 15px;">{{$getTotal_pesantren}}</span></h3>
                            <small><i><strong style="font-size: 16px;">
                              {!!
                              
                              number_format(
                                $getTotal_pesantren == 0 ? 0 : ($jumlah_pesantren / $getTotal_pesantren) * 100, 2
                              )
                              
                            !!}%
                            </strong> dari total keseluruhan</i></small><br>
                            <small><i style="color: transparent;"><strong style="font-size: 16px;"></strong>-</i></small>
                            <small><i style="color: transparent;"><strong style="font-size: 16px;"></strong>-</i></small>
                            @endif
                        <!-- <p>Total</p>
                        <h3 id="jmlttupesantren">{{$jumlah_pesantren}}</h3>
                        <small><i><strong style="font-size: 16px;">-</strong></i></small> -->
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-light-blue">
                      <div class="inner">
                        @if($param_kelurahan == '0')
                            <p>Sehat</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_pesantrenlayak}} / <span style="font-size: 15px;">{{$jumlah_pesantren}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_pesantren == 0 ? 0 : ($jumlah_pesantrenlayak / $jumlah_pesantren) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_pesantren == 0 ? 0 : ($jumlah_pesantrenlayak / $getTotal_pesantren) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @else
                            <p>Sehat</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_pesantrenlayak}} / <span style="font-size: 15px;">{{$jumlah_sekolah}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_pesantren == 0 ? 0 : ($jumlah_pesantrenlayak / $jumlah_pesantren) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kelurahan <b>{{ $param_kelurahan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_pesantren_kec == 0 ? 0 : ($jumlah_pesantrenlayak / $jumlah_pesantren_kec) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_pesantren == 0 ? 0 : ($jumlah_pesantrenlayak / $getTotal_pesantren) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @endif
                        <!-- <p>Sehat </p>
                        <h3 id="pesantrensehat">{{$jumlah_pesantrenlayak}} / <span style="font-size: 15px;">{{$jumlah_pesantren}}</span></h3>
                          
                          <small><i><strong style="font-size: 16px;">{!!
                              number_format($jumlah_pesantren == 0 ? 0 : ($jumlah_pesantrenlayak / $jumlah_pesantren) * 100, 2)
                            !!}%</strong> dari total data</i></small> -->
                      </div>
                      <div class="icon">
                        <i class="ion ion-checkmark"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-red">
                      <div class="inner">
                        @if($param_kelurahan == '0')
                            <p>Tidak Sehat</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_pesantrentlayak}} / <span style="font-size: 15px;">{{$jumlah_pesantren}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_pesantren == 0 ? 0 : ($jumlah_pesantrentlayak / $jumlah_pesantren) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_pesantren == 0 ? 0 : ($jumlah_pesantrentlayak / $getTotal_pesantren) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @else
                            <p>Tidak Sehat</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_pesantrentlayak}} / <span style="font-size: 15px;">{{$jumlah_pesantren}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_pesantren == 0 ? 0 : ($jumlah_pesantrentlayak / $jumlah_pesantren) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kelurahan <b>{{ $param_kelurahan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_pesantren_kec == 0 ? 0 : ($jumlah_pesantrentlayak / $jumlah_pesantren_kec) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_pesantren == 0 ? 0 : ($jumlah_pesantrentlayak / $getTotal_pesantren) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @endif
                        <!-- <p>Tidak sehat</p>
                        <h3 id="pesantrennosehat">{{$jumlah_pesantrentlayak}} / <span style="font-size: 15px;">{{$jumlah_pesantren}}</span></h3>
                          
                          <small><i><strong style="font-size: 16px;">{!!
                              number_format($jumlah_pesantren == 0 ? 0 : ($jumlah_pesantrentlayak / $jumlah_pesantren) * 100, 2)
                            !!}%</strong> dari total data</i></small> -->
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
                <div class="line-height-box-body bg-light-blue"></div>
                <div class="row">
                  <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-olive">
                      <div class="inner">
                        @if($param_kelurahan == '0')
                            <p><strong>Total</strong></p>
                            <h3 id="jumlah_rs">{{$jumlah_pusk}} / <span style="font-size: 15px;">{{$getTotal_pusk}}</span></h3>
                            <small><i><strong style="font-size: 16px;">
                              {!!
                              
                              number_format(
                                $getTotal_pusk == 0 ? 0 : ($jumlah_pusk / $getTotal_pusk) * 100, 2
                              )
                              
                            !!}%
                            </strong> dari total keseluruhan</i></small>
                            @else
                            <p><strong>Total</strong></p>
                            <h3 id="jumlah_rs">{{$jumlah_pusk}} / <span style="font-size: 15px;">{{$getTotal_pusk}}</span></h3>
                            <small><i><strong style="font-size: 16px;">
                              {!!
                              
                              number_format(
                                $getTotal_pusk == 0 ? 0 : ($jumlah_pusk / $getTotal_pusk) * 100, 2
                              )
                              
                            !!}%
                            </strong> dari total keseluruhan</i></small><br>
                            <small><i style="color: transparent;"><strong style="font-size: 16px;"></strong>-</i></small>
                            <small><i style="color: transparent;"><strong style="font-size: 16px;"></strong>-</i></small>
                            @endif
                        <!-- <p>Total</p>
                        <h3 id="jmlttupuskesmas">{{$jumlah_pusk}}</h3>
                        <small><i><strong style="font-size: 16px;">-</strong></i></small> -->
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-light-blue">
                      <div class="inner">
                        @if($param_kelurahan == '0')
                            <p>Sehat</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_pusklayak}} / <span style="font-size: 15px;">{{$jumlah_pusk}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_pusk == 0 ? 0 : ($jumlah_pusklayak / $jumlah_pusk) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_pusk == 0 ? 0 : ($jumlah_pusklayak / $getTotal_pusk) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @else
                            <p>Sehat</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_pusklayak}} / <span style="font-size: 15px;">{{$jumlah_pusk}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_pusk == 0 ? 0 : ($jumlah_pusklayak / $jumlah_pusk) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kelurahan <b>{{ $param_kelurahan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_pusk_kec == 0 ? 0 : ($jumlah_pusklayak / $jumlah_pusk_kec) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_pusk == 0 ? 0 : ($jumlah_pusklayak / $getTotal_pusk) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @endif
                        <!-- <p>Sehat </p>
                        <h3 id="puskesmassehat">{{$jumlah_pusklayak}} / <span style="font-size: 15px;">{{$jumlah_pusk}}</span></h3>
                          
                          <small><i><strong style="font-size: 16px;">{!!
                              number_format($jumlah_pusk == 0 ? 0 : ($jumlah_pusklayak / $jumlah_pusk) * 100, 2)
                            !!}%</strong> dari total data</i></small> -->
                      </div>
                      <div class="icon">
                        <i class="ion ion-checkmark"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-red">
                      <div class="inner">
                        @if($param_kelurahan == '0')
                            <p>Tidak Sehat</p>
                            <h3 id="jumlah_rssehat">{{ $jumlah_pusktlayak}} / <span style="font-size: 15px;">{{$jumlah_pusk}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_pusk == 0 ? 0 : ($jumlah_pusktlayak / $jumlah_pusk) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_pusk == 0 ? 0 : ($jumlah_pusktlayak / $getTotal_pusk) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @else
                            <p>Tidak Sehat</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_pusktlayak}} / <span style="font-size: 15px;">{{$jumlah_pusk}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_pusk == 0 ? 0 : ($jumlah_pusktlayak / $jumlah_pusk) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kelurahan <b>{{ $param_kelurahan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_pusk_kec == 0 ? 0 : ($jumlah_pusktlayak / $jumlah_pusk_kec) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_pusk == 0 ? 0 : ($jumlah_pusktlayak / $getTotal_pusk) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @endif
                        <!-- <p>Tidak sehat</p>
                        <h3 id="puskesmasnosehat">{{$jumlah_pusktlayak}} / <span style="font-size: 15px;">{{$jumlah_pusk}}</span></h3>
                          
                          <small><i><strong style="font-size: 16px;">{!!
                              number_format($jumlah_pusk == 0 ? 0 : ($jumlah_pusktlayak / $jumlah_pusk) * 100, 2)
                            !!}%</strong> dari total data</i></small> -->
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
                <div class="line-height-box-body bg-light-blue"></div>
                <div class="row">
                  <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-olive">
                      <div class="inner">
                        @if($param_kelurahan == '0')
                            <p><strong>Total</strong></p>
                            <h3 id="jumlah_rs">{{$jumlah_hotel}} / <span style="font-size: 15px;">{{$getTotal_hotel}}</span></h3>
                            <small><i><strong style="font-size: 16px;">
                              {!!
                              
                              number_format(
                                $getTotal_hotel == 0 ? 0 : ($jumlah_hotel / $getTotal_hotel) * 100, 2
                              )
                              
                            !!}%
                            </strong> dari total keseluruhan</i></small>
                            @else
                            <p><strong>Total</strong></p>
                            <h3 id="jumlah_rs">{{$jumlah_hotel}} / <span style="font-size: 15px;">{{$getTotal_hotel}}</span></h3>
                            <small><i><strong style="font-size: 16px;">
                              {!!
                              
                              number_format(
                                $getTotal_hotel == 0 ? 0 : ($jumlah_hotel / $getTotal_hotel) * 100, 2
                              )
                              
                            !!}%
                            </strong> dari total keseluruhan</i></small><br>
                            <small><i style="color: transparent;"><strong style="font-size: 16px;"></strong>-</i></small>
                            <small><i style="color: transparent;"><strong style="font-size: 16px;"></strong>-</i></small>
                            @endif
                        <!-- <p>Total</p>
                        <h3 id="jmlttuhotel">{{$jumlah_hotel}}</h3>
                        <small><i><strong style="font-size: 16px;">-</strong></i></small> -->
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-light-blue">
                      <div class="inner">
                        @if($param_kelurahan == '0')
                            <p>Layak</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_hotellayak}} / <span style="font-size: 15px;">{{$jumlah_hotel}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_hotel == 0 ? 0 : ($jumlah_hotellayak / $jumlah_hotel) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_hotel == 0 ? 0 : ($jumlah_hotellayak / $getTotal_hotel) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @else
                            <p>Layak</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_hotellayak}} / <span style="font-size: 15px;">{{$jumlah_hotel}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_hotel == 0 ? 0 : ($jumlah_hotellayak / $jumlah_hotel) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kelurahan <b>{{ $param_kelurahan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_hotel_kec == 0 ? 0 : ($jumlah_hotellayak / $jumlah_hotel_kec) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_hotel == 0 ? 0 : ($jumlah_hotellayak / $getTotal_hotel) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @endif
                        <!-- <p>Layak </p>
                        <h3 id="hotelsehat">{{$jumlah_hotellayak}} / <span style="font-size: 15px;">{{$jumlah_hotel}}</span></h3>
                          
                          <small><i><strong style="font-size: 16px;">{!!
                              number_format($jumlah_hotel == 0 ? 0 : ($jumlah_hotellayak / $jumlah_hotel) * 100, 2)
                            !!}%</strong> dari total data</i></small> -->
                      </div>
                      <div class="icon">
                        <i class="ion ion-checkmark"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-red">
                      <div class="inner">
                        @if($param_kelurahan == '0')
                            <p>Layak</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_hoteltlayak}} / <span style="font-size: 15px;">{{$jumlah_hotel}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_hotel == 0 ? 0 : ($jumlah_hoteltlayak / $jumlah_hotel) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_hotel == 0 ? 0 : ($jumlah_hoteltlayak / $getTotal_hotel) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @else
                            <p>Layak</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_hoteltlayak}} / <span style="font-size: 15px;">{{$jumlah_hotel}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_hotel == 0 ? 0 : ($jumlah_hoteltlayak / $jumlah_hotel) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kelurahan <b>{{ $param_kelurahan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_hotel_kec == 0 ? 0 : ($jumlah_hoteltlayak / $jumlah_hotel_kec) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_hotel == 0 ? 0 : ($jumlah_hoteltlayak / $getTotal_hotel) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @endif
                        <!-- <p>Tidak Layak</p>
                        <h3 id="hotelnosehat">{{$jumlah_hotelmlayak}} / <span style="font-size: 15px;">{{$jumlah_hotel}}</span></h3>
                          <small><i><strong style="font-size: 16px;">{!!
                              number_format($jumlah_hotel == 0 ? 0 : ($jumlah_hotelmlayak / $jumlah_hotel) * 100, 2)
                            !!}%</strong> dari total data</i></small> -->
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
                <div class="line-height-box-body bg-light-blue"></div>
                <div class="row">
                  <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-olive">
                      <div class="inner">
                        @if($param_kelurahan == '0')
                            <p><strong>Total</strong></p>
                            <h3 id="jumlah_rs">{{$jumlah_hotelm}} / <span style="font-size: 15px;">{{$getTotal_hotelm}}</span></h3>
                            <small><i><strong style="font-size: 16px;">
                              {!!
                              
                              number_format(
                                $getTotal_hotelm == 0 ? 0 : ($jumlah_hotelm / $getTotal_hotelm) * 100, 2
                              )
                              
                            !!}%
                            </strong> dari total keseluruhan</i></small>
                            @else
                            <p><strong>Total</strong></p>
                            <h3 id="jumlah_rs">{{$jumlah_hotelm}} / <span style="font-size: 15px;">{{$getTotal_hotelm}}</span></h3>
                            <small><i><strong style="font-size: 16px;">
                              {!!
                              
                              number_format(
                                $getTotal_hotelm == 0 ? 0 : ($jumlah_hotelm / $getTotal_hotelm) * 100, 2
                              )
                              
                            !!}%
                            </strong> dari total keseluruhan</i></small><br>
                            <small><i style="color: transparent;"><strong style="font-size: 16px;"></strong>-</i></small>
                            <small><i style="color: transparent;"><strong style="font-size: 16px;"></strong>-</i></small>
                            @endif
                        <!-- <p>Total</p>
                        <h3 id="jmlttuhotelm">{{$jumlah_hotelm}}</h3>
                        <small><i><strong style="font-size: 16px;">-</strong></i></small> -->
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-light-blue">
                      <div class="inner">
                        @if($param_kelurahan == '0')
                            <p>Tidak layak</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_hotelmlayak}} / <span style="font-size: 15px;">{{$jumlah_hotelm}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_hotelm == 0 ? 0 : ($jumlah_hotelmlayak / $jumlah_hotelm) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_hotelm == 0 ? 0 : ($jumlah_hotelmlayak / $getTotal_hotelm) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @else
                            <p>Layak</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_hotelmlayak}} / <span style="font-size: 15px;">{{$jumlah_hotelm}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_hotelm == 0 ? 0 : ($jumlah_hotelmlayak / $jumlah_hotelm) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kelurahan <b>{{ $param_kelurahan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_hotelm_kec == 0 ? 0 : ($jumlah_hotelmlayak / $jumlah_hotelm_kec) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_hotelm == 0 ? 0 : ($jumlah_hotelmlayak / $getTotal_hotelm) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @endif
                        <!-- <p>Layak </p>
                        <h3 id="hotelmsehat">{{$jumlah_hotelmlayak}} / <span style="font-size: 15px;">{{$jumlah_hotelm}}</span></h3>
                          <small><i><strong style="font-size: 16px;">{!!
                              number_format($jumlah_hotelm == 0 ? 0 : ($jumlah_hotelmlayak / $jumlah_hotelm) * 100, 2)
                            !!}%</strong> dari total data</i></small> -->
                      </div>
                      <div class="icon">
                        <i class="ion ion-checkmark"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-red">
                      <div class="inner">
                        @if($param_kelurahan == '0')
                            <p>Tidak layak</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_hotelmtlayak}} / <span style="font-size: 15px;">{{$jumlah_hotelm}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_hotelm == 0 ? 0 : ($jumlah_hotelmtlayak / $jumlah_hotelm) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_hotelm == 0 ? 0 : ($jumlah_hotelmtlayak / $getTotal_hotelm) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @else
                            <p>Layak</p>
                            <h3 id="jumlah_rssehat">{{$jumlah_hotelmtlayak}} / <span style="font-size: 15px;">{{$jumlah_hotelm}}</span></h3>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_hotelm == 0 ? 0 : ($jumlah_hotelmtlayak / $jumlah_hotelm) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kelurahan <b>{{ $param_kelurahan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $jumlah_hotelm_kec == 0 ? 0 : ($jumlah_hotelmtlayak / $jumlah_hotelm_kec) * 100, 2
                              )
                              
                            !!}%</strong> dari total data kecamatan <b>{{ $param_kecamatan }}</b></i></small>
                            <br>
                            <small><i><strong style="font-size: 16px;">{!!
                              
                              number_format(
                                $getTotal_hotelm == 0 ? 0 : ($jumlah_hotelmtlayak / $getTotal_hotelm) * 100, 2
                              )
                              
                            !!}%</strong> dari total data keseluruhan </i></small>
                            @endif
                        <!-- <p>Tidak Layak</p>
                        <h3 id="hotelmnosehat">{{$jumlah_hotelmtlayak}} / <span style="font-size: 15px;">{{$jumlah_hotelm}}</span></h3>
                          
                          <small><i><strong style="font-size: 16px;">{!!
                              number_format($jumlah_hotelm == 0 ? 0 : ($jumlah_hotelmtlayak / $jumlah_hotelm) * 100, 2)
                            !!}%</strong> dari total data</i></small> -->
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