<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BloodPack>
 */
class BloodPackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {   
        $arrived_at = fake()->dateTimeBetween('-8 months', 'now');
        return [
            'donor_id' => fake()->numberBetween(1,200),
            'arrived_at' => $arrived_at,
            'expiry_at' => $arrived_at->modify('+35 days'),
            'blood_type' => fake()->randomElement(['WB', 'PRBC', 'SWRBC', 'SDPS', 'FFP', 'PC', 'SDP', 'PRB', 'CR', 'OTH']),
            'rbc_count' => fake()->numberBetween(35, 60),
            'wbc_count' => fake()->numberBetween(45, 110),
            'haemo_level' => fake()->numberBetween(138, 172)
        ];
    }
}
