<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinhVuc extends Model
{
    protected $table = 'linhvuc';
    public $primaryKey = 'malinhvuc';
    // public $incrementing = false;
    public $timestamps = false;
}
