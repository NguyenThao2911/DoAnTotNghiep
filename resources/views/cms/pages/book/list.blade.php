@extends('cms.master')
@section('content')
<!-- <SCRIPT LANGUAGE="JavaScript">
      function confirmAction() {
        return confirm("Bạn có chắc chắn muốn xóa?")
      }
 
</SCRIPT> -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Ấn Phẩm </h3>
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
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Danh sách Ấn phẩm</h2><br>
                    <a href="{{ route('add_book') }}"><h2 style="float: right;">Thêm (+)</h2></a>
                    <div class="clearfix"></div>
                  </div>
                  
                  <div class="x_content" style="text-align: center;">
                    @foreach($list_subject as $sub)
                    <a href="{{ route('list_book_subject', $sub['mamonhoc']) }}"><button style="width: 170px; height: 100px; white-space: pre-wrap;" type="button" class="btn btn-round btn-success">{{ $sub['tenmonhoc'] }}</button></a>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection