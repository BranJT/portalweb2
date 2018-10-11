<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmpleoRequisitos extends Model
{
    protected $table='empleo_requisitos';

    protected $fillable = [
    	'empleo_id',
    	'titulo',
    	'descripcion',
    ];
}
