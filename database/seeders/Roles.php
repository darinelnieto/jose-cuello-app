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
        $vendedor = Role::create(['name' => 'seller']);
        $operario = Role::create(['name' => 'operator']);
        $acabados = Role::create(['name' => 'finishes']);
        
        // permisos por roles
        Permission::create(['name' => 'home']);

        // permisos admin
        Permission::create(['name' => 'User.all']);
        Permission::create(['name' => 'User.create']);
        Permission::create(['name' => 'User.edit']);
        Permission::create(['name' => 'User.destroy']);

    }
}
