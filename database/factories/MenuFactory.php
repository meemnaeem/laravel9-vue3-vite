<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
             "name" => $this->faker->name(),
            "description" => $this->faker->paragraph(2, true),
            "price" => $this->faker->numberBetween(99, 999),
        ];
    }
}
