@extends('layouts.main-user');

@section('titulo')
    Tracking
@endsection

@section('contenido')

    <main class="flex flex-col-reverse mx-auto items-center mb-5 justify-center min-h-fit pt-14">
        <div class="flex-1 bg-white rounded-lg shadow-xl mt-4 p-8 max-w-sm">
            @if ($progreso == 11)
                <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <div>
                        <span class="font-medium">¡Tenemos un problema!</span> El presupuesto de esta orden no fue autorizado.
                        <button class="underline font-semibold" id="mostrarReporte">Ver reporte</button>                    
                          <div>
                            <livewire:cambair-servicio 
                            :orden="$orden"/>
                          </div>
                    </div>
                </div>
                @elseif ($progreso == 5 && $orden->tipo_application != 4)
                <div class="flex bg-yellow-100 rounded-lg p-4 mb-4 text-sm text-yellow-700" role="alert">
                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <div>
                        <span class="font-medium">¡Tiene que autorizar!</span> El presupuesto de la orden esta pendiente de autorizar.
                        <button class="underline font-semibold" id="mostrarReporte">Ver presupuesto</button>                    
                          <div>
                            <livewire:autorizar-presupuesto 
                            :orden="$orden"/>
                          </div>
                    </div>
                </div>
            @endif
            @if ($progreso == 9)
                <div class="flex bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700" role="alert">
                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <div>
                        <span class="font-medium">¡Falta recoger su equipo!</span> Su equipo esta listo para su entrega, recogalo lo mas pronto posible.
                        <button class="underline font-semibold" id="recibirEquipo">Recibir Equipo.</button>                    
                        <div>
                            <livewire:recibir-equipo-cliente 
                            :orden="$orden"/>
                        </div>
                    </div>
                </div>
            @endif
            <h4 class="text-xl text-gray-900">Seguimiento Orden <span class="font-bold">#{{$orden->id}}</span>  </h4>
            <div class="relative px-4">
                <div class="absolute h-full border border-dashed border-opacity-20 border-secondary"></div>
        
                <!-- start::Timeline item -->
                <div class="flex items-center w-full my-6 -ml-1.5 @if ($progreso < 2 || $progreso == 11)
                    opacit 
                @endif">
                    <div class="w-1/12 z-10">
                        <div class="w-3.5 h-3.5 bg-amber-600 rounded-full"></div>
                    </div>
                    <div class="w-11/12">
                        <p class="text-sm">Los supervisores estan revisando la orden.</p>
                    </div>
                </div>
                <!-- end::Timeline item -->
        
                <!-- start::Timeline item -->
                <div class="flex items-center w-full my-6 -ml-1.5  @if ($progreso < 3 || $progreso == 11)
                    opacity-40
                @endif">
                    <div class="w-1/12 z-10">
                        <div class="w-3.5 h-3.5 bg-amber-600 rounded-full"></div>
                    </div>
                    <div class="w-11/12">
                        <p class="text-sm">
                            Enviada a centro de servicio.</p>
                    </div>
                </div>
                <!-- end::Timeline item -->
        
                <!-- start::Timeline item -->
                <div class="flex items-center w-full my-6 -ml-1.5  @if ($progreso < 4 || $progreso == 11)
                    opacity-40
                @endif">
                    <div class="w-1/12 z-10">
                        <div class="w-3.5 h-3.5 bg-amber-600 rounded-full"></div>
                    </div>
                    <div class="w-11/12">
                        <p class="text-sm">Realizando Presupuesto.</p>
                    </div>
                </div>
                <!-- end::Timeline item -->
        
                <!-- start::Timeline item -->
                <div class="flex items-center w-full my-6 -ml-1.5  @if ($progreso < 5 || $progreso == 11)
                    opacity-40
                @endif">
                    <div class="w-1/12 z-10">
                        <div class="w-3.5 h-3.5 bg-amber-600 rounded-full"></div>
                    </div>
                    <div class="w-11/12">
                        <p class="text-sm">
                            Esperando autorización de presupuesto</p>
                    </div>
                </div>
                <!-- end::Timeline item -->
        
                <!-- start::Timeline item -->
                <div class="flex items-center w-full my-6 -ml-1.5  @if ($progreso < 6 || $progreso == 11)
                    opacity-40
                @endif">
                    <div class="w-1/12 z-10">
                        <div class="w-3.5 h-3.5 bg-amber-600 rounded-full"></div>
                    </div>
                    <div class="w-11/12">
                        <p class="text-sm">Restaurando equipo.</p>
                    </div>
                </div>
                <!-- end::Timeline item -->
        
                <!-- start::Timeline item -->
                <div class="flex items-center w-full my-6 -ml-1.5  @if ($progreso < 7 || $progreso == 11)
                    opacity-40
                @endif">
                    <div class="w-1/12 z-10">
                        <div class="w-3.5 h-3.5 bg-amber-600 rounded-full"></div>
                    </div>
                    <div class="w-11/12">
                        <p class="text-sm">
                            Finalizando ultimos detalles.</p>
                    </div>
                </div>
                <!-- end::Timeline item -->
                        
                <!-- start::Timeline item -->
                <div class="flex items-center w-full my-6 -ml-1.5  @if ($progreso < 8 || $progreso == 11)
                    opacity-40
                @endif">
                    <div class="w-1/12 z-10">
                        <div class="w-3.5 h-3.5 bg-amber-600 rounded-full"></div>
                    </div>
                    <div class="w-11/12">
                        <p class="text-sm">
                            Reparacion finalizada, trasladando equipo</a>.</p>
                    </div>
                </div>
                <!-- end::Timeline item -->
                        
                <!-- start::Timeline item -->
                <div class="flex items-center w-full my-6 -ml-1.5  @if ($progreso < 9 || $progreso == 11)
                    opacity-40
                @endif">
                    <div class="w-1/12 z-10">
                        <div class="w-3.5 h-3.5 bg-amber-600 rounded-full"></div>
                    </div>
                    <div class="w-11/12">
                        <p class="text-sm">
                            Equipo listo para ser entregado.</p>
                    </div>
                </div>
                <!-- end::Timeline item -->
                        
                <!-- start::Timeline item -->
                <div class="flex items-center w-full my-6 -ml-1.5  @if ($progreso < 10 || $progreso == 11)
                    opacity-40
                @endif">
                    <div class="w-1/12 z-10">
                        <div class="w-3.5 h-3.5 bg-amber-600 rounded-full"></div>
                    </div>
                    <div class="w-11/12">
                        <p class="text-sm">
                            Entregado
                        </p>
                    </div>
                </div>
                <!-- end::Timeline item -->
        
            </div>
        </div>
        <div class="">
          <div class="flex mb-6 items-center flex-wrap max-w-md px-10 bg-white shadow-xl rounded-2xl h-20"
             x-data="{ circumference: 50 * 2 * Math.PI, percent: 
                @switch($progreso)
                @case(1)
                    8
                    @break
                @case(2)
                    10
                    @break
                @case(3)
                    22
                    @break
                @case(4)
                    34
                    @break
                @case(5)
                    45
                    @break
                @case(6)
                    56
                    @break
                @case(7)
                    68
                    @break
                @case(8)
                    75
                    @break
                @case(9)
                    85
                    @break
                @case(10)
                    100
                    @break
                @case(11)
                    0
                    @break
            @default
            @endswitch

         }"
             >
                <div class="flex items-center justify-center -m-6 overflow-hidden bg-white rounded-full">
                  <svg class="w-32 h-32 transform translate-x-1 translate-y-1" x-cloak aria-hidden="true">
                    <circle
                      class="text-gray-300"
                      stroke-width="10"
                      stroke="currentColor"
                      fill="transparent"
                      r="50"
                      cx="60"
                      cy="60"
                      />
                    <circle
                      class="
                      @if ($progreso == 11)
                          text-red-600
                        @else
                        text-amber-600
                      @endif"
                      stroke-width="10"
                      :stroke-dasharray="circumference"
                      :stroke-dashoffset="
                      @switch($progreso)
                            @case(1)
                                310
                                @break
                            @case(2)
                                272
                                @break
                            @case(3)
                                238
                                @break
                            @case(4)
                                204
                                @break
                            @case(5)
                                170
                                @break
                            @case(6)
                                136
                                @break
                            @case(7)
                                102
                                @break
                            @case(8)
                                50
                                @break
                            @case(9)
                                34
                                @break
                            @case(10)
                                1
                                @break
                            @case(11)
                                310
                            @break
                        @default
                              
                      @endswitch
                      "
                      stroke-linecap="round"
                      stroke="currentColor"
                      fill="transparent"
                      r="50"
                      cx="60"
                      cy="60"
                     />
                  </svg>
                  <span class="absolute text-2xl text-amber-700" x-text="`${percent}%`"></span>
                </div>
                <p class="ml-10 font-medium text-gray-600 sm:text-xl">Progreso</p>
      
            </div>
        </div>
    </main>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const mostrarReporte = document.querySelector("#mostrarReporte");
    mostrarReporte.addEventListener("click", 
    function mostrarMotivo(motivo){
        Swal.fire({
            template: '#my-template'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    template: '#my-template2'
                })
            }
        }) 
    });


</script>
@endpush