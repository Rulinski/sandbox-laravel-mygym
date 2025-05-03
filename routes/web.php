<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduledClassController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', DashboardController::class)->middleware(['auth'])->name('dashboard');

Route::resource('/instructor/schedule', ScheduledClassController::class)
    ->only(['index', 'create', 'store', 'destroy'])
    ->middleware(['auth', 'role:instructor']);

Route::get('/dashboard/instructor', function () {
    return view('instructor.dashboard');
})->middleware(['auth', 'role:instructor'])->name('dashboard.instructor');

Route::get('/dashboard/member', function () {
    return view('member.dashboard');
})->middleware(['auth', 'role:member'])->name('dashboard.member');

Route::get('/dashboard/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('dashboard.admin');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
