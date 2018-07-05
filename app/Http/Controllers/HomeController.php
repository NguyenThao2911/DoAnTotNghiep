<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MonHoc;
use App\AnPham;
use App\TaiLieuSo;
use App\TinTuc;
use App\BanDoc;
use App\DatTruoc;
use App\NhanVienThuVien;
use App\LoaiBanDoc;
use App\LuotMuon;
use App\TacGia;
use Auth;

class HomeController extends Controller
{
    public function LoginBD(Request $req){
        $this->validate($req,
        [
            'mathe'=>'required',
            'password'=>'required'
        ],
        [
            'mathe.required'=>'Vui lòng nhập mã thẻ',
            'password.required'=>'Vui lòng nhập password'
        ]);
        $credentials= array('mathe'=>$req->mathe, 'password'=>$req->password);
        if(Auth::guard('bandoc')->attempt($credentials)){
          // echo "đăng nhập thành công";
            return redirect()->back()->with(['flag'=>'success', 'message'=>'Đăng nhập thành công!']);
        }else{
          // echo "Đăng nhập thất bại";
            return redirect()->back()->with(['flag'=>'unsuccess', 'message'=>'Sai thông tin đăng nhập!']);
        }
       
    }

    public function LogoutBD() {
      Auth::guard('bandoc')->logout();
      return redirect()->route('getHome')->with(['flag'=>'unsuccess', 'message'=>'Đăng xuất thành công!']);
    }

    public function getHome() {
    	$monhoc = MonHoc::select('*')->get()->toArray();
    	$sachmoinhat = AnPham::select('tieude', 'biasach', 'maanpham')->orderBy('create_at','desc')->take(5)->get();
    	$tailieusomoinhat = TaiLieuSo::select('tieude','link')->orderBy('create_at','desc')->take(5)->get();
    	$nghiepvuthuvien = TinTuc::select('tieude', 'mota')->where('id', 1)->get();
      $docnhieuganday = TaiLieuSo::select('tieude','link')->orderBy('create_at','asc')->take(5)->get();
      $muonnhieuganday = AnPham::select('tieude', 'biasach', 'maanpham')->orderBy('create_at','asc')->take(5)->get();
      $tintuc = TinTuc::select('id', 'tieude')->where('id', '!=', 1)->orderBy('create_at','desc')->take(5)->get();
      $count_tailieuso = TaiLieuSo::select('matailieu')->count();
      $count_anpham = AnPham::select('maanpham')->sum('soluong');

    	return view('reader.home', compact('monhoc','sachmoinhat','tailieusomoinhat', 'nghiepvuthuvien', 'docnhieuganday', 'muonnhieuganday', 'count_tailieuso', 'count_anpham', 'tintuc'));
    }

    public function getGioiThieuChung() {
      $giamdoc = NhanVienThuVien::select('*')->where('quanlyquantri', '1')->get();
      $nhanvien = NhanVienThuVien::select('*')->where('quanlyquantri', '!=', '1')->get();
      return view('reader.gioithieuchung', compact('giamdoc', 'nhanvien'));
    }

    public function getTruyenThong() {
      return view('reader.truyenthong');
    }

    public function getCoCauToChuc() {
      return view('reader.cocautochuc');
    }

    public function getNghiepVuThuVien() {
      $tintuc = TinTuc::select('id', 'tieude')->get();
      $nghiepvuthuvien = TinTuc::select('*')->where('id', '1')->get();
      return view('reader.nghiepvuthuvien', compact('tintuc', 'nghiepvuthuvien'));
    }

    public function getChiTietTin($id) {
      $tinchitiet = TinTuc::select('*')->where('id', $id)->get();
      $tintuc = TinTuc::select('id', 'tieude')->get();
      return view('reader.chitiettin', compact('tinchitiet', 'tintuc'));
    }

    public function getNoiQuyPM() {
    	return view('reader.noiquyphongmuon');
    }

    public function getNoiQuyPD() {
    	return view('reader.noiquyphongdoc');
    }

    public function getLichlamviec() {
    	return view('reader.lichlamviec');
    }

    public function getChiTietAnPham($maanpham) {
        $anpham = AnPham::select('*')->where('maanpham', $maanpham)->get();
        $monhoc = MonHoc::select('*')->get()->toArray();
        return view('reader.chitietanpham', compact('anpham', 'monhoc'));
    }

    public function getListTaiLieuSo($mamonhoc) {
        $tailieuso = TaiLieuSo::select('*')->where('mamonhoc', $mamonhoc)->get();
        $tls_monhoc = MonHoc::select('tenmonhoc')->where('mamonhoc', $mamonhoc)->get();
        $monhoc = MonHoc::select('*')->get()->toArray();
        return view('reader.danhsachtailieuso', compact('tailieuso', 'monhoc', 'tls_monhoc'));
    }

