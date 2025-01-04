<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BoarderController;
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
    Route::get('/boarding-houses/create', [BoardingHouseController::class, 'create'])->name('boarding-houses.create'); // Show form to create
    Route::post('/boarding-houses', [BoardingHouseController::class, 'store'])->name('boarding-houses.store'); // Save new record
    Route::get('/boarding-houses/{boardingHouse}', [BoardingHouseController::class, 'show'])->name('boarding-houses.show'); // Show details
    Route::get('/boarding-houses/{boardingHouse}/edit', [BoardingHouseController::class, 'edit'])->name('boarding-houses.edit'); // Show form to edit
    Route::post('/boarding-houses/{boardingHouse}', [BoardingHouseController::class, 'update'])->name('boarding-houses.update'); // Update record
    Route::delete('/boarding-houses/{boardingHouse}', [BoardingHouseController::class, 'destroy'])->name('boarding-houses.destroy'); // Delete record

    //rooms
    Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index'); // List all
    Route::get('/boarding-houses/{boardingHouse}/rooms/create', [RoomController::class, 'create'])->name('rooms.create'); // Show form to create
    Route::post('/rooms/store', [RoomController::class, 'store'])->name('rooms.store'); // Save new record
    Route::get('/rooms/{room}', [RoomController::class, 'show'])->name('rooms.show'); // Show details

    //boarders
    Route::get('/boarders', [BoarderController::class, 'index'])->name('boarders.index'); // List all
    Route::get('/boarding-houses/{boardingHouse}/boarders/create', [BoarderController::class, 'create'])->name('boarders.create'); // Show form to create
    Route::post('/boarders/store', [BoarderController::class, 'store'])->name('boarders.store'); // Save new record
    Route::get('/boarders', [BoarderController::class, 'show'])->name('boarders.show'); // Show details

    //accept or decline boarders
    Route::post('/boarders/decision', [BoarderController::class, 'acceptOrDecline'])->name('boarders.decision'); // Show details

});
