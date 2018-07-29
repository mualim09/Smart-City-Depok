<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pdam extends Model
{
    protected $table = 'pdams';

    protected $primaryKey ='id_pdam';

    protected $fillable = [
    	'nama_tempat', 'gambaran_umum', 'alamat', 'no_telp',
    	'jam_operasional', 'koordinat', 'kecamatan',
    	'website', 'foto', 'sumber', 'id_data'
    ];

    public $timestamps =false;
}
