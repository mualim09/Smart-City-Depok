<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taman extends Model
{
    protected $table = 'tamans';

    protected $primarykey ='id_taman';

    protected $fillable = [
    	'nama_tempat', 'gambaran_umum', 'alamat', 'no_telp',
    	'jam_operasional', 'koordinat', 'kecamatan',
    	'website', 'foto', 'sumber', 'id_data'
    ];

    public $timestamps =false;
}
