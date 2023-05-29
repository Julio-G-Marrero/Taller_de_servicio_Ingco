@extends('layouts.main-user');

@section('titulo')
    Personal Regisrar
@endsection

@section('contenido')
<div class=" max-w-7xl mx-auto">
    <div>
        @if (session()->has('mensaje'))
            <div class="uppercase  border-l-green-600 bg-green-100 text-green-600 font-bold p-2 my-3 text-sm">
                {{session('mensaje')}}
            </div>
        @endif
    </div>
    <div>
        <form method="POST" class="hover:cursor-pointer" action="{{route('logout')}}">
            @csrf
            <a class="text-base text-gray-900 font-normal rounded-lg group transition duration-75 flex items-center" :href="route('logout')"
                    onclick="event.preventDefault();
                            this.closest('form').submit();">   
                <svg class="w-6 h-6 text-red-500 flex-shrink-0 group-hover:text-red-600 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path>
                </svg>
                <span class="ml-3 group-hover:text-red-600 text-red-500">Cerrar Sesión</span>    
            </a>
        </form>
    </div>
    <div class="my-4 flex flex-col 2xl:flex-row space-y-4 2xl:space-y-0 2xl:space-x-4">
        <div class="flex flex-col w-full">
            <div class="w-full h-[250px]">
                <img src="{{asset('img/Banner6_997a5958-302e-4841-b7dc-f58457424975.webp')}}" class="w-full object-cover h-full rounded-tl-lg rounded-tr-lg">
            </div>
            <div class="flex flex-col items-center mb-2 -mt-28">
                {{-- <img src="{{asset('img/bruce-mars.jpg')}}" class="w-40 border-4 border-white rounded-full"> --}}
                <p class="px-4 py-2 mt-5 w-20 h-20 flex justify-center items-center border-4 border-white rounded-full text-3xl uppercase text-white font-bold">{{auth()->user()->name[0]}}</p>
                <div class="flex items-center space-x-2 mt-4">
                    <p class="text-2xl capitalize">{{auth()->user()->name}}</p>
                </div>
                <p class="text-gray-700">{{auth()->user()->email}}</p>
                <p class="text-gray-700">{{auth()->user()->telefono}}</p>
                <p class="text-sm text-gray-500">Registrado {{auth()->user()->created_at->diffForHumans()}} </p>
            </div>
            <a href="{{route('perfil-usuario-editar')}}" class="mt-8 sm:mt-0 inline-flex items-start justify-start px-6 py-">
                <p class="w-full text-sm font-medium leading-none text-center text-amber-500 underline">Editar Perfil</p>
            </a>
        </div>
        {{-- <div class="w-full flex flex-col 2xl:w-1/3">
            <div class="flex-1 bg-white rounded-lg shadow-xl p-8">
                <h4 class="text-xl text-gray-900 font-bold">Información Personal</h4>
                <ul class="mt-2 text-gray-700">
                    <li class="flex border-y py-2">
                        <span class="font-bold w-24">Nombre:</span>
                        <span class="text-gray-700">{{auth()->user()->name}}</span>
                    </li>
                    <li class="flex border-b py-2">
                        <span class="font-bold w-24">Se registro:</span>
                        <span class="text-gray-700">{{auth()->user()->created_at}}</span>
                    </li>
                    <li class="flex border-b py-2">
                        <span class="font-bold w-24">Telefono:</span>
                        <span class="text-gray-700">{{auth()->user()->telefono}}</span>
                    </li>
                    <li class="flex border-b py-2">
                        <span class="font-bold w-24">Correo:</span>
                        <span class="text-gray-700">{{auth()->user()->email}}</span>
                    </li>
                </ul>
            </div>
            <a href="{{route('perfil-usuario-editar')}}" class="focus:ring-2 focus:ring-offset-2 focus:ring-amber-400 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-amber-500 hover:bg-amber-400 focus:outline-none rounded">
                <p class="w-full text-sm font-medium leading-none text-center text-white">Editar Perfil</p>
            </a>
        </div> --}}
    </div>
    <div>
        <livewire:mostrar-herramientas-registradas />
    </div>
</div>

<script>

        const DATA_SET_VERTICAL_BAR_CHART_1 = [68.106, 26.762, 94.255, 72.021, 74.082, 64.923, 85.565, 32.432, 54.664, 87.654, 43.013, 91.443];

        const labels_vertical_bar_chart = ['January', 'February', 'Mart', 'April', 'May', 'Jun', 'July', 'August', 'September', 'October', 'November', 'December'];

        const dataVerticalBarChart= {
            labels: labels_vertical_bar_chart,
            datasets: [
                {
                    label: 'Revenue',
                    data: DATA_SET_VERTICAL_BAR_CHART_1,
                    borderColor: 'rgb(54, 162, 235)',
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                }
            ]
        };
        const configVerticalBarChart = {
            type: 'bar',
            data: dataVerticalBarChart,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Last 12 Months'
                    }
                }
            },
        };

        var verticalBarChart = new Chart(
            document.getElementById('verticalBarChart'),
            configVerticalBarChart
        );
    </script>

@endsection