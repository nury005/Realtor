<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kitap>
 */
class EstateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = DB::table('users')->inRandomOrder()->first();
        $type = DB::table('types')->inRandomOrder()->first();
        $location = DB::table('locations')->inRandomOrder()->first();
        $createdAt = fake()->dateTimeBetween('-1 year', '-1 week');
        return [
            'user_id' => $user->id,
            'type_id' => $type->id,
            'location_id' => $location->id,
            'name' => fake()->name(),
            'description' => fake()->paragraph(),
//            'phone' => rand(61000000,65999999),
            'price' => rand(50, 500),
            'viewed' => rand(0, 300),
            'favorited' => rand(0, 60),
            'created_at' => $createdAt,
            'updated_at' => Carbon::parse($createdAt)->addDays(rand(0, 6))->addHours(rand(0, 23)),
        ];
    }
}
