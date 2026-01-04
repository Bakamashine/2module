<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(AdminController::class)
    ->group(function () {
        Route::get('/', 'index')->name("index");
    });

Route::middleware("auth")
    ->group(function () {
        Route::resource("course", CourseController::class);
        Route::resource("lesson", LessonController::class);
        Route::controller(StudentController::class)
        ->name("student.")
        ->prefix("student")
        ->group(function () {
            Route::get("", 'index')->name("index");

        });
    });

Route::controller(UserController::class)
    ->middleware('guest')
    ->group(function () {
        Route::name("register.")
            ->prefix("register")
            ->group(function () {
                Route::get("", 'RegisterView')->name("store");
                Route::post("", 'Register')->name("index");
            });
        Route::prefix("login")
            ->middleware("guest")
            ->group(function () {
                Route::get("", 'loginView')->name("login");
                Route::post("", "Login")->name("login.store");
            });

        Route::post("/logout", "Logout")
            ->withoutMiddleware("guest")
            ->middleware("auth")
            ->name("logout");
    });
