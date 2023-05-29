<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class RecibirEquipoCliente extends Component
{
    public $orden;
    public $ordenId;
    protected $listeners = ['recibirEquipoCliente'];

    public function mount(Order $orden)
    {
        $this->orden = $orden;
        $this->ordenId = $orden->id;
    }

    function recibirEquipoCliente() {
        $orden = Order::find($this->ordenId);
        $orden->estatu_id = 10;
        $orden->save();
    }
    public function render()
    {
        return view('livewire.recibir-equipo-cliente');
    }
}
