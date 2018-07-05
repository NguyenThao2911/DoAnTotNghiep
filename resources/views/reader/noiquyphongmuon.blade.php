@extends('reader.master')
@section('content')
<div class="body">
	<div class="noiquy">
		<div class="left" style="padding-bottom: 50px;">
			<h3 style="margin: 10px 0px; font-size: 16px;">Nội quy phòng mượn</h3>
			<h5 style="color: #505050; text-align: center;">NỘI QUY PHÒNG MƯỢN</h5>
			<p style="text-align: center; font-style: italic;">(ban hành theo Quyết định số    /QĐ-PXA ngày   /   /2017 <br>của Hiệu trưởng Trường THPT Phú Xuyên A)</p>
			<p><b>Điều 1.</b>Mang theo thẻ thư viện / thẻ sinh viên để làm các thủ tục cần thiết hoặc sử dụng dịch vụ tại Thư viện Trung tâm; Không dùng thẻ thư viện của người khác và không cho người khác mượn thẻ.</p>
			<p><b>Điều 2.</b> Không mang túi xách hoặc vật cồng kềnh vào Thư viện; Tự bảo quản tài sản cá nhân. Thư viện sẽ không giải quyết các trường hợp thất lạc hay mất mát tài sản của độc giả.</p>
			<p><b>Điều 3.</b> Quy định về mượn tài liệu</p>
			<table border="1px">
				<tr>
					<th>Loại bạn đọc</th>
					<th>Số sách được mượn</th>
					<th>Số sách được đọc</th>
					<th>Số lần được gia hạn</th>
				</tr>
				<tr>
					<td>Học sinh</td>
					<td>5</td>
					<td>3</td>
					<td>2</td>
				</tr>
				<tr>
					<td>Giáo viên</td>
					<td>5</td>
					<td>5</td>
					<td>3</td>
				</tr>
			</table>
			<p><b>Điều 4.</b> Tuân thủ luật bản quyền khi sử dụng tài liệu tại Thư viện.</p>
			<p><b>Điều 5.</b> Thực hiện và nhắc nhở người khác giữ gìn tài liệu, trang thiết bị và các tài sản chung của Thư viện.</p>
			<p><b>Điều 6.</b> Giữ trật tự, yên tĩnh; tắt điện thoại di động tại những khu vực có dấu hiệu quy ước.</p>
			<p><b>Điều 7.</b> Giữ vệ sinh chung, không hút thuốc, không sử dụng các vật dễ cháy nổ trong Thư viện</p>
			<p>Độc giả nghiêm túc thực hiện Nôi quy để xây dựng một môi trường học tập, nghiên cứu thuận tiện, văn minh. Các trường hợp vi phạm sẽ bị xử lý theo quy định.</p>
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