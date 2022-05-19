<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AuthController;



Route::middleware("guest:admin")->group(function(){
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::get('login_process', [AuthController::class, 'login'])->name('login_process');
});


Route::middleware("auth:admin")->group(function(){
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('posts', PostController::class); 
    Route::resource('users', UserController::class); 

});
