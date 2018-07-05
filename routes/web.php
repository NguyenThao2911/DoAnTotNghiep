<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('cms/index', function () {
// 	return view('cms.master');
// });


// ADMIN
Route::get('login',[
	'as'=>'login',
	'uses'=>'UserController@getLogin'
]);
Route::post('login',[
	'as'=>'login',
	'uses'=>'UserController@postLogin'
]);
Route::get('logout',[
	'as'=>'logout',
	'uses'=>'UserController@getLogout'
]);
Route::group(['middleware'=>'login'],function(){
	Route::get('home',[
		'as'=>'home',
		'uses'=>'UserController@getHome'
	]);
    
    //Quyền quản lý BIÊN MỤC
	Route::group(['middleware'=>'compile_manager'], function() {

		//sách
		Route::group(['prefix'=>'book'], function() {
			Route::get('/list', [
	            'as'=>'list_book',
				'uses'=>'BookController@getListBook'
			]);
			Route::get('/list_book/{mamonhoc}', [
				'as'=>'list_book_subject',
				'uses'=>'BookController@getListBookDetail'
			]);
			Route::get('/book_detail/{maanpham}', [
				'as'=>'book_detail',
				'uses'=>'BookController@getBookDetail'
			]);
	        Route::get('/add_book', [
				'as'=>'add_book',
				'uses'=>'BookController@getAddBook'
			]);
			Route::post('/add_book', [
				'as'=>'add_book',
				'uses'=>'BookController@updateBook'
			]);
			Route::get('/delete/{maanpham}', [
				'as'=>'delete_book',
				'uses'=>'BookController@getDelBook'
			]);
			Route::get('/edit/{maanpham}', [
				'as'=>'edit_book',
				'uses'=>'BookController@getEditBook'
			]);
			Route::post('/edit/{maanpham}', [
				'as'=>'edit_book',
				'uses'=>'BookController@updateBook'
			]);
			Route::get('/search', [
				'as'=>'search_book',
				'uses'=>'BookController@searchBook'
			]);
			Route::get('/search_book_subject/{mamonhoc}', [
				'as'=>'search_book_subject',
				'uses'=>'BookController@searchBookSubject'
			]);
		});
        
        // Tài liệu số
		Route::group(['prefix'=>'file'], function() {
			Route::get('/list', [
				'as'=>'list_file',
				'uses'=>'FileController@getListFile'
			]);

			Route::get('/list_file/{mamonhoc}', [
				'as'=>'list_file_subject',
				'uses'=>'FileController@getListFileSubject'
			]);

			Route::get('/add_file', [
				'as'=>'add_file',
				'uses'=>'FileController@getAddFile'
			]);

			Route::post('/add_file', [
				'as'=>'add_file',
				'uses'=>'FileController@updateFile'
			]);

			Route::get('/delete/{matailieu}', [
				'as'=>'del_file',
				'uses'=>'FileController@delFile'
			]);

			Route::get('/edit_file/{matailieu}', [
				'as'=>'edit_file',
				'uses'=>'FileController@getEditFile'
			]);

			Route::post('/edit_file/{matailieu}', [
				'as'=>'edit_file',
				'uses'=>'FileController@updateFile'
			]);
		});

		//Tin tức
		Route::group(['prefix'=>'tintuc'], function() {
			Route::get('/add_tintuc', [
				'as'=>'add_tintuc',
				'uses'=>'TinTucController@getAddTinTuc'
			]);
			Route::post('/add_tintuc', [
				'as'=>'add_tintuc',
				'uses'=>'TinTucController@updateTinTuc'
			]);
			Route::get('/list_tintuc', [
				'as'=>'list_tintuc', 
				'uses'=>'TinTucController@getListTinTuc'
			]);
			Route::get('/edit_tintuc/{id}', [
				'as'=>'edit_tintuc',
				'uses'=>'TinTucController@getEditTinTuc'
			]);
			Route::post('/edit_tintuc/{id}', [
				'as'=>'edit_tintuc',
				'uses'=>'TinTucController@updateTinTuc'
			]);
			Route::get('/delete_tintuc/{id}', [
				'as'=>'delete_tintuc',
				'uses'=>'TinTucController@delTinTuc'
			]);
		});

		// Nhà xuất bản
		Route::group(['prefix'=>'nhaxuatban'], function() {
			Route::get('/add', [
				'as'=>'add_nxb',
				'uses'=>'BookController@addNXB'
			]);
            
            Route::post('/add', [
				'as'=>'add_nxb',
				'uses'=>'BookController@updateNXB'
			]);

			Route::get('/edit/{manxb}', [
				'as'=>'edit_nxb',
				'uses'=>'BookController@geteditNXB'
			]);

			Route::post('/edit/{manxb}', [
				'as'=>'edit_nxb',
				'uses'=>'BookController@updateNXB'
			]);
			
			Route::get('/delete/{manxb}', [
				'as'=>'delete_nxb',
				'uses'=>'BookController@getDelNXB'
			]);
			Route::get('/list', [
				'as'=>'list_nxb',
				'uses'=>'BookController@listNXB'
			]);
		});
	    

	});
	
	//Quyền quản lý LƯU THÔNG
	Route::group(['middleware'=>'traffic_manager'], function() {
		Route::group(['prefix'=>'luuthong'], function() {
			Route::get('/add_phieumuon', [
				'as'=>'add_phieumuon',
				'uses'=>'LuuthongController@getAddPhieuMuon'
			]);
			Route::post('/add_phieumuon', [
				'as'=>'add_phieumuon',
				'uses'=>'LuuthongController@updatePhieuMuon'
			]);
			Route::get('/list_phieumuon', [
				'as'=>'list_phieumuon',
				'uses'=>'LuuthongController@getListPhieuMuon'
			]);
			Route::get('/chitietphieumuon/{id_phieumuon}', [
				'as'=>'chitietphieumuon',
				'uses'=>'LuuthongController@getChiTietPM'
			]);
			Route::get('/timkiemtrasach', [
				'as'=>'timkiemtrasach',
				'uses'=>'LuuthongController@getTimKiemTraSach'
			]);
			Route::post('/timkiemsachtra', [
				'as'=>'timkiemsachtra',
				'uses'=>'LuuthongController@postTimKiemSachTra'
			]);
			Route::get('/trasach/{id_luotmuon}', [
				'as'=>'trasach',
				'uses'=>'LuuthongController@getTraSach'
			]);
			Route::post('/trasach/{id_luotmuon}', [
				'as'=>'trasach',
				'uses'=>'LuuthongController@postTraSach'
			]);

			// hóa đơn phạt của bạn đọc
			Route::get('/inhoadon/{mathe}', [
				'as'=>'inhoadon',
				'uses'=>'LuuthongController@getInHoaDon'
			]);

			//export excel hóa đơn phạt
			Route::get('/export_phat/{mathe}', [
				'as'=>'export_hoadonphat',
				'uses'=>'LuuthongController@getExportPhat'
			]);

			//danh sách quá hạn
			Route::get('/danhsachquahan', [
				'as'=>'list_quahan',
				'uses'=>'LuuthongController@getListQuaHan'
			]);

			//gửi mail nhắc nhở quá hạn
			Route::get('/nhacnho/{email}', [
				'as'=>'nhacnho',
				'uses'=>'LuuthongController@NhacNho'
			]);
		});
	});
	
    //Quyền quản lý BẠN ĐỌC
    Route::group(['middleware'=>'reader_manager'], function() {
    	//Loại bạn đọc
    	Route::group(['prefix'=>'loaibandoc'], function() {
			Route::get('/list', [
				'as'=>'list_loaibandoc',
				'uses'=>'ReaderController@getListLoaibandoc'
			]);
	        Route::get('/delete/{maloaibandoc}', [
	        	'as'=>'delete_lbd',
	        	'uses'=>'ReaderController@getDelLoaibandoc'
	        ]);
	        Route::get('/add', [
	        	'as'=>'add_loaibandoc',
	        	'uses'=>'ReaderController@getAddLoaibandoc'
	        ]);
	        Route::post('/add', [
	        	'as'=>'add_loaibandoc',
	        	'uses'=>'ReaderController@updateLoaibandoc'
	        ]);
	        Route::get('/edit/{maloaibandoc}', [
	        	'as'=>'edit_loaibandoc',
	        	'uses'=>'ReaderController@getEditLoaibandoc'
	        ]);
	        Route::post('/edit/{maloaibandoc}', [
	        	'as'=>'edit_loaibandoc',
	        	'uses'=>'ReaderController@updateLoaibandoc'
	        ]);
		});

    	// Thẻ bạn đọc
		Route::group(['prefix'=>'thebandoc'], function() {
			Route::get('/add_reader_card', [
				'as'=>'add_reader_card',
				'uses'=>'ReaderController@getAddReaderCard'
			]);
			Route::post('/add_reader_card', [
				'as'=>'add_reader_card',
				'uses'=>'ReaderController@updateReaderCard'
			]);
			Route::get('/list_reader', [
				'as'=>'list_reader',
				'uses'=>'ReaderController@getListReaderCard'
			]);
			Route::get('/list_type_reader/{maloaibandoc}', [
				'as'=>'list_type_reader',
				'uses'=>'ReaderController@getListTypeReader'
			]);
			Route::get('/delete/{mathe}', [
				'as'=>'del_reader_card',
				'uses'=>'ReaderController@getDelReaderCard'
			]);
			Route::get('/edit_reader_card/{mathe}', [
				'as'=>'edit_reader_card',
				'uses'=>'ReaderController@getEditReaderCard'
			]);
			Route::post('/edit_reader_card/{mathe}', [
				'as'=>'edit_reader_card',
				'uses'=>'ReaderController@updateReaderCard'
			]);
			Route::get('/detail_reader_card/{mathe}', [
				'as'=>'detail_reader_card',
				'uses'=>'ReaderController@getDetailReader'
			]);
		});
	});

    //Quyền quản lý QUẢN TRỊ
	Route::group(['middleware'=>'admin_manager'], function() {
		Route::group(['prefix'=>'admin_manager'], function() {
			Route::get('/add_admin', [
				'as'=>'add_admin',
				'uses'=>'UserController@getAddAdmin'
			]);
			Route::post('add_admin', [
				'as'=>'add_admin',
				'uses'=>'UserController@updateAdmin'
			]);
			
			Route::get('/list_admin', [
				'as'=>'list_admin',
				'uses'=>'UserController@getListAdmin'
			]);
			
			Route::get('/del_admin/{manhanvien}', [
				'as'=>'del_admin',
				'uses'=>'UserController@getDelAdmin'
			]);
		});
	});

	Route::get('/admin_detail/{manhanvien}', [
		'as'=>'admin_detail',
		'uses'=>'UserController@getAdminDetail'
	]);
	Route::get('edit_admin/{manhanvien}', [
		'as'=>'edit_admin',
		'uses'=>'UserController@getEditAdmin'
	]);
	Route::post('edit_admin/{manhanvien}', [
		'as'=>'edit_admin',
		'uses'=>'UserController@updateAdmin'
	]);
	
});


// HỌC SINH - GIÁO VIÊN

Route::get('/trangchu', [
	'as'=>'getHome',
	'uses'=>'HomeController@getHome'
]);

Route::post('logindb', [
	'as'=>'login_db',
	'uses'=>'HomeController@LoginBD'
]);

Route::get('logoutbd', [
	'as'=>'logout_bd',
	'uses'=>'HomeController@LogoutBD'
]);

Route::group(['prefix'=>'thuviendientu'], function () {
	Route::get('/noiquyphongmuon', [
		'as'=>'getNoiQuyPM',
		'uses'=>'HomeController@getNoiQuyPM'
	]);

	Route::get('/noiquyphongdoc', [
		'as'=>'getNoiQuyPD',
		'uses'=>'HomeController@getNoiQuyPD'
	]);

	Route::get('/lichlamviec', [
		'as'=>'getLichlamviec',
		'uses'=>'HomeController@getLichlamviec'
	]);

	Route::get('/chitietanpham/{maanpham}', [
		'as'=>'getchitietanpham',
		'uses'=>'HomeController@getChiTietAnPham'
	]);

	Route::get('/danhsachtailieuso/{mamonhoc}', [
		'as'=>'getListTaiLieuSo',
		'uses'=>'HomeController@getListTaiLieuSo'
	]);

	Route::get('/danhsachanpham/{mamonhoc}', [
		'as'=>'getListAnPham',
		'uses'=>'HomeController@getListAP'
	]);

	Route::get('/gioithieuchung' , [
		'as'=>'gioithieuchung',
		'uses'=>'HomeController@getGioiThieuChung'
	]);

	Route::get('/truyenthong', [
		'as'=>'truyenthong',
		'uses'=>'HomeController@getTruyenThong'
	]);

	Route::get('/cocautochuc', [
		'as'=>'cocautochuc',
		'uses'=>'HomeController@getCoCauToChuc'
	]);

	Route::get('/nghiepvuthuvien', [
		'as'=>'nghiepvuthuvien',
		'uses'=>'HomeController@getNghiepVuThuVien'
	]);

	Route::get('/chitiettin/{id}', [
		'as'=>'chitiettin',
		'uses'=>'HomeController@getChiTietTin'
	]);

	Route::get('/search', [
		'as'=>'timkiemsach',
		'uses'=>'HomeController@getSearchBook'
	]);

});

Route::group(['middleware'=>'login_bd'], function() {
	Route::get('/dattruoc/{maanpham}', [
		'as'=>'getDattruoc',
		'uses'=>'HomeController@getDattruoc'
	]);

	Route::get('/tinhtrangsachmuon', [
		'as'=>'getTinhtrangsachmuon',
		'uses'=>'HomeController@getTinhTrangSachMuon'
	]);

	Route::get('/thongtincanhan', [
		'as'=>'getThongtincanhan',
		'uses'=>'HomeController@getThongTinCaNhan'
	]);

	Route::get('/danhsachdattruoc', [
		'as'=>'getDanhsachdattruoc', 
		'uses'=>'HomeController@getDanhSachDatTruoc'
	]);

	Route::get('/huydattruoc/{id_dattruoc}', [
		'as'=>'del_dattruoc',
		'uses'=>'HomeController@getHuyDatTruoc'
	]);

	Route::get('/edit_thongtincanhan', [
		'as'=>'edit_info',
		'uses'=>'HomeController@getEditInfo'
	]);

	Route::post('/edit_thongtincanhan', [
		'as'=>'edit_info',
		'uses'=>'HomeController@postEditInfo'
	]);

	Route::get('/giahan/{id_luotmuon}', [
		'as'=>'giahan',
		'uses'=>'HomeController@getGiaHan'
	]);
});



