@extends('cms.master')
@section('content')
<SCRIPT LANGUAGE="JavaScript">
      function confirmAction() {
        return confirm("Bạn có chắc chắn muốn xóa?")
      }
 
</SCRIPT>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-lg-12">
          @if(Session::has('flash_message'))
               <div class="alert alert-{{Session::get('flash_level')}}">
                   {{Session::get('flash_message')}}
               </div>
          @endif
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>PHIẾU MƯỢN</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Danh sách <small>Phiếu mượn</small></h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <!-- <p>Quản lý danh sách Phiếu mượn</p> -->

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Mã phiếu mượn </th>
                            <th class="column-title">Mã thẻ </th>
                            <th class="column-title">Mã ấn phẩm </th>
                            <!-- <th class="column-title">Ngày hết hạn </th> -->
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php $i = 1; ?>
                          @foreach ($Phieumuon as $pm)
                          <?php $i++; ?>
                          <tr class="<?php if( $i%2==0) { echo "even pointer"; } else { echo "odd pointer"; } ?>">
                            <td class=" ">{{ $pm['id_phieumuon'] }}</td>
                            <td class=" ">{{ $pm['mathe'] }}</td>
                            <td class=" ">{{ $pm['maanpham'] }}</td>
                            <!-- <td class=" ">{{ $pm['ngayhethan'] }}</td> -->
                            <td class=" last"><a href="#">View</a> | <a href="#">Edit</a>
                            </td>
                          </tr>
                          @endforeach
                         
                        </tbody>
                      </table>

                      {{ $Phieumuon->links() }}
                    </div>
              
            
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection