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


Route::get('/', [App\Http\Controllers\HomeController::class, 'mainIndex']);

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/register_blogger', [App\Http\Controllers\BloggerController::class, 'blogger'])->middleware('role:Admin');
Route::post('/blogger', [App\Http\Controllers\BloggerController::class, 'registerBlogger'])->name('register-blogger');
Route::get('/register_moderator', [App\Http\Controllers\BloggerController::class, 'moderator'])->middleware('role:Blogger');
Route::post('/register-moderator', [App\Http\Controllers\BloggerController::class, 'registerModerator'])->name('register-moderator');
Route::get('dashboard/create', [App\Http\Controllers\BloggerController::class, 'createPost']);
Route::post('/donePost', [App\Http\Controllers\BloggerController::class, 'donePost']);
Route::match(['get', 'post'], 'dashboard/post/{post?}/edit/', [App\Http\Controllers\BloggerController::class, 'edit'])->middleware('permission:Edit Post');
Route::match(['get', 'post'], 'dashboard/post/{post?}/view/', [App\Http\Controllers\BloggerController::class, 'view']);
Route::match(['get', 'post'], 'dashboard/post/{post?}/publish/', [App\Http\Controllers\BloggerController::class, 'publish'])->middleware('permission:Publish Post');;
