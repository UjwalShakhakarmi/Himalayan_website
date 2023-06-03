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
    public function definition(): array
    {
        return [
           'name' => $this->faker->regexify('[A-Za-z0-9]{7}'),
           'exp_date' => '2023-03-24',
           'man_date' => '2022-02-1',
           'Size' => $this->faker->randomElement(['Small','Medium','Large']),
           'Category' => $this->faker->randomElement(['Baby Product','Adult Product']),
           'Qunatity_Box' => 12,
           'Qunatity_piece' => 12
        ];
    }
}
