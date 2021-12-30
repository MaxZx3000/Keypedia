<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataKeyboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ViewKeyboardController;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, "get_login_page"]);

Route::get('/login', [AuthController::class, "get_login_page"])->name('login');
Route::get('/register', [AuthController::class, "get_register_page"])->name('register');
Route::get('/home', [HomeController::class, "get_home_page"])->name('home');
Route::get('/view_keyboard/{categoryID}', [ViewKeyboardController::class, "get_view_keyboard_page"])->name('view_keyboard');
Route::get('/edit_keyboard/{keyboardID}', [DataKeyboardController::class, "get_edit_keyboard_page"])->name('keyboard.edit');


Route::post('/register', [AuthController::class, "process_register"])->name('register.process');
Route::post('/login', [AuthController::class, "process_login"])->name('login.process');
Route::post('/logout', [AuthController::class, "process_logout"])->name('logout');
Route::post('/view_keyboard', [ViewKeyboardController::class, "process_filter_keyboard"])->name('keyboard.filter');
Route::post('/delete_keyboard', [DataKeyboardController::class, "process_delete_keyboard"])->name('process_delete_keyboard');
Route::post('/add_keyboard', [DataKeyboardController::class, "process_add_keyboard"])->name('process_add_keyboard');
Route::post('/edit_keyboard', [DataKeyboardController::class, "process_edit_keyboard"])->name('process_edit_keyboard');
