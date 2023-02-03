<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TableColor;
use App\Models\TableProduct;

class TableColorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TableColor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'numb' => $this->faker->numberBetween(-10000, 10000),
            'id_product' => TableProduct::factory(),
            'photo' => $this->faker->word,
            'name' => $this->faker->name,
            'color' => $this->faker->word,
            'type_show' => $this->faker->numberBetween(-8, 8),
            'type' => $this->faker->word,
            'regular_price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'sale_price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'discount' => $this->faker->randomFloat(0, 0, 9999999999.),
            'status' => $this->faker->word,
            'date_created' => $this->faker->numberBetween(-10000, 10000),
            'date_updated' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
