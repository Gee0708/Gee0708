<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'Administrator']);
        $permission = Permission::create(['name' => 'Super Admin']);
        $permission->assignRole($adminRole);

        $adminUser = User::factory()->create([
            'email' => 'aldiver.alcoriza@gmail.com',
            'password' => bcrypt('@iidb.portal')
        ]);
        $adminUser->assignRole('Administrator');
    }
}
