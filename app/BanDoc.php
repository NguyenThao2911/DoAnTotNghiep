<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class BanDoc extends Authenticatable
{
	use Notifiable;

    protected $table = 'bandoc';
    public $primaryKey = 'mathe';
    public $incrementing = false;
    public $timestamps = false;
    
    protected $hidden = [
        'password', 'remember_token',
    ];
}
