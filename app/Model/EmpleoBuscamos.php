<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmpleoBuscamos extends Model
{
    protected $table='empleo_buscamos';

    protected $fillable = [
    	'empleo_id',
    	'titulo',
    	'descripcion',
    ];
}
