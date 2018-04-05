<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rs extends Model
{
    protected $table = 'rss';

    protected $primarykey ='id_rs';

    protected $fillable = [
    	'nama_tempat', 'gambaran_umum', 'alamat', 'no_telp',
    	'jam_operasional', 'koordinat', 'kecamatan',
    	'website', 'foto', 'sumber', 'id_data'
    ];

    public $timestamps =false;
}
