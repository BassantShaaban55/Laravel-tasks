<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\productsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/shop', [HomeController::class, 'shop']);

Route::prefix('/admin')->group(function () {
    Route::get('', [AdminController::class, 'index']);
    Route::get('categories', [CategoriesController::class, 'category']);
    Route::post('categories', [CategoriesController::class, 'store'])->name('admin.categories');
    Route::get('categories/create', [CategoriesController::class, 'create']);
    Route::get('categories/{id}/edit', [CategoriesController::class, 'edit']);
    Route::put('categories/{id}', [CategoriesController::class, 'update']);
    Route::delete('categories/{id}', [CategoriesController::class, 'destroy']);
    Route::resource('products', productsController::class);


});