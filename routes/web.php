<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\IndexController;


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

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/search', [IndexController::class, 'search'])->name('search');
Route::get('/category/{category}', [IndexController::class, 'category'])->name('category');


Route::middleware("auth")->group(function () {

    Route::get('/logout', [RegisterController::class, 'logout'])->name('logout');
    Route::post('/comment/{id}', [IndexController::class, 'comment'])->name('comment');       
});

Route::middleware("guest")->group(function () {

    Route::get('/login', [RegisterController::class, 'showLoginForm'])->name('login');
    Route::get('/login_process', [RegisterController::class, 'login'])->name('login_process');

    Route::get('/registration', [RegisterController::class, 'showRegisterForm'])->name('registration');
    Route::get('/registration_process', [RegisterController::class, 'registration'])->name('registration_process');        

    Route::get('/forgot', [RegisterController::class, 'showForgotForm'])->name('forgot');
    Route::get('/forgot_process', [RegisterController::class, 'forgot'])->name('forgot_process');
});

Route::get('/{id}', [IndexController::class, 'show'])->name('show');



