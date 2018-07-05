<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatTruoc extends Model
{
    protected $table = 'dattruoc';
    public $primaryKey = 'id_dattruoc';
    // public $incrementing = false;
    public $timestamps = false;
}
