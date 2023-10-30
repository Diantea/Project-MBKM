<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = [
            [
                'name' => 'Magang',
                'icon' => 'building-castle',
            ],
            [
                'name' => 'Kewirausahaan',
                'icon' => 'building-store',
            ],
            [
                'name' => 'Studi Independen',
                'icon' => 'building-cottage',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
