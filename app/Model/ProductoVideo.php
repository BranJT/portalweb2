<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductoVideo extends Model
{
    protected $table = 'producto_video';

    protected $fillable = [
    	'etiqueta',
    	'descripcion',
    	'videoFondo',
    	'video',
    ];
}
