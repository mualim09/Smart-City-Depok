<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slb extends Model
{
   protected $table = 'pendidikan_khususs';

    protected $primaryKey ='id_slb';

    protected $fillable = [
    	'nama_tempat', 'gambaran_umum', 'alamat', 'no_telp',
    	'jam_operasional', 'koordinat', 'kecamatan',
    	'website', 'foto_slb', 'sumber', 'id_data'
    ];

    public $timestamps =false;
}
