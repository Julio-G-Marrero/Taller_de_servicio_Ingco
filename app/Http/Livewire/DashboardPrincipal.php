<?php

namespace App\Http\Livewire;

use App\Models\Centro_de_servicio;
use App\Models\Order;
use App\Models\Zona;
use Livewire\Component;

class DashboardPrincipal extends Component
{
    public function render()
    {
        switch (auth()->user()->role_id) {
            case 2:
                $numero_garantias = Order::where('tipo_application', 4)->count();
                break;
            case 3:
                $zonaEncargado = Zona::all()->where('user_Id',auth()->user()->id);
                if(empty($zonaEncargado->first())) {
                    $ordenes = [];
                } else {
                    $zonaEncargado = reset($zonaEncargado);
                    $firstKey = array_key_first($zonaEncargado);
                    $zonaId = $zonaEncargado[$firstKey]->id;
                    $numero_reparaciones = Order::where('tipo_application', 2)->where('zona_id',$zonaId)->count();
                    $numero_garantias = Order::where('tipo_application', 4)->where('zona_id',$zonaId)->count();
                    $numero_mantenimiento = Order::where('tipo_application', 3)->where('zona_id',$zonaId)->count();

                }
                break;
            case 4:
                $centroEncargado = Centro_de_servicio::all()->where('user_id',auth()->user()->id);
                if(empty($centroEncargado->first())) {
                    $ordenes = [];
                } else {
                    $centroEncargado = reset($centroEncargado);
                    $firstKey = array_key_first($centroEncargado);
                    $centroId = $centroEncargado[$firstKey]->id;
                    $numero_reparaciones = Order::where('tipo_application', 2)->where('centro_de_servicio_id',$centroId)->count();
                    $numero_garantias = Order::where('tipo_application', 4)->where('centro_de_servicio_id',$centroId)->count();
                    $numero_mantenimiento = Order::where('tipo_application', 3)->where('centro_de_servicio_id',$centroId)->count();

                }

                break;
                        
            default:
            $ordenes = [];
            break;
        }
        $numero_ordenes_totales = Order::all()->count();
        $ordenes = Order::all()->sortByDesc('created_at');
        $clientes = Order::all();
        return view('livewire.dashboard-principal', [
            'numero_garantias' => $numero_garantias,
            'numero_mantenimiento' => $numero_mantenimiento,
            'numero_reparaciones' => $numero_reparaciones,
            'numero_ordenes_totales' => $numero_ordenes_totales,
            'ordenes' => $ordenes,
            'clientes' => $clientes
        ]);
    }
}
