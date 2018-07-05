<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Session;
use App\User;
use App\AnPham;
use App\LuotMuon;
use App\BanDoc;
use Hash;

class UserController extends Controller
{
    public function getLogin(){
    	return view('cms.pages.login');
    }

    public function postLogin(Request $req){
        $this->validate($req,
            [
                'username'=>'required',
                'password'=>'required'
            ],
            [
                'username.required'=>'Vui lòng nhập email',
                'password.required'=>'Vui lòng nhập password'
            ]);
        $credentials= array('username'=>$req->username, 'password'=>$req->password);
        if(Auth::attempt($credentials)){
            return redirect()->route('home')->with(['flag'=>'success', 'message'=>'Xin chào']);
        }else{
            return redirect()->back()->with(['flag'=>'unsuccess', 'message'=>'Sai thông tin đăng nhập']);
        }
    }

    public function getHome() {
        $anpham = AnPham::sum('soluong');
        $sgk = AnPham::select('maanpham')->where('maanpham','like','%SGK%')->sum('soluong');
        $stk = AnPham::select('maanpham')->where('maanpham','like','%STK%')->sum('soluong');
        $bandoc = BanDoc::select('mathe')->count();
        $hocsinh = BanDoc::select('mathe')->where('maloaibandoc', 1)->count();
        $giaovien = BanDoc::select('mathe')->where('maloaibandoc', 2)->count();
        $soluong_quahan = LuotMuon::select('*')->where([['ngayhethan', '<' , date("Y-m-d")], ['ngaytra', null]] )->count();
    	return view('cms.home', compact('anpham', 'sgk', 'stk', 'soluong_quahan', 'bandoc', 'hocsinh', 'giaovien'));
    }

    public function getLogout() {
    	Auth::logout();
    	return redirect()->route('login');
    }

    public function getAddAdmin() {
        return view('cms.pages.nhanvienthuvien.add_admin');
    }
    
    public function updateAdmin($manhanvien=null, Request $req) {
        $this->validate($req,
            [
                'manhanvien'=>'required',
                'username'=>'required',
                // 'password'=>'required',
                'hoten'=>'required',
                'email'=>'required',
                'quanlybandoc'=>'required',
                'quanlybienmuc'=>'required',
                'quanlyluuthong'=>'required',
                'quanlyquantri'=>'required'
            ],
            [
                'manhanvien.required'=>'Vui lòng nhập mã nhân viên',
                'username.required'=>'Vui lòng nhập username',
                // 'password.required'=>'Vui lòng nhập mã kho',
                'hoten.required'=>'Vui lòng nhập họ tên',
                'email.required'=>'Vui lòng nhập email',
                'quanlybandoc.required'=>'Vui lòng chọn',
                'quanlybienmuc.required'=>'Vui lòng chọn',
                'quanlyluuthong.required'=>'Vui lòng chọn',
                'quanlyquantri.required'=>'Vui lòng chọn',
            ]);
        if($manhanvien == null) {
            $this->validate($req,
                [
                    'password'=>'required'
                ],
                [
                    'password.required'=>'Vui lòng nhập mã kho'
                ]);
            $nhanvienthuvien = new User();
            $nhanvienthuvien->password = bcrypt($req->password);
        } else {

            $nhanvienthuvien = User::find($manhanvien);
        }       
        $nhanvienthuvien->manhanvien = $req->manhanvien;
        $nhanvienthuvien->username = $req->username;      
        $nhanvienthuvien->hoten = $req->hoten;
        $nhanvienthuvien->ngaysinh = $req->ngaysinh;
        $nhanvienthuvien->gioitinh = $req->gioitinh;
        $nhanvienthuvien->email = $req->email;
        $nhanvienthuvien->dienthoai = $req->dienthoai;
        $nhanvienthuvien->diachi = $req->diachi;
        $nhanvienthuvien->cmtnd = $req->cmtnd;
        $nhanvienthuvien->chucvu = $req->chucvu;
        $nhanvienthuvien->quanlybandoc = $req->quanlybandoc;
        $nhanvienthuvien->quanlybienmuc = $req->quanlybienmuc;
        $nhanvienthuvien->quanlyquantri = $req->quanlyquantri;
        $nhanvienthuvien->quanlyluuthong = $req->quanlyluuthong;
        if ($req->hasFile('anh')) {
            $image = $req->file('anh');
            $image->move(public_path(). '/images/admins', $image->getClientOriginalName());
            $nhanvienthuvien->anh = $image->getClientOriginalName();
        }
        $nhanvienthuvien->save();

        if($manhanvien == null) {
            return redirect()->route('list_admin')->with(['flash_level'=>'success', 'flash_message'=>'Thêm tài khoản thành công']);
        } else {
            return redirect()->route('list_admin')->with(['flash_level'=>'success', 'flash_message'=>'Sửa tài khoản thành công']);
        }
    }

    public function getEditAdmin($manhanvien) {
        $nhanvien = User::find($manhanvien);
        return view('cms.pages.nhanvienthuvien.edit_admin', compact('nhanvien'));
    }

    public function getListAdmin() {
        $nhanvienthuvien = new User();
        $list_nv = $nhanvienthuvien->all()->toArray();
        return view('cms.pages.nhanvienthuvien.list_admin', compact('list_nv'));
    }

    public function getAdminDetail($manhanvien) {
        $admin = User::select('*')->where('manhanvien', $manhanvien)->get();
        return view('cms.pages.nhanvienthuvien.admin_detail', compact('admin'));
    }

    public function getDelAdmin($manhanvien) {
        $nhanvienthuvien = User::find($manhanvien);
        $nhanvienthuvien->delete($manhanvien);
        return redirect()->route('list_admin')->with(['flash_level'=>'success', 'flash_message'=>'Xóa Nhân viên thành công']);
    }
}
