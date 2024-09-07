<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolesUserController;
use App\Http\Controllers\SomeController;
use App\Http\Controllers\SubCategory;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersControllers;
use App\Http\Middleware\AdminAuthMiddleware;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\ProductsEditMiddlware;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Models\Productos;
use Illuminate\Cache\Events\RetrievingKey;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'ShowLogin'])
    ->name('ShowLogin')
    ->middleware(RedirectIfAuthenticated::class);

Route::post('/', [AuthController::class, 'login'])
    ->name('login');

Route::post('/inicio', [AuthController::class, 'logOut'])
    ->name('logOut');

Route::get('/user', [UserController::class, 'InicioSession'])
    ->name('user');

    Route::get('/create', function(){ return view('nuevo-usuario'); })
        ->name('user-Create')
        ->middleware(RedirectIfAuthenticated::class);

Route::get('/admin', [AdminController::class, 'inicio'])
    ->name('admin');

Route::resource('admin/marca', MarcaController::class)
    ->names('marca')
    ->middleware(ProductsEditMiddlware::class);

Route::resource('admin/categorias', CategoryController::class)
    ->names('category')
    ->middleware(ProductsEditMiddlware::class);

Route::resource('admin/subcategoria', SubCategoryController::class)
    ->names('subcategorias')
    ->middleware(ProductsEditMiddlware::class);

Route::resource('admin/productos', ProductosController::class)
    ->names('productos')
    ->middleware(ProductsEditMiddlware::class);

Route::resource('admin/user', UsersControllers::class)
    ->names('usuarios');

Route::resource('admin/Role', RoleController::class)
    ->names('roles')
    ->middleware(AdminAuthMiddleware::class);

Route::resource('admin/Permisos', PermisosController::class)
    ->names('permisos')
    ->middleware(AdminAuthMiddleware::class);

Route::resource('admin/user/rol', RolesUserController::class)
    ->names('DarRol')
    ->middleware(AdminAuthMiddleware::class);


