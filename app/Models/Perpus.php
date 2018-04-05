<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perpus extends Model
{
    protected $table = 'perpustakaans';

    protected $primarykey ='id_perpustakaan';

    protected $fillable = [
    	'nama_tempat', 'gambaran_umum', 'alamat', 'no_telp',
    	'jam_operasional', 'koordinat', 'kecamatan',
    	'website', 'foto_perpustakaan', 'sumber', 'id_data'
    ];

    public $timestamps =false;
}
