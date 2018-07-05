@extends('reader.master')
@section('content')
<div class="body">
	<div class="noiquy">
		@foreach($tinchitiet as $tct)
		<div class="left" style="padding-bottom: 50px;">
			<h3 style="margin: 10px 0px; font-size: 16px;">TIN THƯ VIỆN</h3>
			<h4>{{ $tct['tieude'] }}</h4>
			<p style="color: #505050; font-weight: bold;">{{ $tct['mota'] }}</p>
			<p>{{ $tct['noidung'] }}</p>
		</div>
		@endforeach
		<div class="right" style="margin: 0px; font-size: 16px; border: 1px solid #dcdcdc">
			<h4 style="margin: 10px 0px;">TIN THƯ VIỆN</h4>
			@foreach($tintuc as $tt)
			<a href="{{ route('chitiettin', $tt['id']) }}">>> {{ $tt['tieude'] }}</a><br>
			@endforeach
		</div>
	</div>	
</div>

@endsection