<?php

namespace App\Api\User\Controllers;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Support\Controller;
use App\Api\User\Resources\User as UserResource;
use Domain\User\Models\User;

final class RegisterController extends Controller
{
    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('guest:api');
    }

    protected function registered(Request $request, User $user)
    {
        return new UserResource($user);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $user->addMediaFromUrl('https://picsum.photos/id/237/60/60')
            ->toMediaCollection('avatars');

        return $user;
    }

    protected function guard()
    {
        return Auth::guard('api');
    }
}
