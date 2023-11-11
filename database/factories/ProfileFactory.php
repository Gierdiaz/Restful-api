<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'photo_path' => $this->faker->slug,
            'salutation' => 'mr',
            'titel' => $this->faker->text(20),
            'firstname' => $this->faker->firstname,
            'lastname' => $this->faker->lastName,
            'birth_date' => $this->faker->date,
            'birth_name' => $this->faker->firstname,
            'place_birth' => $this->faker->city,
            'height' => $this->faker->randomFloat(2, 0, 100),
            'weight' => $this->faker->randomFloat(2, 0, 100),
            'blood_type' => 'A+',
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
