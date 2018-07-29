<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Pasar extends Model
{
    protected $table = 'pasars';

    protected $primaryKey ='id_pasar';

    protected $fillable = [
    	'nama_tempat', 'gambaran_umum', 'alamat', 'no_telp',
    	'jam_operasional', 'koordinat', 'kecamatan',
    	'website', 'foto', 'sumber', 'id_data'
    ];

    public $timestamps =false;
}
