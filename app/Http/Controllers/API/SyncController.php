<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Jobs\Sync\SyncAll;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Response;

class SyncController extends Controller
{
    public function syncNow(): \Illuminate\Http\JsonResponse
    {
        /**
         * @var Setting $syncSetting
         */
        $syncSetting = Setting::where('name', Setting::SYNC_KEY)->first();

        SyncAll::dispatchSync();

        $syncSetting->update([
            'definition' => ['last_updated_at' => Carbon::now()],
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Sync performed.',
            'data' => ['lastUpdatedAt' => Carbon::parse($syncSetting->definition['last_updated_at'])->format('d-m-Y')],
        ], Response::HTTP_CREATED);
    }

    public function lastUpdatedAt(): \Illuminate\Http\JsonResponse
    {
        /**
         * @var Setting $syncSetting
         */
        $syncSetting = Setting::where('name', Setting::SYNC_KEY)->first();

        return response()->json([
            'status' => 'success',
            'data' => ['lastUpdatedAt' => Carbon::parse($syncSetting->definition['last_updated_at'])->format('d-m-Y')],
        ]);
    }
}
