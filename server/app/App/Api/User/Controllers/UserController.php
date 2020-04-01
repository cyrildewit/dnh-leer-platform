<?php

namespace App\Api\User\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Api\User\Resources\User as UserResource;
use App\Api\User\Requests\UserUpdateRequest;
use Domain\User\Models\User;

final class UserController
{
    public function authenticated()
    {
        return new UserResource($this->guard()->user());
    }

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
