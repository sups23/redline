<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $event_at = fake()->dateTimeBetween('-6 months', '+6 months');
        return [
            'organizer_name' => fake()->company,
            'address' => fake()->address,
            'event_at' => $event_at,
            'donors_count' => $event_at < now() ? fake()->numberBetween(50,200) : null
        ];
    }
}
