<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Panti extends Model
{
    protected $table = 'panti_asuhans';

    protected $primaryKey ='id_panti';

    protected $fillable = [
    	'nama_panti', 'nama_pj', 'deskripsi', 'alamat', 'kontak',
    	'kecamatan', 'jumlah_anak', 'jumlah_anak_angkat', 'sumber', 'id_data'
    ];

    public $timestamps =false;
}
