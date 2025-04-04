@props(['title', 'routes' => []])

@php
    $active = request()->routeIs(collect($routes)->pluck('route')->toArray());
@endphp

<div x-data="{ open: {{ $active ? 'true' : 'false' }} }" class="text-gray-700">
    <button @click="open = !open"
        class="flex items-center w-full px-4 py-2 hover:bg-gray-100 focus:outline-none transition">

        {{-- Icono dinámico usando SVG genérico --}}
        <svg class="w-5 h-5 mr-3 text-gray-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round" />
        </svg>

        <span class="flex-1 text-left font-medium">{{ $title }}</span>

        {{-- Flecha para colapsar --}}
        <svg :class="{ 'rotate-180': open }" class="w-4 h-4 transition-transform transform" fill="none"
            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M19 9l-7 7-7-7" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>

    <div x-show="open" class="ml-8 mt-1 space-y-1" x-cloak>
        @foreach ($routes as $item)
            <a href="{{ route($item['route']) }}"
                class="block px-2 py-1 rounded hover:bg-indigo-100 text-sm {{ request()->routeIs($item['route']) ? 'text-indigo-600 font-semibold' : '' }}">
                {{-- SVG mini ícono opcional al inicio --}}
                <svg class="inline w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

                {{ $item['name'] }}
            </a>
        @endforeach
    </div>
</div>
{{-- Fin del componente sidebar-item.blade.php --}}
{{-- Este componente se utiliza para crear un elemento de menú en la barra lateral. --}}

{{-- Ejemplo de uso en una vista: --}}
{{-- <x-sidebar-item title="Gestión de Usuarios" :routes="[['route' => 'users.index', 'name' => 'Lista de Usuarios'], ['route' => 'users.create', 'name' => 'Crear Usuario']]" /> --}}
