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
			<form novalidate action="" method="post" enctype="multipart/form-data">
				 <input type="hidden" name="_token" value = "{{csrf_token()}}">
	    	<table>
	    		<tr>
	    			<td>Mã thẻ</td>
	    			<td><input name="mathe" value = "{{  $bd['mathe'] }}" readonly=""> </td>
	    		</tr>
	    		<tr>
	    			<td>Họ tên</td>
	    			<td><input name="hoten" value = "{{ $bd['hoten'] }}">  </td>
	    		</tr>
	    		<tr>
	    			<td>Giới tính</td>
	    			<td>
	    				<input type="radio" name="gioitinh" value="0" @if($bd['gioitinh'] == 0) {{ "checked = 'checked'" }} @endif> Nữ
                  		<input type="radio" name="gioitinh" value="1" @if($bd['gioitinh'] == 1) {{ "checked = 'checked'" }} @endif> Nam  </td>
	    		</tr>
	    		<tr>
	    			<td>Địa chỉ</td>
	    			<td><input name="diachi" value = "{{ $bd['diachi'] }}">  </td>
	    		</tr>
	    		<tr>
	    			<td>Ngày sinh</td>
	    			<td><input name="ngaysinh" value = "{{ $bd['ngaysinh'] }}">  </td>
	    		</tr>
	    		<tr>
	    			<td>Email</td>
	    			<td><input name="email" value = "{{ $bd['email'] }}">  </td>
	    		</tr>
	    		<tr>
	    			<td>Điện thoại</td>
	    			<td><input name="dienthoai" value = "{{ $bd['dienthoai'] }}">  </td>
	    		</tr>
	    		<tr>
	    			<td>Chứng minh thư nhân dân</td>
	    			<td><input name="cmtnd" value = "{{ $bd['cmtnd'] }}">  </td>
	    		</tr>
	    		<tr>
	    			<td>Loại bạn đọc</td>
	    			<td><input value = "{{ $bd['tenloaibandoc'] }}" readonly="">  </td>
	    		</tr>
	    	</table>
	    	<button type="submit" >Lưu thay đổi</button>
		    </form>
		</div>
	@endforeach
</div>
@endsection