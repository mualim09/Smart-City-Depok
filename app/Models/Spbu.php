<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spbu extends Model
{
     protected $table = 'spbus';

    protected $primaryKey ='id_spbu';

    protected $fillable = [
    	'nama_tempat', 'gambaran_umum', 'alamat', 'no_telp',
    	'jam_operasional', 'koordinat', 'kecamatan',
    	'website', 'foto', 'sumber', 'id_data'
    ];

    public $timestamps =false;
}
