<?php
namespace App\Providers;

use Whitecube\LaravelCookieConsent\Consent;
use Whitecube\LaravelCookieConsent\Facades\Cookies;
use Whitecube\LaravelCookieConsent\CookiesServiceProvider as ServiceProvider;

class CookiesServiceProvider extends ServiceProvider
{



    /**
     * Define the cookies users should be aware of.
     */
    protected function registerCookies(): void
    {
        if (app()->environment() === 'local') {
            // Register Laravel's base cookies under the "required" cookies section:
            Cookies::essentials()
                ->session()
                ->csrf();

            // Register all Analytics cookies at once using one single shorthand method:
            Cookies::analytics()
                ->google(
                    id: env('GOOGLE_ANALYTICS_ID'),
                    anonymizeIp: env('GOOGLE_ANALYTICS_ANONYMIZE_IP')
                );

            // Register custom cookies under the pre-existing "optional" category:
            // Nothing here...
        }


    }
}
