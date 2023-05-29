<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Cuenta;
use App\Models\Tienda;
use Livewire\Component;
use App\Models\Tracking;
use Livewire\WithFileUploads;
use App\Models\Centro_de_servicio;
use App\Http\Controllers\CobranzaController;
use App\Models\User;
use App\Notifications\NuevaSolicitudGarantia;
use App\Notifications\TrackingNotificacion;

class FinalizarOrden extends Component
{
    public $OrdenId;
    public $estatuId;
    public $fechaCreada;
    public $zonaId;
    public $centro_de_servicio_id;
    public $presupuesto;
    public $reparacion;
    public $diferencia;
    public $comprobanteCobro;
    public $comprobantePago;
    public $indicePago;
    public $encargadoId;
    public $facturaSubida;

    use WithFileUploads;


    protected $listeners = ['finalizarOrden','registrarCentro','recibirHerramienta','finalizarPresupuesto','gestionarPresupuesto','finalizarReparacion','recibirSupervisor','confirmarPago'];

    public function mount(Order $orden)
    {
        $this->OrdenId = $orden->id;
        $this->estatuId = $orden->estatu_id;
        $this->fechaCreada = $orden->created_at;
        $this->zonaId = $orden->zona_id;
        $this->encargadoId = $orden->encargado_id;
        $this->comprobantePago = $orden->comprobantePago;
        $this->comprobanteCobro = $orden->comprobanteCobro;
        $this->indicePago = $this->comprobantePago;

        $this->centro_de_servicio_id = $orden->centro_de_servicio_id;
        $presupuesto = Tracking::where('order_id',$this->OrdenId)->where('estatu_id',4)->get()->sum('costo');
        $reparacion = Tracking::where('order_id',$this->OrdenId)->where('estatu_id',6)->get()->sum('costo');
        $this->reparacion = $reparacion;
        $this->presupuesto = $presupuesto;
        $this->diferencia = $presupuesto - $reparacion;
        $facturaSubida = Cuenta::where('order_id',$this->OrdenId)->count();
        $this->facturaSubida = $facturaSubida;
    }

    public function subirComprobanteCobro() {
        $imagen = $this->comprobanteCobro->store('public/ordenes');
        $nombreImagen = str_replace('public/ordenes/','',$imagen);
        $orden = Order::find($this->OrdenId);
        $supervisor = User::find($orden->encargado_id);
        $cliente = User::find($orden->user_id); 
        if($orden->tipo_application == 4) {
            $gerente = User::all()->where('role_id', 2);
            $gerente = reset($gerente);
            $firstKey = array_key_first($gerente);
            $Gerentid = $gerente[$firstKey]->id;
            $gerente = User::find($Gerentid);

            $mensajeGerente = 'El centro de servicio totalizo la orden #'. $this->OrdenId . ', la orden esta pendiente de traslado para su entrega.';
            $gerente->notify(new TrackingNotificacion($this->OrdenId, 'Orden Totalizada',1,$mensajeGerente));

            $mensajeSupervisor = 'El centro de servicio totalizo la orden #'. $this->OrdenId . ', la orden esta pendiente de traslado para su entrega.';
            $supervisor->notify(new TrackingNotificacion($this->OrdenId, 'Orden Totalizada',2,$mensajeSupervisor));

            $mensajeCliente = 'La orden #'. $this->OrdenId . ' esta en traslado para ser entregada.';
            $cliente->notify(new TrackingNotificacion($this->OrdenId, 'Equipo en traslado',1,$mensajeCliente));
        }else {
            $mensajeSupervisor = 'El centro de servicio totalizo la orden #'. $this->OrdenId . ', la orden esta pendiente de traslado para su entrega.';
            $supervisor->notify(new TrackingNotificacion($this->OrdenId, 'Orden Totalizada',2,$mensajeSupervisor));

            $mensajeCliente = 'La orden #'. $this->OrdenId . ' esta en traslado para ser entregada.';
            $cliente->notify(new TrackingNotificacion($this->OrdenId, 'Equipo en traslado',1,$mensajeCliente));
        }
        $orden->estatu_id = 8;
        $orden->comprobanteCobro = $nombreImagen;
        $orden->comprobantePago = 0;
        $orden->estadoCobro = 1;
        $orden->save();
        //Crear mensaje
        session()->flash('mensaje-cobranza','Se subio la factura correctamente');

        //Redireccionar al usario
        return redirect()->route('cobranza-centro');
    }


