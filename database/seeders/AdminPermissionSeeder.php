<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class AdminPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminPerm = Permission::create(['name' => 'admin']);

        $userIds = [1,2];
        foreach ($userIds as $userId) {
            User::find($userId)->givePermissionTo($adminPerm);
        }
    }
}
