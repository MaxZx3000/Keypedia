<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    public function definition()
    {
        return [
            'username' => $this->faker->name(),
            'email_address' => $this->faker->unique()->safeEmail(),
            'password' => $this->faker->password(), // password
            'address' => $this->faker->address(),
            'gender' => 'Male',
            'date_of_birth' => $this->faker->date(),
            'role' => 'M'
        ];
    }
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'password' => null,
            ];
        });
    }
}
