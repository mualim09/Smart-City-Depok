<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ukm extends Model
{
    protected $table = 'ukms';

    protected $primaryKey ='id_ukm';

    protected $fillable = [
    	'nama_ukm', 'nama_owner_ukm', 'gambaran_umum', 'alamat', 'no_telp',
    	'jam_operasional', 'koordinat', 'kecamatan',
    	'website', 'foto', 'sumber', 'id_data'
    ];

    public $timestamps =false;
}
