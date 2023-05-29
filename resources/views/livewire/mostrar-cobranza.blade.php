<div>
    <div class="sm:px-6 w-full">
        <div class="px-4 md:px-10 py-4 md:py-7">
        </div>
        <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
            <div class="sm:flex items-center justify-center">
                <div>
                    <div class="mt-1 relative lg:w-72  mb-4">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input wire:model='search' type="text" name="email" id="topbar-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full pl-10 p-2.5" placeholder="Search">
                    </div>
                </div>
                <div class="mb-2 ml-6">
                    <div class="rounded-full focus:outline-none focus:ring-2  focus:ingco-color">
                        <select wire:model="estadoOrden" class="text-gray-600 rounded-full">
                            <option value="" selected>Estado</option>
                            <option value="7">Pte De factura</option>
                            <option value="8">Pte De entrega</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="mt-7 overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <thead>
                        <tr>
                            <th class="font-medium text-gray-600">ID</th>
                            <th class="font-medium text-gray-600">Nombre</th>
                            <th class="font-medium text-gray-600">Ciudad</th>
                            <th class="font-medium text-gray-600">Estado</th>
                            <th class="font-medium text-gray-600">Estado Orden</th>
                            <th class="font-medium text-gray-600">Costo Total</th>
                            <th class="font-medium text-gray-600">Ver</th>

                        </tr>
                    </thead>
                    <tbody  wire:poll>
                        <tr class="h-3"></tr>
    
                        @foreach ($ordenes as $orden) 
                        <tr class="h-3"></tr>
                        <tr tabindex="0" class="focus:outline-none  h-16 border border-gray-100 rounded">
                            <td  class="focus:text-amber-600 ">
                                <div class=" text-center">
                                    <p class="text-base font-ligth leading-none text-gray-700 mr-2 font-bold">#{{$orden->id}}</p>
                                </div>
                            </td>
                            <td  class="focus:text-amber-600 ">
                                <div class=" text-center">
                                    <p class="text-base font-ligth leading-none text-gray-700 mr-2">{{$orden->nombre}} {{$orden->apellidos}}</p>
                                </div>
                            </td>
                            <td  class="focus:text-amber-600 ">
                                <div class="text-center">
                                    <p class="text-base font-ligth leading-none text-gray-700 mr-2">{{$orden->ciudad}}</p>
                                </div>
                            </td>
                            <td  class="focus:text-amber-600 ">
                                <div class="text-center">
                                    <p class="text-base font-ligth leading-none text-gray-700 mr-2">{{$orden->estado}}</p>
                                </div>
                            </td>
                            <td class="">
                                @switch($orden->estatu_id)
                                    @case(7)
                                        <div class="flex justify-center items-center hover:text-red-500 hover:underline ">
                                            <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                            </svg>                      
                                            <p class="ml-1 text-red-600 ">Subir Factura</p>              
                                        </div> 
                                        @break
                                    @case(8)
                                        @if (auth()->user()->role_id == 3)
                                            <div class="flex justify-center items-center hover:text-red-500 hover:underline ">
                                                <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                                </svg>                      
                                                <p class="ml-1 text-red-600 ">Recolectar Equipo</p>              
                                            </div>
                                            @else
                                            <div class="flex justify-center items-center hover:text-red-500 hover:underline ">
                                                <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                                </svg>                      
                                                <p class="ml-1 text-red-600 ">Entrega al supervisor</p>              
                                            </div> 
                                        @endif
                                        @break
                                    
                                    @case(9)
                                        @if (auth()->user()->role_id == 3)
                                            @if ($orden->estadoCobro == 1)
                                            <div class="flex justify-center items-center hover:text-yellow-500 hover:underline ">
                                                <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-yellow-600">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                                </svg>                      
                                                <p class="ml-1 text-yellow-600 ">Pte. de pago</p>              
                                            </div>

                                                @elseif($orden->estadoCobro == 2)
                                                <div class="flex justify-center items-center hover:text-green-500 hover:underline ">
                                                    <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-600">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                                    </svg>                      
                                                    <p class="ml-1 text-green-600 ">Pte. de Confirmar</p>              
                                                </div>
                                                @elseif($orden->estadoCobro == 3)
                                                <div class="flex justify-center items-center hover:text-green-500 hover:underline ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-600">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                      </svg>
                                                      
                                                    <p class="ml-1 text-green-600 ">Pago Confirmado</p>              
                                                </div>
                                            @endif
                                        @endif
                                        @if (auth()->user()->role_id== 4)
                                            @if (($orden->estadoCobro == 1))
                                            <div class="flex justify-center items-center hover:text-yellow-500 hover:underline ">
                                                <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-yellow-600">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                                </svg>                      
                                                <p class="ml-1 text-yellow-600 ">Pte. de Cobro</p>              
                                            </div>
                                            @elseif($orden->estadoCobro == 2)
                                            <div class="flex justify-center items-center hover:text-yellow-500 hover:underline ">
                                                <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-yellow-600">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                                </svg>                      
                                                <p class="ml-1 text-yellow-600 ">Confirmar Pago</p>              
                                            </div>
                                            @elseif($orden->estadoCobro == 3)
                                            <div class="flex justify-center items-center hover:text-green-500 hover:underline ">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-600">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                  </svg>
                                                  
                                                <p class="ml-1 text-green-600 ">Pago Confirmado</p>              
                                            </div>
                                            @endif
                                        @endif
                                        @break
                                    @default
                                    <div class="flex justify-center items-center hover:text-green-500 hover:underline ">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-600">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                          </svg>
                                          
                                        <p class="ml-1 text-green-600 ">Orden en proceso</p>              
                                    </div>
                                @endswitch

                            </td>
                            <td  class="focus:text-amber-600 ">
                                <div class=" text-center">
                                    <p class="text-base font-ligth leading-none text-gray-700 mr-2">
                                        <span class=" font-bold">$@php echo(number_format($orden->costoTotal))@endphp</span>
                                    </p>
                                </div>
                            </td> 
                            
                            <td  class="focus:text-amber-600 ">
                                <div class="flex justify-center items-center">
                                    @if (auth()->user()->role_id == 4)
                                        <a class=" text-gray-600 " href="{{route('ordenes.tracking-centro',$orden->id)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </a>
                                        @else
                                        <a class=" text-gray-600 " href="{{route('ordenes.tracking',$orden->id)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                              </svg>
                                        </a>
                                    @endif
  
                                </div>
                            </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class=" mt-10">
        @if (!empty($ordenes))            
            {{$ordenes->links()}}
        @endif
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Livewire.on('MostrarAlerta', ordenId => {
            Swal.fire({
                title: '¿Estas seguro de eliminar esta orden?',
                text: "Una vez eliminando la orden no habra forma de recuperarla",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Eliminarla',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                //Eliminar el orden
                Livewire.emit('eliminarOrden',ordenId)

                Swal.fire(
                'Se elimino la Orden',
                'Eliminado correectamente.',
                'success'
                )
            }
            })  
        })
        Livewire.on('showFilterOrder', (campus_id) => {
            if(campus_id == 1) {
                console.log('Nueva')
            }
            if(campus_id == 2) {
                console.log('En Proceso')
            }
            if(campus_id == 3) {
                console.log('Finalizada')
            }
        })

        Livewire.on('mostrarModal', () => {
            Swal.fire({
                template: '#my-template',
                preConfirm: false
            }) 
        })
    </script>

@endpush
