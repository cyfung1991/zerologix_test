<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Webinar>
 */
class WebinarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->name(),
            'content' => fake()->realText(50),
            // 'created_at' => fake()->date('Y-m-d H:i') . ':00',
            'created_at' => fake()->dateTimeBetween('now', '+1 years')
        ];
    }
}
