<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\DashboardController;

// Trang chủ
Route::get('/', function () {
    return view('welcome');
});

// Khu vực admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Routes cho sản phẩm
    Route::prefix('products')->name('products.')->group(function(){
        Route::get('/', [ProductsController::class, 'index'])->name('index');  // Danh sách sản phẩm

        Route::get('/create', [ProductsController::class, 'create'])->name('create'); // Thêm sản phẩm

        Route::get('/create', [ProductsController::class, 'create'])->name('create'); // Thêm sản phẩm
        Route::post('/store', [ProductsController::class, 'store'])->name('store'); // Lưu sản phẩm mới
        Route::get('/{id}/edit', [ProductsController::class, 'edit'])->name('edit'); // Chỉnh sửa sản phẩm
        Route::put('/{id}/update', [ProductsController::class, 'update'])->name('update'); // Cập nhật sản phẩm
        Route::delete('/{id}/delete', [ProductsController::class, 'destroy'])->name('destroy'); // Xóa sản phẩm
        Route::get('/{id}/show', [ProductsController::class, 'show'])->name('show');

    });
});
