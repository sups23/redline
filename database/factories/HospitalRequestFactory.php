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
        $names = [
            "Prabesh Shrestha",
            "Sabin Karki",
            "Binita Thapa",
            "Nisha Shah",
            "Rabin Shrestha",
            "Krishna Gurung",
            "Sabita Sharma",
            "Dipesh Nepal",
            "Sagar Khatri",
            "Sunita Dhakal",
            "Anil Maharjan",
            "Bikram Adhikari",
            "Chandra Gurung",
            "Dipendra Shrestha",
            "Ekta Bhandari",
            "Gita Karki",
            "Jeevan Bhandari",
            "Kiran Shrestha",
            "Lalita Adhikari",
            "Mani Gurung",
            "Nabin Shrestha",
            "Purna Maharjan",
            "Ram Krishna Shrestha",
            "Santosh Thapa",
            "Shiva Prasad Sharma",
            "Sita Thapa",
            "Usha Bhandari",
            "Yogendra Gurung",
            "Amit Shrestha",
            "Binod Karki",
            "Chandra Khatri",
            "Diwakar Bhandari",
            "Ganesh Gurung",
            "Jaya Bhandari",
            "Keshav Shrestha",
            "Laxmi Adhikari",
            "Madhav Karki",
            "Nabin Maharjan",
            "Pramod Gurung",
            "Ramesh Adhikari",
            "Sarita Khatri",
            "Shiva Gurung",
            "Sunil Shrestha",
            "Uttam Maharjan",
            "Yogesh Bhandari",
            "Amar Shrestha",
            "Bikash Adhikari",
            "Chandra Bhandari",
            "Dipendra Karki",
            "Gita Maharjan",
            "Jeevan Shrestha",
            "Kiran Gurung",
            "Laxmi Thapa",
            "Mani Bhandari",
            "Nabin Adhikari",
            "Purna Khatri",
            "Ram Krishna Gurung",
            "Santosh Shrestha",
            "Shiva Prasad Karki",
            "Sita Adhikari",
            "Usha Thapa",
            "Yogendra Bhandari",
            "Amit Adhikari",
            "Binod Bhandari",
            "Chandra Gurung",
            "Diwakar Karki",
            "Ganesh Maharjan",
            "Jaya Thapa",
            "Keshav Gurung",
            "Laxmi Khatri",
            "Madhav Bhandari",
            "Nabin Gurung",
            "Pramod Shrestha",
            "Ramesh Karki",
            "Sarita Maharjan",
            "Shiva Gurung",
            "Sunil Adhikari",
            "Uttam Bhandari",
            "Yogesh Kandel"
        ];   

        return [
            'name' => fake()->randomElement($names),
            'age' => fake()->numberBetween(16, 60),
            'gender' => fake()->randomElement(['male', 'female', 'other']),
            'form_image' => fake()->imageUrl(),
            'blood_group' => fake()->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
            'unit' => fake()->numberBetween(1,5),
            'blood_needed_on' => fake()->dateTimeBetween('now', '+1 year'),
            'note' => fake()->paragraph,
            'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
