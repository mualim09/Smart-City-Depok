<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paud extends Model
{
    protected $table = 'pauds';

    protected $primaryKey ='id_paud';

    protected $fillable = [
    	'nama_tempat', 'gambaran_umum', 'alamat', 'no_telp',
    	'jam_operasional', 'koordinat', 'kecamatan',
    	'website', 'foto_paud', 'sumber', 'id_data'
    ];

    public $timestamps =false;
}
