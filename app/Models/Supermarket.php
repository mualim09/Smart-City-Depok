<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supermarket extends Model
{
    protected $table = 'supermarkets';

    protected $primaryKey ='id_supermarket';

    protected $fillable = [
    	'nama_tempat', 'gambaran_umum', 'alamat', 'no_telp',
    	'jam_operasional', 'koordinat', 'kecamatan',
    	'website', 'foto', 'sumber', 'id_data'
    ];

    public $timestamps =false;
}
