<?php

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

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/register_blogger', [App\Http\Controllers\BloggerController::class, 'blogger'])->middleware('role:Admin');
Route::post('/blogger', [App\Http\Controllers\BloggerController::class, 'registerBlogger'])->name('register-blogger');
Route::get('/register_moderator', [App\Http\Controllers\BloggerController::class, 'moderator'])->middleware('role:Blogger');
Route::post('/register-moderator', [App\Http\Controllers\BloggerController::class, 'registerModerator'])->name('register-moderator');
