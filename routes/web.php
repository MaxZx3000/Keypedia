<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GeneralController;
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

Route::get('/', [AuthController::class, "get_login_page"]);

Route::get('/login', [AuthController::class, "get_login_page"])->name('login');
Route::get('/register', [AuthController::class, "get_register_page"])->name('register');
Route::get('/home', [GeneralController::class, "get_home_page"])->name('home');

Route::post('/register', [AuthController::class, "process_register"])->name('register.process');
Route::post('/login', [AuthController::class, "process_login"])->name('login.process');
