<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TableProduct;
use App\Models\TableProductCat;
use App\Models\TableProductList;

class TableProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TableProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_list' => TableProductList::factory(),
            'id_cat' => TableProductCat::factory(),
            'name' => $this->faker->name,
            'photo' => $this->faker->word,
            'options' => $this->faker->text,
            'content' => $this->faker->paragraphs(3, true),
            'desc' => $this->faker->text,
            'slug' => $this->faker->slug,
            'code' => $this->faker->word,
            'regular_price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'discount' => $this->faker->randomFloat(0, 0, 9999999999.),
            'sale_price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'numb' => $this->faker->numberBetween(-10000, 10000),
            'status' => 'null',
            'type' => $this->faker->word,
            'date_created' => $this->faker->numberBetween(-10000, 10000),
            'date_updated' => $this->faker->numberBetween(-10000, 10000),
            'view' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
