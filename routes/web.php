<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ColorController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/', function () {
    return view('home');
});

/**
 * All route for Color
 */
Route::get('/', [ColorController::class,'index']);
Route::get('/colors/create', [ColorController::class,'create']);