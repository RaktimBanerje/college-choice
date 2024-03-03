<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\CourseDetail;

class CourseDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CourseDetail::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'course_id' => $this->faker->numberBetween(-10000, 10000),
            'duration' => $this->faker->numberBetween(-10000, 10000),
            'overview' => $this->faker->text,
            'jobs' => $this->faker->text,
            'syllabus' => $this->faker->text,
            'skills' => $this->faker->text,
            'admission' => $this->faker->text,
            'faqs' => $this->faker->text,
        ];
    }
}
