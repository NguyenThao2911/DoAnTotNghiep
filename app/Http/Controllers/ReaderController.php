<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiBanDoc;
use App\BanDoc;
use App\ThongTinCanBo;
use App\ThongTinHocSinh;

class ReaderController extends Controller
{

    // Loại bạn đọc
    public function getListLoaibandoc() {
    	$loaibandoc = new LoaiBanDoc();
    	$list_loaibandoc = $loaibandoc->all()->toArray();
    	return view('cms.pages.loaibandoc.list_loaibandoc', compact('list_loaibandoc'));
    }

    public function getDelLoaibandoc($maloaibandoc) {
    	$loaibandoc = LoaiBanDoc::find($maloaibandoc);
    	$loaibandoc->delete($maloaibandoc);
    	return redirect()->route('list_loaibandoc')->with(['flash_level'=>'success', 'flash_message'=>'Xóa loại bạn đọc thành công']);
    }
    
    public function getAddLoaibandoc() {
    	return view('cms.pages.loaibandoc.add_loaibandoc');
    }

    public function getEditLoaibandoc($maloaibandoc) {
        $loaibandoc = LoaiBanDoc::find($maloaibandoc);
        return view('cms.pages.loaibandoc.edit_loaibandoc', compact('loaibandoc'));
    }

    public function updateLoaibandoc($maloaibandoc = null, Request $req) {
    	$this->validate($req, 
    	[
    		'tenloaibandoc'=>'required',
    		'sosachduocmuon'=>'required',
    		'sosachduocdoc'=>'required',
    		'solanduocgiahan'=>'required'
    	],
    	[
    		'tenloaibandoc.required'=>'Vui lòng nhập tên loại bạn đọc',
    		'sosachduocmuon.required'=>'Vui lòng nhập số sách được mượn tối đa',
    		'sosachduocdoc.required'=>'Vui lòng nhập số sách được đọc tối đa',
    		'solanduocgiahan.required'=>'Vui lòng nhập số lần được gia hạn'
    	]);
        if ($maloaibandoc == null ) {
            $loaibandoc = new LoaiBanDoc();
        } else {
            $loaibandoc = LoaiBanDoc::find($maloaibandoc);
        }
    	
    	$loaibandoc->tenloaibandoc = $req->tenloaibandoc;
    	$loaibandoc->sosachduocmuon = $req->sosachduocmuon;
    	$loaibandoc->sosachduocdoc = $req->sosachduocdoc;
    	$loaibandoc->solanduocgiahan = $req->solanduocgiahan;
    	$loaibandoc->save();

        if ($maloaibandoc == null) {
            return redirect()->route('list_loaibandoc')->with(['flash_level'=>'success', 'flash_message'=>'Thêm loại bạn đọc thành công']);
        } else {
            return redirect()->route('list_loaibandoc')->with(['flash_level'=>'success', 'flash_message'=>'Sửa loại bạn đọc thành công']);
        }
    	
    }

    // Thẻ bạn đọc
    public function getAddReaderCard() {
        $loaibandoc = LoaiBanDoc::select('*')->get();
        return view('cms.pages.thebandoc.add_reader_card', compact('loaibandoc'));
    }

    public function getListReaderCard() {
        $loaibandoc = LoaiBanDoc::select('*')->get();
        return view('cms.pages.thebandoc.list_reader', compact('loaibandoc'));
    }
    
    public function getListTypeReader($maloaibandoc) {
        $bandoc = BanDoc::select('*')->where('maloaibandoc', $maloaibandoc)->get();
        $tenloaibandoc = LoaiBanDoc::select('*')->where('maloaibandoc', $maloaibandoc)->get();
        return view('cms.pages.thebandoc.list_type_reader', compact('bandoc', 'tenloaibandoc'));
    }

    public function getEditReaderCard($mathe) {
        $bandoc = BanDoc::find($mathe);
        $thongtincanbo = ThongTinCanBo::find($mathe);
        $thongtinhocsinh = ThongTinHocSinh::find($mathe);
        $loaibandoc = LoaiBanDoc::select('*')->get();
        return view('cms.pages.thebandoc.edit_reader_card', compact('bandoc', 'loaibandoc', 'thongtincanbo', 'thongtinhocsinh'));
    }

