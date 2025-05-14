<?php

namespace App\Providers;

use App\Rules\DifferentFromOldPassword;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Password::defaults(function () {
            return Password::min(8)
                ->mixedCase()
                //->uncompromised()
                ->rules(new DifferentFromOldPassword);
        });

        RedirectIfAuthenticated::redirectUsing(function () {
            return route('admin.dashboard');
        });

    }
}
