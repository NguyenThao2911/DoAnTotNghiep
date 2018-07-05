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
                <h3>Nhân viên thư viện</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                      </div>

                      <div class="clearfix"></div>
                      
                      @foreach($list_nv as $l_nv)
                      <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief">
                            	<i>
                            		<?php
                            			if ($l_nv['quanlybandoc'] == 1) {
                            				echo "Quản Lý Bạn Đọc"."<br>";
                            			}
                            			if ($l_nv['quanlybienmuc'] == 1) {
                            				echo "Quản Lý Biên Mục"."<br>";
                            			}
                            			if ($l_nv['quanlyluuthong'] == 1) {
                            				echo "Quản Lý Lưu Thông"."<br>";
                            			}
                            			if ($l_nv['quanlyquantri'] == 1) {
                            				echo "Quản Lý Quản Trị"."<br>";
                            			}
                            		?>
                            	</i>
                            </h4>
                            <div class="left col-xs-8">
                              <h2>{{ $l_nv['hoten'] }}</h2>
                              <p><strong>About: </strong>  </p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Username: {{ $l_nv['username'] }}</li>
                                <li><i class="fas fa-envelope"></i> Email:<br> {{ $l_nv['email'] }}</li>
                                <li><i class="fa fa-phone"></i> Điện thoại: {{ $l_nv['dienthoai'] }}</li>
                                <li><i class="fas fa-map-marker"></i> Địa chỉ: {{ $l_nv['diachi'] }}</li>
                              </ul>
                            </div>
                            <div class="right col-xs-4 text-center">
                              <img src="{{ asset('images/admins/'.$l_nv['anh'] )}}" alt="" class="img-circle img-responsive">
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            <div class="col-xs-12 col-sm-7 emphasis">
                              <a href="{{ route('admin_detail', $l_nv['manhanvien']) }}" style="float: left;">
                                <button type="button" class="btn btn-primary btn-xs" style="float: left;">
                                  <i class="fa fa-user"> </i> View Profile
                                </button>
                              </a>
                              <a href="{{ route('del_admin', $l_nv['manhanvien']) }}" onclick="return confirmAction()" style="float: right;">
                                <button type="button" class="btn btn-primary btn-xs" style="float: left;">
                                  <i class="far fa-trash-alt"></i> Xóa
                                </button>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection