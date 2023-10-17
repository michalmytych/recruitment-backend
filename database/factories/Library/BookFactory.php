<?php

namespace Database\Factories\Library;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Library\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->realText(30),
            'author' => $this->faker->name(),
            'published_at_year' => $this->faker->year(2023),
            'description' => $this->faker->realText(300),
            'available_amount' => $this->faker->numberBetween(0, 10),
        ];
    }
}
