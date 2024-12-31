<?php

use App\Livewire\DetailsComponent;
use Illuminate\Support\Facades\Route;

// Route::view('/', 'welcome');

Route::redirect('/', 'dashboard');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/details/videogame/{id}/{owner}', [DetailsComponent::class, 'render'])
    ->middleware(['auth'])
    ->name('details.videogame');
    
require __DIR__.'/auth.php';