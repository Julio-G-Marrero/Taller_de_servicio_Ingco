<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Estatu;
use Livewire\Component;
use Illuminate\Support\Facades\Redirect;

class MostrarGarantias extends Component
{
    protected $listeners = ['eliminarOrden','showFilterOrder','showReparacionesOrders'];

    public $search;
    public $estatusOrden;

    public function eliminarOrden(Order $orden)
    {
        $orden->delete();
    }

    public function render()
    {
    
        $ordenes = Order::where('encargado_id',auth()->user()->id)->where('tipo_application',2)
        ->where('solicitada',1)->where(function($search){
            $search->where('nombre','like','%'.$this->search.'%')
            ->orWhere('apellidos','like','%'.$this->search.'%')
            ->orWhere('apellidos','like','%'.$this->search.'%')
            ->orWhere('correo_cliente','like','%'.$this->search.'%')
            ->orWhere('ciudad','like','%'.$this->search.'%')
            ->orWhere('id','like','%'.$this->search.'%')
            ->orWhere('estado','like','%'.$this->search.'%')
            ->orWhere('direccion','like','%'.$this->search.'%');

        })
        ->where(function($estatusOrden){
            $estatusOrden->where('estatu_id','like','%'.$this->estatusOrden.'%');
        })
        ->paginate(10);
        $estatus = Estatu::all();
        return view('livewire.mostrar-garantias', [
            'ordenes' => $ordenes,
            'estatus' => $estatus
        ]);
    }
}
