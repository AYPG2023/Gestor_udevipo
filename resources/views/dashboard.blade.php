@extends('layouts.app')

@section('content')
    {{-- Contenedor principal centrado --}}
    <div class="flex flex-col items-center bg-gray-100 min-h-screen px-4 border-blue-600 border-2  pt-20">

        {{-- Logo de la aplicación --}}

        {{-- Contenedor general con sombra y bordes redondeados --}}
        <div class="w-full max-w-7xl bg-white shadow-lg rounded-lg overflow-hidden">

            {{-- Imagen superior responsive y elegante --}}
            <div class="w-full">
                <img src="{{ asset('img/dashboard_logo.jpeg') }}" alt="Banner institucional"
                    class="w-full h-auto max-h-80 object-cover rounded-t-lg">
            </div>

            {{-- Contenido principal --}}
            <div class="p-9">
                <h1 class="text-3xl font-bold mb-2 text-center text-gray-800">Bienvenido al Gestor de Archivos</h1>
                <p class="text-center text-gray-600 mb-6">
                    Gestor de archivos para los expedientes de los ciudadanos de la UDEVIPO.
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="p-4 bg-blue-500 text-white rounded-lg shadow">
                        <h2 class="text-lg font-semibold">Usuarios Registrados</h2>
                        <p class="text-2xl">10</p>
                    </div>

                    <div class="p-4 bg-green-500 text-white rounded-lg shadow">
                        <h2 class="text-lg font-semibold">Archivos Subidos</h2>
                        <p class="text-2xl">25</p>
                    </div>
                </div>

                <div class="mt-6 text-center">
                    <a href="{{ route('logout') }}"
                        class="inline-block px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">
                        Cerrar Sesión
                    </a>
                </div>
            </div>
        </div>

    </div>
@endsection
