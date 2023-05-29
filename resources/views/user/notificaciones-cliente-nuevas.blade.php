@extends('layouts.main-user');

@section('titulo')
    Notificaciones
@endsection

@section('contenido')
<div class="relative max-w-md mx-auto md:max-w-2xl mt-6 min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-xl mt-16">
    <div class="px-6">
        <div class="flex flex-wrap justify-center">
            <div class="w-full flex justify-center">
                <div class="relative">
                    <img src="{{asset('img/bruce-mars.jpg')}}" class="shadow-xl rounded-full align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-[150px]"/>
                </div>
            </div>
            <div class="w-full text-center mt-20">
                <div class="flex justify-center lg:pt-4 pt-8 pb-0">

                </div>
            </div>
        </div>
        <div class="text-center mt-2">
            <h3 class="text-2xl text-slate-700 font-bold leading-normal mb-1">Julio Garcia</h3>
            <div class="text-xs mt-0 mb-2 text-slate-400 font-bold uppercase">
                <i class="fas fa-map-marker-alt mr-2 text-slate-400 opacity-75"></i>Saltillo, Coah
            </div>
        </div>
        <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
        <h4 class="text-xl text-gray-900 font-bold">Notificaciones Nuevas</h4>
        @forelse ($notificaciones as $notificacion)
            <div>
                <div class="shadow-lg rounded-lg bg-white mx-auto m-8 p-4 notification-box flex">
                    <div class="pr-2">
                      <svg
                        class="fill-current 
                        @switch($notificacion->data['tipoNotificacion'])
                            @case(1)
                             text-green-400
                                @break
                            @case(2)
                             text-yellow-400
                                @break
                            @case(3)
                             text-red-400 
                                @break
                            @case(4)
                             text-gray-400
                                @break
                            @default
                             text-gray-400 

                        @endswitch
                        "
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        width="24"
                        height="24"
                      >
                        <path
                          class="heroicon-ui"
                          d="M12 2a10 10 0 1 1 0 20 10 10 0 0 1 0-20zm0 2a8 8 0 1 0 0 16 8 8 0 0 0 0-16zm0 9a1 1 0 0 1-1-1V8a1 1 0 0 1 2 0v4a1 1 0 0 1-1 1zm0 4a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"
                        />
                      </svg>
                    </div>
                    <div>
                        <div class="text-base pb-2">
                        {{$notificacion->data['contenidoNotificacion']}}
                        </div>
                        <div class="text-sm text-gray-600  tracking-tight ">
                        {{$notificacion->data['mensaje']}}
                        </div>
                        <p class="text-xs text-gray-500">{{$notificacion->created_at->diffForHumans()}}</p>
                    </div>
                </div>
            </div><!-- Notificacion !-->
        @empty
            <p class="text-center text-gray-600 mt-5">No hay notificaciones Nuevas <span class="font-semibold underline">
                <a href="{{route('dashboard-noti-todas')}}">Ver todas</a></span></p>
            @endforelse

        </div>
    </div>
</div>

@endsection