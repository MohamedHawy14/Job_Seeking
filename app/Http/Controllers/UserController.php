<?php

namespace App\Http\Controllers;

use App\Contracts\AuthServiceInterface;
use App\Http\Requests\Login;
use App\Http\Requests\Register;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected AuthServiceInterface $authService;

    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    public function create()
    {
        return view('User.create');
    }

    public function store(Register $register): RedirectResponse
    {
        $this->authService->registerUser($register->validated());

        return redirect('/')->with('message', __('main.user_created'));
    }

    public function logout(Request $request): RedirectResponse
    {
        $this->authService->logoutUser($request);

        return redirect('/')->with('message', __('main.logged_out'));
    }

    public function login()
    {
        return view('User.login');
    }

    public function authenticate(Login $login): RedirectResponse
    {
        $isAuthenticated = $this->authService->authenticateUser($login->validated());

        if ($isAuthenticated) {
            return redirect('/')->with('message', __('main.logged_in'));
        }

        return back()->withErrors(['email' => __('auth.failed')])->onlyInput('email');
    }
}
