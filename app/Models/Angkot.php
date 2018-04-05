<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Angkot extends Model
{
    protected $table = 'angkots';

    protected $primarykey ='id_angkot';

    protected $fillable = [
    	'kode_trayek', 'trayek',  'id_data'
    ];

    public $timestamps =false;
}
