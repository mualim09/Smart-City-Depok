<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatans';

    protected $primarykey ='id_kecamatan';

    protected $fillable = [
    	'nama_kecamatan', 'alamat', 'nama_camat', 'no_telp',
    	'koordinat', 'foto_kecamatan', 'gambaran_umum', 'website', 'sumber', 'id_data'
    ];

    public $timestamps =false;
}
