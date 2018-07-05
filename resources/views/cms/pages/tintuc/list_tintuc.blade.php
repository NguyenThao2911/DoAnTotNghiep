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
              <h2>Danh sách Tin Tức</h2>
              <a href="{{ route('add_tintuc') }}"><h2 style="float: right;">Thêm (+)</h2></a>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tiêu đề</th>
                    <th>Mô tả</th>
                    <th>Nội dung</th>
                    <th>Người tạo</th>
                    <th>Tùy chọn</th>
                  </tr>
                </thead>
                <tbody>  
                <?php $i = 0; ?>           
                  @foreach ($listTinTuc as $l_tt)
                  <?php
                    $i++;
                  ?>
                    <tr>
                      <td>{{ $i }}</td>
                      <td>{{ $l_tt['tieude'] }}</td>
                      <td>
                        @if(mb_strlen($l_tt['mota']) > 50)
                          {{ mb_substr($l_tt['mota'],0,50)."..." }} 
                        @else 
                          {{ $l_tt['mota'] }}
                        @endif
                      </td>
                      <td>
                        @if(mb_strlen($l_tt['noidung']) > 100)
                          {{ mb_substr($l_tt['noidung'],0,100)."..." }} 
                        @else 
                          {{ $l_tt['noidung'] }}
                        @endif
                      </td>
                      <td>{{ $l_tt['hoten'] }}</td>
                     <td>
                        <a href="{{ route('edit_tintuc', $l_tt['id']) }}">Sửa | </a>
                        <a href="{{ route('delete_tintuc', $l_tt['id']) }}" onclick="return confirmAction()">Xóa</a>
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