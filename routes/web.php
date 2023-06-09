<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['adminAuthCheck']], function () {
    Route::get('admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');

    Route::get('users', [UserController::class, 'index'])->name('admin.users');

    Route::resource('categories', CategoryController::class);
});
