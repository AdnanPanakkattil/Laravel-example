<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'   => $this->faker->words(3, true),   // e.g. "Wireless Bluetooth Headphones"
            'detail' => $this->faker->sentence(10),     // e.g. "A sleek design with excellent sound quality."
        ];
    }
}
