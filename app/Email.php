<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table = 'subscribers';

    protected $primaryKey = 'id_subscribers';

    protected $guarded = [];
}
