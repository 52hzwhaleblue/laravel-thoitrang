<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TableSetting;

class TableSettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TableSetting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'options' => $this->faker->text,
            'mastertool' => $this->faker->text,
            'headjs' => $this->faker->text,
            'bodyjs' => $this->faker->text,
            'name' => $this->faker->name,
            'addressvi' => $this->faker->word,
            'addressen' => $this->faker->word,
            'analytics' => $this->faker->text,
        ];
    }
}
