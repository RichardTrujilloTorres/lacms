<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function latest(): \Illuminate\Http\JsonResponse
    {
        $notifications = Notification::limit(Notification::DEFAULT_LIMIT)->get();

        return response()->json(compact('notifications'));
    }
}
