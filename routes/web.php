<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => to_route('dashboard'));

Route::middleware(['auth'])->group(function () {
    Route::view('profile', 'profile')
        ->name('profile');

    Route::get('categories', \App\Livewire\Category\Index::class)->name('category.index');
    
    Route::get('items', \App\Livewire\Item\Index::class)->name('item.index');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__ . '/auth.php';
