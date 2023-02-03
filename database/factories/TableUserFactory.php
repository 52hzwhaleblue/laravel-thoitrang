<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TableUser;

class TableUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TableUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_permission' => $this->faker->numberBetween(-10000, 10000),
            'username' => $this->faker->userName,
            'password' => $this->faker->password,
            'confirm_code' => $this->faker->word,
            'avatar' => $this->faker->word,
            'fullname' => $this->faker->word,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->safeEmail,
            'address' => $this->faker->word,
            'gender' => $this->faker->numberBetween(-8, 8),
            'login_session' => $this->faker->word,
            'user_token' => $this->faker->word,
            'lastlogin' => $this->faker->word,
            'status' => $this->faker->word,
            'role' => $this->faker->numberBetween(-8, 8),
            'secret_key' => $this->faker->word,
            'birthday' => $this->faker->numberBetween(-10000, 10000),
            'numb' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
