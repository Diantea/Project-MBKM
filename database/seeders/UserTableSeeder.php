<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        //
        $users = [
            [
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'gender' => 'Male',
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'role' => 'admin',
                'password' => bcrypt('admin'),
                'status' => 'active',
            ],
            [
                'name' => 'Dosen 1',
                'email' => 'dosen1@gmail.com',
                'gender' => 'Male',
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'role' => 'lecturer',
                'password' => bcrypt('dosen1'),
                'status' => 'active',
                'category_id' => 1,
            ],
            [
                'name' => 'Dosen 2',
                'email' => 'dosen2@gmail.com',
                'gender' => 'Female',
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'role' => 'lecturer',
                'password' => bcrypt('dosen2'),
                'status' => 'active',
                'category_id' => 2,
            ],
            [
                'name' => 'Dosen 3',
                'email' => 'dosen3@gmail.com',
                'gender' => 'Male',
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'role' => 'lecturer',
                'password' => bcrypt('dosen3'),
                'status' => 'active',
                'category_id' => 3,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        foreach (range(1, 10) as $i) {
            User::create([
                'name' => $faker->name,
                'npm' => '24' . $faker->numberBetween(10000000, 99999999),
                'email' => 'mahasiswa'. $i .'@gmail.com',
                'gender' => $faker->randomElement(['Male', 'Female']),
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'role' => 'student',
                'category_id' => 1,
                'status' => 'active',
                'password' => bcrypt('mahasiswa'),
                'semester' => 6,
            ]);
        }

        foreach (range(11, 20) as $i) {
            User::create([
                'name' => $faker->name,
                'npm' => '24' . $faker->numberBetween(10000000, 99999999),
                'email' => 'mahasiswa'. $i .'@gmail.com',
                'gender' => $faker->randomElement(['Male', 'Female']),
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'role' => 'student',
                'status' => 'active',
                'category_id' => 2,
                'password' => bcrypt('mahasiswa'),
                'semester' => 6,
            ]);
        }

        foreach (range(21, 30) as $i) {
            User::create([
                'name' => $faker->name,
                'npm' => '24' . $faker->numberBetween(10000000, 99999999),
                'email' => 'mahasiswa'. $i .'@gmail.com',
                'gender' => $faker->randomElement(['Male', 'Female']),
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'role' => 'student',
                'status' => 'active',
                'category_id' => 3,
                'password' => bcrypt('mahasiswa'),
                'semester' => 6,
            ]);
        }

    }
}
