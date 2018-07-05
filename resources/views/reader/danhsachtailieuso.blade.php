@extends('reader.master')
@section('content')
<div>
	<div class="left_col" style="float: left; width: 27%; background-color: #fff; padding: 10px 10px; border-right: 1px solid #9a9a9a;">
		<h4 style="margin: 0px; color: #112b80;">TRA CỨU</h5>
		<hr>
		<ul>
			@foreach($monhoc as $mh)
				<a href="{{ route('getListTaiLieuSo', $mh['mamonhoc']) }}" style="text-decoration: none; color: #112b80;"><li>{{ $mh['tenmonhoc'] }}</li></a>
				<hr>
			@endforeach
		</ul>
	</div>
	<div class="col" style="float: left; width: 66%; background-color: #fff; padding: 10px 20px;">
     
	    <h4 style="margin: 0px; margin-bottom: 20px; color: #29739d;">Danh sách tài liệu số môn <small>>>
      @foreach($tls_monhoc as $tls_mh) {{ $tls_mh['tenmonhoc'] }} @endforeach</small></h4>
	    <div class="right" style="float: left; text-align: left;">
      @foreach($tailieuso as $tls)
  	    	<div>
            <div class="anh" style="width: 30%; float: left; margin-right: 10px;"> 
              <img width="55px" height="65px" src="{{ asset('images/home/file.png' )}}">
            </div>
            <div class="tieude" style="width: 65%; float: left; white-space: pre-line; ">
              <p><a href="@if(Auth::guard('bandoc')->check())
								{{ asset('tailieuso/'.$tls['link'] )}}
							@else 
								{{ '#' }}
							@endif" style="font-size: 13px; text-decoration: none;">{{ $tls['tieude'] }}</a></p>
            </div>
            <div style="clear: both;"></div>
          </div>
        @endforeach   
	    </div>     
	     
	</div>
</div>
@endsection