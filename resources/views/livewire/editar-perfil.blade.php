<div>
    <div class="p-6 flex items-center justify-center">
        <div class="container max-w-screen-lg mx-auto">
            <div>
            <h2 class="font-semibold text-xl text-gray-600 text-center">Editar Perfil</h2>
        
            <div class="bg-white rounded mx-auto shadow-lg p-4 my-10 px-4 md:p-8 mb-6 max-w-md">
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 ">
                    <div class="flex flex-col items-center -mt-16">
                        {{-- <img src="{{asset('img/bruce-mars.jpg')}}" class="w-40 border-4 border-white rounded-full"> --}}
                        <p class="px-4 py-2 mt-5 w-20 h-20 flex justify-center items-center border-4 border-x-amber-500 rounded-full text-3xl uppercase text-amber-500 font-bold">{{auth()->user()->name[0]}}</p>
                        <div class="flex items-center space-x-2 mt-2">
                            <p class="text-2xl capitalize">{{auth()->user()->name}}</p>
                        </div>
                        <p class="text-sm text-gray-500">Registrado {{auth()->user()->created_at->diffForHumans()}} </p>
                    </div>
                    <form wire:submit.prevent='editarPerfil'>
                        <div class="lg:col-span-2">
                            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                            <div class="md:col-span-5">
                                <label for="name">Nombre</label>
                                <input type="text" wire:model="name"  id="name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="Tu nombre" />
                                @error('name')
                                    <livewire:mostrar-alerta :message="$message" />
                                @enderror
                            </div>
                
                            <div class="md:col-span-5">
                                <label for="email">Correo</label>
                                <input type="text" wire:model="email" id="email" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"  placeholder="email@domain.com" />
                                @error('email')
                                    <livewire:mostrar-alerta :message="$message" />
                                @enderror
                            </div>
                
                            <div class="md:col-span-5">
                                <label for="telefono">Telefono</label>
                                <input type="number" wire:model="telefono" id="telefono" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="Tu numero telefonico" />
                                @error('telefono')
                                    <livewire:mostrar-alerta :message="$message" />
                                @enderror
                            </div>
                            {{-- <div class="md:col-span-3">
                                <label for="address">Dirección</label>
                                <input type="text" name="address" id="address" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
                            </div>
                
                            <div class="md:col-span-2">
                                <label for="city">Ciudad</label>
                                <input type="text" name="city" id="city" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
                            </div>
                
                            <div class="md:col-span-2">
                                <label for="country">Pais / región</label>
                                <div class="h-10 bg-gray-50 flex border border-gray-200 rounded items-center mt-1">
                                <input name="country" id="country" placeholder="Pais" class="px-4 appearance-none outline-none text-gray-800 w-full bg-transparent" value="" />
                                <button tabindex="-1" class="cursor-pointer outline-none focus:outline-none transition-all text-gray-300 hover:text-red-600">
                                    <svg class="w-4 h-4 mx-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </button>
                                <button tabindex="-1" for="show_more" class="cursor-pointer outline-none focus:outline-none border-l border-gray-200 transition-all text-gray-300 hover:text-blue-600">
                                    <svg class="w-4 h-4 mx-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"></polyline></svg>
                                </button>
                                </div> 
                            </div>
                
                            <div class="md:col-span-2">
                                <label for="state">Estado / provincia</label>
                                <div class="h-10 bg-gray-50 flex border border-gray-200 rounded items-center mt-1">
                                <input name="state" id="state" placeholder="Estado" class="px-4 appearance-none outline-none text-gray-800 w-full bg-transparent" value="" />
                                <button tabindex="-1" class="cursor-pointer outline-none focus:outline-none transition-all text-gray-300 hover:text-red-600">
                                    <svg class="w-4 h-4 mx-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </button>
                                <button tabindex="-1" for="show_more" class="cursor-pointer outline-none focus:outline-none border-l border-gray-200 transition-all text-gray-300 hover:text-blue-600">
                                    <svg class="w-4 h-4 mx-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"></polyline></svg>
                                </button>
                                </div>
                            </div>
                            
                
                            <div class="md:col-span-1">
                                <label for="zipcode">Codigo Postal</label>
                                <input type="text" name="zipcode" id="zipcode" class="transition-all flex items-center h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="" value="" />
                            </div>
                            --}}
                            <div class="md:col-span-5 mt-3 text-right">
                                <div class="inline-flex items-end">
                                <input type="submit" class="bg-amber-500 hover:cursor-pointer hover:bg-amber-700 text-white font-bold py-2 px-4 rounded" value="Actualizar">
                                </div>
                            </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
