<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlogDescargas extends Model
{
    protected $table='blog_descargas';

    protected $fillable = [
    	'blog_id',
    ];
}
