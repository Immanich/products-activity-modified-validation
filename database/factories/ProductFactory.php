<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // return [
        //     'name' => $this->faker->word,
        //     'description' => $this->faker->sentence,
        //     'price' => $this->faker->randomFloat(2, 1, 100),
        //     'image_url' => $this->faker->imageUrl(480, 480, 'This is ', true, 'Faker'),
        //     'quantity' => $this->faker->numberBetween(0, 100)
        // ];
    }
}
