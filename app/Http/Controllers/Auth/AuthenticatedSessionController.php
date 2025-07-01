<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        if (Auth::user()->hasRole('super-admin')) {
            return redirect()->intended(route('admin.dashboard', absolute: false));
        }
        return redirect()->intended(route('welcome', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function google()
    {
        session()->regenerate();
        return Socialite::driver('google')->redirect();
    }
    public function googleCallback()
    {

        $googleUser = Socialite::driver('google')->stateless()->user();
        $fullName = $googleUser->getName();
        $nameParts = explode(' ', $fullName, 2);
        $firstName = $nameParts[0] ?? '';
        $lastName = $nameParts[1] ?? '';

        $user = User::updateOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'first_name' => $firstName,
                'last_name' => $lastName,
                'provider_id' => $googleUser->getId(),
                'password' => bcrypt('randompassword'),
                'provider_token' => $googleUser->token,
                'provider_refresh_token' => $googleUser->refreshToken,
            ]
        );

        Auth::login($user, true);
        return redirect('/');
    }
}
