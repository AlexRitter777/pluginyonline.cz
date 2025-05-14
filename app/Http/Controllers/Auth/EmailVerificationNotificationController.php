<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('admin.dashboard', absolute: false));
        }

        try{
            $request->user()->sendEmailVerificationNotification();
        }catch (\Throwable $e){
            Log::error('Verification email send failed: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong. Please try again later.');
        }

        return back()->with('status', 'A verification link has just been sent to your email address.');
    }
}
