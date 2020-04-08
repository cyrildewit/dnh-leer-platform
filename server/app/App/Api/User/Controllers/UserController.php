<?php

namespace App\Api\User\Controllers;

use App\Api\User\Requests\UserUpdateRequest;
use App\Api\User\Resources\User as UserResource;
use Domain\User\Models\User;
use Illuminate\Support\Facades\Auth;

final class UserController
{
    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->validated());

        return response()->json([
            'message' => 'User Updated',
        ]);
    }

    protected function guard()
    {
        return Auth::guard('api');
    }
}
