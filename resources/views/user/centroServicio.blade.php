@extends('layouts.appCentroServicio');

@section('titulo')
   Dashboard Centro de Servicio
@endsection

@section('contenido')
@if (session()->has('mensaje'))
   <div class="uppercase  border-l-green-600 bg-green-100 text-green-600 font-bold p-2 my-3 text-sm">
      {{session('mensaje')}}
   </div>
@endif

<main>
   Hola
</main>
@endsection