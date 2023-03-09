<?php

use App\Http\Controllers\GuestController;
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
});

Route::get('/guests', [GuestController::class, 'index']);
Route::post('/guests', [GuestController::class, 'store']);

Route::get('/invitations', function () {
    return view('invitations.index', [
        'invitations' => Invitation::all(),
    ]);
});
