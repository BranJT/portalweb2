<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Empleo extends Model
{
    protected $table='empleo';

    protected $fillable = [
    	'nombre',
    	'descripcion',
    	'resumen',
    ];
}
