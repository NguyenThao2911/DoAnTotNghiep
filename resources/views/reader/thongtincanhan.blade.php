@extends('reader.master')
@section('content')
<div>
	<div class="left_col" style="float: left; width: 27%; height: 340px; background-color: #fff; padding: 10px 10px; border-right: 1px solid #9a9a9a;">
		<h4 style="margin: 0px; color: #112b80;">TÙY CHỌN</h5>
		<hr>
		<ul>
			<a href="{{ route('getThongtincanhan') }}" style="text-decoration: none; color: #112b80; font-size: 15px;"><li>Thông tin tài khoản</li></a>
			<a href="{{ route('edit_info') }}" style="text-decoration: none; color: #112b80; font-size: 15px;"><li>Chỉnh sửa hồ sơ</li></a>
			<a href="#" style="text-decoration: none; color: #112b80; font-size: 15px;"><li>Quên mật khẩu</li></a>
			<a href="{{ route('getDanhsachdattruoc') }}" style="text-decoration: none; color: #112b80; font-size: 15px;"><li>Danh sách đặt trước</li></a>
			<a href="{{ route('getTinhtrangsachmuon') }}" style="text-decoration: none; color: #112b80; font-size: 15px;"><li>Tình trạng sách mượn</li></a>
		</ul>
	</div>
	@foreach ($bandoc as $bd)
		<div class="col" style="float: left; width: 64%; margin-left: 13px; background-color: #fff; padding: 10px 20px; border: 1px solid #d9dadc; border-radius: 10px;">
	    	<p>                  
	    		@if(Session::has('flash_message'))
                   <div style="background-color: #3fc0a5; padding: 10px 20px; color: #fff; font-size: 13px; border-radius: 7px;" class="alert alert-{{Session::get('flash_level')}}">
                       {{Session::get('flash_message')}}
                   </div>
                @endif
             </p>
	    	<div class="info" style="width: 74%; float: left;">
	    		<h4 style="margin: 0px; margin-bottom: 5px; color: #29739d;">Thông tin tài khoản độc giả </h4>
	    		<table 	cellspacing="15px">
	    			<tr>
	    				<th style="text-align: left;">Họ và tên </th>
	    				<td>{{ $bd['hoten'] }}</td>
	    			</tr>
	    			<tr>
	    				<th style="text-align: left;">Ngày sinh  </th>
	    				<td>{{ $bd['ngaysinh'] }}</td>
	    			</tr>
	    			<tr>
	    				<th style="text-align: left;">Giới tính  </th>
	    				<td>@if($bd['gioitinh'] == 0) {{ "Nữ" }} @else {{ "Nam" }} @endif</td>
	    			</tr>
	    			<tr>
	    				<th style="text-align: left;">Địa chỉ </th>
	    				<td>{{ $bd['diachi'] }}</td>
	    			</tr>
	    			<tr>
	    				<th style="text-align: left;">Email  </th>
	    				<td>{{ $bd['email'] }}</td>
	    			</tr>
	    			<tr>
	    				<th style="text-align: left;">Điện thoại </th>
	    				<td>{{ $bd['dienthoai'] }}</td>
	    			</tr>
	    			<tr>
	    				<th style="text-align: left;">Mã thẻ  </th>
	    				<td>{{ $bd['mathe'] }}</td>
	    			</tr>
	    			<tr>
	    				<th style="text-align: left;">Ngày đăng ký  </th>
	    				<td>{{ $bd['ngaydangky'] }}</td>
	    			</tr>
	    			<tr>
	    				<th style="text-align: left;">Ngày hết hạn  </th>
	    				<td>{{ $bd['ngayhethan'] }}</td>
	    			</tr>
	    		</table>
	    	</div>
	    	<div class="avatar" style="width: 23%; float: left; text-align: center;">
	    		<img width="100%" src="{{ asset('images/reader/'.$bd['anhthe'] )}}" alt="..."/>
	    		<button style="margin-top: 5px; color: #fff; background-color: #69809e; border: 0px; padding: 5px;">Thay đổi ảnh</button>
	    	</div>
		    
		</div>
	@endforeach
</div>
@endsection