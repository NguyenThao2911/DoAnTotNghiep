@extends('cms.master')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>TÌM KIẾM </h3>
      </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Trả ấn phẩm</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form action="{{ route('timkiemsachtra') }}" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-left top_search">
                <div class="input-group">
                  <input name="mathe" type="text" class="form-control" placeholder="Nhập mã thẻ...">
                </div>
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Go!</button>
                </span>
              </div>
            </form>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection