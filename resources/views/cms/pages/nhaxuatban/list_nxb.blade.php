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
              <h2>Danh sách Nhà xuất bản</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Mã NXB</th>
                    <th>Tên nhà xuất bản</th>
                    <th>Địa chỉ</th>
                    <th>Điện thoại</th>
                    <th>Fax</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Option</th>
                  </tr>
                </thead>
                <tbody>             
                  @foreach ($list_nxb as $l_nxb)
                    <tr>
                      <td>{{ $l_nxb['manxb'] }}</td>
                      <td>{{ $l_nxb['tennxb'] }}</td>
                      <td>{{ $l_nxb['diachi'] }}</td>
                      <td>{{ $l_nxb['dienthoai'] }}</td>
                      <td>{{ $l_nxb['fax'] }}</td>
                      <td>{{ $l_nxb['email'] }}</td>
                      <td>{{ $l_nxb['website'] }}</td>
                      <td>
                        <a href="{{ route('edit_nxb', $l_nxb['manxb']) }}">Sửa | </a>
                        <a href="{{ route('delete_nxb', $l_nxb['manxb']) }}" onclick="return confirmAction()">Xóa</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection