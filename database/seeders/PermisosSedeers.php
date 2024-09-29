<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
            'Revocar roles de usuarios',
            'view products',
            'view content',
            'publish content',
            'view comments',
            'create comments',
            'delete comments',
            'create products',
            'edit products',
            'delete products',

        ];

        $role = Role::create(['name' => 'Admin']);
        $role = Role::findById(1);
        foreach ($permisos as $permisos) {
            $permision = Permission::create(['name' => $permisos]);
            $role->givePermissionTo($permision);
        }
        $role = Role::create(['name' => 'User']);
    }
}