    public function updateReaderCard($mathe = null, Request $req) {
        // dd($req->lop);
        // dd($req->khoa);
        // die;
        $this->validate($req, 
        [
            'mathe'=>'required',
            'loaibandoc'=>'required',
            'hoten'=>'required',
            'email'=>'required',
           
            'ngayhethan'=>'required',
            'cmtnd'=>'required',
        ],
        [
            'mathe.required'=>'Vui lòng nhập mã thẻ bạn đọc',
            'loaibandoc.required'=>'Vui lòng chọn mã loại bạn đọc',
            'hoten.required'=>'Vui lòng nhập họ tên',
            'email.required'=>'Vui lòng nhập email',
            
            'ngayhethan.required'=>'Vui lòng chọn ngày hết hạn',
            'cmtnd.required'=>'Vui lòng nhập CMTND'
        ]);

        if ($mathe == null) {
            $this->validate($req, 
            [
                'password'=>'required',
                'anhthe'=>'required',
                'ngaydangky'=>'required',
            ],
            [
                'password.required'=>'Vui lòng nhập email',
                'anhthe.required'=>'Vui lòng nhập email',
                'ngaydangky.required'=>'Vui lòng chọn ngày đăng ký',
            ]);
            $thebandoc = new BanDoc();
            $thebandoc->mathe = $req->mathe;
            $thebandoc->password = bcrypt($req->password);
            $thebandoc->ngaydangky = $req->ngaydangky;
            if ($req->hasFile('anhthe')) {
                $anhbandoc = $req->file('anhthe');
                $anhbandoc->move(public_path(). '/images/reader', $anhbandoc->getClientOriginalName());
                $thebandoc->anhthe = $anhbandoc->getClientOriginalName();
            }

            $thongtincanbo = new ThongTinCanBo();
            $thongtinhocsinh = new ThongTinHocSinh();
            if ($req->loaibandoc == 1) {
                $thongtinhocsinh->mathe = $req->mathe;
            } else {
                $thongtincanbo->mathe = $req->mathe;
            }

        } else {
            $thebandoc = BanDoc::find($mathe);
            $thongtincanbo = ThongTinCanBo::find($mathe);
            $thongtinhocsinh = ThongTinHocSinh::find($mathe);
        }

        
        $thebandoc->maloaibandoc = $req->loaibandoc;
        $thebandoc->hoten = $req->hoten;
        $thebandoc->gioitinh = $req->gioitinh;
        $thebandoc->diachi = $req->diachi;
        $thebandoc->ngaysinh = $req->ngaysinh;
        $thebandoc->email = $req->email;
        $thebandoc->dienthoai = $req->dienthoai;

        $thebandoc->ngayhethan = $req->ngayhethan;
        $thebandoc->cmtnd = $req->cmtnd;
        $thebandoc->save();
        
        
            if ($req->lop != null) {
                $thongtinhocsinh->lop = $req->lop;
                $thongtinhocsinh->save();
            }
            if ($req->khoa != null) {
                $thongtinhocsinh->khoa = $req->khoa;
                $thongtinhocsinh->save();
            }
            
        
            if ($req->chucvu != null) {
                $thongtincanbo->chucvu = $req->chucvu;
                $thongtincanbo->save();
            }
            if ($req->bomon != null) {
                $thongtincanbo->bomon = $req->bomon;
                $thongtincanbo->save();
            }
            


        if ($mathe ==null) {
            return redirect()->route('list_type_reader', $req->loaibandoc)->with(['flash_level'=>'success', 'flash_message'=>'Thêm thẻ bạn đọc thành công']);
            // return 1;
        } else {
            // return 2;
            return redirect()->route('list_type_reader', $req->loaibandoc)->with(['flash_level'=>'success', 'flash_message'=>'Sửa thẻ bạn đọc thành công']);
        }
    }

    public function getDelReaderCard($mathe) {
        $bandoc = BanDoc::find($mathe);
        $maloaibandoc = $bandoc->maloaibandoc;
        $bandoc->delete($mathe);
        return redirect()->route('list_type_reader', $maloaibandoc)->with(['flash_level'=>'success', 'flash_message'=>'Xóa bạn đọc thành công']);
    }

    public function getDetailReader($mathe) {
        $bandoc = BanDoc::select('*')->where('mathe', $mathe)->get()->toArray();
        // echo "<pre>";
        // print_r($bandoc[0]['maloaibandoc']);
        // echo "</pre>";
        // die;
        $maloaibandoc = $bandoc[0]['maloaibandoc'];
        $loaibandoc = LoaiBanDoc::select('*')->where('maloaibandoc', $maloaibandoc)->get();
        return view('cms.pages.thebandoc.reader_detail', compact('bandoc', 'loaibandoc'));
    }

}
