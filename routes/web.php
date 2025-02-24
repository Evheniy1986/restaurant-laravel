<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Admin\CategoryCrud;
use App\Livewire\Admin\MenuCrud;
use App\Livewire\Admin\ReservationCrud;
use App\Livewire\Admin\Roles\RoleCrud;
use App\Livewire\Admin\SliderCrud;
use App\Livewire\Admin\TableCrud;
use App\Livewire\Admin\UserCrud;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/cart', \App\Livewire\Front\Cart::class)->name('cart');
Route::get('/checkout', \App\Livewire\Front\Order::class)->name('checkout');

Route::get('/payment/success', [PaymentController::class, 'successPage'])->name('payment.success');
Route::get('/payment/failed', [PaymentController::class, 'failedPage'])->name('payment.failed');

Route::post('/payment/callback', [PaymentController::class, 'callback'])->name('payment.callback')->withoutMiddleware(\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class);

Route::get('payment/{order}', [PaymentController::class, 'paymentPage'])->name('payment.page');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin_or_manager',])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\MainController::class, 'index'])->name('index');
    Route::get('/categories', CategoryCrud::class)->name('category');
    Route::get('/tables', TableCrud::class)->name('table');
    Route::get('/menus', MenuCrud::class)->name('menu');
    Route::get('/reservations', ReservationCrud::class)->name('reservation');
    Route::get('/sliders', SliderCrud::class)->name('slider');
    Route::get('/users', UserCrud::class)->name('user');
    Route::get('/roles', RoleCrud::class)->name('role');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';

Route::get('/{category}', [MainController::class, 'categoryWithProduct'])->name('category');
