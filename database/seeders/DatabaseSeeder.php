<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'firstname' => 'John',
            'employee_id' => '1',
            'password' => 'test',
        ]);

        User::create([
            'firstname' => 'Tablet 1',
            'employee_id' => 'tablet_1',
            'password' => 'test',
        ]);

        $this->call([
            DishSeeder::class,
            RoundSeeder::class
        ]);
    }
}
