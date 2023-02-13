<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SizeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/login', [AdminController::class, 'index']);
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');

Route::group(['middleware' => 'admin_auth'], function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    Route::prefix('admin/category')->name('category.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])
            ->name('index');
        Route::get('/create', [CategoryController::class, 'create'])
            ->name('create');
        Route::post('/store', [CategoryController::class, 'store'])
            ->name('store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])
            ->name('edit');
        Route::put('/update/{id}', [CategoryController::class, 'update'])
            ->name('update');
        Route::delete('/delete/{id}', [CategoryController::class, 'delete'])
            ->name('delete');
        Route::get('/status/{status}/{id}', [CategoryController::class, 'status'])
            ->name('status');
    });

    Route::prefix('admin/coupon')->name('coupon.')->group(function () {
        Route::get('/', [CouponController::class, 'index'])
            ->name('index');
        Route::get('/create', [CouponController::class, 'create'])
            ->name('create');
        Route::post('/store', [CouponController::class, 'store'])
            ->name('store');
        Route::get('/edit/{id}', [CouponController::class, 'edit'])
            ->name('edit');
        Route::put('/update/{id}', [CouponController::class, 'update'])
            ->name('update');
        Route::delete('/delete/{id}', [CouponController::class, 'delete'])
            ->name('delete');
        Route::get('/status/{status}/{id}', [CouponController::class, 'status'])
            ->name('status');
    });

    Route::prefix('admin/size')->name('size.')->group(function () {
        Route::get('/', [SizeController::class, 'index'])
            ->name('index');
        Route::get('/create', [SizeController::class, 'create'])
            ->name('create');
        Route::post('/store', [SizeController::class, 'store'])
            ->name('store');
        Route::get('/edit/{id}', [SizeController::class, 'edit'])
            ->name('edit');
        Route::put('/update/{id}', [SizeController::class, 'update'])
            ->name('update');
        Route::delete('/delete/{id}', [SizeController::class, 'delete'])
            ->name('delete');
        Route::get('/status/{status}/{id}', [SizeController::class, 'status'])
            ->name('status');
    });

    Route::prefix('admin/color')->name('color.')->group(function () {
        Route::get('/', [ColorController::class, 'index'])
            ->name('index');
        Route::get('/create', [ColorController::class, 'create'])
            ->name('create');
        Route::post('/store', [ColorController::class, 'store'])
            ->name('store');
        Route::get('/edit/{id}', [ColorController::class, 'edit'])
            ->name('edit');
        Route::put('/update/{id}', [ColorController::class, 'update'])
            ->name('update');
        Route::delete('/delete/{id}', [ColorController::class, 'delete'])
            ->name('delete');
        Route::get('/status/{status}/{id}', [ColorController::class, 'status'])
            ->name('status');
    });


    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('error', 'Logout successfully!');
        return view('admin/login');
    })->name('admin.logut');
});
