<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\User;
use App\Models\Shift;
use App\Models\Facility;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            Doctor::insert(
                [
                    'user_id' => User::all()->random()->id,
                    'shift_id' => Shift::all()->random()->id,
                    'facility_id' => Facility::all()->random()->id,
                    'level' => 'tien si'
                ]
            );
        };
    }
}
