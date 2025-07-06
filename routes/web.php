<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Livewire\ClienteComponent;
use App\Livewire\ProductoComponent;
use App\Livewire\PedidoComponent;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/clientes', ClienteComponent::class)->name('clientes.index');;
    Route::get('/productos', ProductoComponent::class)->name('productos.index');
    Route::get('/pedidos', PedidoComponent::class)->name('pedidos.index');
});

require __DIR__.'/auth.php';
