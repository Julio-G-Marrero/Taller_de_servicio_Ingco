@extends('layouts.main-user');

@section('titulo')
    Olvide mi password
@endsection

@section('contenido')
<h1 class=" text-3xl text-center ">Recupera tu password</h1>

<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('¿Olvidaste tu contraseña? Ningún problema. Simplemente háganos saber su dirección de correo electrónico y le enviaremos un enlace de restablecimiento de contraseña que le permitirá elegir una nueva..') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mb-2 mt-4">
            @if (Route::has('password.request'))
            <x-link
            :href="route('register')">
                Crear Cuenta
            </x-link>
            @endif
            <x-link
            :href="route('login')">
                Inicia Sesión
            </x-link>
        </div>
        <div class="flex justify-end pt-2">

            <x-primary-button class=" ml-3">
                {{ __('Enviar Correo') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
@endsection