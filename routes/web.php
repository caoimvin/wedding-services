<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\GuestlistController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\UserController;
use App\Models\Guest;
use App\Models\Invitation;
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
    return view('test', [
        'guests' => Invitation::find(1)->guests,
        'invitation' => Guest::find(1)->invitation
    ]);
})->middleware('auth');

Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/users', [UserController::class, 'store']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/users/auth', [UserController::class, 'auth']);

Route::get('/guestlist', [GuestlistController::class, 'index'])->middleware('auth');

Route::prefix('guest')->group(function () {
    Route::get('/', [GuestController::class, 'create'])->middleware('auth');
    Route::post('/', [GuestController::class, 'store']);
    Route::get('/{guest}', [GuestController::class, 'edit']);
    Route::put('/{guest}', [GuestController::class, 'update']);
    Route::delete('/{guest}', [GuestController::class, 'destroy']);
});

Route::prefix('invitation')->group(function () {
    Route::get('/', [InvitationController::class, 'create']);
    Route::post('/', [InvitationController::class, 'store']);
    Route::get('/{invitation}', [InvitationController::class, 'edit'])->middleware('auth');
    Route::put('/{invitation}', [InvitationController::class, 'update'])->middleware('auth');
    Route::delete('/{invitation}', [InvitationController::class, 'destroy'])->middleware('auth');
});