@extends('reader.master')
@section('content')
<SCRIPT LANGUAGE="JavaScript">
      function confirmAction() {
        return confirm("Bạn có chắc chắn muốn xóa?")
      }
 
</SCRIPT>
<div>
	<div class="left_col" style="float: left; width: 27%; background-color: #fff; padding: 10px 10px; border-right: 1px solid #9a9a9a;">
		<h4 style="margin: 0px; color: #112b80;">TÙY CHỌN</h5>
    <hr>
    <ul>
      <a href="{{ route('getThongtincanhan') }}" style="text-decoration: none; color: #112b80; font-size: 15px;"><li>Thông tin tài khoản</li></a>
      <a href="#" style="text-decoration: none; color: #112b80; font-size: 15px;"><li>Chỉnh sửa hồ sơ</li></a>
      <a href="#" style="text-decoration: none; color: #112b80; font-size: 15px;"><li>Quên mật khẩu</li></a>
      <a href="#" style="text-decoration: none; color: #112b80; font-size: 15px;"><li>Danh sách đặt trước</li></a>
      <a href="{{ route('getTinhtrangsachmuon') }}" style="text-decoration: none; color: #112b80; font-size: 15px;"><li>Tình trạng sách mượn</li></a>
    </ul>
	</div>
	<div class="col" style="float: left; width: 66%; background-color: #fff; padding: 10px 20px;">
    <h4 style="margin: 0px; margin-bottom: 20px; color: #29739d;">Danh sách đặt trước </h4>
    @if(!empty($dattruoc))
      <p>Theo thứ tự hàng đợi, khi đến lượt, bạn sẽ nhận được email thông báo ngay khi có sách được trả về thứ viện. Bạn chú ý check email nha!</p>
      <table border="1px"  width="680px" cellpadding="10px" style="border-collapse: collapse; border-color: #69b9e6;">
        <tr style="width: 600px">
          <th>Thứ tự ưu tiên</th>
          <th>Mã ấn phẩm</th>
          <th>Ngày đặt trước</th>
          <th>Tùy chọn</th>
        </tr>
        
        @foreach($dattruoc as $dt)
        <tr style="width: 600px">
          <td>{{ $dt['id_dattruoc'] }}</td>
          <td>{{ $dt['maanpham'] }}</td>
          <td>{{ $dt['ngaydattruoc'] }}</td>
          <td><a href="{{ route('del_dattruoc', $dt['id_dattruoc']) }}" style="text-decoration: none;" onclick="return confirmAction()">Hủy</a></td>
        </tr>
        @endforeach

      </table>
    @else 
      <div style="background-color: #b50525; padding: 10px 20px; color: #fff; font-size: 13px; border-radius: 7px;" class="alert alert-{{Session::get('flash_level')}}">
         Bạn đọc chưa đặt trước ấn phẩm nào
      </div>
    @endif
	    
	</div>
    
</div>
@endsection