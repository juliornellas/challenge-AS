<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/contacts');
});

Route::resource('/contacts', ContactController::class);

Route::get('/manage', [ContactController::class, 'manage'])->middleware('auth');
Route::post('logout', [UserController::class,'logout'])->middleware('auth');
Route::get('login', [UserController::class,'login']);

Route::get('register', [UserController::class,'register'])->middleware('guest');
Route::post('/users', [UserController::class, 'store']);

Route::post('/users/authenticate', [UserController::class, 'authenticate']);
