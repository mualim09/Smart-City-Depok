<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Broadcast extends Model
{
    protected $table = 'broadcasts';

    protected $primarykey ='id_broadcast';

    public $timestampss =true;
}
