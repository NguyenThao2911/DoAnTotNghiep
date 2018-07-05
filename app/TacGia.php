<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TacGia extends Model
{
    protected $table = 'tacgia';
    public $primaryKey = 'matacgia';
    // public $incrementing = false;
    public $timestamps = false;
}
