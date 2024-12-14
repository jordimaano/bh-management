<?php

use App\Http\Controllers\Auth\RegisterController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/register/{role}', [RegisterController::class, 'showRegistrationForm'])->name('role.register');
Route::get('/choose-role', [RegisterController::class, 'chooseRole'])->name('role.choose');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
