@extends('cms.master')
@section('content')
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Bạn đọc</h3>
              </div>
            </div>
            
            <div class="clearfix"></div>

            @foreach($bandoc as $key=>$bdoc)
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Thông tin bạn đọc <small>{{ $bdoc['hoten'] }}</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="{{ asset('images/reader/'.$bdoc['anhthe'] )}}" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      <h2 style="font-weight: 800">{{ $bdoc['hoten'] }}</h2>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> {{ $bdoc['diachi'] }}
                        </li>

                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i>{{ $bdoc['dienthoai'] }}
                          
                        </li>

                        <li class="m-top-xs">
                          <i class="fa fa-external-link user-profile-icon"></i>
                          <a href="http://www.kimlabs.com/profile/" target="_blank">{{ $bdoc['email'] }}</a>
                        </li>
                      </ul>

                      <a href="{{ route('edit_reader_card', $bdoc['mathe']) }}" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                      <br />
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Thông tin chung</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Liên hệ</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Xếp loại thẻ</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                            <!-- start information -->
                            <table>
                              <tr>
                                <th>Mã thẻ:</th>
                                <td>{{ $bdoc['mathe'] }}</td>
                              </tr>
                              <tr>
                                <th>Họ và tên:</th>
                                <td>{{ $bdoc['hoten'] }}</td>
                              </tr>
                              <tr>
                                <th>Ngày sinh: </th>
                                <td>{{ $bdoc['ngaysinh'] }}</td>
                              </tr>
                              <tr>
                                <th>Giới tính:</th>
                                <td>
                                    @if($bdoc['gioitinh'] == 0) 
                                      {{ "Nữ" }}
                                    @else 
                                      {{ "Nam" }}
                                    @endif
                                </td>
                              </tr>
                              <tr>
                                <th>Email:</th>
                                <td>{{ $bdoc['email'] }}</td>
                              </tr>
                              <tr>
                                <th>Điện thoại:</th>
                                <td>{{ $bdoc['dienthoai'] }}</td>
                              </tr>
                              <tr>
                                <th>Địa chỉ:</th>
                                <td>{{ $bdoc['diachi'] }}</td>
                              </tr>
                              <tr>
                                <th>Số chứng minh thư:</th>
                                <td>{{ $bdoc['cmtnd'] }}</td>
                              </tr>
                              <tr>
                                <th>Loại bạn đọc:</th>
                                <td>@foreach($loaibandoc as $lbdoc)
                                      {{ $lbdoc['tenloaibandoc'] }}
                                    @endforeach</td>
                              </tr>
                              <tr>
                                <th>Ngày hết hạn:</th>
                                <td>{{ $bdoc['ngayhethan'] }}</td>
                              </tr>
                            </table>
                            <!-- end information -->
                            
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            <!-- start contact -->
                            <table>
                              <tr>
                                <th>Email:</th>
                                <td>{{ $bdoc['email'] }}</td>
                              </tr>
                              <tr>
                                <th>Điện thoại:</th>
                                <td>{{ $bdoc['dienthoai'] }}</td>
                              </tr>
                              <tr>
                                <th>Địa chỉ:</th>
                                <td>{{ $bdoc['diachi'] }}</td>
                              </tr>
                            </table>
                            <!-- end contact -->

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <table>
                              <tr>
                                <th>Loại bạn đọc:</th>
                                <td>@foreach($loaibandoc as $lbdoc)
                                      {{ $lbdoc['tenloaibandoc'] }}
                                    @endforeach</td>
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