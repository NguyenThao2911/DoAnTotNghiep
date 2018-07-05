@extends('reader.master')
@section('content')
<div class="body">
	<div class="noiquy">
		<div class="left" style="padding-bottom: 50px;">
			<h3 style="margin: 10px 0px; font-size: 16px;">Lịch làm việc</h3>
			<h5 style="color: #505050; text-align: center;">THÔNG BÁO</h5>
			<p style="text-align: center; font-style: italic;">(Thời gian phục vụ tại Trung tâm Thông tin - Thư viện)</p>
			<p>Tùy thuộc vào từng bộ phận mà thời gian phục vụ tại các phòng cũng khác nhau:</p>
			<p><b> 1. Phòng mượn sách : </b> Từ thứ 2 đến thứ 6 <br><br>

                            - Sáng từ 8h00 - 12h00 <br><br>

                            - Chiều từ 13h00 - 17h00</p>
			<p><b>2. Phòng đọc</b> <br><br>
				<i><b>a.Tháng 1, 2, 3, 7, 8, 9: </b>Từ thứ 2 đến thứ 6: </i><br><br>

                            - Sáng từ 8h00 - 12h00 <br><br>

                            - Chiều từ 13h00 - 17h00 <br><br>

				<i><b>b.Tháng 4, 5,6, 10, 11, 12: </b> Từ thứ 2 đến thứ 6: </i><br><br>

                            - Sáng từ 8h00 - 12h00 <br><br>

                            - Chiều từ 13h00 - 19h00 <br><br>

                Thứ 7:  - Sáng từ 8h00 - 12h00 <br><br>

                            - Chiều từ 13h00 - 17h00 <br><br>

Các ngày lễ tết, Thư viện phục vụ theo thông báo của Nhà Trường.
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