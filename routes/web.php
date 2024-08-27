<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'ShowLogin'])
    ->name('ShowLogin')
    ->middleware(RedirectIfAuthenticated::class);

Route::post('/', [AuthController::class, 'login'])
    ->name('login');

Route::post('/inicio', [AuthController::class, 'logOut'])
    ->name('logOut');

Route::get('/inicio', [UserController::class, 'InicioSession'])
    ->name('inicio')
    ->middleware(AuthMiddleware::class);