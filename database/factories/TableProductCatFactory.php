<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TableProductCat;
use App\Models\TableProductList;

class TableProductCatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TableProductCat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_list' => TableProductList::factory(),
            'content' => $this->faker->paragraphs(3, true),
            'slug' => $this->faker->slug,
            'desc' => $this->faker->text,
            'name' => $this->faker->name,
            'photo' => $this->faker->word,
            'options' => $this->faker->text,
            'numb' => $this->faker->numberBetween(-10000, 10000),
            'status' => 'null',
            'type' => $this->faker->word,
            'date_created' => $this->faker->numberBetween(-10000, 10000),
            'date_updated' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
