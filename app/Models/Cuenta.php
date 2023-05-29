<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use HasFactory;

    protected $fillable = [
        'centro_de_servicio_id',
        'order_id',
        'user_id',
        'zona_id',
        'comprobanteCobro',
        'comprobantePago',
        'estadoCobro'
    ];

}
