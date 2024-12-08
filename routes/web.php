<?php

use App\Livewire\Delegate\Groups;
use App\Livewire\WhatsappGroup;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
  ->middleware(['auth', 'verified'])
  ->name('dashboard');

Route::view('profile', 'profile')
  ->middleware(['auth'])
  ->name('perfil');

Route::group(['middleware' => ['role:student|delegate']], function () {

  Route::get('whatsappGroup', WhatsappGroup::class)
    ->middleware(['auth'])
    ->name('whatsappGroup');
});

require __DIR__ . '/auth.php';
