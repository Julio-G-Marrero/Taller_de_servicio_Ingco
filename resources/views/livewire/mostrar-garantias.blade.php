<div>
    <div class="sm:px-6 w-full">
        <div class="px-4 md:px-10 py-4 md:py-7">
        </div>
        <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
            <div class="sm:flex items-center justify-between">
                <div class="flex items-center justify-center ajusteMenu">
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
                            <select wire:model="estatusOrden" class="text-gray-600 rounded-full">
                                <option value="" selected>Estatus</option>
                                @foreach ($estatus as $estatu)
                                    <option value="{{$estatu->id}}">{{$estatu->estatus}}</option>
                                @endforeach
                            </select>
                            {{-- <select wire:model="tipoDeOrden" class="ml-3 text-gray-600 rounded-full">
                                <option value="" selected>Todas</option>
                                <option value="1" selected>Reparaciones</option>

                                <option value="2" selected>Garantias</option>

                            </select> --}}
                        </div>
                    </div>
                </div>
                <button onclick="popuphandler(true)" class="focus:ring-2 focus:ring-offset-2 focus:ring-amber-400 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-amber-500 hover:bg-amber-400 focus:outline-none rounded">
                    <a href="{{route('ordenes.create')}}">
                        <p class="text-sm font-medium leading-none text-white">Agregar Orden</p>
                    </a>
                </button>
            </div>
            <div class="mt-7 overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <thead>
                        <tr>
                            <th class="font-medium text-gray-600">ID</th>
                            <th class="font-medium text-gray-600">Nombre</th>
                            <th class="font-medium text-gray-600">Ciudad</th>
                            <th class="font-medium text-gray-600">Estado</th>
                            <th class="font-medium text-gray-600">Estatus</th>
                            <th class="font-medium text-gray-600">Creada</th>
                            <th class="font-medium text-gray-600">Tracking</th>
                            <th class="font-medium text-gray-600">Opciones</th>
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
                                <div class="flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M9.16667 2.5L16.6667 10C17.0911 10.4745 17.0911 11.1922 16.6667 11.6667L11.6667 16.6667C11.1922 17.0911 10.4745 17.0911 10 16.6667L2.5 9.16667V5.83333C2.5 3.99238 3.99238 2.5 5.83333 2.5H9.16667" stroke="#52525B" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <circle cx="7.50004" cy="7.49967" r="1.66667" stroke="#52525B" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></circle>
                                    </svg>
                                    <p  class="text-sm leading-none text-gray-600 ml-2">@switch($orden->estatu_id)
                                        @case(1)
                                            Nueva
                                            @break
                                
                                        @case(2)
                                            En Proceso
                                            @break

                                        @case(3)
                                            Finalizada
                                            @break
                                    
                                        @default
                                            No definido
                                    @endswitch</p>
                                </div>
                            </td>
                            <td class="">
                                <div class="flex justify-center items-center ">
                                    <a href="">
                                        <button class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-gray-600 py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none">{{$orden->created_at->diffForHumans()}}</button>
                                    </a>
                                </div>
                            </td>
                            <td class="">
                                <div class="flex justify-center items-center">
                                    <a class=" text-gray-600 " href="{{route('ordenes.tracking',$orden->id)}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                          </svg>
                                          
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div class="ajuste-tabla flex items-center justify-center">
                                    <a href="{{route('ordenes.edit', $orden->id)}}" class="text-center focus:outline-none text-gray-600 hover:bg-yellow-400 py-4 px-4 cursor-pointer hover:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                          </svg>                                              
                                    </a>
                                    <button wire:click="$emit('MostrarAlerta',{{$orden->id}})" class="text-center focus:outline-none text-gray-600  hover:bg-red-600 py-4 px-4 cursor-pointer hover:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                          </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class=" mt-10">
        {{$ordenes->links()}}
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
                window.location.reload()
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

    </script>

@endpush
