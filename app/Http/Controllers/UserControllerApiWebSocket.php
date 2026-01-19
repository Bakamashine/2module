<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterApiRequest;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class UserControllerApiWebSocket extends Controller
{
    public function Register(RegisterApiRequest $request)
    {
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password)
        ]);
        return response()->json([
            "success" => true
        ]);
    }

    public function Login(LoginRequest $request) {
        $user = User::firstWhere("email", $request->email);
        if ($user && Hash::check($request->password, $user->password)) {
            return response()->json([
                "token" => $user->createToken("user")->plainTextToken,
                "name" => $user->name,
            ]);
        } else {
            return response()->json([
                "email" => "Пользователь не найден"
            ], 422);
        }
    }
}
