<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){

        // $user = auth()->user();

        // return view('account.dashboard', ['user' => $user]);
        return view('admin.dashboard');
    }
}
