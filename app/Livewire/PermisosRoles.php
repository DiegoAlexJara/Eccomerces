<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisosRoles extends Component
{
    public $NamePermiso = '';
    function mount($NamePermiso)
    {
        $this->NamePermiso = $NamePermiso;
    }
    public function render()
    {
        $permiso = Permission::findByName($this->NamePermiso);
        $Roles = Role::all();
        $rolesConPermisos = $permiso->roles;
        $rolesSinPermiso = $Roles->diff($rolesConPermisos);
        return view('livewire.permisos-roles', compact('rolesConPermisos', 'rolesSinPermiso', 'Roles'));
    }
    function submit($RolId)
    {
        $rol = Role::findById($RolId);

        // Encuentra el permiso por su nombre
        $permiso = Permission::findByName($this->NamePermiso);

        // Asigna el permiso al rol
        $rol->givePermissionTo($permiso);
        $this->render();
    }
    function delete($RolId)
    {
        $rol = Role::findById($RolId);

        // Encuentra el permiso por su nombre
        $permiso = Permission::findByName($this->NamePermiso);
        $rol->revokePermissionTo($permiso);
        $this->render();
    }
}
