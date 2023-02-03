<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TableOrder;
use App\Models\TableOrderStatus;
use App\Models\TableUser;

class TableOrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TableOrder::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'numb' => $this->faker->numberBetween(-10000, 10000),
            'id_user' => TableUser::factory(),
            'code' => $this->faker->word,
            'fullname' => $this->faker->word,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->word,
            'email' => $this->faker->safeEmail,
            'order_payment' => $this->faker->numberBetween(-10000, 10000),
            'temp_price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'total_price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'city' => $this->faker->city,
            'district' => $this->faker->numberBetween(-10000, 10000),
            'ward' => $this->faker->numberBetween(-10000, 10000),
            'ship_price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'requirements' => $this->faker->text,
            'notes' => $this->faker->text,
            'order_status' => TableOrderStatus::factory(),
            'date_created' => $this->faker->numberBetween(-10000, 10000),
            'date_updated' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
