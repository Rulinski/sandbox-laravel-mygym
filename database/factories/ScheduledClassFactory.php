<?php

namespace Database\Factories;

use App\Models\ScheduledClass;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ScheduledClass>
 */
class ScheduledClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'instructor_id' => rand(14, 23),
            'class_type_id' => rand(1, 10),
            'date_time' => Carbon::now()->addHours(rand(24,120))->minutes(0)->seconds(0),
        ];
    }
}
