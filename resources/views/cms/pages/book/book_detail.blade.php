@extends('cms.master')
@section('content')
 <div class="right_col" role="main">

          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Ấn phẩm</h3>
              </div>
            </div>
            
            <div class="clearfix"></div>
           
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Thông tin Ấn phẩm</h2>
                    <a style="float: right;" href="{{ route('edit_book', $anpham[0]['maanpham']) }}"><h2>Sửa</h2></a>
                    <div class="clearfix"></div>
                    <div class="col-lg-12">
                        @if(Session::has('flash_message'))
                             <div style="margin-top: 8px;" class="alert alert-{{Session::get('flash_level')}}">
                                 {{Session::get('flash_message')}}
                             </div>
                        @endif
                    </div>
                  </div>
                  <div class="x_content">

                    <div class="col-md-4 col-sm-4 col-xs-9">
                      <div class="product-image">
                      
                        <img src="{{ asset('images/books/'.$anpham[0]['biasach'] )}}" alt="..." style="padding-top: 25px;" />
                        
                      </div>
                    </div>
                    
                    <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">

                      <h2 class="prod_title" style="font-weight: 700;">{{ $anpham[0]['tieude'] }}</h2>

                      <p>
                         <?php
                          if ($anpham[0]['thongtinthem'] != null) {
                            echo $anpham[0]['thongtinthem'];
                          } 
                         ?>
                      </p>
                      <p><b>Lĩnh vực: </b>{{ $anpham[0]['tenlinhvuc'] }}</p>
                      <p><b>Mã xếp giá: </b>{{ $anpham[0]['maxepgia'] }}</p>
                      <p><b>Nhà xuất bản: </b> {{ $anpham[0]['tennxb'] }}</p>
                      <p><b>Tác giả: </b> {{ $anpham[0]['hotentacgia'] }}</p>
                      <p><b>Môn học: </b> {{ $anpham[0]['tenmonhoc'] }} </p>
                      <p><b>Thể loại: </b>
                      	<?php
                      		if ($anpham[0]['theloai'] == 0) {
                      			echo "Sách giáo khoa";
                      		} else {
                      			echo "Sách tham khảo";
                      		}
                      	?>
                      </p>
                      <p><b>Giá tiền: </b> 
                        <?php
                          if ($anpham[0]['giatien'] != null) {
                            echo $anpham[0]['giatien'];
                          } else {
                            echo "chưa cập nhật";
                          }
                        ?>
                      </p>
                      <p><b>Số lượng: </b> {{ $anpham[0]['soluong'] }}</p>
                      <p><b>Lần xuất bản: </b>
                        <?php
                          if ($anpham[0]['lanxuatban'] != null) {
                            echo $anpham[0]['lanxuatban'];
                          } else {
                            echo "chưa cập nhật";
                          }
                        ?>

                      </p>
                      <p><b>Năm xuất bản: </b>
                        <?php
                          if ($anpham[0]['namxuatban'] != null) {
                            echo $anpham[0]['namxuatban'];
                          } else {
                            echo "chưa cập nhật";
                          }
                        ?>
                      </p>
                      <p><b>Người chủ biên: </b>
                        <?php
                          if ($anpham[0]['nguoichubien'] != null) {
                            echo $anpham[0]['nguoichubien'];
                          } else {
                            echo "chưa cập nhật";
                          }
                        ?>
                      </p>
                      <p><b>Kích thước: </b>
                        <?php
                          if ($anpham[0]['kichthuoc'] != null) {
                            echo $anpham[0]['kichthuoc'];
                          } else {
                            echo "chưa cập nhật";
                          }
                        ?>
                      </p>
                      <p><b>Số trang: </b>
                        <?php
                          if ($anpham[0]['sotrang'] != null) {
                            echo $anpham[0]['sotrang'];
                          } else {
                            echo "chưa cập nhật";
                          }
                        ?>
                      </p>
                      <p><b>Người biên mục: </b>{{ $anpham[0]['hoten'] }}</p>
                      <p><b>Ngày biên mục: </b> {{ $anpham[0]['create_at'] }}</p>
                    </div>
                   

                    <div class="col-md-12">

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Số lượng còn trong kho</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Số lượng đang được mượn</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Số lượng đặt trước</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                            
                            <h1 style="padding: 10px 80px; color: #100646">{{ $tong_anpham_trongkho }}</h1>
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                            
                            <h1 style="padding: 10px 280px; color: #b51441">{{ $tong_anpham_dangmuon }}</h1>
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                           
                            <h1 style="padding: 10px 470px; color: #1e560b">{{ $tong_anpham_dattruoc }}</h1>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
@endsection