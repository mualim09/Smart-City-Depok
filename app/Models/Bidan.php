<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bidan extends Model
{
    protected $table = 'bidans';

    protected $primarykey ='id_bidan';

    protected $fillable = [
    	'nama_tempat', 'gambaran_umum', 'alamat', 'no_telp',
    	'jam_operasional', 'koordinat', 'kecamatan',
    	'website', 'foto', 'sumber', 'id_data'
    ];

    public $timestamps =false;
}
