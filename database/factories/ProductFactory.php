<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => implode(", ", $this->faker->paragraphs()),
        ];
    }
}
