<?php

namespace App\Http\Livewire;

use App\Models\Centro_de_servicio;
use App\Models\Estatu;
use App\Models\Zona;
use App\Models\Order;
use App\Models\Tienda;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarOrden extends Component
{
    public $Ordenid;
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
    public $comprobanteNuevo;
    public $descripcion_equipo;
    public $centro_de_servicio_id;
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
        'fecha_adquisicion' => 'required',
        'codigo_interno' => 'required',
        'numero_serie' => 'required|numeric',
        'accesorios' => 'required',
        'uso_equipo' => 'required',
        'tipo_application' => 'required',
        'descripcion' => 'required|string',
        'estatu_id' => 'required',
        'zona_id' => 'required',
        'comprobanteNuevo' => 'nullable|image|max:1024',
        'descripcion_equipo' => 'required',
        'centro_de_servicio_id' => 'required'
    ];

    public function mount(Order $orden)
    {
        $this->Ordenid = $orden->id;
        $this->nombre = $orden->nombre;
        $this->apellidos = $orden->apellidos;
        $this->correo_cliente = $orden->correo_cliente;
        $this->tel = $orden->tel;
        $this->direccion = $orden->direccion;
        $this->ciudad = $orden->ciudad;
        $this->estado = $orden->estado;
        $this->giro_comercial = $orden->giro_comercial;
        $this->tienda_id = $orden->tienda_id;
        $this->folio_compra = $orden->folio_compra;
        $this->comprobante = $orden->comprobante;
        $this->fecha_adquisicion = $orden->fecha_adquisicion;
        $this->codigo_interno = $orden->codigo_interno;
        $this->numero_serie = $orden->numero_serie;
        $this->accesorios = $orden->accesorios;
        $this->uso_equipo = $orden->uso_equipo;
        $this->tipo_application = $orden->tipo_application;
        $this->descripcion = $orden->descripcion;
        $this->estatu_id = $orden->estatu_id;
        $this->zona_id = $orden->zona_id;
        $this->descripcion_equipo = $orden->descripcion_equipo;
        $this->centro_de_servicio_id = $orden->centro_de_servicio_id;
    }

    public function editarOrden()
    {

        $datos = $this->validate();

        // Revisar si hay nueva imagen
        if($this->comprobanteNuevo){
            $comprobante = $this->comprobanteNuevo->store('public/ordenes');
            $datos['comprobante'] = str_replace('public/ordenes/','',$comprobante);
        }

        // Encontrar la vacante a editar
        $orden = Order::find($this->Ordenid);

        // Asignar los valores
        $orden->nombre = $datos['nombre'];

        $orden->nombre = $datos['nombre'];
        $orden->apellidos = $datos['apellidos'];
        $orden->correo_cliente = $datos['correo_cliente'];
        $orden->tel = $datos['tel'];
        $orden->direccion = $datos['direccion'];
        $orden->ciudad = $datos['ciudad'];
        $orden->estado = $datos['estado'];
        $orden->giro_comercial = $datos['giro_comercial'];
        $orden->tienda_id = $datos['tienda_id'];
        $orden->folio_compra = $datos['folio_compra'];
        $orden->fecha_adquisicion = $datos['fecha_adquisicion'];
        $orden->codigo_interno = $datos['codigo_interno'];
        $orden->numero_serie = $datos['numero_serie'];
        $orden->accesorios = $datos['accesorios'];
        $orden->uso_equipo = $datos['uso_equipo'];
        $orden->tipo_application = $datos['tipo_application'];
        $orden->descripcion = $datos['descripcion'];
        $orden->estatu_id = $datos['estatu_id'];
        $orden->zona_id = $datos['zona_id'];
        $orden->comprobante = $datos['comprobante'] ?? $orden->comprobante;
        $orden->descripcion_equipo = $datos['descripcion_equipo'];
        $orden->centro_de_servicio_id = $datos['centro_de_servicio_id'];

        //Guardar la vacante
        $orden->save();

        //Redireccionar
        session()->flash('mensaje','La orden se actualizo correctamente');

        return redirect()->route('dashboard');
    }

    public function render()
    {

        //Consultar tiendas
        $all_centro_de_servicios = Centro_de_servicio::all();
        $centro_de_Servicio = Centro_de_servicio::find($this->centro_de_servicio_id);
        $tiendas = Tienda::all(); 
        $estatus = Estatu::all();
        $zonas = Zona::all();  
        return view('livewire.editar-orden', [
            'tiendas' => $tiendas,
            'zonas' => $zonas,
            'estatus' => $estatus,
            'all_centro_de_servicios' => $all_centro_de_servicios,
            'centro_de_Servicio' => $centro_de_Servicio
        ]);
    }
}
