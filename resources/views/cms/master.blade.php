<!DOCTYPE html>
<html lang="en">
  <head>
    @include('cms.includes.head')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ route('home') }}" class="site_title"><i class="fas fa-book-open" style="margin-right: 10px;"></i><span>Quản lý Thư Viện</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{ asset('images/admins/'.Auth::user()->anh )}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{Auth::user()->hoten}}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            @include('cms.includes.sidebarmenu')

            <!-- /menu footer buttons -->
            @include('cms.includes.footerbutton')

          </div>
        </div>
        <!-- top navigation -->
        @include('cms.includes.topnavigation')
       
        <!-- page content -->
        @yield('content')
      
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Quản lý Thư Viện - <a href="https://colorlib.com">Nguyễn Thảo</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    @include('cms.includes.javascript')
	
  </body>
</html>
