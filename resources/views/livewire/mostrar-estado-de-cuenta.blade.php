<div>
  <div class="flex flex-col">
    <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
      <div class="py-2 inline-block min-w-full sm:px-4 lg:3x-8">
        <div class="overflow-hidden">
          <div class="sm:flex items-center justify-between">          
            <div class="flex items-center justify-center ajusteMenu p-3 mb-4 rounded-full bg-white w-full">
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
                            <option value="0">Pendiente</option>
                            <option value="1">Liquidada</option>
                        </select>
                    </div>
                </div>
            </div>
          </div>
          <table class="w-full whitespace-nowrap">
            <thead>
                <tr>
                    <th class="font-medium text-gray-600">ID Mov</th>
                    <th class="font-medium text-gray-600">Realizado</th>
                    <th class="font-medium text-gray-600">Accion</th>
                    <th class="font-medium text-gray-600">Descripción</th>
                    <th class="font-medium text-gray-600">Estado</th>
                    <th class="font-medium text-gray-600">Costo</th>
                    <th class="font-medium text-gray-600">VoBo</th>

                </tr>
            </thead>
            <tbody  wire:poll class="colores-tabla">

                @foreach ($trackings as $tracking) 
                <tr tabindex="0" class="focus:outline-none  h-16 border border-gray-100 rounded">
                    <td  class="focus:text-amber-600 ">
                      <div class=" text-center">
                        <p class="text-base font-ligth leading-none text-gray-700 mr-2 font-bold">#{{$tracking->id}}</p>
                      </div>
                    </td>
                    <td  class="focus:text-amber-600 ">
                      <div class=" text-center">
                        <p class="text-base font-ligth leading-none text-gray-700 mr-2">{{$tracking->created_at}}</p>
                      </div>
                    </td>
                    <td  class="focus:text-amber-600 ">
                      <div class=" text-center">
                        <p  class="text-sm leading-none text-gray-600 ml-2">
                          @php
                            echo $actions[$tracking->action_id - 1 ]['nombre']
                          @endphp 
                        </p>
                      </div>
                    </td>
                    <td  class="focus:text-amber-600 ">
                      <div class=" text-center">
                        <p  class="text-sm leading-none text-gray-600 ml-2">{{$tracking->descripcion}}</p>
                      </div>
                    </td>
                    <td  class="focus:text-amber-600 ">
                      <div class=" text-center">
                        @if ($tracking->liquidado == 0)
                          <p  class="text-sm leading-none text-red-500 ml-2">Pendiente</p>
                        @else
                        <p  class="text-sm leading-none text-green-500 ml-2">Liquidada</p>

                        @endif
                      </div>
                    </td>
                    <td  class="focus:text-amber-600 ">
                      <div class=" text-center">
                        <p  class="text-sm leading-none text-gray-600 ml-2 font-bold">$@php echo number_format($tracking->costo) @endphp</p>
                      </div>
                    </td>
                    <td  class="focus:text-amber-600 ">
                      @if ($cerrada == 1)
                        @if ($tracking->liquidado == 1)
                        <div class=" text-center">
                          <p  class="focus:ring-2 focus:ring-offset-2 focus:ring-green-400 mt-4 sm:mt-0 inline-flex items-start justify-start p-2 bg-green-500 hover:bg-green-400 focus:outline-none roundedt text-white ">Aprobado</p>
                        </div>
                        @else
                        <div class=" text-center">
                          <p  class="focus:ring-2 focus:ring-offset-2 focus:ring-amber-400 mt-4 sm:mt-0 inline-flex items-start justify-start p-2 bg-amber-500 hover:bg-amber-400 focus:outline-none roundedt text-white ">No Aprobado</p>
                        </div>
                        @endif 
                      @else
                        @if ($tracking->liquidado == 1)
                        <div class=" text-center">
                          <p  class="focus:ring-2 focus:ring-offset-2 focus:ring-green-400 mt-4 sm:mt-0 inline-flex items-start justify-start p-2 bg-green-500 hover:bg-green-400 focus:outline-none roundedt text-white ">Aprobado</p>
                        </div>
                        @else

                        <div class=" text-center">
                          <button wire:click='$emit("mensajeVobo",{{$tracking->id}})' class="focus:ring-2 focus:ring-offset-2 focus:ring-amber-400 mt-4 sm:mt-0 inline-flex items-start justify-start p-2 bg-amber-500 hover:bg-amber-400 focus:outline-none roundedt text-white ">o</button>
                        </div>
                        @endif                     
                      @endif
                    </td>                    
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
  <div class=" mt-10">
    {{$trackings->withQueryString()->links()}}
  </div>
  @push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    Livewire.on('mensajeVobo', trackingId => {
        Swal.fire({
            title: '¿Estas seguro de aprobar el VoBo de esta orden?',
            text: "Una vez aprobado no se puede revertir la acción.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Aprobar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('aprobarVobo',trackingId)

            Swal.fire(
            'Se aprobo el VoBo',
            'Aprobado correectamente.',
            'success'
            )
        }
        })  
    })
    </script>
  @endpush
</div>
