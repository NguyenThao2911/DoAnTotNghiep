<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaiLieuSo extends Model
{
    protected $table = 'tailieuso';
    public $primaryKey = 'matailieu';
    // public $incrementing = false;
    public $timestamps = false;
}
