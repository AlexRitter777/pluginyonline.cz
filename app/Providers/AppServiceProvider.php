<?php

namespace App\Providers;

use App\Models\Page;
use App\Rules\DifferentFromOldPassword;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Schema;


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

        //composer?
        if(Schema::hasTable('pages')) {
            Cache::rememberForever('pages', function () {
                return Page::where('is_published', 1)->orderBy('position', 'asc')
                    ->get(['title','route_name', 'slug', 'visible_in_footer']);

            });
        }




    }
}
