<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jpengiriman extends Model
{
   protected $table = 'jasa_pengirimans';

    protected $primaryKey ='id_pengiriman';

    protected $fillable = [
    	'nama_tempat', 'gambaran_umum', 'alamat', 'no_telp',
    	'jam_operasional', 'koordinat', 'kecamatan',
    	'website', 'foto', 'sumber', 'id_data'
    ];

    public $timestamps =false;
}
