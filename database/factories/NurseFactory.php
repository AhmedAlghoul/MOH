<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\nurse>
 */
class NurseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'job_number' => $this->faker->randomNumber(8),
            'name' => $this->faker->name,
            // 'date_of_hiring' => $this->faker->dateTimeBetween('-10 years', 'now'),
            'Hospital_name' => $this->faker->name,
            'Section_name' => $this->faker->name,
            'mobile_number' => $this->faker->phoneNumber,
        ];
    }
}
