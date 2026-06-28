<?php

namespace App\Services;

use App\Contracts\AuthServiceInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthService implements AuthServiceInterface
{
    public function registerUser(array $data): User
    {
        $user = User::create($data);

        Auth::login($user);

        return $user;
    }

    public function logoutUser(Request $request): void
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
    }

    public function authenticateUser(array $credentials): bool
    {
        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
            return true;
        }

        return false;
    }
}
