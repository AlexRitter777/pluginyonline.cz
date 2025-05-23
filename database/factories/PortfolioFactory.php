<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Portfolio>
 */
class PortfolioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(10),
            'name' => 'Woo Commerce Rain Wolf ' . ucwords(fake()->words(rand(3, 5), true)),
            'type' => fake()->randomElement(['Plugin Word Press', 'Child theme']),
            'purpose' => fake()->sentence(7),
            'features' => fake()->realTextBetween(160,200),
            'requirements' => 'Word Press 6.7, WoCommerce 8.2',
            'description' => fake()->realTextBetween(180,250),
            'content' => fake()->text(2000),
            'is_published' => 1,
            'thumbnail' => 'https://picsum.photos/seed/' . uniqid() . '/640/480'

        ];
    }
}
