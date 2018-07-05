@extends('cms.master')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>BẠN ĐỌC</h3>
      </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Tạo thẻ bạn đọc <small>Giáo viên/Học sinh</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <form class="form-horizontal form-label-left" novalidate action="{{ route('add_reader_card') }}" method="post" enctype="multipart/form-data">
              <input type="hidden" name="_token" value = "{{csrf_token()}}">
              <span class="section">Thông tin bạn đọc</span>
              
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >Mã thẻ <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input class="form-control col-md-7 col-xs-12" name="mathe" required="required" type="text">
                  <div style="color: red">
                    @if($errors->has('mathe'))
                       {{ $errors->first('mathe')}}
                    @endif
                  </div>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Loại bạn đọc <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="loaibandoc" required class="form-control col-md-7 col-xs-12">
                      @foreach($loaibandoc as $l_lbd)
                        <option value="<?php echo intval($l_lbd['maloaibandoc']); ?>">{{ $l_lbd['tenloaibandoc'] }}</option>
                      @endforeach
                  </select>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Họ tên <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="hoten" required="required" class="form-control col-md-7 col-xs-12">
                  <div style="color: red">
                    @if($errors->has('hoten'))
                       {{ $errors->first('hoten')}}
                    @endif
                  </div>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number" >Giới tính 
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="radio" name="gioitinh" value="0"> Nữ
                  <input type="radio" name="gioitinh" value="1"> Nam
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Địa chỉ 
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="diachi" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Ngày sinh 
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="date" name="ngaysinh" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Email <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="email" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label for="password" class="control-label col-md-3">Điện thoại </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="dienthoai" class="form-control col-md-7 col-xs-12" required="required">  
                </div>
              </div>
              <div class="item form-group">
                <label for="password" class="control-label col-md-3">Ngày đăng ký <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="date" name="ngaydangky" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="item form-group">
                <label for="password" class="control-label col-md-3">Ngày hết hạn <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="date" name="ngayhethan" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Số CMTND <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="cmtnd" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Password <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="password" name="password" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Ảnh thẻ <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="file" name="anhthe" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Lớp </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="lop" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Khóa </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="khoa" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Chức vụ</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="chucvu" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Bộ môn </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="bomon" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <button type="reset" class="btn btn-primary">Reset</button>
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection