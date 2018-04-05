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
<div class="modal fade" id="kepala_keluarga">
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
          <h2 class="reset-heading">883</h2>
          <div class="margin-10"></div>
          <hr/>
          <div class="margin-10"></div>
          <div class="more-occurs overflow-hidden">
            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 01 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 02 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 03 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 04 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 05 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 06 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 07 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 08 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 09 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 10 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 06 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 07 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 08 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 09 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 10 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
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
          <h2 class="reset-heading">883</h2>
          <div class="margin-10"></div>
          <hr/>
          <div class="margin-10"></div>
          <div class="more-occurs overflow-hidden">
            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 01 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 02 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 03 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 04 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 05 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 06 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 07 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 08 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 09 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 10 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 06 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 07 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 08 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 09 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 10 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
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
          <h2 class="reset-heading">883</h2>
          <div class="margin-10"></div>
          <hr/>
          <div class="margin-10"></div>
          <div class="more-occurs overflow-hidden">
            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 01 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 02 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 03 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 04 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 05 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 06 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 07 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 08 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 09 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 10 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 06 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 07 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 08 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 09 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 10 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
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
          <h2 class="reset-heading">883</h2>
          <div class="margin-10"></div>
          <hr/>
          <div class="margin-10"></div>
          <div class="more-occurs overflow-hidden">
            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 01 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 02 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 03 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 04 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 05 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 06 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 07 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 08 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 09 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 10 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 06 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 07 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 08 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 09 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 10 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
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
          <h2 class="reset-heading">883</h2>
          <div class="margin-10"></div>
          <hr/>
          <div class="margin-10"></div>
          <div class="more-occurs overflow-hidden">
            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 01 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 02 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 03 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 04 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 05 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 06 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 07 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 08 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 09 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 10 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 06 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 07 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 08 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 09 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 10 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
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

<div class="modal fade" id="koya">
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
          <h2 class="reset-heading">883</h2>
          <div class="margin-10"></div>
          <hr/>
          <div class="margin-10"></div>
          <div class="more-occurs overflow-hidden">
            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 01 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 02 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 03 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 04 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 05 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 06 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 07 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 08 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 09 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 10 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 06 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 07 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 08 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 09 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 10 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
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
          <h2 class="reset-heading">883</h2>
          <div class="margin-10"></div>
          <hr/>
          <div class="margin-10"></div>
          <div class="more-occurs overflow-hidden">
            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 01 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 02 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 03 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 04 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 05 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 06 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 07 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 08 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 09 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 10 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 06 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 07 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 08 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 09 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 10 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
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
          <h2 class="reset-heading">883</h2>
          <div class="margin-10"></div>
          <hr/>
          <div class="margin-10"></div>
          <div class="more-occurs overflow-hidden">
            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 01 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 02 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 03 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 04 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 05 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 06 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 07 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 08 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 09 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 10 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 06 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 07 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 08 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 09 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 10 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
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
          <h2 class="reset-heading">883</h2>
          <div class="margin-10"></div>
          <hr/>
          <div class="margin-10"></div>
          <div class="more-occurs overflow-hidden">
            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 01 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 02 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 03 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 04 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 05 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 06 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 07 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 08 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 09 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 10 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 06 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 07 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 08 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 09 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 10 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
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
          <h2 class="reset-heading">883</h2>
          <div class="margin-10"></div>
          <hr/>
          <div class="margin-10"></div>
          <div class="more-occurs overflow-hidden">
            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 01 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 02 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 03 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 04 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 05 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 06 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 07 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 08 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 09 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 10 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            </div>

            <div class="col-xs-6 col-lg-3">
              <span class="progress-text">RW 06 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 07 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 08 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
            
              <span class="progress-text">RW 09 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>

              <span class="progress-text">RW 10 </span>
              <span class="progress-number pull-right"><b id="grw1">0</b></span><br>
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
				<div class="item">
					<i class="fa fa-refresh history-icon-style history-update"></i>

					<p class="message">
						<a href="#" class="name">
							<small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
							Mike Doe
						</a>
						I would like to meet you to discuss the latest news about
						the arrival of the new theme. They say it is going to be one the
						best themes on the market
					</p>
				</div>
				<div class="item">
					<i class="fa fa-plus-circle history-icon-style history-tambah"></i>

					<p class="message">
						<a href="#" class="name">
							<small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
							Mike Doe
						</a>
						I would like to meet you to discuss the latest news about
						the arrival of the new theme. They say it is going to be one the
						best themes on the market
					</p>
				</div>
				<div class="item">
					<i class="fa fa-plus-circle history-icon-style history-tambah"></i>

					<p class="message">
						<a href="#" class="name">
							<small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
							Mike Doe
						</a>
						I would like to meet you to discuss the latest news about
						the arrival of the new theme. They say it is going to be one the
						best themes on the market
					</p>
				</div>
				<div class="item">
					<i class="fa fa-refresh history-icon-style history-update"></i>

					<p class="message">
						<a href="#" class="name">
							<small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
							Mike Doe
						</a>
						I would like to meet you to discuss the latest news about
						the arrival of the new theme. They say it is going to be one the
						best themes on the market
					</p>
				</div>
			</div>
			<div class="box-footer with-border text-center">
				<button class="btn btn-default btn-flat">view all</button>
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
                            <option value="kepala_keluarga">Kepala Keluarga</option>
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
                    <b>Pemantauan Jentik Berkala</b>
                    <div class="line-height-box-body bg-light-blue"></div>
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
                              <option value="modal_septic_tank">Septic Tank</option>
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
                  Kecamatana Limo,<br>
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
                            <h3>0</h3>
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