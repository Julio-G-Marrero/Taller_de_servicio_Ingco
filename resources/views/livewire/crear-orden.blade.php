<div>
<section class="py-10">
    <div class="mx-auto container max-w-2xl md:w-3/4 shadow-md">
        <div class="bg-gray-100 p-4 border-t-2 bg-opacity-5 border-amber-400 rounded-t">
            <div class="max-w-sm mx-auto md:w-full md:mx-0">
                <div class="inline-flex items-center space-x-4">
                <img
                    class=" h-10"
                    src="{{asset('img/letras_naran_617x.png')}}" alt="ingco logo"
                    >

                <h1 class="text-gray-600">Registra una orden</h1>
                </div>
            </div>
        </div>
        <form wire:submit.prevent='crearOrden'>
            <div class="bg-white space-y-6">
                <div class="md:inline-flex  space-y-4 md:space-y-0  w-full p-4 text-gray-500 items-center">
                    <h2 class="md:w-1/3 mx-auto max-w-sm">Información Personal</h2>
                    <div class="md:w-2/3 mx-auto max-w-sm space-y-5">
                        <div>
                            <label for="nombre" class="text-sm text-gray-400">Nombre Completo</label>
                            <div class="w-full inline-flex border">
                                <div class="w-1/12 pt-2 bg-gray-100">
                                    <svg
                                    fill="none"
                                    class="w-6 text-gray-400 mx-auto"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                    />
                                    </svg>
                                </div>
                                <input
                                    id="nombre"
                                    wire:model="nombre"
                                    type="text"
                                    value="{{old('nombre')}}"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    placeholder="Tu nombre"
                                />
                            </div>
                            @error('nombre')
                                <livewire:mostrar-alerta :message="$message" />
                            @enderror
                        </div>
                        <div>
                            <label for="apellidos" class="text-sm text-gray-400">Apellidos</label>
                            <div class="w-full inline-flex border">
                                <div class="w-1/12 pt-2 bg-gray-100">
                                    <svg
                                    fill="none"
                                    class="w-6 text-gray-400 mx-auto"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                    />
                                    </svg>
                                </div>
                                <input
                                    id="apellidos"
                                    wire:model="apellidos"
                                    type="text"
                                    value="{{old('apellidos')}}"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    placeholder="Tus Apellidos"
                                />
                            </div>
                            @error('apellidos')
                                <livewire:mostrar-alerta :message="$message" />
                            @enderror
                        </div>
                        <div>
                            <label for="correo_cliente" class="text-sm text-gray-400">Correo electronico del Cliente</label>
                            <div class="w-full inline-flex border">
                                <div class="w-1/12 pt-2 bg-gray-100">
                                    <svg
                                    fill="none"
                                    class="w-6 text-gray-400 mx-auto"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                    />
                                    </svg>
                                </div>
                                <input
                                    id="correo_cliente"
                                    wire:model="correo_cliente"
                                    type="email"
                                    value="{{old('correo_cliente')}}"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    placeholder="Tu email"
                                />
                            </div>
                            @error('apellidos')
                                <livewire:mostrar-alerta :message="$message" />
                            @enderror
                        </div>
                        <div>
                            <label for="tel" class="text-sm text-gray-400">Numero Tel.</label>
                            <div class="w-full inline-flex border">
                                <div class="pt-2 w-1/12 bg-gray-100">
                                    <svg
                                    fill="none"
                                    class="w-6 text-gray-400 mx-auto"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"
                                    />
                                    </svg>
                                </div>
                                <input
                                    id="tel"
                                    wire:model="tel"
                                    type="number"
                                    value="{{old('tel')}}"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    placeholder="84440000"
                                />
                            </div>
                            @error('tel')
                                <livewire:mostrar-alerta :message="$message" />
                            @enderror
                        </div>
                        <div>
                            <label for="direccion" class="text-sm text-gray-400">Dirección</label>
                            <div class="w-full inline-flex border">
                                <div class="pt-2 w-1/12 bg-gray-100">
                                    <svg                     fill="none"
                                    class="w-6 text-gray-400 mx-auto"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z" />
                                        </svg>
                                </div>
                                <input
                                    id="direccion"
                                    wire:model="direccion"
                                    value="{{old('direccion')}}"
                                    type="text"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    placeholder="Calle y numero"
                                />
                            </div>
                            @error('direccion')
                                <livewire:mostrar-alerta :message="$message" />
                            @enderror
                        </div>
                        <div>
                            <label for="ciudad" class="text-sm text-gray-400">Ciudad</label>
                            <div class="w-full inline-flex border">
                                <div class="pt-2 w-1/12 bg-gray-100">
                                    <svg                     fill="none"
                                    class="w-6 text-gray-400 mx-auto"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z" />
                                        </svg>
                                </div>
                                <input
                                    id="ciudad"
                                    wire:model="ciudad"
                                    value="{{old('ciudad')}}"
                                    type="text"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    placeholder="La ciudad"
                                />
                            </div>
                            @error('ciudad')
                                <livewire:mostrar-alerta :message="$message" />
                            @enderror
                        </div>
                        <div>
                            <label for="estado" class="text-sm text-gray-400">Estado</label>
                            <div class="w-full inline-flex border">
                                <div class="pt-2 w-1/12 bg-gray-100">
                                    <svg                     
                                    fill="none"
                                    class="w-6 text-gray-400 mx-auto"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z" />
                                        </svg>
                                </div>
                                <input
                                    id="estado"
                                    wire:model="estado"
                                    value="{{old('estado')}}"
                                    type="text"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    placeholder="El Estado"
                                />
                            </div>
                            @error('estado')
                                <livewire:mostrar-alerta :message="$message" />
                            @enderror
                        </div>
                        <div>
                            <label for="giro_comercial" class="text-sm text-gray-400">Giro Comercial</label>
                            <div class="w-full inline-flex border">
                                <div class="pt-2 w-1/12 bg-gray-100">
                                <svg 
                                fill="none"
                                class="w-6 text-gray-400 mx-auto"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 00-3.7-3.7 48.678 48.678 0 00-7.324 0 4.006 4.006 0 00-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3l-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 003.7 3.7 48.656 48.656 0 007.324 0 4.006 4.006 0 003.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3l-3 3" />
                                    </svg>
                                </div>
                                <input
                                    id="giro_comercial"
                                    wire:model="giro_comercial"
                                    value="{{old('giro_comercial')}}"
                                    type="text"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    placeholder="El giro comercial"
                                />
                            </div>
                            @error('giro_comercial')
                                <livewire:mostrar-alerta :message="$message" />
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <div class="md:inline-flex  space-y-4 md:space-y-0  w-full p-4 text-gray-500 items-center">
                    <h2 class="md:w-1/3 mx-auto max-w-sm">Información Compra</h2>
                    <div class="md:w-2/3 mx-auto max-w-sm space-y-5">
                        <div>
                            <label for="tienda_id" class="text-sm text-gray-400">Lugar de Adquisición</label>
                            <div class="w-full inline-flex border">
                                <div class="pt-2 w-1/12 bg-gray-100">
                                    <svg 
                                    class="w-6 text-gray-400 mx-auto"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                                        </svg>
                                </div>
                                <input
                                    id="lugar_de_expedicion"
                                    wire:model="lugar_de_expedicion"
                                    value="{{old('lugar_de_expedicion')}}"
                                    type="text"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    placeholder="Lugar donde se adquirio el equipo"
                                />
                            </div>
                            @error('tienda_id')
                                <livewire:mostrar-alerta :message="$message" />
                            @enderror
                        </div>
                        <div>
                            <label for="lugar_de_expedicion" class="text-sm text-gray-400">Lugar de Expedición</label>
                            <div class="w-full inline-flex border">
                                <div class="pt-2 w-1/12 bg-gray-100">
                                    <svg 
                                    class="w-6 text-gray-400 mx-auto"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                                        </svg>
                                </div>
                                <select wire:model="tienda_id" id="tienda_id">
                                    <option value="">--Seleccione--</option>
                                    @foreach ($tiendas as $tienda)
                                        <option value="{{$tienda->id}}">{{$tienda->tienda}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('lugar_de_expedicion')
                                <livewire:mostrar-alerta :message="$message" />
                            @enderror
                        </div>
                        <div>
                            <label for="folio_compra" class="text-sm text-gray-400">Folio de compra</label>
                            <div class="w-full inline-flex border">
                                <div class="pt-2 w-1/12 bg-gray-100">
                                    <svg 
                                    class="w-6 text-gray-400 mx-auto"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                        </svg>
                                </div>
                                <input
                                    id="folio_compra"
                                    wire:model="folio_compra"
                                    value="{{old('folio_compra')}}"
                                    type="number"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    placeholder="#13546"
                                />
                            </div>
                            @error('folio_compra')
                                <livewire:mostrar-alerta :message="$message" />
                            @enderror
                        </div>
                        <div>
                            <label for="comprobante" class="text-sm text-gray-400">Comprobante</label>
                            <div class="w-full inline-flex border">
                                <div class="pt-2 w-1/12 bg-gray-100">
                                    <svg 
                                    class="w-6 text-gray-400 mx-auto"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                        </svg>
                                </div>
                                <input
                                    id="comprobante"
                                    wire:model="comprobante"
                                    type="file"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    accept="image/*"
                                />
                            </div>
                            <div class="my-5 w-80">
                                @if($comprobante)
                                    Comprobante:
                                    <img src="{{$comprobante->temporaryUrl()}}" alt="imagen servidor">
                                @endif
                            </div>
                            @error('comprobante')
                                <livewire:mostrar-alerta :message="$message" />
                            @enderror
                        </div>
                        <div>
                            <label for="fecha_adquisicion" class="text-sm text-gray-400">Fecha de adquisición</label>
                            <div class="w-full inline-flex border">
                                <div class="pt-2 w-1/12 bg-gray-100">
                                <svg 
                                class="w-6 text-gray-400 mx-auto"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                    </svg>
                                </div>
                                <input
                                    id="fecha_adquisicion"
                                    wire:model="fecha_adquisicion"
                                    value="{{old('fecha_adquisicion')}}"
                                    type="date"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    placeholder="22/12/2022"
                                />
                            </div>
                            @error('fecha_adquisicion')
                                <livewire:mostrar-alerta :message="$message" />
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <div class="md:inline-flex  space-y-4 md:space-y-0  w-full p-4 text-gray-500 items-center">
                    <h2 class="md:w-1/3 mx-auto max-w-sm">Información Producto</h2>
                    <div class="md:w-2/3 mx-auto max-w-sm space-y-5">
                        <div>
                            <label for="descripcion_equipo" class="text-sm text-gray-400">Descripción Del Equipo</label>
                            <div class="w-full inline-flex border">
                                <div class="pt-2 w-1/12 bg-gray-100">
                                    <svg 
                                    class="w-6 text-gray-400 mx-auto"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                        </svg>
                                </div>
                                <input
                                    id="descripcion_equipo"
                                    wire:model="descripcion_equipo"
                                    value="{{old('descripcion_equipo')}}"
                                    type="text"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    placeholder="Que tipo de herramienta es"
                                />
                            </div>
                            @error('descripcion_equipo')
                                <livewire:mostrar-alerta :message="$message" />
                            @enderror
                        </div>
                        <div>
                            <label for="codigo_interno" class="text-sm text-gray-400">Codigo Interno</label>
                            <div class="w-full inline-flex border">
                                <div class="pt-2 w-1/12 bg-gray-100">
                                    <svg 
                                    class="w-6 text-gray-400 mx-auto"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                        </svg>
                                </div>
                                <input
                                    id="codigo_interno"
                                    wire:model="codigo_interno"
                                    value="{{old('codigo_interno')}}"
                                    type="text"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    placeholder="'UAG75028'"
                                />
                            </div>
                            @error('codigo_interno')
                                <livewire:mostrar-alerta :message="$message" />
                            @enderror
                        </div>
                        <div>
                            <label for="numero_serie" class="text-sm text-gray-400">Numero de serie</label>
                            <div class="w-full inline-flex border">
                                <div class="pt-2 w-1/12 bg-gray-100">
                                <svg 
                                class="w-6 text-gray-400 mx-auto"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                    </svg>
                                    
                                    
                                </div>
                                <input
                                    id="numero_serie"
                                    wire:model="numero_serie"
                                    value="{{old('numero_serie')}}"
                                    type="number"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    placeholder="'784584864'"
                                />
                            </div>
                            @error('numero_serie')
                                <livewire:mostrar-alerta :message="$message" />
                            @enderror
                        </div>
                        <div>
                            <label for="accesorios" class="text-sm text-gray-400">Accesorios</label>
                            <div class="w-full inline-flex border">
                                <div class="pt-2 w-1/12 bg-gray-100">
                                    <svg 
                                    class="w-6 text-gray-400 mx-auto"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                    </svg>
                                </div>
                                <input
                                    id="accesorios"
                                    wire:model="accesorios"
                                    value="{{old('accesorios')}}"
                                    type="text"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    placeholder="Los accesorios entregados"
                                />
                            </div>
                            @error('accesorios')
                                <livewire:mostrar-alerta :message="$message" />
                            @enderror
                        </div>
                        <div>
                            <label for="uso_equipo" class="text-sm text-gray-400">Uso del Equipo</label>
                            <div class="w-full inline-flex border">
                                <div class="pt-2 w-1/12 bg-gray-100">
                                    <svg 
                                    class="w-6 text-gray-400 mx-auto"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75a4.5 4.5 0 01-4.884 4.484c-1.076-.091-2.264.071-2.95.904l-7.152 8.684a2.548 2.548 0 11-3.586-3.586l8.684-7.152c.833-.686.995-1.874.904-2.95a4.5 4.5 0 016.336-4.486l-3.276 3.276a3.004 3.004 0 002.25 2.25l3.276-3.276c.256.565.398 1.192.398 1.852z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.867 19.125h.008v.008h-.008v-.008z" />
                                        </svg>
                                </div>
                                <input
                                    id="uso_equipo"
                                    wire:model="uso_equipo"
                                    value="{{old('uso_equipo')}}"
                                    type="text"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    placeholder="El uso del equipo"
                                />
                            </div>
                            @error('uso_equipo')
                                <livewire:mostrar-alerta :message="$message" />
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <div class="md:inline-flex  space-y-4 md:space-y-0  w-full p-4 text-gray-500 items-center">
                    <h2 class="md:w-1/3 mx-auto max-w-sm">Información Solicitud</h2>
                    <div class="md:w-2/3 mx-auto max-w-sm space-y-5">
                        <div>
                            <label for="tipo_application" class="text-sm text-gray-400">Tipo de solicitud</label>
                            <div class="w-full inline-flex border">
                                <div class="pt-2 w-1/12 bg-gray-100">
                                    <svg 
                                    class="w-6 text-gray-400 mx-auto"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75a4.5 4.5 0 01-4.884 4.484c-1.076-.091-2.264.071-2.95.904l-7.152 8.684a2.548 2.548 0 11-3.586-3.586l8.684-7.152c.833-.686.995-1.874.904-2.95a4.5 4.5 0 016.336-4.486l-3.276 3.276a3.004 3.004 0 002.25 2.25l3.276-3.276c.256.565.398 1.192.398 1.852z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.867 19.125h.008v.008h-.008v-.008z" />
                                        </svg>
                                </div>
                                <select wire:model="tipo_application" id="tipo_application">
                                    <option value="">--Seleccione--</option>
                                    <option value="1">Reparación</option>
                                    <option value="2">Garantía</option>
                                </select>
                            </div>
                            @error('tipo_application')
                                <livewire:mostrar-alerta :message="$message" />
                            @enderror
                        </div>
                        <div>
                            <label for="descripcion" class="text-sm text-gray-400">Descripción del indice</label>
                            <div class="w-full inline-flex border">
                                <div class="pt-2 w-1/12 bg-gray-100">
                                    <svg 
                                    fill="none"
                                    class="w-6 text-gray-400 mx-auto"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor" 
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                        </svg>
                                </div>
                                <textarea class="w-11/12 focus:outline-none focus:text-gray-600 p-2" wire:model="descripcion" id="descripcion" cols="30" rows="10"></textarea>
                            </div>
                            @error('descripcion')
                                <livewire:mostrar-alerta :message="$message" />
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <div class="md:inline-flex justify-end space-y-4 md:space-y-0  p-4 text-gray-500 items-center">
                    <input class=" cursor-pointer text-white w-full mx-auto max-w-sm rounded-md text-center bg-amber-400 py-2 px-4 inline-flex items-center focus:outline-none md:float-right" type="submit" value="Registrar">
                </div>
            </div>
        </form>
    </div>
  </section>
</div>
