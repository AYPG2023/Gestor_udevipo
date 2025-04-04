@extends('layouts.app')

@section('content')
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-6 text-indigo-700">📂 Gestión de Archivos</h2>

        {{-- Formulario de subida --}}
        @can('subir archivos')
            <form id="uploadForm" enctype="multipart/form-data" class="bg-white p-4 mb-6 rounded shadow-md w-full">
                @csrf
                <div class="flex flex-col md:flex-row md:items-center gap-4 mb-4">
                    <input type="file" name="files[]" id="fileInput" multiple class="border p-2 rounded w-full md:w-auto"
                        required>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                        Subir Archivos
                    </button>
                </div>

                <div class="w-full bg-gray-200 h-3 rounded overflow-hidden mb-2">
                    <div id="progressBar" class="bg-green-500 h-full transition-all duration-300" style="width: 0%;"></div>
                </div>

                <div id="uploadMessage" class="mt-2 text-sm font-medium hidden"></div>
            </form>
        @endcan

        {{-- Tabla de archivos --}}
        <div class="bg-white shadow-md rounded overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm text-gray-800">
                <thead class="bg-blue-600 text-white text-left">
                    <tr>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Vista previa</th>
                        <th class="px-4 py-2">Tamaño</th>
                        <th class="px-4 py-2">Subido por</th>
                        <th class="px-4 py-2">Fecha</th>
                        <th class="px-4 py-2 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($archivos as $archivo)
                        <tr class="hover:bg-gray-50 align-middle">
                            <td class="px-4 py-4 whitespace-nowrap">{{ $archivo->nombre }}</td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                @if (Str::startsWith($archivo->tipo, 'image'))
                                    <img src="{{ asset('storage/' . $archivo->ruta) }}"
                                        class="h-96 w-auto rounded shadow" />
                                @elseif($archivo->tipo === 'application/pdf')
                                    <embed src="{{ asset('storage/' . $archivo->ruta) }}" class="h-96 w-64 rounded shadow"
                                        type="application/pdf" />
                                @else
                                    <a href="{{ asset('storage/' . $archivo->ruta) }}" target="_blank"
                                        class="text-indigo-600 underline">Ver archivo</a>
                                @endif
                            </td>
                            <td class="px-4 py-4">{{ number_format($archivo->tamano / 1024 / 1024, 2) }} MB</td>
                            <td class="px-4 py-4">{{ $archivo->usuario->name }}</td>
                            <td class="px-4 py-4">{{ $archivo->subido_en->format('d/m/Y, g:i:s a') }}</td>
                            <td class="px-4 py-4 text-center">
                                <div class="flex flex-col sm:flex-row sm:justify-center sm:gap-2 gap-1 items-center">
                                    {{-- Botón Ver --}}
                                    @can('ver archivos')
                                        <a href="{{ asset('storage/' . $archivo->ruta) }}" target="_blank"
                                            class="flex items-center justify-center gap-1 text-blue-600 hover:text-blue-800 font-medium">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
                                            </svg>
                                            Ver
                                        </a>
                                    @endcan

                                    {{-- Botón Descargar --}}
                                    @can('descargar archivos')
                                        <a href="{{ asset('storage/' . $archivo->ruta) }}" download="{{ $archivo->nombre }}"
                                            class="flex items-center justify-center gap-1 text-green-600 hover:text-green-800 font-medium">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                                            </svg>
                                            Descargar
                                        </a>
                                    @endcan

                                    {{-- Botón Eliminar --}}
                                    @can('eliminar archivos')
                                        <form method="POST" action="{{ route('files.destroy', $archivo) }}"
                                            onsubmit="return confirm('¿Seguro que deseas eliminar este archivo?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="flex items-center justify-center gap-1 text-red-600 hover:text-red-800 font-medium mt-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                                Eliminar
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-gray-500 py-4">No hay archivos subidos aún.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Script de subida con barra de progreso --}}
    @can('subir archivos')
        <script>
            document.getElementById('uploadForm').addEventListener('submit', function(e) {
                e.preventDefault();

                const form = e.target;
                const formData = new FormData(form);
                const progressBar = document.getElementById('progressBar');
                const uploadMessage = document.getElementById('uploadMessage');

                const xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('files.store') }}', true);
                xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

                xhr.upload.onprogress = function(e) {
                    if (e.lengthComputable) {
                        const percent = (e.loaded / e.total) * 100;
                        progressBar.style.width = percent + '%';
                    }
                };

                xhr.onload = function() {
                    if (xhr.status === 200) {
                        const response = JSON.parse(xhr.responseText);
                        let mensajes = [];
                        let exitosos = 0;

                        response.forEach(item => {
                            if (item.success) {
                                exitosos++;
                            } else {
                                mensajes.push(item.message);
                            }
                        });

                        if (exitosos > 0) {
                            uploadMessage.textContent = `✅ ${exitosos} archivo(s) subido(s) exitosamente.`;
                            uploadMessage.classList.remove('hidden', 'text-red-600');
                            uploadMessage.classList.add('text-green-600');
                        }

                        if (mensajes.length > 0) {
                            uploadMessage.textContent += '\n❌ ' + mensajes.join('\n');
                            uploadMessage.classList.remove('hidden', 'text-green-600');
                            uploadMessage.classList.add('text-red-600');
                        }

                        form.reset();
                        setTimeout(() => {
                            uploadMessage.classList.add('hidden');
                            progressBar.style.width = '0%';
                            window.location.reload();
                        }, 5000);
                    } else {
                        uploadMessage.textContent = '❌ Error al subir archivos.';
                        uploadMessage.classList.remove('text-green-600');
                        uploadMessage.classList.add('text-red-600');
                    }
                };

                xhr.onerror = function() {
                    alert('Error de red al intentar subir los archivos.');
                };

                xhr.send(formData);
            });
        </script>
    @endcan
@endsection
