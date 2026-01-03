<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => $this->faker->title,
            "description" => $this->faker->text,
            "duration" => 2,
            "price" => 12.12,
            "image" => $this->faker->imageUrl,
            "start" => $this->faker->date,
            "end" => $this->faker->date
        ];
    }
}
