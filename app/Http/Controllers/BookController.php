<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\NhaXuatBan;
use App\AnPham;
use App\MonHoc;
use App\LinhVuc;
use App\TacGia;
use App\LuotMuon;
use App\DatTruoc;
use Auth;
use Illuminate\Support\Facades\Input;

class BookController extends Controller
{
	public function getListBook() {
        // $book = new AnPham(); 
        // $list_b = $book->all()->toArray();
        // $listbook = $book->orderBy('create_at','desc')->paginate(10);
        // $count_book = count($list_b);
        $subject = new MonHoc();
        $list_subject = $subject->all()->toArray();
        return view('cms.pages.book.list', compact('list_subject'));
	}

    public function getListBookDetail($mamonhoc) {
        $listbook = AnPham::select('*')->where('mamonhoc', $mamonhoc)->paginate(10);
        $subject_name = MonHoc::select('tenmonhoc', 'mamonhoc')->where('mamonhoc', $mamonhoc)->get();
        return view('cms.pages.book.list_book_subject', compact('listbook', 'subject_name'));
    }
    
    public function getBookDetail($maanpham) {
        $anpham = AnPham::select('*')->join('nhaxuatban', 'anpham.manxb','=', 'nhaxuatban.manxb')->join('nhanvienthuvien', 'anpham.nguoibienmuc', '=', 'nhanvienthuvien.manhanvien')->join('monhoc', 'anpham.mamonhoc', '=', 'monhoc.mamonhoc')->join('linhvuc', 'anpham.malinhvuc', '=', 'linhvuc.malinhvuc')->join('tacgia', 'anpham.matacgia', '=', 'anpham.matacgia')->where('maanpham', $maanpham)->get()->toArray();
        // dd($anpham);die;
        $tong_anpham = AnPham::select('soluong')->where('maanpham', $maanpham)->get()->toArray();
        
        $tong_anpham_dangmuon = LuotMuon::select('id_luotmuon')->where('maanpham', $maanpham)->count();
       
        foreach ($tong_anpham as $tong_ap) {
             $tong_anpham_trongkho = $tong_ap['soluong'] - $tong_anpham_dangmuon;
        }
       
        $tong_anpham_dattruoc = DatTruoc::select('id_dattruoc')->where('maanpham', $maanpham)->count();
        // dd($tong_anpham_dattruoc); die;
        return view('cms.pages.book.book_detail', compact('anpham', 'tong_anpham_dangmuon', 'tong_anpham_trongkho', 'tong_anpham_dattruoc'));
    }

    public function getAddBook() {
        $list_nxb = NhaXuatBan::all();
        $list_mh = MonHoc::all();
        $list_linhvuc = LinhVuc::all();
        $list_tacgia = TacGia::all();
    	return view('cms.pages.book.add_book', compact('list_nxb','list_mh', 'list_linhvuc', 'list_tacgia'));
    }

    public function updateBook($maanpham=null, Request $req) {

    	$this->validate($req,
    		[
            	'maanpham'=>'required',
            	'maxepgia'=>'required',
            	'malinhvuc'=>'required',
            	'manxb'=>'required',
            	'matacgia'=>'required',
            	'mamonhoc'=>'required',
            	'tieude'=>'required',
            	'theloai'=>'required',
            	'soluong'=>'required',
                // 'songayduocmuon'=>'required',
    		],
    		[
                'maanpham.required'=>'Vui lòng nhập mã ấn phẩm',
                'maxepgia.required'=>'Vui lòng nhập mã xếp giá',
                'malinhvuc.required'=>'Vui lòng chọn lĩnh vực',
                'manxb.required'=>'Vui lòng nhập mã nhà xuất bản',
                'matacgia.required'=>'Vui lòng nhập mã tác giả',
                'mamonhoc.required'=>'Vui lòng nhập mã môn học',
                'tieude.required'=>'Vui lòng nhập tiêu đề',
                'theloai.required'=>'Vui lòng nhập thể loại',
                'soluong.required'=>'Vui lòng nhập số lượng',
                // 'songayduocmuon.required'=>'Vui lòng nhập số ngày được mượn',
    		]);
    	if($maanpham == null) {
            $anpham = new AnPham();
        } else {
            $anpham = AnPham::find($maanpham);
        }
    	
    	$anpham->maanpham = $req->maanpham;
    	$anpham->maxepgia = $req->maxepgia;
    	$anpham->malinhvuc = $req->malinhvuc;
    	$anpham->manxb = $req->manxb;
    	$anpham->matacgia = $req->matacgia;
    	$anpham->mamonhoc = $req->mamonhoc;
    	$anpham->tieude = $req->tieude;
    	$anpham->lanxuatban = $req->lanxuatban;
    	$anpham->namxuatban = $req->namxuatban;
    	$anpham->nguoichubien = $req->nguoichubien;
        if ($req->theloai == 0) {
            $anpham->songayduocmuon = 20;
        } else {
            $anpham->songayduocmuon = 10;
        }
    	
    	$anpham->kichthuoc = $req->kichthuoc;
    	$anpham->sotrang = $req->sotrang;
    	$anpham->soluong = $req->soluong;
    	$anpham->theloai = $req->theloai;
    	$anpham->giatien = $req->giatien;
    	$anpham->thongtinthem = $req->thongtinthem;
    	$anpham->nguoibienmuc = Auth::user()->manhanvien;
        if ($req->hasFile('biasach')) {
            $image = $req->file('biasach');
            $image->move(public_path(). '/images/books', $image->getClientOriginalName());
            $anpham->biasach = $image->getClientOriginalName();
        }
    	$anpham->save();

        if($maanpham == null) {
            return redirect()->route('list_book')->with(['flash_level'=>'success', 'flash_message'=>'Thêm ấn phẩm thành công']);
        } else {
            return redirect()->route('book_detail',$maanpham)->with(['flash_level'=>'success', 'flash_message'=>'Sửa ấn phẩm thành công']);
        }
    	
    }

