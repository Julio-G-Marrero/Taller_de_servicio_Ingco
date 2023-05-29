<div>
    <div class="mt-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 mb-4">
        <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{$numero_garantias}}</span>
                    <h3 class="text-base font-normal text-gray-500">Garantías</h3>
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
                    <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{$numero_reparaciones}}</span>
                    <h3 class="text-base font-normal text-gray-500">Reparaciones</h3>
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
                    <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{$numero_mantenimiento}}</span>
                    <h3 class="text-base font-normal text-gray-500">Mantenimientos</h3>
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

    <div class="w-full grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-4">
        <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8  2xl:col-span-2">
            <div class="flex items-center justify-between mb-4">
                <div class="flex-shrink-0">
                    <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">$45,385</span>
                    <h3 class="text-base font-normal text-gray-500">Ventas totales</h3>
                </div>
                <div class="flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                    12.5%
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
            <img src="{{asset('img/grafica.png')}}" alt="grafica" class="pb-20 object-cover h-full">
        </div>
        <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
            <div class="mb-4 flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Ordenes</h3>
                    <span class="text-base font-normal text-gray-500">Ultimas ordenes registradas</span>
                </div>
                <div class="flex-shrink-0">
                    <a href="#" class="text-sm font-medium text-amber-00 hover:bg-gray-100 rounded-lg p-2">Ver todas</a>
                </div>
            </div>
            <div class="flex flex-col mt-8">
                <div class="overflow-x-auto rounded-lg">
                    <div class="align-middle inline-block min-w-full">
                    <div class="shadow overflow-hidden sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Cliente
                                    </th>
                                    <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Creada
                                    </th>
                                    <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Costo
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach ($ordenes as $orden)
                                <tr>
                                    <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                       {{$orden->nombre}} <span class="font-semibold">{{$orden->apellidos}}</span>
                                    </td>
                                    <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                        {{$orden->created_at->diffForHumans()}}
                                    </td>
                                    <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                        $2300
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="grid grid-cols-1 2xl:grid-cols-2 xl:gap-4 my-4">
        <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold leading-none text-gray-900">Ultimos Clientes</h3>
                <a href="#" class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg inline-flex items-center p-2">
                Ver todos
                </a>
            </div>
            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200">
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($clientes as $cliente)

                        <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="h-8 w-8 rounded-full" src="https://demo.themesberg.com/windster/images/users/neil-sims.png" alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">
                                    {{$cliente->nombre}} {{$cliente->apellido}} 
                                </p>
                                <p class="text-sm text-gray-500 truncate">
                                    {{$cliente->correo_cliente}}
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                $320
                            </div>
                        </div>
                        </li>
                        @break($count == 4)
                        @php
                            $count++;
                        @endphp
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
            <h4 class="text-xl text-gray-900 font-bold">Notificaciones</h4>
            <div class="relative px-4">
                <div class="absolute h-full border border-dashed border-opacity-20 border-secondary"></div>

                <!-- start::Timeline item -->
                <div class="flex items-center w-full my-6 -ml-1.5">
                    <div class="w-1/12 z-10">
                        <div class="w-3.5 h-3.5 bg-amber-500 rounded-full"></div>
                    </div>
                    <div class="w-11/12">
                        <p class="text-sm">Profile informations changed.</p>
                        <p class="text-xs text-gray-500">3 min ago</p>
                    </div>
                </div>
                <!-- end::Timeline item -->

                <!-- start::Timeline item -->
                <div class="flex items-center w-full my-6 -ml-1.5">
                    <div class="w-1/12 z-10">
                        <div class="w-3.5 h-3.5 bg-amber-500 rounded-full"></div>
                    </div>
                    <div class="w-11/12">
                        <p class="text-sm">
                            Connected with <a href="#" class="text-amber-500 font-bold">Colby Covington</a>.</p>
                        <p class="text-xs text-gray-500">15 min ago</p>
                    </div>
                </div>
                <!-- end::Timeline item -->

                <!-- start::Timeline item -->
                <div class="flex items-center w-full my-6 -ml-1.5">
                    <div class="w-1/12 z-10">
                        <div class="w-3.5 h-3.5 bg-amber-500 rounded-full"></div>
                    </div>
                    <div class="w-11/12">
                        <p class="text-sm">Invoice <a href="#" class="text-amber-500 font-bold">#4563</a> was created.</p>
                        <p class="text-xs text-gray-500">57 min ago</p>
                    </div>
                </div>
                <!-- end::Timeline item -->

                <!-- start::Timeline item -->
                <div class="flex items-center w-full my-6 -ml-1.5">
                    <div class="w-1/12 z-10">
                        <div class="w-3.5 h-3.5 bg-amber-500 rounded-full"></div>
                    </div>
                    <div class="w-11/12">
                        <p class="text-sm">
                            Message received from <a href="#" class="text-amber-500 font-bold">Cecilia Hendric</a>.</p>
                        <p class="text-xs text-gray-500">1 hour ago</p>
                    </div>
                </div>
                <!-- end::Timeline item -->

                <!-- start::Timeline item -->
                <div class="flex items-center w-full my-6 -ml-1.5">
                    <div class="w-1/12 z-10">
                        <div class="w-3.5 h-3.5 bg-amber-500 rounded-full"></div>
                    </div>
                    <div class="w-11/12">
                        <p class="text-sm">New order received <a href="#" class="text-amber-500 font-bold">#OR9653</a>.</p>
                        <p class="text-xs text-gray-500">2 hours ago</p>
                    </div>
                </div>
                <!-- end::Timeline item -->

                <!-- start::Timeline item -->
                <div class="flex items-center w-full my-6 -ml-1.5">
                    <div class="w-1/12 z-10">
                        <div class="w-3.5 h-3.5 bg-amber-500 rounded-full"></div>
                    </div>
                    <div class="w-11/12">
                        <p class="text-sm">
                            Message received from <a href="#" class="text-amber-500 font-bold">Jane Stillman</a>.</p>
                        <p class="text-xs text-gray-500">2 hours ago</p>
                    </div>
                </div>
                <!-- end::Timeline item -->
            </div>
        </div>
    </div>
</div>
