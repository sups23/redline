<?php

namespace Database\Factories;

use DateInterval;
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
        $arrived_at = fake()->dateTimeBetween('-4 years', 'now');
        return [
            'donor_id' => fake()->numberBetween(1,500),
            'event_id' => fake()->numberBetween(1,2000),
            'arrived_at' => $arrived_at->format('Y-m-d'),
            'expiry_at' => $arrived_at->add(new DateInterval('P35D'))->format('Y-m-d'),
            'blood_type' => fake()->randomElement(['WB', 'PRBC', 'SWRBC', 'SDPS', 'FFP', 'PC', 'SDP', 'PRB', 'CR', 'OTH']),
            'unit' => fake()->numberBetween(1,5),
            'rbc_count' => fake()->numberBetween(35, 60),
            'wbc_count' => fake()->numberBetween(45, 110),
            'haemo_level' => fake()->numberBetween(120, 172),
            'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
