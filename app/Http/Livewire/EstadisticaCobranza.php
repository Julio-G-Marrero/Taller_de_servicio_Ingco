<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use App\Models\Tracking;

class EstadisticaCobranza extends Component
{
    public $ordenId;
    public $cerrada;

    protected $listeners = ['cerrarOrden'];

    public function cerrarOrden($ordenId) 
    {
        $orden = Order::find($ordenId);
        $orden->cerrada = 1;
        $orden->save();
    }

    public function mount(Order $orden)
    {
        $this->ordenId = $orden->id;
        $this->cerrada = $orden->cerrada;
    }

    public function render()
    {
        $trackingsTotales = Tracking::where('order_id',$this->ordenId)->where('costo','!=',0)->count();
        $pendienteRevision = Tracking::where('order_id',$this->ordenId)->where('costo','!=',0)->where('liquidado',0)->count();
        $saldoPendiente = Tracking::where('order_id',$this->ordenId)->where('costo','!=',0)->where('liquidado',0)->get()->sum('costo');
        return view('livewire.estadistica-cobranza', [
            'ordenId' => $this->ordenId,
            'cerrada' => $this->cerrada,
            'trackingsTotales' => $trackingsTotales,
            'pendienteRevision'=> $pendienteRevision,
            'saldoPendiente' => $saldoPendiente
        ]);
    }
}
