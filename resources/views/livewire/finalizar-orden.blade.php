<div>
    {{-- @if ($estatuId == 11)
        <p class="tex text-red-400 hover:underline cursor-pointer">Esta Orden ya fue finalizada</p>
        <div wire:poll>
            <p>Costo Total: <span class="font-bold">${{$costoTotal}}</span> </p>
        </div>
        @elseif($estatuId == 10)
        <button wire:click="$emit('MostrarAlerta', {{$OrdenId}})" class="tex text-red-400 
        hover:underline">Finalizar Orden</button>
        <div wire:poll>
            <p>Costo Total: <span class="font-bold">${{$costoTotal}}</span> </p>
        </div>

    @endif --}}

    @if ($estatuId == 2)
        @if (auth()->user()->role_id == 3)        
            <div>
                <button  class="inline-flex hover:text-red-500 mt-5" wire:click="$emit('MostrarAlertaCentro',{{$OrdenId}},{{$centros}})">
                    <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                    </svg>
                    <p class="ml-1 text-red-600 ">Falta asignar Centro de Servicio</p>              
                </button>
            </div>
        @endif
    @endif


    @switch($estatuId)
        @case(3)   
            @if (auth()->user()->role_id == 4)
                <button  class="inline-flex hover:text-red-500 mt-5" wire:click="$emit('MostrarAlertaRecibirHerramienta',{{$OrdenId}})">
                    <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                    </svg>
                    <p class="ml-1 text-red-600 ">Falta recibir la herramienta</p>              
                </button>
                @else
                <div  class="inline-flex hover:text-red-500 mt-5">
                    <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                    </svg>
                    <p class="ml-1 text-red-600 ">El Centro no ah recibido el equipo</p>              
                </div>            
            @endif
            @break
        @case(4)
            @if (auth()->user()->role_id == 4)
                <button  class="inline-flex hover:text-red-500 mt-5" wire:click="$emit('MostarAlertaFinalizarPresupuesto',{{$OrdenId}})">
                    <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                    </svg>
                    <p class="ml-1 text-red-600 ">Finalizar Presupuesto</p>              
                </button>
            @else
                <p>Esta orden esta en Presupuesto</p>
            @endif
            @break
        @case(5)
            @if (auth()->user()->role_id == 2)
                <button  class="inline-flex hover:text-red-500 mt-5" wire:click="$emit('MostrarGestionarPresupuesto',{{$OrdenId}},{{$presupuesto}})">
                    <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                    </svg>
                    <p class="ml-1 text-red-600 ">Gestionar Presupuesto</p>              
                </button>
            @else
                <div  class="inline-flex hover:text-red-500 mt-5">
                    <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                    </svg>
                    <p class="ml-1 text-red-600 ">Hace falta la autorización del presupuesto.</p>              
                </div>    
            @endif
            @break
        @case(6)
            <div>
                <p>Presupuesto Estimado: <span class="font-bold text-amber-500">${{$presupuesto}}</span> </p>
                <div wire:poll>
                    <p>Presupuesto Utilizado: <span @if ($reparacion > $presupuesto)
                        class="font-bold text-red-600"
                        @else
                        class="font-bold text-green-600"
                    @endif>${{$reparacion}}</span> </p>
                </div>
            </div>            
            @if (auth()->user()->role_id == 4)
                <button  class="inline-flex hover:text-green-500 hover:underline mt-1" wire:click="$emit('MostrarFinalizarReparacion',{{$OrdenId}},{{$diferencia}},{{$reparacion}})">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>                      
                    <p class="ml-1 text-green-600 ">Finalizar Reparación</p>              
                </button>
            @else
                <div class="inline-flex hover:text-green-500 hover:underline mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>                      
                    <p class="ml-1 text-green-600 ">Hace falta finaizar la reparación</p>              
                </div>    
            @endif
            @break
        @case(7)
        <p class="text-green-500 hover:underline">Esta orden se finalizo con <span class="font-medium">${{$reparacion}}</span></p>

            @if ($facturaSubida >= 1)
                <p class="text-center">Ya se subio la factura de esta orden.</p>
                @else
                @if (auth()->user()->role_id == 4)
                    <div class="p-1">
                        <form wire:submit.prevent='subirComprobanteCobro'>
                            <div class="flex flex-col">
                                <input type="file" accept="image/*" class="interruptor mb-1" wire:model="comprobanteCobro">
                                @if (empty($comprobanteCobro))
                                    <p class="bg-yellow-400 px-2 py-1 mt-1 text-white rounded-full text-center hover:cursor-wait">Sube la factura</p>
                                    @else
                                    <input type="submit" value="Enviar" id="inputEnviar" class="bg-green-500 px-2 py-1 mt-1 text-white rounded-full hover:cursor-pointer">
                                @endif
                            </div>
                        </form>
                    </div>
                @endif
            @endif
            @break
        @case(8)
            @if (auth()->user()->role_id == 3)
            <button  class="inline-flex hover:text-green-500 hover:underline mt-1" wire:click="$emit('MostrarRecibirSupervisor',{{$OrdenId}})">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>                      
                <p class="ml-1 text-green-600 ">Recibir Herramienta</p>              
            </button>
            @else
            <div  class="inline-flex hover:text-red-500 mt-5">
                <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
                <p class="ml-1 text-red-600 ">Pendiente traslado de equipo al supervisor.</p>              
            </div>
            @endif
            @break
        @case(9)
            @if (auth()->user()->role_id == 3)
                @if ($indicePago == 0) 
                    <div class="flex flex-col">
                        <div class="flex justify-center mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1 text-green-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>                          
                            <button wire:click="$emit('verFactura')" class="text-green-500">Ver factura</button>

                        </div>
                        <template id="my-template">
                            <swal-title>
                                El centro de servicio anexo esta factura
                            </swal-title>
                            <swal-icon type="warning" color="gray"></swal-icon>
                            <swal-html>
                                <img src="{{asset('storage/ordenes/' . $comprobanteCobro)}}" alt="">
                            </swal-html>

                            <swal-param name="allowEscapeKey" value="false" />
                            <swal-param
                            name="customClass"
                            value='{ "popup": "my-popup" }' />
                            <swal-function-param
                            name="didOpen"
                         />
                        </template>
                        <div class="">
                            <form wire:submit.prevent='subirComprobantePago'>
                                <div class="flex flex-col">
                                    <input type="file" accept="image/*" class="interruptor mb-1" wire:model="comprobantePago">
                                    @if (empty($comprobantePago))
                                        <p class="bg-yellow-400 px-2 py-1 mt-1 text-white rounded-full text-center hover:cursor-wait">Sube la factura</p>
                                        @else
                                        <input type="submit" value="Enviar" id="inputEnviar" class="bg-green-500 px-2 py-1 mt-1 text-white rounded-full hover:cursor-pointer">
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>                    
                    @else
                    <div class="flex justify-center items-center hover:text-green-500 hover:underline ">
                        <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                        </svg>                      
                        <p class="ml-1 text-green-600 ">Comprobante Subido</p>              
                    </div>
                @endif
      
                @elseif (auth()->user()->role_id == 4)
                @if ($comprobantePago == 0)
                    <div class="flex flex-col">
                        <div class="flex justify-center mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1 text-green-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>                          
                            <button wire:click="$emit('verFactura')" class="text-green-500">Ver Comprobante</button>

                        </div>
                        <template id="my-template">
                            <swal-title>
                                El Supervisor anexo esta comprobante para liquidar el pago
                            </swal-title>
                            <swal-icon type="warning" color="gray"></swal-icon>
                            <swal-html>
                                <img src="{{asset('storage/ordenes/' . $comprobantePago)}}" alt="">
                            </swal-html>

                            <swal-param name="allowEscapeKey" value="false" />
                            <swal-param
                            name="customClass"
                            value='{ "popup": "my-popup" }' />
                            <swal-function-param
                            name="didOpen"
                            value="popup => console.log(popup)" />
                        </template>
                        <div class="">
                            <button wire:click="$emit('confirmarComprobantePago')" class="bg-green-500 px-2 py-1 mt-1 text-white rounded-full hover:cursor-pointer">Confirmar Pago</button>
                        </div>
                    </div>
                    @else
                    <div class="flex justify-center items-center hover:text-green-500 hover:underline ">
                        <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                        </svg>                      
                        <p class="ml-1 text-green-600 ">Comprobante Subido</p>              
                    </div>
                @endif
            @else
                <div  class="inline-flex hover:text-green-500 mt-5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                    </svg>
                    
                    <p class="ml-1 text-green-600 ">Equipo listo para entrega.</p>              
                </div>
            @endif
            @break
        @case(10)
            @if (auth()->user()->role_id == 3)
                @if ($indicePago == 0) 
                    <div class="flex flex-col">
                        <div class="flex justify-center mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1 text-green-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>                          
                            <button wire:click="$emit('verFactura')" class="text-green-500">Ver factura</button>

                        </div>
                        <template id="my-template">
                            <swal-title>
                                El centro de servicio anexo esta factura
                            </swal-title>
                            <swal-icon type="warning" color="gray"></swal-icon>
                            <swal-html>
                                <img src="{{asset('storage/ordenes/' . $comprobanteCobro)}}" alt="">
                            </swal-html>

                            <swal-param name="allowEscapeKey" value="false" />
                            <swal-param
                            name="customClass"
                            value='{ "popup": "my-popup" }' />
                            <swal-function-param
                            name="didOpen"
                        />
                        </template>
                        <div class="">
                            <form wire:submit.prevent='subirComprobantePago'>
                                <div class="flex flex-col">
                                    <input type="file" accept="image/*" class="interruptor mb-1" wire:model="comprobantePago">
                                    @if (empty($comprobantePago))
                                        <p class="bg-yellow-400 px-2 py-1 mt-1 text-white rounded-full text-center hover:cursor-wait">Sube la factura</p>
                                        @else
                                        <input type="submit" value="Enviar" id="inputEnviar" class="bg-green-500 px-2 py-1 mt-1 text-white rounded-full hover:cursor-pointer">
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>                    
                @endif
            @endif
            <div  class="inline-flex hover:text-green-500 mt-5">
                <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
                <p class="ml-1 text-green-600 ">Esta Orden ya fue finalizada.</p>              
            </div>
            @break
        @case(11)
            <div  class="inline-flex hover:text-red-500 mt-5">
                <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
                <p class="ml-1 text-red-600 ">No fue autorizado el presupuesto.</p>              
            </div>
        @break
    @default
    @endswitch

