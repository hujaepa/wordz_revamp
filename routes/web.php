<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
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

//login
Route::group(['prefix'=>'/'],function() {
    Route::get('/',[LoginController::class,"index"])->name("login");
    Route::post('/process',[LoginController::class,"process"])->name("login.process");
});

//registration
Route::group(['prefix'=>'membership'],function() {
    Route::get('/',[RegisterController::class,"index"]);
    Route::post('/process',[RegisterController::class,"process"])->name("register.process");
});

//loggedIn
Route::middleware(['auth'])->group(function(){
    Route::get('/home',[HomeController::class,"index"])->name('home');
    Route::post('/search/result',[SearchController::class,"result"])->name('result');
    Route::get('/logout',[HomeController::class,"logout"])->name('logout');
});
