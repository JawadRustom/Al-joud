<?php

namespace App\Http\Controllers;

//use App\Http\Requests\RegisterRequest;
use App\Http\Requests\AuthenticationRequests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::query()->where('email', $request->email)->first();

        if (!Hash::check($request->password, $user->password)) {
            return response(['message' => 'Email or password is wrong'], 400);
        }

        $token = $user->createToken('token')->plainTextToken;

        return response(compact('token'));
    }

//    public function register(RegisterRequest $request)
//    {
//        $user = User::create($request->only(['name', 'email', 'password']));
//
//        $user->customer()->create($request->only('phone'));
//
//        $token = $user->createToken('token')->plainTextToken;
//
//        return response(compact('token'));
//    }

//    public function logout()
//    {
//        // Revoke all tokens...
//        auth()->user()->tokens()->delete();
//
//        // Revoke the token that was used to authenticate the current request...
////        auth()->user()->currentAccessToken()->delete();
//
//        // Revoke a specific token...
////        auth()->user()->tokens()->where('id', $tokenId)->delete();;
//
//        return response()->noContent();
//    }
    public function user()
    {
        return auth()->user();
    }
}
