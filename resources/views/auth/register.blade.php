@extends('layouts.main-user');

@section('titulo')
    Registrate
@endsection

@section('contenido')
<h1 class=" text-3xl text-center ">Registrate</h1>
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4 hidden">
            <x-text-input id="rol" class="block mt-1 w-full"  name="rol" :value="1" required autocomplete="username" />
            <x-input-error :messages="$errors->get('rol')" class="mt-2" />
        </div>

        
        <div class="mt-4">
            <x-input-label for="tel" :value="__('Telefono')" />
            <x-text-input id="tel" class="block mt-1 w-full" type="number" name="tel"  id="numeroTel" :value="old('tel')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('tel')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirma Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <x-link
            :href="route('login')">
                Iniciar Sesión
            </x-link>

            <x-link
            :href="route('password.request')">
                Olvidaste tu password
            </x-link>
        </div>
        <div class="flex justify-end pt-2">

            <x-primary-button class=" ml-3">
                {{ __('Crear Cuenta') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
<script>
    var input=  document.getElementById('numeroTel');
input.addEventListener('input',function(){
  if (this.value.length > 10) 
     this.value = this.value.slice(0,10); 
})
</script>
@endsection