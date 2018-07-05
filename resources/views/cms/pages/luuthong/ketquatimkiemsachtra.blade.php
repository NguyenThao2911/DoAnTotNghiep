@extends('cms.master')
@section('content')
<SCRIPT LANGUAGE="JavaScript">
      function confirmAction() {
        return confirm("Bạn có chắc chắn muốn xóa?")
      }
 
</SCRIPT>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-lg-12">
          @if(Session::has('flash_message'))
               <div class="alert alert-{{Session::get('flash_level')}}">
                   {{Session::get('flash_message')}}
               </div>
          @endif
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Kết quả tìm kiếm Sách Trả</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Mã thẻ</th>
                    <th>Mã ấn phẩm</th>
                    <th>Tên ấn phẩm</th>
                    <th>Ngày mượn</th>
                    <th>Tình trạng sách mượn</th>
                    <th>Ngày hết hạn</th>
                    <th>Trạng thái</th>
                    <!-- <th>Trạng thái</th> -->
                  </tr>
                </thead>
                <tbody>             
                  @foreach ($luotmuon as $l_muon)
                    <tr>
                      <td>{{ $l_muon['mathe'] }}</td>
                      <td>{{ $l_muon['maanpham'] }}</td>
                      <td>{{ $l_muon['tieude'] }}</td>
                      <td>{{ $l_muon['ngaymuon'] }}</td>
                      <td>{{ $l_muon['tinhtrangsachmuon']."%" }}</td>
                      <td>{{ $l_muon['ngayhethan'] }}</td>

                      <td>
                        @if($l_muon['ngaytra'] != null)
                          {{ "Đã trả" }}
                        @else
                        <a href="{{ route('trasach', $l_muon['id_luotmuon']) }}">Trả sách</a> |
                        <a href="#">Làm mất</a>
                        @endif
                      </td>
                     
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <a href="{{ route('inhoadon', $mathe) }}" style="float: right; font-size: 16px; color: red; padding-right: 5px;">In hóa đơn</a>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection