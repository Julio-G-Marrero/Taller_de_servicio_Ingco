@extends('layouts.app');

@section('titulo')
   Garantías
@endsection

@section('contenido')
<div class="flex items-center justify-between">
    <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">Garantías</p>
    {{-- <div class="py-3 px-4 flex items-center text-sm font-medium leading-none text-gray-600 bg-gray-200 hover:bg-gray-300 cursor-pointer rounded">
        <p>Ordenar por:</p>
        <select aria-label="select" class="focus:text-amber-600 focus:outline-none bg-transparent ml-1">
            <option class="text-sm focus:text-amber-600 ">Ultima</option>
            <option class="text-sm focus:text-amber-600 ">Mas antiguas</option>
            <option class="text-sm focus:text-amber-600 ">Pendientes</option>
            <option class="text-sm focus:text-amber-600 ">Completas</option>

        </select>
    </div> --}}
</div>
<div class="mt-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 mb-4">
    <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
       <div class="flex items-center">
          <div class="flex-shrink-0">
             <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">40</span>
             <h3 class="text-base font-normal text-gray-500">Ordenes Activas</h3>
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
             <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">8</span>
             <h3 class="text-base font-normal text-gray-500">Ordenes Pte Revision</h3>
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
             <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">850</span>
             <h3 class="text-base font-normal text-gray-500">Ordenes Cerradas</h3>
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
<main>
    <livewire:mostrar-garantias />
</main>
<script src="./index.js"></script>
<style>.checkbox:checked + .check-icon {
      display: flex;
    }
    </style>
            <script>function dropdownFunction(element) {
                    var dropdowns = document.getElementsByClassName("dropdown-content");
                    var i;
                    let list = element.parentElement.parentElement.getElementsByClassName("dropdown-content")[0];
                    list.classList.add("target");
                    for (i = 0; i < dropdowns.length; i++) {
                        if (!dropdowns[i].classList.contains("target")) {
                            dropdowns[i].classList.add("hidden");
                        }
                    }
                    list.classList.toggle("hidden");
                }</script>
@endsection