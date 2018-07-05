<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Monhoc;
use App\TaiLieuSo;
use Input;

class FileController extends Controller
{
    public function getListFile() {
    	$subject = new MonHoc();
        $list_subject = $subject->all()->toArray();
    	return view('cms.pages.tailieuso.list', compact('list_subject'));
    }

    public function getListFileSubject($mamonhoc) {
    	$listFile = TaiLieuSo::select('*')->where('mamonhoc', $mamonhoc)->get();
        $subject_name = MonHoc::select('tenmonhoc')->where('mamonhoc', $mamonhoc)->get();
        return view('cms.pages.tailieuso.list_file_subject', compact('listFile', 'subject_name'));
    }

    public function getAddFile() {
    	$monhoc = new MonHoc();
        $list_mh = $monhoc->all()->toArray();
    	return view('cms.pages.tailieuso.add_file', compact('list_mh'));
    }

    public function getEditFile($matailieu) {
    	$tailieuso = TaiLieuSo::find($matailieu);
    	$monhoc = new MonHoc();
        $list_mh = $monhoc->all()->toArray();
        return view('cms.pages.tailieuso.edit_file', compact('tailieuso', 'list_mh'));
    }

    public function updateFile($matailieu = null, Request $req) {
        // dd(1);
    	$this->validate($req, 
    	[
    		'mamonhoc'=>'required',
    		'tieude'=>'required',
            'link'=>'required',
    	],
    	[
    		'mamonhoc.required'=>'Vui lòng chọn môn học',
    		'tieude.required'=>'Vui lòng nhập tiêu đề',
    		'link.required'=>'Vui lòng chọn file tài liệu',
            
    	]);

    	if($matailieu == null) {
            $tailieuso = new TaiLieuSo();
        } else {
            $tailieuso = TaiLieuSo::find($matailieu);
        }

        $tailieuso->mamonhoc = $req->mamonhoc;
        $tailieuso->tieude = $req->tieude;
        if ($req->mota != null) {
            $tailieuso->mota = $req->mota;
        }
        
        if ($req->hasFile('link')) {
            $tailieu = $req->file('link');
            $tailieu->move(public_path(). '/tailieuso', $tailieu->getClientOriginalName());
            $tailieuso->link = $tailieu->getClientOriginalName();
        }
        $tailieuso->save();

        if($matailieu == null) {
            return redirect()->route('list_file_subject', $req->mamonhoc)->with(['flash_level'=>'success', 'flash_message'=>'Thêm file tài liệu thành công']);
            // return "Thêm tài liệu thành công";
        } else {
            return redirect()->route('list_file_subject', $req->mamonhoc)->with(['flash_level'=>'success', 'flash_message'=>'Sửa ấn phẩm thành công']);
            // return "Sửa tài liệu thành công";
        }
    }

    public function delFile($matailieu) {
    	$tailieuso = TaiLieuSo::find($matailieu);
    	$mamonhoc = $tailieuso->mamonhoc;
        $tailieuso->delete($matailieu);
        return redirect()->route('list_file_subject', $mamonhoc)->with(['flash_level'=>'success', 'flash_message'=>'Xóa file tài liệu thành công']);
    }
}
