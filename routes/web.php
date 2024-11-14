<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => to_route('dashboard'));

Route::get('dashboard', App\Livewire\Dashboard::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('categories', App\Livewire\Category\Index::class)->name('category.index');
Route::get('category/create', App\Livewire\Category\Create::class)->name('category.create');

Route::get('items', App\Livewire\Item\Index::class)->name('item.index');
Route::get('item/create', App\Livewire\Item\Create::class)->name('item.create');
Route::get('item/{item:name}/edit', App\Livewire\Item\Edit::class)->name('item.edit');

require __DIR__ . '/auth.php';
