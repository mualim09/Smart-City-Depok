<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Masterpiece extends Model
{
    protected $table = 'penghargaans';

    protected $primarykey ='id_penghargaan';

    protected $fillable = [
    	'nama_peraih', 'nama_prestasi', 'instansi', 'deskripsi',
    	'tingkat', 'tgl_post', 'kategori', 'riwayat', 'keterangan',
    	'status', 'image'
    ];

    public $timestamps =false;
}
