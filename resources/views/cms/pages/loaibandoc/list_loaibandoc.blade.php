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
              <h2>Danh sách Loại bạn đọc</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Mã Loại bạn đọc</th>
                    <th>Tên loại bạn đọc</th>
                    <th>Số sách được mượn</th>
                    <th>Số sách được đọc</th>
                    <th>Số lần được gia hạn</th>
                    <th>Số sách được đặt trước</th>
                    <th>Tùy chọn</th>
                  </tr>
                </thead>
                <tbody>             
                  @foreach ($list_loaibandoc as $l_lbd)
                    <tr>
                      <td>{{ $l_lbd['maloaibandoc'] }}</td>
                      <td>{{ $l_lbd['tenloaibandoc'] }}</td>
                      <td>{{ $l_lbd['sosachduocmuon'] }}</td>
                      <td>{{ $l_lbd['sosachduocdoc'] }}</td>
                      <td>{{ $l_lbd['solanduocgiahan'] }}</td>
                      <td>{{ $l_lbd['sosachduocdattruoc'] }}</td>
                     <td>
                        <a href="{{ route('edit_loaibandoc', $l_lbd['maloaibandoc']) }}">Sửa | </a>
                        <a href="{{ route('delete_lbd', $l_lbd['maloaibandoc']) }}" onclick="return confirmAction()">Xóa</a>
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