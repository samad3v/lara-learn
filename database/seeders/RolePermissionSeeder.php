<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'su']);
        $user = User::find(1);
        $user->assignRole($role);

        $writerRole = Role::create(['name' => 'writer']);

        $permissions = [
            'readPost',
            'createPost',
            'deletePost',
            'updatePost'
        ];

        $permissionModels = [];
        foreach ($permissions as $permission) {
            $permissionModels[] = Permission::create(['name' => $permission]);
        }

        $writerRole->syncPermissions($permissionModels);
    }
}
