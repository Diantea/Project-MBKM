<?php

namespace Database\Seeders;

use App\Models\Information;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InformationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create('id_ID');

        foreach (range(1, 10) as $i) {
            Information::create([
               'title' => $faker->sentence(3),
               'description' => $faker->text,
               'photo' => null,
               'date' => $faker->date,
            ]);
        }
    }
}
