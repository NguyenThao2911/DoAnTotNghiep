@extends('reader.master')
@section('content')
<div class="body">
	<div class="noiquy">
		<div class="left" style="padding-bottom: 50px;">
			<p>Đang cập nhật...</p>
		</div>
		<div class="right" style="margin: 0px; font-size: 16px; border: 1px solid #dcdcdc">
			<h4 style="margin: 10px 0px;">NỘI QUY</h4>
			<a href="{{ route('getNoiQuyPM') }}">>> Nội quy phòng mượn</a><br>
			<a href="{{ route('getNoiQuyPD') }}">>> Nội quy phòng đọc</a><br>
			<a href="">>> Quy định xử phạt</a><br>
		</div>
	</div>	
</div>

@endsection