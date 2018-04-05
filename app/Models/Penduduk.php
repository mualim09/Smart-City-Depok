<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $table = 'penduduk_kelurahans';

    protected $primarykey ='id_penduduk';

    protected $fillable = [
    	'kecamatan', 'kelurahan', 'laki_laki', 'perempuan', 'total_penduduk_kel',  'id_data'
    ];

    public $timestamps =false;
}
