<?php

namespace Database\Factories;

use App\Models\PhotographyPost;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Photography>
 */
class PhotographyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'photography' => 'https://picsum.photos/seed/' . $this->faker->word . '/200/300',
            'photography_post_id' => PhotographyPost::inRandomOrder()->first()->id,
        ];
    }
}
