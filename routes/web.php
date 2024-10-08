<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\PermisosRolesController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolesUserController;
use App\Http\Controllers\shopController;
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

// INICIO DE ROUTES DE LOGINS

Route::get('/', [AuthController::class, 'ShowLogin'])
    ->name('ShowLogin')
    ->middleware(RedirectIfAuthenticated::class);

Route::post('/', [AuthController::class, 'login'])
    ->name('login');

Route::post('/inicio', [AuthController::class, 'logOut'])
    ->name('logOut');

Route::get('/create', function () {
    return view('nuevo-usuario');
})
    ->name('user-Create')
    ->middleware(RedirectIfAuthenticated::class);

// FIN DE LOGINS

// INICIO DE ROUTES DE ADMINS

Route::get('/admin', [AdminController::class, 'inicio'])->middleware('permission:admin')
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
// ->middleware(AdminAuthMiddleware::class);

Route::resource('admin/Role', RoleController::class)
    ->names('roles')
    ->middleware(AdminAuthMiddleware::class);

Route::resource('admin/Permisos', PermisosController::class)
    ->names('permisos')
    ->middleware(AdminAuthMiddleware::class);

Route::get('admin/user/Permisos/{name}', [PermisosRolesController::class, 'permisos'])
    ->name('PermisosRoles')
    ->middleware(AdminAuthMiddleware::class);

Route::get('admin/user/Role/{name}', [PermisosRolesController::class, 'roles'])
    ->name('RolesPermisos')
    ->middleware(AdminAuthMiddleware::class);

Route::resource('admin/user/rol', RolesUserController::class)
    ->names('DarRol')
    ->middleware(AdminAuthMiddleware::class);


//FIN DE ADMINS

//INICIO DE ROUTES DE USER

Route::get('/user', [shopController::class, 'productos'])
    ->name('user')
    ->middleware(AuthMiddleware::class);

Route::get('user/Marcas', [shopController::class, 'marca'])
    ->name('marcas')
    ->middleware(AuthMiddleware::class);

Route::get('user/Marca/{marca}', [shopController::class, 'marca_shop'])
    ->name('marcaShop')
    ->middleware(AuthMiddleware::class);

Route::get('user/Categoria', [shopController::class, 'category'])
    ->name('Categorys')
    ->middleware(AuthMiddleware::class);

Route::get('user/Categoria/{categoria}', [shopController::class, 'category_shop'])
    ->name('categoryShop')
    ->middleware(AuthMiddleware::class);

Route::get('user/Sub-Categoria', [shopController::class, 'subcategory'])
    ->name('subCategorias')
    ->middleware(AuthMiddleware::class);

Route::get('user/Sub-Categoria/{categoria}', [shopController::class, 'subcategory_shop'])
    ->name('subcategoryShop')
    ->middleware(AuthMiddleware::class);

Route::get('user/productos', [shopController::class, 'productos'])
    ->name('productos')
    ->middleware(AuthMiddleware::class);

Route::get('user/contactos', [shopController::class, 'contactos'])
    ->name('contactos')
    ->middleware(AuthMiddleware::class);


//FIN DE USER