    public function subirComprobantePago() {
        $imagen = $this->comprobantePago->store('public/ordenes');
        $nombreImagen = str_replace('public/ordenes/','',$imagen);
        $orden = Order::find($this->OrdenId);
        $orden->comprobantePago = $nombreImagen;
        $supervisor = User::find($orden->encargado_id);
        $mensajeSupervisor = 'El centro de servicio totalizo la orden #'. $this->OrdenId . ',ya se subio la factura de la misma, es necesario depurarla subiendo el comprobante de pago.';
        $supervisor->notify(new TrackingNotificacion($this->OrdenId, 'Orden Totalizada',2,$mensajeSupervisor));

        $orden->estadoCobro = 2;
        $orden->save();
        //Crear mensaje
        session()->flash('mensaje-cobranza','Se subio el comprobante correctamente');

        //Redireccionar al usario
        return redirect()->route('cobranza');
    }
    
    public function confirmarPago(){
        $orden = Order::find($this->OrdenId);
        $orden->estadoCobro = 3;
        $orden->save();
        //Crear mensaje
        session()->flash('mensaje-cobranza','Se confirmo correctamente');

        //Redireccionar al usario
        return redirect()->route('cobranza');
    }

    public function registrarCentro($orden_id,$centroId)
    {
        $orden = Order::find($orden_id);
        $orden->centro_de_servicio_id = $centroId;
        $cliente = User::find($orden->user_id);
        $centroServicio = Centro_de_servicio::find($centroId);
        $encargadoCentro = User::find($centroServicio->user_id);
        $mensajeCentro = 'El supervisor correspondiente asigno la orden #'. $orden_id . ' a este centro de servicio, es necesario dar por recibido el equipo para continuar';
        $mensajeCliente = 'Ya fue asingado centro de servicio para la orden #'. $orden_id;
        $cliente->notify( new TrackingNotificacion($orden_id,'Asignación de centro de servicio',1,$mensajeCliente));
        $encargadoCentro->notify(new TrackingNotificacion($orden_id,'Asignación de centro de servicio',1,$mensajeCentro));
        if($orden->tipo_solciitud == 4) {
            $gerente = reset($gerente);
            $firstKey = array_key_first($gerente);
            $Gerentid = $gerente[$firstKey]->id;
            $gerente = User::find($Gerentid);
            $mensajeGerente = 'El supervisor correspondiente asigno la orden #'. $orden_id . ' a este centro de servicio, es necesario dar por recibido el equipo para continuar';
            $gerente->notify(new TrackingNotificacion($orden_id,'Asignación de centro de servicio',1,$mensajeGerente));
        }
        $orden->estatu_id = 3;
        $orden->save();

    }

