<?php

use App\Http\Controllers\ControllerAdmin;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});

Route::get('/login', [ControllerAdmin::class, 'login_admin'])->name('login.admin');
Route::post('loginAdm', [UserController::class, 'login'])->name('login.post');
Route::get('administrativo', [ControllerAdmin::class, 'index'])->name('admin.index');
Route::post('logout', [UserController::class, 'logout'])->name('logout');