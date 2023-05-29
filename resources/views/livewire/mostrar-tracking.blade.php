<div>
    <div class="bg-white shadow  rounded-lg p-4 min-h-full sm:p-6  row-span-3  ajuste-orden-track desactivar-barra-scroll">
        <div class="relative px-4 ">
            <div class="flex justify-between">
                <h4 class="text-xl font-normal text-gray-900 ">Cronología @if ($estatuId == 4)
                    <span class="font-medium">Presupuesto</span>
                    @elseif ($estatuId == 6)
                    <span class="font-medium">Reparación</span>
                @endif</h4>
                @if(auth()->user()->role_id != 1) 
                    <div>
                        @if (auth()->user()->role_id == 4)
                            <a class="flex justify-between items-center" href="{{route('ordenes.mensajes-centro',$Ordenid )}}">
                                <p class="mr-2">Chat</p>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z"></path>
                                </svg>
                            </a>
                            @else
                            <a class="flex justify-between items-center" href="{{route('ordenes.mensajes',$Ordenid )}}">
                                <p class="mr-2">Chat</p>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z"></path>
                                </svg>
                            </a>
                        @endif

                    </div>
                @else

                @endif
            </div>
            <div wire:poll class="maxima-altura-arregrlo  mt-2 overflow-scroll overflow-x-hidden pl-3">
                <div class="absolute h-full border border-dashed border-opacity-20 border-secondary"></div>
                    <!-- start::Timeline item -->
                    <div class="flex items-center w-full my-6 -ml-1.5">
                        <div class="w-1/12 z-10">
                            <div class="w-3.5 mr-2 h-3.5 bg-amber-500 rounded-full"></div>
                        </div>
                        <div class="w-11/12 -ml-2">
                            <p class="text-sm">La orden fue registrada el <span class="font-bold">{{$fechaCreada}}</span></p>
                            <p class="text-xs text-gray-500">{{$fechaCreada->diffForHumans()}}</p>
                        </div>
                    </div>
                    <!-- end::Timeline item -->         
                    @if ($estatuId == 4)
                        @foreach ($trackingPresupuesto as $tracking)
                            <!-- start::Timeline item -->
                            <div class="flex items-center w-full my-6 -ml-1.5">
                                <div class="w-1/12 z-10">
                                    <div class="w-3.5 mr-2 h-3.5 bg-amber-500 rounded-full"></div>
                                </div>
                                <div class="w-11/12 -ml-2">
                                    <p class="text-start"><span class="font-medium">${{$tracking->costo}}</span> - {{$tracking->descripcion}}</p>
                                    <p class="text-xs text-gray-500">{{$tracking->created_at->diffForHumans()}}</p>
                                </div>
                            </div>
                            <!-- end::Timeline item -->
                            @if(!empty($tracking->evidencia))
                            <img src="{{asset('storage/ordenes'. $tracking->evidencia )}}" alt="">
                                <img id="myImg" class="max-h-72 ml-16 mt-2" style="width:100%;max-width:300px" src="{{asset('storage/ordenes/' . $tracking->evidencia)}}" alt="Evidencia">
                                <!-- Trigger the Modal -->

                                <!-- The Modal -->
                                <div id="myModal" class="modal mt-32 pb-8">

                                <!-- The Close Button -->
                                <span class="close">&times;</span>

                                <!-- Modal Content (The Image) -->
                                <img class="modal-content" id="img01">

                                <!-- Modal Caption (Image Text) -->
                                <div id="caption"></div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        @foreach ($trackingRestauracion as $tracking)
                            <!-- start::Timeline item -->
                            <div class="flex items-center w-full my-6 -ml-1.5">
                                <div class="w-1/12 z-10">
                                    <div class="w-3.5 mr-2 h-3.5 bg-amber-500 rounded-full"></div>
                                </div>
                                <div class="w-11/12 -ml-2">
                                    <p class="text-start"><span class="font-medium">${{$tracking->costo}}</span> - {{$tracking->descripcion}}</p>
                                    <p class="text-xs text-gray-500">{{$tracking->created_at->diffForHumans()}}</p>
                                </div>
                            </div>
                            <!-- end::Timeline item -->
                            @if(!empty($tracking->evidencia))
                            <img src="{{asset('storage/ordenes'. $tracking->evidencia )}}" alt="">
                                <img id="myImg" class="max-h-72 ml-16 mt-2" style="width:100%;max-width:300px" src="{{asset('storage/ordenes/' . $tracking->evidencia)}}" alt="Evidencia">
                                <!-- Trigger the Modal -->

                                <!-- The Modal -->
                                <div id="myModal" class="modal mt-32 pb-8">

                                <!-- The Close Button -->
                                <span class="close">&times;</span>

                                <!-- Modal Content (The Image) -->
                                <img class="modal-content" id="img01">

                                <!-- Modal Caption (Image Text) -->
                                <div id="caption"></div>
                                </div>
                            @endif
                        @endforeach  
                    @endif           
            </div>
        </div>

        {{-- <div class="relative  mt-96 ">        
            @if($evidencia)
                <div clas="my-3">
                    <img class="w-20" src="{{$evidencia->temporaryUrl()}}" alt="imagen servidor">
                </div>
            @endif
        </div> --}}
        @if($estatuId == 11)
            <p class="text-center  text-red-400 hover:underline cursor-pointer">La orden esta cerrada</p>
        @else
            @if(auth()->user()->role_id == 4) 
                @if ($estatuId == 4 || $estatuId == 6)   
                    <form wire:submit.prevent='registrarTracking' class="fix_registrarTracking">
                        <div class="flex ajuste-tracking flex-row items-center h-16 rounded-xl bg-white w-full ">
                            {{-- @if($evidencia)
                                <div clas="my-3">
                                    <img class="w-40" src="{{$evidencia->temporaryUrl()}}" alt="imagen servidor">
                                </div>
                            @else
                                <div class="flex justify-center">
                                
                                    <label for="evidencia" class=" mt-4 cursor-pointer">
                                        <input 
                                        type="file" 
                                        accept="image/*" 
                                        class="hidden" 
                                        id="evidencia" 
                                        wire:model='evidencia'>
                                        <svg class="w-5 h-5" fill="none" class="text-gray-400 hover:text-gray-600" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                                        </svg>                       
                                    </label>
                                </div>
                            @endif --}}
                            <div class="flex-grow ml-4">
                                <label for="descripcion" class="text-sm text-gray-400">Descripción</label>
                
                                <div class="relative w-full">
                                    <input 
                                    type="text"
                                    id="descripcion"
                                    wire:model='descripcion'
                                    value="{{old('descripcion')}}"
                                    class="flex w-full border sm:text-xs md:text-sm lg:text-base rounded-xl focus:outline-none focus:border-amber-300 pl-4 h-10
                                    @error('descripcion') 
                                    border-red-500
                                    @enderror ">
                                </div>
                            </div>
                            {{-- <div class="m ml-4">
                                <label for="action_id" class="text-sm text-gray-400 flex justify-center">Accion</label>
                                <div class="  
                                @error('action_id') 
                                border-red-500
                                @enderror  inline-flex border rounded-xl justify-center b">
                                    <select wire:model="action_id" class="rounded-xl sm:text-xs md:text-sm lg:text-base" id="action_id">
                                        <option value="">--Seleccione--</option>
                                        @foreach ($actions as $action)
                                            <option value="{{$action->id}}">{{$action->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                            <div class="m ml-4 w-28">
                                <label for="costo" class="text-sm sm:text-xs md:text-sm lg:text-base text-gray-400 flex justify-center">Costo</label>
                                <input 
                                type="number"
                                id="costo"
                                wire:model='costo'
                                placeholder="$"
                                value="{{old('costo')}}"
                                class="flex w-full border rounded-xl focus:outline-none  pl-4 h-10
                                @error('costo') 
                                border-red-500
                                @enderror ">
                            </div>
                            <div class="ml-4 fix_registrarTracking_btn">
                                <input type="submit" class="border sm:text-xs md:text-sm lg:text-base cursor-pointer items-center justify-center h-10 mt-4 bg-amber-500 hover:bg-amber-600 rounded-xl text-white px-4 py-1 flex-shrink-0 al align-c" value="Guardar">
                            </div>
                        </div>
                    </form>
                    @else 
                    <p class="text-center">Tracking desactivado.</p>
                @endif
                @else
                    <p class="text-center">Tracking No disponible.</p>

            @endif
        @endif

    </div>
</div>
@push('scripts')
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
        modal.style.display = "none";
        }
    </script>
@endpush