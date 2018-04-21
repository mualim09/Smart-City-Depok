<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SippKlingAdmin extends Authenticatable
{
	use Notifiable;

    protected $guard = 'sippKlingAuth';

    protected $table = 'admin_sikelings';

    protected $hidden = [
        'password', 'remember_token',
    ];

	protected $fillable = [
    	'nama', 'password', 'email'
    ];

    public $timestamps =false;
}
