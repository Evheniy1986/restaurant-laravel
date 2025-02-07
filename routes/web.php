<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\MainController::class, 'index'])->name('main');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin_or_manager',])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\MainController::class, 'index'])->name('index');
    Route::get('/categories', \App\Livewire\Admin\CategoryCrud::class)->name('category');
    Route::get('/tables', \App\Livewire\Admin\TableCrud::class)->name('table');
    Route::get('/menus', \App\Livewire\Admin\MenuCrud::class)->name('menu');
    Route::get('/reservations', \App\Livewire\Admin\ReservationCrud::class)->name('reservation');
    Route::get('/sliders', \App\Livewire\Admin\SliderCrud::class)->name('slider');
    Route::get('/users', \App\Livewire\Admin\UserCrud::class)->name('user');
    Route::get('/roles', \App\Livewire\Admin\Roles\RoleCrud::class)->name('role');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
