<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Seed the staff_users table with TFA sample records.
     */
    public function run(): void
    {
        $users = [
            [
                'username'   => 'clara.delgado',
                'full_name'  => 'Clara Delgado',
                'role'       => 'System Administrator',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username'   => 'marcus.thorne',
                'full_name'  => 'Marcus Thorne',
                'role'       => 'Store Manager',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username'   => 'eleanor.vance',
                'full_name'  => 'Eleanor Vance',
                'role'       => 'Head Cashier',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username'   => 'lucas.gallagher',
                'full_name'  => 'Lucas Gallagher',
                'role'       => 'Cashier',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username'   => 'sophia.sterling',
                'full_name'  => 'Sophia Sterling',
                'role'       => 'Inventory Specialist',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username'   => 'julian.hayes',
                'full_name'  => 'Julian Hayes',
                'role'       => 'Cashier',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('staff_users')->insertOrIgnore($users);
    }
}
