<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SlugController;
use App\Http\Controllers\Public\PageController as PublicPageController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Public\MainController;
use App\Http\Controllers\Public\PortfolioController as PublicPortfolioController;
use App\Http\Controllers\Public\ServiceController as PublicServiceController;
use App\Models\User;
use App\Notifications\MailResetPasswordToken;
use App\Notifications\PasswordHasBeenResetNotification;
use App\Services\SeoBreadcrumbsGenerator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;


// Public routes
Route::get('/', [MainController::class, 'index']) ->name('home');
Route::get('/projekty', [PublicPortfolioController::class, 'index']) ->name('portfolio.index');
Route::get('/projekty/{slug}', [PublicPortfolioController::class, 'show']) ->name('portfolio.show');
Route::get('/sluzby', [PublicServiceController::class, 'index']) ->name('services.index');
Route::get('/sluzby/{slug}', [PublicServiceController::class, 'show']) ->name('services.show');
Route::post('/verify', [MainController::class, 'verify'])->name('recaptcha.verify');
Route::post('/send-message', [MainController::class, 'processMessage'])->name('send-message');

Route::get('/kontakt', function (SeoBreadcrumbsGenerator $seoBreadcrumbsGenerator) {
    return view('public.pages.contact')
        ->with(['breadCrumbs' => $seoBreadcrumbsGenerator->generate()]);
})->name('contact');

Route::get('/o-nas', function (SeoBreadcrumbsGenerator $seoBreadcrumbsGenerator) {
    return view('public.pages.about')
        ->with(['breadCrumbs' => $seoBreadcrumbsGenerator->generate()]);
})->name('about');

Route::get('/ceny', function (SeoBreadcrumbsGenerator $seoBreadcrumbsGenerator) {
    return view('public.pages.prices')
        ->with(['breadCrumbs' => $seoBreadcrumbsGenerator->generate()]);
})->name('prices');

// Pages routes
$pages = Cache::get('pages', []);
foreach ($pages as $page) {
    Route::get($page['slug'], [PublicPageController::class, 'show'])->name($page['route_name']);
}



//Admin routes
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::prefix('rw-admin')->group(function () {

        Route::middleware('verified')->group(function () {

            Route::get('/dashboard', [DashboardController::class, 'index']) ->name('admin.dashboard');

            Route::resource('services', ServiceController::class, ['as' => 'admin']);
            Route::get('services/single/{slug}', [ServiceController::class, 'showSingle'])->name('admin.services.single');
            Route::get('services/grid/{slug}', [ServiceController::class, 'showGrid'])->name('admin.services.grid');

            Route::resource('portfolio', PortfolioController::class, ['as' => 'admin']);
            Route::get('portfolio/single/{portfolio}', [PortfolioController::class, 'showSingle'])->name('admin.portfolio.single');
            Route::get('portfolio/grid/{portfolio}', [PortfolioController::class, 'showGrid'])->name('admin.portfolio.grid');

            Route::get('messages', [MessageController::class, 'index']) ->name('admin.messages.index');
            Route::get('messages/{message}', [MessageController::class, 'show']) ->name('admin.messages.show');
            Route::delete('messages/{message}', [MessageController::class, 'destroy']) ->name('admin.messages.destroy');

            Route::resource('pages', PageController::class, ['as' => 'admin'])->except(['show']);
            Route::get('pages/{slug}', [PageController::class, 'show'])->name('admin.pages.show');

            Route::post('slug-generator', [SlugController::class, 'generateSlug']) ->name('admin.slug-generate');
            Route::post('check-slug', [SlugController::class, 'checkIfSlugExistsOrNot']) ->name('admin.check-slug');
        });

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
        // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

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




require __DIR__.'/auth.php';

