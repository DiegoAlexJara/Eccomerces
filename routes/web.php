<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\SubCategory;
use App\Http\Controllers\SubCategoryController;
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
    ->names('marca')
    ->middleware(AdminAuthMiddleware::class);

Route::resource('admin/categorias', CategoryController::class)
    ->names('category')
    ->middleware(AdminAuthMiddleware::class);

Route::resource('admin/subcategoria', SubCategoryController::class)
    ->names('subcategorias')
    ->middleware(AdminAuthMiddleware::class);