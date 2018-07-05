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
            <h2>Sửa ấn phẩm <small>Sách giáo khoa/Sách tham khảo</small></h2>
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
                  <input class="form-control col-md-7 col-xs-12" name="maanpham" required="required" type="text" value="{{old('maanpham',isset($book)) ? $book['maanpham'] : null }}">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Mã xếp giá <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="maxepgia" required="required" class="form-control col-md-7 col-xs-12" value="{{old('maxepgia',isset($book)) ? $book['maxepgia'] : null}}">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Lĩnh vực <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="malinhvuc" required="required" class="form-control col-md-7 col-xs-12" value="{{old('malinhvuc',isset($book)) ? $book['malinhvuc'] : null}}">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number" >Mã nhà xuất bản <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="manxb" required class="form-control col-md-7 col-xs-12">
                      @foreach($list_nxb as $l_nxb)
                        <option value="<?php echo intval($l_nxb['manxb']) ?>">{{ $l_nxb['tennxb'] }}</option>
                      @endforeach
                  </select>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Mã tác giả <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="matacgia" required="required" class="form-control col-md-7 col-xs-12" value="{{old('matacgia',isset($book)) ? $book['matacgia'] : null}}" >
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
                </div>
              </div>
              <div class="item form-group">
                <label for="password" class="control-label col-md-3">Tiêu đề <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="tieude" class="form-control col-md-7 col-xs-12" required="required" value="{{old('tieude',isset($book)) ? $book['tieude'] : null}}">
                </div>
              </div>
              <!-- <div class="item form-group">
                <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Số ngày được mượn</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="songayduocmuon" class="form-control col-md-7 col-xs-12" value="{{old('songayduocmuon',isset($book)) ? $book['songayduocmuon'] : null}}">
                </div>
              </div> -->
              <div class="item form-group">
                <label for="password" class="control-label col-md-3">Bìa sách</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="file" name="biasach" class="form-control col-md-7 col-xs-12" value="{{old('biasach',isset($book)) ? $book['biasach'] : null}}">
                </div>
              </div>
              <div class="item form-group">
                <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Lần xuất bản</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="lanxuatban" class="form-control col-md-7 col-xs-12" value="{{old('lanxuatban',isset($book)) ? $book['lanxuatban'] : null}}">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Năm xuất bản
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="tel" name="namxuatban" class="form-control col-md-7 col-xs-12" value="{{old('namxuatban',isset($book)) ? $book['namxuatban'] : null}}">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Người chủ biên
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="nguoichubien" class="form-control col-md-7 col-xs-12" value="{{old('nguoichubien',isset($book)) ? $book['nguoichubien'] : null}}">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Kích thước
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="kichthuoc" class="form-control col-md-7 col-xs-12" value="{{old('kichthuoc',isset($book)) ? $book['kichthuoc'] : null}}">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Số trang
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="sotrang" class="form-control col-md-7 col-xs-12" value="{{old('sotrang',isset($book)) ? $book['sotrang'] : null}}">
                </div>
              </div>  
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Số lượng<span class="required">*</span></label>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="soluong" required="required" class="form-control col-md-7 col-xs-12" value="{{old('soluong',isset($book)) ? $book['soluong'] : null}}">
                </div>
              </div>  
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Giá tiền
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="giatien" class="form-control col-md-7 col-xs-12" value="{{old('giatien',isset($book)) ? $book['giatien'] : null}}">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Thông tin thêm
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="thongtinthem" class="form-control col-md-7 col-xs-12" value="{{old('thongtinthem',isset($book)) ? $book['thongtinthem'] : null}}">
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