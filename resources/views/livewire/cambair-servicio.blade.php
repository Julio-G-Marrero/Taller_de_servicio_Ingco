<div>
    <template id="my-template">
    <swal-html>
        <div class='flex items-center justify-center mt-4'>
            <div
                class="bg-white w-max h-20  rounded-md gap-4 p-4 flex flex-row items-center justify-center">
                <section class="w-6 h-full flex flex-col items-center justify-start">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        
                </section>
                <section class="h-full flex flex-col items-start justify-end gap-1">
                    <h1 class="text-xl font-semibold text-zinc-800 antialiased">Reportaron el siguiente problema</h1>
                    <p class="text-lg font-medium text-zinc-400 antialiased">{{$orden->descripcion}}</p>
                    <p class="text-xs font-medium text-zinc-400 antialiased">Para cualquier aclaracion acuda con el personal adecuado.</p>
                </section>

            </div>
        </div>
    </swal-html>

    <swal-icon type="warning" color="red"></swal-icon>
    <swal-button type="confirm">
        Solicitar otro servicio
    </swal-button>
    <swal-button type="cancel">
        Cerrar
    </swal-button>                            
    <swal-param name="allowEscapeKey" value="false" />
    <swal-param
        name="customClass"
        value='{ "popup": "my-popup" }' />
    <swal-function-param
        name="didOpen" />
    </template>

    <template id="my-template2">
        <swal-title>
        ¿Que servicio desea solicitar?
        </swal-title>
        <swal-icon type="warning" color="red"></swal-icon>
        <swal-button type="confirm">
          Mantenimiento
        </swal-button>
        <swal-button type="cancel">
          Cancel
        </swal-button>
        <swal-button type="deny" color="#3085d6">
          Reparación
        </swal-button>
        <swal-param name="allowEscapeKey" value="false" />
        <swal-param
          name="customClass"
          value='{ "popup": "my-popup" }' />
        <swal-function-param
          name="didOpen"
 />
      </template>


</div>
@push('scripts')
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
                }).then((result => {
                    if(result.isConfirmed) {
                        Livewire.emit('cambiarServicio',3)
                        Swal.fire(
                        'Se solicito el servicio correctamente',
                        'La orden volvera a ser procesada.',
                        'success'
                        )
                        setTimeout(function(){
                            window.location.reload()
                        }, 2000);
                    }
                    if(result.isDenied) {
                        Livewire.emit('cambiarServicio',2)
                        Swal.fire(
                        'Se solicito el servicio correctamente',
                        'La orden volvera a ser procesada.',
                        'success'
                        )
                        setTimeout(function(){
                            window.location.reload()
                        }, 2000);
                    }
                }))
            }
        }) 
    });
</script>
@endpush