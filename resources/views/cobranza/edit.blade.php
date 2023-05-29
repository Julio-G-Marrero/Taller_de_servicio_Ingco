@extends('layouts.app');

@section('titulo')
   Cobranza
@endsection

@section('contenido')
<div>
    <livewire:estadistica-cobranza 
       :orden="$orden"
    />
</div>
<main>
    <livewire:mostrar-estado-de-cuenta
      :orden="$orden"
    />
</main>
@endsection