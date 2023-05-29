@extends('layouts.main-user');

@section('titulo')
    Garantias
@endsection

@section('contenido')

    <h1 class=" text-3xl text-center">Todos nuestros Productos con Garantia</h1>
    <div>
        <!-- Container -->
		<div class="container mx-auto">
			<div class="flex justify-center px-6 my-12">
				<!-- Row -->
				<div class="w-full xl:w-3/4 lg:w-11/12 flex">
					<!-- Col -->
                    <img src="{{asset('img/bannerForm.png')}}" class="w-full object-cover h-auto bg-gray-400 hidden lg:block lg:w-5/12 bg-cover rounded-l-lg" alt="">
					<!-- Col -->
					<div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
						<h3 class="pt-4 text-2xl text-center">Registra tu garantia</h3>
						<livewire:crear-orden />	
					</div>
				</div>
			</div>
		</div>
    </div>
    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>

@endsection