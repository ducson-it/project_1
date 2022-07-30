<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=0; $i < 20; $i++) {
            User::insert(
                [
                    'name' => 'abc',
                    'email' => $faker->safeEmail(),
                    'password' => 'ấdadasdad',
                    'role' => 1
                ]
            );
        };
    }
}
