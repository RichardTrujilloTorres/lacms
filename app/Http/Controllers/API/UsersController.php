<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserUpdate;
use App\Models\User;
use Illuminate\Http\Response;

class UsersController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $users = User::paginate(10);

        return response()->json([
            'data' => compact('users')
        ]);
    }

    public function show(User $user): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'data' => compact('user'),
        ]);
    }

    public function update(User $user, UserUpdate $userUpdate): \Illuminate\Http\JsonResponse
    {
        $user->fill($userUpdate->only(['name',]))->save();

        return response()->json([
            'status' => 'success',
            'data' => compact('user'),
        ], Response::HTTP_CREATED);
    }

    public function delete(User $user): \Illuminate\Http\JsonResponse
    {
        $user->delete();

        return response()->json([
            'status' => 'success',
            'data' => [],
        ], Response::HTTP_CREATED);
    }
}
