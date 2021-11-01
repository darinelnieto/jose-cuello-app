<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrador = Role::create(['name' => 'Administrador']);
        $acabados = Role::create(['name' => 'Acabados']);
        $corte = Role::create(['name' => 'Corte']);
        $operario = Role::create(['name' => 'Operario']);
        $vendedor = Role::create(['name' => 'Vendedor']);
        
        // permisos por roles
        Permission::create(['name' => 'home'])->syncRoles([$administrador, $acabados, $corte, $operario, $vendedor]);

        // permisos admin
        Permission::create(['name' => 'users.index'])->assignRole($administrador);
        Permission::create(['name' => 'users.create'])->assignRole($administrador);
        Permission::create(['name' => 'users.edit'])->assignRole($administrador);
        Permission::create(['name' => 'users.destroy'])->assignRole($administrador);

        Permission::create(['name' => 'ordenes.index'])->syncRoles([$administrador, $acabados, $corte, $vendedor]);
        Permission::create(['name' => 'ordenes.create'])->syncRoles([$administrador, $acabados, $corte, $vendedor]);
        Permission::create(['name' => 'ordenes.edit'])->syncRoles([$administrador, $acabados, $corte, $vendedor]);
        Permission::create(['name' => 'ordenes.destroy'])->syncRoles([$administrador, $acabados, $corte, $vendedor]);

        Permission::create(['name' => 'prendas.index'])->syncRoles([$administrador, $operario]);
        Permission::create(['name' => 'prendas.create'])->assignRole($operario);

    }
}
