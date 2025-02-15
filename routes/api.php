<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\AuthController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class, 'registerUser'])->name('auth.registerUser');
Route::post('login', [AuthController::class, 'login'])->name('auth.loginUser');

Route::middleware('auth:sanctum')->group(function () {
    // Si no esta iniciado sesion devuelve el error 401 Unauthenticated
    Route::resource('/student', StudentController::class);
    Route::get('logout', [AuthController::class, 'logout'])->name('auth.logoutUser');
});
