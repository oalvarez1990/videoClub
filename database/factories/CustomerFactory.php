<?php

namespace Database\Factories;

use App\Models\Film;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'name' => fake()->name,
            'surname' => fake()->lastName,
            'email' => fake()->unique()->safeEmail,
            'phone'  => fake()->phoneNumber,
            'address' => fake()->address,
            'city'=> fake()->city,        


        ];
    }
}
