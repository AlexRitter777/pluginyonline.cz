<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Public\MainController;
use App\Http\Controllers\Public\PortfolioController as PublicPortfolioController;
use App\Http\Controllers\Public\ServiceController as PublicServiceController;
use App\Http\Middleware\IsAdmin;
use App\Models\User;
use App\Notifications\MailResetPasswordToken;
use App\Notifications\PasswordHasBeenResetNotification;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [MainController::class, 'index']) ->name('home');
Route::get('/portfolio', [PublicPortfolioController::class, 'index']) ->name('portfolio.index');
Route::get('/portfolio/{id}', [PublicPortfolioController::class, 'show']) ->name('portfolio.show');
Route::get('/services', [PublicServiceController::class, 'index']) ->name('services.index');
Route::get('/services/{slug}', [PublicServiceController::class, 'show']) ->name('services.show');

// Password reset routes
Route::get('/notification/confirm', function () {
    $user = User::find(1);
    return (new PasswordHasBeenResetNotification())
        ->toMail($user);
});
Route::get('/notification/reset', function () {

    $user = User::find(1);
    $token = Password::getRepository()->create($user);
    return (new MailResetPasswordToken($token))
        ->toMail($user);
});


Route::middleware(IsAdmin::class)->group(function () {
    Route::prefix('rw-admin')->group(function () {

        // Route::get('/dashboard', [DashboardController::class, 'index']) ->name('account.dashboard');
        // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

//Routes will be moved to admin middleware later
Route::prefix('rw-admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']) ->name('admin.dashboard');
    Route::resource('services', ServiceController::class, ['as' => 'admin']);
    Route::resource('portfolio', PortfolioController::class, ['as' => 'admin']);
});






require __DIR__.'/auth.php';

