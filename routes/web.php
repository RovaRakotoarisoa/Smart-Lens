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
Route::get('/', [ColorController::class,'index'])->name('home');
Route::get('/colors/create', [ColorController::class,'create']);
Route::post('/colors/store', [ColorController::class,'store'])->name('colors.store');
Route::get('/colors/{color}/edit', [ColorController::class,'edit'])->name('colors.edit');
Route::put('/colors/{color}', [ColorController::class,'update'])->name('colors.update');