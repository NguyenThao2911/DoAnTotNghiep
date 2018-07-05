@extends('cms.master')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>PHIẾU TRẢ</h3>
      </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Lập phiếu trả</h2>
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
              <span class="section">Chi tiết phiếu trả</span>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Mã thẻ <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="mathe" required="required" class="form-control col-md-7 col-xs-12" value="{{old('mathe',isset($phieutra)) ? $phieutra['mathe'] : null}}" readonly="">
                  <div style="color: red">
                    @if($errors->has('mathe'))
                       {{ $errors->first('mathe')}}
                    @endif
                  </div>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Mã ấn phẩm<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="maanpham" required="required" class="form-control col-md-7 col-xs-12" value="{{old('maanpham',isset($phieutra)) ? $phieutra['maanpham'] : null}}" readonly="">
                  
                  <div style="color: red">
                    @if($errors->has('maanpham'))
                       {{ $errors->first('maanpham')}}
                    @endif
                  </div>
                </div>
              </div>  
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Ngày mượn<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="date" name="ngaymuon" required="required" class="form-control col-md-7 col-xs-12" value="{{old('ngaymuon',isset($phieutra)) ? $phieutra['ngaymuon'] : null}}" readonly="">
                </div>
              </div>   
              <div class="item form-group">
                <label for="password" class="control-label col-md-3">Tình trạng sách mượn<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="tinhtrangsachmuon" required="required" class="form-control col-md-7 col-xs-12" value="{{old('tinhtrangsachmuon',isset($phieutra)) ? $phieutra['tinhtrangsachmuon']." %" : null}}" readonly="">
                </div>
              </div>
              <div class="item form-group">
                <label for="password" class="control-label col-md-3">Ngày hết hạn<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="date" name="ngayhethan" class="form-control col-md-7 col-xs-12" value="{{old('ngayhethan',isset($phieutra)) ? $phieutra['ngayhethan'] : null}}"  readonly="">
                  <div style="color: red">
                    @if($errors->has('ngayhethan'))
                       {{ $errors->first('ngayhethan')}}
                    @endif
                  </div>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Thông tin thêm</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="thongtinthem" required="required" class="form-control col-md-7 col-xs-12" value="{{old('thongtinthem',isset($phieutra)) ? $phieutra['thongtinthem'] : null}}">
                </div>
              </div> 
              <div class="item form-group">
                <label for="password" class="control-label col-md-3">Ngày trả<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="date" name="ngaytra" class="form-control col-md-7 col-xs-12" value="<?php echo date('Y-m-d'); ?>" readonly = "">
                  <div style="color: red">
                    @if($errors->has('ngaytra'))
                       {{ $errors->first('ngaytra')}}
                    @endif
                  </div>
                </div>
              </div>
              <div class="item form-group">
                <label for="password" class="control-label col-md-3">Tình trạng sách trả<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="tinhtrangsachtra" required="required" class="optional form-control col-md-7 col-xs-12">
                    <option value="50">50%</option>
                    <option value="60">60%</option>
                    <option value="70">70%</option>
                    <option value="80">80%</option>
                    <option value="90">90%</option>
                    <option value="100">100%</option>
                  </select>
                  <div style="color: red">
                    @if($errors->has('tinhtrangsachtra'))
                       {{ $errors->first('tinhtrangsachtra')}}
                    @endif
                  </div>
                </div>
              </div>
              <div class="item form-group">
                <label for="password" class="control-label col-md-3">Tiền phạt<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="tienphat" class="form-control col-md-7 col-xs-12">
                  <div style="color: red">
                    @if($errors->has('ngaytra'))
                       {{ $errors->first('ngaytra')}}
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
<script>
    // $(document).ready(function () {
      
    //     $('#themanpham').click(function () {
          
    //    $('.add').html('<input type="text" name="maanpham" required="required" class="form-control col-md-7 col-xs-12">');
    //     });

    // });
</script>
@endsection