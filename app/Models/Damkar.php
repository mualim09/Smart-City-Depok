<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Damkar extends Model
{
    protected $table = 'damkars';

    protected $primaryKey ='id_damkar';

    protected $fillable = [
    	'nama_tempat', 'gambaran_umum', 'alamat', 'no_telp',
    	'jam_operasional', 'koordinat', 'kecamatan',
    	'website', 'foto', 'sumber', 'id_data'
    ];

    public $timestamps =false;
}
