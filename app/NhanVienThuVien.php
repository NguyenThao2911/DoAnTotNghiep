<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanVienThuVien extends Model
{
    protected $table = 'nhanvienthuvien';
    public $primaryKey = 'manhanvien';
    // public $incrementing = false;
    public $timestamps = false;
}
