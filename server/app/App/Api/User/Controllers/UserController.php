<?php

namespace App\Api\User\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Api\User\Resources\User as UserResource;

final class UserController
{
    public function authenticated()
    {
        return new UserResource($this->guard()->user());
    }

    protected function guard()
    {
        return Auth::guard('api');
    }
}
