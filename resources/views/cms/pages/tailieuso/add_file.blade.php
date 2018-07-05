@extends('cms.master')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>ẤN PHẨM</h3>
      </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Thêm tài liệu số </h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <form class="form-horizontal form-label-left" novalidate action="{{ route('add_file') }}" method="post" enctype="multipart/form-data">
              <input type="hidden" name="_token" value = "{{csrf_token()}}">
              <span class="section">Chi tiết tài liệu</span>
                          
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Môn học <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="mamonhoc" required class="form-control col-md-7 col-xs-12">
                      @foreach($list_mh as $l_mh)
                        <option value="<?php echo intval($l_mh['mamonhoc']) ?>">{{ $l_mh['tenmonhoc'] }}</option>
                      @endforeach
                  </select>
                </div>
              </div>
              
              <div class="item form-group">
                <label for="password" class="control-label col-md-3">Tiêu đề <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="tieude" class="form-control col-md-7 col-xs-12" required="required">
                  <div style="color: red">
                    @if($errors->has('tieude'))
                       {{ $errors->first('tieude')}}
                    @endif
                  </div>
                </div>
              </div>

              <div class="item form-group">
                <label for="password" class="control-label col-md-3">Mô tả </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="mota" class="form-control col-md-7 col-xs-12" required="required">
                </div>
              </div>

              <div class="item form-group">
                <label for="password" class="control-label col-md-3">Link <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="file" name="link" class="form-control col-md-7 col-xs-12">
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