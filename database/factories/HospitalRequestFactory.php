<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HospitalRequest>
 */
class HospitalRequestFactory extends Factory
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
            'age' => fake()->numberBetween(16, 60),
            'gender' => fake()->randomElement(['male', 'female', 'other']),
            'form_image' => fake()->imageUrl(),
            'blood_group' => fake()->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
            'blood_needed_on' => fake()->dateTimeBetween('now', '+1 year'),
            'note' => fake()->paragraph,
        ];
    }
}
