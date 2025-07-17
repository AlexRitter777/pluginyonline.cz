<?php

use App\Services\PingSitemapService;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// Run sitemap generation once a week
Schedule::command('generate:sitemap')->weeklyOn('1', '08:00');

// Run google and bing ping service
Schedule::call(function (){
   app(PingSitemapService::class)->ping();
})->twiceMonthly(1, 16, '10:00');
