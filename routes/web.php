<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckStatus;
use App\Http\Controllers\AdminUser;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/postlogin',[AdminUser::class,'Postlogin'])->name('PostLogin');