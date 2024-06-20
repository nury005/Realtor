<?php

namespace Database\Seeders;

use App\Models\Estate;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TypeSeeder::class,
            LocationSeeder::class,
            UserSeeder::class,
        ]);
        User::factory(10)->create();
        Estate::factory(50)->create();
        \App\Models\Citizen::factory()->count(50)->create();
    }
}

