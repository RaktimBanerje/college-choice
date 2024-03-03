<?php

namespace Database\Seeders;

use App\Models\CourseDetail;
use Illuminate\Database\Seeder;

class CourseDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CourseDetail::factory()->count(5)->create();
    }
}
