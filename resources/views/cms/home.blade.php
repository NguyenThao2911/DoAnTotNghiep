@extends('cms.master')
@section('content')
<div class="right_col" role="main">
<!-- top tiles -->

<div>
  
</div>

<div class="row tile_count" style="margin-left: 15px;">
  <a href="{{ route('add_phieumuon') }}"><button>Lập phiếu mượn</button></a>
  <a href="{{ route('timkiemtrasach') }}"><button>Lập phiếu trả</button></a>
</div>

<div class="row tile_count search" style="margin-left: 15px;">
  <form action="{{ route('search_book') }}" method="get">
  <select style="height: 26px; width: 10%;" name="filter">
    <option value="tensach">Tên sách</option>
    <option value="tacgia">Tác giả</option>
    <option value="monhoc">Môn học</option>
  </select>
  <input style="height: 26px" size="37%" type="text" name="key" placeholder="Từ khóa tìm kiếm">
  <button type="submit" style="height: 26px">Tìm kiếm</button>
</form>
</div>

<div class="row tile_count" style="margin-left: 15px;">
  <h4>Thống kê Ấn Phẩm</h4>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fas fa-book-open" style="color: #fd650c; margin-right: 10px;"></i> Tổng Ấn phẩm</span>
    <div class="count" style="color: #fd650c;">{{ $anpham }}</div>
    <!-- <span class="count_bottom"><i class="green">4% </i> From last Week</span> -->
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fas fa-book-open" style="color: #20476f; margin-right: 10px;"></i> Sách giáo khoa</span>
    <div class="count" style="color: #20476f;">{{ $sgk }}</div>
    <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span> -->
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fas fa-book-open" style="color: #1abb9c; margin-right: 10px;"></i> Sách tham khảo</span>
    <div class="count green" style="color: #1abb9c;">{{ $stk }}</div>
    <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fas fa-book-open" style="color: #9e2f34; margin-right: 10px;"></i> Đang mượn</span>
    <div class="count" style="color: #9e2f34;">29</div>
    <!-- <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span> -->
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fas fa-book-open" style="color: #2f949e; margin-right: 10px;"></i> Còn lại</span>
    <div class="count" style="color: #2f949e;">201</div>
    <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
  </div>
</div>
<!-- /top tiles -->
<div class="row tile_count" style="margin-left: 15px;">
  <h4>Thống kê Bạn đọc</h4>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-users"></i> Số lượng bạn đọc</span>
    <div class="count" style="color: #fd650c;">{{ $bandoc }}</div>
    <!-- <span class="count_bottom"><i class="green">4% </i> From last Week</span> -->
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-users" style="color: #20476f;"></i> Bạn đọc học sinh</span>
    <div class="count" style="color: #20476f;">{{ $hocsinh }}</div>
    <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span> -->
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-users" style="color: #1abb9c;"></i> Bạn đọc giáo viên</span>
    <div class="count green" style="color: #1abb9c;">{{ $giaovien }}</div>
    <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
  </div>
</div>

<div class="row tile_count" style="margin-left: 15px;">
  <h4>Thống kê vi phạm</h4>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-users" style="color: #fd650c;"></i> Quá hạn trong ngày</span>
    <div class="count" style="color: #fd650c;">{{ $soluong_quahan }}</div>
    <!-- <span class="count_bottom"><i class="green">4% </i> From last Week</span> -->
  </div>
</div>

<!-- <div class="row tile_count" style="margin-left: 15px;">
  <h4>Thống kê vi phạm</h4>
  <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Donut Graph <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="canvasDoughnut"></canvas>
                  </div>
                </div>
              </div>
  </div> -->
</div>
</div>
@endsection