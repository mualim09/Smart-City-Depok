<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Smp extends Model
{
    protected $table = 'smps';

    protected $primarykey ='id_smp';

    protected $fillable = [
    	'nama_tempat', 'gambaran_umum', 'alamat', 'no_telp',
    	'jam_operasional', 'koordinat', 'kecamatan',
    	'website', 'foto_smp', 'sumber', 'id_data'
    ];

    public $timestamps =false;
}
