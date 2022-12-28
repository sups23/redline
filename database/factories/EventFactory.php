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
        $cities = [
            'Kathmandu, Kathmandu, Province 3',
            'Pokhara, Kaski, Gandaki Pradesh',
            'Lalitpur, Lalitpur, Bagmati Pradesh',
            'Bhaktapur, Bhaktapur, Bagmati Pradesh',
            'Nepalgunj, Banke, Bheri Pradesh',
            'Dharan, Sunsari, Koshi Pradesh',
            'Biratnagar, Morang, Koshi Pradesh',
            'Janakpur, Dhanusa, Janakpur Pradesh',
            'Birgunj, Parsa, Narayani Pradesh',
            'Butwal, Rupandehi, Lumbini Pradesh',
            'Tansen, Palpa, Lumbini Pradesh',
            'Tulsipur, Dang Deokhuri, Rapti Pradesh',
            'Dhangadhi, Kailali, Sudurpashchim Pradesh',
            'Gaur, Rautahat, Narayani Pradesh',
            'Hetauda, Makwanpur, Bagmati Pradesh',
            'Ilam, Ilam, Mechi Pradesh',
            'Jumla, Jumla, Karnali Pradesh',
            'Kailali, Kailali, Sudurpashchim Pradesh',
            'Kalaiya, Bara, Narayani Pradesh',
            'Kanchanpur, Kanchanpur, Sudurpashchim Pradesh',
            'Kapilvastu, Kapilvastu, Lumbini Pradesh',
            'Lahan, Siraha, Sagarmatha Pradesh',
            'Lamahi, Dang Deokhuri, Rapti Pradesh',
            'Madhyapur Thimi, Bhaktapur, Bagmati Pradesh',
            'Mahendranagar, Dhanusa, Janakpur Pradesh',
            'Mechinagar, Jhapa, Mechi Pradesh',
            'Narayangarh, Chitwan, Bagmati Pradesh',
            'Nawalparasi, Nawalparasi, Lumbini Pradesh',
            'Parasi, Nawalparasi, Lumbini Pradesh',
            'Rajbiraj, Saptari, Sagarmatha Pradesh',
            'Rupandehi, Rupandehi, Lumbini Pradesh',
            'Salyan, Salyan, Karnali Pradesh',
            'Siddharthanagar, Bara, Narayani Pradesh',
            'Siraha, Siraha, Sagarmatha Pradesh',
            'Tikapur, Kailali, Sudurpashchim Pradesh',
            'Tulsipur, Dang Deokhuri, Rapti Pradesh',
            'Dhangadhi, Kailali, Sudurpashchim Pradesh',
            'Gaur, Rautahat, Narayani Pradesh',
            'Hetauda, Makwanpur, Bagmati Pradesh',
            'Ilam, Ilam, Mechi Pradesh',
            'Jumla, Jumla, Karnali Pradesh',
            'Kailali, Kailali, Sudurpashchim Pradesh',
            'Kalaiya, Bara, Narayani Pradesh',
            'Kanchanpur, Kanchanpur, Sudurpashchim Pradesh'
        ];
        $organizations = [
            "Doctors Without Borders",
            "Red Cross",
            "World Health Organization",
            "Save the Children",
            "UNICEF",
            "International Medical Corps",
            "Mercy Corps",
            "Action Against"
        ];
        
        $event_at = fake()->dateTimeBetween('-3 years', '+6 months');
        return [
            'organizer_name' => fake()->randomElement($organizations),
            'address' => fake()->randomElement($cities),
            'event_at' => $event_at,
            'donors_count' => $event_at < now() ? fake()->numberBetween(20,200) : null
        ];
    }
}
