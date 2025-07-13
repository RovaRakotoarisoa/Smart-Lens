<?php

use Illuminate\Support\Facades\Route;



use App\Http\Controllers\ColorController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\LunetteController;
use App\Http\Controllers\UserController;

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
Route::get('/colors', [ColorController::class,'index'])->name('colors.index');
Route::get('/colors/create', [ColorController::class,'create']);
Route::post('/colors/store', [ColorController::class,'store'])->name('colors.store');
Route::get('/colors/{color}/edit', [ColorController::class,'edit'])->name('colors.edit');
Route::put('/colors/{color}', [ColorController::class,'update'])->name('colors.update');
Route::delete('/colors/{color}', [ColorController::class,'destroy'])->name('colors.destroy');


/**
 * All route for Type
 */
Route::get('/types', [TypeController::class,'index'])->name('types.index');
Route::get('/types/create', [TypeController::class,'create'])->name('types.create');
Route::post('/types/store', [TypeController::class,'store'])->name('types.store');
Route::get('/types/{type}/edit', [TypeController::class,'edit'])->name('types.edit');
Route::put('/types/{type}', [TypeController::class,'update'])->name('types.update');

/**
 * All route for Lunette
 */
Route::get('/lunettes', [LunetteController::class,'index'])->name('lunettes.index');
Route::get('/lunettes/create', [LunetteController::class,'create'])->name('lunettes.create');
Route::post('/lunettes/store', [LunetteController::class,'store'])->name('lunettes.store');
Route::get('/lunettes/{lunette}/edit', [LunetteController::class,'edit'])->name('lunettes.edit');
Route::put('/lunettes/{lunette}', [LunetteController::class,'update'])->name('lunettes.update');

/**
 * All route for User
 */
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class,'update'])->name('users.update');