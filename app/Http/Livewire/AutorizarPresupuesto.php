<?php

namespace App\Http\Livewire;

use de;
use App\Models\User;

use App\Models\Order;
use Livewire\Component;
use App\Models\Tracking;
use App\Models\Centro_de_servicio;
use App\Notifications\TrackingNotificacion;

class AutorizarPresupuesto extends Component
{

    public $orden;
    public $OrdenId;
    public $centroId;
    public $supervisor;
    public $presupuesto;

    protected $listeners = ['autorizarPresupuestoCliente'];

    public function mount(Order $orden) {
        $this->orden = $orden;
        $this->OrdenId = $orden->id;
        $this->centroId = $orden->centro_de_servicio_id;
        $presupuesto = Tracking::where('order_id',$this->OrdenId)->where('estatu_id',4)->get()->sum('costo');
        $this->presupuesto = $presupuesto;
        $this->supervisor = $orden->encargado_id;
    }

    public function autorizarPresupuestoCliente(){
        $orden = Order::find($this->OrdenId);
        $centroServicio = Centro_de_servicio::find($this->centroId);
        $encargadoCentro = User::find($centroServicio->user_id);
        $mensajeCentro = 'El cliente autorizo el presupuesto de la orden #'. $this->OrdenId.', ya esta habilitado el proceso de reparación para la orden.';
        $encargadoCentro->notify(new TrackingNotificacion($this->OrdenId,'Presupuesto autorizado',1,$mensajeCentro));

        $supervisor = User::find($this->supervisor);
        $mensajeSupervisor = 'El cliente autorizo el presupuesto de la orden #'. $this->OrdenId;
        $supervisor->notify(new TrackingNotificacion($this->OrdenId, 'Presupuesto autorizado',1,$mensajeSupervisor));

        $orden->autorizada = 1;
        $orden->estatu_id = 6;
        $orden->save();

    }

    public function render()
    {
        return view('livewire.autorizar-presupuesto');
    }
}
