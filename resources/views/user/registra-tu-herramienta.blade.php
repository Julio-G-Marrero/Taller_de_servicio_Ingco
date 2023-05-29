@extends('layouts.main-user');

@section('titulo')
    Registra tu Herramienta
@endsection

@section('contenido')

<div>
    <h2 class="text-center sm:text-2xl md:text-4xl">Registra tu herramienta</h2>
    <div>
        <livewire:registrar-herramienta-cliente />

    </div> 
</div>    

@endsection