</div>
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const interruptor = document.querySelector('.interruptor');
        if(interruptor) {
            interruptor.addEventListener('change', (event) => {
                Swal.fire({
                    title: 'Se esta subiendo la imagen',
                    html: 'Espere un momento mientras se procesa la iamgen',
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                })
            });
        }

        Livewire.on('verFactura' , () => {
            Swal.fire({
                template: '#my-template'
            })
        })

        Livewire.on('confirmarComprobantePago', () => {
            Swal.fire({
                title: '¿Estas seguro de confirmar le pago?',
                text: "Al confirmar el pago das por echo que el supervisor realizo el pago de la orden, esta accion no se puede remediar despues de havberla confirmado. ¿Estas seguro?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Confirmarlo',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('confirmarPago')
                Swal.fire(
                'Se confriamado el pago correctamente',
                'Al supervisor automaticamente le aparecera que el pago fue confirmado',
                'success'
                )
                setTimeout(function(){
                    window.location.reload()
                }, 2000);
            }
            }) 
        })

        Livewire.on('MostrarAlertaCentro', (ordenId,centros) => {
            Swal.fire({
                title: '¿Estas seguro de asignarle un Centro De Servicio?',
                text: "Puede asignarle cualquier centro de servicio disponible.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Asignarlo',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                var options = {};
                for (i = 0; i < centros.length; i++) {
                    options[i + 1] = centros[i].direccion
                }
                const { value: formValues } =  Swal.fire({
                title: 'Selecciona el centro de servicio',
                input: 'select',
                inputOptions: options,
                focusConfirm: false,
                }).then((result) => {
                    Livewire.emit('registrarCentro', ordenId, result.value)
                    Swal.fire(
                    'Se Asigno correctamente',
                    'El servicio se solciito exitosamente en breve estara siendo procesado',
                    'success'
                    )
                    setTimeout(function(){
                    window.location.reload()
                }, 2000);
                })
            }
            })  
        })
        Livewire.on('MostrarAlertaRecibirHerramienta', (ordenId) => {
            Swal.fire({
                title: 'Recibir Herramienta',
                text: "Un supervisor asigno este equipo a este Centro de servicio, al darle recibir confirmas que el equipo ya esta disponible para emepzar a realizar el presupuesto,¿estas de acuerdo en recibirla?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Recibirla',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('recibirHerramienta', ordenId)
                Swal.fire(
                'Se ah recibido la herramienta correctamente',
                'Una vez recibida la herramienta ya puedes empezar a realizar el presupuesto.',
                'success'
                )
                setTimeout(function(){
                    window.location.reload()
                }, 2000);
            }
            })  
        })
        Livewire.on('MostrarGestionarPresupuesto', (ordenId, presupuesto) => {
            Swal.fire({
                title: 'Gestionar Presupuesto',
                text: "Esta orden tiene el presupuesto de $" + presupuesto + " ¿Que accion desea realizar?",
                icon: 'warning',
                showCancelButton: true,
                showDenyButton: true,
                denyButtonText: `No autorizar`,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#f59e0b',
                confirmButtonText: 'Autorizarlo',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('gestionarPresupuesto', ordenId,1,"")
                Swal.fire(
                'Se ah recibido la herramienta correctamente',
                'Una vez recibida la herramienta ya puedes empezar a realizar el presupuesto.',
                'success'
                )
                setTimeout(function(){
                    window.location.reload()
                }, 2000);
            } else if (result.isDenied) {
                const { value: text } = Swal.fire({
                    input: 'textarea',
                    inputLabel: 'Explica la razón por la cual fue declianda la autorización.',
                    inputPlaceholder: 'Escribe aqui porque no se autorizo...',
                    inputAttributes: {
                        'aria-label': 'Escribe aqui porque no se autorizo'
                    },
                    showCancelButton: true
                }).then((result) => {
                    Livewire.emit('gestionarPresupuesto', ordenId,0,result.value)
                    setTimeout(function(){
                        window.location.reload()
                    }, 2000);
                }) 
                // Swal.fire(
                // 'Se ah autorizado correctamente',
                // 'Autorizando la orden el centro de servicio puede comenzar con la reparación.',
                // 'success'
                // )
                }
            })  
        })
        Livewire.on('MostrarFinalizarReparacion', (ordenId,diferencia,costoTotal) => {
            Swal.fire({
                title: 'Finalizar Reparación',
                text: "Al finalizar la reparacion se totalizara la orden para finalmente entregar el equipo, esta orden llevo una diferencia de " + diferencia + " teniendo un costo total de " + costoTotal +"¿Esta seguro de finalizarla?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Finalizarla',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('finalizarReparacion', ordenId,costoTotal)
                Swal.fire(
                'Se ah finalizado la orden correctamente',
                'Se finalizo ecitosamente, la orden sera procesada para finalmente ser entregada al cliente.',
                'success'
                )
                setTimeout(function(){
                    window.location.reload()
                }, 2000);
            }
            })  
        })
        Livewire.on('MostrarRecibirSupervisor', (ordenId,) => {
            Swal.fire({
                title: '¿Desea reccibir esta herramienta?',
                text: "Recibiendo la herramienta declara que el equipo se encuentra bajo su disposición y sera entregado lo antes posible al cliente.¿Esta seguro de recibirlo?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Recibirlo',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('recibirSupervisor', ordenId)
                Swal.fire(
                'Se ah recibido el Equipo',
                'Una vez recibido el equipo, se le notificara al cliente que el equipo esta listo para su entrega.',
                'success'
                )
                setTimeout(function(){
                    window.location.reload()
                }, 2000);
            }
            })  
        })
        Livewire.on('MostarAlertaFinalizarPresupuesto', (ordenId) => {
            Swal.fire({
                title: '¿Desea finalizar el proceso de presupuesto?',
                text: "Finalizando el proceso de presupuesto la orden sera enviada al personal adecualdo para esperar su autorización. ¿Desea realziar esta acción?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Finalizarlo',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('finalizarPresupuesto', ordenId)
                Swal.fire(
                'Se ah finalizado correctamente',
                'Este atento a la autorización del presupuesto.',
                'success'
                )
                setTimeout(function(){
                    window.location.reload()
                }, 2000);
            }
            })  
        })
        Livewire.on('MostrarAlerta', ordenId => {
            Swal.fire({
                title: '¿Estas seguro de finalizar esta orden?',
                text: "Una vez finalizando la orden no habra forma de remediarlo.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Finalizarla',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                //Finalizar la orden
                Livewire.emit('finalizarOrden',ordenId)

                Swal.fire(
                'Se Finalizo la Orden',
                'Finalizada correectamente.',
                'success'
                )
                setTimeout(function(){
                    window.location.reload()
                }, 2000);

            }
            })  
        })
    </script>
@endpush
