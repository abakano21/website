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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/filter', [App\Http\Controllers\WelcomeController::class, 'filterHistory'])->name('welcome');
Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('index');
