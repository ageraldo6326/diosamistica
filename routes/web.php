<?php

use App\Http\Controllers\ReadingServiceController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome', [
        'readingServices' => config('lecturas.services'),
    ]);
})->name('home');

Route::get('servicios/{service}', [ReadingServiceController::class, 'show'])
    ->whereIn('service', array_keys(config('lecturas.services')))
    ->name('services.show');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
