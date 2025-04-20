<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request) {
        $user = User::where('email', $request->email)->first();

        if(! $user || ! Hash::check($request->password, $user->password)) {
            return 'The provide credentials are incorect.';
        }

        $data = [
            'user' => $user,
            'token' => $user->createToken($user->name)->plainTextToken,
        ];

        return $data;
    }

    public function register(RegisterRequest $request) {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'user_id' => 1
        ]);

        $data = [
            'user' => $user,
            'token' => $user->createToken($user->name)->plainTextToken,
        ];

        return $data;
    }

    public function logout(Request $request) {
        $user = $request->user();
        $user->tokens()->delete();

        return "User Logout!";
    }
}
