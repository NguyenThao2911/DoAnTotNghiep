@extends('reader.master')
@section('content')
<div class="body">
	<div class="noiquy">
		<div class="left" style="padding-bottom: 50px;">
			<h3 style="margin: 10px 0px; font-size: 16px;">Nội quy phòng đọc</h3>
			<h5 style="color: #505050; text-align: center;">NỘI QUY PHÒNG ĐỌC</h5>
			<p style="text-align: center; font-style: italic;">(ban hành theo Quyết định số    /QĐ-PXA ngày   /   /2017 <br>của Hiệu trưởng Trường THPT Phú Xuyên A)</p>
			<p><b>Điều 1.</b>Khi vào Phòng đọc, bạn đọc chỉ mang theo vở, bút để ghi chép và máy tính xách tay. Bạn đọc vui lòng để cặp, túi, tài liệu riêng và các loại đồ dùng cá nhân khác tại hệ thống tủ đựng đồ của Thư viện.</p>
			<p><b>Điều 2.</b> Bạn đọc được sử dụng tất cả các tài liệu có trong Phòng đọc.</p>
			<p><b>Điều 3.</b> Không được mang bất kỳ tài liệu nào của Thư viện ra khỏi Phòng đọc. Nếu vi phạm, bạn đọc sẽ bị ngừng sử dụng thư viện trong 01 tháng.</p>
			<p><b>Điều 4.</b> Bảo quản, giữ gìn tài liệu. Không cắt xé, viết vẽ hoặc làm hỏng tài liệu. Nghiêm cấm các hành vi ăn cắp tài liệu.</p>
			<p><b>Điều 5.</b> Tuyệt đối không được tự ý chụp ảnh, ghi hình và sử dụng các hình thức sao chụp tài liệu khác.</p>
			<p><b>Điều 6.</b> Sau khi sử dụng xong tài liệu hoặc hết giờ đọc, bạn đọc cần mang tất cả các tài liệu tới bàn thủ thư để trả, không tự ý sắp xếp tài liệu vào giá</p>
			<p><b>Điều 7.</b> Không hút thuốc, ăn uống, xả rác, làm mất vệ sinh Phòng đọc; giữ trật tự Phòng đọc.</p>
			<p>Độc giả nghiêm túc thực hiện Nôi quy để xây dựng một môi trường học tập, nghiên cứu thuận tiện, văn minh. Các trường hợp vi phạm sẽ bị xử lý theo quy định.</p>
			<p><b>Điều 8.</b>Nếu vi phạm sẽ bị xử lý theo quy định.</p>
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