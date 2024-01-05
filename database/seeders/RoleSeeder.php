<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::create(['name' => 'admin']);

        $permission_crear_registro = Permission::create(['name' => 'crear registro']);
        $permission_leer_registro = Permission::create(['name' => 'leer registro']);
        $permission_editar_registro = Permission::create(['name' => 'editar registro']);
        $permission_eliminar_registro = Permission::create(['name' => 'eliminar registro']);

        $permissions_admin = [$permission_crear_registro, $permission_leer_registro, $permission_editar_registro, $permission_eliminar_registro];

        $role_admin->syncPermissions($permissions_admin);
    }
}
