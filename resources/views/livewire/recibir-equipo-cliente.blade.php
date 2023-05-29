<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
</div>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const mostrarReporte = document.querySelector("#recibirEquipo");
    mostrarReporte.addEventListener("click", 
    function recibirEquipo(){
        Swal.fire({
        title: '¿Estas seguro de recibir el Equipo?',
        text: "Recibiendo el equipo de esta orden declaras que la entrega del mismo ya fue completada.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Recibirla'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('recibirEquipoCliente')
                Swal.fire(
                'Se recibio la herramienta',
                '¡Muchas gracias por utilizar nuestros servicios!'
                )
                setTimeout(function(){
                    window.location.reload()
                }, 2000);
            }
        })  
    });
</script>
@endpush