<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TableOrder;
use App\Models\TableOrderDetail;
use App\Models\TableProduct;

class TableOrderDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TableOrderDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_order' => TableOrder::factory(),
            'id_product' => TableProduct::factory(),
            'photo' => $this->faker->word,
            'name' => $this->faker->name,
            'code' => $this->faker->word,
            'color' => $this->faker->word,
            'size' => $this->faker->word,
            'regular_price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'sale_price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'quantity' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
