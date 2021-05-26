<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'cni' => $this->faker->phoneNumber(13),
            'call' => $this->faker->phoneNumber(10),
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->city(),
            'avatar' => $this->faker->imageUrl($width = 640, $height = 480),
        ];
    }


}
