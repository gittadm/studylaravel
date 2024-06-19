<?php

namespace Database\Seeders;

use App\Models\Car;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cars = [];
        $faker = Factory::create();

        for ($i = 0; $i < 100; $i++) {
            $cars[] = [
                'vin' => $faker->md5,
                'is_sold' => $faker->boolean,
                'model' => $faker->word,
                'color' => $faker->safeColorName,
                'year' => mt_rand(2000, 2024),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Car::insert($cars);
    }
}
