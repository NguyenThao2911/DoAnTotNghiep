@extends('cms.master')
@section('content')
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Ấn Phẩm </h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-lg-12">
                  @if(Session::has('flash_message'))
                       <div class="alert alert-{{Session::get('flash_level')}}">
                           {{Session::get('flash_message')}}
                       </div>
                  @endif
              </div>
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Danh sách Ấn phẩm môn @foreach($subject_name as $sub_name) {{ $sub_name['tenmonhoc'] }} </h2>
                    <a href="{{ route('add_book') }}"><h2 style="float: right;">Thêm (+)</h2></a>
                    <div class="clearfix"></div>
                  </div>
                  <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                      <form action="{{ route('search_book_subject', $sub_name['mamonhoc']) }}" method="get">
                      <div class="input-group">
                        <input name="tenanpham" type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default" type="button">Go!</button>
                        </span>
                      </div>
                    </form>
                    </div>
                  </div>
                  @endforeach
                  <div class="x_content">

                    <div class="row">
                      @foreach ($listbook as $l_book)
                      <div class="col-md-55">
                        <div class="thumbnail" style="height: auto">
                          <div class="image" style="height: auto">
                          <div class="view view-first">
                            
                            <a href="{{ route('book_detail', $l_book['maanpham']) }}"><img style="width: 100%; height: 230px; display: block;" src="{{ asset('images/books/'.$l_book['biasach'] )}}" alt="image" onclick="return confirmAction()" /></a>
                            </div>
                          </div>
                          <div class="caption" style="text-align: center;">
                            <a style="font-size: 13px;"><b>
                            @if( strlen($l_book['tieude']) < 22)
                              {{ $l_book['tieude'] }}
                            @else
                              {{ mb_substr($l_book['tieude'],0,22,"utf-8")."..." }}
                            @endif
                            </b></a>              
                          </div>
                        </div>
                      </div>
                      @endforeach        
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{ $listbook->links() }}
        </div>
@endsection