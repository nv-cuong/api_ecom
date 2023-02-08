<?php

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('admin/login', [AdminController::class, 'index']);
// Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');

// Route::group(['middleware' => 'admin_auth'], function () {
//     Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

//     Route::get('admin/category', [CategoryController::class, 'index'])->name('category.index');
//     Route::get('admin/manage-category', [CategoryController::class, 'manage_category'])->name('category.manage_category');
//     Route::post('admin/store', [CategoryController::class, 'store'])->name('category.store');



//     Route::get('admin/logout', function () {
//         session()->forget('ADMIN_LOGIN');
//         session()->forget('ADMIN_ID');
//         session()->flash('error', 'Logout successfully!');
//         return view('admin/login');
//     });
// });
