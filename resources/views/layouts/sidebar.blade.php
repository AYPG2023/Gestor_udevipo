<aside class="w-68 bg-white min-h-screen shadow-lg hidden md:block">
    <div class="p-8 text-2xl font-bold text-indigo-600 border-b border-gray-200">
        <x-application-logo />
    </div>
    <nav class="p-4 space-y-1 text-gray-700">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-indigo-100">
            🏠 <span>Tablero</span>
        </a>
        <a href="{{ route('users.index') }}" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-indigo-100">
            👥 <span>Gestión de Usuarios</span>
        </a>
        <a href="#" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-indigo-100">
            📂 <span>Archivos</span>
        </a>
        <a href="{{ route('logout') }}" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-red-100 text-red-600">
            🔒 <span>Cerrar Sesión</span>
        </a>
    </nav>
</aside>
