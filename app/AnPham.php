<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnPham extends Model
{
    protected $table = 'anpham';
    public $primaryKey = 'maanpham';
    public $incrementing = false;
    public $timestamps = false;

    public function PhieuMuon(){
    	return $this->hasMany('App\PhieuMuon','maanpham', 'maanpham');
    }
    public function Phat(){
    	return $this->hasMany('App\Phat','maanpham', 'maanpham');
    }
    public function LinhVuc(){
    	return $this->belongsTo('App\LinhVuc','maanpham', 'maanpham');
    }
    public function TacGia_AnPham(){
    	return $this->hasMany('App\TacGia_AnPham','maanpham', 'maanpham');
    }
    public function Kho(){
    	return $this->hasMany('App\Kho','makho', 'makho');
    }
    public function NhaXuatBan(){
    	return $this->belongsTo('App\NhaXuatBan','manxb', 'manxb');
    }
    public function LuotMuon(){
    	return $this->hasMany('App\LuotMuon','maanpham', 'maanpham');
    }
    public function DatTruoc(){
    	return $this->hasMany('App\DatTruoc','maanpham', 'maanpham');
    }
}
