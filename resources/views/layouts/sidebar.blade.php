<aside class="w-80 bg-white min-h-screen shadow-lg hidden md:block">
    <div class="p-8 text-2xl font-bold text-indigo-600 border-b border-gray-200">
        <x-application-logo />
    </div>

    <nav class="p-4 space-y-1 text-gray-700">
        {{-- Ítem estático: Tablero --}}
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-indigo-100">
            🏠 <span>Tablero</span>
        </a>

        {{-- Ítem dinámico: Gestión de usuarios --}}
        <x-sidebar-item title="Gestión de usuarios" :routes="[
            ['name' => 'Usuarios', 'route' => 'users.index'] /*//['name' => 'Roles', 'route' => 'roles.index'] */,
        ]" />

        {{-- Ítem estático: Archivos --}}
        <a href="{{ route('files.index') }}" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-indigo-100">
            📂 <span>Archivos</span>
        </a>


        {{-- Cerrar sesión --}}
        <a href="{{ route('logout') }}" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-red-100 text-red-600">
            🔒 <span>Cerrar Sesión</span>
        </a>
    </nav>
</aside>
