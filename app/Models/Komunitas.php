<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komunitas extends Model
{
   protected $table = 'komunitass';

    protected $primaryKey ='id_komunitas';

    protected $fillable = [
    	'nama_komunitas', 'deskripsi_komunitas', 'kontak_komunitas',
    	'alamat_komunitas', 'kategori_komunitas', 'email_komunitas',
    	'note_komunitas', 'foto_komunitas', 'sumber', 'id_partner'
    ];

    public $timestamps =false;
}
