<?php

namespace App\Http\Livewire;

use App\Models\Action;
use App\Models\Order;
use App\Models\Tracking;
use Livewire\Component;

class MostrarEstadoDeCuenta extends Component
{
    protected $listeners = ['aprobarVobo'];

    public $ordenId;
    public $search;
    public $estadoOrden;
    public $cerrada;


    public function aprobarVobo($trackingId)
    {
        $tracking = Tracking::find($trackingId);
        $tracking->liquidado = 1;
        $tracking->save();
    }

    public function mount(Order $orden)
    {
        $this->ordenId = $orden->id;
        $this->cerrada = $orden->cerrada;
    }
    public function render()
    {
        $trackings = Tracking::where('order_id',$this->ordenId)->where('costo','!=',0)
        ->where(function($search){
            $search->where('created_at','like','%'.$this->search.'%')
            ->orWhere('descripcion','like','%'.$this->search.'%')
            ->orWhere('id','like','%'.$this->search.'%')
            ->orWhere('costo','like','%'.$this->search.'%');
        })
        ->where(function($estadoOrden){
            $estadoOrden->where('liquidado','like','%'.$this->estadoOrden.'%');
        })
        ->paginate(10);
        // $actions = Action::all();
        return view('livewire.mostrar-estado-de-cuenta', [
            'trackings' => $trackings,
            // 'actions' => $actions,
            'cerrada' => $this->cerrada
        ]);
    }
}
