<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
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
    Route::group(['middleware' => 'is_admin'], function (){
        Route::get('/adminarea', [AdminController::class, 'index']);
        Route::post('/admin/createproduct', [AdminController::class, 'store'])->name('admin.create');
        Route::get('/admin/product/{id}', [AdminController::class, 'edit'])->name('admin.edit');
        Route::put('/admin/updateproduct', [AdminController::class, 'update'])->name('admin.update');
        Route::delete('/admin/productdelete/{id}', [AdminController::class, 'destroy'])->name('admin.delete');
    });

    Route::get('/dashboard', [ProductController::class, 'index']);

    Route::get('/products/{category}', [ProductController::class, 'allProducts']);

    Route::get('/products/{category}/{subcategory}', [ProductController::class, 'subcategoryProducts']);

    Route::get('/products/{category}/{subcategory}/{product}', [ProductController::class, 'productdetail']);

    Route::get('/{user}/products', [ProductController::class, 'productsByUser']);

    Route::get('/search', [ProductController::class, 'search'])->name('product.search');

    Route::post('/createproduct', [ProductController::class, 'store'])->name('product.create');

    Route::get('/product/{id}', [ProductController::class, 'edit'])->name('product.edit');

    Route::put('/updateproduct', [ProductController::class, 'update'])->name('product.update');

    Route::delete('/productdelete/{id}', [ProductController::class, 'destroy'])->name('product.delete');

});
