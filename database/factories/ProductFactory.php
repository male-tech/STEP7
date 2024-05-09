<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use app\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition():array
    {
        return [
            'product_name' => $this->faker->word, 
            'price' => $this->faker->numberBetween(100,200),
            'stock' => $this->faker->randomDigit,
            'company_name' => $this->faker->company,
        ];
    }
}
