<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tibadah extends Model
{
    protected $table = 'tempat_ibadahs';

    protected $primaryKey ='id_ibadah';

    protected $fillable = [
    	'nama_tempat', 'gambaran_umum', 'alamat', 'no_telp',
    	'jam_operasional', 'koordinat', 'kecamatan',
    	'website', 'foto', 'sumber', 'id_data'
    ];

    public $timestamps =false;
}
