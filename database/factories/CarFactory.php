<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'brand' => $this->faker->company,
            'model' => $this->faker->word,
            'plat_no' => $this->faker->bothify('??###'),
            'daily_rate' => $this->faker->numberBetween(100000, 500000),
            'available' => $this->faker->boolean
        ];
    }
}
