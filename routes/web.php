<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
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

Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('about', [UserController::class, 'showAboutMe'])->name('about-me');
    Route::get('friends', [UserController::class, 'showFriends'])->name('friends');
    Route::get('friends/{username}', [UserController::class, 'showWall'])->name('wall');

    Route::group(['prefix' => 'admin','middleware' => ['admin_only']],function() {
        Route::get('users', [AdminController::class, 'allUsers'])->name('admin.users');
        Route::get('users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.user_edit');
        Route::post('users/{id}/update', [AdminController::class, 'updateUser'])->name('admin.update');
    });

});
