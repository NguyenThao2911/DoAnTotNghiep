<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;
use App\NhanVienThuVien;
use Auth;

class TinTucController extends Controller
{
    public function getAddTinTuc() {
    	return view('cms.pages.tintuc.add_tintuc');
    }

    public function updateTinTuc($id = null, Request $req) {
    	$this->validate($req,
    	[
    		'tieude'=>'required',
        	'noidung'=>'required'
    	],
    	[
    		'tieude.required'=>'Vui lòng nhập tiêu đề tin',
    		'noidung.required'=>'Vui lòng nhập nội dung tin'
    	]);

    	if ($id == null) {
    		$tintuc = new TinTuc();
    	} else {
    		$tintuc = TinTuc::find($id);
    	}

    	$tintuc->tieude = $req->tieude;
    	if ($req->mota != null) {
    		$tintuc->mota = $req->mota;
    	}
    	$tintuc->noidung = $req->noidung;
    	$tintuc->nguoitao = Auth::user()->manhanvien;
    	$tintuc->save();
    	if($id == null) {
            return redirect()->route('list_tintuc')->with(['flash_level'=>'success', 'flash_message'=>'Thêm tin tức thành công']);
        } else {
            return redirect()->route('list_tintuc')->with(['flash_level'=>'success', 'flash_message'=>'Sửa tin tức thành công']);
        }
    }

    public function getListTinTuc() {
    	$listTinTuc = TinTuc::select('id', 'tieude', 'mota', 'noidung', 'nhanvienthuvien.hoten')->join('nhanvienthuvien', 'tintuc.nguoitao', '=', 'nhanvienthuvien.manhanvien')->get()->toArray();
    	return view('cms.pages.tintuc.list_tintuc', compact('listTinTuc'));
    }

    public function getEditTinTuc($id) {
    	$tintuc = TinTuc::find($id);
    	return view('cms.pages.tintuc.edit_tintuc', compact('tintuc'));
    }

    public function delTinTuc($id) {
    	$tintuc = TinTuc::find($id);
    	$tintuc->delete($id);
    	return redirect()->route('list_tintuc')->with(['flash_level'=>'success', 'flash_message'=>'Xóa tin tức thành công']);
    }
}
