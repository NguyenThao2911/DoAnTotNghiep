<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThongTinHocSinh extends Model
{
    protected $table = 'thongtinhocsinh';
    public $primaryKey = 'mathe';
    public $incrementing = false;
    public $timestamps = false;
}
