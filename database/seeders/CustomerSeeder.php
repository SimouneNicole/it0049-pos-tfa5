<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Seed the customers table with TFA sample records.
     */
    public function run(): void
    {
        $customers = [
            [
                'full_name'  => 'Eleanor Vance',
                'email'      => 'eleanor.vance@example.com',
                'phone'      => '+1 (555) 234-5678',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'full_name'  => 'Marcus Thorne',
                'email'      => 'marcus.thorne@example.com',
                'phone'      => '+1 (555) 345-6789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'full_name'  => 'Sophia Sterling',
                'email'      => 'sophia.sterling@example.com',
                'phone'      => '+1 (555) 456-7890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'full_name'  => 'Lucas Gallagher',
                'email'      => 'lucas.gallagher@example.com',
                'phone'      => '+1 (555) 567-8901',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'full_name'  => 'Clara Delgado',
                'email'      => 'clara.delgado@example.com',
                'phone'      => '+1 (555) 678-9012',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'full_name'  => 'Julian Hayes',
                'email'      => 'julian.hayes@example.com',
                'phone'      => '+1 (555) 789-0123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('customers')->insertOrIgnore($customers);
    }
}
