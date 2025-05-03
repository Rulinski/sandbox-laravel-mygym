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
        ClassType::factory(10)->create();

        // $classTypes = [
        //     [
        //         'name' => 'Yoga',
        //         'description' => 'A gentle practice focusing on breathing, flexibility and strength.',
        //         'minutes' => '60',
        //     ],
        //     [
        //         'name' => 'Pilates',
        //         'description' => 'Core-focused exercises that improve flexibility, strength and posture.',
        //         'minutes' => '50',
        //     ],
        // ];
        //
        // foreach ($classTypes as $classType) {
        //     ClassType::create($classType);
        // }
    }
}
