<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Servicio Ingco -@yield('titulo')</title>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        @livewireStyles()
    </head>
    <body>

    <nav class="bg-white ajuste-navegacion fondo-ingco border-b  border-gray-200 fixed z-30 w-full pt-5 pb-5 mb-7">
       <div class="bg-ingco px-3 py-3 lg:px-5 lg:pl-3 bg-r mx-10">
          <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar" class="lg:hidden mr-2 text-white hover:text-gray-900 cursor-pointer p-2 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 rounded">
                   <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                   </svg>
                   <svg id="toggleSidebarMobileClose" class="w-6 h-6 hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                   </svg>
                </button>
                <a href="{{route('inicio')}}"  class="text-xl font-bold flex items-center lg:ml-2.5">
                <img src="{{asset('img/logoingcoservicio.png') }}" class="h-20 mr-2" alt="Logo Ingco">
                <span class="font-normal self-center whitespace-nowrap ajuste-texto-ingco text-white">Taller de Servicio</span>
                </a>

             </div><!--bloque-->
            <div class="fix-nav-elements hidden" aria-label="Sidebar">
                <ul class="flex gap-7" >
                    <li>
                        <a href="{{route('inicio')}}" class="font-bold flex items-center lg:ml-2.5">
                            <span class="font-normal text-base text-white  self-center whitespace-nowrap ajuste-texto-ingco">Inicio</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('sobre-nosotros')}}" class="font-bold flex items-center lg:ml-2.5">
                            <span class="font-normal text-base text-white  self-center whitespace-nowrap ajuste-texto-ingco">Sobre Nosotros</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('garantia')}}" class="font-bold flex items-center lg:ml-2.5">
                            <span class="font-normal text-base text-white  self-center whitespace-nowrap ajuste-texto-ingco">Garantias</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="font-bold flex items-center lg:ml-2.5">
                            <span class="font-normal text-base text-white  self-center whitespace-nowrap ajuste-texto-ingco">Reparaciones</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="font-bold flex items-center lg:ml-2.5">
                            <span class="font-normal text-base text-white  self-center whitespace-nowrap ajuste-texto-ingco">Sucursales</span>
                        </a>
                    </li>
                </ul>
            </div><!--bloque--> 

            <div class="flex items-center  mr-3 ">
                <div class="contenedor-notificaciones mr-3">
                  @auth
                  @switch(auth()->user()->role_id)
                    @case(1)
                    <a href="{{route('cliente-noti-nuevas')}}">                  
                      <div class="relative">
                        <div class="absolute left-0 top-0  bg-red-500 rounded-full">
                           <span class="text-sm text-white p-1">{{auth()->user()->unreadNotifications->count()}}</span>
                        </div>
                        <div class="p-2">
                               <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor"
                            class="text-white w-6 h-6"
                            viewBox="0 0 16 16"
                          >
                            <path
                              d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"
                            />
                          </svg>
                        </div>
                      </div>
                    </a>
                      @break
                  
                    @case(4)
                      <a href="{{route('dashboard-centro-noti-nuevas')}}">                  
                        <div class="relative">
                          <div class="absolute left-0 top-0  bg-red-500 rounded-full">
                             <span class="text-sm text-white p-1">{{auth()->user()->unreadNotifications->count()}}</span>
                          </div>
                          <div class="p-2">
                                 <svg
                              xmlns="http://www.w3.org/2000/svg"
                              fill="currentColor"
                              class="text-white w-6 h-6"
                              viewBox="0 0 16 16"
                            >
                              <path
                                d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"
                              />
                            </svg>
                          </div>
                        </div>
                      </a>
                      @break
                    @default
                    <a href="{{route('dashboard-noti-nuevas')}}">                  
                      <div class="relative">
                        <div class="absolute left-0 top-0  bg-red-500 rounded-full">
                           <span class="text-sm text-white p-1">{{auth()->user()->unreadNotifications->count()}}</span>
                        </div>
                        <div class="p-2">
                               <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor"
                            class="text-white w-6 h-6"
                            viewBox="0 0 16 16"
                          >
                            <path
                              d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"
                            />
                          </svg>
                        </div>
                      </div>
                    </a>
                  @endswitch
                  @endauth
                </div>
                @auth                  
                  @if (auth()->user()->role_id != 1)
                    <a href="{{route('perfil-dashboard')}}">               
                        <div class="contenedor-usuario flex items-center">
                            @auth
                              {{-- IMAGEN USUARIO 
                                <img class="h-8  mr-1 rounded-full " src="{{asset('img/bruce-mars.jpg')}}" alt="userimg"> --}}
                                <p class="text-white mr-2 px-4 py-2 text-lg bg-amber-500  pl rounded-full uppercase font-bold ">{{auth()->user()->name[0]}}</p>

                              <p class="text-white capitalize ">{{auth()->user()->name}}</p>
                            @endauth
                        </div>
                    </a>  
                    @else
                    <a href="{{route('perfil-usuario')}}">               
                      <div class="contenedor-usuario flex items-center">
                          @auth
                            {{-- IMAGEN USUARIO 
                              <img class="h-8  mr-1 rounded-full " src="{{asset('img/bruce-mars.jpg')}}" alt="userimg"> --}}
                              <p class="text-white mr-2 px-4 py-2 text-lg bg-amber-500  pl rounded-full uppercase font-bold ">{{auth()->user()->name[0]}}</p>

                            <p class="text-white capitalize ">{{auth()->user()->name}}</p>
                          @endauth
                      </div>
                  </a>
                  @endif
                @endauth
                @guest
                <a href="{{route('perfil-usuario')}}">               
                  <div class="contenedor-usuario flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 text-white h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"  />
                    </svg>
                  </div>
                </a>
                @endguest
            </div><!--bloque-->
          </div>
       </div>
    </nav>

    <aside id="sidebar" class="fixed hidden z-20 h-full top-0 left-0 pt-16   flex-shrink-0 flex-col w-64 transition-width duration-75" aria-label="Sidebar">
        <div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0">
           <div class="flex-1 flex flex-col pt-6 pb-4 overflow-y-auto"
           style="
              padding-top: 63px;
          ">
              <div class="flex-1 px-3 bg-white divide-y space-y-1">
                 <ul class="space-y-2 pb-2 pt-5">
                   <li>
                      <a href="{{route('inicio')}}" class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                          </svg>
                          
                         <span class="ml-3">Inicio</span>
                      </a>
                   </li>
                   <a href="#">                     
                      <li>
                         <div id="desplegable-ordenes" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                              </svg>
                              
                            <span class="ml-3 flex-1 whitespace-nowrap hover:cursor-pointer">Sobre Nosotros</span>
 
                        </div>
                      </li>
                   </a>

                   <li>
                      <a href="{{route('garantias')}}" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                          </svg>
                          
                         <span class="ml-3 flex-1 whitespace-nowrap">Garantias</span>
                      </a>
                   </li>
                   <li>
                      <a href="{{route('inventario')}}" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group transition duration-75 flex items-center p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" />
                          </svg>
                          
                          <span class="ml-3">Reparaciones</span>
                       </a>
                   </li>
                   <li>
                      <a href="{{route('personal')}}" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group transition duration-75 flex items-center p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                          </svg>
                          
                          <span class="ml-3">Sucursales</span>
                       </a>
                   </li>
                 </ul>
                 @auth
                   
                 <div class="space-y-2 pt-2">
                    <a href="{{route('perfil-usuario')}}" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group transition duration-75 flex items-center p-2">
                      <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                       </svg>
                       <span class="ml-3">Perfil</span>
                    </a>
                    <div>
                      <form method="POST" class="hover:cursor-pointer" action="{{route('logout')}}">
                         @csrf
                         
                         <a class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group transition duration-75 flex items-center p-2" :href="route('logout')"
                                     onclick="event.preventDefault();
                                           this.closest('form').submit();">   
                            <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                               <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-3">Cerrar Sesión</span>    
                         </a>
                      </form>
                    </div>
                 </div>
                 @endauth
                 @guest
                 <div>
                  <a href="{{route('login')}}" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group transition duration-75 flex items-center p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                    </svg>
                    
                      
                      <span class="ml-3">Inicia Sesion</span>
                   </a>
                 </div>
                 @endguest
              </div>
           </div>
        </div>
     </aside>
     <div>
    </div>
    <main class=" mt-28">
       @yield('bedore-content')
      <div class="sm:px-5 mx-auto p-4 lg:px-20 2xl:px-28 pt-5 w-full h-auto  bg-gray-50 relative overflow-y-auto ">
        @yield('contenido')
      </div>
     </main>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <footer class="relative text-white fondo-ingco bg-blueGray-200 pt-8 pb-6">
        <div class="container mx-auto px-4">
          <div class="flex flex-wrap text-left lg:text-left">
            <div class="w-full lg:w-6/12 px-4">
              <h4 class="text-3xl fonat-semibold text-blueGray-700">Sistema de Garantias Ingco</h4>
              <h5 class="text-lg mt-0 mb-2 text-blueGray-600">Encuéntranos y conócenos en cualquiera de estas plataformas.</h5>
              <div class="mt-6 lg:mb-0 mb-6">
                {{-- <button class="bg-white text-lightBlue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                  <i class="fab fa-twitter"></i></button><button class="bg-white text-lightBlue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                  <i class="fab fa-facebook-square"></i></button><button class="bg-white text-pink-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                  <i class="fab fa-dribbble"></i></button><button class="bg-white text-blueGray-800 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                  <i class="fab fa-github"></i>
                </button> --}}
                <div class="flex gap-4 justify-start my-4 ">
                    <!--FACEBOOK ICON-->
                    <div class="border hover:bg-[#1877f2] w-12 h-12 fill-[#1877f2] hover:fill-white border-blue-200 rounded-full flex items-center justify-center shadow-xl hover:shadow-blue-500/50 cursor-pointer">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M13.397 20.997v-8.196h2.765l.411-3.209h-3.176V7.548c0-.926.258-1.56 1.587-1.56h1.684V3.127A22.336 22.336 0 0 0 14.201 3c-2.444 0-4.122 1.492-4.122 4.231v2.355H7.332v3.209h2.753v8.202h3.312z"></path>
                      </svg>
                    </div>
                    <!--TWITTER ICON-->
                    <div class="border hover:bg-[#1d9bf0] w-12 h-12 fill-[#1d9bf0] hover:fill-white border-blue-200 rounded-full flex items-center justify-center shadow-xl hover:shadow-sky-500/50 cursor-pointer">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M19.633 7.997c.013.175.013.349.013.523 0 5.325-4.053 11.461-11.46 11.461-2.282 0-4.402-.661-6.186-1.809.324.037.636.05.973.05a8.07 8.07 0 0 0 5.001-1.721 4.036 4.036 0 0 1-3.767-2.793c.249.037.499.062.761.062.361 0 .724-.05 1.061-.137a4.027 4.027 0 0 1-3.23-3.953v-.05c.537.299 1.16.486 1.82.511a4.022 4.022 0 0 1-1.796-3.354c0-.748.199-1.434.548-2.032a11.457 11.457 0 0 0 8.306 4.215c-.062-.3-.1-.611-.1-.923a4.026 4.026 0 0 1 4.028-4.028c1.16 0 2.207.486 2.943 1.272a7.957 7.957 0 0 0 2.556-.973 4.02 4.02 0 0 1-1.771 2.22 8.073 8.073 0 0 0 2.319-.624 8.645 8.645 0 0 1-2.019 2.083z"></path>
                      </svg>
                    </div>
                    <!--INSTAGRAM ICON-->
                    <div class="border hover:bg-[#bc2a8d] w-12 h-12 fill-[#bc2a8d] hover:fill-white border-pink-200 rounded-full flex items-center justify-center shadow-xl hover:shadow-pink-500/50 cursor-pointer">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M11.999 7.377a4.623 4.623 0 1 0 0 9.248 4.623 4.623 0 0 0 0-9.248zm0 7.627a3.004 3.004 0 1 1 0-6.008 3.004 3.004 0 0 1 0 6.008z"></path>
                        <circle cx="16.806" cy="7.207" r="1.078"></circle>
                        <path d="M20.533 6.111A4.605 4.605 0 0 0 17.9 3.479a6.606 6.606 0 0 0-2.186-.42c-.963-.042-1.268-.054-3.71-.054s-2.755 0-3.71.054a6.554 6.554 0 0 0-2.184.42 4.6 4.6 0 0 0-2.633 2.632 6.585 6.585 0 0 0-.419 2.186c-.043.962-.056 1.267-.056 3.71 0 2.442 0 2.753.056 3.71.015.748.156 1.486.419 2.187a4.61 4.61 0 0 0 2.634 2.632 6.584 6.584 0 0 0 2.185.45c.963.042 1.268.055 3.71.055s2.755 0 3.71-.055a6.615 6.615 0 0 0 2.186-.419 4.613 4.613 0 0 0 2.633-2.633c.263-.7.404-1.438.419-2.186.043-.962.056-1.267.056-3.71s0-2.753-.056-3.71a6.581 6.581 0 0 0-.421-2.217zm-1.218 9.532a5.043 5.043 0 0 1-.311 1.688 2.987 2.987 0 0 1-1.712 1.711 4.985 4.985 0 0 1-1.67.311c-.95.044-1.218.055-3.654.055-2.438 0-2.687 0-3.655-.055a4.96 4.96 0 0 1-1.669-.311 2.985 2.985 0 0 1-1.719-1.711 5.08 5.08 0 0 1-.311-1.669c-.043-.95-.053-1.218-.053-3.654 0-2.437 0-2.686.053-3.655a5.038 5.038 0 0 1 .311-1.687c.305-.789.93-1.41 1.719-1.712a5.01 5.01 0 0 1 1.669-.311c.951-.043 1.218-.055 3.655-.055s2.687 0 3.654.055a4.96 4.96 0 0 1 1.67.311 2.991 2.991 0 0 1 1.712 1.712 5.08 5.08 0 0 1 .311 1.669c.043.951.054 1.218.054 3.655 0 2.436 0 2.698-.043 3.654h-.011z"></path>
                      </svg>
                    </div>
        
                    <!--WHATSAPP ICON-->
                    <div class="border hover:bg-[#25D366] w-12 h-12 fill-[#25D366] hover:fill-white border-green-200 rounded-full flex items-center justify-center shadow-xl hover:shadow-green-500/50 cursor-pointer">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M18.403 5.633A8.919 8.919 0 0 0 12.053 3c-4.948 0-8.976 4.027-8.978 8.977 0 1.582.413 3.126 1.198 4.488L3 21.116l4.759-1.249a8.981 8.981 0 0 0 4.29 1.093h.004c4.947 0 8.975-4.027 8.977-8.977a8.926 8.926 0 0 0-2.627-6.35m-6.35 13.812h-.003a7.446 7.446 0 0 1-3.798-1.041l-.272-.162-2.824.741.753-2.753-.177-.282a7.448 7.448 0 0 1-1.141-3.971c.002-4.114 3.349-7.461 7.465-7.461a7.413 7.413 0 0 1 5.275 2.188 7.42 7.42 0 0 1 2.183 5.279c-.002 4.114-3.349 7.462-7.461 7.462m4.093-5.589c-.225-.113-1.327-.655-1.533-.73-.205-.075-.354-.112-.504.112s-.58.729-.711.879-.262.168-.486.056-.947-.349-1.804-1.113c-.667-.595-1.117-1.329-1.248-1.554s-.014-.346.099-.458c.101-.1.224-.262.336-.393.112-.131.149-.224.224-.374s.038-.281-.019-.393c-.056-.113-.505-1.217-.692-1.666-.181-.435-.366-.377-.504-.383a9.65 9.65 0 0 0-.429-.008.826.826 0 0 0-.599.28c-.206.225-.785.767-.785 1.871s.804 2.171.916 2.321c.112.15 1.582 2.415 3.832 3.387.536.231.954.369 1.279.473.537.171 1.026.146 1.413.089.431-.064 1.327-.542 1.514-1.066.187-.524.187-.973.131-1.067-.056-.094-.207-.151-.43-.263"></path>
                      </svg>
                    </div>
        
                    <!--TELEGRAM ICON-->
                    <div class="border hover:bg-[#229ED9] w-12 h-12 fill-[#229ED9] hover:fill-white border-sky-200 rounded-full flex items-center justify-center shadow-xl hover:shadow-sky-500/50 cursor-pointer">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="m20.665 3.717-17.73 6.837c-1.21.486-1.203 1.161-.222 1.462l4.552 1.42 10.532-6.645c.498-.303.953-.14.579.192l-8.533 7.701h-.002l.002.001-.314 4.692c.46 0 .663-.211.921-.46l2.211-2.15 4.599 3.397c.848.467 1.457.227 1.668-.785l3.019-14.228c.309-1.239-.473-1.8-1.282-1.434z"></path>
                      </svg>
                    </div>
                  </div>
                </div>
            </div>
            <div class="w-full lg:w-6/12 px-4 text-center md:text-left">
              <div class="flex flex-wrap items-top mb-6">
                <div class="w-full lg:w-4/12 ml-auto">
                  <span class="block uppercase text-blueGray-500 text-sm font-bold mb-2">Conócenos</span>
                  <ul class="list-unstyled">
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://www.creative-tim.com/presentation?ref=njs-profile">Sobre Nosotros</a>
                    </li>
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://blog.creative-tim.com?ref=njs-profile">Blog</a>
                    </li>
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://www.github.com/creativetimofficial?ref=njs-profile">Sucursales</a>
                    </li>
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://www.creative-tim.com/bootstrap-themes/free?ref=njs-profile">Tienda Online</a>
                    </li>
                  </ul>
                </div>
                <div class="w-full lg:w-4/12">
                  <span class="block uppercase text-blueGray-500 text-sm font-bold mb-2">Otros Aspectos</span>
                  <ul class="list-unstyled">
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://github.com/creativetimofficial/notus-js/blob/main/LICENSE.md?ref=njs-profile">Certificaciones de distribución</a>
                    </li>
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://creative-tim.com/terms?ref=njs-profile">Terminos &amp; Condiciones</a>
                    </li>
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://creative-tim.com/privacy?ref=njs-profile">Política de privacidad</a>
                    </li>
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://creative-tim.com/contact-us?ref=njs-profile">Contactanos</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <hr class="my-6 border-blueGray-300">
          <div class="flex flex-wrap items-center md:justify-between justify-center">
            <div class="w-full md:w-4/12 px-4 mx-auto text-center">
              <div class="text-sm text-blueGray-500 font-semibold py-1">
                Copyright © <span id="get-current-year">{{date('Y')}}</span><a href="https://www.creative-tim.com/product/notus-js" class="text-blueGray-500" target="_blank"> Franquicias Servicios y Productos de México
              </div>
            </div>
          </div>
        </div>
      </footer>
      @livewireScripts()
      @stack('scripts')

    </body>
</html>
