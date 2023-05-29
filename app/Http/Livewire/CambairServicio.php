<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class CambairServicio extends Component
{
    public $orden;
    public $ordenId;
    protected $listeners = ['cambiarServicio'];

    public function mount(Order $orden)
    {
        $this->orden = $orden;
        $this->ordenId = $orden->id;
    }

    function cambiarServicio($tipo_application) {
        $orden = Order::find($this->ordenId);
        $orden->tipo_application = $tipo_application;
        $orden->descripcion = "Se solicito un nuevo servicio";
        $orden->estatu_id = 2;
        $orden->save();
    }

    public function render()
    {
        return view('livewire.cambair-servicio');
    }
}
