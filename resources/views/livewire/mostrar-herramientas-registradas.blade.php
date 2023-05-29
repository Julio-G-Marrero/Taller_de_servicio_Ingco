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
                <button onclick="popuphandler(true)" class="focus:ring-2 focus:ring-offset-2 text-green-500 hover:text-green-400 hover:underline mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 ">
                    <a href="{{route('registra-tu-garantia')}}">
                        <div class="flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 mr-1 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg>       
                              <p class="text-md font-medium leading-none ">Registrar Herramienta</p>
                        </div>
                    </a>
                </button>
            </div>
            <div class="mt-7 overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <thead>
                        <tr>
                            <th class="font-medium text-gray-600">ID</th>
                            <th class="font-medium text-gray-600">Nombre</th>
                            <th class="font-medium text-gray-600">Creada</th>
                            <th class="font-medium text-gray-600">Tracking</th>
                            <th class="font-medium text-gray-600">Servicio</th>
                            <th class="font-medium text-gray-600">Opciones</th>
                        </tr>
                    </thead>
                    <tbody  wire:poll>
                        <tr class="h-3"></tr>

                        @foreach ($registros as $registro) 
                        <tr class="h-3"></tr>
                        <tr tabindex="0" class="focus:outline-none  h-16 border border-gray-100 rounded">
                            <td  class="focus:text-amber-600 ">
                                <div class=" text-center">
                                    <p class="text-base font-ligth leading-none text-gray-700 mr-2 font-bold">#{{$registro->id}}</p>
                                </div>
                            </td>
                            <td  class="focus:text-amber-600 ">
                                <div class=" text-center">
                                    <p class="text-base font-ligth leading-none text-gray-700 mr-2">{{$registro->nombre}} {{$registro->apellidos}}</p>
                                </div>
                            </td>
                            <td class="">
                                <div class="flex justify-center items-center ">
                                    <p class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-gray-600 py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none">{{$registro->created_at->diffForHumans()}}</p>
                                </div>
                            </td>
                            <td class="">
                                @if ($registro->solicitada == 0)
                                <div class="flex justify-center items-center">
                                    <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"  class="w-6 hover:cursor-not-allowed text-gray-600 h-6" stroke="currentColor" >
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                      </svg>

                                </div>
                                @else
                                <div class="flex justify-center items-center">
                                    <a class=" text-gray-600 " href="{{route('ordenes.tracking-cliente',$registro->id)}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                          </svg>
                                    </a>
                                </div>
                                @endif

                              
                            </td>
                            <td class="">
                                @if ($registro->solicitada == 0)
                                    <button wire:click='$emit("MostrarAlertaServicio", {{$registro->id}}, {{$tiendas}})' class=" mt-4 sm:mt-0  items-center flex justify-center mx-auto px-6 py-2 bg-green-600 hover:bg-green-500 text-sm font-medium leading-none text-white focus:outline-none rounded">
                                        <p>Solicitar</p>
                                    </button>
                                    @else
                                    <button class=" mt-4 sm:mt-0  items-center flex justify-center mx-auto px-6 py-2 bg-amber-600 hover:bg-amber-500 text-sm font-medium leading-none text-white focus:outline-none  rounded">
                                        <p>
                                            @if ($registro->estatu_id == 11)
                                                Revisar
                                                @else
                                                @switch($registro->tipo_application)
                                                @case(1)
                                                    Sin Definir
                                                    @break
                                                @case(2)
                                                    Reparación
                                                    @break
                                                @case(3)
                                                    Mantenimiento
                                                    @break
                                                @case(4)
                                                    Garantia
                                                    @break
                                                @default
                                                    
                                            @endswitch
                                            @endif
  
                                        </p>
                                    </button>
                                @endif
                            </td>
                            <td>
                                <div class="ajuste-tabla flex items-center justify-center">
                                    <button wire:click="$emit('MostrarAlerta',{{$registro->id}})" class="text-center focus:outline-none text-gray-600 py-4 px-4 cursor-pointer hover:text-red-600">
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
                @if(empty($registro))
                    <p class="text-center mt-2 max-w-  text-gray-600">Aun no hay ninguna herramienta registrada. <a href="{{route('registra-tu-garantia')}}" class=" text-gray-600 underline">Empieza registrando una</a></p>
                @endif
            </div>
        </div>
    </div>
    <div class=" mt-10">
        {{$registros->links()}}
    </div>
</div>
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Livewire.on('MostrarAlertaServicio', (ordenId,tiendas) => {
            Swal.fire({
                title: '¿Estas seguro de solicitar un servicio?',
                text: "Puede solicitar cualquier servicio que requiera su herramienta.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, solicitarlo',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                var options = {};
                for (i = 0; i < tiendas.length; i++) {
                    options[i + 1] = tiendas[i].tienda
                }
                const { value: formValues } =  Swal.fire({
                title: 'Completa tu Solicitud',
                html:
                    '<div class="flex flex-col"><label for="swal-input1">¿Que tipo de servicio necesitas?</label><select class="w-18 swal2-input mb-4" name="tipo_application" id="swal-input1" ><option value="2" selected>Reparación</option><option value="4">Garantía</option><option value="3">Mantenimiento</option></select></div>' +
                    '<div><label for="swal-input2">¿Que fue lo que ocurrio con el equipo?</label><textarea id="swal-input2" class="w-18 swal2-input" cols="30" rows="10"></textarea></div>',
                input: 'select',
                inputLabel: 'Selecciona la sucursal de entrega',
                inputOptions: options,
                focusConfirm: false,
                preConfirm: () => {
                    return [
                    document.getElementById('swal-input1').value,
                    document.getElementById('swal-input2').value,
                    document.querySelector('.swal2-select').value,

                    ]
                }
                }).then((result) => {
                    Livewire.emit('solicitarServicio', ordenId, result.value[0], result.value[1],result.value[2])
                    Swal.fire(
                    'Se Solcitico correctamente',
                    'El servicio se solciito exitosamente en breve estara siendo procesado',
                    'success'
                    )
                })
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

    </script>

@endpush