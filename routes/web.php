<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShortUrlController;
use Illuminate\Support\Facades\Route;

//  ---home
Route::get('/', function () { return view('welcome'); });

// --dashboard
Route::get('/dashboard', function () { return view('dashboard'); })->middleware(['auth', 'verified'])->name('dashboard');

// protect
Route::middleware(['auth'])->group(function () {

    // profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // invite_user
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');

    // ---short url
    Route::get('/short-urls/create', [ShortUrlController::class, 'create'])->name('short-urls.create');
    Route::post('/short-urls', [ShortUrlController::class, 'store'])->name('short-urls.store');
    Route::get('/short-urls', [ShortUrlController::class, 'index'])->name('short-urls.index');

    // ---admin check
    Route::get('/admin-test', function () { return 'Admin only route'; })->middleware('role:Admin');

});

// ---short url block
Route::get('/{code}', function () { abort(404); })->where('code', '^[a-zA-Z0-9]{6}$');

require __DIR__.'/auth.php';