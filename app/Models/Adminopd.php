<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adminopd extends Model
{
    protected $table = 'admin_opds';

    protected $primarykey ='id_opd';

    protected $fillable = [
    	'nama_opd', 'nip', 'alamat', 'no_telp',
    	'email', 'username_opd', 'password_opd'
    ];

    public $timestamps =false;
}
