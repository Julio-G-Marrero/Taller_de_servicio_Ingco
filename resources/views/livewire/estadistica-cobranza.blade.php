<div>
   <div class="flex items-center justify-between">
      <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">Estado de Cuenta Orden #{{$ordenId}}</p>
      <div wire:model>
         @if ($cerrada == 0)
            <button wire:click='$emit("cerrarOrdenMensaje", {{$ordenId}})' class="focus:ring-2 focus:ring-offset-2 focus:ring-amber-400 mt-4 sm:mt-0 inline-flex items-start justify-start p-2 pl-3 pr-3 rounded-full bg-amber-500 hover:bg-amber-400 focus:outline-none roundedt text-white ">Cerrar Orden</button>
         @else
            <p class="text-red-500 hover:underline">Esta Orden esta cerrada</p>
         @endif
      </div>
   </div>
    <div class="mt-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 mb-4">
        <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
           <div class="flex items-center">
              <div class="flex-shrink-0">
                <div wire:poll>
                 <span  class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">$@php
                    echo number_format($saldoPendiente)
                 @endphp</span>
                </div>
                 <h3 class="text-base font-normal text-gray-500">Saldo Pendiente</h3>
              </div>
              <div class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                 14.6%
                 <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                 </svg>
              </div>
           </div>
        </div>
        <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
           <div class="flex items-center">
              <div class="flex-shrink-0">
                <div wire:poll>
                   <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{$pendienteRevision}}</span>
                </div>
                 <h3 class="text-base font-normal text-gray-500">Pte Revision</h3>
              </div>
              <div class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                 32.9%
                 <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                 </svg>
              </div>
           </div>
        </div>
        <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
           <div class="flex items-center">
              <div class="flex-shrink-0">
                 <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{$trackingsTotales}}</span>
                 <h3 class="text-base font-normal text-gray-500">Trackings Totales</h3>
              </div>
              <div class="ml-5 w-0 flex items-center justify-end flex-1 text-red-500 text-base font-bold">
                 -2.7%
                 <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M14.707 12.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                 </svg>
              </div>
           </div>
        </div>
     </div>
     @push('scripts')
         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
         <script>
         Livewire.on('cerrarOrdenMensaje', ordenId => {
            Swal.fire({
                title: '¿Estas seguro de Cerrrar esta orden?',
                text: "Una vez cerrada la orden no habra forma de revertirlo",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Cerrarla',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
               //Eliminar el orden
               Livewire.emit('cerrarOrden',ordenId)
         
               Swal.fire(
               'Se Cerro la Orden',
               'Cerrada correectamente.',
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
</div>
