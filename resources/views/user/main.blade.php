@extends('layouts.app');

@section('titulo')
    Perfil
@endsection

@section('contenido')
<div class="h-full p-8">
    <div class="my-4 flex flex-col 2xl:flex-row space-y-4 2xl:space-y-0 2xl:space-x-4">
        <div class="flex flex-col w-full 2xl:w-2/3">
            <div class="w-full h-[250px]">
                <img src="{{asset('img/Banner6_997a5958-302e-4841-b7dc-f58457424975.webp')}}" class="w-full object-cover h-full rounded-tl-lg rounded-tr-lg">
            </div>
            <div class="flex flex-col items-center -mt-20">
                <p class="text-white mr-2 px-10 py-8 text-2xl bg-amber-500  pl rounded-full uppercase font-bold ">{{auth()->user()->name[0]}}</p>
                <div class="flex items-center space-x-2 mt-2">
                    <p class="text-2xl">{{auth()->user()->name}}</p>
                </div>
                <p class="text-gray-700">{{auth()->user()->email}}</p>
            </div>
        </div>
        <div class="w-full flex flex-col 2xl:w-1/3">
            <div class="flex-1 bg-white rounded-lg shadow-xl p-8">
                <h4 class="text-xl text-gray-900 font-bold">Información Personal</h4>
                <ul class="mt-2 text-gray-700">
                    <li class="flex border-y py-2">
                        <span class="font-bold w-24">Nombre:</span>
                        <span class="text-gray-700">{{auth()->user()->name}}</span>
                    </li>
                    <li class="flex border-b py-2">
                        <span class="font-bold w-24">Email:</span>
                        <span class="text-gray-700">{{auth()->user()->email}}</span>
                    </li>
                    <li class="flex border-b py-2">
                        <span class="font-bold w-24">Telefono:</span>
                        <span class="text-gray-700">{{auth()->user()->tel}}</span>
                    </li>
                    <li class="flex border-b py-2">
                        <span class="font-bold w-24">Rol:</span>
                        <span class="text-gray-700">
                            @switch(auth()->user()->role_id)
                                @case(2)
                                    Gerente
                                    @break
                                @case(3)
                                    Supervisor
                                    @break
                                @case(4)
                                    Centro de servicio
                                    @break
                            
                                @default
                                    
                            @endswitch
                        </span>
                    </li>
                    <li class="flex border-b py-2">
                        <span class="font-bold w-24">Registrado hace:</span>
                        <span class="text-gray-700">{{auth()->user()->created_at->diffForHumans()}}</span>
                    </li>
                </ul>
            </div>
            {{-- <a href="{{route('perfil-dashboard-editar')}}" class="focus:ring-2 focus:ring-offset-2 focus:ring-amber-400 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-amber-500 hover:bg-amber-400 focus:outline-none rounded">
                <p class="w-full text-sm font-medium leading-none text-center text-white">Editar Perfil</p>
            </a> --}}
        </div>
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