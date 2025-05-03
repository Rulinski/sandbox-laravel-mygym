<?php

namespace Database\Factories;

use App\Models\ClassType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ClassType>
 */
class ClassTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $classTypes = [
            'Yoga', 'Pilates', 'HIIT', 'Spinning', 'Zumba',
            'Body Pump', 'CrossFit', 'Boxing', 'Swimming', 'Meditation',
            'Kickboxing', 'TRX', 'Barre', 'Bootcamp', 'Circuit Training'
        ];

        $minutes = [
            45, 50, 60
        ];

        $name = $this->faker->unique()->randomElement($classTypes);

        return [
            'name' => $name,
            'description' => $this->faker->paragraph(1),
            'minutes' => $this->faker->randomElement($minutes),
        ];
    }
}
