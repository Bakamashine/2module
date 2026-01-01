<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class UserControllerApi extends Controller
{
    public function Register(LoginRequest $request) {
        $user = User::create([
            "email" => $request->email,
            "password" => bcrypt($request->password)
        ]);
        return response()->json([
            "success" => true
        ]);
    }

    public function Login(LoginRequest $request) {
        $user = User::firstWhere("email", $request->email);
        if (Hash::check($user->password, $request->password)) {
            return response()->json([
                "token" => $user->createToken("user")->plainTextToken
            ]);
        }
    }
}
