<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuMuon extends Model
{
    protected $table = 'phieumuon';
    public $primaryKey = 'id_phieumuon';
    // public $incrementing = false;
    public $timestamps = false;
}
