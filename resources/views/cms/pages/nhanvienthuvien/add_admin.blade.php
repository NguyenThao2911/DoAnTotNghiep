@extends('cms.master')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>TÀI KHOẢN QUẢN TRỊ</h3>
      </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Thêm tài khoản</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <form class="form-horizontal form-label-left" novalidate action="{{ route('add_admin') }}" method="post" enctype="multipart/form-data">
              <input type="hidden" name="_token" value = "{{csrf_token()}}">
              <span class="section">Thông tin tài khoản</span>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >Mã nhân viên <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input class="form-control col-md-7 col-xs-12" name="manhanvien" required="required" type="text">
                  <div style="color: red">
                    @if($errors->has('manhanvien'))
                       {{ $errors->first('manhanvien')}}
                    @endif
                  </div>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >Username <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input class="form-control col-md-7 col-xs-12" name="username" required="required" type="text">
                  <div style="color: red">
                    @if($errors->has('username'))
                       {{ $errors->first('username')}}
                    @endif
                  </div>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Password <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="password" name="password" required="required" class="form-control col-md-7 col-xs-12">
                  <div style="color: red">
                    @if($errors->has('password'))
                       {{ $errors->first('password')}}
                    @endif
                  </div>
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number" >Ngày sinh</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="date" name="ngaysinh" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Giới tính </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="gioitinh" class="form-control col-md-7 col-xs-12">
                    <option value="0">Nữ</option>
                    <option value="1">Nam</option>
                  </select>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Email <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="email" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Điện thoại </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="dienthoai" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Địa chỉ </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="diachi" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label for="password" class="control-label col-md-3">Số chứng minh thư </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="cmtnd" class="form-control col-md-7 col-xs-12" required="required">
                </div>
              </div>
              <div class="item form-group">
                <label for="password" class="control-label col-md-3">Chức vụ</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="chucvu" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Ảnh đại diện</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="file" name="anh" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Quản lý bạn đọc<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="quanlybandoc" class="form-control col-md-7 col-xs-12">
                    <option value="0">False</option>
                    <option value="1">True</option>
                  </select>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Quản lý lưu thông<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="quanlyluuthong" class="form-control col-md-7 col-xs-12">
                    <option value="0">False</option>
                    <option value="1">True</option>
                  </select>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Quản lý biên mục<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="quanlybienmuc" class="form-control col-md-7 col-xs-12">
                    <option value="0">False</option>
                    <option value="1">True</option>
                  </select>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Quản lý quản trị<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="quanlyquantri" class="form-control col-md-7 col-xs-12">
                    <option value="0">False</option>
                    <option value="1">True</option>
                  </select>
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