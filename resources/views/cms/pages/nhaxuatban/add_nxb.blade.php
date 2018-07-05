@extends('cms.master')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>NHÀ XUẤT BẢN</h3>
      </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Thêm nhà xuất bản</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <form class="form-horizontal form-label-left" novalidate action="" method="post" enctype="multipart/form-data">
              <input type="hidden" name="_token" value = "{{csrf_token()}}">
              <span class="section">Thông tin Nhà xuất bản</span>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên nhà xuất bản <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="tennxb" required="required" class="form-control col-md-7 col-xs-12">
                  <div style="color: red">
                    @if($errors->has('tennxb'))
                       {{ $errors->first('tennxb')}}
                    @endif
                  </div>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Địa chỉ</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="diachi" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>             
              <div class="item form-group">
                <label for="password" class="control-label col-md-3">Điện thoại</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="dienthoai" class="form-control col-md-7 col-xs-12" required="required">
                </div>
              </div>
              <div class="item form-group">
                <label for="password" class="control-label col-md-3">Fax</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="fax" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="email" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Website
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="tel" name="website" class="form-control col-md-7 col-xs-12">
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