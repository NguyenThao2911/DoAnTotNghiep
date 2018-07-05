@extends('reader.master')
@section('content')
<div>
	<div class="left_col" style="float: left; width: 27%; background-color: #fff; padding: 10px 10px; border-right: 1px solid #9a9a9a;">
		<h4 style="margin: 0px; color: #112b80;">TÙY CHỌN</h5>
    <hr>
    <ul>
      <a href="{{ route('getThongtincanhan') }}" style="text-decoration: none; color: #112b80; font-size: 15px;"><li>Thông tin tài khoản</li></a>
      <a href="#" style="text-decoration: none; color: #112b80; font-size: 15px;"><li>Chỉnh sửa hồ sơ</li></a>
      <a href="#" style="text-decoration: none; color: #112b80; font-size: 15px;"><li>Quên mật khẩu</li></a>
      <a href="{{ route('getDanhsachdattruoc') }}" style="text-decoration: none; color: #112b80; font-size: 15px;"><li>Danh sách đặt trước</li></a>
      <a href="{{ route('getTinhtrangsachmuon') }}" style="text-decoration: none; color: #112b80; font-size: 15px;"><li>Tình trạng sách mượn</li></a>
    </ul>
	</div>
	<div class="col" style="float: left; width: 66%; background-color: #fff; padding: 10px 20px;">
    <h4 style="margin: 0px; margin-bottom: 20px; color: #29739d;">Sách đang mượn </h4>
    <p>                  
          @if(isset($flash_message))
           <div style="background-color: #3fc0a5; padding: 10px 20px; color: #fff; font-size: 13px; border-radius: 7px;" class="alert alert-{{Session::get('flash_level')}}">
               {{ $flash_message }}
           </div>
          @endif
        
     </p>
    @if(!empty($sachdangmuon))
    <table border="1px"  width="680px" cellpadding="10px" style="border-collapse: collapse; border-color: #69b9e6;">
      <tr style="width: 600px">
        <th>STT</th>
        <th>Mã ấn phẩm</th>
        <th>Tiêu đề</th>
        <th>Ngày mượn</th>
        <th>Ngày hết hạn</th>
        <th>Hành động</th>
      </tr>
      
      <?php $i = 0; ?>
      @foreach($sachdangmuon as $sdm)
      <?php $i++; ?>
      <tr style="width: 600px">
        <td>{{ $i }}</td>
        <td>{{ $sdm['maanpham'] }}</td>
        <td>{{ $sdm['tieude'] }}</td>
        <td>{{ $sdm['ngaymuon'] }}</td>
        <td>{{ $sdm['ngayhethan'] }}</td>
        <td><a href="{{ route('giahan', $sdm['id_luotmuon']) }}">Gia hạn</a></td>
      </tr>
      @endforeach

    </table>
    @else 
      <div style="background-color: #b50525; padding: 10px 20px; color: #fff; font-size: 13px; border-radius: 7px;" class="alert alert-{{Session::get('flash_level')}}">
         Bạn đọc chưa mượn cuốn sách nào
      </div>
    @endif
	    
	</div>
   
</div>
@endsection