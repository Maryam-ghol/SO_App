<?php

use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;



Route::get('/',[WebsiteController::class,'index'])-> name('home');
Route::get('/fail',[WebsiteController::class,'fail'])-> name('fail');
Route::get('/dashboard',[WebsiteController::class,'dashboard'])-> name('dashboard')->middleware('auth');
Route::get('/login',[WebsiteController::class,'login'])-> name('login');
Route::post('/login-submit',[WebsiteController::class,'login_submit'])-> name('login_submit');
Route::get('/logout',[WebsiteController::class,'logout'])-> name('logout');
Route::get('/registration',[WebsiteController::class,'registration'])-> name('registration');
Route::post('/registration_submit',[WebsiteController::class,'registration_submit'])-> name('registration_submit');
