<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pd extends Model
{
    protected $table = 'pendidikan_dasars';

    protected $primarykey ='id_pd';

    protected $fillable = [
    	'nama_tempat', 'gambaran_umum', 'alamat', 'no_telp',
    	'jam_operasional', 'koordinat', 'kecamatan',
    	'website', 'foto_pd', 'sumber,' 'id_data'
    ];

    public $timestamps =false;
}
