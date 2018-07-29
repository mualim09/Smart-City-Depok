<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rumah_sehat extends Model
{
    protected $table = 'rumah_sehat';

    protected $primaryKey ='id_rumah_sehat';

    protected $fillable = [
    	'alamat', 'no_rumah', 'rt', 'rw'
    	
    ];

    public $timestamps =false;
}
