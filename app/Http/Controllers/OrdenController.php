<?php

namespace App\Http\Controllers;

use de;
use App\Models\User;
use App\Models\Order;
use App\Models\Action;
use App\Models\Tracking;
use Illuminate\Http\Request;
use App\Models\Centro_de_servicio;


class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role_id == 1){
            return redirect('/');
        }
        return view('ordenes.index');
    }

    public function indexCentro()
    {
        if(auth()->user()->role_id == 1){
            return redirect('/');
        }
        return view('ordenes.index-centro');
    }


    public function garantias()
    {
        if(auth()->user()->role_id == 1){
            return redirect('/');
        }
        return view('ordenes.garantias');
    }

    
    public function reparaciones()
    {
        if(auth()->user()->role_id == 1){
            return redirect('/');
        }
        return view('ordenes.reparaciones');
    }

    public function revision()
    {
        if(auth()->user()->role_id == 1){
            return redirect('/');
        }
        return view('ordenes.revision');
    }

    public function revisionCentro()
    {
        if(auth()->user()->role_id == 1){
            return redirect('/');
        }
        return view('ordenes.revisionCentro');
    }

    public function show()
    {
        if(auth()->user()->role_id == 1){
            return redirect('/');
        }
        return view('ordenes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->role_id == 1){
            return redirect('/');
        }
        return view('ordenes.create');
    }

    public function registrarHerramienta()
    {

        return view('user.registra-tu-herramienta');
    }

    public function tracking(Order $order) {
        // $trackings = Tracking::all()->where('order_id',$order->id);
        $centroDeServicio = Centro_de_servicio::all()->where('zona_id',$order->zona_id);
        // $actions = Action::all();
        $encargado = User::find($order->encargado_id);
        return view('ordenes.orden', [
            'orden' => $order,
            'encargado' => $encargado,
            // 'actions' => $actions,
            'centroDeServicio' => $centroDeServicio
            // 'trackings' => $trackings

        ]);

    }

    public function trackingCentro(Order $order) {
        // $trackings = Tracking::all()->where('order_id',$order->id);
        $centroDeServicio = Centro_de_servicio::all()->where('zona_id',$order->zona_id);
        // $actions = Action::all();
        $encargado = User::find($order->encargado_id);
        return view('ordenes.orden-centro', [
            'orden' => $order,
            'encargado' => $encargado,
            // 'actions' => $actions,
            'centroDeServicio' => $centroDeServicio
            // 'trackings' => $trackings

        ]);

    }

    public function trackingCliente(Order $order) {
        $progreso = $order->estatu_id;
        if(auth()->user()->id != $order->user_id) {
            return redirect('/');
        }
        return view('ordenes.orden-cliente', [
            'progreso' => $progreso,
            'orden' => $order
        ]);

    }
    
    public function mensajes(Order $order) {
        return view('user.mensajes',[
            'orden' => $order,
            'orderId' => $order->id
        ]);

    }

        
    public function mensajesCentro(Order $order) {
        return view('user.mensajes-centro',[
            'orden' => $order,
            'orderId' => $order->id
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        if(auth()->user()->role_id == 1){
            $this->authorize('update');
        }
        return view('ordenes.edit', [
            'orden' => $order
        ]);
    }

}
