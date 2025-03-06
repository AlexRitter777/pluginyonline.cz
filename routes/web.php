<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Public\MainController;
use App\Http\Controllers\Public\PortfolioController;
use App\Http\Controllers\Public\ServicesController;
use App\Http\Middleware\IsAdmin;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;


Route::get('/', [MainController::class, 'index']) ->name('home');
Route::get('/portfolio', [PortfolioController::class, 'index']) ->name('portfolio.index');
Route::get('/portfolio/{id}', [PortfolioController::class, 'show']) ->name('portfolio.show');
Route::get('/services', [ServicesController::class, 'index']) ->name('services.index');
Route::get('/services/{id}', [ServicesController::class, 'show']) ->name('services.show');

Route::get('fake-admin', function () {
    return view('admin.layouts.admin');
});

Route::get('/notification/confirm', function () {
    $user = User::find(1);
    return (new \App\Notifications\PasswordHasBeenResetNotification())
        ->toMail($user);
});

Route::get('/notification/reset', function () {

    $user = User::find(1);
    $token = Password::getRepository()->create($user);
    return (new \App\Notifications\MailResetPasswordToken($token))
        ->toMail($user);
});


Route::middleware(IsAdmin::class)->group(function () {

    Route::prefix('rw-admin')->group(function () {


        //Route::get('/dashboard', [DashboardController::class, 'index']) ->name('account.dashboard');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        //Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    });

});

Route::get('rw-admin/dashboard', [DashboardController::class, 'index']) ->name('admin.dashboard');
Route::get('rw-admin/services', [DashboardController::class, 'index']) ->name('admin.services.index');
Route::get('rw-admin/portfolio', [DashboardController::class, 'index']) ->name('admin.portfolio.index');



require __DIR__.'/auth.php';

