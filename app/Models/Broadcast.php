<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Broadcast extends Model
{
    protected $table = 'broadcasts';

    protected $primaryKey ='id_broadcast';

    public $timestampss =true;
}
