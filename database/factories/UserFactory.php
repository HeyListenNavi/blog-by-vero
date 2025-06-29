<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => $this->faker->userName(),
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'description' => $this->faker->paragraph(),
            'avatar_color' => $this->faker->hexColor(),
            'favorite_color' => $this->faker->hexColor(),
            'favorite_fruit' => $this->faker->word(),
            'password' => bcrypt('password'),
            'role' => 'User',
        ];
    }

    public function setAdminRole() {
        return $this->state(function (array $state) {
            return [
                'role' => 'admin'
            ];
        });
    }
}
