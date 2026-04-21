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
        //
        //
        $roleAdmin=Role::create(['name'=>'admin']);
        $roleUser=Role::create(['name'=>'user']);

        //permisos para categorias
        Permission::create(['name'=>'categoria.index'])->syncRoles([$roleAdmin, $roleUser]);
        Permission::create(['name'=>'categoria.create'])->syncRoles([$roleAdmin]);
        Permission::create(['name'=>'categoria.update'])->syncRoles([$roleAdmin]);
        Permission::create(['name'=>'categoria.destroy'])->syncRoles([$roleAdmin]);

        //perimisos para producto

        Permission::create(['name'=>'producto.index'])->syncRoles([$roleAdmin, $roleUser]);
        Permission::create(['name'=>'producto.create'])->syncRoles([$roleAdmin]);
        Permission::create(['name'=>'producto.update'])->syncRoles([$roleAdmin]);
        Permission::create(['name'=>'producto.destroy'])->syncRoles([$roleAdmin]);
    }
}
