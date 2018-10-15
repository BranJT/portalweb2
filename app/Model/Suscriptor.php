	<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Suscriptor extends Model
{
    protected $table='suscriptor';

    protected $fillable = [
    	'nombre',
    	'correo',
    	'telefono',
    ];
}
