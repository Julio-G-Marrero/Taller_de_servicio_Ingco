<?php

namespace App\Http\Livewire;

use App\Models\Mensaje;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegistrarMensajes extends Component
{
    public $orderId;
    public $remitente;
    public $multimedia;
    public $mensaje;
    public $NuevoMensaje;

    use WithFileUploads;

    // protected $listeners = ['nuevoMensaje'];

    // public function nuevoMensaje()
    // {
    //     dd('nuevo mensaje');
    // }

    public function mount(Order $orden)
    {
        $this->orderId = $orden->id;
    }

    protected $rules = [
        'multimedia' => 'nullable|image|max:1024',
        'mensaje' => 'required'
    ];
    

    public function envairMensaje() {
        $datos = $this->validate();
        
        //Almacenar la imagen
        if($this->multimedia){
            $imagen = $this->multimedia->store('public/ordenes');
            $nombreImagen = str_replace('public/ordenes/','/',$imagen);
        }

        Mensaje::create([
            'user_id' => auth()->user()->id,
            'order_id' => $this->orderId,
            'remitente' => auth()->user()->email,
            'multimedia' => $nombreImagen ?? '',
            'mensaje' => $datos['mensaje']
        ]);
        // return redirect()->route('ordenes.mensajes',$this->orderId);

    }



    public function render()
    {
        $mensajes = Mensaje::all()->where('order_id',$this->orderId);
        return view('livewire.registrar-mensajes',[
            'mensajes' => $mensajes,
            'orderId' => $this->orderId
        ]);
    }
}
