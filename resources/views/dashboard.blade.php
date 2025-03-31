@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="w-full max-w-4xl p-6 bg-white shadow-lg rounded-lg">
            <h1 class="text-2xl font-bold mb-4">Bienvenido al Dashboard</h1>

            <div class="grid grid-cols-2 gap-4">
                <div class="p-4 bg-blue-500 text-white rounded-lg shadow">
                    <h2 class="text-lg font-semibold">Usuarios Registrados</h2>
                    <p class="text-2xl">10</p>
                </div>

                <div class="p-4 bg-green-500 text-white rounded-lg shadow">
                    <h2 class="text-lg font-semibold">Archivos Subidos</h2>
                    <p class="text-2xl">25</p>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('logout') }}" class="px-4 py-2 bg-red-500 text-white rounded">
                    Cerrar Sesión
                </a>
            </div>
        </div>
    </div>
@endsection
