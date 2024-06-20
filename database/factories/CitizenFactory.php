<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Citizen>
 */
class CitizenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'name' => fake()->firstName(),
            'secondName' => fake()->lastName(),
            'thirdName' => fake()->lastName(),
            'passport' => 'I-AŞ' . ' ' . rand(111111, 999999),
            'phone' => rand(61000000,65999999),
            'gender' => rand(0,1),
            'country' => rand(1,6),
            'birthday' => fake()->dateTimeBetween('-70 year', 'now'),
            'created_at' => fake()->dateTimeBetween('-3 year', '-2 year')->format('Y-m-d H:i:s'),
            'updated_at' => fake()->dateTimeBetween('-6 month', 'now')->format('Y-m-d H:i:s'),
        ];
    }
}

