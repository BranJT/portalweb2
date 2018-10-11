<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mensaje extends Model
{
	use SoftDeletes;

    protected $table='mensaje';

    protected $fillable = [
    	'nombre',
    	'correo',
    	'mensaje',
    ];
}
