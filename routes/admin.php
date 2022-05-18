<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;

Route::group(['middleware' => 'is_admin', 'prefix' => 'admin'], function (){
    //admin landing page where he manages products
    Route::get('/products/{status}', [AdminController::class, 'index'])->name('admin.products');

    //manage product actions
    Route::get('/product/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/approve', [AdminController::class, 'approve'])->name('approve');
    Route::put('/deny', [AdminController::class, 'deny'])->name('deny');
    Route::delete('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');

    //manage customers
    Route::get('/customers', [AdminController::class, 'customers']);
    Route::post('/customers/create', [AdminController::class, 'customerCreate'])->name('admin.create.user');
    Route::get('/customers/edit/{id}', [AdminController::class, 'customerEdit']);
    Route::put('/customers/update', [AdminController::class, 'customerUpdate'])->name('admin.update.user');
    Route::delete('/customers/delete/{id}', [AdminController::class, 'customerDelete']);

    //manage categories
    Route::get('/categories', [AdminController::class, 'categories']);
    Route::post('/topcategory', [AdminController::class, 'topCategoryCreate'])->name('topcategory.create');
    Route::post('/subcategory', [AdminController::class, 'subCategoryCreate'])->name('subcategory.create');

});
