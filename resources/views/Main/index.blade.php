@extends('layouts.main-user');

@section('titulo')
    Inicio
@endsection

@section('bedore-content')
<div class=" bg-gray-50">
    <div class="lg:h-3/5 h-2/5">
        <swiper-container class="mySwiper" pagination="true" pagination-clickable="true" navigation="true" space-between="30"
        loop="true">
            <swiper-slide class="flex items-center content-center"><img src="{{asset('img/ingco_banner01.jpg')}}" alt=""></swiper-slide>
            <swiper-slide class="flex items-center content-center"><img src="{{asset('img/ingco_banner02.jpg')}}" alt=""></swiper-slide>
            <swiper-slide class="flex items-center content-center"><img src="{{asset('img/ingco_banner0123.png')}}" alt=""></swiper-slide>
            <swiper-slide class="flex items-center content-center"><img src="{{asset('img/ingco_banner00.png')}}" alt=""></swiper-slide>
            {{-- <swiper-slide><img src="{{asset('img/ingco_banner.jpg')}}" alt=""></swiper-slide>
            <swiper-slide><img src="{{asset('ingco_banner')}}" alt=""></swiper-slide>
            <swiper-slide><img src="{{asset('ingco_banner')}}" alt=""></swiper-slide>
            <swiper-slide><img src="{{asset('ingco_banner')}}" alt=""></swiper-slide>
            <swiper-slide><img src="{{asset('ingco_banner')}}" alt=""></swiper-slide> --}}
        </swiper-container>
    </div>
@endsection

@section('contenido')
    <div class=" sm:px-5 lg:px-20 2xl:px-28 pt-5 w-full h-auto mb-10 bg-gray-50 relative overflow-y-auto ">
        <div class="p-4 mt-10 mb-10 mx-auto flex items-center  justify-center flex-col max-w-3xl">
            <h2 class=" text-3xl mb-3">INGCO</h2>
            <p class="leading-7 italic font-light font-sans text-lg text-center">Líder mundial en herramientas, operando en 180 países, segundo lugar mundial en ventas de herramientas, maquinaria, jardinería, equipos de seguridad y medición. Fabricante de herramienta de alta calidad, Industrial y Profesional. </p>
        </div>
        <div class="">

        </div>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>

</div>

@endsection