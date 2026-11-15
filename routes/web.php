<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SportController as AdminSportController;
use App\Http\Controllers\SportController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/deactivate', [ProfileController::class, 'deactivate'])->name('profile.deactivate');
});

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        //Route::view('/sports', 'admin.coming-soon', ['title' => 'Sports'])->name('sports.index');
        Route::resource('sports', AdminSportController::class)->except(['show', 'destroy']);
        Route::patch('sports/{sport}/toggle', [AdminSportController::class, 'toggle'])->name('sports.toggle');
        Route::view('/users', 'admin.coming-soon', ['title' => 'Users'])->name('users.index');
        Route::view('/reports', 'admin.coming-soon', ['title' => 'Reports'])->name('reports.index');
        Route::view('/support', 'admin.coming-soon', ['title' => 'Support'])->name('support.index');
        Route::view('/settings', 'admin.coming-soon', ['title' => 'Settings'])->name('settings.edit');
    });

Route::view('/about', 'about')->name('about');

Route::get('/sports', [SportController::class, 'index'])->name('sports.index');

Route::middleware('auth')->group(function () {
    Route::view('/skills', 'coming-soon', ['title' => 'My Skills'])->name('skills.index');
    Route::view('/matches', 'coming-soon', ['title' => 'Matches'])->name('matches.index');
    Route::view('/swaps', 'coming-soon', ['title' => 'Swaps'])->name('swaps.index');
});



require __DIR__.'/auth.php';
