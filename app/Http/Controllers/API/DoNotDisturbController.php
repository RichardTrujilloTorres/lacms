<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoNotDisturb;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DoNotDisturbController extends Controller
{
    public function update(DoNotDisturb $doNotDisturb): \Illuminate\Http\JsonResponse
    {
        /**
         * @var Setting $doNotDisturbSetting
         */
        $doNotDisturbSetting = Setting::where('name', 'do_not_disturb')->first();
        $doNotDisturbStatus = (bool)$doNotDisturb->status ?
            Setting::DO_NOT_DISTURB_STATUS_ON :
            Setting::DO_NOT_DISTURB_STATUS_OFF;

        $doNotDisturbSetting->update([
            'definition' => json_encode(['status' => $doNotDisturbStatus])
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Setting updated.',
            'send value' => $doNotDisturbStatus,
        ], Response::HTTP_CREATED);
    }

    public function status(): \Illuminate\Http\JsonResponse
    {
        /**
         * @var Setting $doNotDisturbSetting
         */
        $doNotDisturbSetting = Setting::where('name', 'do_not_disturb')->first();

        return response()->json([
            'status' => 'success',
            'data' => ['status' => json_decode($doNotDisturbSetting->definition, true)['status']],
        ]);
    }
}
