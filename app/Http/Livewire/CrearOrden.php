<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Tienda;
use App\Models\Zona;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearOrden extends Component
{
    public $nombre;
    public $apellidos;
    public $correo_cliente;
    public $tel;
    public $direccion;
    public $ciudad;
    public $estado;
    public $giro_comercial;
    public $tienda_id;
    public $folio_compra;
    public $comprobante;
    public $fecha_adquisicion;
    public $codigo_interno;
    public $numero_serie;
    public $accesorios;
    public $uso_equipo;
    public $tipo_application;
    public $descripcion;
    public $estatu_id;
    public $zona_id;
    public $autorizada;
    public $lugar_de_expedicion;
    public $centro_de_servicio_id;
    public $descripcion_equipo;
    public $solicitada;


    use WithFileUploads;

    protected $rules = [
        'nombre' => 'required|string',
        'apellidos' => 'required|string',
        'correo_cliente' => 'required|string',
        'tel' => 'required|numeric',
        'direccion' => 'required|string',
        'ciudad' => 'required|string',
        'estado' => 'required|string',
        'giro_comercial' => 'required|string',
        'tienda_id' => 'required',
        'folio_compra' => 'required|numeric',
        'comprobante' => 'required|image|max:1024',
        'fecha_adquisicion' => 'required',
        'codigo_interno' => 'required',
        'numero_serie' => 'required|numeric',
        'accesorios' => 'required',
        'uso_equipo' => 'required',
        'tipo_application' => 'required',
        'descripcion' => 'required|string',
        'lugar_de_expedicion' => 'required|string',
        'descripcion_equipo' => 'required'
    ];
    

    public function crearOrden()
    {
        $datos = $this->validate();
        $tienda = Tienda::find($datos['tienda_id']);
        $zona = Zona::find($tienda->zona_id);
        $encargado_id = $zona->user_id;

        //Almacenar la imagen
        $imagen = $this->comprobante->store('public/ordenes');
        $nombreImagen = str_replace('public/ordenes/','',$imagen);
        //Crear la orden
        Order::create([
            'nombre' => $datos['nombre'],
            'apellidos' => $datos['apellidos'],
            'correo_cliente' => $datos['correo_cliente'],
            'tel' => $datos['tel'],
            'direccion' => $datos['direccion'],
            'ciudad' => $datos['ciudad'],
            'estado' => $datos['estado'],
            'giro_comercial' => $datos['giro_comercial'],
            'tienda_id' => $datos['tienda_id'],
            'folio_compra' => $datos['folio_compra'],
            'comprobante' => $nombreImagen,
            'fecha_adquisicion' => $datos['fecha_adquisicion'],
            'codigo_interno' => $datos['codigo_interno'],
            'numero_serie' => $datos['numero_serie'],
            'accesorios' => $datos['accesorios'],
            'uso_equipo' => $datos['uso_equipo'],
            'tipo_application' => $datos['tipo_application'],
            'descripcion' => $datos['descripcion'],
            'lugar_de_expedicion' => $datos['lugar_de_expedicion'],
            'estatu_id' => 1,
            'zona_id' => $zona->id,
            'encargado_id' => $encargado_id,
            'autorizada' => 0,
            'user_id' => auth()->user()->id,
            'centro_de_servicio_id' => 1,
            'descripcion_equipo' => $datos['descripcion_equipo'],
            'costoTotal' => 0,
            'cerrada' => 0,
            'solicitada' => 0


        ]);

        //Crear mensaje
        session()->flash('mensaje','La orden se ah creado correctamente');

        //Redireccionar al usario
        return redirect()->route('dashboard');
    }

    public function render()
    {
        //Consultar tiendas
        $tiendas = Tienda::all();        


        return view('livewire.crear-orden', [
            'tiendas' => $tiendas
        ]);
    }
}
