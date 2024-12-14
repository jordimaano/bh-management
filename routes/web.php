<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BoardingHouseController;
use App\Http\Controllers\RoomController;
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

//needs to be logged in
Route::middleware(['auth'])->group(function () {
    //boarding house
    Route::get('/boarding-houses', [BoardingHouseController::class, 'index'])->name('boarding-houses.index'); // List all
    Route::get('/boarding-houses/create', [BoardingHouseController::class, 'create'])->name('boarding-houses.create'); // Show form to create
    Route::post('/boarding-houses', [BoardingHouseController::class, 'store'])->name('boarding-houses.store'); // Save new record
    Route::get('/boarding-houses/{boardingHouse}', [BoardingHouseController::class, 'show'])->name('boarding-houses.show'); // Show details
    Route::get('/boarding-houses/{id}/edit', [BoardingHouseController::class, 'edit'])->name('boarding-houses.edit'); // Show form to edit
    Route::put('/boarding-houses/{id}', [BoardingHouseController::class, 'update'])->name('boarding-houses.update'); // Update record
    Route::delete('/boarding-houses/{id}', [BoardingHouseController::class, 'destroy'])->name('boarding-houses.destroy'); // Delete record

    //rooms
    Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index'); // List all
    Route::get('/boarding-houses/{boardingHouse}/rooms/create', [RoomController::class, 'create'])->name('rooms.create'); // Show form to create
    Route::post('/rooms/store', [RoomController::class, 'store'])->name('rooms.store'); // Save new record
    Route::get('/rooms/{boardingHouse}', [RoomController::class, 'show'])->name('rooms.show'); // Show details
    Route::get('/rooms/{id}/edit', [RoomController::class, 'edit'])->name('rooms.edit'); // Show form to edit
    Route::put('/rooms/{id}', [RoomController::class, 'update'])->name('rooms.update'); // Update record
    Route::delete('/rooms/{id}', [RoomController::class, 'destroy'])->name('rooms.destroy'); // Delete record
});
