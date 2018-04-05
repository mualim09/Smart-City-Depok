<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pospolisi extends Model
{
     protected $table = 'pos_polisis';

    protected $primarykey ='id_polisi';

    protected $fillable = [
    	'nama_tempat', 'gambaran_umum', 'alamat', 'no_telp',
    	'jam_operasional', 'koordinat', 'kecamatan',
    	'website', 'foto', 'sumber', 'id_data'
    ];

    public $timestamps =false;
}
