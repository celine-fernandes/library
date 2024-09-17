<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;

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
    public function definition(): array
    {
        return [
            'author_id' => Author::all()->random()->id,
            'title' => $this->faker->sentence(),
            'published_year' => $this->faker->year(),
            'description' => $this->faker->paragraph(),
            'image' => $this->faker->randomElement(['images/image1.jpeg', 'images/image2.png', 'images/image5.jpeg',]),
        ];
    }

    /**
     * Indicate that the model should be created with categories.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function withCategories($count = 3)
    {
        return $this->afterCreating(function (Book $book) use ($count) {
            $categories = Category::inRandomOrder()->take($count)->pluck('id');
            $book->categories()->attach($categories);
        });
    }
}
