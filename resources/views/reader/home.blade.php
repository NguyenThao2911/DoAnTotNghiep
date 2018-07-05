@extends('reader.master')
@section('content')

<div class="body">
	<div class="left">
		<div class="search">
			<form action="{{ route('timkiemsach') }}" method="get" >
				<select style="height: 26px; width: 30%;" name="filter">
					<option value="tensach">Tên sách</option>
					<option value="tacgia">Tác giả</option>
					<option value="monhoc">Môn học</option>
				</select>
				<input style="height: 20px" size="37%" type="text" name="key" placeholder="Từ khóa tìm kiếm">
				<button type="submit" style="height: 26px">Tìm kiếm</button>
			</form>
		</div>
		<div class="sachmoinhat" style="margin-top: 10px; margin-left: 9px; border-radius: 5px; border-bottom: 1px solid #dcdcdc; padding-bottom: 7px;">
			<h5 style="margin: 8px 0px; color: #2a6496;">SÁCH MỚI NHẤT</h5>
			@foreach($sachmoinhat as $sachmoi)
			<div style="float: left; width: 103px; margin-right: 4px;">
				<a href="{{ route('getchitietanpham', $sachmoi['maanpham']) }}"><img width="103px" height="142px" src="{{ asset('images/books/'.$sachmoi['biasach'] )}}"></a>
				<a href="{{ route('getchitietanpham', $sachmoi['maanpham']) }}"><p style="margin: 5px 0px; font-size: 13px;">{{ $sachmoi['tieude'] }}</p></a>
			</div>
			@endforeach
			<div style="clear: both;"></div>
		</div>
		<div class="tailieusomoinhat" style="border: 1px solid #dcdcdc; border-radius: 5px; margin-top: 5px; margin-left: 10px; padding: 5px 9px;">
			<h5 style="margin: 8px 0px; color: #2a6496;">TÀI LIỆU SỐ MỚI NHẤT</h5>
			
			<ul>
				@foreach($tailieusomoinhat as $tlsmoinhat)
				<li><a href="
								@if(Auth::guard('bandoc')->check())
									{{ asset('tailieuso/'.$tlsmoinhat['link'] )}}
								@else 
									{{ '#' }}
								@endif
					" style="font-size: 14px; text-decoration: none;" onclick="return YeuCauLogin()">{{ $tlsmoinhat['tieude'] }}</a></li>
				@endforeach
			</ul>	
		</div>
		
		<div class="new" style="margin-top: 5px; padding: 5px 0px 5px 10px;">
			<div class="nghiepvu" style="float: left; width: 41%; border: 1px solid #dcdcdc; border-radius: 5px; margin-right: 6px; padding: 5px 9px;">
				<h5 style="margin: 8px 0px; color: #2a6496;">NGHIỆP VỤ THƯ VIỆN</h5>
				@foreach($nghiepvuthuvien as $nghiepvu)
				<a href="{{ route('nghiepvuthuvien') }}" style="text-decoration: none; font-size: 13px; color: #29739D;">{{ $nghiepvu['tieude'] }}</a>
				<p style="font-size: 13px; margin-top: 5px;">{{ $nghiepvu['mota'] }}</p>
				@endforeach
			</div>
			<div class="tintuc" style="float: left; width: 50%; border: 1px solid #dcdcdc; border-radius: 5px; padding: 5px 10px; ">
				<h5 style="margin: 8px 0px; color: #2a6496;">TIN TỨC</h5>
				
				@foreach($tintuc as $tin)
				<p style="margin: 0px 0px 5px 0px;"><a href="{{ route('chitiettin', $tin['id']) }}" style="text-decoration: none; font-size: 13px; color: #29739D;">{{ ">>". $tin['tieude'] }}</a></p>
				@endforeach
				
			</div>
			<div style="clear: both;"></div>
		</div>
		<div style="clear: both;"></div>
	</div>
	<div class="right">
		<div class="tailieuso">
			<h4>TÀI LIỆU SỐ</h4>
			<p><a href="">Tất cả ({{ $count_tailieuso }})</a></p>
			@foreach($monhoc as $mh)
			<p><a href="{{ route('getListTaiLieuSo', $mh['mamonhoc']) }}">Tài liệu {{ $mh['tenmonhoc'] }}</a></p>
			@endforeach
		</div>
		<div class="tailieuvanban">
			<h4>TÀI LIỆU VĂN BẢN</h4>
			<p><a href="">Tất cả ({{ $count_anpham }})</a></p>
			@foreach($monhoc as $mh)
			<p><a href="{{ route('getListAnPham', $mh['mamonhoc']) }}">Tài liệu {{ $mh['tenmonhoc'] }}</a></p>
			@endforeach
		</div>
	</div>
	<div class="right" style="float: right">
		<div class="tailieuso">
			<h4>ĐỌC NHIỀU GẦN ĐÂY</h4>
			@foreach($docnhieuganday as $dngd)
				<div>
					<div class="anhbiasach" style="width: 30%; float: left; margin-right: 10px;"> 
						<img width="55px" height="65px" src="{{ asset('images/home/file.png' )}}">
					</div>
					<div class="tieudesach" style="width: 65%; float: left; white-space: pre-line; ">
						<p><a href="
								@if(Auth::guard('bandoc')->check())
									{{ asset('tailieuso/'.$tlsmoinhat['link'] )}}
								@else 
									{{ '#' }}
								@endif" style="font-size: 13px; text-decoration: none;">{{ $dngd['tieude'] }}</a></p>
					</div>
					<div style="clear: both;"></div>
				</div>


			@endforeach
		</div>
		<div class="tailieuvanban">
			<h4>MƯỢN NHIỀU GẦN ĐÂY</h4>
			@foreach($muonnhieuganday as $mngd)
				<div>
					<div class="anhbiasach" style="width: 30%; float: left; margin-right: 10px;"> 
						<a href="{{ route('getchitietanpham', $mngd['maanpham']) }}"><img width="55px" height="65px" src="{{ asset('images/books/'.$mngd['biasach'] )}}"></a>
					</div>
					<div class="tieudesach" style="width: 65%; float: left; white-space: pre-line;">
						<a href="{{ route('getchitietanpham', $mngd['maanpham']) }}"><p style="font-size: 13px; color: #29739D;">{{ $mngd['tieude'] }}</p></a>
					</div>
					<div style="clear: both;"></div>
				</div>
			@endforeach
		</div>
	</div>
	<div style="clear: both;"></div>
	<div class="right" style="float: right">
		<div class="tailieuso" style="text-align: center;">
			<h4>LỊCH LÀM VIỆC</h4>
			<a href="{{ route('getLichlamviec') }}"><img width="90%" src="{{ asset('images/home/lichlamviec.jpeg') }}"></a>
		</div>
		<div class="tailieuvanban" style="text-align: center;">
			<h4>HỖ TRỢ TRỰC TUYẾN</h4>
			<h5>Chat với thủ thư</h5>
			<a href=""><img width="63%" src="{{ asset('images/home/skype.png') }}"></a>
		</div>
	</div>
	<div style="clear: both;"></div>
</div>
@endsection