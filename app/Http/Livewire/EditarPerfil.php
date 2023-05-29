<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class EditarPerfil extends Component
{
    public $name;
    public $email;
    public $telefono;


    protected $rules = [
        'name' => 'required|string',
        'email' => 'required|string|email|max:255|unique:users',
        'telefono' => 'required|max:12'
    ];

    public function mount(){
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->telefono = auth()->user()->telefono;
    }

    public function editarPerfil()
    {
        $datos = $this->validate();
        $usuario = User::find(auth()->user()->id);
        $usuario->name = $datos['name'];
        $usuario->email = $datos['email'];
        $usuario->telefono = $datos['telefono'];

        $usuario->save();

        //Crear mensaje
        session()->flash('mensaje','Los cambios se han realizado exitosamente');

        //Redireccionar al usario
        return redirect()->route('perfil-usuario');
    }

    public function render()
    {
        return view('livewire.editar-perfil');
    }
}
