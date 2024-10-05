<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Activity;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activities = [
            ['name' => 'Walking', 'points' => 20],
            ['name' => 'Running', 'points' => 20],
            ['name' => 'Cycling', 'points' => 20],
            ['name' => 'Swimming', 'points' => 20],
            ['name' => 'Yoga', 'points' => 20],
            ['name' => 'Gardening', 'points' => 20],
            ['name' => 'Dancing', 'points' => 20],
            ['name' => 'Jogging', 'points' => 20],
        ];

        foreach ($activities as $activity) {
            Activity::create($activity);
        }
    }
}
