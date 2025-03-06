<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use Illuminate\Support\Facades\Route;
use \App\Http\Middleware\IsAdmin;

Route::middleware('guest')->group(function () {

    Route::get('rw-admin', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('rw-admin', [AuthenticatedSessionController::class, 'store']);

    Route::prefix('rw-admin')->group(function () {

        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
            ->name('password.request');

        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
            ->name('password.email');

        Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
            ->name('password.reset');

        Route::post('reset-password', [NewPasswordController::class, 'store'])
            ->name('password.store');

    });


});

Route::middleware(IsAdmin::class)->group(function () {
    Route::prefix('rw-admin')->group(function () {
        Route::put('password', [PasswordController::class, 'update'])
            ->name('password.update');

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');
    });
});
