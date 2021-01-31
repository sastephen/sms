<?php

namespace Database\Factories;

use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Stock::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'sku_id' => rand(1,20),
            'price' => rand(10,999),
            'qty' => rand(0,150),
            'description' => $this->faker->paragraph,
            'status' => rand(0,1),
            'category_id' => rand(1,10),
        ];
    }
}