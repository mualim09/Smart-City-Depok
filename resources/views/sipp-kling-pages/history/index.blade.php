@extends('sipp-kling-layouts.app')

@section('content')
	
<section class="content-header overflow-hidden">
	<div class="col-xs-12 title-dashboard">
	    <h2>Data History</h2>
	    <div class="line-height"></div>
	  </div>
</section>

<section class="content" style="overflow: hidden;">
	<div class="col-xs-12">
		<div class="box box-widget">
			<div class="box-body chat" id="history-chat-retrieve">
        	@foreach($history as $data)
				<div class="item">
		          @if($data->aktivitas == 'UPDATE')
					<i class="fa fa-refresh history-icon-style history-update"></i>
		          @else
		            <i class="fa fa-plus history-icon-style history-tambah"></i>
		          @endif

					<p class="message">
						<a href="#" class="name">
							<small class="text-muted pull-right"><i class="fa fa-clock-o"></i>{{ date('d-m-y, G:i:s', strtotime($data->waktu)) }}</small>
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
		</div>
	</div>
</section>
	
@endsection