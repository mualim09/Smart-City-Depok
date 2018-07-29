<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Klinik extends Model
{
    protected $table = 'kliniks';

    protected $primaryKey ='id_klinik';

    protected $fillable = [
    	'nama_tempat', 'gambaran_umum', 'alamat', 'no_telp',
    	'jam_operasional', 'koordinat', 'kecamatan',
    	'website', 'foto_klinik', 'sumber', 'id_data'
    ];

    public $timestamps =false;
}
