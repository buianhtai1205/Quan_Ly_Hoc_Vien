<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "studentID" => $this->faker->numberBetween($min = 10000000, $max = 99999999),
            "password" => Str::random(10),
            "fullName" => $this->faker->name,
            "birthDate" => $this->faker->dateTimeBetween($startDate = '-22 years', $endDate = '-18 years', $timezone = null),
            "gender" => $this->faker->randomElement(["male", "female", "others"]),
            "address" => $this->faker->address,
            "phoneNumber" => "+84" . $this->faker->numberBetween($min = 100000000, $max = 999999999),
            "avatar" => $this->faker->image,
        ];
    }
}
