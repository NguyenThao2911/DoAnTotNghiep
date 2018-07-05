<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThongTinCanBo extends Model
{
    protected $table = 'thongtincanbo';
    public $primaryKey = 'mathe';
    public $incrementing = false;
    public $timestamps = false;
}
