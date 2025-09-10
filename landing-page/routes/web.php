<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use Illuminate\Support\Facades\Route;


Route::get('/', [LandingController::class, 'index'])->name('home');
Route::post('/contato', [ContactController::class, 'store'])->name('contact.store');


Route::prefix('admin')->middleware(['auth','admin'])->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.banners.index');
    })->name('home');

    Route::resource('banners', BannerController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('contacts', ContactController::class)->only(['index','show','destroy']);
});


require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
