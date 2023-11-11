<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => 'private',
            'street' => $this->faker->streetName,
            'number' => $this->faker->randomNumber,
            'zip_code' => $this->faker->postcode,
            'city' => $this->faker->city,
            'province' => $this->faker->text(20),
            'country' => $this->faker->country,
            'remarks' => $this->faker->text(100),
            'main' => $this->faker->boolean,
            'profile_id' => \App\Models\Profile::factory(),
        ];
    }
}
