<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('admin.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        if (!$request->user()->hasVerifiedEmail()){
            try{
                $request->user()->sendEmailVerificationNotification();
            }catch (\Throwable $e){
                Log::error('Verification email send failed: ' . $e->getMessage());
                return back()->with('error', 'Something went wrong. Please try again later.');
            }
        }

        return back()->with('status', 'Profile has been updated.');
    }

}
