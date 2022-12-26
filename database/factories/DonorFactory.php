<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class DonorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name,
            'blood_group' => fake()->randomElement(['A+', 'B+', 'O+', 'AB+', 'A-', 'B-', 'O-', 'AB-']),
            'contact' => fake()->unique()->numberBetween(9800000000, 9899999999),
            'address' => fake()->address,
            'age' => fake()->numberBetween(16, 60),
            'gender' => fake()->randomElement(['male', 'female']),
            'donation_interval' => fake()->randomElement(['3 months', '6 months', '1 year', 'irregular']),
            'donation_count' => fake()->numberBetween(1, 200),
            'last_donation_at' => fake()->dateTimeBetween('-3 years', 'now'),
            'description' => fake()->realText(300),
        ];
    }
}
