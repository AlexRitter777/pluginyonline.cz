<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public function index(){



        $user = auth()->user();

        $services = Cache::rememberForever('admin_dashboard_services', function () {
            return Service::where('is_published', 1)
                ->orderBy('updated_at', 'desc')
                ->limit(5)
                ->get();
        });

        $servicesCount = Cache::rememberForever('admin_dashboard_services_count', function () {
            return Service::where('is_published', 1)->count();
        });

        $portfolios = Cache::rememberForever('admin_dashboard_portfolios', function () {
            return Portfolio::where('is_published', 1)
                ->orderBy('updated_at', 'desc')
                ->limit(5)
                ->get();
        });

        $portfoliosCount = Cache::rememberForever('admin_dashboard_portfolios_count', function () {
            return Portfolio::where('is_published', 1)->count();
        });

        $messages = Cache::rememberForever('admin_dashboard_messages', function () {
            return Message::orderBy('created_at', 'desc')
                ->limit(5)
                ->get();
        });

        $messagesCount = Cache::rememberForever('admin_dashboard_messages_count', function () {
            return Message::count();
        });

        $pagesCount = count(Cache::get('pages'));

        return view('admin.dashboard', [
            'user' => $user,
            'services' => $services,
            'portfolios' => $portfolios,
            'messages' => $messages,
            'messagesCount' => $messagesCount,
            'portfoliosCount' => $portfoliosCount,
            'servicesCount' => $servicesCount,
            'pagesCount' => $pagesCount
        ]);
    }
}
