<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(AdminController::class)
    ->group(function () {
        Route::get('/', 'index')->name("index");
    });

Route::middleware("auth")
    ->group(function () {
        // Route::controller(OrderController::class)
        //     ->prefix("order")
        //     ->name("order.")
        //     ->group(function () {
        //         Route::get("", "index")->name('index');
        //         Route::get("/create", "create")->name("create");
        //         Route::post("", 'store')->name("store");
        //         Route::get("{order}/edit", 'edit')->name("edit");
        //         Route::put("{order}", 'update')->name("update");
        //         Route::delete("{order}", "destroy")->name("destroy");
        //     });
        Route::resource("order", OrderController::class);
        Route::resource("lesson", LessonController::class);
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
