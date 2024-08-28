<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminAuthMiddleware;
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

Route::get('/user', [UserController::class, 'InicioSession'])
    ->name('user')
    ->middleware(AuthMiddleware::class);

Route::get('/admin', [AdminController::class, 'inicio'])
    ->name('admin')
    ->middleware(AdminAuthMiddleware::class);

Route::resource('admin/marca', MarcaController::class)
    ->names('marca');

    Route::resource('admin/categorias', CategoryController::class)->names('category');