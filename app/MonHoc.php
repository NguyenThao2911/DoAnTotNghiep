<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonHoc extends Model
{
    protected $table = 'monhoc';
    public $primaryKey = 'mamonhoc';
    // public $incrementing = false;
    public $timestamps = false;
}