    public function getListAP($mamonhoc) {
      $anpham = AnPham::select('*')->where('mamonhoc', $mamonhoc)->paginate(10);
      $ap_mh = MonHoc::select('tenmonhoc')->where('mamonhoc', $mamonhoc)->get();
      $monhoc = MonHoc::select('*')->get()->toArray();
      return view('reader.danhsachanphamtheomonhoc', compact('anpham', 'monhoc', 'ap_mh'));
    }

    public function getDattruoc($maanpham) {

      // Nếu bạn đọc đã từng đặt trước thì kiểm tra số ấn phẩm được phép đặt trước và không cho đặt trước 1 ẩn phẩm nhiều lần
      $array = BanDoc::select('bandoc.mathe', 'bandoc.maloaibandoc', 'sosachduocdattruoc', 'maanpham')->join('dattruoc', 'bandoc.mathe', '=', 'dattruoc.mathe')->join('loaibandoc', 'bandoc.maloaibandoc', '=', 'loaibandoc.maloaibandoc')->where('bandoc.mathe', Auth::guard('bandoc')->user()->mathe)->get()->toArray();
     
      foreach ($array as $arr) {
        if ($arr['maanpham'] == $maanpham && $arr['mathe'] == Auth::guard('bandoc')->user()->mathe) {
          return redirect()->route('getchitietanpham', $maanpham)->with(['flash_level'=>'success', 'error'=>'Bạn đã đặt trước ấn phẩm này!']);
        }
        elseif (count($array) >= $arr['sosachduocdattruoc']) {
          return redirect()->route('getchitietanpham', $maanpham)->with(['flash_level'=>'success', 'error'=>'Bạn đã đặt trước tối đa số lượng cho phép!']);
        }
        elseif ($arr['maanpham'] != $maanpham && count($array) < $arr['sosachduocdattruoc']){
          $dattruoc = new DatTruoc();
          $dattruoc->mathe = Auth::guard('bandoc')->user()->mathe;
          $dattruoc->maanpham = $maanpham;
          $dattruoc->ngaydattruoc=date('Y-m-d');
          $dattruoc->save();

          return redirect()->route('getchitietanpham', $maanpham)->with(['flash_level'=>'success', 'flash_message'=>'Đặt trước ấn phẩm thành công!']);
        } 
      }

      // Khi bạn đọc chưa từng đặt trước
      if (empty($array)) {
        $dattruoc = new DatTruoc();
        $dattruoc->mathe = Auth::guard('bandoc')->user()->mathe;
        $dattruoc->maanpham = $maanpham;
        $dattruoc->ngaydattruoc=date('Y-m-d');
        $dattruoc->save();

        return redirect()->route('getchitietanpham', $maanpham)->with(['flash_level'=>'success', 'flash_message'=>'Đặt trước ấn phẩm thành công!']);
      }


    }

    public function getTinhTrangSachMuon() {
      $monhoc = MonHoc::select('*')->get()->toArray();
      $sachdangmuon = LuotMuon::select('luotmuon.id_luotmuon', 'luotmuon.maanpham', 'tieude', 'ngaymuon', 'ngayhethan', 'luotmuon.ngaytra')->join('anpham', 'luotmuon.maanpham', '=', 'anpham.maanpham')->where([['luotmuon.ngaytra', '=', null], ['mathe', Auth::guard('bandoc')->user()->mathe]])->get()->toArray();

      // dd($sachdangmuon); die;
      return view('reader.tinhtrangsachmuon', compact('monhoc', 'sachdangmuon'));
    }

    public function getThongTinCaNhan() {
      $bandoc = BanDoc::select('*')->where('mathe', Auth::guard('bandoc')->user()->mathe)->get();
      return view('reader.thongtincanhan', compact('bandoc'));
    }

    public function getDanhSachDatTruoc() {
      $dattruoc = DatTruoc::select('*')->where('mathe', Auth::guard('bandoc')->user()->mathe)->get()->toArray();
      return view('reader.danhsachdattruoc', compact('dattruoc'));
    }

    public function getHuyDatTruoc($id_dattruoc) {
      $huydattruoc = DatTruoc::find($id_dattruoc);
      $huydattruoc->delete($id_dattruoc);
      return redirect()->route('getDanhsachdattruoc')->with(['flash_level'=>'success', 'flash_message'=>'Hủy đặt trước ấn phẩm thành công']);
    }

    //Bạn đọc gia hạn 

