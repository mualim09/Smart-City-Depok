<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Androiduser extends Model
{
    protected $table = 'user_android';

    protected $primarykey ='id_user';

    public $timestamps =true;
}
