@extends('layouts.main-user');

@section('titulo')
    Inicia Sesión
@endsection

@section('contenido')


<div class="mb-10">
    <div class="flex flex-col justify-center items-center">
        <h1 class=" text-3xl text-center ">Inicia Sesión</h1>
        <p class=" text-center">Inicia Sesión para acceder a todas las funcionalidades de tu cuenta.</p>
    </div>
    
    <x-guest-layout class="bg-white">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
    
        <form method="POST" action="{{ route('login') }}" novalidate>
            @csrf
    
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block bg-white mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
    
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
    
                <x-text-input id="password" class="block bg-white mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
    
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
    
            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Recordarme') }}</span>
                </label>
            </div>
    
            <div class="flex items-center justify-between mb-2 mt-4">
                @if (Route::has('password.request'))
                <x-link
                :href="route('register')">
                    Crear Cuenta
                </x-link>
                @endif
                <x-link
                :href="route('password.request')">
                    Olvidaste tu password
                </x-link>
            </div>
            <div class="flex justify-end pt-2">

                <x-primary-button class=" ml-3">
                    {{ __('Iniciar Sesión') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>
</div>
@endsection