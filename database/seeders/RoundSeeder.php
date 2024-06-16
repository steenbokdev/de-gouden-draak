<?php

namespace Database\Seeders;

use App\Models\Round;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Round::create([
            'tablet_id' => 1,
            'round' => 1,
        ]);
    }
}
