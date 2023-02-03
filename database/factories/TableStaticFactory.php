<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TableStatic;

class TableStaticFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TableStatic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'photo' => $this->faker->word,
            'photo1' => $this->faker->word,
            'options' => $this->faker->text,
            'content' => $this->faker->paragraphs(3, true),
            'desc' => $this->faker->text,
            'name' => $this->faker->name,
            'file_attach' => $this->faker->word,
            'type' => $this->faker->word,
            'status' => $this->faker->word,
            'date_created' => $this->faker->numberBetween(-10000, 10000),
            'date_updated' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
