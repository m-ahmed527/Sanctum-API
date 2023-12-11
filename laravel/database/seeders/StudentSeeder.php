<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Testing\Fakes\Fake;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create();
        foreach(range(1,10) as $value){
            Student::insert([
                'name'=>$faker->name(),
                'city'=>$faker->city(),
                'fee'=>$faker->randomFloat(2,1000,2000),

            ]);
        }

    }
}
