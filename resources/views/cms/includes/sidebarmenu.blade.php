<?php
use Illuminate\Support\Facades\Auth;
?>

<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section" style="display: <?php if(Auth::check() && (Auth::user()->quanlybienmuc) != 1 && (Auth::user()->quanlyquantri) != 1) {echo "none"; } ?>">
      <h3>Biên mục</h3>
      <ul class="nav side-menu">
        <li><a><i class="fas fa-book-open" style="margin-right: 20px;"></i> Ấn Phẩm <span class="fa fa-chevron-down" style="float: right; margin-right: 5px; margin-top: 3px;"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ route('add_book') }}">Thêm ấn phẩm</a></li>
            <li><a href="{{ route('list_book') }}">Danh sách ấn phẩm</a></li>
          </ul>
        </li>
        <li><a><i class="far fa-file-alt" style="margin-right: 20px;"></i> Tài liệu số <span class="fa fa-chevron-down" style="float: right; margin-right: 5px; margin-top: 3px;"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ route('add_file') }}">Thêm tài liệu</a></li>
            <li><a href="{{ route('list_file') }}">Danh sách</a></li>
          </ul>
        </li>
        <li><a><i class="far fa-newspaper" style="margin-right: 20px;"></i> Tin tức <span class="fa fa-chevron-down" style="float: right; margin-right: 5px; margin-top: 3px;"></span></a>
          <ul class="nav child_menu">
              <li><a href="{{ route('add_tintuc') }}"<>Thêm tin tức</a></li>
              <li><a href="{{ route('list_tintuc') }}">Danh sách tin</a></li>
          </ul>
        </li>
        <li><a><i class="far fa-building" style="margin-right: 20px;"></i> Nhà xuất bản <span class="fa fa-chevron-down" style="float: right; margin-right: 5px; margin-top: 3px;"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ route('add_nxb') }}">Thêm NXB</a></li>
            <li><a href="{{ route('list_nxb') }}">Danh sách</a></li>
          </ul>
        </li>  
        <li><a><i class="fa fa-user" style="margin-right: 20px;"></i> Tác giả <span class="fa fa-chevron-down" style="float: right; margin-right: 5px; margin-top: 3px;"></span></a>
          <ul class="nav child_menu">
            <li><a href="page_403.html">Thêm tác giả</a></li>
            <li><a href="page_404.html">Danh sách</a></li>
          </ul>
        </li>               
      </ul>
    </div>

    <div class="menu_section" style="display: <?php if(Auth::check() && (Auth::user()->quanlyluuthong) != 1 && (Auth::user()->quanlyquantri) != 1) {echo "none"; } ?>">
      <h3>Lưu thông </h3>
      <ul class="nav side-menu">
        <li><a><i class="fa fa-edit" style="margin-right: 20px;"></i>Quản lý Mượn<span class="fa fa-chevron-down" style="float: right; margin-right: 5px; margin-top: 3px;"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ route('add_phieumuon') }}">Lập phiếu mượn</a></li>
            <li><a href="{{ route('list_phieumuon') }}">Danh sách</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-edit" style="margin-right: 20px;"></i> Quản lý Trả<span class="fa fa-chevron-down" style="float: right; margin-right: 5px; margin-top: 3px;"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ route('timkiemtrasach') }}">Trả ấn phẩm</a></li>
            <!-- <li><a href="form_advanced.html">Danh sách</a></li>  -->
          </ul>
        </li>
        <li><a><i class="fa fa-desktop" style="margin-right: 20px;"></i> Xử lý Quá Hạn <span class="fa fa-chevron-down" style="float: right; margin-right: 5px; margin-top: 3px;"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ route('list_quahan') }}">Danh sách quá hạn</a></li></a>       
          </ul>
        </li>
        <li><a><i class="fa fa-table" style="margin-right: 20px;"></i> Xử lý Phạt <span class="fa fa-chevron-down" style="float: right; margin-right: 5px; margin-top: 3px;"></span></a>
          <ul class="nav child_menu">
            <li><a href="tables.html">Tables</a></li>
            <li><a href="tables_dynamic.html">Table Dynamic</a></li>
          </ul>
        </li>
      </ul>
    </div>
    
    <div class="menu_section" style="display: <?php if(Auth::check() && (Auth::user()->quanlybandoc) != 1 && (Auth::user()->quanlyquantri) != 1) {echo "none"; } ?>">
      <h3>Quản lý bạn đọc</h3>
      <ul class="nav side-menu">
        <li><a><i class="far fa-address-card" style="margin-right: 20px;"></i> Thẻ bạn đọc <span class="fa fa-chevron-down" style="float: right; margin-right: 5px; margin-top: 3px;"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ route('add_reader_card') }}">Tạo thẻ</a></li>
            <li><a href="{{ route('list_reader') }}">Danh sách</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-windows" style="margin-right: 20px;"></i> Loại bạn đọc <span class="fa fa-chevron-down" style="float: right; margin-right: 5px; margin-top: 3px;"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ route('add_loaibandoc') }}">Thêm loại bạn đọc</a></li>
            <li><a href="{{ route('list_loaibandoc') }}">Danh sách</a></li>
          </ul>
        </li>            
      </ul>
    </div>

    <div class="menu_section" style="display: <?php if(Auth::check() && (Auth::user()->quanlybandoc) != 1 && (Auth::user()->quanlyquantri) != 1) {echo "none"; } ?>">
      <h3>Báo cáo </h3>
      <ul class="nav side-menu">
        <li><a><i class="far fa-address-card" style="margin-right: 20px;"></i> Báo cáo 1 <span class="fa fa-chevron-down" style="float: right; margin-right: 5px; margin-top: 3px;"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ route('add_reader_card') }}">Tạo thẻ</a></li>
            <li><a href="{{ route('list_reader') }}">Danh sách</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-windows" style="margin-right: 20px;"></i> Báo cáo 2 <span class="fa fa-chevron-down" style="float: right; margin-right: 5px; margin-top: 3px;"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ route('add_loaibandoc') }}">Thêm loại bạn đọc</a></li>
            <li><a href="{{ route('list_loaibandoc') }}">Danh sách</a></li>
          </ul>
        </li>            
      </ul>
    </div>

    <div class="menu_section" style="display: <?php if(Auth::check() && (Auth::user()->quanlyquantri) != 1) {echo "none"; } ?>">
      <h3>Quản trị</h3>
      <ul class="nav side-menu">
        <li><a><i class="fa fa-home" style="margin-right: 20px;"></i> Tài khoản quản trị <span class="fa fa-chevron-down" style="float: right; margin-right: 5px; margin-top: 3px;"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ route('add_admin') }}">Thêm tài khoản</a></li>
            <li><a href="{{ route('list_admin') }}">Danh sách</a></li>
          </ul>
        </li>         
      </ul>
    </div>
  </div>