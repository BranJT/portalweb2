<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    protected $table='postulante';

    protected $fillable = [
    	'empleo_id',
    	'cv',
    	'nombre',
    	'linked',
    	'apellido',
    	'correo',
    	'telefono',
    	'comentario',

    ];
}
