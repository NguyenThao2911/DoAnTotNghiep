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
    <div class="col-lg-12">
        @if(Session::has('flash_message'))
             <div class="alert alert-{{Session::get('flash_level')}}" style="border: 2px solid red; border-radius: 10px; padding: 10px; font-size: 14px; color: #333; margin-bottom: 20px;">
                 {{Session::get('flash_message')}} <br>
                 Theo thứ tự hàng đợi, khi đến lượt, bạn sẽ nhận được email thông báo ngay khi có sách được trả về thư viện. Bạn chú ý check email nha!<br>
                 Xin cảm ơn!
             </div>
        @endif
        @if(Session::has('error'))
             <div class="alert alert-{{Session::get('error')}}" style="border: 2px solid red; border-radius: 10px; padding: 10px; font-size: 14px; color: #333; margin-bottom: 20px;">
                 {{Session::get('error')}} 
                 
             </div>
        @endif
    </div>
	    @foreach($anpham as $key=>$ap)
	    <h4 style="margin: 0px; margin-bottom: 20px; color: #29739d;">Thông tin ấn phẩm <small>>> {{ $ap['tieude'] }}</small></h4>
	    <div class="left" style="float: left; width: 32%;">
	    	<img class="img-responsive avatar-view" src="{{ asset('images/books/'.$ap['biasach'] )}}" alt="Avatar" title="Change the avatar" style="height: 250px; width: 200px; margin-right: 20px; margin-bottom: 15px;"><br>
	        <a href="{{ route('getDattruoc', $ap['maanpham']) }}"><button style="background-color: #295b8e; color: #fff; padding: 5px 10px;">Đặt trước</button></a>
	    </div>   
	    <div class="right" style="float: left; text-align: left; width: 68%">
	    	<table>
              <tr>
                <th style="color: #808080;">Nhan đề:</th>
                <td>{{ $ap['tieude'] }}</td>
              </tr>
              <tr>
                <th style="color: #808080;">Lĩnh vực:</th>
                <td>{{ "Khoa học tự nhiên" }}</td>
              </tr>
              <tr>
                <th style="color: #808080;">Nhà xuất bản </th>
                <td>{{ "Nhà xuất bản Giáo dục" }}</td>
              </tr>
              <!-- <tr>
                <th style="color: #808080;">Tác giả:</th>
                <td>{{ $ap['matacgia'] }}</td>
              </tr> -->
              <tr>
                <th style="color: #808080;">Lần xuất bản:</th>
                <td>{{ "2" }}</td>
              </tr>
              <tr>
                <th style="color: #808080;">Năm xuất bản:</th>
                <td>{{ "2002" }}</td>
              </tr>
              <tr>
                <th style="color: #808080;">Người chủ biên:</th>
                <td>{{ $ap['nguoichubien'] }}</td>
              </tr>
              <tr>
                <th style="color: #808080;">Kích thước:</th>
                <td>{{ "24x17.5 cm" }}</td>
              </tr>
              <tr>
                <th style="color: #808080;">Số trang:</th>
                <td>{{ "86 trang" }}</td>
              </tr>
              <tr>
                <th style="color: #808080;">Giá tiền:</th>
                <td>{{ "72,000 đ" }}</td>
              </tr>
              <tr>
                <th style="color: #808080;">Thông tin thêm:</th>
                <td>{{ $ap['thongtinthem'] }}</td>
              </tr>
              <tr>
              	<th style="color: #808080;">Tình trạng:</th>
              	<td style="color: #982328;">Còn 7 cuốn</td>
              </tr>
            </table>
	    </div>     
	          
	    @endforeach
	</div>
</div>
@endsection