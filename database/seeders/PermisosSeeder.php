<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermisosSeeder extends Seeder
{
    public function run(): void
    {
        $permisos = [
            // Gestión de usuarios
            'crear usuario',
            'editar usuario',
            'eliminar usuario',
            'Ver usuarios',
            'Ver permisos',

            // Archivos
            'ver archivos',
            'subir archivos',
            'eliminar archivos',
            'editar archivos',
            'crear archivos',
            'ver carpetas',
            'crear carpetas',
            'eliminar carpetas',
            'editar carpetas',
            'unir archivos',

            // Reportes
            'quien subio',
            'quien elimino',
            'quien edito',
            'quien creo',
            'cuantos archivos han sido subidos',
            'cuantos archivos han sido eliminados',
        ];

        foreach ($permisos as $permiso) {
            Permission::firstOrCreate(['name' => $permiso]);
        }
    }
}
