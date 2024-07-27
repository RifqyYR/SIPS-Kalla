<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        // Logout pengguna
        Auth::logout();

        // Opsi tambahan: Invalidate user session to prevent using the old session
        $request->session()->invalidate();

        // Opsi tambahan: Regenerate the session ID to avoid session fixation
        $request->session()->regenerateToken();

        // Redirect ke halaman login dengan pesan status
        return redirect()->route('login')->with('status', 'Your password has been updated. Please log in with your new password.');
    }
}
