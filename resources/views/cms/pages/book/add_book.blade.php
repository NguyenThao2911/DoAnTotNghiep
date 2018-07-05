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
            <h2>Thêm ấn phẩm <small>Sách giáo khoa/Sách tham khảo</small></h2>
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
              <span class="section">Thông tin ấn phẩm</span>
              
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >Mã ấn phẩm <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input class="form-control col-md-7 col-xs-12" name="maanpham"  required="required" type="text">
                  <div style="color: red">
                    @if($errors->has('maanpham'))
                       {{ $errors->first('maanpham')}}
                    @endif
                  </div>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Mã xếp giá <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="maxepgia" required="required" class="form-control col-md-7 col-xs-12">
                  <div style="color: red">
                    @if($errors->has('maxepgia'))
                       {{ $errors->first('maxepgia')}}
                    @endif
                  </div>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Lĩnh vực <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="malinhvuc" required class="form-control col-md-7 col-xs-12">
                      @foreach($list_linhvuc as $l_lv)
                        <option value="<?php echo intval($l_lv['malinhvuc']) ?>">{{ $l_lv['tenlinhvuc'] }}</option>
                      @endforeach
                  </select>
                  <div style="color: red">
                    @if($errors->has('malinhvuc'))
                       {{ $errors->first('malinhvuc')}}
                    @endif
                  </div>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number" >Nhà xuất bản <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="manxb" required class="form-control col-md-7 col-xs-12">
                      @foreach($list_nxb as $l_nxb)
                        <option value="<?php echo intval($l_nxb['manxb']) ?>">{{ $l_nxb['tennxb'] }}</option>
                      @endforeach
                  </select>
                   <div style="color: red">
                    @if($errors->has('manxb'))
                       {{ $errors->first('manxb')}}
                    @endif
                  </div>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Mã tác giả <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="matacgia" required class="form-control col-md-7 col-xs-12">
                      @foreach($list_tacgia as $l_tg)
                        <option value="<?php echo intval($l_tg['matacgia']) ?>">{{ $l_tg['hotentacgia'] }}</option>
                      @endforeach
                  </select>
                   <div style="color: red">
                    @if($errors->has('matacgia'))
                       {{ $errors->first('matacgia')}}
                    @endif
                  </div>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Môn học <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="mamonhoc" required class="form-control col-md-7 col-xs-12">
                      @foreach($list_mh as $l_mh)
                        <option value="<?php echo intval($l_mh['mamonhoc']) ?>">{{ $l_mh['tenmonhoc'] }}</option>
                      @endforeach
                  </select>
                  <div style="color: red">
                    @if($errors->has('mamonhoc'))
                       {{ $errors->first('mamonhoc')}}
                    @endif
                  </div>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Thể loại <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="theloai" required="required" class="optional form-control col-md-7 col-xs-12">
                    <option value="0">Sách giáo khoa</option>
                    <option value="1">Sách tham khảo</option>
                  </select>
                  <div style="color: red">
                    @if($errors->has('theloai'))
                       {{ $errors->first('theloai')}}
                    @endif
                  </div>
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
              <!-- <div class="item form-group">
                <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Số ngày được mượn</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="songayduocmuon" class="form-control col-md-7 col-xs-12">
                </div>
              </div> -->
              <div class="item form-group">
                <label for="password" class="control-label col-md-3">Bìa sách</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="file" name="biasach" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Lần xuất bản</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="lanxuatban" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Năm xuất bản
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="tel" name="namxuatban" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Người chủ biên
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="nguoichubien" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Kích thước
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="kichthuoc" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Số trang
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="sotrang" class="form-control col-md-7 col-xs-12">
                </div>
              </div>  
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Số lượng<span class="required">*</span></label>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="soluong" required="required" class="form-control col-md-7 col-xs-12">
                   <div style="color: red">
                    @if($errors->has('soluong'))
                       {{ $errors->first('soluong')}}
                    @endif
                  </div>
                </div>
              </div>  
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Giá tiền
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="giatien" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Thông tin thêm
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="thongtinthem" class="form-control col-md-7 col-xs-12">
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