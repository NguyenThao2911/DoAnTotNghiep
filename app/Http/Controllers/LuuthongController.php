<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhieuMuon;
use App\LuotMuon;
use App\AnPham;
use App\Phat;
use App\Exports;
use App\BanDoc;
use App\LoaiBanDoc;
use Excel;
use Mail;


class LuuthongController extends Controller
{
    public function getAddPhieuMuon() {
    	return view('cms.pages.luuthong.add_phieumuon');
    }

    public function updatePhieuMuon($id_phieumuon = null, Request $req) {
    	$this->validate($req, 
    	[
    		'mathe'=>'required',
    		'maanpham'=>'required',
            'ngaymuon'=>'required',
    		'tinhtrangsach'=>'required',
    		
    		// 'langiahan'=>'required',
    	],
    	[
    		'mathe.required'=>'Vui lòng nhập mã thẻ',
    		'maanpham.required'=>'Vui lòng nhập mã ấn phẩm',
            'ngaymuon.required'=>'Vui lòng chọn ngày mượn',
    		'tinhtrangsach.required'=>'Vui lòng chọn tình trạng sách',
    		
    		// 'langiahan.required'=>'Vui lòng nhập lần gia hạn',
    	]);

        $arr_anpham = $req->maanpham;
        // dd($arr_anpham);
        //xóa phần tử null khỏi mảng ấn phẩm mượn
        for ($i=0; $i < 5; $i++) { 
            if ($arr_anpham[$i] == null) {
                unset($arr_anpham[$i]);  
            }
        }
        // dd($arr_anpham);
        // dd(count($arr_anpham));
        // die;
        
    	$maanpham =  json_encode($arr_anpham);
        // dd($maanpham);
        // die;

    	if ($id_phieumuon == null) {
            //Kiểm tra tổng số lượng sách đang mượn chưa trả của bạn đọc phải nhỏ hơn số sách được mượn của bạn đọc đó, và sách mượn không trùng nhau
            $sosachdangmuon = LuotMuon::select('mathe', 'ngaytra')->where([['mathe', $req->mathe], ['ngaytra', null]])->count();
            
            $sosachduocmuon = LoaiBanDoc::select('loaibandoc.sosachduocmuon', 'bandoc.mathe')->join('bandoc', 'loaibandoc.maloaibandoc', '=', 'bandoc.maloaibandoc')->where('bandoc.mathe', $req->mathe)->get()->toArray();
            foreach ($sosachduocmuon as $sachduocmuon) {
                // Kiểm tra nếu số sách đã đạt đến giới hạn cho phép được mượn
                if ($sosachdangmuon == $sachduocmuon['sosachduocmuon'] ) {
                   return redirect()->route('add_phieumuon')->with(['flash_level'=>'success', 'flash_message'=>'Bạn đọc đã mượn đủ số lượng sách được mượn']);
                }
                //trường hợp sô sách bạn đọc đang mượn < số sách được mượn
                elseif($sosachdangmuon < $sachduocmuon['sosachduocmuon']) {
                    //trường hợp tổng số sách đang mượn + số sách mượn thêm < số lượng sách được mượn => Chức năng mượn diễn ra bình thường
                    $tong = $sosachdangmuon + count($arr_anpham);
                    if ($tong <= $sachduocmuon['sosachduocmuon'] ) {

                        
                        // thêm phiếu mượn
                        $phieumuon = new PhieuMuon();
                        $phieumuon->mathe = $req->mathe;
                        $phieumuon->maanpham = $maanpham;
                        $phieumuon->ngaymuon = $req->ngaymuon;
                        $phieumuon->tinhtrangsach = $req->tinhtrangsach; 

                        // thêm lượt mượn
                        
                        for ($i=0; $i < count($arr_anpham) ; $i++) { 
                            
                            if (!empty($req->maanpham[$i])) {
                                $luotmuon = new LuotMuon();
                                $luotmuon->mathe = $req->mathe;
                                $luotmuon->maanpham = $arr_anpham[$i];
                                $songayduocmuon = AnPham::select('songayduocmuon')->where('maanpham', $arr_anpham[$i])->get()->toArray();
                                foreach ($songayduocmuon as $songay) {
                                    $luotmuon->ngayhethan = date('Y/m/d', mktime(0, 0, 0, date("m")  , date("d")+$songay['songayduocmuon'], date("Y"))) ;
                                }
                                
                                $luotmuon->ngaymuon = $req->ngaymuon;
                                $luotmuon->tinhtrangsachmuon = $req->tinhtrangsach; 
                                $luotmuon->langiahan = 0; //mặc định khi thêm mới phiếu mượn thì lần gia hạn của ấn phẩm là 0
                                $luotmuon->save();
                            }     
                        }
                        // trường hợp số sách đang mượn + số sách mượn thêm > số sách được mượn
                    } else {
                        $sosach_muonthem = $sachduocmuon['sosachduocmuon'] - $sosachdangmuon;
                        return redirect()->route('add_phieumuon')->with(['flash_level'=>'success', 'flash_message'=>'Bạn đọc chỉ được mượn thêm '.$sosach_muonthem.' quyển ']);
                    }
                }
            }
            
            
            
            
            
            	
    	} else {
    		$phieumuon = PhieuMuon::find($id_phieumuon);
            $luotmuon = LuotMuon::find($id_luotmuon);
    	}

            // thêm, sửa phiếu mượn
    		// $phieumuon->langiahan = $req->langiahan;
            // $phieumuon->ngayhethan = $req->ngayhethan;
            if ($req->thongtinthem != null) {
                $phieumuon->thongtinthem = $req->thongtinthem; 
            }

    		$phieumuon->save();

            // thêm, sửa lượt mượn
            if ($req->ngaytra != null) {
                $luotmuon->ngaytra = $req->ngaytra; 
            }
            // if ($req->ngayhethan != null) {
            //     $luotmuon->ngayhethan = $req->ngayhethan; 
            // }
            if ($req->thongtinthem != null) {
                $luotmuon->thongtinthem = $req->thongtinthem; 
            }
            if ($req->tinhtrangsachtra != null) {
                $luotmuon->tinhtrangsachtra = $req->tinhtrangsachtra; 
            }
            if ($req->tienphat != null) {
                $luotmuon->tienphat = $req->tienphat; 
            }

            $luotmuon->save();
            

    		$Phieumuon = PhieuMuon::select('*')->paginate(20);
  
    	if ($id_phieumuon == null) {
    		return redirect()->route('list_phieumuon', compact('Phieumuon'))->with(['flash_level'=>'success', 'flash_message'=>'Thêm phiếu mượn thành công']);
    	} else {
    		return redirect()->route('list_phieumuon', compact('Phieumuon'))->with(['flash_level'=>'success', 'flash_message'=>'Sửa phiếu mượn thành công']);
    	}
    }