    public function getGiaHan($id_luotmuon) {

      $monhoc = MonHoc::select('*')->get()->toArray();
      $sachdangmuon = LuotMuon::select('luotmuon.id_luotmuon', 'luotmuon.maanpham', 'tieude', 'ngaymuon', 'ngayhethan', 'luotmuon.ngaytra')->join('anpham', 'luotmuon.maanpham', '=', 'anpham.maanpham')->where([['luotmuon.ngaytra', '=', null], ['mathe', Auth::guard('bandoc')->user()->mathe]])->get()->toArray();


      $anphamgiahan = BanDoc::select('bandoc.maloaibandoc', 'bandoc.mathe', 'loaibandoc.solanduocgiahan', 'luotmuon.id_luotmuon', 'luotmuon.maanpham', 'luotmuon.ngayhethan', 'luotmuon.langiahan')->join('luotmuon', 'bandoc.mathe', '=', 'luotmuon.mathe')->join('loaibandoc', 'bandoc.maloaibandoc', '=', 'loaibandoc.maloaibandoc')->where('id_luotmuon', $id_luotmuon)->get()->toArray();

      foreach ($anphamgiahan as $apgh) {
        // dd($apgh);
        // die;
        //Kiểm tra sách đã đến ngày trả chưa
        if ($apgh['ngayhethan'] == date("Y-m-d")) {

          //Kiểm tra lần gia hạn phải nhỏ hơn số lần được phép gia hạn thì mới được gia hạn
          if ($apgh['langiahan'] < $apgh['solanduocgiahan']) {
            // dd(1); die;
            $anpham_gh = LuotMuon::find($id_luotmuon);
            $anpham_gh->ngayhethan = date('Y/m/d', mktime(0, 0, 0, date("m")  , date("d")+10, date("Y")));
            $anpham_gh->langiahan = $apgh['langiahan'] + 1;
            $anpham_gh->save();
            $flash_message = "Sách đã được gia hạn thêm 10 ngày";
            return view('reader.tinhtrangsachmuon', compact('monhoc', 'sachdangmuon', 'flash_message'));
          }
          // Trường hợp lần gia hạn bằng hoặc lớn hơn số lần được phép gia hạn thì không được gia hạn
          else {
            $flash_message = "Bạn đọc là hết số lần gia hạn cho ấn phẩm này";
            return view('reader.tinhtrangsachmuon', compact('monhoc', 'sachdangmuon', 'flash_message'));
          }
        } 
        // Kiểm tra sách chưa hết hạn thì không được gia hạn
        elseif($apgh['ngayhethan'] > date("Y-m-d")){
            $flash_message = "Sách chưa hết hạn";
            return view('reader.tinhtrangsachmuon', compact('monhoc', 'sachdangmuon', 'flash_message'));
        }
        // Kiểm tra sách đã quá hạn thì không đươc gia hạn
        elseif( $apgh['ngayhethan'] < date("Y-m-d") ) {
            $flash_message = "Sách đã quá hạn. Mời bạn mang sách lên thư viện để thanh toán trả";
            return view('reader.tinhtrangsachmuon', compact('monhoc', 'sachdangmuon', 'flash_message'));
        }
      }

    }

    public function getSearchBook(Request $req) {
      $filter = $req->filter;
      $key = $req->key;
      if ($filter == "tensach") {
        $anpham = AnPham::select('*')->where('tieude', 'like', '%'.$key.'%')->get();
      }
      if ($filter == "tacgia") {
        $anpham = AnPham::select('*')->join('tacgia', 'anpham.matacgia', '=', 'tacgia.matacgia')->where('tentacgia', 'like', '%'.$key.'%')->get();
      }
      if ($filter == "monhoc") {
        $anpham = AnPham::select('*')->join('monhoc', 'anpham.mamonhoc', '=', 'monhoc.mamonhoc')->where('tenmonhoc', 'like', '%'.$key.'%')->get();
      }

      $monhoc = MonHoc::select('*')->get()->toArray();
      
      return view('reader.timkiemsach', compact('anpham', 'monhoc'));

    }

    public function getEditInfo() {
        $bandoc = BanDoc::select('*')->join('loaibandoc', 'bandoc.maloaibandoc', '=', 'loaibandoc.maloaibandoc')->where('mathe', Auth::guard('bandoc')->user()->mathe)->get();
        return view('reader.edit_thongtincanhan', compact('bandoc'));
    }

    public function postEditInfo(Request $req) {
      $bandoc = BanDoc::find(Auth::guard('bandoc')->user()->mathe);
      $bandoc->hoten = $req->hoten;
      $bandoc->gioitinh = $req->gioitinh;
      $bandoc->diachi = $req->diachi;
      $bandoc->ngaysinh = $req->ngaysinh;
      $bandoc->email = $req->email;
      $bandoc->dienthoai = $req->dienthoai;
      $bandoc->cmtnd = $req->cmtnd;
      $bandoc->save();
      return redirect()->route('getThongtincanhan')->with(['flash_level'=>'success', 'flash_message'=>'Thay đổi thông tin thành công']);
    }
}
