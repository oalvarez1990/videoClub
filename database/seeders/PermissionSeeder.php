<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;



class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Permission::create(['name' => 'create customers']);
        Permission::create(['name' => 'read customers']);
        Permission::create(['name' => 'update customers']);
        Permission::create(['name' => 'delete customers']);

        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'read users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        Permission::create(['name' => 'create films']);
        Permission::create(['name' => 'read films']);
        Permission::create(['name' => 'update films']);
        Permission::create(['name' => 'delete films']);

        $roleAdmin = Role::create(['name' => 'admin']);
        $roleVisit = Role::create(['name' => 'visit']);

        $roleAdmin->givePermissionTo([
            'create customers',
            'read customers',
            'update customers',
            'delete customers',
            'create users',
            'read users',
            'update users',
            'delete users',
            'create films',
            'read films',
            'update films',
            'delete films',
            
        ]);

        $roleVisit->givePermissionTo([
            'read films',
        ]);
    }
}