    public function getListPhieuMuon() {
    	$Phieumuon = PhieuMuon::select('*')->paginate(20);
    	// dd($phieumuon);die;
    	return view('cms.pages.luuthong.list_phieumuon', compact('Phieumuon'));
    }

    public function getChiTietPM($id_phieumuon) {
    	$phieumuon = PhieuMuon::find($id_phieumuon);
    	return view('cms.pages.luuthong.chitietphieumuon', compact('phieumuon'));
    }

    public function getTimKiemTraSach() {
        return view('cms.pages.luuthong.timkiemtrasach');
    }

    public function postTimKiemSachTra(Request $req) {
        // dd(1);
        $this->validate($req, 
        [
            'mathe'=>'required',
            // 'maanpham'=>'required',
        ],
        [
            'mathe.required'=>'Vui lòng nhập mã thẻ',
            // 'maanpham.required'=>'Vui lòng nhập mã ấn phẩm',
        ]);
        
        $mathe = $req->mathe;
        $luotmuon = LuotMuon::select('id_luotmuon', 'mathe', 'luotmuon.maanpham', 'ngaymuon', 'tinhtrangsachmuon', 'ngayhethan', 'anpham.tieude', 'ngaytra')->join('anpham', 'luotmuon.maanpham', '=', 'anpham.maanpham')->where('luotmuon.mathe', $req->mathe)->get()->toArray();
        return view('cms.pages.luuthong.ketquatimkiemsachtra', compact('luotmuon', 'mathe'));

    }

    public function getTraSach($id_luotmuon) {
        $phieutra = LuotMuon::find($id_luotmuon);
        return view('cms.pages.luuthong.trasach', compact('phieutra'));
    }

