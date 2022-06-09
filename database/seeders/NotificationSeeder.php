<?php

namespace Database\Seeders;

use App\Models\Notification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notifications = [
            [
                'title' => 'User registered',
                'body' => 'New user registered w/ data...',
            ],
            [
                'title' => 'Job failed',
                'body' => 'Job {Job description} failed due to...',
            ],
        ];

        Notification::insert($notifications);
    }
}
