<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhaXuatBan extends Model
{
    protected $table = 'nhaxuatban';
    public $primaryKey = 'manxb';
    // public $incrementing = false;
    public $timestamps = false;
}
