<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence();

        return [
            'title' => $title,
            'slug' => \Str::slug($title),
            'content' => $this->faker->paragraphs(5, true),
            'image_path' => "https://placehold.co/600x400/webp?text=$title",
            'category_id' => Category::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'published_at' => $this->faker->optional()->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
