<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Tracking;
use Illuminate\Http\Request;

class CobranzaController extends Controller
{
    public $ordenId;
    public function mount(Order $orden)
    {
        $this->ordenId = $orden->id;
    }

    public function edit(Order $order) {

        return view('cobranza.edit', [
            'orden' => $order,
        ]);
    }
    
    
    public function index()
    {
        if(auth()->user()->role_id == 1){
            return redirect('/');
        }
    
        return view('cobranza.index');
    }

        
    public function cobranzaIndex()
    {
        if(auth()->user()->role_id == 1){
            return redirect('/');
        }
        
        return view('cobranza.index-centro');
    }
}
