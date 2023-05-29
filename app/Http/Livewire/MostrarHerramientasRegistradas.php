<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Estatu;
use App\Models\Tienda;
use App\Models\User;
use App\Models\Zona;
use App\Notifications\NuevaSolicitudGarantia;
use Livewire\Component;

class MostrarHerramientasRegistradas extends Component
{
    
    public $search;
    public $estatusOrden;

    protected $listeners = ['solicitarServicio','eliminarOrden'];

    public function eliminarOrden($idOrden)
    {
        $orden = Order::find($idOrden);
        $orden->delete();
    }

    public function solicitarServicio($idOrden,$tipo_solciitud,$reporte,$tiendaId)
    {
        $orden = Order::find($idOrden);
        $tienda = Tienda::find($tiendaId);
        $orden->zona_id = $tienda->zona_id;
        $zona = Zona::find($tienda->zona_id);
        $orden->encargado_id = $zona->user_Id;
        $encargado = User::find($orden->encargado_id);
        $gerente = User::all()->where('role_id', 2);
        $orden->solicitada = 1;
        $orden->tipo_application = $tipo_solciitud;
        $orden->descripcion = $reporte;
        $orden->tienda_id = $tiendaId;
        $orden->estatu_id = 2;
        if($tipo_solciitud == 4) {
            $gerente = reset($gerente);
            $firstKey = array_key_first($gerente);
            $Gerentid = $gerente[$firstKey]->id;
            $gerente = User::find($Gerentid);
            $mensaje = 'El cliente "'. auth()->user()->name. '" solicito la garantia de la orden #'. $idOrden;
            $mensajeEncargado = 'El cliente "'. auth()->user()->name. '" solicito la garantia de la orden #'. $idOrden . ', es necesario asignar centro de servicio';
            
            $encargado->notify(new NuevaSolicitudGarantia($idOrden,auth()->user()->id,auth()->user()->name, 'Solicitud Garantia',2,$mensajeEncargado));
            $gerente->notify(new NuevaSolicitudGarantia($idOrden,auth()->user()->id,auth()->user()->name, 'Solicitud Garantia',2,$mensaje));
        }else {
            $mensajeEncargado = 'El cliente "'. auth()->user()->name. '" solicito la garantia de la orden #'. $idOrden . ', es necesario asignar centro de servicio';

            $encargado->notify(new NuevaSolicitudGarantia($idOrden,auth()->user()->id,auth()->user()->name, 'Solicitud Garantia',2,$mensajeEncargado));

        }
        $orden->save();
    }

    public function render()
    {
        if(auth()->user()->role_id != 1) {
            $registros = [];
        }else{
            $registros = Order::where('user_id',auth()->user()->id)
            ->where(function($search){
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
            $tiendas = Tienda::all();
            return view('livewire.mostrar-herramientas-registradas', [
                'registros' => $registros,
                'tiendas' => $tiendas,
                'estatus' => $estatus
            ]);
        }

    }
}
