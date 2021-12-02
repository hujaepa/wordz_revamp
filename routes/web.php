<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\BookmarkController;
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

//home
Route::group(["prefix"=>"home","middleware"=>"auth"],function() {
    Route::get('/',[HomeController::class,"index"])->name("home.index");
    Route::post('/search',[HomeController::class,"search"])->name('home.search');
    Route::get('/logout',[HomeController::class,"logout"])->name('home.logout');
});

//bookmark
Route::group(["prefix"=>"bookmark","middleware"=>"auth"],function() {
    Route::post('/',[BookmarkController::class,"add"])->name("bookmark.add");
    Route::get('/list/{id}',[BookmarkController::class,"list"]);
});