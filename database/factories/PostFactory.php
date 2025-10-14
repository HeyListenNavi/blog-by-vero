<?php

namespace Database\Factories;

use App\Models\Icon;
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
        return [
            'title' => $this->faker->catchPhrase(),
            'content' => $this->faker->text(5000),
            'date' => $this->faker->date(),
            'icon_id' => Icon::inRandomOrder()->first()->id,
        ];
    }
}
