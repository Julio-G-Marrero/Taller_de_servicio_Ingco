<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Action;
use Livewire\Component;
use App\Models\Tracking;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use App\Models\Centro_de_servicio;
use App\Models\CentrosDeServicios;
use Illuminate\Support\Facades\Route;


class MostrarTracking extends Component
{
    public $Ordenid;
    public $fechaCreada;
    public $zonaId;
    public $evidencia;
    public $descripcion;
    public $action_id;
    public $costo;
    public $nombreImagen;
    public $estatuId;

    use WithFileUploads;

    public function mount(Order $orden)
    {
        $this->Ordenid = $orden->id;
        $this->estatuId = $orden->estatu_id;
        $this->fechaCreada = $orden->created_at;
        $this->zonaId = $orden->zona_id;

    }

    protected $rules = [
        'evidencia' => 'nullable|image|max:1024',
        'descripcion' => 'required',
        'costo' => 'nullable|numeric'
    ];


    public function registrarTracking()
    {
        $datos = $this->validate();
        //Almacenar la imagen
        if($this->evidencia){
            $imagen = $this->evidencia->store('public/ordenes');
            $this->nombreImagen = str_replace('public/ordenes/','',$imagen);
            
        }

        //Registrar
        Tracking::create([
            'descripcion' => $datos['descripcion'],
            'costo' => $datos['costo'] ?? 0,
            'order_id' => $this->Ordenid,
            'evidencia' => $this->nombreImagen ?? '',
            'user_id' => auth()->user()->id,
            'estatu_id' => $this->estatuId
        ]);
        //Redireccionar al usario
        // return redirect()->route('ordenes.tracking',$this->Ordenid);
    }
    public function render()
    {

        $Alltrackings = Tracking::all()->where('order_id',$this->Ordenid);
        $trackingPresupuesto = Tracking::all()->where('order_id',$this->Ordenid)->where('estatu_id',4);
        $trackingRestauracion = Tracking::all()->where('order_id',$this->Ordenid)->where('estatu_id',6);

        $centroDeServicio = Centro_de_servicio::all()->where('zona_id',$this->Ordenid);
        // $actions = Action::all();
        return view('livewire.mostrar-tracking', [
            // 'actions' => $actions,
            'Alltrackings' => $Alltrackings,
            'trackingPresupuesto' => $trackingPresupuesto,
            'trackingRestauracion' => $trackingRestauracion,
            'fechaCreada' => $this->fechaCreada,
            'centroDeServicio' => $centroDeServicio,
            'Ordenid' => $this->Ordenid 
        ]);
    }
}
