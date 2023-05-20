<?php

namespace Database\Factories;

use App\Models\categorie;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\course>
 */
class courseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'description' => $this->faker->paragraph,
            'title' => $this->faker->sentence,
            'image' => $this->faker->imageUrl,
            'date_pub' => $this->faker->date,
            'category_id' => categorie::factory(),
            'user_id' => User::factory(),
        ];
    }
}
