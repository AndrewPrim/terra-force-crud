<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->sentence(rand(3, 8));
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));

        return [
            'slug' => $slug,
            'title' => $title,
            'body' => $this->faker->sentence(rand(32, 84)),
            'user_id' => rand(1, 4),
            'is_archived' => rand(0, 1),
        ];
    }
}
