<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nombre',
        'apellidos',
        'correo_cliente',
        'tel',
        'direccion',
        'ciudad',
        'estado',
        'giro_comercial',
        'tienda_id',
        'folio_compra',
        'comprobante',
        'fecha_adquisicion',
        'codigo_interno',
        'numero_serie',
        'accesorios',
        'uso_equipo',
        'tipo_application',
        'descripcion',
        'estatu_id',
        'zona_id',
        'user_id',
        'autorizada',
        'encargado_id',
        'lugar_de_expedicion',
        'centro_de_servicio_id',
        'descripcion_equipo',
        'costoTotal',
        'cerrada',
        'solicitada',
        'comprobanteCobro',
        'comprobantePago',
        'estadoCobro'
    ];
}
