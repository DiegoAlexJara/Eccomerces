<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermisosSedeers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permisos = [
            'Crear usuarios',
            'Editar usuarios',
            'Eliminar usuarios',
            'Ver usuarios',
            'Asignar roles a usuarios',
            'Revocar roles de usuarios'
        ];

        foreach($permisos as $permisos)
        {
            Permission::create(['name'=>$permisos]);
        }

    }
}
