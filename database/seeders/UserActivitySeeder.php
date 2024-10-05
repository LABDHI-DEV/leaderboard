<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Activity;
use App\Models\UserActivity;
use Carbon\Carbon;

class UserActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $activities = Activity::all();

        // Check if there are users and activities
        if ($users->isEmpty() || $activities->isEmpty()) {
            $this->command->warn('Please first run UserSeeder and ActivitySeeder.');
            return;
        }

        $userActivityData = [
            ['user_id' => 1, 'activity_ids' => [1, 2, 4], 'date_time' => '2024-10-03 14:46:26'],
            ['user_id' => 2, 'activity_ids' => [2, 3], 'date_time' => '2024-10-04 14:46:26'],
            ['user_id' => 3, 'activity_ids' => [1], 'date_time' => '2024-10-05 14:46:26'],
            ['user_id' => 4, 'activity_ids' => [3], 'date_time' => '2024-10-05 14:46:26'],
            ['user_id' => 5, 'activity_ids' => [5, 3, 8], 'date_time' => '2024-10-06 14:46:26'],
            ['user_id' => 6, 'activity_ids' => [8], 'date_time' => '2024-10-07 14:46:26'],
            ['user_id' => 7, 'activity_ids' => [8], 'date_time' => '2024-10-06 14:46:26'],
            ['user_id' => 8, 'activity_ids' => [8, 1], 'date_time' => '2024-10-07 14:46:26'],
            ['user_id' => 9, 'activity_ids' => [2], 'date_time' => '2025-10-07 14:46:26'],
            ['user_id' => 10, 'activity_ids' => [8], 'date_time' => '2024-09-03 14:46:26'],
            ['user_id' => 11, 'activity_ids' => [8], 'date_time' => '2025-09-03 14:46:26'],
            ['user_id' => 12, 'activity_ids' => [3, 5], 'date_time' => '2024-08-03 14:46:26'],
            ['user_id' => 13, 'activity_ids' => [4, 7], 'date_time' => '2024-10-06 14:46:26'],
            ['user_id' => 14, 'activity_ids' => [7, 2], 'date_time' => '2024-10-05 14:46:26'],
            ['user_id' => 15, 'activity_ids' => [8], 'date_time' => '2024-10-06 14:46:26'],
            ['user_id' => 16, 'activity_ids' => [8], 'date_time' => '2024-10-07 14:46:26'],
            ['user_id' => 17, 'activity_ids' => [8], 'date_time' => '2024-10-06 14:46:26'],
            ['user_id' => 18, 'activity_ids' => [3, 5, 7, 1], 'date_time' => '2024-10-07 14:46:26'],
            ['user_id' => 19, 'activity_ids' => [4], 'date_time' => '2024-10-06 14:46:26'],
            ['user_id' => 20, 'activity_ids' => [5], 'date_time' => '2024-10-07 14:46:26'],
        ];
        
        $insertData = [];
        foreach ($userActivityData as $user) {
            foreach ($user['activity_ids'] as $activityId) {
                $insertData[] = [
                    'user_id' => $user['user_id'],
                    'activity_id' => $activityId,
                    'date_time' => $user['date_time'],
                    'is_calculated' => 0,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
        }
        UserActivity::insert($insertData);
    }
}
