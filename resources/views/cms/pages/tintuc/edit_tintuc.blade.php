@extends('cms.master')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>TIN TỨC</h3>
      </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Thêm tin tức</h2>
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
              <span class="section">Chi tiết tin</span>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tiêu đề <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="tieude" required="required" class="form-control col-md-7 col-xs-12" value="{{old('tieude',isset($tintuc)) ? $tintuc['tieude'] : null}}">
                  <div style="color: red">
                    @if($errors->has('tieude'))
                       {{ $errors->first('tieude')}}
                    @endif
                  </div>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Mô tả</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="mota" required="required" class="form-control col-md-7 col-xs-12" value="{{old('mota',isset($tintuc)) ? $tintuc['mota'] : null}}">
                  
                </div>
              </div>             
              <div class="item form-group">
                <label for="password" class="control-label col-md-3">Nội dung<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="noidung" class="form-control col-md-7 col-xs-12" required="required" value="{{old('noidung',isset($tintuc)) ? $tintuc['noidung'] : null}}">
                  <div style="color: red">
                    @if($errors->has('noidung'))
                       {{ $errors->first('noidung')}}
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