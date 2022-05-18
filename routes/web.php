<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('/auth/login');
});
Route::group(['middleware' => 'auth'], function () {

    require __DIR__.'/admin.php';

    //filtering by category
    Route::get('/products/{category}', [ProductController::class, 'category']);

    //all users products
    Route::get('/{user}/products', [ProductController::class, 'userProducts']);

    //user dashboard where he can see he's products status of products and crud products
    Route::get('/dashboard', [UserController::class, 'dashboard']);

    //search for products depending on title and description
    Route::get('/search', [ProductController::class, 'search'])->name('product.search');

    //endpoint for getting categories
    Route::get('/categories/{id}', [ProductController::class, 'categories']);

    //user function for creating product
    Route::post('/createproduct', [ProductController::class, 'store'])->name('product.create');

    //geting product data for editing
    Route::get('/product/{id}', [ProductController::class, 'edit'])->name('product.edit');

    //updating product
    Route::put('/updateproduct', [ProductController::class, 'update'])->name('product.update');

    //delete product
    Route::delete('/productdelete/{id}', [ProductController::class, 'destroy'])->name('product.delete');

});

//all products page for browsing
Route::get('/products', [ProductController::class, 'products'])->name('products');

//product detail page
Route::get('/product-detail/{id}', [ProductController::class, 'product']);
