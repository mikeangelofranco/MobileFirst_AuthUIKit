<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('ui.guest')->group(function () {
    Route::get('register', function () {
        return view('auth.register');
    })->name('register');

    Route::post('register', function (Request $request) {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $request->session()->put('ui.user', [
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        $request->session()->regenerate();

        return redirect()->route('dashboard');
    });

    Route::get('login', function () {
        return view('auth.login');
    })->name('login');

    Route::post('login', function (Request $request) {
        $validated = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $request->session()->put('ui.user', [
            'name' => 'Demo User',
            'email' => $validated['email'],
        ]);

        $request->session()->regenerate();

        return redirect()->route('dashboard');
    });

    Route::get('forgot-password', function () {
        return view('auth.forgot-password');
    })->name('password.request');

    Route::post('forgot-password', function (Request $request) {
        $request->validate([
            'email' => ['required', 'email', 'max:255'],
        ]);

        return back()->with('status', __('If this were a real app, a password reset link would be emailed now.'));
    })->name('password.email');

    Route::get('reset-password/{token}', function (Request $request, string $token) {
        return view('auth.reset-password', ['request' => $request]);
    })->name('password.reset');

    Route::post('reset-password', function (Request $request) {
        $request->validate([
            'token' => ['required', 'string'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        return redirect()->route('login')->with('status', __('Password reset (demo). You can sign in now.'));
    })->name('password.store');
});

Route::middleware('ui.auth')->group(function () {
    Route::get('verify-email', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    Route::post('email/verification-notification', function () {
        return back()->with('status', 'verification-link-sent');
    })->name('verification.send');

    Route::get('confirm-password', function () {
        return view('auth.confirm-password');
    })->name('password.confirm');

    Route::post('confirm-password', function () {
        return redirect()->intended(route('dashboard'));
    });

    Route::put('password', function () {
        return back()->with('status', __('Password updated (demo).'));
    })->name('password.update');

    Route::post('logout', function (Request $request) {
        $request->session()->forget('ui.user');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('status', __('Signed out.'));
    })->name('logout');
});

