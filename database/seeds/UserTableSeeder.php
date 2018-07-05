<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nhanvienthuvien')->insert([
            'manhanvien'=>'1',
    		'username'=>'admin',
    		'email'=>'admin@gmail.com',
    		'password'=>bcrypt('thaothao'),
    		'dienthoai'=>'01685149806',
    		'gioitinh'=>'1',
    		'hoten'=>'Nguyễn Thị Admin',
    		'quanlybandoc'=>'0',
    		'quanlybienmuc'=>'0',
    		'quanlyluuthong'=>'0',
    		'quanlyquantri'=>'1',
        ]);
        DB::table('nhanvienthuvien')->insert([
            'manhanvien'=>'2',
            'username'=>'reader_ad',
            'email'=>'readeradmin@gmail.com',
            'password'=>bcrypt('thaothao'),
            'dienthoai'=>'01685149806',
            'gioitinh'=>'1',
            'hoten'=>'Nguyễn Thị QLBD',
            'quanlybandoc'=>'1',
            'quanlybienmuc'=>'0',
            'quanlyluuthong'=>'0',
            'quanlyquantri'=>'0',
        ]);
        DB::table('nhanvienthuvien')->insert([
            'manhanvien'=>'3',
            'username'=>'book_ad',
            'email'=>'bookadmin@gmail.com',
            'password'=>bcrypt('thaothao'),
            'dienthoai'=>'01685149806',
            'gioitinh'=>'1',
            'hoten'=>'Nguyễn Thị QLBM',
            'quanlybandoc'=>'0',
            'quanlybienmuc'=>'1',
            'quanlyluuthong'=>'0',
            'quanlyquantri'=>'0',
        ]);
        DB::table('nhanvienthuvien')->insert([
            'manhanvien'=>'4',
            'username'=>'luuthong_ad',
            'email'=>'luuthongadmin@gmail.com',
            'password'=>bcrypt('thaothao'),
            'dienthoai'=>'01685149806',
            'gioitinh'=>'1',
            'hoten'=>'Nguyễn Thị Lưu thông',
            'quanlybandoc'=>'0',
            'quanlybienmuc'=>'0',
            'quanlyluuthong'=>'1',
            'quanlyquantri'=>'0',
        ]);
    }
}
