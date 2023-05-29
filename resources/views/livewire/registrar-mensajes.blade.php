<div>        
    <div class="flex antialiased text-gray-800">
        <div class="flex flex-row w-full  overflow-x-hidden overflow-y-hidden desactivar-barra-scroll">
            <div class="flex flex-col flex-auto p-6">
                <div class="flex flex-col flex-auto flex-shrink-0 rounded-2xl bg-gray-100 justify-between p-4 max-h-screen overflow-scroll desactivar-barra-scroll maxima-altura-arregrlo">
                    <div class="flex flex-col  overflow-x-auto mb-4">
                        <div class="flex flex-col">
                            <div class="grid grid-cols-12 gap-y-2"  wire:poll>
                                @if(empty($mensajes[0]))
                                    <div class="text-center mt-3 p-5 text-sm bg-amber-100 py-2 px-4 shadow rounded-xl w-full col-span-12">
                                        Aun no hay mensajes, se el primero en enviar uno.
                                    </div>                           
                                @endif
                                @foreach ($mensajes as $mensaje)
                                    @if ($mensaje->user_id == auth()->user()->id)
                                        <div class="col-start-6 col-end-13 p-3 rounded-lg">
                                            <div class="flex items-start justify-start  flex-row-reverse">
                                                <div class="flex items-center justify-center h-10 w-10 rounded-full  font-semibold text-white bg-amber-500 flex-shrink-0">
                                                    {{$mensaje->remitente[0]}}
                                                </div>
                                                <div class="relative mr-3 text-sm bg-amber-100 py-2 px-4 shadow rounded-xl">
                                                    <div>{{$mensaje->mensaje}}</div>
                                                </div>
                                            </div>
                                        </div>  
                                        @if ($mensaje->multimedia)
                                            <div class="col-start-6 col-end-13 p-3 rounded-lg">
                                                <div class="flex items-center justify-start flex-row-reverse">
                                                    <div class="flex items-center justify-center h-10 w-10 rounded-full  font-semibold text-white bg-amber-500 flex-shrink-0">
                                                        {{$mensaje->remitente[0]}}
                                                    </div>
                                                    <div class="relative mr-3 text-sm bg-amber-100 py-2 px-4 shadow rounded-xl">
                                                        <img class="w-80 mt-2" src="{{asset('storage/ordenes' . $mensaje->multimedia)}}" alt="img orden">
                                                        <div>{{$mensaje->mensaje}}</div>
                                                   </div>
                                                </div>
                                            </div>
                                        @endif
                                    @else
                                        <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                            <div class="flex flex-row items-center">
                                                <div class="flex items-center justify-center h-10 w-10 rounded-full  font-semibold text-white bg-amber-500 flex-shrink-0">
                                                    {{$mensaje->remitente[0]}}
                                                </div>
                                                <div class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl">
                                                    <div class=" text-xs font-medium">{{$mensaje->remitente}}</div>
                                                    <div>{{$mensaje->mensaje}}</div>
                                                    <div class="text-xs">{{$mensaje->created_at->diffForHumans()}}</div>

                                                </div>
                                            </div>
                                        </div> 
                                        @if ($mensaje->multimedia)
                                        <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                            <div class="flex flex-row items-center">
                                                <div class="flex items-center justify-center h-10 w-10 rounded-full  font-semibold text-white bg-amber-500 flex-shrink-0">
                                                    {{$mensaje->remitente[0]}}
                                                </div>
                                                <div class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl">
                                                    <div class=" text-xs font-medium">{{$mensaje->remitente}}</div>
                                                    <img class="w-80 mt-2" src="{{asset('storage/ordenes' . $mensaje->multimedia)}}" alt="img orden">
                                                    <div>{{$mensaje->mensaje}}</div>
                                               </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endif
                                @endforeach
                                @if($multimedia)
                                    <div class="col-start-6 col-end-13 p-3 rounded-lg">
                                        <div class="flex  justify-start flex-row-reverse">
                                            <div class=" text-xs font-medium">{{$mensaje->remitente}}</div>
                                            <div class="my-3 w-80">
                                                    Imagen a envair:
                                                    <img src="{{$multimedia->temporaryUrl()}}" alt="imagen servidor">
                                            </div>
                                        </div>
                                    </div> 
                                @endif

                            </div>
                        </div>
                    </div> 
                    <form wire:submit.prevent='envairMensaje'>
                        <div class="flex flex-row items-center h-16 rounded-xl bg-white w-full px-4">
                            <div>
                                <div class="">
                                    <label for="multimedia" class=" mt-4 cursor-pointer">
                                        <input 
                                        type="file" 
                                        accept="image/*" 
                                        class="hidden" 
                                        id="multimedia" 
                                        wire:model='multimedia'>
                                        <svg class="w-5 h-5" class="text-gray-400 hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                                        </svg>                       
                                    </label>
                                </div>
                            </div>
                            <div class="flex-grow ml-4">    
                                <div class="relative w-full">
                                    <input 
                                    type="text"
                                    id="mensaje"
                                    wire:model='mensaje'
                                    value="{{old('mensaje')}}"
                                    class="flex w-full border rounded-xl focus:outline-none focus:border-amber-300 pl-4 h-10
                                    @error('mensaje') 
                                    border-red-500
                                    @enderror ">
                                </div>
                            </div>
                            <div  class="ml-4">
                                <input type="submit" class="border cursor-pointer items-cente h-10  bg-amber-500 hover:bg-amber-600 rounded-xl text-white px-4 py-1 flex-shrink-0" value="Enviar">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
