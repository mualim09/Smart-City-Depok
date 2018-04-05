<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $primarykey ='id_event';

    // protected $fillable = ['nama_event', 'penyelenggara', 'deskripsi_event', 'image_event', ];

    public $timestampss =true;
}
