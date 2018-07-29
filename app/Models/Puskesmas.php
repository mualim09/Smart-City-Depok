<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Puskesmas extends Model
{
    protected $table = 'puskesmass';

    protected $primaryKey ='id_puskesmas';

    protected $fillable = [
    	'nama_tempat', 'gambaran_umum', 'alamat', 'no_telp',
    	'jam_operasional', 'koordinat', 'kecamatan',
    	'website', 'foto', 'sumber', 'id_data'
    ];

    public $timestamps =false;
}
