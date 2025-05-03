<?php

namespace Database\Seeders;

use App\Models\ClassType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClassType::factory(8)->create();

        // $classTypes = [
        //     [
        //         'name' => 'Yoga',
        //         'description' => 'A gentle practice focusing on breathing, flexibility and strength.',
        //     ],
        //     [
        //         'name' => 'Pilates',
        //         'description' => 'Core-focused exercises that improve flexibility, strength and posture.',
        //     ],
        //     [
        //         'name' => 'HIIT',
        //         'description' => 'High-Intensity Interval Training for maximum calorie burn.',
        //     ],
        //     [
        //         'name' => 'Spinning',
        //         'description' => 'Indoor cycling class set to energizing music.',
        //     ],
        //     [
        //         'name' => 'Zumba',
        //         'description' => 'Dance fitness program featuring Latin and international music.',
        //     ],
        //     [
        //         'name' => 'Body Pump',
        //         'description' => 'Light to moderate weights with lots of repetition for a total body workout.',
        //     ],
        //     [
        //         'name' => 'CrossFit',
        //         'description' => 'High-intensity functional movements combining gymnastics, weightlifting, and cardio.',
        //     ],
        //     [
        //         'name' => 'Boxing',
        //         'description' => 'Learn boxing techniques while getting a full-body workout.',
        //     ],
        //     [
        //         'name' => 'Swimming',
        //         'description' => 'Water-based exercises for all fitness levels.',
        //     ],
        //     [
        //         'name' => 'Meditation',
        //         'description' => 'Guided mental exercises for relaxation and mindfulness.',
        //     ],
        // ];
        //
        // foreach ($classTypes as $classType) {
        //     ClassType::create($classType);
        // }
    }
}
