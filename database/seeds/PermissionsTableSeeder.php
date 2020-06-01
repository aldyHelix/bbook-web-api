<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = App\Role::where('name', 'admin')->first();
        $admin->permissions()->attach([1, 2, 3, 4, 5]);

        $staff = App\Role::where('name', 'user')->first();
        $staff->permissions()->attach([6]);

        $ceo = App\Role::where('name', 'other')->first();
        $ceo->permissions()->attach([1, 6]);
    }
}
