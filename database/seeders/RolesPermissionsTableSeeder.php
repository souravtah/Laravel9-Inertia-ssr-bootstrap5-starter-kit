<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
		
		// create permissions
		Permission::create(['name' => 'view users', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit users', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete users', 'guard_name' => 'web']);
        Permission::create(['name' => 'create users', 'guard_name' => 'web']);
        Permission::create(['name' => 'assign roles', 'guard_name' => 'web']);
        Permission::create(['name' => 'assign permissions', 'guard_name' => 'web']);
		
		// create roles and assign created permissions
        $role2 = Role::create(['name' => 'admin'])
					->givePermissionTo(Permission::all());
		
		$role1 = Role::create(['name' => 'user'])
					->givePermissionTo(['view users']);
					
		// create dummy users
        $user = \App\Models\User::factory()->create([
            'name' => 'Example User',
            'email' => 'user@example.com',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Example Admin User',
            'email' => 'admin@example.com',
        ]);
        $user->assignRole($role2);
    }
}
