<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2,4)),
            'category_id' => mt_rand(1,3),
            'user_id' => mt_rand(1,5),
            'release' => $this->faker->year(),
            'author' => $this->faker->name(mt_rand(2,3)),
            'description' => $this->faker->paragraph(mt_rand(2,3)), 
            'slug' => $this->faker->slug
        ];
    }
}
