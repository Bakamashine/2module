<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterApiRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Student;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserControllerApi extends Controller
{
    public function Register(RegisterApiRequest $request)
    {
        $user = Student::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password)
        ]);
        return response()->json([
            "success" => true
        ]);
    }

    public function Login(LoginRequest $request)
    {
        $user = Student::firstWhere("email", $request->email);
        if ($user && Hash::check($request->password, $user->password)) {
            return response()->json([
                "token" => $user->createToken("student")->plainTextToken
            ]);
        } else {
            return response()->json([
                "email" => "Пользователь не найден"
            ], 422);
        }
    }
}
