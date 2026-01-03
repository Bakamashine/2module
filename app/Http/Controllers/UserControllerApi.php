<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterApiRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserControllerApi extends Controller
{
    public function Register(RegisterApiRequest $request)
    {
        $user = User::create([
            "email" => $request->email,
            "password" => bcrypt($request->password)
        ]);
        return response()->json([
            "success" => true
        ]);
    }

    public function Login(LoginRequest $request)
    {
        $user = User::firstWhere("email", $request->email);
        if ($user && Hash::check($request->password, $user->password)) {
            return response()->json([
                "token" => $user->createToken("user")->plainTextToken
            ]);
        } else {
            return response()->json([
                "email" => "Пользователь не найден"
            ], 422);
        }
    }
}
