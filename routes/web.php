<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/',function () {
        return Inertia::render('admin/Home');
    })->name('dashboard');
});


Route::get('/obavestenja/{id}', [\App\Http\Controllers\NoticeController::class, 'show'])->name('obavestenje');
Route::get('/obavestenja', [\App\Http\Controllers\NoticeController::class, 'store'])->name('obavestenjeDodavanje');
Route::get('/obavestenja', [\App\Http\Controllers\NoticeController::class, 'getAll'])->name('obavestenjeSva');


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
