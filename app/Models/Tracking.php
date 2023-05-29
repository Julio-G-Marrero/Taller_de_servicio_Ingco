<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'evidencia',
        'costo',
        'order_id',
        'user_id',
        'estatu_id'
    ];
}
