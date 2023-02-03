<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TableProductList;

class TableProductListFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TableProductList::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug' => $this->faker->slug,
            'name' => $this->faker->name,
            'content' => $this->faker->paragraphs(3, true),
            'desc' => $this->faker->text,
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
