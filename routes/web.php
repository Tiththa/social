<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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
    Route::get('users/{username}', [UserController::class, 'showWall'])->name('wall');
});
