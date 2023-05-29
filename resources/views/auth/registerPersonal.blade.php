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

        {{-- <div class="mt-4 hidden">
            <x-text-input id="role_id" class="block mt-1 w-full"  name="role_id" :value="1" required autocomplete="username" />
            <x-input-error :messages="$errors->get('role_id')" class="mt-2" />
        </div> --}}

        {{-- <div class="mt-4 ">
            <x-input-label for="email" :value="__('Rol')" />
            <select name="rol" id="rol" class="  border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                <!--Roles,105-Cliente,206-Gerente,307-Supervisor,408-Centro,509-Cobranza-->
                <option value="" disabled selected>--Selecciona un rol--</option>
                <option value="206">Gerente</option>
                <option value="307">Supervisor</option>
                <option value="408">Centro de Servicio</option>t
                <option value="509">Cobranza</option>
            </select>

        </div> --}}

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
@endsection