    public function finalizarReparacion($orden_id, $costoTotal)
    {
        $orden = Order::find($orden_id);
        $supervisor = User::find($orden->encargado_id);
        $cliente = User::find($orden->user_id);
        if($orden->tipo_application == 4) {
            $gerente = User::all()->where('role_id', 2);
            $gerente = reset($gerente);
            $firstKey = array_key_first($gerente);
            $Gerentid = $gerente[$firstKey]->id;
            $gerente = User::find($Gerentid);

            $mensajeGerente = 'El centro de servicio finalizo la reparacion de la orden #'. $orden_id . ' con un costo de $'.$this->reparacion.' contra un presupuesto de $'.$this->presupuesto.',la orden esta en proceso de totalización.';
            $gerente->notify(new TrackingNotificacion($orden_id, 'Reparación Finalizada',1,$mensajeGerente));

            $mensajeSupervisor = 'El centro de servicio finalizo la reparacion de la orden #'. $orden_id .',la orden esta en proceso de totalización.';
            $supervisor->notify(new TrackingNotificacion($orden_id, 'Reparación Finalizada',1,$mensajeSupervisor));

            $mensajeCliente = 'El centro de servicio finalizo la reparacion de la orden #'. $orden_id . ',la orden esta en proceso de totalización para porder ser entregada.';
            $cliente->notify(new TrackingNotificacion($orden_id, 'Reparación Finalizada',1,$mensajeCliente));
        }else {
            $mensajeSupervisor = 'El centro de servicio finalizo la reparacion de la orden #'. $orden_id . ' con un costo de $'.$this->reparacion.' contra un presupuesto de $'.$this->presupuesto.',la orden esta en proceso de totalización.';
            
            $supervisor->notify(new TrackingNotificacion($orden_id, 'Reparación Finalizada',1,$mensajeSupervisor));

            $mensajeCliente = 'El centro de servicio finalizo la reparacion de la orden #'. $orden_id . ',la orden esta en proceso de totalización para porder ser entregada.';
            $cliente->notify(new TrackingNotificacion($orden_id, 'Reparación Finalizada',1,$mensajeCliente));
        }
        $orden->estatu_id = 7;
        $orden->costoTotal = $costoTotal;
        $orden->save();

    }

    
    public function recibirSupervisor($orden_id,)
    {
        $orden = Order::find($orden_id);
        $supervisor = User::find($orden->encargado_id);
        $cliente = User::find($orden->user_id);
        if($orden->tipo_application == 4) {
            $gerente = User::all()->where('role_id', 2);
            $gerente = reset($gerente);
            $firstKey = array_key_first($gerente);
            $Gerentid = $gerente[$firstKey]->id;
            $gerente = User::find($Gerentid);
            $mensajeGerente = 'El supervisor encargado de la orden #'. $orden_id . 'ya recibio el equipo, solo hace falta entregarlo.';
            $gerente->notify(new TrackingNotificacion($orden_id, 'Equipo listo para entrega',1,$mensajeGerente));

            $mensajeCliente = 'El supervisor de su orden #'. $orden_id . ' ya tiene disponilbe el equipo para su entrega. Consulte con el peronal adecuado en donde puede recoger su equipo.';
            $cliente->notify(new TrackingNotificacion($orden_id, 'Equipo listo para entrega.',1,$mensajeCliente));
            
        }else {
            $mensajeCliente = 'El supervisor de su orden #'. $orden_id . ' ya tiene disponilbe el equipo para su entrega. Consulte con el peronal adecuado en donde puede recoger su equipo.';
            $cliente->notify(new TrackingNotificacion($orden_id, 'Equipo listo para entrega.',1,$mensajeCliente));
        }
        $orden->estatu_id = 9;
        $orden->save();

    }


    public function finalizarPresupuesto($orden_id)
    {
        $orden = Order::find($orden_id);
        $supervisor = User::find($orden->encargado_id);
        $cliente = User::find($orden->user_id);
        if($orden->tipo_application == 4) {
            $gerente = User::all()->where('role_id', 2);
            $gerente = reset($gerente);
            $firstKey = array_key_first($gerente);
            $Gerentid = $gerente[$firstKey]->id;
            $gerente = User::find($Gerentid);
            $mensajeGerente = 'El centro de servicio finalizo el presupuesto de la orden #'. $orden_id . 'el cual fue de $'.$this->presupuesto.', es necesario gestionar el presupuesto para el desenlace de la orden.';
            $gerente->notify(new TrackingNotificacion($orden_id, 'Presupuesto Finalizado',2,$mensajeGerente));

            $mensajeSupervisor = 'El centro de servicio finalizo el presupuesto de la orden #'. $orden_id . ', es necesaria la autorizacion del gerente para continuar con la orden.';
            $supervisor->notify(new TrackingNotificacion($orden_id, 'Presupuesto Finalizado',2,$mensajeSupervisor));

            $mensajeCliente = 'El centro de servicio finalizo el presupuesto de la orden #'. $orden_id . ', la orden esta pendiente de la autorizacion del mismo.';
            $cliente->notify(new TrackingNotificacion($orden_id, 'Presupuesto Finalizado',1,$mensajeCliente));
            
        }else {
            $mensajeSupervisor = 'El centro de servicio finalizo el presupuesto de la orden #'. $orden_id . ' el cual fue de $'.$this->presupuesto.'.';
            $supervisor->notify(new TrackingNotificacion($orden_id, 'Presupuesto Finalizado',2,$mensajeSupervisor));

            $mensajeCliente = 'El centro de servicio finalizo el presupuesto de la orden #'. $orden_id . ', es necesario autorizar el presupuesto para continuar con la orden.';
            $cliente->notify(new TrackingNotificacion($orden_id, 'Presupuesto Finalizado',1,$mensajeCliente));
        }

        $orden->estatu_id = 5;
        $orden->save();
    }


