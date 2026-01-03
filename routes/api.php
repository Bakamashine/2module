<?php

use App\Http\Controllers\CourseControllerApi;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LessonControllerApi;
use App\Http\Controllers\UserControllerApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(UserControllerApi::class)
    ->group(function () {
        Route::post("registr", "Register");
        Route::post("login", "Login");
    });

Route::middleware("auth:sanctum")
->prefix("courses")
->group(function () {
    Route::get("", [CourseControllerApi::class, 'GetAll']);
    Route::get("{course}", [LessonControllerApi::class, "GetAll"]);
});

// Route::middleware("auth:sanctum")
//     ->controller(CourseControllerApi::class)
//     ->prefix("courses")
//     ->group(function () {
//         Route::get("", "GetAll");
//         Route::get("{course}", "GetById");
//     });
