<?php

namespace App\Http\Livewire;

use App\Models\Zona;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Centro_de_servicio;
use App\Models\Cuenta;

class MostrarCobranza extends Component
{

    use WithFileUploads;

    protected $listeners = ['eliminarOrden'];

    public $search;
    public $estadoOrden;
    public $comprobanteCobro;

    public function eliminarOrden(Order $orden)
    {
        $orden->delete();
    }


    public function render()
    {
        switch (auth()->user()->role_id) {
            case 3:
                //Supervisor
                $ordenes = Order::where('encargado_id',auth()->user()->id)->paginate(10);
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
                    ->where(function($estadoOrden){
                        $estadoOrden->where('estatu_id','like','%'.$this->estadoOrden.'%');
                    })
                    ->paginate(10);
                }
                break;
            default:
                $ordenes = '';
        }
        return view('livewire.mostrar-cobranza', [
            'ordenes' => $ordenes
        ]);
    }
}
