<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use  App\Models\User;

use  App\Models\Facility;

use  App\Models\Shift;

class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_user_doctor' => $this->faker->unique()->User::where('role', '=', 2)->random()->pluck('id'),
            'id_user_doctor' => $this->faker->Fac::where('role', '=', 2)->random()->pluck('id'),
            'id_user_doctor' => $this->faker->User::where('role', '=', 2)->random()->pluck('id'),
            'level' => $this->faker->randomElement(['giáo sư', 'tiến sĩ', 'thạc sĩ'])
        ];
    }
}