    public function postTraSach($id_luotmuon, Request $req) {
        $this->validate($req, 
            [
                'ngaytra'=>'required',
                'tinhtrangsachtra'=>'required',
                'tienphat'=>'required',
            ],
            [
                'ngaytra.required' =>'Vui lòng chọn ngày trả',
                'tinhtrangsachtra.required' =>'Vui lòng chọn ngày tình trạng sách trả',
                'tienphat.required' =>'Vui lòng nhập tiền phạt',
            ]);

        $Luotmuon = LuotMuon::find($id_luotmuon);
        $Luotmuon->ngaytra = $req->ngaytra;
        $Luotmuon->tinhtrangsachtra = $req->tinhtrangsachtra;
        $Luotmuon->tienphat = $req->tienphat;
        if ($req->thongtinthem != null) {
            $Luotmuon->thongtinthem = $req->thongtinthem;
        }
        $Luotmuon->save();
        // return "Cập nhật thành công";

        if (intval($req->tienphat) > 0) {
            $phat = new Phat();
            $phat->mathe = $Luotmuon->mathe;
            $phat->maanpham = $Luotmuon->maanpham;
            $phat->tienphat = $req->tienphat;
            $phat->lydo = "Làm hỏng sách";
            $phat->danop = 0;
            $phat->save();
        }

        $mathe = $Luotmuon->mathe;
        $luotmuon = LuotMuon::select('id_luotmuon', 'mathe', 'luotmuon.maanpham', 'ngaymuon', 'tinhtrangsachmuon', 'ngayhethan', 'anpham.tieude', 'ngaytra', 'tienphat')->join('anpham', 'luotmuon.maanpham', '=', 'anpham.maanpham')->where('luotmuon.mathe', $Luotmuon->mathe)->get()->toArray();
        
        return view('cms.pages.luuthong.ketquatimkiemsachtra', compact('luotmuon', 'mathe'));

    }

    //In hóa đơn phạt của bạn đọc
    public function getInHoaDon($mathe) {
        $danhsachphat = Phat::select('*')->join('anpham', 'phat.maanpham', '=', 'anpham.maanpham')->join('bandoc', 'phat.mathe', '=', 'bandoc.mathe')->where('phat.mathe', $mathe)->get()->toArray();
        $tongtienphat = Phat::select('tienphat')->where([['mathe', $mathe],['danop', 0]])->sum('tienphat');
        $mathe = $mathe;
        $danop = Phat::find($mathe);
        $danop->danop = 1;
        $danop->save();

        return view('cms.pages.luuthong.hoadontra', compact('danhsachphat', 'tongtienphat', 'mathe'));
    }

    //export excel hóa đơn phạt
    public function getExportPhat($mathe) {

        // $data = Phat::select('*')->join('anpham', 'phat.maanpham', '=', 'anpham.maanpham')->join('bandoc', 'phat.mathe', '=', 'bandoc.mathe')->where('phat.mathe', $mathe)->get()->toArray();
        
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>"; 
        // die;


        // $hihi = [1,2,3];
        return Excel::download(new Exports($mathe), 'danhsachphat.xlsx');




        // return Excel::create('data', function($excel) use ($data) {
        //     $excel->sheet('sheet1', function($sheet) use ($data) {
        //         $sheet->fromArray($data);
        //     });
        // })->export('xlsx');


               
            

       
            
    }

    //danh sách quá hạn
    public function getListQuaHan() {
        
        $list_quahan = LuotMuon::select('luotmuon.mathe', 'maanpham', 'ngaymuon', 'luotmuon.ngayhethan', 'email')->join('bandoc', 'luotmuon.mathe', '=', 'bandoc.mathe')->where([['luotmuon.ngayhethan', '<' , date("Y-m-d")],['luotmuon.ngaytra', '=', null]] )->paginate(10);
        return view('cms.pages.luuthong.danhsachquahan', compact('list_quahan'));
    }

    //gửi mail nhắc nhở quá hạn
    public function NhacNho($email) {
       $list_quahan = LuotMuon::select('*')->join('bandoc', 'luotmuon.mathe', '=', 'bandoc.mathe')->where([['luotmuon.ngayhethan', '<' , date("Y-m-d")], ['luotmuon.ngaytra', '=', null], ['bandoc.email', $email]] )->get()->toArray();
      // echo "<pre>";
      // print_r($list_quahan);
      // echo "</pre>";
      // die;
       
        $anphamquahan = [];

        foreach ($list_quahan as $value) {
            $anphamquahan[] = $value['maanpham'];
        }
        $email_to = $list_quahan[0]['email'];
        $hoten = $list_quahan[0]['hoten'];
        $arr = ["hoten"=>$hoten, "email"=>$email_to, "anphamquahan"=>$anphamquahan];
        

        Mail::send('cms.pages.luuthong.mailnhacnhoquahan', $arr , function($message) use ($email_to) {
            $message->from('ngthao291195@gmail.com', "Thư viện trường THPT Phú Xuyên A");
            $message->to($email_to, 'bạn đọc')->subject('Nhắc nhở quá hạn');
        });

           // redirect về trang danh sách ấn phẩm quá hạn
        $list_quahan_page = LuotMuon::select('luotmuon.mathe', 'maanpham', 'ngaymuon', 'luotmuon.ngayhethan', 'email')->join('bandoc', 'luotmuon.mathe', '=', 'bandoc.mathe')->where('luotmuon.ngayhethan', '<' , date("Y-m-d") )->paginate(10);
        return redirect()->route('list_quahan', compact('list_quahan_page'))->with(['flash_level'=>'success', 'flash_message'=>'Gửi mail nhắc nhở thành công']);
    }
    	
}
