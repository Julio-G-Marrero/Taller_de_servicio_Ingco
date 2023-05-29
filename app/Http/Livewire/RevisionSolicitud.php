<?php

namespace App\Http\Livewire;

use de;
use App\Models\Zona;
use App\Models\Order;
use Livewire\Component;
use App\Models\Centro_de_servicio;

class RevisionSolicitud extends Component
{

    public $search;
    public $estadoOrden;
    public $tipo_applications;
    public $idCentro;
    public $zonaId;
    // public $estadoAutorizacion;

    public function mount() {
        $this->estadoOrden = 2; 
    }

    public function render()
    {
        switch (auth()->user()->role_id) {
            case 1:
                redirect()->route('/');
                break;
            case 2:
                $this->estadoOrden = 5;
                $this->tipo_applications = 4;
                $ordenes = Order::where('solicitada',1)
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
                ->where(function($estadoOrden){
                    $estadoOrden->where('estatu_id','like','%'.$this->estadoOrden.'%');
                })
                ->where(function($tipo_applications){
                    $tipo_applications->where('tipo_application','like','%'.$this->tipo_applications.'%');
                })
                ->paginate(10);
                break;
            case 3:
                $zonaEncargado = Zona::all()->where('user_Id',auth()->user()->id);
                if(empty($zonaEncargado->first())) {
                    $ordenes = [];
                } else {
                    $zonaEncargado = reset($zonaEncargado);
                    $firstKey = array_key_first($zonaEncargado);
                    $zonaId = $zonaEncargado[$firstKey]->id;
                    $this->zonaId = $zonaId;
                    $ordenes = Order::where('solicitada',1)
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
            
                    })->where('zona_id',$this->zonaId)
                    ->where(function($estadoOrden){
                        $estadoOrden->where('estatu_id','like','%'.$this->estadoOrden.'%');
                    })
                    ->where(function($tipo_applications){
                        $tipo_applications->where('tipo_application','like','%'.$this->tipo_applications.'%');
                    })
                    ->paginate(10);
                }
                break;
            case 4:
                $centroDeServicio = Centro_de_servicio::all()->where('user_id',auth()->user()->id);
                if(empty($centroDeServicio->first())) {
                    $ordenes = [];
                }else {
                    $centroDeServicio = reset($centroDeServicio);
                    $firstKey = array_key_first($centroDeServicio);
                    $this->idCentro = $centroDeServicio[$firstKey]->id;
                    $ordenes = Order::where('solicitada',1)
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
                    ->where(function($estadoOrden){
                        $estadoOrden->where('estatu_id','like','%3%');
                    })
                    ->where(function($centroDeServicio){
                        $centroDeServicio->where('centro_de_servicio_id','like','%'.$this->idCentro.'%');
                    })
                    ->where(function($tipo_applications){
                        $tipo_applications->where('tipo_application','like','%'.$this->tipo_applications.'%');
                    })
                    ->paginate(10);
                }
                break;
            default:
                $ordenes = Order::where('solicitada',1)
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
                ->where(function($estadoOrden){
                    $estadoOrden->where('estatu_id','like','%'.$this->estadoOrden.'%');
                })
                ->where(function($tipo_applications){
                    $tipo_applications->where('tipo_application','like','%'.$this->tipo_applications.'%');
                })
                ->paginate(10);
                break;
        }
    
        
        return view('livewire.revision-solicitud', [
            'ordenes' => $ordenes
        ]);
    }
}
