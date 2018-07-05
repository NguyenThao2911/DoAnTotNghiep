<!DOCTYPE html>
<html>
<head>
	<title>Thư viện Điện Tử - THPT Phú Xuyên A</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	
</head>
<body>
<div class="container">
	<div class="header">
		<div class="logo">
			<img src="{{ asset('images/home/logo.jpg') }}">
		</div>
		<div class="title">
			<h3 style="color: #1c3b85;">TRƯỜNG THPT PHÚ XUYÊN A</h3>
			<h2 style="color: #06a2f0;">TRUNG TÂM THÔNG TIN - THƯ VIỆN</h2>
			<h4 style="color: #a52a2b; font-weight: 800;">THƯ VIỆN ĐIỆN TỬ - THƯ VIỆN SỐ</h4>
			<img width="180px" height="100px" style="float: right; margin-right: -185px; margin-top: -40px;" src="{{ asset('images/home/anhnen.png') }}">
		</div>
		<div class="login" style="
			@if(Auth::guard('bandoc')->check()) 
				{{ 'display: none;' }}
			@endif
		" 		
		>

			<p style="color: #0000ff; font-size: 11px; text-align: center; margin-top: 30px; margin-left: -10px;">Nhập mã và mật khẩu để đăng nhập</p>
			<form action="{{ route('login_db') }}" method="post">
				<input type="hidden" name="_token" value = "{{csrf_token()}}">
				<input size="14px" type="text" name="mathe">
				<input size="14px" type="password" name="password">
				<button type="submit">Đăng nhập</button>
			</form>
		</div>
		<!-- Nếu đăng nhập thành công thì hiện lời chào -->
			<div class="login" >
			@if(Auth::guard('bandoc')->check()) 
				<p style="color: #0000ff; font-size: 13px; text-align: center; margin-top: 45px; margin-left: -20px; padding-right: 5px;">{{ "Xin chào, " }} <br>
				  <b>{{ Auth::guard('bandoc')->user()->hoten }}</b></p>
				<a href="{{ route('logout_bd') }}" style="color: #d02139; text-align: center; text-decoration: none; font-size: 13px; font-weight: bold; float: right; padding-right: 5px;">Thoát</a>
			@endif
			</div>
	</div>
	<div style="clear: both;"></div>
	<div id="menu">
		<ul>
			<li><a href="{{ route('getHome') }}"> Trang chủ </a></li>
			<li><a href=""> Giới thiệu </a>
				<ul class="sub-menu">
                    <li><a href="{{ route('gioithieuchung') }}">Giới thiệu chung</a></li>
                    <li><a href="{{ route('cocautochuc') }}">Cơ cấu tổ chức</a></li>
                    <li><a href="{{ route('truyenthong') }}">Truyền thống</a></li>
                </ul>
			</li>
			<li><a href=""> Tin tức </a>
				<ul class="sub-menu">
                    <li><a href="{{ route('nghiepvuthuvien') }}">Nghiệp vụ thư viện</a></li>
                    <li><a href="#">Thông báo</a></li>
                    <li><a href="#">Tài liệu mới</a></li>
                </ul>
			</li>
			<li><a href=""> Tài khoản </a>
				<ul class="sub-menu">
                    <li><a href="{{ route('getThongtincanhan') }}">Thông tin độc giả</a></li>
                    <li><a href="{{ route('getDanhsachdattruoc') }}">Danh sách đặt trước</a></li>
                    <li><a href="{{ route('getTinhtrangsachmuon') }}">Sách đang mượn</a></li>
                </ul>
			</li>
			<li><a href=""> Nội quy </a>
				<ul class="sub-menu">
                    <li><a href="{{ route('getNoiQuyPM') }}">Nội quy phòng mượn</a></li>
                    <li><a href="{{ route('getNoiQuyPD') }}">Nội quy phòng đọc</a></li>
                    <li><a href="#">Quy định xử phạt</a></li>
                </ul>
			</li>
			<li><a href=""> Diễn đàn </a>
				<ul class="sub-menu">
                    <li><a href="#">Thủ tục cấp thẻ</a></li>
                    <!-- <li><a href="#">Quy định gia hạn</a></li>
                    <li><a href="#">Quy định đặt trước</a></li> -->
                </ul>
			</li>
		</ul>
	</div>
	<div style="clear: both;"></div>
	<div class="col-lg-12">
      @if(Session::has('flag'))
        <div class="alert alert-danger" style="color: #d02139; font-weight: bold; font-size: 14px; margin-bottom: 10px; padding-left: 5px;">{{Session::get('message')}}</div>
      @endif
      @if(count($errors)>0)
        @foreach($errors->all() as $err)
            <div class="alert alert-danger">{{$err}}</div>
        @endforeach
      @endif
    </div>
	@yield('content')
	<div style="clear: both;"></div>
	<div class="footer" style="margin-bottom: 20px; margin-top: 20px;">
		<div class="icon">
			<img width="90px" height="90px" src="{{ asset('images/home/logotruonghoc.png') }}">
		</div>
		<div class="info">
			<h4 style="font-size: 16px;">THƯ VIỆN TRƯỜNG TRUNG HỌC PHỔ THÔNG PHÚ XUYÊN A</h4>
			<p style="font-size: 14px;">Địa chỉ: Quốc lộ 1A, Tt. Phú Xuyên, H. Phú Xuyên, Tp. Hà Nội</p>
			<p style="font-size: 14px;">Điện thoại: (84-4) 33 855 354</p>
			<p style="font-size: 14px; margin-bottom: 20px">Website: <a href="http://phuxuyena.edu.vn" target="blank">http://phuxuyena.edu.vn</a></p>
		</div>
	</div>
</div>

</body>
</html>