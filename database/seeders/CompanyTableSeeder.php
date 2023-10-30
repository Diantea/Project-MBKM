<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create('id_ID');

        foreach (range(1, 10) as $i) {
            Company::create([
                'name' => $faker->company,
                'address' => $faker->streetAddress,
                'max' => $faker->numberBetween(5, 20),
                'status' => 'active',
            ]);
        }
    }
}
