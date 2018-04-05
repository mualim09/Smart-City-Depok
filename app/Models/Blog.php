<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Blog
 * @package App\Models
 * @version October 11, 2017, 3:08 pm UTC
 *
 * @property string judul
 * @property string isi
 * @property string image
 */
class Blog extends Model
{
    protected $table = 'blogs';

    protected $primarykey ='id_blog';

    protected $fillable = [
    	'judul', 'isi', 'image'
    ];

    public $timestamps =true;

    
}
