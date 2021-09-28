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
        $administrador = Role::create(['name' => 'admin']);
        $acabados = Role::create(['name' => 'finishes']);
        $corte = Role::create(['name' => 'court']);
        $operario = Role::create(['name' => 'operator']);
        $vendedor = Role::create(['name' => 'seller']);
        
        
        // permisos por roles
        Permission::create(['name' => 'home'])->syncRoles([$administrador, $acabados, $corte, $operario, $vendedor]);

        // permisos admin
        Permission::create(['name' => 'usuarios.index'])->assignRole($administrador);
        Permission::create(['name' => 'usuarios.create'])->assignRole($administrador);
        Permission::create(['name' => 'usuarios.edit'])->assignRole($administrador);
        Permission::create(['name' => 'usuarios.destroy'])->assignRole($administrador);

        Permission::create(['name' => 'orden.index'])->syncRoles([$administrador, $acabados, $corte, $vendedor]);
        Permission::create(['name' => 'orden.create'])->syncRoles([$administrador, $acabados, $corte, $vendedor]);
        Permission::create(['name' => 'orden.edit'])->syncRoles([$administrador, $acabados, $corte, $vendedor]);
        Permission::create(['name' => 'orden.destroy'])->syncRoles([$administrador, $acabados, $corte, $vendedor]);

        Permission::create(['name' => 'prendas.index'])->syncRoles([$administrador, $operario]);
        Permission::create(['name' => 'prendas.create'])->assignRole($operario);

    }
}
