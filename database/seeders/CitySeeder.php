<?php

namespace Database\Seeders;

use App\Models\City;
use Faker\Guesser\Name;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'name' => 'Veliko Tarnovo',
        ]);

        City::create([
            'name' => 'Trqvna',
        ]);

        City::create([
            'name' => 'Sofia',
        ]);
    }
}
