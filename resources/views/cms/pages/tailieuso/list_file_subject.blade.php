@extends('cms.master')
@section('content')
<SCRIPT LANGUAGE="JavaScript">
      function confirmAction() {
        return confirm("Bạn có chắc chắn muốn xóa?")
      }
 
</SCRIPT>
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Tài Liệu Số </h3>
              </div>
            </div>

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
              <h2>Danh sách Tài liệu số môn @foreach($subject_name as $sub_name) {{ $sub_name['tenmonhoc'] }} @endforeach</h2>
              <a href="{{ route('add_file') }}"><h2 style="float: right;">Thêm (+)</h2></a>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Mã tài liệu</th>
                    <th>Môn học</th>
                    <th>Tiêu đề</th>
                    <th>Mô tả</th>
                    <th>Link</th>
                    <th>Tùy chọn</th>
                  </tr>
                </thead>
                <tbody>             
                  @foreach ($listFile as $l_file)
                    <tr>
                      <td>{{ $l_file['matailieu'] }}</td>
                      <td>@foreach($subject_name as $sub_name) {{ $sub_name['tenmonhoc'] }} @endforeach</td>
                      <td>{{ $l_file['tieude'] }}</td>
                      <td>{{ $l_file['mota'] }}</td>
                      <td>{{ $l_file['link'] }}</td>
                     <td>
                        <a href="{{ asset('tailieuso/'.$l_file['link'] )}}">Đọc  |</a>
                        <a href="{{ route('edit_file', $l_file['matailieu']) }}">Sửa | </a>
                        <a href="{{ route('del_file', $l_file['matailieu']) }}" onclick="return confirmAction()">Xóa</a>
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