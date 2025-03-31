@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Gestión de Usuarios</h1>

    <table class="w-full bg-white rounded shadow">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="px-4 py-2">Nombre</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Rol</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $user->name }}</td>
                    <td class="px-4 py-2">{{ $user->email }}</td>
                    <td class="px-4 py-2">{{ ucfirst($user->role) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
