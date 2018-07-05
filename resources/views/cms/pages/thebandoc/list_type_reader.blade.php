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
        <h3>Danh sách Bạn đọc <small>@foreach($tenloaibandoc as $ten_lbd) {{ $ten_lbd['tenloaibandoc'] }}  @endforeach</small></h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>
    
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Danh sách</h2>
 
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <p>Danh sách những bạn đọc thuộc loại @foreach($tenloaibandoc as $ten_lbd) {{ $ten_lbd['tenloaibandoc'] }}  @endforeach</p>

            <!-- start project list -->
            <table class="table table-striped projects">
              <thead>
                <tr>
                  <th style="width: 1%">STT</th>
                  <th style="width: 20%">Mã thẻ</th>
                  <th style="width: 20%">Họ và tên</th>
                  <th>Ảnh thẻ</th>
                  <th>Ngày hết hạn</th>
                  <th style="width: 20%">Tùy chọn</th>
                </tr>
              </thead>
              <tbody>
              	<?php
              	  $i=0;
              	?>
              	@foreach($bandoc as $bd)
              	<?php  $i++; ?>
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $bd['mathe'] }}</td>
                  <td>{{ $bd['hoten'] }}</td>
                  <td>
                    <ul class="list-inline">
                      <li>
                        <img src="{{ asset('images/reader/'.$bd['anhthe'] )}}" class="avatar" alt="Avatar">
                      </li>
                    </ul>
                  </td>
                  
                  <td>{{ $bd['ngayhethan'] }}</td>
                  <td>
                    <a href="{{ route('detail_reader_card', $bd['mathe']) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                    <a href="{{ route('edit_reader_card', $bd['mathe']) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                    <a href="{{ route('del_reader_card', $bd['mathe']) }}" class="btn btn-danger btn-xs" onclick="return confirmAction()"><i class="fa fa-trash-o"></i> Delete </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <!-- end project list -->

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection