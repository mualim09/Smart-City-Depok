<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelVisitor extends Model
{
    protected $table = 'Visitors';

    protected $primaryKey = 'id_visitor';

    protected $guarded = [''];
}