    public function getDelBook($maanpham) {
        $book = AnPham::find($maanpham);
        $book->delete($maanpham);
        return redirect()->route('list_book')->with(['flash_level'=>'success', 'flash_message'=>'Xóa ấn phẩm thành công']);
    }

    public function getEditBook($maanpham) {
        // dd(2); die;
        $book = AnPham::find($maanpham);
        // dd($book);
        $NXB = new NhaXuatBan();
        $list_nxb = $NXB->all()->toArray();
        $monhoc = new MonHoc();
        $list_mh = $monhoc->all()->toArray();
        return view('cms.pages.book.edit_book', compact('book', 'maanpham', 'list_nxb', 'list_mh'));

    }

    public function searchBook(Request $req) {
        $filter = $req->filter;
        $key = $req->key;
        if ($filter == "tensach") {
            $listbook = AnPham::select('*')->where('tieude', 'like', '%'.$key.'%')->paginate(10);
        }
        if ($filter == "tacgia") {
            $listbook = AnPham::select('*')->join('tacgia', 'anpham.matacgia', '=', 'tacgia.matacgia')->where('tacgia.hotentacgia', 'like', '%'.$key.'%')->paginate(10);
        }
        if ($filter == "monhoc") {
            $listbook = AnPham::select('*')->join('monhoc', 'anpham.mamonhoc', '=', 'monhoc.mamonhoc')->where('tenmonhoc', 'like', '%'.$key.'%')->paginate(10);
        }

        // $subject = new MonHoc();
        // $list_subject = $subject->all()->toArray();
        // $subject_name = MonHoc::select('tenmonhoc')->where('mamonhoc', $mamonhoc)->get();
      
        return view('cms.pages.book.result_search', compact('listbook', 'key'));

    }

    // tìm kiếm sách theo tên sách trong trang danh sách ấn phẩm theo môn học
    public function searchBookSubject(Request $req, $mamonhoc ) {
        if (isset($req->tenanpham)) {
            $key = $req->tenanpham;
            $listbook = AnPham::select('*')->where([['mamonhoc', $mamonhoc], ['tieude', 'like', '%'.$key.'%']])->paginate(10);
            return view('cms.pages.book.result_search', compact('listbook', 'key'));

        } else {
            return view('cms.pages.book.result_search', compact('listbook', 'key'));
        }
        
    }

    public function listNXB() {
        $nxb = new NhaXuatBan();
        $list_nxb = $nxb->all()->toArray();
        return view('cms.pages.nhaxuatban.list_nxb', compact('list_nxb'));
    }

    public function addNXB() {
        return view('cms.pages.nhaxuatban.add_nxb');
    }
    
    public function geteditNXB($manxb) {
        $nxb = NhaXuatBan::find($manxb);
        return view('cms.pages.nhaxuatban.edit_nxb', compact('nxb'));
    }

    public function updateNXB($manxb=null, Request $req) {
        $this->validate($req,
            [
                'tennxb'=>'required'
            ],
            [
                'tennxb.required'=>'Vui lòng nhập tên nhà xuất bản'
            ]
        );

        if($manxb == null) {
            $nxb = new NhaXuatBan();
        } else {
            $nxb = NhaXuatBan::find($manxb);
        }

        $nxb->tennxb = $req->tennxb;
        $nxb->diachi = $req->diachi;
        $nxb->dienthoai = $req->dienthoai;
        $nxb->fax = $req->fax;
        $nxb->email = $req->email;
        $nxb->website = $req->website;
        $nxb->save();

        if($manxb == null) {
            return redirect()->route('list_nxb')->with(['flash_level'=>'success', 'flash_message'=>'Thêm Nhà xuất bản thành công']);
        } else {
            return redirect()->route('list_nxb')->with(['flash_level'=>'success', 'flash_message'=>'Sửa Nhà xuất bản thành công']);
        }
    }

    public function getDelNXB($manxb) {
        $nxb = NhaXuatBan::find($manxb);
        $nxb->delete($manxb);
        return redirect()->route('list_nxb')->with(['flash_level'=>'success', 'flash_message'=>'Xóa NXB thành công']);
    }
}
