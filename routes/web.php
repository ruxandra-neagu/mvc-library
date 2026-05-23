<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

// Pagini publice
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/books', [BookController::class, 'index'])->name('books');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Coș
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{book}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{cartItem}', [CartController::class, 'remove'])->name('cart.remove');
    Route::patch('/cart/update/{cartItem}', [CartController::class, 'update'])->name('cart.update');
});

// Comenzi


Route::middleware('auth')->group(function () {
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('orders.checkout');
    Route::post('/checkout', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}/confirmation', [OrderController::class, 'confirmation'])->name('orders.confirmation');
    Route::delete('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
});

require __DIR__.'/auth.php';