<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'phone' => $this->faker->numerify('###-###-####'),
            'address' => $this->faker->address(),
            'sallary' => $this->faker->numerify('######'),
            'photo' => $this->faker->imageUrl('https://source.unsplash.com/random'),
            'nid' => $this->faker->numerify('##########'),
            'joining_date' => $this->faker->date(),
        ];
    }
}
