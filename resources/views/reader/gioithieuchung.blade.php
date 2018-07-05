@extends('reader.master')
@section('content')
<div class="body">
	<div class="noiquy">
		<div class="left" style="padding-bottom: 50px;">
			<h3 style="margin: 10px 0px; font-size: 16px;">TRUNG TÂM THƯ VIỆN TRƯỜNG THPT PHÚ XUYÊN A</h3>
			<p><b>1. Địa chỉ:</b> Quốc lộ 1A, thị trấn Phú Xuyên, huyện Phú Xuyên, thành phố Hà Nội</p>
			<p><b>2. Điện thoại: </b>(84-4) 33 855 354</p>
			<p><b>3. Website:</b> <a href="http://phuxuyena.edu.vn" target="_blank"> http://phuxuyena.edu.vn</a></p>
			<p><b>4. Giám đốc</b></p>
				@foreach($giamdoc as $GD)
				<div style="float: left; margin-right: 10px; padding-left: 20px; text-align: center;">
					<img width="120px" height="200px" src="{{ asset('images/admins/'.$GD['anh'] )}}">
					<p style="margin: 0px;">{{ $GD['chucvu'] }}</p>
					<p style="margin: 0px;"><b>{{ $GD['hoten'] }}</b></p>
				</div>
				@endforeach
			<div style="clear: both;"></div>
			<p><b>5. Nhiệm vụ: </b></p>
			
				<p>1. Xây dựng chương trình, kế hoạch phát triển công tác thông tin thư viện. Từng bước xây dựng Trung tâm trở thành thư viện điện tử đáp ứng chiến lược phát triển của Nhà trường.</p>

				<p>2. Kết hợp với phòng Đào tạo Đại học, Đào tạo Sau đại học, khoa Tại chức, phòng Khoa học công nghệ xây dựng kế hoạch và tổ chức việc biên soạn, in ấn, xuất bản giáo trình,tài liệu tham khảo. Thường xuyên bổ sung, phát triển nguồn tài nguyên thông tin trong nước và ngoài nước, các công trình nghiên cứu cấp Nhà nước, Cấp Bộ, luận án Tiến sỹ, luận văn Thạc sỹ, của cán bộ giảng dạy, nghiên cứu sinh và học viên cao học.</p>

				<p>3. Tổ chức quảnlý, phục vụ, hướng dẫn cho cán bộ, sinh viên của trường khai thác, tìm kiếm, sửdụng thuận tiện và có hiệu quả nguồn tài nguyên thông tin do Trung tâm Thông tin - Thư viện quản lý đáp ứng yêu cầu giảng dạy, học tập và nghiên cứu khoa học.</p>

				<p>4. Hợp tác với khoa Công nghệ Thông tin của Trường ứng dụng các thành tựu khoa học công nghệ thông tin vào công tác thư viện, xây dựng kế hoạch đào tạo đội ngũ chuyên viên thư viện nâng cao trình độ chuyên môn nghiệp vụ, ngoại ngữ, công nghệ thông tin để phát triển nguồn nhân lực có chất lượng nhằm nâng cao hiệu quả phục vụ.</p>

				<p>5. Mở rộng quanhệ hợp tác với các thư viện, trung tâm thông tin trong và ngoài nước để trao đổi tài liệu kinh nghiệm chuyên môn nghiệp vụ và tìm kiếm các nguồn tài trợ</p>

				<p>6. Quản trị và tổ chức khai thác có hiệu quả hệ thống mạng Internet, Website của Nhà trường để cung cấp các dịch vụ thông tin - tư liệu điện tử và phục vụ công tác điều hành quản lý chung và công tác đối nội, đối ngoại của Nhà trường.</p>

				<p>7. Quản lý  tốt cơ sở vật chất, từng bước có kế hoạch nâng cấp, hiện đại hoá Trung tâm Thông tin -Thư viện, tăng cường năng lực phục vụ đào tạo, nghiên cứu khoa học và quản lý của Nhà trường.</p>

				<p>8. Thực hiện báocáo định kỳ về tình hình hoạt động, kiểm kê định kỳ hàng năm vốn tài liệu -nguồn lực thông tin, cơ sở vật chất, trang thiết bị kỹ thuật và tài sản kháctheo sự phân cấp của Nhà trường.</p>

				<p>9. Phối hợp với phòng Bảo vệ xây dựng phương án phòng cháy, chữa cháy và quản lý tốt thiết bị dụng cụ phòng cháy, chữa cháy.</p>

			<p><b>6. Quy định về quyền hạn và phân cấp</b></p>

				<p>1. Tham gia Hội Thông tin - Tư liệu Việt Nam, Hội Liên hiệp thư viện, các hội nghị, hội thảo khoa học về Thông tin - Thư viện trong nước và quốc tế.</p>

				<p>2. Tổ chức các hoạt động dịch vụ có thu phù hợp với quy định của pháp luật và chức năng nhiệm vụ được giao theo nguyên tắc về tài chính do Nhà trường quy định</p>

				<p>3. Bảo vệ quyền tác giả các tài liệu do trường Đại học Mỏ - Địa chất quản lý.</p>

				<p>4. Trung tâm có con dấu riêng. Giám đốc (hoặc Phó Giám đốc) được ký tên và đóng dấu của Trung tâm vào các văn bản thuộc phạm vi chức năng, nhiệm vụ để giao dịch nội bộ. Giám đốc (hoặc Phó Giám đốc) Trung tâm là Uỷ viên thường trực Hội đồng in, thanh lý sách, báo, tài liệu…</p>

			<p><b>7. Đội ngũ nhân viên:</b></p>
				<div style="width: 300px; border: 1px dashed #bbbbbb; margin-left: 170px; padding-left: 20px; ">
					<?php
						$i = 0;
					?>
					@foreach($nhanvien as $nv)
						<?php
							$i++;
						?>
						<p>{{ $i.".  ". $nv['hoten']}}</p>
					@endforeach
				</div>
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