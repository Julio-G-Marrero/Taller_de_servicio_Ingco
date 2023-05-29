@extends('layouts.app');


@section('titulo')
    Tracking
@endsection

@section('contenido')
<div class="flex justify-between max-w-5xl mx-auto">
    <h2 class="text-center text-3xl my-4">Orden <span class="font-medium">#{{$orden->id}}</span></h2>
 
    <livewire:finalizar-orden
        :orden="$orden"
    />
</div>
<div>
    <div class="">
        <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
            <div class="rounded-lg md:w-2/3 ">
                <div class="">
                    <livewire:mostrar-tracking
                    :orden="$orden"
                />
                </div>
            </div>
            <!-- Sub total -->
            <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
                <div>
                    <h2 class="mb-2 text-gray-900 text-lg">Personal</h2>
                    <div class="mb-1 flex md:flex-col lg:flex-row  justify-between">
                        <p class="text-amber-600 hidden">Supervisor</p>
                        <p class="text-gray-700">{{$encargado->name}}</p>
                    </div>
                    <div class="mb-1 flex md:flex-col lg:flex-row justify-between">
                        <p class="text-amber-600 hidden">Correo</p>
                        <p class="text-gray-700">{{$encargado->email}}</p>
                    </div>
                    <div class="mb-1 flex md:flex-col lg:flex-row justify-between">
                        <p class="text-amber-600 hidden">Centro</p>
                        <p class="text-gray-700">
                            @if(empty($centroDeServicio[1]))
                                Sin Definir    
                            @else
                                {{$centroDeServicio[1]->direccion}}
                            @endif
                        </p>
                    </div>
                    <div class="mb-1 flex md:flex-col lg:flex-row justify-between">
                        <p class="text-amber-600 hidden">Ciudad</p>
                        <p class="text-gray-700">
                            @if(empty($centroDeServicio[1]))
                                Sin Definir    
                            @else
                                {{$centroDeServicio[1]->ciudad}}
                            @endif
                        </p>
                    </div>
                    <div class="mb-1 flex md:flex-col lg:flex-row justify-between">
                        <p class="text-amber-600 hidden">Estado</p>
                        <p class="text-gray-700">
                            @if(empty($centroDeServicio[1]))
                                Sin Definir    
                            @else
                                {{$centroDeServicio[1]->estado}}
                            @endif
                        </p>
                    </div>
                    <hr class="my-4" />
                </div>
                <div>
                    <h2 class="mb-2 text-gray-900 text-lg">Cliente</h2>
                    <div class="mb-1 flex md:flex-col lg:flex-row justify-between">
                        <p class="text-amber-600 hidden">Nombre</p>
                        <p class="text-gray-700">{{$orden->nombre}}</p>
                    </div>
                    <div class="mb-1 flex md:flex-col lg:flex-row justify-between">
                        <p class="text-amber-600 hidden">Correo</p>
                        <p class="text-gray-700">{{$orden->correo_cliente}}</p>
                    </div>
                    <div class="mb-1 flex md:flex-col lg:flex-row justify-between">
                        <p class="text-amber-600 hidden">Telefono</p>
                        <p class="text-gray-700">{{$orden->tel}}</p>
                    </div>
                    <div class="mb-1 flex md:flex-col lg:flex-row justify-between">
                        <p class="text-amber-600 hidden mr-4">Dirección</p>
                        <p class="text-gray-700">{{$orden->direccion}}</p>
                    </div>
                    <div class="mb-1 flex md:flex-col lg:flex-row justify-between">
                        <p class="text-amber-600 hidden">Ciudad</p>
                        <p class="text-gray-700">{{$orden->ciudad}}</p>
                    </div>
                    <div class="mb-1 flex md:flex-col lg:flex-row justify-between">
                        <p class="text-amber-600 hidden">Estado</p>
                        <p class="text-gray-700">{{$orden->estado}}</p>
                    </div>
                    <hr class="my-4" />
                </div>
                <div>
                    <h2 class="mb-2 text-gray-900 text-lg">Orden</h2>
                    <div class="mb-1 flex md:flex-col lg:flex-row justify-between">
                        <p class="text-gray-900 ">Equipo</p>
                        <p class="text-gray-700">{{$orden->descripcion_equipo}}</p>
                    </div>
                    <div class="mb-1 flex md:flex-col lg:flex-row justify-between">
                        <p class="text-gray-900 ">Codigo Interno</p>
                        <p class="text-gray-700">{{$orden->codigo_interno}}</p>
                    </div>
                    <div class="mb-1 flex md:flex-col lg:flex-row justify-between">
                        <p class="text-gray-900 ">Numero de serie</p>
                        <p class="text-gray-700">{{$orden->numero_serie}}</p>
                    </div>
                    <div class="mb-1 flex md:flex-col lg:flex-row justify-between">
                        <p class="text-gray-900  mr-4">Descripción</p>
                        <p class="text-gray-700">{{$orden->descripcion}}<</p>
                    </div>
                    <div class="mb-1 flex md:flex-col lg:flex-row justify-between">
                        <p class="text-gray-900 ">Tipo Orden</p>
                        <p class="text-gray-700">
                            @switch($orden->tipo_application)
                            @case(1)
                                Sin definir
                                @break
                            @case(2)
                                Reparación
                                @break
                            @case(3)
                                Mantenimiento
                                @break
                            @case(4)
                                Garantía
                                @break
                            @default
                        @endswitch</p>
                    </div>
                    <div class="mb-1 flex md:flex-col lg:flex-row justify-between">
                        <p class="text-gray-900 ">Estado</p>
                        <p class="text-gray-700">{{$orden->estado}}</p>
                    </div>
                    <hr class="my-4" />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection