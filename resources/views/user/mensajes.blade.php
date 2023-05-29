@extends('layouts.app');

@section('titulo')
    Mensajes De la Orden
@endsection

@section('contenido')
<main>
  <a href="{{route('ordenes.tracking',$orderId)}}" class="focus:ring-2 focus:ring-offset-2 focus:ring-amber-400 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-amber-500 hover:bg-amber-400 focus:outline-none rounded">
      <p class="text-sm font-medium leading-none text-white">Regresar</p>
  </a>
  <livewire:registrar-mensajes 
  :orden="$orden"/>
</main>
@endsection