<?php

use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CourseControllerApi;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LessonControllerApi;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserControllerApi;
use App\Http\Controllers\UserControllerApiWebSocket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(UserControllerApiWebSocket::class)
    ->group(function () {
        Route::post("registr", "Register");
        Route::post("login", "Login");
    });

Route::middleware("auth:sanctum")
    ->prefix("courses")
    ->group(function () {
        Route::get("", [CourseControllerApi::class, 'GetAll']);
        Route::get("{course}", [LessonControllerApi::class, "GetAll"]);
        Route::post("{course}/buy", [CourseControllerApi::class, 'Buy']);
    });

Route::middleware("auth:sanctum")
->prefix("orders")
->group(function () {
    Route::get("", [CourseControllerApi::class, 'GetStudentCourse']);
    Route::get("/{statusPayment}", [CourseControllerApi::class, 'CancelOrderCourse']);
});

Route::post("/payment-webhook", [CourseControllerApi::class, 'webHook'])
    ;
    // ->middleware("auth:sanctum");

Route::post("/create-sertificate", [CertificateController::class, 'CreateCert']);
Route::post("/check-sertificate", [CertificateController::class, 'SearchCert']);


Route::controller(RoomController::class)
->middleware("auth:sanctum")
->group(function () {
    Route::get("/rooms", 'get');
});
