<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TablePost;

class TablePostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TablePost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'photo' => $this->faker->word,
            'slug' => $this->faker->slug,
            'name' => $this->faker->name,
            'desc' => $this->faker->text,
            'content' => $this->faker->paragraphs(3, true),
            'options' => $this->faker->text,
            'numb' => $this->faker->numberBetween(-10000, 10000),
            'status' => 'null',
            'type' => $this->faker->word,
            'view' => $this->faker->numberBetween(-10000, 10000),
            'date_created' => $this->faker->numberBetween(-10000, 10000),
            'date_updated' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
