<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h2>THƯ VIỆN TRƯỜNG THPT PHÚ XUYÊN A</h2>
<h3>Thông báo nhắc nhở việc giữ sách quá hạn</h3>
	<p>Thân gửi bạn đọc  <b>{{ $hoten }}</b></p>
	<p>Bạn đang giữ những ấn phẩm quá hạn sau:</p>
	<ul>
		@foreach($anphamquahan as $apqh)
		<li>{{ $apqh }}</li>
		@endforeach
	</ul>
	<p style="color: #bd1928">(*)  Mời bạn mang sách gửi lại thư viện sớm nhất, việc giữ sách quá hạn sẽ được xử lý theo quy định của thư viện</p>


</body>
</html>