<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'kelurahans';

    protected $primarykey ='id_kelurahan';

    protected $fillable = [
    	'kelurahan', 'alamat', 'lurah', 'no_telp',
    	'koordinat', 'kecamatan', 'foto_kelurahan'
    	'gambaran_umum', 'website', 'sumber', 'id_data'
    ];

    public $timestamps =false;
}
