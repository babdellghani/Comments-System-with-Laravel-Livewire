<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Episode;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    protected $model = Comment::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $commentableType = $this->faker->randomElement([Article::class, Episode::class]);

        return [
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'parent_id' => null,
            'body' => $this->faker->sentence(),
            'commentable_id' => $commentableType::inRandomOrder()->first()->id ?? $commentableType::factory(),
            'commentable_type' => $commentableType,
        ];
    }
}
