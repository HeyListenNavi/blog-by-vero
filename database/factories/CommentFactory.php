<?php

namespace Database\Factories;

use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $commentable = $this->commentable();

        return [
            'user_id' => User::inRandomOrder()->first(),
            'content' => $this->faker->text(),
            'commentable_type' => $commentable,
            'commentable_id' => $commentable::inRandomOrder()->first(),
        ];
    }

    public function commentable()
    {
        return $this->faker->randomElement([
            'user',
            'site',
        ]);
    }
}
