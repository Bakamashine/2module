<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function RegisterView()
    {
        return view("auth.register");
    }

    public function LoginView()
    {
        return view("auth.login");
    }

    public function Register(RegisterRequest $request)
    {
        $user = User::create([
            "email" => $request->email,
            "password" => bcrypt($request->password)
        ]);

        Auth::login($user);
        return redirect()->intended();
    }

    public function Login(LoginRequest $request)
    {
        if (
            Auth::attempt([
                "email" => $request->email,
                'password' => $request->password
            ])
        ) {
            $request->session()->regenerate();
            return redirect()->intended();
        } else {
            return back()->onlyInput("email")->withErrors([
                "email" => "Пользователь не найден"
            ]);
        }
    }

    public function Logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/");
    }
}
