<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function latest(): \Illuminate\Http\JsonResponse
    {
        $notifications = Notification::notViewed()->limit(Notification::DEFAULT_LIMIT)->get();

        return response()->json(compact('notifications'));
    }

    public function show(Notification $notification): \Illuminate\Http\JsonResponse
    {
        return response()->json(compact('notification'));
    }

    public function markAsRead(Notification $notification): \Illuminate\Http\JsonResponse
    {
        $notification->update(['viewed' => true]);

        return response()->json([
            'status' => 'success',
            'data' => compact('notification'),
        ]);

    }
}
