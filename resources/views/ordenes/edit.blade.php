@extends('layouts.app');

@section('titulo')
    Editar Orden
@endsection

@section('contenido')
<a href="{{route('ordenes.index')}}">
    <button onclick="popuphandler()" class="focus:ring-2 focus:ring-offset-2 focus:ring-amber-400 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-amber-500 hover:bg-amber-400 focus:outline-none rounded">
        <p class="text-sm font-medium leading-none text-white">Regresar</p>
    </button>
</a>
<main>
    <h1 class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800 text-center" >Editar Orden #{{$orden->id}}</h1>
    <livewire:editar-orden 
        :orden="$orden"
    />
</main> 
@endsection