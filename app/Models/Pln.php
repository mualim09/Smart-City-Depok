<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pln extends Model
{
     protected $table = 'plns';

    protected $primaryKey ='id_pln';

    protected $fillable = [
    	'nama_tempat', 'gambaran_umum', 'alamat', 'no_telp',
    	'jam_operasional', 'koordinat', 'kecamatan',
    	'website', 'foto', 'sumber', 'id_data'
    ];

    public $timestamps =false;
}
