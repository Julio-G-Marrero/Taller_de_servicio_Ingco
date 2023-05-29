<?php

namespace App\Http\Livewire;

use App\Models\Centro_de_servicio;
use App\Models\Order;
use App\Models\Zona;
use Livewire\Component;

class MostrarOrdenes extends Component
{
    protected $listeners = ['eliminarOrden','showAllOrders','showGarantiasOrders','showReparacionesOrders'];

    public $search;
    public $estadoOrden;
    public $tipo_applications;
    public $idCentro;
    public $zonaId;

    public function eliminarOrden(Order $orden)
    {
        $orden->delete();
    }

    public function showAllOrders() {
        $ordenes = Order::all();
        return $ordenes;
    }

    public function showGarantiasOrders() {
        $ordenes = Order::where('encargado_id',auth()->user()->id)->where('tipo_application',2)->paginate(10);
        return [
            'ordenes' => $ordenes
        ];
    }

    public function showReparacionesOrders() {
        $ordenes = Order::where('encargado_id',auth()->user()->id)->where('tipo_application',1)->paginate(10);
        dd($ordenes);

        return view('livewire.mostrar-ordenes',[
            'ordenes' => $ordenes
        ]);

    }

    public function render()
    {
        switch (auth()->user()->role_id) {
            case 2:
                //Gerente
                $ordenes = Order::where('tipo_application',4)->paginate(10);
                break;
            case 3:
                //Supervisor
                $zonaEncargado = Zona::all()->where('user_Id',auth()->user()->id);
                $zonaEncargado = reset($zonaEncargado);
                $firstKey = array_key_first($zonaEncargado);
                $ZonaId = $zonaEncargado[$firstKey]->id;
                $ordenes = Order::where('zona_id',$ZonaId)
                ->where(function($search){
                    $search->where('nombre','like','%'.$this->search.'%')
                    ->orWhere('apellidos','like','%'.$this->search.'%')
                    ->orWhere('apellidos','like','%'.$this->search.'%')
                    ->orWhere('correo_cliente','like','%'.$this->search.'%')
                    ->orWhere('ciudad','like','%'.$this->search.'%')
                    ->orWhere('id','like','%'.$this->search.'%')
                    ->orWhere('estado','like','%'.$this->search.'%')
                    ->orWhere('direccion','like','%'.$this->search.'%')
                    ->orWhere('direccion','like','%'.$this->search.'%');
        
                })
                ->where(function($tipo_applications){
                    $tipo_applications->where('tipo_application','like','%'.$this->tipo_applications.'%');
                })
                ->paginate(10);
                break;
            case 4:
                //Centro
                $centroEncargado = Centro_de_servicio::all()->where('user_id',auth()->user()->id);
                if(empty($centroEncargado->first())) {
                    $ordenes = [];
                }else {
                    $centroDeServicio = reset($centroEncargado);
                    $firstKey = array_key_first($centroDeServicio);
                    $centroId = $centroEncargado[$firstKey]->id;
                    $ordenes = Order::where('centro_de_servicio_id',$centroId)
                    ->where(function($search){
                        $search->where('nombre','like','%'.$this->search.'%')
                        ->orWhere('apellidos','like','%'.$this->search.'%')
                        ->orWhere('apellidos','like','%'.$this->search.'%')
                        ->orWhere('correo_cliente','like','%'.$this->search.'%')
                        ->orWhere('ciudad','like','%'.$this->search.'%')
                        ->orWhere('id','like','%'.$this->search.'%')
                        ->orWhere('estado','like','%'.$this->search.'%')
                        ->orWhere('direccion','like','%'.$this->search.'%')
                        ->orWhere('direccion','like','%'.$this->search.'%');
            
                    })
                    ->where(function($tipo_applications){
                        $tipo_applications->where('tipo_application','like','%'.$this->tipo_applications.'%');
                    })
                    ->paginate(10);
                }
                break;
            default:
                $ordenes = '';
        }
        return view('livewire.mostrar-ordenes',[
            'ordenes' => $ordenes
        ]);
    }
}
