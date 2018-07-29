<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sma extends Model
{
    protected $table = 'smas';

    protected $primaryKey ='id_sma';

    protected $fillable = [
    	'nama_tempat', 'gambaran_umum', 'alamat', 'no_telp',
    	'jam_operasional', 'koordinat', 'kecamatan',
    	'website', 'foto_sma', 'sumber', 'id_data'
    ];

    public $timestamps =false;
}
