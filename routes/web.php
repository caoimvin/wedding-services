<?php

use App\Http\Controllers\GuestController;
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
Route::post('/users', [UserController::class, 'store'])->middleware('auth');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/users/auth', [UserController::class, 'auth']);

Route::get('/guests', [GuestController::class, 'index'])->middleware('auth');
Route::post('/guests', [GuestController::class, 'store']);
Route::get('/guests/{guest}/edit', [GuestController::class, 'edit']);
Route::put('/guests/{guest}', [GuestController::class, 'update']);
Route::delete('/guests/{guest}', [GuestController::class, 'destroy']);

Route::get('/invitations', [InvitationController::class, 'index'])->middleware('auth');