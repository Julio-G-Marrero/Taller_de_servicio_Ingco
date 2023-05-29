@extends('layouts.main-user');

@section('titulo')
    Garantía
@endsection

@section('contenido')
<div>
    <h1 class="text-center text-xl sm:text-2xl md:text-4xl">Garantía de nuestros Productos</h1>
    
    <div class="flex mt-10- max-w-5xl flex-col sm:flex-row mx-auto mt-8 justify-center items-center gap-4">
        <div class="w-11/12">
            <img src="{{asset('img/Producto_con_garantia.webp')}}" alt="productoIMG ">
        </div>
    
        <div class="ml-4">
            <h2 class=" text-2xl mb-3">Solicita tu Garantia</h2>
            <p class="leading-7 italic font-light font-sans text-lg text-left mb-5">Todos nuestros productos cuentan con garantía, la cual se especifica por el vendedor al momento de la compra. Esta garantía es valida a partir de la fecha de compra hasta un año despues de ella. Puedes registrar tu herramienta para hacerla valida en caso de necesitarlo.</p>
            <a href="{{route('registra-tu-garantia')}}" class="group rounded-2xl pt-1 pb-1 pr-4 pl-4 bg-amber-500 text-lg text-white relative overflow-hidden">
                Registra tu herramienta
                <div class="absolute duration-300 inset-0 w-full h-full transition-all scale-0 group-hover:scale-100 group-hover:bg-white/30 rounded-2xl">
                </div>
            </a>
        </div>
    
    </div>
</div>

@endsection