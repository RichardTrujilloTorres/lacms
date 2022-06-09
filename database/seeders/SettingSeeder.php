<?php

namespace Database\Seeders;

use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'name' => 'do_not_disturb',
                'definition' => json_encode([
                    'status' => 'off',
                ], true),
            ],
            [
                'name' => 'sync',
                'definition' => json_encode([
                    'last_updated_at' => Carbon::now(),
                ], true),
            ],
        ];

        Setting::insert($settings);
    }
}
