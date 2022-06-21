<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TeacherFactory extends Factory
{
    public function definition()
    {
        return [
            "email" => "T" . $this->faker->numberBetween($min = 100000, $max = 999999) . "@j2school.edu.vn",
            "password" => Str::random(10),
            "fullName" => $this->faker->name,
            "birthDate" => $this->faker->dateTimeBetween($startDate = '-60 years', $endDate = '-25 years', $timezone = null),
            "gender" => $this->faker->randomElement(["male", "female", "others"]),
            "address" => $this->faker->address,
            "phoneNumber" => "+84" . $this->faker->numberBetween($min = 100000000, $max = 999999999),
            "avatar" => $this->faker->image,
            "level" => $this->faker->randomElement(["Master", "PhD", "Asscociate Professor", "Professor"]),
            "faculty" => Str::random(20),
        ];
    }
}
