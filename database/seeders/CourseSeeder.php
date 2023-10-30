<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            [
                'category_id' => 1,
                'name' => 'Praktek Etika Profesi',
                'semester' => 6,
            ],
            [
                'category_id' => 1,
                'name' => 'Praktek Interpersonal Skills',
                'semester' => 6,
            ],
            [
                'category_id' => 1,
                'name' => 'Praktek Interpersonal Skills',
                'semester' => 6,
            ],
            [
                'category_id' => 1,
                'name' => 'Praktek Analisis Sistem Informasi',
                'semester' => 6,
            ],
            [
                'category_id' => 1,
                'name' => 'Praktek Implementasi Teknologi Informasi',
                'semester' => 6,
            ],
            [
                'category_id' => 1,
                'name' => 'Praktek Etika Profesi Lanjut',
                'semester' => 7,
            ],
            [
                'category_id' => 1,
                'name' => 'Praktek Interpersonal Skills Lanjut',
                'semester' => 7,
            ],
            [
                'category_id' => 1,
                'name' => 'Praktek Interpersonal Skills Lanjut',
                'semester' => 7,
            ],
            [
                'category_id' => 1,
                'name' => 'Praktek Analisis Sistem Informasi Lanjut',
                'semester' => 7,
            ],
            [
                'category_id' => 1,
                'name' => 'Praktek Implementasi Teknologi Informasi Lanjut',
                'semester' => 7,
            ],
            [
                'category_id' => 1,
                'name' => 'Riset Sistem Informasi (Seminar)',
                'semester' => 7,
            ],


            [
                'category_id' => 2,
                'name' => 'Praktek Manajemen Proyek',
                'semester' => 6,
            ],
            [
                'category_id' => 2,
                'name' => 'Praktek Analisis Sistem Informasi',
                'semester' => 6,
            ],
            [
                'category_id' => 2,
                'name' => 'Praktek Perancangan Sistem Informasi',
                'semester' => 6,
            ],
            [
                'category_id' => 2,
                'name' => 'Praktek Implementasi Sistem Informasi',
                'semester' => 6,
            ],
            [
                'category_id' => 2,
                'name' => 'Praktek Pengujian Sistem Informasi',
                'semester' => 6,
            ],
            [
                'category_id' => 2,
                'name' => 'Praktek Manajemen Proyek Lanjut',
                'semester' => 7,
            ],
            [
                'category_id' => 2,
                'name' => 'Praktek Analisis Sistem Informasi Lanjut',
                'semester' => 7,
            ],
            [
                'category_id' => 2,
                'name' => 'Praktek Perancangan Sistem Informasi Lanjut',
                'semester' => 7,
            ],
            [
                'category_id' => 2,
                'name' => 'Praktek Implementasi Sistem Informasi Lanjut',
                'semester' => 7,
            ],
            [
                'category_id' => 2,
                'name' => 'Praktek Pengujian Sistem Informasi Lanjut',
                'semester' => 7,
            ],
            [
                'category_id' => 2,
                'name' => 'Riset Sistem Informasi (Seminar)',
                'semester' => 7,
            ],

            [
                'category_id' => 3,
                'name' => 'Perancangan monitoring kegiatan project independent',
                'semester' => 6,
            ],
            [
                'category_id' => 3,
                'name' => 'Analisis sistem informasi',
                'semester' => 6,
            ],
            [
                'category_id' => 3,
                'name' => 'Perancangan sistem informasi',
                'semester' => 6,
            ],
            [
                'category_id' => 3,
                'name' => 'Implementasi sistem informasi',
                'semester' => 6,
            ],
            [
                'category_id' => 3,
                'name' => 'Pengujian sistem informasi',
                'semester' => 6,
            ],
            [
                'category_id' => 3,
                'name' => 'Perancangan monitoring kegiatan project independent lanjut',
                'semester' => 7,
            ],
            [
                'category_id' => 3,
                'name' => 'Analisis sistem informasi lanjut',
                'semester' => 7,
            ],
            [
                'category_id' => 3,
                'name' => 'Perancangan sistem informasi lanjut',
                'semester' => 7,
            ],
            [
                'category_id' => 3,
                'name' => 'Implementasi sistem informasi lanjut',
                'semester' => 7,
            ],
            [
                'category_id' => 3,
                'name' => 'Pengujian sistem informasi lanjut',
                'semester' => 7,
            ],
            [
                'category_id' => 3,
                'name' => 'Riset Sistem Informasi (Seminar)',
                'semester' => 7,
            ],

        ];


        foreach($courses as $course) {
            Course::create($course);
        }
    }
}
