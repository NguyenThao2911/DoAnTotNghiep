@extends('cms.master')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>HÓA ĐƠN</h3>
      </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Hóa đơn trả sách</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Mã thẻ</th>
                    <th>Họ và tên</th>
                    <th>Mã ấn phẩm</th>
                    <th>Tên ấn phẩm</th>
                    <!-- <th>Ngày mượn</th> -->
                    <!-- <th>Ngày trả</th> -->
                    <!-- <th>Mức độ vi phạm</th> -->
                    <th>Lý do phạt</th>
                    <th>Tiền phạt</th>
                    <!-- <th>Trạng thái</th> -->
                  </tr>
                </thead>
                <tbody>             
                  @foreach ($danhsachphat as $ds_phat)
                    <tr>
                      <td>{{ $ds_phat['mathe'] }}</td>
                      <td>{{ $ds_phat['hoten'] }}</td>
                      <td>{{ $ds_phat['maanpham'] }}</td>
                      <td>{{ $ds_phat['tieude'] }}</td>
                      <td>{{ $ds_phat['lydo'] }}</td>
                      <td>{{ $ds_phat['tienphat'] }}</td>
                    
                     
                    </tr>
                  @endforeach
                  <tr>
                    <td colspan="5" style="font-weight: bold;">Tổng tiền phạt </td>
                    <td style="font-weight: bold;">{{ $tongtienphat }}</td>
                  </tr>
                </tbody>
              </table>

              <a href="{{ route('export_hoadonphat', $mathe)}}"> Export Excel </a>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection