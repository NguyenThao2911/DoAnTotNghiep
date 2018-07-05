@extends('cms.master')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>LOẠI BẠN ĐỌC</h3>
      </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Thêm loại bạn đọc</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <form class="form-horizontal form-label-left" novalidate action="{{ route('add_loaibandoc') }}" method="post" enctype="multipart/form-data">
              <input type="hidden" name="_token" value = "{{csrf_token()}}">
              <span class="section">Thông tin Loại bạn đọc</span>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên loại bạn đọc <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="tenloaibandoc" required="required" class="form-control col-md-7 col-xs-12">
                  <div style="color: red">
                    @if($errors->has('tenloaibandoc'))
                       {{ $errors->first('tenloaibandoc')}}
                    @endif
                  </div>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Số sách được mượn<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="sosachduocmuon" required="required" class="form-control col-md-7 col-xs-12">
                  <div style="color: red">
                    @if($errors->has('sosachduocmuon'))
                       {{ $errors->first('sosachduocmuon')}}
                    @endif
                  </div>
                </div>
              </div>             
              <div class="item form-group">
                <label for="password" class="control-label col-md-3">Số sách được đọc<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="sosachduocdoc" class="form-control col-md-7 col-xs-12" required="required">
                  <div style="color: red">
                    @if($errors->has('sosachduocdoc'))
                       {{ $errors->first('sosachduocdoc')}}
                    @endif
                  </div>
                </div>
              </div>
              <div class="item form-group">
                <label for="password" class="control-label col-md-3">Số lần được gia hạn<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="solanduocgiahan" class="form-control col-md-7 col-xs-12">
                  <div style="color: red">
                    @if($errors->has('solanduocgiahan'))
                       {{ $errors->first('solanduocgiahan')}}
                    @endif
                  </div>
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