@extends('reader.master')
@section('content')
<div>
	<div class="left_col" style="float: left; width: 27%; background-color: #fff; padding: 10px 10px; border-right: 1px solid #9a9a9a;">
		<h4 style="margin: 0px; color: #112b80;">TRA CỨU</h5>
		<hr>
		<ul>
			@foreach($monhoc as $mh)
				<a href="{{ route('getListAnPham', $mh['mamonhoc']) }}" style="text-decoration: none; color: #112b80;"><li>{{ $mh['tenmonhoc'] }}</li></a>
				<hr>
			@endforeach
		</ul>
	</div>
	<div class="col" style="float: left; width: 66%; background-color: #fff; padding: 10px 20px;">
     
	    <h4 style="margin: 0px; margin-bottom: 20px; color: #29739d;">Danh sách ấn phẩm  <small>>>
    
	    <div class="right" style="float: left; text-align: left;">
      	@foreach($anpham as $ap)
  	    	<div style="float: left; width: 19%; margin-left: 5px; white-space: pre-line;">
              <a href="{{ route('getchitietanpham', $ap['maanpham']) }}"><img width="100%" height="165px" src="{{ asset('images/books/'.$ap['biasach'] )}}"></a>
              <p><a href="{{ route('getchitietanpham', $ap['maanpham']) }}" style="font-size: 13px; text-decoration: none;">{{ $ap['tieude'] }}</a></p>
            </div>
        @endforeach   
        <div style="clear: both;"></div>
	    </div>  
	    
	    	
	    	
	    
	    <div style="clear: both;"></div>  
	     
	</div>
</div>
@endsection