    public function recibirHerramienta($orden_id)
    {
        $orden = Order::find($orden_id);
        $orden->estatu_id = 4;
        $supervisor = User::find($orden->encargado_id);
        $mensajeSupervisor = 'El centro de servicio recibio el equipo de la orden #'. $orden->id;
        $supervisor->notify(new TrackingNotificacion($orden_id,'Equipo Recibido',1,$mensajeSupervisor));

        $cliente = User::find($orden->user_id);
        $mensajeCliente = 'El centro de servicio recibio el equipo de la orden #'. $orden->id. ', se esta realizando el presupuesto.';
        $cliente->notify(new TrackingNotificacion($orden_id,'Equipo Recibido',1,$mensajeCliente));

        $orden->save();

    }

    public function gestionarPresupuesto($orden_id,$indicadorPresupuesto,$texto)
    {
        $orden = Order::find($orden_id);
        $supervisor = User::find($orden->encargado_id);
        $cliente = User::find($orden->user_id);
        if($indicadorPresupuesto == 1) {
            $orden->estatu_id = 6;
            $orden->autorizada = 1;
            
            $mensajeSupervisor = 'El Gerente nacional autorizo el presupuesto de la orden #'.$orden_id. ' la orden esta en proceso de reparación.';
            $supervisor->notify(new TrackingNotificacion($orden_id, 'Presupuesto Autorizado',1,$mensajeSupervisor));

            $mensajeCliente = 'Fue autorizado el presupuesto de la orden #'. $orden_id . ', la orden se encuentra en proceso de reparación.';
            $cliente->notify(new TrackingNotificacion($orden_id, 'Presupuesto Autorizado',1,$mensajeCliente));
        }elseif($indicadorPresupuesto == 0) {
            $orden->estatu_id = 11;

            $mensajeSupervisor = 'El Gerente nacional NO autorizo el presupuesto de la orden #'.$orden_id. ' la orden fue finalizada.';
            $supervisor->notify(new TrackingNotificacion($orden_id, 'Presupuesto Denegado',3,$mensajeSupervisor));

            $mensajeCliente = 'No fue autorizado el presupuesto de la orden #'. $orden_id . ', para cualquier dudca comuniquese con el personal adecuado o solicite otro servicio.';
            $cliente->notify(new TrackingNotificacion($orden_id, 'Presupuesto Denegado',3,$mensajeCliente));

            $orden->descripcion = $texto;
        }
        $orden->save();

    }

    public function finalizarOrden($orden_id)
    {
        $orden = Order::find($orden_id);
        $trackings = Tracking::where('order_id', $orden_id)->get()->sum('costo');
        $orden->estatu_id = 11;
        $orden->costoTotal = $trackings;
        $orden->save();

    }
    
    public function render()
    {
        $reparacion = Tracking::where('order_id',$this->OrdenId)->where('estatu_id',6)->get()->sum('costo');
        $this->reparacion = $reparacion;

        $centros = Centro_de_servicio::all();
        $trackings = Tracking::where('order_id', $this->OrdenId)->get()->sum('costo');
        $trackings = number_format($trackings);
        return view('livewire.finalizar-orden', [
            'costoTotal' => $trackings,
            'centros' => $centros
        ]);
    }
}
