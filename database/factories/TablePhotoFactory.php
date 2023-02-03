<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TablePhoto;

class TablePhotoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TablePhoto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'photo' => $this->faker->word,
            'content' => $this->faker->paragraphs(3, true),
            'desc' => $this->faker->text,
            'name' => $this->faker->name,
            'link' => $this->faker->text,
            'link_video' => $this->faker->text,
            'options' => $this->faker->text,
            'type' => $this->faker->word,
            'act' => $this->faker->word,
            'numb' => $this->faker->numberBetween(-10000, 10000),
            'status' => $this->faker->word,
            'date_created' => $this->faker->numberBetween(-10000, 10000),
            'date_updated' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
