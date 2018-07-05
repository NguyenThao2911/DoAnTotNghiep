@extends('cms.master')
@section('content')
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Nhân viên thư viện</h3>
              </div>
            </div>
            
            <div class="clearfix"></div>

            @foreach($admin as $ad)
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Thông tin Nhân viên <small>{{ $ad['hoten'] }}</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="{{ asset('images/admins/'.$ad['anh'] )}}" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      <h2 style="font-weight: 800">{{ $ad['hoten'] }}</h2>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> {{ $ad['diachi'] }}
                        </li>

                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i>
                          <?php
                			if ($ad['quanlybandoc'] == 1) {
                				echo "Quản Lý Bạn Đọc"."<br>";
                			}
                			if ($ad['quanlybienmuc'] == 1) {
                				echo "Quản Lý Biên Mục"."<br>";
                			}
                			if ($ad['quanlyluuthong'] == 1) {
                				echo "Quản Lý Lưu Thông"."<br>";
                			}
                			if ($ad['quanlyquantri'] == 1) {
                				echo "Quản Lý Quản Trị"."<br>";
                			}
                		?>
                        </li>

                        <li class="m-top-xs">
                          <i class="fas fa-envelope"></i>
                          <a href="http://www.kimlabs.com/profile/" target="_blank">{{ $ad['email'] }}</a>
                        </li>
                      </ul>

                      <a href="{{ route('edit_admin', $ad['manhanvien']) }}" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                      <br />
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Thông tin chung</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Liên hệ</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Công tác</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                            <!-- start information -->
                            <table>
                              <tr>
                                <th>Mã nhân viên:</th>
                                <td>{{ $ad['manhanvien'] }}</td>
                              </tr>
                              <tr>
                                <th>Username:</th>
                                <td>{{ $ad['username'] }}</td>
                              </tr>
                              <tr>
                                <th>Họ và tên:</th>
                                <td>{{ $ad['hoten'] }}</td>
                              </tr>
                              <tr>
                                <th>Ngày sinh: </th>
                                <td>{{ $ad['ngaysinh'] }}</td>
                              </tr>
                              <tr>
                                <th>Giới tính:</th>
                                <td>
                                  @if ($ad['gioitinh'] == 0)
                                    {{ "Nữ" }}
                                  @else 
                                    {{ "Nam" }}
                                  @endif
                                  </td>
                              </tr>
                              <tr>
                                <th>Email:</th>
                                <td>{{ $ad['email'] }}</td>
                              </tr>
                              <tr>
                                <th>Điện thoại:</th>
                                <td>{{ $ad['dienthoai'] }}</td>
                              </tr>
                              <tr>
                                <th>Địa chỉ:</th>
                                <td>{{ $ad['diachi'] }}</td>
                              </tr>
                              <tr>
                                <th>Số chứng minh thư:</th>
                                <td>{{ $ad['cmtnd'] }}</td>
                              </tr>
                              <tr>
                                <th>Chức vụ:</th>
                                <td>{{ $ad['chucvu'] }}</td>
                              </tr>
                              <tr>
                                <th>Quyền hạn:</th>
                                <td>
                                  @if ($ad['quanlybandoc'] == 1)
                                    {{ "Quản Lý Bạn Đọc" }} <br>
                                  @endif
                                  @if ($ad['quanlybienmuc'] == 1)
                                    {{ "Quản Lý Bạn Đọc" }} <br>
                                  @endif
                                  @if ($ad['quanlyluuthong'] == 1)
                                    {{ "Quản Lý Bạn Đọc" }} <br>
                                  @endif
                                  @if ($ad['quanlyquantri'] == 1)
                                    {{ "Quản Lý Bạn Đọc" }} <br>
                                  @endif
                                </td>
                              </tr>
                            </table>
                            <!-- end information -->
                            
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            <!-- start contact -->
                            <table>
                              <tr>
                                <th>Email:</th>
                                <td>{{ $ad['email'] }}</td>
                              </tr>
                              <tr>
                                <th>Điện thoại:</th>
                                <td>{{ $ad['dienthoai'] }}</td>
                              </tr>
                              <tr>
                                <th>Địa chỉ:</th>
                                <td>{{ $ad['diachi'] }}</td>
                              </tr>
                            </table>
                            <!-- end contact -->

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <table>
                              <tr>
                                <th>Chức vụ:</th>
                                <td>{{ $ad['chucvu'] }}</td>
                              </tr>
                              <tr>
                                <th>Quyền hạn:</th>
                                <td>
                                  @if ($ad['quanlybandoc'] == 1)
                                    {{ "Quản Lý Bạn Đọc" }} <br>
                                  @endif
                                  @if ($ad['quanlybienmuc'] == 1)
                                    {{ "Quản Lý Bạn Đọc" }} <br>
                                  @endif
                                  @if ($ad['quanlyluuthong'] == 1)
                                    {{ "Quản Lý Bạn Đọc" }} <br>
                                  @endif
                                  @if ($ad['quanlyquantri'] == 1)
                                    {{ "Quản Lý Bạn Đọc" }} <br>
                                  @endif
                                </td>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
@endsection