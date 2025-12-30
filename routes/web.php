<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $isLoggedIn = auth()->check() || session()->has('ui.user');

    return $isLoggedIn
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(env('AUTH_UI_ONLY', true) ? 'ui.auth' : ['auth', 'verified'])->name('dashboard');

Route::view('/terms', 'pages.terms')->name('terms');
Route::view('/privacy', 'pages.privacy')->name('privacy');
Route::view('/support', 'pages.support')->name('support');

require __DIR__.'/auth.php';
