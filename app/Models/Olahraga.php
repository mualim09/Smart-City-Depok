<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Olahraga extends Model
{
    protected $table = 'olahragas';

    protected $primarykey ='id_olahraga';

    protected $fillable = [
    	'nama_tempat', 'gambaran_umum', 'alamat', 'no_telp',
    	'jam_operasional', 'koordinat', 'kecamatan',
    	'website', 'foto', 'sumber', 'id_data'
    ];

    public $timestamps =false;
}
