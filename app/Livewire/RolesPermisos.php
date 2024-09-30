<?php

namespace App\Livewire;

use Exception;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermisos extends Component
{
    public $NameRole;

    function mount($NameRole)
    {
        $this->NameRole = $NameRole;
    }

    public function render()
    {

        $Roles = Role::findByName($this->NameRole);
        if (!$Roles) {
            // Maneja el caso en que el rol no existe
            throw new Exception('El rol no fue encontrado');
        }
        $permiso = Permission::all();
        $rolesConPermisos = $Roles->permissions;
        $rolesSinPermiso = $permiso->diff($rolesConPermisos);
        return view('livewire.roles-permisos', compact('rolesConPermisos', 'rolesSinPermiso'));
    }
    function submit($PermissionId)
    {
        $rol = Role::findByName($this->NameRole);

        // Encuentra el permiso por su nombre
        $permiso = Permission::findById($PermissionId);

        // Asigna el permiso al rol
        $rol->givePermissionTo($permiso);
        $this->render();
    }
    function delete($PermissionId)
    {
        $rol = Role::findByName($this->NameRole);

        // Encuentra el permiso por su nombre
        $permiso = Permission::findById($PermissionId);
        $rol->revokePermissionTo($permiso);
        $this->render();
    }
}
